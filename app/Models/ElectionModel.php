<?php

namespace App\Models;

use CodeIgniter\Model;

class ElectionModel extends Model
{
    protected $table = 'elections';
    protected $primaryKey = 'id';
    protected $allowedFields = ['election_title', 'start_date', 'end_date'];
}
