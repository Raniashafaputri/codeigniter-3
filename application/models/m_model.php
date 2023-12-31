<?php 
 
class M_model extends CI_Model{ 
    function get_data($table){ 
        return $this->db->get($table); 
    } 
 
    function getwhere($table, $data) 
    { 
        return $this->db->get_where($table, $data); 
    } 
    public function delete($table, $field, $id) 
    { 
        $data=$this->db->delete($table, array($field => $id)); 
        return $data; 
    } 
 
    public function tambah_data($table, $data) 
    { 
       $this->db->insert($table,$data); 
        return $this->db->insert_id(); 
    } 
    public function get_by_id($table, $id_column, $id) {  
        $data = $this->db->where($id_column, $id)->get($table);  
        return $data;  
    } 
 
    public function ubah_data($table, $data, $where) {  
        $this->db->update($table, $data, $where);  
        return $this->db->affected_rows();  
    } 
    public function get_data_siswa() {
        $this->db->join('kelas', 'siswa.id_kelas = kelas.id','left');
        
        $query = $this->db->get('siswa');

        // mengembalikan hasil query
        return $query->result();
    }
    public function get_by_jurusan($jurusan, $tingkat)
    {
        $this->db->select('id');
        $this->db->from('kelas');
        $this->db->where('jurusan_kelas', $jurusan);
        $this->db->where('tingkat_kelas', $tingkat);
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            $result = $query->row();
            return $result->id;
        }else {
            return false;
        }
    }

    public function get_by_nisn($nisn)  
{ 
$this->db->select('id_siswa'); 
$this->db->from('siswa'); 
$this->db->where('nisn', $nisn); 
$query = $this->db->get(); 
 
if($query->num_rows()>0) { 
    $result = $query->row(); 
    return $result->id_siswa; 
} else { 
return false; 
} 
}


}
?>

 
    




