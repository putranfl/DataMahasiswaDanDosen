<?php namespace App\Models;
 
use CodeIgniter\Model;
 
class MahasiswaModel extends Model
{
    protected $table   = 'mahasiswa';
    protected $primaryKey = 'nim';

    protected $useAutoIncrement = true;
    protected $allowedFields = ['nama_mahasisa','jurusan','kelas', 'no_telp', 'alamat'];
    public function pencarian($kunci) {
        return $this->table('mahasiswa')->like('nama_mahasiswa', $kunci);
    }
        
    public function getMahasiswa()
    {
        $builder = $this->db->table('mahasiswa');
        return $builder->get();
    }
 
    public function saveMahasiswa($data){
        $query = $this->db->table('mahasiswa')->insert($data);
        return $query;
    }
 
    public function updateMahasiswa($data, $id)
    {
        $query = $this->db->table('mahasiswa')->update($data, array('nim' => $id));
        return $query;
    }
 
    public function hapusMahasiswa($nim)
    {
        $builder = $this->db->table($this->table);
        return $builder->delete(['nim' => $nim]);
    }
   
}