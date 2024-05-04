<?php

namespace App\Controllers;

use App\Models\MarketModel;
use App\Models\CartModel;

class Checkout extends BaseController
{
    public function __construct()
    {
        $this->marketmodel = New MarketModel();
        $this->cartmodel = New CartModel();
    }
    public function index()
    {
        $itemid['itemid'] = $this->request->getVar('itemid');
        $data['data'] = $this->marketmodel->load($itemid);
        return view('checkout', $data);
    }
    public function cart()
    {
        $session = session();
        $username = $session->get('user');

        if ($username == NULL) {
            $error = array(
                'error' => NULL,
                'status' => 303,
                'message' => 'Anda Perlu Login Untuk Checkout'
            );
            $session->setFlashdata('error', $error);
            return redirect()->to('public/login');
        }
        $req['userid'] = $username['id'];
        $data1 = $this->cartmodel->load($req);
        

        if (count($data1) == 0) {
            return redirect()->to('public/home/marketplace');
        } else {
            foreach ($data1 as $row) {
                $req1['itemid'] = $row['itemid'];
                $dt = $this->marketmodel->load($req1);
                foreach ($dt as $row1) {
                    $dt1[] = array(
                        'itemname' => $row1['itemname'],
                        'itemid' => $row1['itemid'],
                        'itemprice' => $row1['itemprice'],
                    );
                }
            }
            $data['data'] = $dt1;
            return view('checkout', $data);
        }
    }
}
