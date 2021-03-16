<?php

namespace App\Controllers;

use App\Models\AirimportModel;
use CodeIgniter\Controller;


class Airimport extends BaseController
{




    public function index()
    {

        if (!isset($this->session->user_id)) {
            return redirect()->to('/login'); 
           }
    

        helper(['form','url']);

        $model = new AirimportModel(); 
   

        $data['airimport'] = $model->read();
        $data['lastupdate'] = $model->lastupdate();
        $title['title'] = "Air Import";
        
        echo view('templates/header',$title);
        echo view('pages/airimport',$data);
        echo view('templates/footer');

    }




    public function add()
    {

        if($this->request->getMethod() == 'post' && $this->request->getPost('rateid') == "")
        {

            $model = new AirimportModel;

            $data = array(

                
                'pol'           =>          $this->request->getPost('pol'),
                'pod'           =>          $this->request->getPost('pod'),
                'sea_air_id'    =>          '2',
                'carrier'       =>          $this->request->getPost('carrier'),
                'validity'      =>          $this->request->getPost('validity'),
                'min'           =>          $this->request->getPost('min'),
                'nor'           =>          $this->request->getPost('nor'),
                'fortyfive'     =>          $this->request->getPost('fortyfive'),
                'hundred'       =>          $this->request->getPost('hundred'),
                'twofifty'      =>          $this->request->getPost('twofifty'),
                'threehundred'  =>          $this->request->getPost('threehundred'),
                'fivehundred'   =>          $this->request->getPost('fivehundred'),
                'thousand'      =>          $this->request->getPost('thousand'),
                'fsc'           =>          $this->request->getPost('fsc'),
                'ssc'           =>          $this->request->getPost('ssc'),
                'tcc'           =>          $this->request->getPost('tcc'),
                'awbfee'        =>          $this->request->getPost('awbfee'),
                'ens_ams'       =>          $this->request->getPost('ens'),
                'frequency'     =>          $this->request->getPost('frequency'),
                'routing'       =>          $this->request->getPost('routing'),
                'tt'            =>          $this->request->getPost('tt'),
                'comments'      =>          $this->request->getPost('comment'),
                'last_update'   =>          date('Y-m-d H:i:s'),
                'user_id'       =>          $this->session->user_id
            );

            $model->save($data);

            $this->session->setFlashdata('msg', 'Rate Added Successfully!');
            return redirect()->to('/airimport');
        }
        elseif($this->request->getPost('rateid') != "")
        {
            $model = new AirimportModel;

            $data = array(

                
                'pol'           =>          $this->request->getPost('pol'),
                'pod'           =>          $this->request->getPost('pod'),
                'sea_air_id'    =>          '2',
                'carrier'       =>          $this->request->getPost('carrier'),
                'validity'      =>          $this->request->getPost('validity'),
                'min'           =>          $this->request->getPost('min'),
                'nor'           =>          $this->request->getPost('nor'),
                'fortyfive'     =>          $this->request->getPost('fortyfive'),
                'hundred'       =>          $this->request->getPost('hundred'),
                'twofifty'      =>          $this->request->getPost('twofifty'),
                'threehundred'  =>          $this->request->getPost('threehundred'),
                'fivehundred'   =>          $this->request->getPost('fivehundred'),
                'thousand'      =>          $this->request->getPost('thousand'),
                'fsc'           =>          $this->request->getPost('fsc'),
                'ssc'           =>          $this->request->getPost('ssc'),
                'tcc'           =>          $this->request->getPost('tcc'),
                'awbfee'        =>          $this->request->getPost('awbfee'),
                'ens_ams'       =>          $this->request->getPost('ens'),
                'frequency'     =>          $this->request->getPost('frequency'),
                'routing'       =>          $this->request->getPost('routing'),
                'tt'            =>          $this->request->getPost('tt'),
                'comments'      =>          $this->request->getPost('comment'),
                'last_update'   =>          date('Y-m-d H:i:s'),
                'user_id'       =>          $this->session->user_id
            );

            if ($model->update($this->request->getPost('rateid'),$data)){

            $this->session->setFlashdata('msg', 'Rate Updated Successfully!');
            return redirect()->to('/airimport');
             
              }


        }
        else
        {
      
           return view('errors/html/error_404');
          
        }

    }

    public function remove($id)
    {
        $model = new AirimportModel();

        if ($model->delete($id)){

            $this->session->setFlashdata('msg', 'Rate Deleted Successfully!');
            return redirect()->to('/airimport');
        
        }


    }


}