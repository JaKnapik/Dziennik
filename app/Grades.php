<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Grades extends Model
{
    protected $fillable = [
        'gradeID','grade', 'description', 'addedBy', 'created_at', 'editedBy', 'updated_at', 'studentID'
    ];
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [

    ];
}
