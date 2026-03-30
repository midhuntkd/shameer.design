<?php

namespace App\Models;

use CodeIgniter\Model;

class PortfolioImageModel extends Model
{
    protected $table         = 'portfolio_images';
    protected $primaryKey    = 'id';
    protected $returnType    = 'array';
    protected $useTimestamps = true;
    protected $allowedFields = [
        'portfolio_id',
        'image_path',
        'caption',
        'sort_order',
    ];
}
