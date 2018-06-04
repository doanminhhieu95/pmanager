<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //
    protected $fillable = [
        'Body',
        'Url',
        'Commentable_ID',
        'Commentable_Type',
        'User_ID',

    ];

    public function commentable()
    {
        return $this->morphTo();
    }
    

        /**
     * Return the user associated with this comment.
     *
     * @return array
     */
     public function user()
     {
         return $this->hasOne('\App\User', 'id', 'User_ID');
     }
}
