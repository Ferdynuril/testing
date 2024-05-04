<?php

namespace App\Controllers;

use App\Models\LoginModel;

class Login extends BaseController
{
    public function __construct()
    {
        $this->loginmodel = New LoginModel();
        
        
    }
    public function index()
    {
        $session = session();
        $checkses = $session->get('user');
        if ($checkses != NULL) {
            $error = array(
                'status' => 101,
                'error' => NULL,
                'message' => 'Anda Sudah Login'
            );
            $session->setFlashdata('error', $error);
            return redirect()->to('public');
        }
        return view('login');
    }
    public function proses() {
        $session = session();
        
        
        $data = $this->request->getPost();
        $predata['email'] = $data['email'];
        $databs = $this->loginmodel->load($predata);

        if (count($databs) == 1) {
            foreach ($databs as $row) {
                $data1 = array(
                    'id' => $row['id'],
                    'email' => $row['email'],
                    'username' => $row['username'],
                    'password' => $row['password']
                );
            }

            if (md5($data['password']) == $data1['password']) {
                $datasession = array(
                    'id' => $data1['id'],
                    'email' => $data1['email'],
                    'username' => $data1['username'],
                    'status' => true
                );
                $session->set('user', $datasession);
                return redirect()->to('public');
            } else {
                $error = array(
                    'status' => 2,
                    'error' => NULL,
                    'message' => 'Password Salah'
                );
    
                $session->setFlashdata('error', $error);
                return redirect()->to('public/login');
            }
        } else {
            $error = array(
                'status' => 1,
                'error' => NULL,
                'message' => 'Email Tidak Terdaftar'
            );

            $session->setFlashdata('error', $error);
            return redirect()->to('public/login');
        }

       // if (count($data1['email']) == 1 && $data['email'] == $data1['email']) {
       //     echo 'work';
       // }
    }
    public function logout() {
        $session = session();
       // $datases = $session->get('user');
        $session->remove('user');
        return redirect()->to('public');
    }
}
