<?php

namespace App\Models;

use CodeIgniter\Model;

class LoginModel extends Model
{

    protected $table = 'user_tbl';

    protected $primaryKey = 'user_id';


    protected $allowedFields = [
        'user_id', 'type_id','username','audit_id', 'user_id', 'timestamp'
    ];




    public function get_user($data)
    {

        $builder = $this->db->table('user_tbl as a');
        $builder->select("*");
        $builder->join('user_type_tbl as b','a.type_id = b.type_id', 'INNER');
        $builder->where('a.username', $data['username']);
        $query = $builder->get();

        return $query->getRow();


    }

    public function audit_trail($data)
    {

        $builder = $this->db->table('login_audit');
        $builder->insert($data);


    }

    

}