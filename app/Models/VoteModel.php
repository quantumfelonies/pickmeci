<?php

namespace App\Models;

use CodeIgniter\Model;

class VoteModel extends Model
{
    protected $table = 'tbl_vote';

    public function getVoteCounts()
    {
        $builder = $this->db->table($this->table);
        $builder->select('student_email, COUNT(*) as count');
        $builder->groupBy('student_email');
        $query = $builder->get();
        return $query->getResultArray();
    }
}