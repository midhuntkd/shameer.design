<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreatePortfolioSocialMedia extends Migration
{
    public function up()
    {
        if ($this->db->tableExists('portfolio_social_media')) {
            return;
        }

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
            'image_path' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
            ],
            'sort_order' => [
                'type'       => 'INT',
                'constraint' => 11,
                'default'    => 0,
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
        $this->forge->createTable('portfolio_social_media');
    }

    public function down()
    {
        $this->forge->dropTable('portfolio_social_media');
    }
}
