<?php

namespace App\Models;

use CodeIgniter\Model;

class AspLandftlFreightModel extends Model
{
    
    protected $table = 'asp_land_ftl_freight';

    protected $primaryKey = 'id';

    protected $allowedFields = [

        'asp_id', 'province', 'areas', 'fourwheeler', 'sixwheeler', 'sixwheelerforward',
        'tenwheeler', 'last_update', 'user_id'

    ];


    public function read()
    {

        $builder = $this->db->table('asp_land_ftl_freight');
        $builder->where('asp_id', '5');
        $query = $builder->get();


        return $query;

    }



    public function lastupdate()
    {

        $builder = $this->db->table('asp_land_ftl_freight a');
        $builder->join('user_tbl b', 'a.user_id = b.user_id','INNER');
        $builder->join('asp_tbl c', 'a.asp_id = c.asp_id','INNER');
        $builder->where('c.asp_header','AIR FREIGHT RATE');
        $query = $builder->get();

        return $query->getRow();


    }




}