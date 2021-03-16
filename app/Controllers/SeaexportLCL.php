<?php

namespace App\Controllers;

use App\Models\SeaexportLCLModel;
use CodeIgniter\Controller;


class SeaexportLCL extends BaseController
{


    


    public function index()
    {

        if (!isset($this->session->user_id)) {
            return redirect()->to('/login'); 
           }
    


        $model = new SeaexportLCLModel(); 
   

        $data['seaexportLCL'] = $model->read();
        $data['group'] = $model->readGroup();
        $data['note']  =  $model->getNote();
        $data['lastupdate'] = $model->lastupdate();
        $title['title'] =   "Sea Export - LCL";
        
        echo view('templates/header',$title);
        echo view('pages/seaexportLCL',$data);
        echo view('templates/footer');
    }






    public function add()
    {
        $model = new SeaexportLCLModel();

        
        if($this->request->getMethod() == 'post' && $this->request->getPost('rateid') == "")
        {

         $data = array(

            'sea_air_id'        =>      '3',
            'group_id'          =>      '3',
            'charge_id'         =>      $this->request->getPost('groupname'),
            'pol'               =>      strtoupper($this->request->getPost('pol')),
            'pod'               =>      strtoupper($this->request->getPost('pod')),
            'charge'            =>      strtoupper($this->request->getPost('charges')),
            'currency'          =>      strtoupper($this->request->getPost('currency')),
            'amount'            =>      $this->request->getPost('amount'),
            'remarks'           =>      $this->request->getPost('remarks'),
            'last_update'       =>      date('Y-m-d H:i:s'),
            'user_id'           =>       $this->session->user_id   


         );
         $model->save($data);

         $this->session->setFlashdata('msg', 'Rate Added Successfully!');
        return redirect()->to('/seaexportlcl');

        }
        elseif ($this->request->getPost('rateid') != "")
        {
            

            
         $data = array(

            'id'                =>      $this->request->getPost('rateid'),    
            'sea_air_id'        =>      '3',
            'group_id'          =>      '3',
            'charge_id'         =>      $this->request->getPost('charge_id'),
            'pol'               =>      strtoupper($this->request->getPost('pol')),
            'pod'               =>      strtoupper($this->request->getPost('pod')),
            'charge'            =>      strtoupper($this->request->getPost('charges')),
            'currency'          =>      strtoupper($this->request->getPost('currency')),
            'amount'            =>      $this->request->getPost('amount'),
            'remarks'           =>      $this->request->getPost('remarks'),
            'last_update'       =>      date('Y-m-d H:i:s'),
            'user_id'           =>       $this->session->user_id   


         );

            $model->save($data);

            $this->session->setFlashdata('msg', 'Rate Updated Successfully!');
            return redirect()->to('/seaexportlcl');
        }
        else
        {
      
           return view('errors/html/error_404');
          
        }
    }

    public function delete($id)
    {
        $model = new SeaexportLCLModel();
        if($model->delete($id))
        {
            $this->session->setFlashdata('msg', 'Rate Deleted Successfully!');
            return redirect()->to('/seaexportlcl');
        }
        
    }


    public function updatenotes()
    {
        $model = new SeaexportLCLModel();

        if($this->request->getMethod() == 'post')
        {

            $data = array(

                'notes '        =>      $this->request->getPost('notes'),
                'last_update'   =>      date('Y-m-d H:i:s'),
                'user_id'       =>      $this->session->user_id

            );


            $model->updatenotes($data,$this->request->getPost('noteid'));

            $this->session->setFlashdata('msg', 'Notes Updated Successfully!');
            return redirect()->to('/seaexportlcl');


        }
        else
        {
      
           return view('errors/html/error_404');
          
        }
    }







}