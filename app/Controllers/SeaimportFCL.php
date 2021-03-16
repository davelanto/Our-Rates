<?php

namespace App\Controllers;

use App\Models\SeaimportFCLModel;
use CodeIgniter\Controller;


class SeaimportFCL extends BaseController
{




    public function index()
    {

        if (!isset($this->session->user_id)) {
            return redirect()->to('/login'); 
           }
    


        $model = new SeaimportFCLModel(); 
   

        $data['seaimportFCL'] = $model->read();
        $data['note']   =   $model->getnotes();
        $data['lastupdate'] = $model->lastupdate();

        $title['title'] =   "Sea Import - FCL";
        
        echo view('templates/header',$title);
        echo view('pages/seaimportFCL',$data);
        echo view('templates/footer');
    }






    public function add()
    {
        $model = new SeaimportFCLModel();

        
        if($this->request->getMethod() == 'post' && $this->request->getPost('rateid') == "")
        {

         $data = array(

            'sea_air_id'        =>      '4',
            'group_id'          =>      '5',
            'pol'               =>      strtoupper($this->request->getPost('pol')),
            'pod'               =>      strtoupper($this->request->getPost('pod')),
            'charge'            =>      strtoupper($this->request->getPost('charges')),
            'currency'          =>      strtoupper($this->request->getPost('currency')),
            'twenty'            =>      strtoupper($this->request->getPost('twenty')),
            'forty'             =>      strtoupper($this->request->getPost('forty')),
            'fortyhq'           =>      strtoupper($this->request->getPost('fortyhq')),
            'remarks'           =>      strtoupper($this->request->getPost('remarks')),
            'last_update'       =>      date('Y-m-d H:i:s'),
            'user_id'           =>      $this->session->user_id   


         );
         $model->save($data);

         $this->session->setFlashdata('msg', 'Rate(s) Added Successfully!');
         return redirect()->to('/seaimportfcl');

        }
        elseif ($this->request->getPost('rateid') != "")
        {
            

            
         $data = array(

            'id'                =>      $this->request->getPost('rateid'),    
            'sea_air_id'        =>      '4',
            'group_id'          =>      '5',
            'pol'               =>      strtoupper($this->request->getPost('pol')),
            'pod'               =>      strtoupper($this->request->getPost('pod')),
            'charge'            =>      strtoupper($this->request->getPost('charges')),
            'currency'          =>      strtoupper($this->request->getPost('currency')),
            'twenty'            =>      strtoupper($this->request->getPost('twenty')),
            'forty'             =>      strtoupper($this->request->getPost('forty')),
            'fortyhq'           =>      strtoupper($this->request->getPost('fortyhq')),
            'remarks'           =>      strtoupper($this->request->getPost('remarks')),
            'last_update'       =>      date('Y-m-d H:i:s'),
            'user_id'           =>      $this->session->user_id   


         );

            $model->save($data);

            $this->session->setFlashdata('msg', 'Rate(s) Updated Successfully!');
            return redirect()->to('/seaimportfcl');
        }
        else
        {
      
           return view('errors/html/error_404');
          
        }
    }

    public function delete($id)
    {
        $model = new SeaimportFCLModel();
        if($model->delete($id))
        {
            $this->session->setFlashdata('msg', 'Rate(s) Deleted Successfully!');
            return redirect()->to('/seaimportfcl');
        }
        
    }

      
    public function updatenotes()
    {
        $model = new SeaimportFCLModel();

        if($this->request->getMethod() == 'post')
        {

            $data = array(

                'notes '        =>      $this->request->getPost('notes'),
                'last_update'   =>      date('Y-m-d H:i:s'),
                'user_id'       =>      $this->session->user_id

            );


            $model->updatenotes($data,$this->request->getPost('noteid'));
            $this->session->setFlashdata('msg', 'Note(s) Updated Successfully!');
            return redirect()->to('/seaimportfcl');


        }
        else
        {
      
           return view('errors/html/error_404');
          
        }
    }



    public function notesupdated()
    {
        $this->index();
    }






}