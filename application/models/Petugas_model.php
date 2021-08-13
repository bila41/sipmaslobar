<?php



defined('BASEPATH') or exit('No direct script access allowed');

class Petugas_model extends CI_Model
{

    private $_table = "petugas";

    public function addPetugas()
    {
        //untuk register
        $username = $this->input->post('email');
        $user = (explode("@", $username)); //memecah email untuk membuat username

        $data = array(
            'status_petugas' => htmlspecialchars($this->input->post('status', true)),
            'nama_petugas' => htmlspecialchars($this->input->post('nama', true)),
            
            'email' => htmlspecialchars($this->input->post('email', true)),
            'username' => $user[0], //ambil array ke 0
            'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
            'image' => 'avatar.png',
            'telp' => htmlspecialchars($this->input->post('telp', true)),
            'id_kategori' => $this->input->post('id_kategori', true)
        );

        return $this->db->insert($this->_table, $data, $user);
    }
}
