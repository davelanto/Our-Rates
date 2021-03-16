<?php

namespace App\Models;

use CodeIgniter\Model;

class AicOwnPackagingModel extends Model
{
    
    protected $table = 'aic_own_packaging';

    protected $primaryKey = 'id';

    protected $allowedFields = [

      'id','location','onekg','twokg','threekg','excess','last_update','user_id'

    ];


    public function read()
    {

        $builder = $this->db->table('aic_own_packaging');
        $query = $builder->get();
        return $query;

    }


    public function getNote()
    {
        $builder = $this->db->table('notes_tbl');
        $builder->where('aic_id','5');
        $query = $builder->get();

        return $query->getRow();

    }


    public function lastupdate()
    {

        $builder = $this->db->table('aic_own_packaging a');
        $builder->join('user_tbl b', 'a.user_id = b.user_id','INNER');
        $builder->orderBy('a.id','DESC');
        $builder->limit(1);
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