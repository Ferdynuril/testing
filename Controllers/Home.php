<?php

namespace App\Controllers;

use App\Models\MarketModel;
use App\Models\CartModel;
use App\Models\LoginModel;

class Home extends BaseController
{
    public function __construct()
    {
        $this->marketmodel = New MarketModel();
        $this->cartmodel = New CartModel();
        $this->loginmodel = New LoginModel;
    }
    public function index()
    {
        $data['userc'] = $this->loginmodel->load(array());
        $data['item'] = $this->marketmodel->load(array());
        return view('index', $data);
    }
    public function pricing()
    {
        return view('pricing');
    }
    public function marketplace()
    {
        $session = session();
        $checkses = $session->get('user');

        $search = $this->request->getVar('search');
        if (isset($search)) {
            $data['produk'] = $this->marketmodel->cari($search);
        } else {
            $data['produk'] = $this->marketmodel->load(array());
        }
        
        
        if ($checkses == NULL) {
           // $dt['itemname'] = 'You Must Login';
           // $dt['itemid'] = NULL;
           // $data['cart'] = array(0 => $dt);
        } else {
            $id['userid'] = $checkses['id'];
            $data1 = $this->cartmodel->load($id);
            if (count($data1) == 0) {
                $dt['itemname'] = "Add Item to Cart";
                $dt['itemid'] = NULL;
                $dt['id'] = 0;
                $data['cart'] = array(0 => $dt);
            } else {
                foreach ($data1 as $row) {
                    $itemid['itemid'] = $row['itemid'];
                    $data3 = $this->marketmodel->load($itemid);
                    $data4['itemname'] = $data3[0]['itemname'];
                    $data4['id'] = $row['id'];
                    $data2[] = $data4;
                }
                $data['cart'] = $data2;
            }
        }
        return view('marketplace', $data);
    }
    public function cart() {
        $session = session();
        $checkses = $session->get('user');
        
        if ($checkses == NULL) {
            return redirect()->to('public/login');
        } else {
            $idses['userid'] = $checkses['id'];
            $data['itemid'] = $this->request->getVar('itemid');
            $data3 = $this->cartmodel->load($idses);
            foreach ($data3 as $row) {
                if ($row['itemid'] == $data['itemid']) {
                    $error = array(
                        'error' => true,
                        'status' => 505,
                        'message' => 'Anda telah memasukkan barang kedalam keranjang. Silahkan Checkout.',
                    );
                    $session->setFlashdata('error', $error);
                    return redirect()->to('public/home/marketplace');
                }
            }

            $data1 = $this->marketmodel->load($data);
            $data2 = array(
                'userid' => $checkses['id'],
                'itemid' => $data1[0]['itemid'],
            );
            $this->cartmodel->insert($data2);
            return redirect()->to('public/home/marketplace');
        }
    }
    public function recart()
    {
        $session = session();
        $checkses = $session->get('user');

        if ($checkses == NULL) {
            return redirect()->to('public/login');
        } else {
            $data['id'] = $this->request->getVar('id');
            $data1 = $this->cartmodel->load($data);
            if (count($data1) != 0){
                if ($data1[0]['userid'] == $checkses['id']) {
                    $this->cartmodel->delete($data);
                    return redirect()->to('public/home/marketplace');
                } else {
                    $error = array(
                        'error' => NULL,
                        'status' => 101,
                        'message' => 'Terjadi Kesalahan',
                    );
                    $session->setFlashdata('error', $error);
                }
            } else {
                $error = array(
                    'error' => NULL,
                    'status' => 102,
                    'message' => 'Terjadi Kesalahan, Item Tidak Ditambahkan Dalam Cart'
                );
                return redirect()->to('public/home/marketplace');
            }
        }
    }
}
