<?php

namespace App\Models;

use CodeIgniter\Model;

class VoterModel extends Model{
//  public function getVerifiedUsers() {
//         $this->db->where ('is_verified', 1);
//         $query = $this->db->get('tbl_user');
//         return $query->result();
//     }

    protected $table = 'tbl_user';
    protected $primaryKey = 'email';
    protected $allowedFields = ['email', 'first_name', 'last_name', 'is_verified'];
        
    public function getVerifiedUsers()
    {
        return $this->where('is_verified', '1')
                    ->findAll();
    }
}

?>