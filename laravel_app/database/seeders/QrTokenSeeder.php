<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\User;
use App\Models\QrToken;

class QrTokenSeeder extends Seeder
{
    public function run()
    {
        $users = User::all();
        foreach ($users as $user) {
            QrToken::create([
                'user_id' => $user->id,
                'token' => Str::uuid(),
            ]);
        }
    }
    
}
