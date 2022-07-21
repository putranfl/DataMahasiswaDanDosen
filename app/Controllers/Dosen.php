<?php namespace App\Controllers;
 
use CodeIgniter\Controller;
use App\Models\DosenModel;
 
class Dosen extends Controller
{
    
    public function __construct()
{
    $this->db = \Config\Database::connect();
    $this->dosen = $this->db->table('dosen');
}

    public function index()
    {
        $pager = \Config\Services::pager();
        $model = new DosenModel();
        $data['dosen']  = $model->getDosen()->getResult();
        $kunci = $this->request->getVar('cari');

        if ($kunci) {
            $query = $model->pencarian($kunci);
            $jumlah = "Pencarian dengan nama <B>$kunci</B> ditemukan ".$query->affectedRows()." Data";
        } else {
            $query = $model;
            $jumlah = "";
        }
        $data['dosen'] = $model->paginate(5);
        $data['pager'] = $model->pager;
        $data['jumlah'] = $jumlah;
        echo view('dosen_view', $data);
    }
 
    public function save()
    {
        $model = new DosenModel();
        $data = array(
            'nama_dosen'        => $this->request->getPost('nama_dosen'),
            'no_telp'       => $this->request->getPost('no_telp'),
            'alamat' => $this->request->getPost('alamat'),
        );
        $model->saveDosen($data);
        return redirect()->to('/dosen');
    }
 
    public function update()
    {
        $model = new DosenModel();
        $id = $this->request->getPost('nip');
        $data = array(
            'nama_dosen'        => $this->request->getPost('nama_dosen'),
            'no_telp'       => $this->request->getPost('no_telp'),
            'alamat' => $this->request->getPost('alamat'),
        );
        $model->updateDosen($data, $id);
        return redirect()->to('/dosen');
    }

    public function delete($nip)
    {
        $model = new DosenModel;
        $getDosen = $model->getDosen($nip)->getRow();
        if(isset($getDosen))
        {
            $model->hapusDosen($nip);

            echo '<script>
                    alert("Hapus Data Sukses");
                    window.location="'.base_url('dosen').'"
                </script>';

        }else{

            echo '<script>
                    alert("Hapus Gagal !, NIP '.$nip.' Tidak ditemukan");
                    window.location="'.base_url('dosen').'"
                </script>';
        }
    }
}
 