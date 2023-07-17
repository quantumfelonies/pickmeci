<?php

namespace App\Models;

use CodeIgniter\Model;

class ElectionModel extends Model
{
    protected $table = 'tbl_election';
    protected $primaryKey = 'id';
    protected $allowedFields = ['election_title', 'start_date', 'end_date'];
}
