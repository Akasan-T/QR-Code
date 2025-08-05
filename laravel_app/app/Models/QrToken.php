<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class QrToken extends Model
{

    protected $fillable = ['token','user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    Schema::create('qr_tokens', function (Blueprint $table) {
    $table->id();
    $table->foreignId('user_id')->constrained()->onDelete('cascade');
    $table->uuid('token')->unique();
    $table->timestamps();
});
}
