<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pelanggan extends CI_Controller
{
    public function edit()
    {   
        $id = $this->input->get('id');
        $data['title'] = 'Ubah Data Pelanggan';

        $data['editData'] = $this->db->get_where('pelanggan', ['id_pelanggan' => $id])->row();
            
        $role = $this->session->userdata('role_id');
        
        if($role == 1){
            $views = 'templates/sidebar';
        }elseif($role == 2){
            $views = 'templates/sidebar-supervisor';
        }else{
            $views = 'templates/sidebar-marketing';
        }

        $this->load->view('templates/header', $data);
        $this->load->view($views, $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('pelanggan/edit', $data);
        $this->load->view('templates/footer');
    }

    public function store(){
        $id = $this->input->post('id');
        $nama = $this->input->post('nama');
        $alamat = $this->input->post('alamat');
        $no_telp = $this->input->post('no_telp');
        $email = $this->input->post('email');

        $provinsi = $this->input->post('provinsi');
        $kabupaten = $this->input->post('kab');
        $kecamatan = $this->input->post('kec');
        $kelurahan = $this->input->post('kel');

        $data = [
            'nama' => $nama,
            'alamat' => $alamat,
            'provinsi' => $provinsi,
            'kabupaten' => $kabupaten,
            'kecamatan' => $kecamatan,
            'kelurahan' => $kelurahan,
            'no_telepon' => $no_telp,
            'email' => $email
        ];

        $this->db->where('id_pelanggan', $id);
        $this->db->set($data);

        $role = $this->session->userdata('role_id');

        if($role == 1){
            $redirect = 'admin/pelanggan';
        }elseif($role == 2){
            $redirect = 'supervisor/pelanggan';
        }else{
            $redirect = 'marketing/pelanggan';
        }

        if($this->db->update('pelanggan')){
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Berhasil mengubah info pelanggan</div>');
            redirect($redirect);
        }else{
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            Gagal mengubah info pelanggan!</div>');
            redirect($redirect);
        }
    }

    public function delete(){
        $id = $this->input->get('id');

        $role = $this->session->userdata('role_id');

        if($role == 1){
            $redirect = 'admin/pelanggan';
        }elseif($role == 2){
            $redirect = 'supervisor/pelanggan';
        }else{
            $redirect = 'marketing/pelanggan';
        }

        if($this->db->delete('pelanggan', array('id_pelanggan' => $id))){
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Berhasil menghapus pelanggan</div>');
            redirect($redirect);
        }else{
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            Gagal menghapus pelanggan!</div>');
            redirect($redirect);
        }
    }

    public function detail_pelanggan(){
        $idPel = $this->input->get('pelanggan');
        $role = $this->session->userdata('role_id');

        if($role == 1){
            $query = "SELECT `s`.`name` as `supervisor_name`, `m`.`name` as `marketer_name`,
                        `pelanggan`.*
                    FROM `pelanggan`
                        JOIN `user` as `m` on `pelanggan`.`id_marketing` = `m`.`id`
                        JOIN `user` as `s` on `m`.`spv_id` = `s`.`id`
                        WHERE `pelanggan`.`id_pelanggan` = '$idPel'
            ";

            $pelanggan = $this->db->query($query)->row();

        }else{
            $pelanggan = $this->db->get_where('pelanggan',['id_pelanggan' => $idPel])->row();
        }

        $data['title'] = 'Detail Pelanggan';
        $data['detail'] = $pelanggan;

        $data['user'] = $this->db->get_where('user', ['email' => 
        $this->session->userdata('email')])->row_array();

        
        
        if($role == 1){
            $views = 'templates/sidebar';
        }elseif($role == 2){
            $views = 'templates/sidebar-supervisor';
        }else{
            $views = 'templates/sidebar-marketing';
        }

        $this->load->view('templates/header', $data);
        $this->load->view($views, $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('pelanggan/detail', $data);
        $this->load->view('templates/footer');
    }
}
