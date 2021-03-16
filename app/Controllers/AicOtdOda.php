<?php

namespace App\Controllers;

use App\Models\AicOtdOdaModel;
use CodeIgniter\Controller;


class AicOtdOda extends BaseController
{




    public function index()
    {

        if (!isset($this->session->user_id)) {
            return redirect()->to('/login'); 
           }
    

        helper(['form','url']);

        $model = new AicOtdOdaModel(); 
        $title['title'] = "Out of Town Delivery";

        $data['aicotdoda'] = $model->read();
        $data['lastupdate'] = $model->lastupdate();
        
        echo view('templates/header',$title);
        echo view('pages/aicotdoda',$data);
        echo view('templates/footer');

    }



    public function add()
    {
        $model = new AicOtdOdaModel(); 

        if ($this->request->getMethod() == 'post' &&  $this->request->getPost('rateid') == '')
        {

            $data = array(

                'state'           =>      trim($this->request->getPost('state')),
                'province'        =>      trim($this->request->getPost('province')),
                'city'            =>      trim($this->request->getPost('city')),
                'barangay'        =>      trim($this->request->getPost('barangay')),
                'zipcode'         =>      trim($this->request->getPost('zipcode')),
                'remarks'         =>      'OTD',
                'last_update'     =>      date('Y-m-d H:i:s'),
                'user_id'         =>      $this->session->user_id
         
            );

            $model->save($data);

            $this->session->setFlashdata('msg', 'Rates(s) Added Successfully!');
            return redirect()->to('/aicotdoda');

        }
        elseif ($this->request->getMethod() == 'post' && $this->request->getPost('rateid') != '')
        {

            $data = array(

                'id'              =>      $this->request->getPost('rateid'),
                'state'           =>      trim($this->request->getPost('state')),
                'province'        =>      trim($this->request->getPost('province')),
                'city'            =>      trim($this->request->getPost('city')),
                'barangay'        =>      trim($this->request->getPost('barangay')),
                'zipcode'         =>      trim($this->request->getPost('zipcode')),
                'remarks'         =>      'OTD',
                'last_update'     =>      date('Y-m-d H:i:s'),
                'user_id'         =>      $this->session->user_id


            );

            $model->save($data);

            $this->session->setFlashdata('msg', 'Rates(s) Updated Successfully!');
            return redirect()->to('/aicotdoda');


        }
        else
        {
            return view('errors/html/error_404');
        }


    }


    public function delete($data = NULL)
    {
        $model = new AicOtdOdaModel();

        if($model->delete($data))
        {
            $this->session->setFlashdata('msg', 'Rate(s) Deleted Successfully!');
            return redirect()->to('/aicotdoda');
            
        }

    }




}