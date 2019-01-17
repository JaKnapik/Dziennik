<?php

namespace App\Http\Controllers;

use App\Http\Requests\StudentsRequest;
use App\Section;
use App\User;
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

    function generateRandomString($length = 16) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
}
