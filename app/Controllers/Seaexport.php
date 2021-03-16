<?php

namespace App\Controllers;

use App\Models\SeaexportModel;
use CodeIgniter\Controller;


class Seaexport extends BaseController
{


    public function index()
    {

        if (!isset($this->session->user_id)) {
            return redirect()->to('/login'); 
           }
    


        $model = new SeaexportModel(); 
   

        $data['seaexport'] = $model->read();
        $data['lastupdate'] = $model->lastupdate();
        $data['note'] = $model->getNote();
        $title['title'] =   "Sea Export";
        
        echo view('templates/header',$title);
        echo view('pages/seaexport', $data);
        echo view('templates/footer');

    }


    public function add()
    {
        $model = new SeaexportModel();

        if($this->request->getMethod() == 'post' && $this->request->getPost('rateid') == "")
        {
            $data = array(

                'sea_air_id'      =>      '3',
                'group_id'          =>      '1',
                'pol'               =>      $this->request->getPost('pol'),
                'charge'           =>      $this->request->getPost('charges'),
                'pod'               =>      $this->request->getPost('pod'),
                'twenty'            =>      $this->request->getPost('twenty'),
                'forty'             =>      $this->request->getPost('forty'),
                'fortyhq'           =>      $this->request->getPost('fortyhq'),
                'tt'                =>      $this->request->getPost('tt'),
                'sailing'           =>      $this->request->getPost('sailing'),
                'lct'               =>      $this->request->getPost('lct'),
                'validity'          =>      $this->request->getPost('validity'),
                'carrier'           =>      $this->request->getPost('carrier'),
                'last_update'       =>      date('Y-m-d H:i:s'),
                'user_id'           =>      $this->session->user_id

            );

            $model->insert($data);

            $this->session->setFlashdata('msg', 'Rate Added Successfully!');
            return redirect()->to('/seaexport');

        }
        elseif($this->request->getPost('rateid') != "")
        {

            $data = array(

                'id'                =>      $this->request->getPost('rateid'),
                'pol'               =>      $this->request->getPost('pol'),
                'pod'               =>      $this->request->getPost('pod'),
                'charge'           =>      $this->request->getPost('charges'),
                'twenty'            =>      $this->request->getPost('twenty'),
                'forty'             =>      $this->request->getPost('forty'),
                'fortyhq'           =>      $this->request->getPost('fortyhq'),
                'tt'                =>      $this->request->getPost('tt'),
                'sailing'           =>      $this->request->getPost('sailing'),
                'lct'               =>      $this->request->getPost('lct'),
                'validity'          =>      $this->request->getPost('validity'),
                'carrier'           =>      $this->request->getPost('carrier'),
                'last_update'       =>          date('Y-m-d H:i:s'),
                'user_id'           =>          $this->session->user_id

            );

            $model->save($data);
            
            
            $this->session->setFlashdata('msg', 'Rate Updated Successfully!');
            return redirect()->to('/seaexport');


        } else
        {
      
           return view('errors/html/error_404');
          
        }

    
    }



    public function delete($id)
    {
        $model = new SeaexportModel();

        if ($model->delete($id)) {

            $this->session->setFlashdata('msg', 'Rate Deleted Successfully!');
            return redirect()->to('/seaexport');
        }

    }



    public function updatenotes()
    {
        $model = new SeaExportModel();

        if($this->request->getMethod() == 'post')
        {

            $data = array(

                'notes '        =>      $this->request->getPost('notes'),
                'last_update'   =>      date('Y-m-d H:i:s'),
                'user_id'       =>      $this->session->user_id

            );


            $model->updatenotes($data,$this->request->getPost('noteid'));
            $this->session->setFlashdata('msg', 'Note(s) Updated Successfully!');
            return redirect()->to('/seaexport');


        }
        else
        {
      
           return view('errors/html/error_404');
          
        }
    }


   
}