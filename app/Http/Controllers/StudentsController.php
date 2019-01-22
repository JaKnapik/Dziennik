<?php

namespace App\Http\Controllers;

use App\Http\Requests\StudentsRequest;
use App\Http\Requests\PassRequest;
use App\Section;
use App\User;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Expr\Array_;

class StudentsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => 'logout']);
    }

    public function index(){
        $students = User::join('sections', 'users.sectionID', '=', 'sections.sectionID')
            ->select('users.*', 'sections.sectionName', 'sections.class')->where('role','user')->paginate(5);

        return view('students.studentsList', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sections = Section::all();
        return view('students.register', compact('sections'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  StudentsRequest  $student
     * @return \Illuminate\Http\Response
     */
    public function store(StudentsRequest $student)
    {
        $password = $this->generateRandomString();
        User::insert([
            'name' => $student->input('name'),
            'surname' => $student->input('surname'),
            'pesel' => $student->input('pesel'),
            'sectionID' => $student->input('section'),
            'password' => bcrypt($password),
            'role' => 'user',
            'editorID' => $student->input('edytor'),
            'temp' => $password,
            'created_at' => date('Y-m-d H:i:s', time())
        ]);
        return redirect()->route('students.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User $student
     * @return \Illuminate\Http\Response
     */
    public function edit(User $student)
    {
        $sections = Section::all();
        return view('students.edit', compact(['student', 'sections']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $requesty
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function passEdit($id)
    {

        return view('students.changePass', compact('id'));
    }
    public function passUpdate(PassRequest $requesty, $id)
    {
        DB::table('users')->where('id', $id)->update([
            'password' => bcrypt($requesty->input('password')),
            'editorID' => $requesty->input('editorID'),
            'updated_at' => date('Y-m-d H:i:s', time())
            ]);
        return redirect()->route('dziennik.index');
    }
    public function update(StudentsRequest $request, User $student)
    {


        DB::table('users')->where('id',$student->id)->update([
            'name' => $request->input('name'),
            'surname' => $request->input('surname'),
            'pesel' => $request->input('pesel'),
            'sectionID' => $request->input('section'),
            'editorID' => $request->input('edytor'),
            'updated_at' => date('Y-m-d H:i:s', time())
    ]);
        return redirect()->route('students.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  User  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $student)
    {
        User::where('id', $student->id)->delete();
        return redirect()->route('students.index');
    }

    private function generateRandomString($length = 16) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
}
