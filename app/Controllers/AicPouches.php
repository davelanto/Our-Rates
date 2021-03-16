<?php

namespace App\Controllers;

use App\Models\AicPouchesModel;
use CodeIgniter\Controller;


class AicPouches extends BaseController
{




    public function index()
    {

        if (!isset($this->session->user_id)) {
            return redirect()->to('/login'); 
           }
    

        helper(['form','url']);

        $model = new AicPouchesModel(); 
        $title['title'] = "Pouches";

        $data['aicpouches'] = $model->read();
        $data['note'] = $model->getNote();
        $data['lastupdate'] = $model->lastupdate();
        
        echo view('templates/header',$title);
        echo view('pages/aicpouches',$data);
        echo view('templates/footer');

    }



    public function add()
    {
        $model = new AicPouchesModel(); 

        if ($this->request->getMethod() == 'post' &&  $this->request->getPost('rateid') == '')
        {

            $data = array(
     
                'description'   =>      trim($this->request->getPost('description')),
                'ncr'           =>      trim($this->request->getPost('ncr')),
                'luzon'         =>      trim($this->request->getPost('luzon')),
                'visayas'       =>      trim($this->request->getPost('visayas')),
                'mindanao'      =>      trim($this->request->getPost('mindanao')),
                'last_update'   =>      date('Y-m-d H:i:s'),
                'user_id'       =>      $this->session->user_id,
                'category'      =>      trim($this->request->getPost('category'))
            );

            $model->save($data);

            $this->session->setFlashdata('msg', 'Rates(s) Added Successfully!');
            return redirect()->to('/aicpouches');

        }
        elseif ($this->request->getMethod() == 'post' && $this->request->getPost('rateid') != '')
        {

            $data = array(

                'id'            =>      $this->request->getPost('rateid'),
                'description'   =>      trim($this->request->getPost('description')),
                'ncr'           =>      trim($this->request->getPost('ncr')),
                'luzon'         =>      trim($this->request->getPost('luzon')),
                'visayas'       =>      trim($this->request->getPost('visayas')),
                'mindanao'      =>      trim($this->request->getPost('mindanao')),
                'last_update'   =>      date('Y-m-d H:i:s'),
                'user_id'       =>      $this->session->user_id,
                'category'      =>      trim($this->request->getPost('category'))


            );

            $model->save($data);

            $this->session->setFlashdata('msg', 'Rates(s) Updated Successfully!');
            return redirect()->to('/aicpouches');


        }
        else
        {
            return view('errors/html/error_404');
        }


    }


    public function delete($data = NULL)
    {
        $model = new AicPouchesModel();

        if($model->delete($data))
        {
            $this->session->setFlashdata('msg', 'Rate(s) Deleted Successfully!');
            return redirect()->to('/aicpouches');
            
        }

    }


    public function updatenotes()
    {
        $model = new AicPouchesModel();

        if($this->request->getMethod() == 'post')
        {

            $data = array(

                'notes '        =>      $this->request->getPost('notes'),
                'last_update'   =>      date('Y-m-d H:i:s'),
                'user_id'       =>      $this->session->user_id

            );


            $model->updatenotes($data,$this->request->getPost('noteid'));
            $this->session->setFlashdata('msg', 'Note(s) Updated Successfully!');
            return redirect()->to('/aicpouches');


        }
        else
        {
      
           return view('errors/html/error_404');
          
        }
    }



}