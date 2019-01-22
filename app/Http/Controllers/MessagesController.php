<?php

namespace App\Http\Controllers;

use http\Env\Response;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Message;
use App\Temp;
use App\User;
use App\Http\Requests\MessagesRequest;
use Illuminate\Support\Facades\DB;
class MessagesController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth', ['except' => 'logout']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//        $userList=User::select('id', 'name', 'surname', 'sectionID')->where('role', 'user')->paginate(1);
//        $messagesSent= Message::join('users', 'messages.do', '=', 'users.id')
//            ->select('messages.text', 'users.name', 'users.surname')->where('messages.od', $id)->get();
        $students=null;
        $userList=User::join('sections', 'users.sectionID', '=', 'sections.sectionID')
            ->select('users.id', 'users.name', 'users.surname' ,'sections.sectionName')->where('users.role', 'user')->get();
        return view('messages.toMany', compact('userList', 'students'));
    }

    public function search(Request $request){
//        echo $request->input('search');
        $val  = $request->input('search');
        $userList=User::join('sections', 'users.sectionID', '=', 'sections.sectionID')
        ->select('users.id', 'users.name', 'users.surname', 'sections.sectionName')
            ->where([['users.role', 'user'],['users.name', 'LIKE', "%$val%"],])
            ->orwhere([['users.role', 'user'],['users.surname', 'LIKE', "%$val%"],])
            ->orwhere([['users.role', 'user'],['sections.sectionName', 'LIKE', "%$val%"],])
            ->get();
        return view('students.studentShort', compact('userList'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $nameSurname = User::select('id', 'name', 'surname')->where('id', $id)->get();
        return view('messages.createMessage', compact('nameSurname'));
    }
    public function resetSelect(Request $request)
    {
        $request->session()->forget('selectedUsers');
        return $this->index();
    }

    public function deleteFromList(Request $request)
    {
        $key = array_search($request->input('unchecked'), Session::get('selectedUsers'));

        $stTemp = Session::get('selectedUsers');
        unset($stTemp[$key]);
        $request->session()->pull('selectedUsers');
        $request->session()->set('selectedUsers', $stTemp);
        $ilosc=count(Session::get('selectedUsers'));
        if($ilosc==0)
        {

        }
            $students=User::join('sections', 'users.sectionID', '=', 'sections.sectionID')
                ->select('users.id', 'users.name', 'users.surname' ,'sections.sectionName')->whereIN('users.id', Session::get('selectedUsers'))->get();



        return view('students.studentsSelected', compact('students'));

    }

    public function storeToMany(Request $request)
    {

            $request->session()->push('selectedUsers', $request->input('checked'));

            {
                $students=User::join('sections', 'users.sectionID', '=', 'sections.sectionID')
                    ->select('users.id', 'users.name', 'users.surname' ,'sections.sectionName')->whereIN('users.id', Session::get('selectedUsers'))->get();

            }

             return view('students.studentsSelected', compact('students'));
    }

    public function sendToMany(MessagesRequest $request)
    {
        foreach(Session::get('selectedUsers') as $i)
        {
            Message::insert([
                'text' => $request->input('text'),
                'od' =>$request->input('edytor'),
                'do' => $i,
                'addTime' => date('Y-m-d')
        ]);
        }
        $request->session()->forget('selectedUsers');
        return redirect()->route('students.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MessagesRequest $request, $nameSurname)
    {
        Message::insert([
           'text' => $request->input('text'),
           'od' =>$request->input('edytor'),
           'do' => $nameSurname,
            'addTime' => date('Y-m-d')
        ]);
        return redirect()->route('students.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function showReceived($id)
    {
        $messagesReceived= Message::join('users', 'messages.od', '=', 'users.id')
            ->select('messages.text', 'users.name', 'users.surname')->where('messages.do', $id)->get();
        return view('messages.messagesReceived', compact ('messagesReceived'));
    }

    public function showSent($id)
    {

        $messagesSent= Message::join('users', 'messages.do', '=', 'users.id')
            ->select('messages.text', 'users.name', 'users.surname')->where('messages.od', $id)->get();
        return view('messages.messagesSent', compact('messagesSent'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
