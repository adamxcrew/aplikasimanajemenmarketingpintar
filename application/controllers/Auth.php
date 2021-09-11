<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }

    public function index() 
    {
        $this->form_validation->set_rules('email', 'Email','trim|required|valid_email');
        $this->form_validation->set_rules('password', 'Kata Sandi','trim|required');
        if($this->form_validation->run() == false) {
            $data['title'] = 'Masuk Akun M-Mart';
            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/login');
            $this->load->view('templates/auth_footer');
        } else {
            //validasi sukses
            $this->_login();
        }
    }


    private function _login()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        $user = $this->db->get_where('user', ['email' => $email])->row_array();
        // jika usernya ada
        if ($user) {
            // jika usernya aktif
            if ($user['is_active'] == 1) {
                // cek password
                if (password_verify($password, $user['password'])) {
                    $data = [
                        'id' => $user['id'],
                        'name' => $user['name'],
                        'email' => $user['email'],
                        'created' => $user['date_created'],
                        'role_id' => $user['role_id'],
                    ];
                    $this->session->set_userdata($data);

                    if($email == $password){
                        $this->session->set_flashdata('message', '<div class="alert alert-warning" role="alert">Kata Sandi anda masih default, mohon untuk mengganti Kata Sandi demi keamanan akun! </div>');
                    }

                    if($user['role_id'] == 1 ){
                        redirect('admin');
                    } elseif ($user['role_id'] == 2){
                        redirect('supervisor');
                    } else {
                        redirect('marketing');
                    }
                    
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                    Kata Sandi Salah !!!</div>');
                    redirect('auth');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            Maaf akun anda telah diblokir!!</div>');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            Email Belum Terdaftar !!! </div>');
            redirect('auth');
        }
    }


    // public function register()
    // {
    //     $this->form_validation->set_rules('name', 'Nama Lengkap', 'required|trim');
    //     $this->form_validation->set_rules('phone', 'Nomor Telepon', 'required|trim|min_length[10]|max_length[14]|is_unique[user.phone]', [
    //         'is_unique' => 'Nomor Telepon Telah Di Gunakan',
    //         'min_length' => 'Nomor Telepon Terlalu Pendek'
    //     ]);
    //     $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]', [
    //         'is_unique' => 'Email Telah Digunakan'
    //     ]);
    //     $this->form_validation->set_rules('password1', 'Kata Sandi', 'required|trim|min_length[6]|matches[password2]', [
    //         'matches' => 'Kata Sandi Berbeda',
    //         'min_length' => 'Kata Sandi Terlalu Pendek.'
    //     ]);
    //     $this->form_validation->set_rules('password2', 'Kata Sandi', 'required|trim|min_length[6]|matches[password1]');


    //     if ($this->form_validation->run() == false) {
    //         $data['title'] = 'Daftar Akun M-Mart';
    //         $this->load->view('templates/auth_header', $data);
    //         $this->load->view('auth/register');
    //         $this->load->view('templates/auth_footer');
    //     } else {
    //         $data = [
    //             'name' => htmlspecialchars($this->input->post('name', true)),
    //             'phone' => htmlspecialchars($this->input->post('phone', true)),
    //             'email' => htmlspecialchars($this->input->post('email', true)),
    //             'image' => 'default.jpg',
    //             'password' => password_hash(
    //                 $this->input->post('password1'),
    //                 PASSWORD_DEFAULT
    //             ),
    //             'role_id' => 3,
    //             'is_active' => 1,
    //             'date_created'  => time()
    //         ];

            
    //         $this->db->insert('user', $data); //query untuk memasukan ke database
    //         $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
    //         Akun Berhasil di daftarkan. Silakan Login
    //         </div>');
    //         redirect('auth');
    //     }
    // }

    public function logout()
    {
        $arrItems = ['id','email','role_id','created','name'];
        $this->session->unset_userdata($arrItems);

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                    Anda Telah Keluar Aplikasi ! </div>');
        redirect('auth');
    }
}
