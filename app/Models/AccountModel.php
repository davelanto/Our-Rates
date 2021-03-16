<?php namespace App\Models;

use CodeIgniter\Model;

class AccountModel extends Model
{
    
    protected $table = 'user_tbl';

    protected $primaryKey = 'user_id';

    protected $allowedFields = [
        'user_id', 'type_id', 'username', 'password', 'first_name', 'last_name',
        'last_updated'
    ];




    public function read()
    {
        $builder = $this->db->table('user_tbl a');
        $builder->join('user_type_tbl b', 'a.type_id = b.type_id','INNER');
        $query = $builder->get();

        return $query;

    }


}