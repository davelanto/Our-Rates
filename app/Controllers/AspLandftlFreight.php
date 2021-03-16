<?php

namespace App\Controllers;

use App\Models\AspLandftlFreightModel;
use CodeIgniter\Controller;


class AspLandftlFreight extends BaseController
{




    public function index()
    {

        if (!isset($this->session->user_id)) {
            return redirect()->to('/login'); 
           }
    

        helper(['form','url']);

        $model = new AspLandftlFreightModel(); 
        $title['title'] = "Land Freight - Full Truck Load";
   

        $data['asplandftlfreight'] = $model->read();
        $data['lastupdate'] = $model->lastupdate();
        
        echo view('templates/header',$title);
        echo view('pages/asplandftlfreight',$data);
        echo view('templates/footer');

    }



    public function add()
    {
        $model = new AspLandftlFreightModel(); 

        if ($this->request->getMethod() == 'post' &&  $this->request->getPost('rateid') == '')
        {

            $data = array(

                'asp_id'            =>      '5',
                'province'          =>      strtoupper(trim($this->request->getPost('province'))),
                'areas'             =>      strtoupper(trim($this->request->getPost('areas'))),
                'fourwheeler'       =>      strtoupper(trim($this->request->getPost('fourwheeler'))),
                'sixwheeler'        =>      strtoupper(trim($this->request->getPost('sixwheeler'))),
                'sixwheelerforward' =>      strtoupper(trim($this->request->getPost('sixwheelerforward'))),
                'tenwheeler'        =>      strtoupper(trim($this->request->getPost('tenwheeler'))),
                'last_update'       =>      date('Y-m-d H:i:s'),
                'user_id'           =>      $this->session->user_id
            );

            $model->save($data);

            $this->session->setFlashdata('msg', 'Rate(s) Added Successfully!');
            return redirect()->to('/asplandftlfreight');

        }
        elseif ($this->request->getMethod() == 'post' && $this->request->getPost('rateid') != '')
        {

            $data = array(

                'id'                =>      $this->request->getPost('rateid'),
                'asp_id'            =>      '5',
                'province'          =>      strtoupper(trim($this->request->getPost('province'))),
                'areas'             =>      strtoupper(trim($this->request->getPost('areas'))),
                'fourwheeler'       =>      strtoupper(trim($this->request->getPost('fourwheeler'))),
                'sixwheeler'        =>      strtoupper(trim($this->request->getPost('sixwheeler'))),
                'sixwheelerforward' =>      strtoupper(trim($this->request->getPost('sixwheelerforward'))),
                'tenwheeler'        =>      strtoupper(trim($this->request->getPost('tenwheeler'))),
                'last_update'       =>      date('Y-m-d H:i:s'),
                'user_id'           =>      $this->session->user_id
            );

            $model->save($data);

            $this->session->setFlashdata('msg', 'Rate(s) Updated Successfully!');
            return redirect()->to('/asplandftlfreight');


        }
        else
        {
            return view('errors/html/error_404');
        }


    }


    public function delete($data = NULL)
    {
        $model = new AspLandftlFreightModel();

        if($model->delete($data))
        {
            $this->session->setFlashdata('msg', 'Rate(s) Deleted Successfully!');
            return redirect()->to('/asplandftlfreight');
            
        }

    }



}