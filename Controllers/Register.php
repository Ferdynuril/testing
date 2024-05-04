<?php

namespace App\Controllers;

use App\Models\LoginModel;

class Register extends BaseController
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
            return redirect()->to('public');
        }
        return view('register');
    }

    public function proses()
    {
        $session = session();
        $data = $this->request->getPost();
        $predata['email'] = $data['email'];
        $check = $this->loginmodel->load($predata);
        if ($data['email'] != "" && $data['username'] != "" && $data['password1'] != "") {
            if (count($check) == 0) {
                if ($data['password1'] == $data['password2']) {
                    $up = array(
                        'email' => $data['email'],
                        'username' => $data['username'],
                        'password' => md5($data['password1'])
                    );
                    $this->loginmodel->insert($up);
                    return redirect()->to('public/login');
                } else {
                    $error = [
                        'status' => 3,
                        'error' => NULL,
                        'message' => "Password Tidak Sama"
                    ];
                    $session->setFlashdata('error', $error);
                    return redirect()->to('public/register');
                }
            } else {
                $error = [
                    'status' => 2,
                    'error' => NULL,
                    'message' => "Email Telah Terdaftar"
                ];
                $session->setFlashdata('error', $error);
                return redirect()->to('public/register');
            }
        } else {
            $error = [
                'status' => 1,
                'error' => NULL,
                'message' => "Mohon Isi Semua Kolom"
            ];
            $session->setFlashdata('error', $error);
            return redirect()->to('public/register');
        }
    }
}
