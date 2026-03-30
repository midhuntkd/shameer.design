<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddPortfolioDetailFields extends Migration
{
    public function up()
    {
        $fields = [
            'industry' => [
                'type'       => 'VARCHAR',
                'constraint' => 150,
                'null'       => true,
            ],
            'project_type' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
                'null'       => true,
            ],
            'roler' => [
                'type'       => 'VARCHAR',
                'constraint' => 150,
                'null'       => true,
            ],
            'main_image_path' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'null'       => true,
            ],
            'project_overview' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'problem_statement' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'key_challenges_identified' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'goals_objectives' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'problem_statement_image1_path' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'null'       => true,
            ],
            'problem_statement_image2_path' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'null'       => true,
            ],
            'research_analysis' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'information_architecture' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'wireframing' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'user_experience_process_img1_path' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'null'       => true,
            ],
            'user_experience_process_img2_path' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'null'       => true,
            ],
            'design_system' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'the_system_included' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'design_system_img1_path' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'null'       => true,
            ],
        ];

        $this->forge->addColumn('portfolios', $fields);
    }

    public function down()
    {
        $this->forge->dropColumn('portfolios', [
            'industry',
            'project_type',
            'roler',
            'main_image_path',
            'project_overview',
            'problem_statement',
            'key_challenges_identified',
            'goals_objectives',
            'problem_statement_image1_path',
            'problem_statement_image2_path',
            'research_analysis',
            'information_architecture',
            'wireframing',
            'user_experience_process_img1_path',
            'user_experience_process_img2_path',
            'design_system',
            'the_system_included',
            'design_system_img1_path',
        ]);
    }
}

