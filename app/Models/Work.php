<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Work extends Model
{
    protected $table = 'work';
    public $primaryKey = 'work_id';
    // public $timestamps = false;

    protected $fillable = [
        'user_id',
        'date',
        'hours',
    ];

    // protected $casts = [
    //     'date' => 'datetime',
    //  ];

    public static $rules = [
        'date' => 'required|date_format:d/m/Y|before:tomorrow',
        'hours' => 'in:1,2,3,4,5,6,7,8,a,s',
    ];

    public function users() {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function setDateAttribute($value)
    {
        $this->attributes['date'] = Carbon::createFromFormat('d/m/Y', $value)->format('Y-m-d');
    }

    public function getDateAttribute()
    {
        return Carbon::createFromFormat('Y-m-d', $this->attributes['date'])->format('d/m/Y');
    }

}
