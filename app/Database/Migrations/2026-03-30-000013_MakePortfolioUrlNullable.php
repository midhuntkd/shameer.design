<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class MakePortfolioUrlNullable extends Migration
{
    public function up()
    {
        if ($this->db->fieldExists('url', 'portfolios')) {
            $this->forge->modifyColumn('portfolios', [
                'url' => [
                    'type' => 'VARCHAR',
                    'constraint' => 255,
                    'null' => true,
                ],
            ]);
        }

        if ($this->db->fieldExists('live_url', 'portfolios')) {
            $this->forge->modifyColumn('portfolios', [
                'live_url' => [
                    'type' => 'VARCHAR',
                    'constraint' => 255,
                    'null' => true,
                ],
            ]);
        }
    }

    public function down()
    {
        if ($this->db->fieldExists('url', 'portfolios')) {
            $this->forge->modifyColumn('portfolios', [
                'url' => [
                    'type' => 'VARCHAR',
                    'constraint' => 255,
                    'null' => false,
                ],
            ]);
        }

        if ($this->db->fieldExists('live_url', 'portfolios')) {
            $this->forge->modifyColumn('portfolios', [
                'live_url' => [
                    'type' => 'VARCHAR',
                    'constraint' => 255,
                    'null' => false,
                ],
            ]);
        }
    }
}
