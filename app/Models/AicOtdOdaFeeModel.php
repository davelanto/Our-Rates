<?php

namespace App\Models;

use CodeIgniter\Model;

class AicOtdOdaFeeModel extends Model
{
    
    protected $table = 'aic_serve_area';

    protected $primaryKey = 'id';

    protected $allowedFields = [

        'state','province','city','barangay','zipcode','remarks','last_update','user_id','lead_time','otd_fee','oda_fee','remarks2'

    ];


    public function read()
    {

        $builder = $this->db->table('aic_serve_area');
        $builder->where('remarks','OTD AND ODA Fee');
        $query = $builder->get();
        return $query;

    }


    public function lastupdate()
    {

        $builder = $this->db->table('aic_serve_area a');
        $builder->join('user_tbl b', 'a.user_id = b.user_id','INNER');
        $builder->where('remarks','OTD AND ODA Fee');
        $builder->orderBy('a.id','DESC');
        $builder->limit(1);
        $query = $builder->get();
        return $query->getRow();


    }



}