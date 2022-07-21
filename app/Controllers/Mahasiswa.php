<?php namespace App\Controllers;
 
use CodeIgniter\Controller;
use App\Models\MahasiswaModel;
 
class Mahasiswa extends Controller
{
    
    public function __construct()
{
    $this->db = \Config\Database::connect();
    $this->dosen = $this->db->table('mahasiswa');
}

    public function index()
    {
        $pager = \Config\Services::pager();
        $model = new MahasiswaModel();
        $data['mahasiswa']  = $model->getMahasiswa()->getResult();
        $kunci = $this->request->getVar('cari');

        if ($kunci) {
            $query = $model->pencarian($kunci);
            $jumlah = "Pencarian dengan nama <B>$kunci</B> ditemukan ".$query->affectedRows()." Data";
        } else {
            $query = $model;
            $jumlah = "";
        }
        $data['mahasiswa'] = $model->paginate(5);
        $data['pager'] = $model->pager;
        $data['jumlah'] = $jumlah;
        echo view('mahasiswa_view', $data);
    }
 
    public function save()
    {
        $model = new MahasiswaModel();
        $data = array(
            'nama_mahasiswa'        => $this->request->getPost('nama_mahasiswa'),
            'jurusan'       => $this->request->getPost('jurusan'),
            'kelas' => $this->request->getPost('kelas'),
            'no_telp'       => $this->request->getPost('no_telp'),
            'alamat' => $this->request->getPost('alamat'),
        );
        $model->saveMahasiswa($data);
        return redirect()->to('/mahasiswa');
    }
 
    public function update()
    {
        $model = new MahasiswaModel();
        $id = $this->request->getPost('nim');
        $data = array(
            'nama_mahasiswa'        => $this->request->getPost('nama_mahasiswa'),
            'jurusan'       => $this->request->getPost('jurusan'),
            'kelas' => $this->request->getPost('kelas'),
            'no_telp'       => $this->request->getPost('no_telp'),
            'alamat' => $this->request->getPost('alamat'),
        );
        $model->updateMahasiswa($data, $id);
        return redirect()->to('/mahasiswa');
    }

    public function delete($nim)
    {
        $model = new MahasiswaModel;
        $getMahasiswa = $model->getMahasiswa($nim)->getRow();
        if(isset($getMahasiswa))
        {
            $model->hapusMahasiswa($nim);

            echo '<script>
                    alert("Hapus Data Sukses");
                    window.location="'.base_url('mahasiswa').'"
                </script>';

        }else{

            echo '<script>
                    alert("Hapus Gagal !, NIM '.$nim.' Tidak ditemukan");
                    window.location="'.base_url('mahasiswa').'"
                </script>';
        }
    }
}
 