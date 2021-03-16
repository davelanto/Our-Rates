<?php

namespace App\Controllers;

use App\Models\AspWarehousingModel;
use CodeIgniter\Controller;


class AspWarehousing extends BaseController
{




    public function index()
    {

        if (!isset($this->session->user_id)) {
            return redirect()->to('/login'); 
           }
    

        helper(['form','url']);

        $model = new AspWarehousingModel(); 
   

        $data['aspwarehousing'] = $model->read();
        $data['note'] = $model->getNote();
        $data['lastupdate'] = $model->lastupdate();
        $title['title'] = "Warehousing";
        
        echo view('templates/header',$title);
        echo view('pages/aspwarehousing',$data);
        echo view('templates/footer');

    }



    public function add()
    {
        $model = new AspWarehousingModel(); 

        if ($this->request->getMethod() == 'post' &&  $this->request->getPost('rateid') == '')
        {

            $data = array(

                'asp_id'        =>      '6',
                'services'      =>      trim($this->request->getPost('services')),
                'particulars'   =>      trim($this->request->getPost('particulars')),
                'rate'          =>      trim($this->request->getPost('rate')),
                'last_update'   =>      date('Y-m-d H:i:s'),
                'user_id'       =>      $this->session->user_id
            );

            $model->save($data);

            $this->session->setFlashdata('msg', 'Rates(s) Added Successfully!');
            return redirect()->to('/aspwarehousing');

        }
        elseif ($this->request->getMethod() == 'post' && $this->request->getPost('rateid') != '')
        {

            $data = array(

                'id'            =>      $this->request->getPost('rateid'),
                'asp_id'        =>      '6',
                'services'      =>      trim($this->request->getPost('services')),
                'particulars'   =>      trim($this->request->getPost('particulars')),
                'rate'          =>      trim($this->request->getPost('rate')),
                'last_update'   =>      date('Y-m-d H:i:s'),
                'user_id'       =>      $this->session->user_id


            );

            $model->save($data);

            $this->session->setFlashdata('msg', 'Rates(s) Updated Successfully!');
            return redirect()->to('/aspwarehousing');


        }
        else
        {
            return view('errors/html/error_404');
        }


    }


    public function delete($data = NULL)
    {
        $model = new AspWarehousingModel();

        if($model->delete($data))
        {
            $this->session->setFlashdata('msg', 'Rate(s) Deleted Successfully!');
            return redirect()->to('/aspwarehousing');
            
        }

    }


    public function updatenotes()
    {
        $model = new AspWarehousingModel();

        if($this->request->getMethod() == 'post')
        {

            $data = array(

                'notes '        =>      $this->request->getPost('notes'),
                'last_update'   =>      date('Y-m-d H:i:s'),
                'user_id'       =>      $this->session->user_id

            );


            $model->updatenotes($data,$this->request->getPost('noteid'));
            $this->session->setFlashdata('msg', 'Note(s) Updated Successfully!');
            return redirect()->to('/aspwarehousing');


        }
        else
        {
      
           return view('errors/html/error_404');
          
        }
    }



}