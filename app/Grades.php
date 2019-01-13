<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Grades extends Model
{
    protected $fillable = [
        'gradeID', 'grade', 'description', 'addedBy', 'editedBy', 'studentID'
    ];
}
