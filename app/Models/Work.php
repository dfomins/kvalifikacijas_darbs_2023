<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Work extends Model
{
    protected $table = 'work';
    public $primaryKey = 'id';

    // protected $fillable = [
    //     'work_date',
    // ];

    // public function setWorkDateAttribute($value) {
    //     $this->attributes['work_date'] = Carbon::createFromFormat('d/m/Y', $value)->format('Y-m-d');
    // }

}
