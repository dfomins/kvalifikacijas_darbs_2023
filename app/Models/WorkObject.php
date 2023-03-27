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
    ];

    public static $rules = [
        'title' => 'required|max: 80',
        'city' => 'required|max: 50',
        'street' => 'required|max: 50',
        'body' => 'max:1000',
        'filename.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ];

}
