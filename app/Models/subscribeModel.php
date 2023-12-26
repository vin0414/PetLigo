<?php

namespace App\Models;

use CodeIgniter\Model;

class subscribeModel extends Model
{
    protected $table      = 'tblmembership';
    protected $primaryKey = 'membershipID';

    protected $useAutoIncrement  = true;
    protected $insertID = 0;
    protected $returnType = 'array';
    protected $userSoftDelete = false;
    protected $protectFields = true;
    protected $allowedFields = ['customerID','Package', 'Status','DateCreated','Fullname','Phone','EmailAddress','Address','paymentMethod','EndDate'];

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