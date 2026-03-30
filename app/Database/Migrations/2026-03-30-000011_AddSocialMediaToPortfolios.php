<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddSocialMediaToPortfolios extends Migration
{
    public function up()
    {
        if (!$this->db->fieldExists('social_media', 'portfolios')) {
            $this->forge->addColumn('portfolios', [
                'social_media' => [
                    'type'       => 'TINYINT',
                    'constraint' => 1,
                    'default'    => 0,
                    'after'      => 'is_active',
                ],
            ]);
        }
    }

    public function down()
    {
        if ($this->db->fieldExists('social_media', 'portfolios')) {
            $this->forge->dropColumn('portfolios', 'social_media');
        }
    }
}
