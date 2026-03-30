<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreatePortfolioMeta extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'portfolio_id' => [
                'type'       => 'INT',
                'constraint' => 11,
                'unsigned'   => true,
            ],
            'meta_key' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
            ],
            'meta_value' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addKey('portfolio_id');
        $this->forge->addForeignKey('portfolio_id', 'portfolios', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('portfolio_meta');
    }

    public function down()
    {
        $this->forge->dropTable('portfolio_meta');
    }
}
