<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PointHistory extends Model
{
    protected $fillable = ['user_id','reason','earned_at'];

    public $timestamps = false;  // earned_atだけ使うのでこれでOK

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}