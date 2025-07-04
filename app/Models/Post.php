<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'post';

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'user_id',
        'title',
        'content',

    ];

    public function user(){

        return $this->belongsTo('App\Models\User');

    }
}
