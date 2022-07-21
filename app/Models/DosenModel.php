<?php namespace App\Models;
 
use CodeIgniter\Model;
 
class DosenModel extends Model
{
    protected $table   = 'dosen';
    protected $primaryKey = 'nip';

    protected $useAutoIncrement = true;
    protected $allowedFields = ['nama_dosen', 'no_telp', 'alamat'];
    public function pencarian($kunci) {
        return $this->table('dosen')->like('nama_dosen', $kunci);
    }
        
    public function getDosen()
    {
        $builder = $this->db->table('dosen');
        return $builder->get();
    }
 
    public function saveDosen($data){
        $query = $this->db->table('dosen')->insert($data);
        return $query;
    }
 
    public function updateDosen($data, $id)
    {
        $query = $this->db->table('dosen')->update($data, array('nip' => $id));
        return $query;
    }
 
    public function hapusDosen($nip)
    {
        $builder = $this->db->table($this->table);
        return $builder->delete(['nip' => $nip]);
    }
   
}