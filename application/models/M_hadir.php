<?php

class M_hadir extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    public function get_presensi($id_rapat)
    {
        $this->db->from('tbl_daftarhadir');
        $this->db->where('id_Rapat', $id_rapat);
        return $this->db->get()->result();
    }

    public function simpan($id_rapat, $nip, $nama, $jabatan, $unit, $instansi, $email, $attendance)
    {
        $simpan = [
            'id_Rapat' => $id_rapat,
            'nip' => $nip,
            'namaLengkap' => $nama,
            'jabatan' => $jabatan,
            'unit' => $unit,
            'instansi' => $instansi,
            'email' => $email,
            'attendance' => $attendance
        ];
        $this->db->insert('tbl_daftarhadir',$simpan);
    }

    public function data_hadir($id, $id_rapat)
    {
        return $this->db->get_where('tbl_daftarhadir',['id' => $id, 'id_Rapat' =>$id_rapat ]);
    }

    public function update($id, $id_rapat, $nip, $nama, $jabatan, $unit, $instansi, $email)
    {
        $update = [
            'id_Rapat' => $id_rapat,
            'nip' => $nip,
            'namaLengkap' => $nama,
            'jabatan' => $jabatan,
            'unit' => $unit,
            'instansi' => $instansi,
            'email' => $email
        ];
        $this->db->where('id', $id);
        $this->db->update('tbl_daftarhadir',$update);
    }

    public function delete($id)
    {
        return $this->db->delete('tbl_daftarhadir', ['id' => $id]);
    }

    public function save($id_rapat, $nip, $nama, $jabatan, $unit, $instansi, $email , $signature)
    {
        $simpan = [
            'id_Rapat' => $id_rapat,
            'nip' => $nip,
            'namaLengkap' => $nama,
            'jabatan' => $jabatan,
            'unit' => $unit,
            'instansi' => $instansi,
            'email' => $email,
            // 'sign' => $file,
            'sign_base64' => $signature
        ];
        $this->db->insert('tbl_daftarhadir', $simpan);
    }

    public function hasSameNip($nip, $id_rapat)
    {
        $this->db->from('tbl_daftarhadir');
        $array = array('nip' => $nip, 'id_Rapat' => $id_rapat);
        $this->db->where($array);
        return $this->db->get()->result();
    }
}
