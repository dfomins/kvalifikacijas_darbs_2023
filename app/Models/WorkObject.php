<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorkObject extends Model
{
    protected $table = 'objects';
    public $primaryKey = 'id';
    public $timestamps = true;

    protected $fillable = [
        'title',
        'city',
        'street',
        'body',
        'object_img',
    ];

    public static $rules = [
        'title' => 'required|max: 80',
        'city' => 'required|max: 50',
        'street' => 'required|max: 50',
        'body' => 'max:1000',
        'object_img' => 'image|mimes:jpeg,png,jpg,svg|max:1024',
    ];

    public function user() {
        return $this->belongsTo('App\Models\User');
    }
}
