<?php

namespace App\Controllers;

use App\Models\AspSeaFreightFCLModel;
use CodeIgniter\Controller;


class AspSeaFreightFCL extends BaseController
{




    public function index()
    {

        if (!isset($this->session->user_id)) {
            return redirect()->to('/login'); 
           }
    

        helper(['form','url']);

        $model = new AspSeaFreightFCLModel(); 
   

        $data['aspseafreightfcl'] = $model->read();
        $data['note'] = $model->getNote();
        $data['lastupdate'] = $model->lastupdate();
        $title['title']="Sea Freight Rate FCL";
        
        echo view('templates/header',$title);
        echo view('pages/aspseafreightfcl',$data);
        echo view('templates/footer');

    }



    public function add()
    {
        $model = new AspSeaFreightFCLModel(); 

        if ($this->request->getMethod() == 'post' &&  $this->request->getPost('rateid') == '')
        {

            $data = array(

                'asp_id'        =>      '7',
                'destination'   =>      trim($this->request->getPost('destination')),
                'freight_cost'  =>      trim($this->request->getPost('freight_cost')),
                'last_update'   =>      date('Y-m-d H:i:s'),
                'user_id'       =>      $this->session->user_id
            );

            $model->save($data);

            $this->session->setFlashdata('msg', 'Rates(s) Added Successfully!');
            return redirect()->to('/aspseafreightfcl');

        }
        elseif ($this->request->getMethod() == 'post' && $this->request->getPost('rateid') != '')
        {

            $data = array(

                'id'            =>      $this->request->getPost('rateid'),
                'asp_id'        =>      '7',
                'destination'   =>      trim($this->request->getPost('destination')),
                'freight_cost'  =>      trim($this->request->getPost('freight_cost')),
                'last_update'   =>      date('Y-m-d H:i:s'),
                'user_id'       =>      $this->session->user_id


            );

            $model->save($data);

            $this->session->setFlashdata('msg', 'Rates(s) Updated Successfully!');
            return redirect()->to('/aspseafreightfcl');


        }
        else
        {
            return view('errors/html/error_404');
        }


    }


    public function delete($data = NULL)
    {
        $model = new AspSeaFreightFCLModel();

        if($model->delete($data))
        {
            $this->session->setFlashdata('msg', 'Rate(s) Deleted Successfully!');
            return redirect()->to('/aspseafreightfcl');
            
        }

    }


    public function updatenotes()
    {
        $model = new AspSeaFreightFCLModel();

        if($this->request->getMethod() == 'post')
        {

            $data = array(

                'notes '        =>      $this->request->getPost('notes'),
                'last_update'   =>      date('Y-m-d H:i:s'),
                'user_id'       =>      $this->session->user_id

            );


            $model->updatenotes($data,$this->request->getPost('noteid'));
            $this->session->setFlashdata('msg', 'Note(s) Updated Successfully!');
            return redirect()->to('/aspseafreightfcl');


        }
        else
        {
      
           return view('errors/html/error_404');
          
        }
    }



}