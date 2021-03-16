<?php

namespace App\Models;

use CodeIgniter\Model;

class SeaimportLCLModel extends Model
{
    
    protected $table = 'sea_tbl';

    protected $primaryKey = 'id';

    protected $allowedFields = [
     'sea_air_id', 'group_id', 'charge','currency','amount', 'remarks', 'last_update', 'user_id'
    ];



    public function read()
    {
        $builder = $this->db->table('sea_tbl');
        $builder->where('sea_air_id','4');
        $builder->where('group_id','6');
        $query = $builder->get();


        return $query;

    }

    

    public function getnotes()
    {
        $builder = $this->db->table('notes_tbl');
        $builder->where('sea_air_broke_id','6');
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
        $builder = $this->db->table('sea_tbl a');
        $builder->join('sea_group_tbl c', 'a.group_id = c.group_id', 'INNER');
        $builder->join('user_tbl b','a.user_id = b.user_id', 'INNER');
        $builder->where('a.sea_air_id', '4');
        $builder->where('a.group_id','6');
        $builder->orderBy('a.last_update','DESC');
        $builder->limit(1);
        $query = $builder->get();

        return $query->getRow();
    }




    


}