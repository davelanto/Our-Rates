<?php

namespace App\Models;

use CodeIgniter\Model;

class BrokerageModel extends Model
{
    
    protected $table = 'brokerage_tbl';

    protected $primaryKey = 'id';

    protected $allowedFields = [
        'broke_charge_id', 'charge_id', 'charges', 'currency', 'amount', 'remarks', 'last_update', 'user_id',
        'dutiable_value', 'from_price', 'to_price', 'rates'
    ];



    public function read()
    {
        $builder = $this->db->table('brokerage_tbl');
        $builder->where('broke_charge_id','1');
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


    public function getCAO()
    {
        $builder = $this->db->table('brokerage_cao');
        $query = $builder->get();

        return $query;
    }


    public function newcao($data)
    {
        $builder = $this->db->table('brokerage_cao');
        $builder->insert($data);
    }

    public function editcao($data, $id)
    {
        $builder = $this->db->table('brokerage_cao');
        $builder->where("id",$id);
        $builder->update($data);
    }

    public function deletecao($id)
    {
        $builder = $this->db->table('brokerage_cao');
        $builder->where('id',$id);
        $builder->delete();
    }
    

    
    public function getnotes()
    {
        $builder = $this->db->table('notes_tbl');
        $builder->where('notes_for','BrokeConsump');
        $query = $builder->get();

        return $query->getRow();
    }

    public function updatenotes($data,$id)
    {
        $builder = $this->db->table('notes_tbl');
        $builder->where('id',$id);
        $builder->update($data);
    }



    public function lastupdate()
    {
        $builder = $this->db->table('brokerage_tbl a');
        $builder->join('user_tbl b','a.user_id = b.user_id', 'INNER');
        $builder->where('a.broke_charge_id', '1');
        $builder->orderBy('a.last_update','DESC');
        $builder->limit(1);
        $query = $builder->get();

        return $query->getRow();
    }


}