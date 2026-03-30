<?php

namespace App\Models;

use CodeIgniter\Model;

class PortfolioMetaModel extends Model
{
    protected $table         = 'portfolio_meta';
    protected $primaryKey    = 'id';
    protected $returnType    = 'array';
    protected $useTimestamps = true;
    protected $allowedFields = [
        'portfolio_id',
        'meta_key',
        'meta_value',
    ];
}
