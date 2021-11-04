<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $table = 'comments';

    public $timestamps = true;

    protected $with = ['user'];

    protected $fillable = [
        'topic_id',
        'user_id',
        'content'
    ];

    /**
     * Get the topic associated.
     */
    public function topic()
    {
        return $this->hasOne(Topic::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
