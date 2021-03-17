<?php namespace App\Controllers;

use App\Models\AccountModel;
use CodeIgniter\Controller;


class Account extends BaseController

{



   


	public function index()
	{

       if (!isset($this->session->user_id)) {
        return redirect()->to('/login'); 
       }


        $model = new AccountModel();
        $title['title'] = "Accounts";

        $data['account'] = $model->read();
        $data['validation'] =  $this->validation;
        
        echo view('templates/header',$title);
        echo view('pages/account',$data);
        echo view('templates/footer');


    }



    public function register()
    {

        helper(['form','url']);

        if($this->request->getMethod() == 'post' && $this->request->getPost('userid') == '')
        {

            $model = new AccountModel;


            $rules = [

                'username'        =>    [
                    'label'       =>    'Username',
                    'rules'       =>    'is_unique[user_tbl.username]|required|alpha_numeric|min_length[4]'
                ],
                
                'password'        =>    [
                    'label'       =>    'Password',
                    'rules'       =>    'required|min_length[4]'
                ],
                'cpassword'       =>    [
                    'label'       =>    'Confirm Password',
                    'rules'       =>    'matches[password]|required|min_length[4]'

                ],
                'fname'           =>    [
                    'label'       =>    'First Name',
                    'rules'       =>    'required|alpha_space'
                ],
                'lname'           =>    [
                    'label'       =>    'Last Name',
                    'rules'       =>    'required|alpha_space'
                ]


            ];

            if($this->validate($rules))
            {


                $data   =   array(

                    'username'          =>  $this->request->getPost('username'),
                    'password'          =>  base64_encode($this->encrypter->encrypt($this->request->getPost('password'))),
                    'type_id'           =>  $this->request->getPost('type_id'),
                    'first_name'        =>  ucfirst($this->request->getPost('fname')),
                    'last_name'         =>  ucfirst($this->request->getPost('lname')),
                    'last_updated'       =>  date('Y-m-d H:i:s')


                );
                $model->save($data);    
                $this->session->setFlashdata('msg', 'User Added Successfully!');
                return redirect()->to('/account');



            }
            else
            {
                $data['validation'] =   $this->validator;
            }

            $this->index();
       
        }
        else
        {
            return redirect()->to('index'); 
        }

      
    }



    public function update()
    {

        helper(['form','url']);

        if ($this->request->getMethod() == 'post') {


            $model = new AccountModel;


            $rules = [

                'ufname'           =>    [
                    'label'       =>    'First Name',
                    'rules'       =>    'required|alpha_space'
                ],
                'ulname'           =>    [
                    'label'       =>    'Last Name',
                    'rules'       =>    'required|alpha_space'
                ]

            ];

            
            if($this->validate($rules))
            {


                $data   =   array(

                    
                    'type_id'           =>  $this->request->getPost('utype_id'),
                    'first_name'        =>  ucfirst($this->request->getPost('ufname')),
                    'last_name'         =>  ucfirst($this->request->getPost('ulname')),
                    'last_update'       =>  date('Y-m-d H:i:s')


                );

                $model->update($this->request->getPost('userid'),$data);    
                $this->session->setFlashdata('msg', 'User Info. Updated Successfully!');
                return redirect()->to('/account');



            }
            else
            {
                $data['validation'] =   $this->validator;
            }

            $this->index();
       




        }
        else
        {
            return redirect()->to('/account');
        }



    }







    public function changepassword()
    {

        helper(['form','url']);

        if ($this->request->getMethod() == 'post')
        {
       
            $model = new AccountModel;

            
            $rules = [

      
                'newpass'        =>    [
                    'label'       =>    'New Password',
                    'rules'       =>    'required|min_length[4]'
                ],
                'cnewpassword'       =>    [
                    'label'       =>    'Confirm New Password',
                    'rules'       =>    'matches[newpass]|required|min_length[4]'

                ]

            ];

         
            if($this->validate($rules))
            {


                $data   =   array(

                    
                    'password'         => base64_encode( $this->encrypter->encrypt($this->request->getPost('newpass'))),
                    'last_update'      =>  date('Y-m-d H:i:s')


                );

                $model->update($this->request->getPost('userid'),$data);    
                $this->session->setFlashdata('msg', 'Password Changed Successfully!');
                return redirect()->to('/account');



            }
            else
            {
                $data['validation'] =   $this->validator;
            }

    
            $this->index();
       




        }
        else
        {
            return redirect()->to('index'); 
        }



    }

        



    function changePassGlobal()
    {

        if ($this->request->getMethod() == 'post')
        {
       
            $model = new AccountModel;

            $data   =   array(

                    
                'password'         => base64_encode( $this->encrypter->encrypt($this->request->getPost('newpass1'))),
                'last_update'      =>  date('Y-m-d H:i:s')


            );


            $model->update($this->request->getPost('userid1'),$data);    
            $this->session->setFlashdata('msg', 'Password Changed Successfully!');
            return redirect()->to($this->request->getPost('currenturl'));



        }

    }
    
	

}
