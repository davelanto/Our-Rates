<?php

namespace App\Controllers;

use App\Models\AspLandFreightModel;
use CodeIgniter\Controller;


class AspLandFreight extends BaseController
{




    public function index()
    {

        if (!isset($this->session->user_id)) {
            return redirect()->to('/login'); 
           }
    

        helper(['form','url']);

        $model = new AspLandFreightModel(); 
   

        $data['asplandfreight'] = $model->read();
        $data['note'] = $model->getNote();
        $data['lastupdate'] = $model->lastupdate();
        $title['title'] = "Land Freight - Loose Truck Load";
        echo view('templates/header',$title);
        echo view('pages/asplandfreight',$data);
        echo view('templates/footer');

    }



         public function add()
    {
        $model = new AspLandFreightModel(); 

        if ($this->request->getMethod() == 'post' &&  $this->request->getPost('rateid') == '')
        {

            $data = array(

                'asp_id'            =>      '4',
                'destination'       =>      strtoupper(trim($this->request->getPost('destination'))),
                'area'              =>      strtoupper(trim($this->request->getPost('area'))),
                'perkg'             =>      strtoupper(trim($this->request->getPost('perkg'))),
                'percbm'            =>      strtoupper(trim($this->request->getPost('percbm'))),
                'last_update'       =>      date('Y-m-d H:i:s'),
                'user_id'           =>      $this->session->user_id
            );

            $model->save($data);

            $this->session->setFlashdata('msg', 'Rate(s) Added Successfully!');
            return redirect()->to('/asplandfreight');

        }
        elseif ($this->request->getMethod() == 'post' && $this->request->getPost('rateid') != '')
        {

            $data = array(

                'id'            =>        $this->request->getPost('rateid'),
                'asp_id'            =>      '4',
                'destination'       =>      strtoupper(trim($this->request->getPost('destination'))),
                'area'              =>      strtoupper(trim($this->request->getPost('area'))),
                'perkg'             =>      strtoupper(trim($this->request->getPost('perkg'))),
                'percbm'            =>      strtoupper(trim($this->request->getPost('percbm'))),
                'last_update'       =>      date('Y-m-d H:i:s'),
                'user_id'           =>      $this->session->user_id

            );

            $model->save($data);

            $this->session->setFlashdata('msg', 'Rate(s) Updated Successfully!');
            return redirect()->to('/asplandfreight');


        }
        else
        {
            return view('errors/html/error_404');
        }


    }


    public function delete($data = NULL)
    {
        $model = new AspLandFreightModel();

        if($model->delete($data))
        {
            $this->session->setFlashdata('msg', 'Rate(s) Deleted Successfully!');
            return redirect()->to('/asplandfreight');
            
        }

    }




    public function updatenotes()
    {
        $model = new AspLandFreightModel();

        if($this->request->getMethod() == 'post')
        {

            $data = array(

                'notes '        =>      $this->request->getPost('notes'),
                'last_update'   =>      date('Y-m-d H:i:s'),
                'user_id'       =>      $this->session->user_id

            );


            $model->updatenotes($data,$this->request->getPost('noteid'));
            $this->session->setFlashdata('msg', 'Note(s) Updated Successfully!');
            return redirect()->to('/asplandfreight');


        }
        else
        {
      
           return view('errors/html/error_404');
          
        }
    }










}