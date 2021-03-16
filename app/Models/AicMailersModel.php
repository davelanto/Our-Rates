<?php

namespace App\Models;

use CodeIgniter\Model;

class AicMailersModel extends Model
{
    
    protected $table = 'aic_mailers';

    protected $primaryKey = 'id';

    protected $allowedFields = [

        'description', 'ncr', 'luzon', 'visayas', 'mindanao', 'last_update', 'user_id', 'category'

    ];


    public function read()
    {

        $builder = $this->db->table('aic_mailers');
        $query = $builder->get();
        return $query;

    }




    public function readCat()
    {
        $builder = $this->db->table('aic_mailers');
        $builder->distinct('category');
        $query = $builder->get();

        return $query;
    }

    public function getNote()
    {
        $builder = $this->db->table('notes_tbl');
        $builder->where('notes_for','AicMailers');
        $query = $builder->get();

        return $query->getRow();

    }


    public function lastupdate()
    {

        $builder = $this->db->table('aic_mailers a');
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