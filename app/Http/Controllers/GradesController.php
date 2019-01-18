<?php

namespace App\Http\Controllers;

use App\Grades;
use App\Students;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
class GradesController extends Controller
{
    /**
     * Display a listing of the resource.
     * @param User $id
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {

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
     * @param  User $id
     * @return \Illuminate\Http\Response
     */
    public function store($id)
    {

        return view('grades.gradesStore', compact('gstore'));
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
        return view('grades.gradesList', compact('grades'));
    }
//
//    /**
//     * Show the form for editing the specified resource.
//     *
//     * @param  int  $id
//     * @return \Illuminate\Http\Response
//     */
//    public function edit($id)
//    {
//        //
//    }
//
//    /**
//     * Update the specified resource in storage.
//     *
//     * @param  \Illuminate\Http\Request  $request
//     * @param  int  $id
//     * @return \Illuminate\Http\Response
//     */
//    public function update(Request $request, $id)
//    {
//        //
//    }
//
//    /**
//     * Remove the specified resource from storage.
//     *
//     * @param  int  $id
//     * @return \Illuminate\Http\Response
//     */
//    public function destroy($id)
//    {
//        //
//    }
}
