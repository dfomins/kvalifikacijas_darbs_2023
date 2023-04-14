<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = 'posts';
    public $primaryKey = 'id';
    public $timestamps = true;

    protected $fillable = [
        'title',
        'body',
    ];

    protected $hidden = [
        'title',
        'body',
    ];

    protected $casts = [
        'body' => 'encrypted',
    ];

    public static $rules = [
        'title' => 'required|max:80',
        'body' => 'required|max:1000',
    ];

    public function user() {
        return $this->belongsTo('App\Models\User');
    }
}
