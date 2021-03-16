<?php

namespace App\Controllers;

use App\Models\SeaimportLCLModel;
use CodeIgniter\Controller;


class SeaimportLCL extends BaseController
{




    public function index()
    {

        if (!isset($this->session->user_id)) {
            return redirect()->to('/login'); 
           }
    


        $model = new SeaimportLCLModel(); 
   

        $data['seaimportLCL'] = $model->read();
        $data['note']   =   $model->getnotes();
        $data['lastupdate'] = $model->lastupdate();
        $title['title'] =   "Sea Import - LCL";
        
        echo view('templates/header',$title);
        echo view('pages/seaimportLCL',$data);
        echo view('templates/footer');
    }






    public function add()
    {
        $model = new SeaimportLCLModel();

        
        if($this->request->getMethod() == 'post' && $this->request->getPost('rateid') == "")
        {

         $data = array(

            'sea_air_id'        =>      '4',
            'group_id'          =>      '6',
            'pol'               =>      strtoupper($this->request->getPost('pol')),
            'pod'               =>      strtoupper($this->request->getPost('pod')),
            'charge'            =>      strtoupper($this->request->getPost('charges')),
            'currency'          =>      strtoupper($this->request->getPost('currency')),
            'amount'            =>      strtoupper($this->request->getPost('amount')),
            'remarks'           =>      strtoupper($this->request->getPost('remarks')),
            'last_update'       =>      date('Y-m-d H:i:s'),
            'user_id'           =>      $this->session->user_id   


         );
         $model->save($data);

         $this->session->setFlashdata('msg', 'Rate(s) Added Successfully!');
        return redirect()->to('/seaimportlcl');

        }
        elseif ($this->request->getPost('rateid') != "")
        {
            

            
         $data = array(

            'id'                =>      $this->request->getPost('rateid'),    
            'sea_air_id'        =>      '4',
            'group_id'          =>      '6',
            'pol'               =>      strtoupper($this->request->getPost('pol')),
            'pod'               =>      strtoupper($this->request->getPost('pod')),
            'charge'            =>      strtoupper($this->request->getPost('charges')),
            'currency'          =>      strtoupper($this->request->getPost('currency')),
            'amount'            =>      strtoupper($this->request->getPost('amount')),
            'remarks'           =>      strtoupper($this->request->getPost('remarks')),
            'last_update'       =>      date('Y-m-d H:i:s'),
            'user_id'           =>      $this->session->user_id   


         );

            $model->save($data);

            $this->session->setFlashdata('msg', 'Rate(s) Updated Successfully!');
            return redirect()->to('/seaimportlcl');
        }
        else
        {
      
           return view('errors/html/error_404');
          
        }
    }

    public function delete($id)
    {
        $model = new SeaimportLCLModel();
        if($model->delete($id))
        {
            $this->session->setFlashdata('msg', 'Rate(s) Deleted Successfully!');
            return redirect()->to('/seaimportlcl');
        }
        
    }




   
    public function updatenotes()
    {
        $model = new SeaimportLCLModel();

        if($this->request->getMethod() == 'post')
        {

            $data = array(

                'notes '        =>      $this->request->getPost('notes'),
                'last_update'   =>      date('Y-m-d H:i:s'),
                'user_id'       =>      $this->session->user_id

            );


            $model->updatenotes($data,$this->request->getPost('noteid'));
            $this->session->setFlashdata('msg', 'Note(s) Updated Successfully!');
            return redirect()->to('/seaimportlcl'); 


        }
        else
        {
      
           return view('errors/html/error_404');
          
        }
    }


}