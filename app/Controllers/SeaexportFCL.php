<?php

namespace App\Controllers;

use App\Models\SeaexportFCLModel;
use CodeIgniter\Controller;


class SeaexportFCL extends BaseController
{




    public function index()
    {

        if (!isset($this->session->user_id)) {
            return redirect()->to('/login'); 
           }
    


        $model = new SeaexportFCLModel(); 
   

        $data['seaexportFCL'] = $model->read();
        $data['group'] = $model->readGroup();
        $data['lastupdate'] = $model->lastupdate();
        $title['title'] =   "Sea Export - FCL";
        $data['note'] = $model->getNote();
        
        echo view('templates/header',$title);
        echo view('pages/seaexportFCL',$data);
        echo view('templates/footer');
    }






    public function add()
    {
        $model = new SeaexportFCLModel();

        
        if($this->request->getMethod() == 'post' && $this->request->getPost('rateid') == "")
        {

         $data = array(

            'sea_air_id'        =>      '3',
            'group_id'          =>      '2',
            'charge_id'         =>      $this->request->getPost('groupname'),
            'pol'               =>      strtoupper($this->request->getPost('pol')),
            'pod'               =>      strtoupper($this->request->getPost('pod')),
            'charge'            =>      strtoupper($this->request->getPost('charges')),
            'currency'          =>      strtoupper($this->request->getPost('currency')),
            'twenty'            =>      $this->request->getPost('twenty'),
            'forty'             =>      $this->request->getPost('forty'),
            'fortyhq'           =>      $this->request->getPost('fortyhq'),
            'last_update'       =>      date('Y-m-d H:i:s'),
            'user_id'           =>      $this->session->user_id   


         );
         $model->save($data);

         $this->session->setFlashdata('msg', 'Rate Added Successfully!');
         return redirect()->to('/seaexportfcl');

        }
        elseif ($this->request->getPost('rateid') != "")
        {
            

            
         $data = array(

            'id'                =>      $this->request->getPost('rateid'),    
            'sea_air_id'        =>      '3',
            'group_id'          =>      '2',
            'charge_id'         =>      $this->request->getPost('charge_id'),
            'pol'               =>      strtoupper($this->request->getPost('pol')),
            'pod'               =>      strtoupper($this->request->getPost('pod')),
            'charge'            =>      strtoupper($this->request->getPost('charges')),
            'currency'          =>      strtoupper($this->request->getPost('currency')),
            'twenty'            =>      $this->request->getPost('twenty'),
            'forty'             =>      $this->request->getPost('forty'),
            'fortyhq'           =>      $this->request->getPost('fortyhq'),
            'last_update'       =>      date('Y-m-d H:i:s'),
            'user_id'           =>      $this->session->user_id  


         );

            $model->save($data);
           
            
         $this->session->setFlashdata('msg', 'Rate Updated Successfully!');
         return redirect()->to('/seaexportfcl');


        } else
        {
      
           return view('errors/html/error_404');
          
        }
    }

    public function delete($id)
    {
        $model = new SeaexportFCLModel();
        if($model->delete($id))
        {
            
         $this->session->setFlashdata('msg', 'Rate Deleted Successfully!');
         return redirect()->to('/seaexportfcl');
        }
        
    }


    public function updatenotes()
    {
        $model = new SeaExportFCLModel();

        if($this->request->getMethod() == 'post')
        {

            $data = array(

                'notes '        =>      $this->request->getPost('notes'),
                'last_update'   =>      date('Y-m-d H:i:s'),
                'user_id'       =>      $this->session->user_id

            );


            $model->updatenotes($data,$this->request->getPost('noteid'));
            $this->session->setFlashdata('msg', 'Note(s) Updated Successfully!');
            return redirect()->to('/seaexportfcl');


        }
        else
        {
      
           return view('errors/html/error_404');
          
        }
    }






}