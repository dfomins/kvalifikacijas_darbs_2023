<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notif extends Model
{
    protected $table = 'notifs';
    public $primaryKey = 'id';
    public $timestamps = true;

    protected $fillable = [
        'title',
        'body',
    ];

    public static $rules = [
        'title' => 'required|max:80',
        'body' => 'required|max:1000',
    ];
    
    public function user() {
        return $this->belongsTo('App\Models\User');
    }
}


