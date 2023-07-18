<?php

class M_hadir extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    function get_hadir()
    {
        //return $this->db->get('tbl_daftarrapat')->result_array;
        $query = $this->db->query("SELECT tbl_daftarhadir.nip, tbl_daftarhadir.namaLengkap, tbl_daftarhadir.jabatan, 
                        tbl_daftarhadir.unit, tbl_daftarhadir.intansi, tbl_daftarhadir.email, tbl_daftarhadir.attendance 
                    FROM tbl_daftarhadir 
                    INNER JOIN tbl_daftarrapat ON tbl_daftarhadir.id_Rapat = tbl_daftarrapat.id 
                    WHERE tbl_daftarhadir.id_Rapat = tbl_daftarrapat.id");
        return $query->result();
        //print_r($query);
        //die();
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

    public function save($id_rapat, $nip, $nama, $jabatan, $unit, $instansi, $email, $file)
    {
        $simpan = [
            'id_Rapat' => $id_rapat,
            'nip' => $nip,
            'namaLengkap' => $nama,
            'jabatan' => $jabatan,
            'unit' => $unit,
            'instansi' => $instansi,
            'email' => $email,
            'sign' => $file
        ];
        $this->db->insert('tbl_daftarhadir', $simpan);
    }

    public function hasSameNip($nip)
    {
        $this->db->from('tbl_daftarhadir');
        $this->db->where('nip', $nip);
        $data = $this->db->get();
        $result = $data->row();
        $nip = $result->nip;
        if($nip == "-"){
            return true;
        } else {
            return false;
        }
    }
}
