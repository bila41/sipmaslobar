<?php

/**
 * BISMILLAHIRROHMANIRROHIM
 * Author   : alfianifk.my.id 
 * Nama App : sipmas (Sistem Pengaduan Masyarakat)
 */

defined('BASEPATH') OR exit('No direct script access allowed');

class Masyarakat_model extends CI_Model {

    private $_table = "warga";
    
    public function getAll()
    {
        return $this->db->get($this->_table)->result_array(); //ambil semua data
    }

    public function add()
    {
        //untuk register
        $username = $this->input->post('email');
        $user = (explode("@", $username)); //memecah email untuk membuat username
        
        $data = array(
            'nik' => htmlspecialchars($this->input->post('nik', true)),
            'username' => $user[0], //ambil array ke 0
            'nama' => htmlspecialchars($this->input->post('nama', true)),
            'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
            'telp' => htmlspecialchars($this->input->post('telp', true)),
            'alamat' => htmlspecialchars($this->input->post('alamat', true)),
            'image' => 'avatar.png',
            'email' => htmlspecialchars($this->input->post('email', true)),
        );

        return $this->db->insert($this->_table, $data, $user);
    }

    public function update_profile()
    {
        $data = array(
            'nik' => htmlspecialchars($this->input->post('nik', true)),
            'username' => htmlspecialchars($this->input->post('username', true)), 
            'nama' => htmlspecialchars($this->input->post('nama', true)),
            'telp' => htmlspecialchars($this->input->post('telp', true)),
            'alamat' => htmlspecialchars($this->input->post('alamat', true)),
            'image' => $this-> _uploadImg(),
            'email' => htmlspecialchars($this->input->post('email', true))
        );

        $this->db->where('nik', $this->input->post('nik'));
       
        $this->db->update($this->_table, $data);
    }

    
    public function kategori()
    {
        //untuk form
        return $this->db->get('kategori')->result_array();
    }

    private function _uploadImg()
    {
        $imgUpload = $_FILES['gambar']['name'];

        if ($imgUpload) {
            $config['allowed_types'] = 'gif|jpg|png';
            $config['upload_path'] = '/assets/img/profile/';
            $config['file_name'] = uniqid();
            $config['overwrite'] = true;

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('gambar'))
            {
                return $this->upload->data('file_name');
            } else {
                echo $this->upload->display_errors();
            }
        }

    } 
}