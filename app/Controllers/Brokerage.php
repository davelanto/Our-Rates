<?php

namespace App\Controllers;

use App\Models\BrokerageModel;
use CodeIgniter\Controller;


class Brokerage extends BaseController
{




    public function index()
    {

        if (!isset($this->session->user_id)) {
            return redirect()->to('/login'); 
           }
    


        $model = new BrokerageModel(); 
   

        $data['brokerage'] = $model->read();
        $data['charges'] = $model->readAllCharges();
        $data['cao']     = $model->getCAO();
        $data['note']   =   $model->getnotes();
        $data['lastupdate'] = $model->lastupdate();
        $title['title'] = "Brokerage - CONSUMPTION ENTRY CHARGES";
         
        echo view('templates/header',$title);
        echo view('pages/brokerage',$data);
        echo view('templates/footer');
    }


    public function add()
    {
        $model = new BrokerageModel();

        if($this->request->getMethod() == 'post' && $this->request->getPost('rateid') == "")
        {
            $data = array(

                'broke_charge_id'       =>          '1',
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
            return redirect()->to('/brokerage');

        }
        elseif($this->request->getPost('rateid') != "")
        {

            $data = array(

                'id'                    =>          $this->request->getPost('rateid'),
                'broke_charge_id'       =>          '1',
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
            return redirect()->to('/brokerage');


        }
        else
        {
      
           return view('errors/html/error_404');
          
        }

    
    }


    
    public function delete($id)
    {
        $model = new BrokerageModel();

        if ($model->delete($id)) {
            $this->session->setFlashdata('msg', 'Rate(s) Deleted Successfully!');
            return redirect()->to('/brokerage');
        }

    }





    public function newcao()
    {

        $model = new BrokerageModel();

       
        if($this->request->getMethod() == 'post' && $this->request->getPost('fee_id') == "")
        {

            $data = array(

                'dutiable_value'           =>       $this->request->getPost('dutiable_value'),
                'from_price'               =>       $this->request->getPost('from_rate'),
                'to_price'                 =>       $this->request->getPost('to_rate'),
                'rates'                    =>       $this->request->getPost('rates'),
                'last_update'              =>       date('Y-m-d H:i:s'),
                'user_id'                  =>       $this->session->user_id

            );
            $model->newcao($data);
           
            $this->session->setFlashdata('msg', 'Brokerage Fee Added Successfully!');
            return redirect()->to('/brokerage');
        }
        elseif($this->request->getPost('fee_id') != "")
        {

            $data = array(

                'dutiable_value'           =>       $this->request->getPost('dutiable_value'),
                'from_price'               =>       $this->request->getPost('from_rate'),
                'to_price'                 =>       $this->request->getPost('to_rate'),
                'rates'                    =>       $this->request->getPost('rates'),
                'last_update'              =>       date('Y-m-d H:i:s'),
                'user_id'                  =>       $this->session->user_id

            );

            $model->editcao($data,$this->request->getPost('fee_id'));
        
            $this->session->setFlashdata('msg', 'Brokerage Fee Updated Successfully!');
            return redirect()->to('/brokerage');
        }

    }



  public function deletecao($id)
    {
        $model = new BrokerageModel();
        $model->deletecao($id);
        
        $this->session->setFlashdata('msg', 'Brokerage Fee Deleted Successfully!');
        return redirect()->to('/brokerage');
    

    }




  
    public function updatenotes()
    {
        $model = new BrokerageModel();

        if($this->request->getMethod() == 'post')
        {

            $data = array(

                'notes '        =>      $this->request->getPost('notes'),
                'last_update'   =>      date('Y-m-d H:i:s'),
                'user_id'       =>      $this->session->user_id

            );


            $model->updatenotes($data,$this->request->getPost('noteid'));

            $this->session->setFlashdata('msg', 'Note(s) Updated Successfully!');
            return redirect()->to('/brokerage'); 


        }
        else
        {
      
           return view('errors/html/error_404');
          
        }
    }








    

}