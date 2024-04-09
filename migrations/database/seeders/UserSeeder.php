<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Popoliamo manualmente il DB nella tabella users con dei dati iniziali

        /* $sql="INSERT INTO users (name, email, password, created_at) VALUES (?,?,?,?)";

        DB::insert($sql, [
            'Mario Rossi',
            'email@email.com',
            Hash::make('PassWord950012'),
            Carbon::now(),
    ]); */

    // Popoliamo il DB automaticamente con una classe Factory

    User::factory()->count(5)->create();
    }
}
