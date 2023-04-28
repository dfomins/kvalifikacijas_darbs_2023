<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ObjectToUser extends Model
{

    protected $table = 'object_to_user_relation';
    public $primaryKey = 'id';
    public $timestamps = false;

    protected $fillable = [
        'user_id',
        'object_id',
    ];

    public function object() {
        return $this->hasOne(WorkObject::class, 'id', 'object_id');
    }
}
