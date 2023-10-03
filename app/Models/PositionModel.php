<?php

namespace App\Models;

use CodeIgniter\Model;

class PositionModel extends Model
{
    protected $table = 'tbl_position';
    protected $primaryKey = 'id';
    protected $allowedFields = ['position_name'];
}
