<?php

namespace App\Http\Controllers;

use App\User;

class StudentsController extends Controller
{
    public function index(){
        $students = User::join('sections', 'users.sectionID', '=', 'sections.sectionID')
            ->select('users.*', 'sections.sectionName', 'sections.class')->where('role','user')->paginate(5);

        return view('students.studentsList', compact('students'));
    }
}
