<?php

namespace Database\Seeders;

use App\Models\Transaction;
use App\Models\User;
use Illuminate\Database\Seeder;
use JsonException;

class TransactionSeeder extends Seeder
{
    /**
     * @throws JsonException
     */
    public function run(): void
    {
        $transactionsFile = file_get_contents('storage/app/transactions.json');

        $transactions = json_decode($transactionsFile, true, 512, JSON_THROW_ON_ERROR | JSON_UNESCAPED_SLASHES);


        foreach ($transactions['transactions'] as $transaction) {
            Transaction::create([
                'paid_amount' => $transaction['paidAmount'],
                'currency' => $transaction['Currency'],
                'status_code' => $transaction['statusCode'],
                'user_id' => User::all()->random()->id,
            ]);
        }

    }
}
