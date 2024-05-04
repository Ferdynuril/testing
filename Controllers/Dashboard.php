<?php


namespace App\Controllers;
use App\Models\MarketModel;

class Dashboard extends BaseController
{
    public function __construct()
    {
        $this->marketmodel = new MarketModel();
    }
    public function index()
    {
        $session = session();
        $checkses = $session->get('user');

        if ($checkses == NULL) {
            return redirect()->to('public/login');
        } else {
            return view('dashboard');
        }
    }

    public function product()
    {
        $session = session();
        $checkses = $session->get('user');

        if ($checkses == NULL) {
            return redirect()->to('public/login');
        } else {
            $id['userid'] = $checkses['id'];
            
            $data['produk'] = $this->marketmodel->load($id);
            
            return view('products', $data);
        }
    }

    public function newproduct()
    {
        $session = session();
        $checkses = $session->get('user');

        if ($checkses == NULL) {
            return redirect()->to('public/login');
        } else {
            $data = array(
                'userid' => $checkses['id'],
                'useritem' => $checkses['username'],
            );
            return view('newproduct', $data);
        }
    }
    public function prosespro()
    {
        $session = session();
        $checkses = $session->get('user');
        if ($checkses == NULL) {
            return redirect()->to('public/login');
        } else {
            $data = $this->request->getPost();
            if ($data['itemname'] == "" || $data['itemprice'] == "") {
                $error = array(
                    'error' => 101,
                    'status' => NULL,
                    'message' => 'Mohon Isi Nama Produk / Harga Produk',
                
                );
                $session->setFlashdata('error', $error);
                return redirect()->to('public/dashboard/newproduct');
            } else {
                $up = array(
                    'itemname' => $data['itemname'],
                    'itemdesc' => $data['itemdesc'],
                    'itemprice' => $data['itemprice'],
                    'useritem' => $checkses['username'],
                    'userid' => $checkses['id'],
                );
                $this->marketmodel->insert($up);
                return redirect()->to('public/dashboard/product');
            }
        }
    }
    public function editproduct()
    {
        $session = session();
        $checkses = $session->get('user');
        if ($checkses == NULL) {
            return redirect()->to('public/login');
        } else {
            $data['itemid'] = $this->request->getVar('itemid');
            $data1 = $this->marketmodel->load($data);
            if ($checkses['id'] == $data1[0]['userid']) {
                $data2 = array(
                    'userid' => $checkses['id'],
                    'useritem' => $checkses['username'],
                    'itemname' => $data1[0]['itemname'],
                    'itemdesc' => $data1[0]['itemdesc'],
                    'itemprice' => $data1[0]['itemprice'],
                    'itemid' => $data['itemid'],
                );
                return view('productedit', $data2); 
            } else {
                return redirect()->to('public/dashboard/product');
            }
        }
    }
    
    public function prosesedit()
    {
        $session = session();
        $checkses = $session->get('user');
        if ($checkses == NULL) {
            return redirect()->to('public/login');
        } else {
            $data['itemid'] = $this->request->getVar('itemid');
            $data1 = $this->marketmodel->load($data);
            if ($checkses['id'] == $data1[0]['userid']) {
                $data2 = $this->request->getPost();
                $data3 = array(
                    'itemname' => $data2['itemname'],
                    'itemdesc' => $data2['itemdesc'],
                    'itemprice' => $data2['itemprice'],
                    'useritem' => $data1[0]['useritem'],
                    'userid' => $data1[0]['userid'],
                );
                $this->marketmodel->update($data['itemid'], $data3);
                return redirect()->to('public/dashboard/product');
            } else {
                return redirect()->to('public/dashboard');
            }
        }
    }
    public function delete()
    {
        $session = session();
        $checkses = $session->get('user');

        if ($checkses == NULL) {
            return redirect()->to('public/login');
        } else {
            $data['itemid'] = $this->request->getVar('itemid');
            $data1 = $this->marketmodel->load($data);
            if ($data1[0]['userid'] == $checkses['id']) {
                $this->marketmodel->delete($data);
                return redirect()->to('public/dashboard/product');
            } else {
                return redirect()->to('public/dashboard');
            }
        }
    }
}
?>