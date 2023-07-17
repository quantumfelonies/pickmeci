<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'tbl_user';
    protected $primaryKey = 'email';
    protected $allowedFields = ['email', 'first_name' , 'last_name' , 'otp_code'];

    public function updateByEmail($email, $data)
    {
        $builder = $this->db->table($this->table);
        $builder->where('email', $email);
        $builder->update($data);
    }
}
