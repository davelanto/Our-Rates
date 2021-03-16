<?php

namespace App\Controllers;

use App\Models\SeaimportModel;
use CodeIgniter\Controller;


class Seaimport extends BaseController
{


    public function index()
    {

        if (!isset($this->session->user_id)) {
            return redirect()->to('/login'); 
           }
    

        $model = new SeaimportModel(); 
   

        $data['seaimport'] = $model->read();
        $data['lastupdate'] = $model->lastupdate();
        $title['title'] =   "Sea Import";
        $data['note'] = $model->getNote();
        
        echo view('templates/header',$title);
        echo view('pages/seaimport', $data);
        echo view('templates/footer');

    }



    public function add()
    {
        $model = new SeaimportModel();

        if($this->request->getMethod() == 'post' && $this->request->getPost('rateid') == "")
        {
            $data = array(

                'sea_air_id'        =>      '4',
                'group_id'          =>      '4',
                'pol'               =>      strtoupper($this->request->getPost('pol')),
                'charge'            =>      strtoupper($this->request->getPost('charges')),
                'pod'               =>      strtoupper($this->request->getPost('pod')),
                'twenty'            =>      strtoupper($this->request->getPost('twenty')),
                'forty'             =>      strtoupper($this->request->getPost('forty')),
                'fortyhq'           =>      strtoupper($this->request->getPost('fortyhq')),
                'tt'                =>      strtoupper($this->request->getPost('tt')),
                'sailing'           =>      strtoupper($this->request->getPost('sailing')),
                'validity'          =>      strtoupper($this->request->getPost('validity')),
                'last_update'       =>      date('Y-m-d H:i:s'),
                'user_id'           =>      $this->session->user_id

            );

            $model->insert($data);
            
            $this->session->setFlashdata('msg', 'Rate Added Successfully!');
            return redirect()->to('/seaimport');

        }
        elseif($this->request->getPost('rateid') != "")
        {

            $data = array(

                'id'                =>      $this->request->getPost('rateid'),
                'sea_air_id'        =>      '4',
                'group_id'          =>      '4',
                'pol'               =>      strtoupper($this->request->getPost('pol')),
                'charge'            =>      strtoupper($this->request->getPost('charges')),
                'pod'               =>      strtoupper($this->request->getPost('pod')),
                'twenty'            =>      strtoupper($this->request->getPost('twenty')),
                'forty'             =>      strtoupper($this->request->getPost('forty')),
                'fortyhq'           =>      strtoupper($this->request->getPost('fortyhq')),
                'tt'                =>      strtoupper($this->request->getPost('tt')),
                'sailing'           =>      strtoupper($this->request->getPost('sailing')),
                'validity'          =>      strtoupper($this->request->getPost('validity')),
                'last_update'       =>      date('Y-m-d H:i:s'),
                'user_id'           =>      $this->session->user_id

            );

            $model->save($data);
            
            $this->session->setFlashdata('msg', 'Rate Updated Successfully!');
            return redirect()->to('/seaimport');


        }
        else
        {
      
           return view('errors/html/error_404');
          
        }

    
    }



    public function delete($id)
    {
        $model = new SeaimportModel();

        if ($model->delete($id)) {
            $this->session->setFlashdata('msg', 'Rate Deleted Successfully!');
            return redirect()->to('/seaimport');
        }

    }



    public function updatenotes()
    {
        $model = new SeaImportModel();

        if($this->request->getMethod() == 'post')
        {

            $data = array(

                'notes '        =>      $this->request->getPost('notes'),
                'last_update'   =>      date('Y-m-d H:i:s'),
                'user_id'       =>      $this->session->user_id

            );


            $model->updatenotes($data,$this->request->getPost('noteid'));
            $this->session->setFlashdata('msg', 'Note(s) Updated Successfully!');
            return redirect()->to('/seaimport');


        }
        else
        {
      
           return view('errors/html/error_404');
          
        }
    }




}