<?php

namespace App\Models;

use CodeIgniter\Model;

class AicServeAreaModel extends Model
{
    
    protected $table = 'aic_serve_area';

    protected $primaryKey = 'id';

    protected $allowedFields = [

        'state','province','city','barangay','zipcode','remarks','last_update','user_id'

    ];


    public function read()
    {

        $builder = $this->db->table('aic_serve_area');
        $builder->where('remarks', 'SERVE AREAS');
        $query = $builder->get();
        return $query;

    }


    public function lastupdate()
    {

        $builder = $this->db->table('aic_serve_area a');
        $builder->join('user_tbl b', 'a.user_id = b.user_id','INNER');
        $builder->where('remarks','SERVE AREAS');
        $builder->orderBy('a.id','DESC');
        $builder->limit(1);
        $query = $builder->get();
        return $query->getRow();


    }



}