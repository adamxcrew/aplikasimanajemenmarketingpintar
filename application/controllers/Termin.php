<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Termin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('my_model', 'mymodel');
    }

    public function index()
    {
        $data['title'] = 'Termin';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();


        $query = "SELECT 
                `pelanggan`.`nama` as `pelanggan_name`, `user`.`name` as `marketer_name`, `termin`.* 
            FROM 
                `termin` 
            JOIN
                `pelanggan` ON `termin`.`id_pelanggan` = `pelanggan`.`id_pelanggan` 
            JOIN
                `user` on `termin`.`id_marketing` = `user`.`id`
            WHERE
                `termin`.`id_supervisor` IS NULL
        ";

        $termin = $this->db->query($query)->result_array();

        $data['termin'] = $termin;

        $data['pelanggan'] = $this->db->select('id_pelanggan, nama')->get_where('pelanggan', ['id_marketing' =>
        $this->session->userdata('id')])->result_array();
    

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('marketing/termin', $data);
        $this->load->view('templates/footer');
    }

    public function create(){

        $harga = $this->input->post('harga');
        $marketing = $this->session->userdata('id');
        $website = $this->input->post('website');
        $pelanggan = $this->input->post('pelanggan');

        $term1 = $harga * 0.5;
        $term2 = $harga * 0.3;
        $term3 = $harga * 0.2;

        $terminData = [
            'id_supervisor' => null,
            'id_pelanggan' => $pelanggan,
            'id_marketing' => $marketing,
            'website' => $website,
            'harga' => $harga,
            'termin1' => $term1,
            'termin2' => $term2,
            'termin3' => $term3,
            'termin1_created' => null,
            'termin2_created' => null,
            'termin3_created' => null,
            'bukti_termin1' => null,
            'bukti_termin2' => null,
            'bukti_termin3' => null,
            'is_accept' => 2
        ];

        
        $this->db->trans_begin();

        $termin = $this->db->insert('termin', $terminData);

        if($termin){
            $id = $this->db->insert_id();
            $q = $this->db->get_where('termin', array('id_termin' => $id));

            $dataTermin = $q->row();

                $dataPendapatan = [
                    'id_marketer' => $marketing,
                    'id_termin' => $dataTermin->id_termin,
                    'pendapatan_termin1' => 0,
                    'pendapatan_termin2' => 0,
                    'pendapatan_termin3' => 0,
                    'total_pendapatan' => 0,
                    'created_at' => date('Y-m-d H:i:s')
                ];

                $this->db->set($dataPendapatan);
                $this->db->insert('pendapatan');

                if ($this->db->trans_status() === FALSE) {
                    $this->db->trans_rollback();
                    echo "Gagal Menambahkan data";
                } else {
                    $this->db->trans_commit();
                    redirect('termin');
                }

        }else{
            $this->db->trans_rollback();
            echo "Something When wrong, please try again!";
        }

    }
}
