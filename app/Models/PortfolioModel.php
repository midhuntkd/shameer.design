<?php

namespace App\Models;

use CodeIgniter\Model;

class PortfolioModel extends Model
{
    protected $table         = 'portfolios';
    protected $primaryKey    = 'id';
    protected $returnType    = 'array';
    protected $useTimestamps = true;
    protected $allowedFields = [
        'slug',
        'title',
        'year',
        'url',
        'live_url',
        'short_description',
        'content',
        'cover_image_path',
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
        'published_at',
        'sort_order',
        'is_active',
        'social_media',
    ];
}
