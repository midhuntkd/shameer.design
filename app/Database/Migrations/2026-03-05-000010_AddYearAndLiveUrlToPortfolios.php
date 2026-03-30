<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddYearAndLiveUrlToPortfolios extends Migration
{
    public function up()
    {
        $fields = [];

        if (!$this->db->fieldExists('year', 'portfolios')) {
            $fields['year'] = [
                'type' => 'VARCHAR',
                'constraint' => 20,
                'null' => true,
                'after' => 'title',
            ];
        }

        if (!$this->db->fieldExists('url', 'portfolios') && !$this->db->fieldExists('live_url', 'portfolios')) {
            $fields['url'] = [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
                'after' => isset($fields['year']) ? 'year' : 'title',
            ];
        }

        if (!empty($fields)) {
            $this->forge->addColumn('portfolios', $fields);
        }
    }

    public function down()
    {
        $drop = [];

        if ($this->db->fieldExists('year', 'portfolios')) {
            $drop[] = 'year';
        }

        if ($this->db->fieldExists('url', 'portfolios')) {
            $drop[] = 'url';
        }

        if ($this->db->fieldExists('live_url', 'portfolios')) {
            $drop[] = 'live_url';
        }

        if (!empty($drop)) {
            $this->forge->dropColumn('portfolios', $drop);
        }
    }
}
