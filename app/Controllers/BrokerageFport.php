<?php

namespace App\Controllers;

use App\Models\BrokerageFportModel;
use CodeIgniter\Controller;


class BrokerageFport extends BaseController
{




    public function index()
    {

        if (!isset($this->session->user_id)) {
            return redirect()->to('/login'); 
           }
    


        $model = new BrokerageFportModel(); 
   

        $data['BrokerageFport'] = $model->read();
        $data['charges'] = $model->readAllCharges();
        $data['lastupdate'] = $model->lastupdate();
        $data['note'] = $model->getNote();
        $title['title'] =   "Brokerage - FREEPORT ZONE CHARGES";
         
        echo view('templates/header',$title);
        echo view('pages/BrokerageFport',$data);
        echo view('templates/footer');
    }


    public function add()
    {
        $model = new BrokerageFportModel();

        if($this->request->getMethod() == 'post' && $this->request->getPost('rateid') == "")
        {
            $data = array(

                'broke_charge_id'       =>          '3',
                'charge_id'             =>          $this->request->getPost('groupname'),
                'charges'               =>          $this->request->getPost('charges'),
                'currency'              =>          $this->request->getPost('currency'),
                'amount'                =>          $this->request->getPost('amount'),
                'remarks'               =>          $this->request->getPost('remarks'),
                'last_update'           =>          date('Y-m-d H:i:s'),
                'user_id'               =>          $this->session->user_id

            );

            $model->insert($data);
            
            $this->session->setFlashdata('msg', 'Rate(s) Added Successfully!');
            return redirect()->to('/brokeragefport');

        }
        elseif($this->request->getPost('rateid') != "")
        {

            $data = array(

                'id'                    =>          $this->request->getPost('rateid'),
                'broke_charge_id'       =>          '3',
                'charge_id'             =>          $this->request->getPost('charge_id'),
                'charges'               =>          $this->request->getPost('charges'),
                'currency'              =>          $this->request->getPost('currency'),
                'amount'                =>          $this->request->getPost('amount'),
                'remarks'               =>          $this->request->getPost('remarks'),
                'last_update'           =>          date('Y-m-d H:i:s'),
                'user_id'               =>          $this->session->user_id

            );

            $model->save($data);
           
            $this->session->setFlashdata('msg', 'Rate(s) Updated Successfully!');
            return redirect()->to('/brokeragefport');


        }
        else
        {
      
           return view('errors/html/error_404');
          
        }

    
    }


    
    public function delete($id)
    {
        $model = new BrokerageFportModel();

        if ($model->delete($id)) {
           
            $this->session->setFlashdata('msg', 'Rate(s) Deleted Successfully!');
            return redirect()->to('/brokeragefport');

        }

    }




    public function updatenotes()
    {
        $model = new BrokerageFportModel();

        if($this->request->getMethod() == 'post')
        {

            $data = array(

                'notes '        =>      $this->request->getPost('notes'),
                'last_update'   =>      date('Y-m-d H:i:s'),
                'user_id'       =>      $this->session->user_id

            );


            $model->updatenotes($data,$this->request->getPost('noteid'));
            $this->session->setFlashdata('msg', 'Note(s) Updated Successfully!');
            return redirect()->to('/brokeragefport');


        }
        else
        {
      
           return view('errors/html/error_404');
          
        }
    }


}