<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddYearAndTypeToHomeBanners extends Migration
{
    public function up()
    {
        $fields = [
            'year' => [
                'type' => 'VARCHAR',
                'constraint' => 20,
                'null' => true,
                'after' => 'title',
            ],
            'type' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
                'null' => true,
                'after' => 'year',
            ],
        ];

        $this->forge->addColumn('home_banners', $fields);
    }

    public function down()
    {
        $this->forge->dropColumn('home_banners', ['year', 'type']);
    }
}
