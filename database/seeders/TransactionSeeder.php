<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Transaction;
use App\Models\User;

class TransactionSeeder extends Seeder
{
    public function run(): void
    {
        $user = User::first() ?? User::factory()->create([
            'name' => 'Usuário Teste',
            'email' => 'teste@example.com',
            'password' => bcrypt('12345678'),
        ]);

        Transaction::factory()->count(10)->create([
            'user_id' => $user->id,
        ]);
    }
}
