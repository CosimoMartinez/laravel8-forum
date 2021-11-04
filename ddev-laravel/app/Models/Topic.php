<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{

    protected $table = 'topics';

    public $timestamps = true;

    protected $with = ['user'];

    protected $fillable = [
        'title',
        'content',
        'created_at',
        'user_id'
    ];

    public function comments() {

        return $this->hasMany(Comment::class);
        
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
