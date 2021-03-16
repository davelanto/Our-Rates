<?php

namespace App\Models;

use CodeIgniter\Model;

class AspRoroModel extends Model
{
    
    protected $table = 'asp_roro_rates';

    protected $primaryKey = 'id';

    protected $allowedFields = [

        'asp_id', 'destination', 'code', 'rates', 'etd', 'eta', 'route', 'last_update', 'user_id'

    ];


    public function read()
    {

        $builder = $this->db->table('asp_roro_rates');
        $builder->where('asp_id', '3');
        $query = $builder->get();
        return $query;

    }


    public function read_sched()
    {
        $builder = $this->db->table('asp_roro_sched');
        $builder->orderBy('id', 'ASC');
      

        $query = $builder->get();

        return $query;
    }



    public function lastupdate()
    {

        $builder = $this->db->table('asp_roro_rates a');
        $builder->join('user_tbl b', 'a.user_id = b.user_id','INNER');
        $builder->join('asp_tbl c', 'a.asp_id = c.asp_id','INNER');
        $builder->where('c.asp_header','RORO (ROLL ON, ROLL OFF)');
        $query = $builder->get();

        return $query->getRow();


    }



    public function deletesched($data)
    {
        $builder = $this->db->table('asp_roro_sched');
        $builder->where('id', $data);
        $builder->delete();


    }



    public function addsched($data)
    {
        $builder = $this->db->table('asp_roro_sched');
        $builder->insert($data);
    }

    public function updatesched($id,$data)
    {
        $builder = $this->db->table('asp_roro_sched');
        $builder->set($data);
        $builder->where('id',$id);
        $builder->update();

    }



}