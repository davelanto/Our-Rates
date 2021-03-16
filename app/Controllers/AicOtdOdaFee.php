<?php

namespace App\Controllers;

use App\Models\AicOtdOdaFeeModel;
use CodeIgniter\Controller;


class AicOtdOdaFee extends BaseController
{




    public function index()
    {

        if (!isset($this->session->user_id)) {
            return redirect()->to('/login'); 
           }
    

        helper(['form','url']);

        $model = new AicOtdOdaFeeModel(); 
        $title['title'] = "Provincial Delivery Rates & Lead Time";

        $data['aicotdodafee'] = $model->read();
        $data['lastupdate'] = $model->lastupdate();
        
        echo view('templates/header',$title);
        echo view('pages/aicotdodafee',$data);
        echo view('templates/footer');

    }



    public function add()
    {
        $model = new AicOtdOdaFeeModel(); 

        if ($this->request->getMethod() == 'post' &&  $this->request->getPost('rateid') == '')
        {

            $data = array(

                'state'           =>      '-',
                'province'        =>      trim($this->request->getPost('province')),
                'city'            =>      trim($this->request->getPost('city')),
                'zipcode'         =>      trim($this->request->getPost('zipcode')),
                'barangay'        =>      trim($this->request->getPost('barangay')),
                'remarks'         =>      'OTD AND ODA Fee',
                'lead_time'       =>      trim($this->request->getPost('lead_time')),
                'otd_fee'         =>      trim($this->request->getPost('otd_fee')),
                'oda_fee'         =>      trim($this->request->getPost('oda_fee')),
                'remarks2'        =>      trim($this->request->getPost('remarks2')),
                'last_update'     =>      date('Y-m-d H:i:s'),
                'user_id'         =>      $this->session->user_id
         
            );

            $model->save($data);

            $this->session->setFlashdata('msg', 'Rates(s) Added Successfully!');
            return redirect()->to('/aicotdodafee');

        }
        elseif ($this->request->getMethod() == 'post' && $this->request->getPost('rateid') != '')
        {

            $data = array(

                'id'              =>      $this->request->getPost('rateid'),
                'state'           =>      '-',
                'province'        =>      trim($this->request->getPost('province')),
                'city'            =>      trim($this->request->getPost('city')),
                'zipcode'         =>      trim($this->request->getPost('zipcode')),
                'barangay'        =>      trim($this->request->getPost('barangay')),
                'remarks'         =>      'OTD AND ODA Fee',
                'lead_time'       =>      trim($this->request->getPost('lead_time')),
                'otd_fee'         =>      trim($this->request->getPost('otd_fee')),
                'oda_fee'         =>      trim($this->request->getPost('oda_fee')),
                'remarks2'        =>      trim($this->request->getPost('remarks2')),
                'last_update'     =>      date('Y-m-d H:i:s'),
                'user_id'         =>      $this->session->user_id


            );

            $model->save($data);

            $this->session->setFlashdata('msg', 'Rates(s) Updated Successfully!');
            return redirect()->to('/aicotdodafee');


        }
        else
        {
            return view('errors/html/error_404');
        }


    }


    public function delete($data = NULL)
    {
        $model = new AicOtdOdaFeeModel();

        if($model->delete($data))
        {
            $this->session->setFlashdata('msg', 'Rate(s) Deleted Successfully!');
            return redirect()->to('/aicotdodafee');
            
        }

    }




}