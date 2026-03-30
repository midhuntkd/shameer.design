<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddMorePortfolioDetailFields extends Migration
{
    public function up()
    {
        $fields = [
            'design_system_img2_path' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'null'       => true,
            ],
            'design_system_img3_path' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'null'       => true,
            ],
            'ui_design' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'design_highlights' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'ui_design_img1_path' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'null'       => true,
            ],
            'ui_design_img2_path' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'null'       => true,
            ],
            'ui_design_img3_path' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'null'       => true,
            ],
            'ui_design_img4_path' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'null'       => true,
            ],
            'responsive_design' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'special_attention_given_to' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'responsive_design_img1_path' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'null'       => true,
            ],
            'responsive_design_img2_path' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'null'       => true,
            ],
            'responsive_design_img3_path' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'null'       => true,
            ],
            'final_outcome' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'key_learnings' => [
                'type' => 'TEXT',
                'null' => true,
            ],
        ];

        $this->forge->addColumn('portfolios', $fields);
    }

    public function down()
    {
        $this->forge->dropColumn('portfolios', [
            'design_system_img2_path',
            'design_system_img3_path',
            'ui_design',
            'design_highlights',
            'ui_design_img1_path',
            'ui_design_img2_path',
            'ui_design_img3_path',
            'ui_design_img4_path',
            'responsive_design',
            'special_attention_given_to',
            'responsive_design_img1_path',
            'responsive_design_img2_path',
            'responsive_design_img3_path',
            'final_outcome',
            'key_learnings',
        ]);
    }
}

