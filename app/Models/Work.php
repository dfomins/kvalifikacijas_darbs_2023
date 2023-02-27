<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

use App\Models\User;

class Work extends Model
{
    protected $table = 'work';
    public $primaryKey = 'id';

    protected $fillable = [
        'work_date',
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function setWorkDateAttribute($value) {
        $this->attributes['work_date'] = Carbon::createFromFormat('d/m/Y', $value)->format('Y-m-d');
    }

}
