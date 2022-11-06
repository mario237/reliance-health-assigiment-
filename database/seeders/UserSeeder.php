<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use JsonException;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     * @throws JsonException
     */
    public function run(): void
    {
        $usersFile = file_get_contents('storage/app/users.json');

        $users = json_decode($usersFile, true, 512, JSON_THROW_ON_ERROR | JSON_UNESCAPED_SLASHES);

        foreach ($users['users'] as $user) {
            $user['password'] = bcrypt('123456789');
            User::create($user);
        }
    }
}
