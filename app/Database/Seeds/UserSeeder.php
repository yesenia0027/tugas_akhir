<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
{
    $this->db->table('users')->insert([
        'nama'       => 'Admin',
        'username'   => 'admin',
        'password'   => password_hash('admin123', PASSWORD_DEFAULT),
        'role'       => 'admin',
        'created_at' => date('Y-m-d H:i:s'),
    ]);
}
}
