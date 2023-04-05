<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Work extends Model
{
    protected $table = 'work';
    public $primaryKey = 'id';
    // public $timestamps = false;

    protected $fillable = [
        'user_id',
        'work_date',
        'hours',
    ];

    // public function setWorkDateAttribute($value) {
    //     $this->attributes['work_date'] = Carbon::createFromFormat('d/m/Y', $value)->format('Y-m-d');
    // }

    public function user() {
        return $this->belongsTo(User::class);
    }

}
