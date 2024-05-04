<?php

namespace App\Models;

use CodeIgniter\Model;

class MarketModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'item';
    protected $primaryKey       = 'itemid';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        "itemid",
        "itemname",
        "itemdesc",
        "itemprice",
        "useritem",
        "userid",
        "imageitem",
    ];
    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];

    function load($params)
    {
        $this->where($params);
        return $this->orderBy('itemid','ASC')->findAll();
    }
    
    function cari($params1)
    {
        $this->like('itemname', $params1);
        return $this->orderBy('itemname','ASC')->findAll();
    }
}

?>