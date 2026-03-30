<?php

namespace App\Models;

use CodeIgniter\Model;

class PortfolioSocialMediaModel extends Model
{
    protected $table         = 'portfolio_social_media';
    protected $primaryKey    = 'id';
    protected $returnType    = 'array';
    protected $useTimestamps = true;
    protected $allowedFields = [
        'portfolio_id',
        'image_path',
        'sort_order',
    ];
}
