<?php

namespace App\Controllers;

use App\Models\AicOwnPackagingModel;
use CodeIgniter\Controller;


class AicOwnPackaging extends BaseController
{




    public function index()
    {

        if (!isset($this->session->user_id)) {
            return redirect()->to('/login'); 
           }
    

        helper(['form','url']);

        $model = new AicOwnPackagingModel(); 
        $title['title'] = "Customer's Own Packaging";

        $data['aicownpackaging'] = $model->read();
        $data['note'] = $model->getNote();
        $data['lastupdate'] = $model->lastupdate();
        
        echo view('templates/header',$title);
        echo view('pages/aicownpackaging',$data);
        echo view('templates/footer');

    }



    public function add()
    {
        $model = new AicOwnPackagingModel(); 

        if ($this->request->getMethod() == 'post' &&  $this->request->getPost('rateid') == '')
        {

            $data = array(
                'location'      =>      trim($this->request->getPost('location')),
                'onekg'         =>      trim($this->request->getPost('onekg')),
                'twokg'         =>      trim($this->request->getPost('twokg')),
                'threekg'       =>      trim($this->request->getPost('threekg')),
                'excess'      =>      trim($this->request->getPost('excesskg')),
                'last_update'   =>      date('Y-m-d H:i:s'),
                'user_id'       =>      $this->session->user_id,
            );

            $model->save($data);

            $this->session->setFlashdata('msg', 'Rates(s) Added Successfully!');
            return redirect()->to('/aicownpackaging');

        }
        elseif ($this->request->getMethod() == 'post' && $this->request->getPost('rateid') != '')
        {

            $data = array(

                'id'            =>      $this->request->getPost('rateid'),
                'location'      =>      trim($this->request->getPost('location')),
                'onekg'         =>      trim($this->request->getPost('onekg')),
                'twokg'         =>      trim($this->request->getPost('twokg')),
                'threekg'       =>      trim($this->request->getPost('threekg')),
                'excess'      =>      trim($this->request->getPost('excesskg')),
                'last_update'   =>      date('Y-m-d H:i:s'),
                'user_id'       =>      $this->session->user_id,


            );

            $model->save($data);

            $this->session->setFlashdata('msg', 'Rates(s) Updated Successfully!');
            return redirect()->to('/aicownpackaging');


        }
        else
        {
            return view('errors/html/error_404');
        }


    }


    public function delete($data = NULL)
    {
        $model = new AicOwnPackagingModel();

        if($model->delete($data))
        {
            $this->session->setFlashdata('msg', 'Rate(s) Deleted Successfully!');
            return redirect()->to('/aicownpackaging');
            
        }

    }


    public function updatenotes()
    {
        $model = new AicOwnPackagingModel();

        if($this->request->getMethod() == 'post')
        {

            $data = array(

                'notes '        =>      $this->request->getPost('notes'),
                'last_update'   =>      date('Y-m-d H:i:s'),
                'user_id'       =>      $this->session->user_id

            );


            $model->updatenotes($data,$this->request->getPost('noteid'));
            $this->session->setFlashdata('msg', 'Note(s) Updated Successfully!');
            return redirect()->to('/aicownpackaging');


        }
        else
        {
      
           return view('errors/html/error_404');
          
        }
    }



}