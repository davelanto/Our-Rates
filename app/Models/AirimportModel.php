<?php

namespace App\Models;

use CodeIgniter\Model;

class AirimportModel extends Model
{
    
    protected $table = 'air_tbl';

    protected $primaryKey = 'id';

    protected $allowedFields = [

        'sea_air_id','pol', 'pod', 'charge_id' ,'carrier',
        'validity', 'min', 'nor', 'fortyfive', 'hundred', 'twofifty',
        'threehundred', 'fivehundred', 'thousand', 'fsc','ssc',
        'tcc', 'awbfee', 'ens_ams','frequency',
        'routing','tt','comments','last_update','user_id'

    ];


    public function read()
    {
        $builder = $this->db->table('air_tbl');
        $builder->where('sea_air_id', '2');
        $query = $builder->get();


        return $query;
    }


    public function lastupdate()
    {
        $builder = $this->db->table('air_tbl a');
        $builder->join('user_tbl b','a.user_id = b.user_id', 'INNER');
        $builder->where('a.sea_air_id', '2');
        $builder->orderBy('a.last_update','DESC');
        $builder->limit(1);
        $query = $builder->get();

        return $query->getRow();
    }



    public function getNote()
    {
        $builder = $this->db->table('notes_tbl');
        $builder->where('notes_for','AirImport');
        $query = $builder->get();

        return $query->getRow();

    }


    public function updatenotes($data,$id)
    {
        $builder = $this->db->table('notes_tbl');
        $builder->where('id',$id);
        $builder->update($data);
    }


    



}