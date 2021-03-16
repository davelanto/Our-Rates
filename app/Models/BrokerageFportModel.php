<?php

namespace App\Models;

use CodeIgniter\Model;

class BrokerageFportModel extends Model
{
    
    protected $table = 'brokerage_tbl';

    protected $primaryKey = 'id';

    protected $allowedFields = [
        'broke_charge_id', 'charge_id', 'charges', 'currency', 'amount', 'remarks', 'last_update', 'user_id'
    ];



    public function read()
    {
        $builder = $this->db->table('brokerage_tbl');
        $builder->where('broke_charge_id','3');
        $query = $builder->get();


        return $query;

    }


    public function readAllCharges()
    {  
     
        $builder = $this->db->table('charges_tbl');
        $builder->select("charge_id, charge");
        $where = "charge_id = '5' OR charge_id = '6' OR charge_id = '7' OR charge_id = '8'";
        $builder->where($where);
        $builder->orderBy('charge_id','ASC');
        $query = $builder->get();

        return $query;

    }

    public function lastupdate()
    {
        $builder = $this->db->table('brokerage_tbl a');
        $builder->join('user_tbl b','a.user_id = b.user_id', 'INNER');
        $builder->where('a.broke_charge_id', '3');
        $builder->orderBy('a.last_update','DESC');
        $builder->limit(1);
        $query = $builder->get();

        return $query->getRow();
    }





    public function getNote()
    {
        $builder = $this->db->table('notes_tbl');
        $builder->where('notes_for','BrokeFport');
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