<?php

namespace App\Http\Controllers;

use App\Grades;
use App\Http\Requests\GradesRequest;
use App\Students;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\DB;
class GradesController extends Controller
{
    /**
     * Display a listing of the resource.
     * @param User $id
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => 'logout']);
    }
    public function index($nameSurname)
    {
        $nameSurname2 = User::select('name', 'surname', 'id')->where('id', $nameSurname)->get();
        $nameSurname2 = $nameSurname2[0];
        return view('grades.gradesStore', compact('nameSurname2'));
    }
//
//    /**
//     * Show the form for creating a new resource.
//     * @param User $id
//     * @return \Illuminate\Http\Response
//     */
//    public function create($id)
//    {
//    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  GradesRequest $grades
     * @return \Illuminate\Http\Response
     */
    public function store(GradesRequest $grades)
    {
        Grades::insert([
            'grade' => $grades->input('grade'),
            'description' => $grades->input('description'),
            'addedBy' => $grades->input('addedBy'),
            'editedBy' => $grades->input('editedBy'),
            'created_at' => date('Y-m-d H:i:s', time()),
            'studentID' => $grades->input('studentID')
        ]);
         return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  User  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $grades = Grades::join('users', 'users.id', '=', 'grades.studentID')
            ->select('grades.*')->where('users.id', $id)->paginate(1);
        $iducznia = $id;
        return view('grades.gradesList', compact('grades'), compact('iducznia'));
    }
    public function showUser($id)
    {
        $grades = Grades::join('users', 'users.id', '=', 'grades.studentID')
            ->select('grades.*')->where('users.id', $id)->paginate(1);
        return view('grades.userList', compact('grades'));
    }
//
    /**
     * Show the form for editing the specified resource.
     *
     * @param  $grade
     * @return \Illuminate\Http\Response
     */
    public function edit($grade)
    {
        $select= Grades::select('grade','description', 'gradeID')->where('gradeID', $grade)->get();
       return view('grades.gradesEdit', compact('grade', 'select'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  $grade
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(GradesRequest $request, $grade)
    {
        DB::table('grades')->where('gradeID',$grade)->update([
            'grade' => $request->input('grade'),
            'description' => $request->input('description'),
            'editedBy' => $request->input('editedBy'),
            'updated_at' => date('Y-m-d H:i:s', time()),
        ]);
        return redirect()->route('students.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Grades $grade
     * @return \Illuminate\Http\Response
     */
    public function destroy($grade)
    {

        Grades::where('gradeID', $grade)->delete();
        return redirect()->route('students.index');
    }
}
