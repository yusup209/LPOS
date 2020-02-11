<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'nama' => "Superadmin",
            'kontak' => '081312312312',
            'alamat' => 'Jl. SMEA 6',
            'username' => 'superadmin',
            'password' => Hash::make('superadmin'),
            'id_koperasi' => 1,
            'foto' => 'superadmin.png',
            'hak_akses' => 'superadmin'
        ]);
    }
}
