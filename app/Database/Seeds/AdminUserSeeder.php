<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class AdminUserSeeder extends Seeder
{
    public function run()
    {
        $builder = $this->db->table('admin_users');

        $existing = $builder->where('username', 'admin')->countAllResults();
        if ($existing > 0) {
            return;
        }

        $builder->insert([
            'username'      => 'admin',
            'password_hash' => password_hash('Admin@123', PASSWORD_DEFAULT),
            'created_at'    => date('Y-m-d H:i:s'),
            'updated_at'    => date('Y-m-d H:i:s'),
        ]);
    }
}
