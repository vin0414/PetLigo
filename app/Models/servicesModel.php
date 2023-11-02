<?php

namespace App\Models;

use CodeIgniter\Model;

class servicesModel extends Model
{
    protected $table      = 'tblservices';
    protected $primaryKey = 'servicesID';

    protected $useAutoIncrement  = true;
    protected $insertID = 0;
    protected $returnType = 'array';
    protected $userSoftDelete = false;
    protected $protectFields = true;
    protected $allowedFields = ['Category','serviceType', 'Charge','Description','DateCreated'];

    protected $validationRules = [];
    protected $validationMessages = [];
    protected $skipValidation = false;
    protected $cleanValidationRules = true;
    
    
    protected $allowCallbacks = true;
    protected $beforeInsert = [];
    protected $afterInsert = [];
    protected $beforeUpdate = [];
    protected $afterUpdate = [];
    protected $beforeFind = [];
    protected $afterFind = [];
    protected $beforeDelete = [];
    protected $afterDelete = [];
}