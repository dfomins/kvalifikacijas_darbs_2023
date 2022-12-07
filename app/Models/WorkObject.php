<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorkObject extends Model
{
    protected $table = 'objects';
    public $primaryKey = 'id';
    public $timestamps = true;
}
