<?php
//  Convert ke format rupiah
function convRupiah($value) {
    return 'Rp. ' . number_format($value);
}

function tampil_full_kelas_byid($id)
{
    $ci =& get_instance();
    $ci ->load->database();
    $result = $ci->db->where('id',$id)->get('kelas');
        foreach($result->result() as $c){
            $stmt = $c->tingkat_kelas.' '.$c->jurusan_kelas;
            return $stmt;
    }
}
function tampil_nama_siswa($id)
{
    $ci =& get_instance();
    $ci ->load->database();
    $result = $ci->db->where('id_siswa',$id)->get('siswa');
        foreach($result->result()  as $c){
            $stmt = $c->nama_siswa;
            return $stmt;
    }
}
?>