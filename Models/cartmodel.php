<?php

namespace App\Models;

use CodeIgniter\Model;

class CartModel extends Model
{
    protected $DBGroup          =   'default';
    protected $table            =   'cart';
    protected $primarykey       =   'ID';
    protected $useAutoIncrement =   true;
    protected $insertID         =   0;
    protected $returnType       =   'array';
    protected $useSoftDeletes   =   false;
    protected $protectFields    =   true;
    protected $allowedFields    =   [
        'id',
        'userid',
        'itemid',
    ];

    function load($params)
    {
        $this->where($params);
        return $this->orderBy('id', 'ASC')->findAll();
    }

}

?>