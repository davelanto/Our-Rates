<?php namespace App\Controllers;

use App\Models\AirexportModel;
use CodeIgniter\Controller;


class Airexport extends BaseController

{



	public function index()
	{

        if (!isset($this->session->user_id)) {
            return redirect()->to('/login'); 
           }
    

        $model = new AirexportModel();

        $data['airexport'] = $model->read();
        $data['note'] = $model->getNote();
        $data['lastupdate'] = $model->lastupdate();

        $title['title'] = "Air Export";
        
        echo view('templates/header',$title);
        echo view('pages/airexport',$data);
        echo view('templates/footer');


    }





    public function add()
    {
      
        if($this->request->getMethod() == 'post' && $this->request->getPost('rateid') == "")
        {
          
            $model = new AirexportModel();

          if ($model->save([

            'pol'           =>          $this->request->getPost('pol'),
            'pod'           =>          $this->request->getPost('pod'),
            'sea_air_id'    =>          '1',
            'code'          =>          $this->request->getPost('code'),
            'carrier'       =>          $this->request->getPost('carrier'),
            'service'       =>          $this->request->getPost('service'),
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
            'handling'      =>          $this->request->getPost('handling'),
            'docufee'       =>          $this->request->getPost('docufee'),
            'peza'          =>          $this->request->getPost('peza'),
            'vat'           =>          $this->request->getPost('vat'),
            'frequency'     =>          $this->request->getPost('frequency'),
            'routing'       =>          $this->request->getPost('routing'),
            'tt'            =>          $this->request->getPost('tt'),
            'comments'      =>          $this->request->getPost('comment'),
            'last_update'   =>          date('Y-m-d H:i:s'),
            'user_id'       =>          $this->session->user_id
            
            ]))
            {
                $this->session->setFlashdata('msg', 'Rate Added Successfully!');
                return redirect()->to('/airexport');
         
          }
        }elseif($this->request->getPost('rateid') != "")
        {

              
            $model = new AirexportModel();

            $data = array(

                'pol'           =>          $this->request->getPost('pol'),
                'pod'           =>          $this->request->getPost('pod'),
                'sea_air_id'    =>          '1',
                'code'          =>          $this->request->getPost('code'),
                'carrier'       =>          $this->request->getPost('carrier'),
                'service'       =>          $this->request->getPost('service'),
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
                'handling'      =>          $this->request->getPost('handling'),
                'docufee'       =>          $this->request->getPost('docufee'),
                'peza'          =>          $this->request->getPost('peza'),
                'vat'           =>          $this->request->getPost('vat'),
                'frequency'     =>          $this->request->getPost('frequency'),
                'routing'       =>          $this->request->getPost('routing'),
                'tt'            =>          $this->request->getPost('tt'),
                'comments'      =>          $this->request->getPost('comment'),
                'last_update'   =>          date('Y-m-d H:i:s'),
                'user_id'       =>          $this->session->user_id
              
            );

          if ($model->update($this->request->getPost('rateid'),$data)){

            $this->session->setFlashdata('msg', 'Rate Updated Successfully');
            return redirect()->to('/airexport');
         
          }

        }
        else
        {
           return view('errors/html/error_404');
        }


    }

    public function remove($id = NULL)
    {
        $model = new AirexportModel();

        if ($model->delete($id)){

            $this->session->setFlashdata('msg', 'Rate Deleted Successfully!');
            return redirect()->to('/airexport');
        
        }


    }



    public function updatenotes()
    {
        $model = new AirexportModel();

        if($this->request->getMethod() == 'post')
        {

            $data = array(

                'notes '        =>      $this->request->getPost('notes'),
                'last_update'   =>      date('Y-m-d H:i:s'),
                'user_id'       =>      $this->session->user_id

            );


            $model->updatenotes($data,$this->request->getPost('noteid'));
            $this->session->setFlashdata('msg', 'Note(s) Updated Successfully!');
            return redirect()->to('/airexport');


        }
        else
        {
      
           return view('errors/html/error_404');
          
        }
    }




	

}
