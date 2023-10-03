<?php

namespace App\Models;

use CodeIgniter\Model;

class CandidateModel extends Model
{
    protected $table = 'tbl_candidate';
    protected $primaryKey = 'id';
    protected $allowedFields = ['student_email', 'position_id', 'description', 'manifesto_file'];
}
