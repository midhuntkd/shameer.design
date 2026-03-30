<?php

namespace App\Models;

use CodeIgniter\Model;

class HomeBannerModel extends Model
{
    protected $table         = 'home_banners';
    protected $primaryKey    = 'id';
    protected $returnType    = 'array';
    protected $useTimestamps = true;
    protected $allowedFields = [
        'title',
        'year',
        'type',
        'image_path',
        'link_url',
        'sort_order',
        'is_active',
    ];
}
