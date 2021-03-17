<?php

namespace App\Controllers;

use App\Models\LoginModel;
use CodeIgniter\Controller;


class Login extends BaseController
{


    public function index()
    {
        if (isset($this->session->user_id)) {
            return redirect()->to('/airexport'); 
           }


        $model = new LoginModel(); 
   

        $data['validation'] =  $this->validation;
        
        echo view('templates/loginheader');
        echo view('pages/login', $data);
        echo view('templates/loginfooter');

    }



    public function login()
    {


        $model = new LoginModel;

        if($this->request->getMethod() == 'post')
        {

            
            $rules = [

                'username'        =>    [
                    'label'       =>    'Username',
                    'rules'       =>    'required'
                ],
                
                'password'        =>    [
                    'label'       =>    'Password',
                    'rules'       =>    'required|min_length[4]'
                ]


            ];

            if($this->validate($rules))
            {

                $data = array(

                    'username'      =>      trim($this->request->getPost('username')),

                );


                $user_exists = $model->get_user($data);
            
                if ($user_exists) {

                    $web_password = $this->encrypter->decrypt(base64_decode($user_exists->password));

                    if ($web_password == trim($this->request->getPost('password')))
                    {
                        $this->session->setTempdata('user_id', $user_exists->user_id,7200);
                        $this->session->setTempdata('type_id', $user_exists->type_id,7200);
                        $this->session->setTempdata('user_type',$user_exists->user_type,7200);
                    
                        return redirect()->to('/airexport');
                    }

                }

                $this->session->setFlashdata('msg', 'Incorrect Password');
            }
         
                $data['validation'] =   $this->validator;
                $this->index();
            

            

        }
        else
        {
            return redirect()->to('index'); 
        }


    }

    public function logout()
    {
        $this->session->destroy();


        return redirect()->to('/login'); 
    }

}