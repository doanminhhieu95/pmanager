<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProjectUser extends Model
{
    //
    protected $table = "project_user";
    
        protected $fillable = [
            'Project_ID',
            'User_ID',
    
        ];
}
