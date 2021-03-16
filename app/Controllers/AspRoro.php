<?php

namespace App\Controllers;

use App\Models\AspRoroModel;
use CodeIgniter\Controller;


class AspRoro extends BaseController
{




    public function index()
    {

        if (!isset($this->session->user_id)) {
            return redirect()->to('/login'); 
           }
    

        helper(['form','url']);

        $model = new AspRoroModel(); 
   

        $data['asproro'] = $model->read();
        $data['asprorosched'] = $model->read_sched();
        $title['title'] = "RORO - (ROLL ON, ROLL OFF)";
  
        $data['lastupdate'] = $model->lastupdate();
        
        echo view('templates/header',$title);
        echo view('pages/asproro',$data);
        echo view('templates/footer');

    }



    public function add()
    {
        $model = new AspRoroModel(); 

        if ($this->request->getMethod() == 'post' &&  $this->request->getPost('rateid') == '')
        {

            $data = array(

                'asp_id'        =>      '3',
                'destination'   =>      strtoupper(trim($this->request->getPost('destination'))),
                'code'          =>      strtoupper(trim($this->request->getPost('code'))),
                'rates'         =>      strtoupper(trim($this->request->getPost('rates'))),
                'last_update'   =>      date('Y-m-d H:i:s'),
                'user_id'       =>      $this->session->user_id
            );

            $model->save($data);

            $this->session->setFlashdata('msg', 'Rate(s) Added Successfully!');
            return redirect()->to('/asproro');

        }
        elseif ($this->request->getMethod() == 'post' && $this->request->getPost('rateid') != '')
        {

            $data = array(

                'id'            =>        $this->request->getPost('rateid'),
                'asp_id'        =>      '3',
                'destination'   =>      strtoupper(trim($this->request->getPost('destination'))),
                'code'          =>      strtoupper(trim($this->request->getPost('code'))),
                'rates'         =>      strtoupper(trim($this->request->getPost('rates'))),
                'last_update'   =>      date('Y-m-d H:i:s'),
                'user_id'       =>      $this->session->user_id

            );

            $model->save($data);

            $this->session->setFlashdata('msg', 'Rate(s) Updated Successfully!');
            return redirect()->to('/asproro');


        }
        else
        {
            return view('errors/html/error_404');
        }


    }


    public function delete($data = NULL)
    {
        $model = new AspRoroModel();

        if($model->delete($data))
        {
            $this->session->setFlashdata('msg', 'Rate(s) Deleted Successfully!');
            return redirect()->to('/asproro');
            
        }

    }





















    public function addsched()
    {
        $model = new AspRoroModel(); 

        if ($this->request->getMethod() == 'post' &&  $this->request->getPost('schedid') == '')
        {

            $data = array(

                'asp_id'        =>      '3',
                'route'         =>      strtoupper(trim($this->request->getPost('route'))),
                'code'           =>      strtoupper(trim($this->request->getPost('code'))),
                'etd'           =>      strtoupper(trim($this->request->getPost('etd'))),
                'eta'           =>      strtoupper(trim($this->request->getPost('eta'))),
                'last_update'   =>      date('Y-m-d H:i:s'),
                'user_id'       =>      $this->session->user_id
            );

            $model->addsched($data);

            $this->session->setFlashdata('msg', 'Trip Schedule has been Added Successfully!');
            return redirect()->to('/asproro');

        }
        elseif ($this->request->getMethod() == 'post' && $this->request->getPost('schedid') != '')
        {

            $data = array(

                'asp_id'        =>      '3',
                'route'         =>      strtoupper(trim($this->request->getPost('route'))),
                'code'           =>      strtoupper(trim($this->request->getPost('code'))),
                'etd'           =>      strtoupper(trim($this->request->getPost('etd'))),
                'eta'           =>      strtoupper(trim($this->request->getPost('eta'))),
                'last_update'   =>      date('Y-m-d H:i:s'),
                'user_id'       =>      $this->session->user_id

            );

            $model->updatesched($this->request->getPost('schedid'), $data);

            $this->session->setFlashdata('msg', 'Trip Schedule has been Updated Successfully!');
            return redirect()->to('/asproro');


        }
        else
        {
            return view('errors/html/error_404');
        }


    }


    public function deletesched($data = NULL)
    {
        $model = new AspRoroModel();

        $model->deletesched($data);
        
            $this->session->setFlashdata('msg', 'Schedule has been Deleted Successfully!');
            return redirect()->to('/asproro');
            
        

    }









}