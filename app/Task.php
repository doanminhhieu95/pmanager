<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    //
    protected $fillable = [
        'Name',
        'Project_ID',
        'User_ID',
        'Days',
        'Hours',
        'Company_ID'
    ];
    public function User(){
        return $this->belongsTo('App\User');
    }
    public function Users(){
        return $this->belongsToMany('App\User');
    }
    public function Company(){
        return $this->belongsTo('App\Company');
    }
    public function comments(){
        return $this->morphMany('App\Comment','commentable');
    }

}
