<?php

namespace App\Controllers;

use App\Models\AspAirFreightModel;
use CodeIgniter\Controller;


class AspAirFreight extends BaseController
{




    public function index()
    {

        if (!isset($this->session->user_id)) {
            return redirect()->to('/login'); 
           }
    

        helper(['form','url']);

        $model = new AspAirFreightModel(); 
   

        $data['aspairfreight'] = $model->read();
        $data['note'] = $model->getNote();
        $data['lastupdate'] = $model->lastupdate();
        $title['title'] = "Air Freight Rate";
        
        echo view('templates/header',$title);
        echo view('pages/aspairfreight',$data);
        echo view('templates/footer');

    }



    public function add()
    {
        $model = new AspAirFreightModel(); 

        if ($this->request->getMethod() == 'post' &&  $this->request->getPost('rateid') == '')
        {

            $data = array(

                'asp_id'        =>      '1',
                'destination'   =>      trim($this->request->getPost('destination')),
                'min'           =>      trim($this->request->getPost('min')),
                'dtd'           =>      trim($this->request->getPost('dtd')),
                'last_update'   =>      date('Y-m-d H:i:s'),
                'user_id'       =>      $this->session->user_id
            );

            $model->save($data);

            $this->session->setFlashdata('msg', 'Rate(s) Added Successfully!');
            return redirect()->to('/aspairfreight');

        }
        elseif ($this->request->getMethod() == 'post' && $this->request->getPost('rateid') != '')
        {

            $data = array(

                'id'            =>        $this->request->getPost('rateid'),
                'asp_id'        =>        '1',
                'destination'   =>        trim($this->request->getPost('destination')),
                'min'           =>        trim($this->request->getPost('min')),
                'dtd'           =>        trim($this->request->getPost('dtd')),
                'last_update'   =>        date('Y-m-d H:i:s'),
                'user_id'       =>        $this->session->user_id

            );

            $model->save($data);

            $this->session->setFlashdata('msg', 'Rate(s) Updated Successfully!');
            return redirect()->to('/aspairfreight');


        }
        else
        {
            return view('errors/html/error_404');
        }


    }


    public function delete($data = NULL)
    {
        $model = new AspAirFreightModel();

        if($model->delete($data))
        {
            $this->session->setFlashdata('msg', 'Rate(s) Deleted Successfully!');
            return redirect()->to('/aspairfreight');
            
        }

    }


    public function updatenotes()
    {
        $model = new AspAirFreightModel();

        if($this->request->getMethod() == 'post')
        {

            $data = array(

                'notes '        =>      $this->request->getPost('notes'),
                'last_update'   =>      date('Y-m-d H:i:s'),
                'user_id'       =>      $this->session->user_id

            );


            $model->updatenotes($data,$this->request->getPost('noteid'));
            $this->session->setFlashdata('msg', 'Note(s) Updated Successfully!');
            return redirect()->to('/aspairfreight');


        }
        else
        {
      
           return view('errors/html/error_404');
          
        }
    }



}