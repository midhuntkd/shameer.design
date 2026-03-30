<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class SyncBannerAndPortfolioRecentFields extends Migration
{
    public function up()
    {
        $this->syncHomeBannerFields();
        $this->syncPortfolioFields();
    }

    public function down()
    {
        $this->dropIfExists('home_banners', ['year', 'type']);

        $this->dropIfExists('portfolios', [
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

    private function syncHomeBannerFields(): void
    {
        $fields = [];

        if (!$this->db->fieldExists('year', 'home_banners')) {
            $fields['year'] = [
                'type' => 'VARCHAR',
                'constraint' => 20,
                'null' => true,
                'after' => 'title',
            ];
        }

        if (!$this->db->fieldExists('type', 'home_banners')) {
            $fields['type'] = [
                'type' => 'VARCHAR',
                'constraint' => 100,
                'null' => true,
                'after' => isset($fields['year']) ? 'year' : 'title',
            ];
        }

        if (!empty($fields)) {
            $this->forge->addColumn('home_banners', $fields);
        }
    }

    private function syncPortfolioFields(): void
    {
        $definitions = [
            'industry' => [
                'type' => 'VARCHAR',
                'constraint' => 150,
                'null' => true,
            ],
            'project_type' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
                'null' => true,
            ],
            'roler' => [
                'type' => 'VARCHAR',
                'constraint' => 150,
                'null' => true,
            ],
            'main_image_path' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
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
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'problem_statement_image2_path' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
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
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'user_experience_process_img2_path' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
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
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'design_system_img2_path' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'design_system_img3_path' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
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
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'ui_design_img2_path' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'ui_design_img3_path' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'ui_design_img4_path' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
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
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'responsive_design_img2_path' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'responsive_design_img3_path' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
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

        $missing = [];
        foreach ($definitions as $column => $definition) {
            if (!$this->db->fieldExists($column, 'portfolios')) {
                $missing[$column] = $definition;
            }
        }

        if (!empty($missing)) {
            $this->forge->addColumn('portfolios', $missing);
        }
    }

    private function dropIfExists(string $table, array $columns): void
    {
        $drop = [];

        foreach ($columns as $column) {
            if ($this->db->fieldExists($column, $table)) {
                $drop[] = $column;
            }
        }

        if (!empty($drop)) {
            $this->forge->dropColumn($table, $drop);
        }
    }
}
