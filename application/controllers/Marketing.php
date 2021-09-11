<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Marketing extends CI_Controller
{
    public function __construct(){
        parent::__construct();
        $this->load->model('my_model','my');

        $role = $this->session->userdata('role_id');
        if($role == 1){
            redirect('admin');
        }elseif($role == 2){
            redirect('supervisor');
        }
    }

    public function index()
    {
        $data['title'] = 'Halaman Marketing';
        $data['user'] = $this->db->get_where('user', ['email' => 
        $this->session->userdata('email')])->row_array();

        $id = $this->session->userdata('id');
        $now = date('Y-m-d');
        $firstDay = date("Y-m-01", strtotime($now));
        $lastDay = date("Y-m-t", strtotime($now)); 
        
        $query = "SELECT SUM(`pendapatan`.`total_pendapatan`) as penghasilan
                    FROM `pendapatan`
                    JOIN `termin` ON `pendapatan`.`id_termin` = `termin`.`id_termin`
                    WHERE `pendapatan`.`id_marketer` = $id AND `termin`.`is_accept` = 1
                    AND `pendapatan`.`created_at` BETWEEN '$firstDay' AND '$lastDay'
        ";
        $pengahasilan = $this->db->query($query)->row();

        $countPelanggan = $this->db->get_where('pelanggan',['id_marketing' => $id])->num_rows();

        $data['selesai'] = $this->db->get_where('termin', ['id_marketing' => $id, 'is_done' => 1])->num_rows();

        $data['amount'] = $pengahasilan->penghasilan;
        $data['jumlahPelanggan'] = $countPelanggan;

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar-marketing', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('marketing/index', $data);
        $this->load->view('templates/footer'); 
    }

    public function termin()
    {
        $data['title'] = 'Termin';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $id = $this->session->userdata('id');

        $query = "SELECT 
                `pelanggan`.`nama` as `pelanggan_name`, `user`.`name` as `marketer_name`, `termin`.* 
            FROM 
                `termin` 
            JOIN
                `pelanggan` ON `termin`.`id_pelanggan` = `pelanggan`.`id_pelanggan` 
            JOIN
                `user` on `termin`.`id_marketing` = `user`.`id`
            WHERE
                `termin`.`id_marketing` = $id
        ";

        $termin = $this->db->query($query)->result_array();

        $data['termin'] = $termin;

        $data['pelanggan'] = $this->db->select('id_pelanggan, nama')->get_where('pelanggan', ['id_marketing' =>
        $this->session->userdata('id')])->result_array();

        $data['jenis'] = $this->db->select('id, nama')->order_by('nama', 'ASC')->get('jenis_web')->result_array();
    

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar-marketing', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('marketing/m_termin', $data);
        $this->load->view('templates/footer');
    }

    public function createTermin(){

        $harga = $this->input->post('harga');
        $marketing = $this->session->userdata('id');
        $website = $this->input->post('website');
        $pelanggan = $this->input->post('pelanggan');
        $date = date('Y-m-d H:i:s');
        $id = $this->session->userdata('id');
        $getMarketing = $this->db->get_where('user', ['id' => $id])->row_array();

        $term1 = $harga * 0.5;
        $term2 = $harga * 0.3;
        $term3 = $harga * 0.2;


        $terminData = [
            'id_supervisor' => $getMarketing['spv_id'],
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
            'is_accept' => 2,
            'is_done' => 0,
            'created_at' => $date
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
                    'created_at' => $date
                ];

                $this->db->set($dataPendapatan);
                $this->db->insert('pendapatan');

                if ($this->db->trans_status() === FALSE) {
                    $this->db->trans_rollback();
                    echo "Gagal Menambahkan data";
                } else {
                    $this->db->trans_commit();
                    redirect('marketing/termin');
                }

        }else{
            $this->db->trans_rollback();
            echo "Something When wrong, please try again!";
        }
    }

    public function pelanggan(){
        $data['title'] = 'Data Pelanggan';
        $data['pelanggan'] = $this->db->get_where('pelanggan', ['id_marketing' =>
        $this->session->userdata('id')])->result_array();

        $data['user'] = $this->db->get_where('user', ['email' => 
        $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar-marketing', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('pelanggan/index', $data);
        $this->load->view('templates/footer');
    }

    public function createPelanggan(){
        if(isset($_POST)){

            $provinsi = $this->input->post('provinsi');
            $kabupaten = $this->input->post('kab');
            $kecamatan = $this->input->post('kec');
            $kelurahan = $this->input->post('kel');

            $data = [
                'nama' => $this->input->post('nama'),
                'alamat' => $this->input->post('alamat'),
                'provinsi' => $provinsi,
                'kabupaten' => $kabupaten,
                'kecamatan' => $kecamatan,
                'kelurahan' => $kelurahan,
                'no_telepon' => $this->input->post('no_telp'),
                'email' => $this->input->post('email'),
                'created_at' => date('Y-m-d H:i:s'),
                'id_marketing' => $this->session->userdata('id')
            ];

            $this->db->set($data);
            $ins = $this->db->insert('pelanggan');

            if($ins){
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berhasil menambahkan pelanggan baru!</div>');
                redirect('marketing/pelanggan');
            }else{
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Gagal menambahkan pelanggan baru!</div>');
                redirect('marketing/pelanggan');
            }

        }else{
            redirect('marketing/pelanggan');
        }  
    }

    public function pendapatan(){
        $data['title'] = 'Pendapatan';

        $id = $this->session->userdata('id');

        if(isset($_POST['filter'])){

            $start = $this->input->post('awal');
            $end = $this->input->post('akhir');
            $endDate = date_modify(new DateTime($end), '+1 days')->format('Y-m-d');
            
            $pendapatan = $this->my->getFilteredPendapatan($start,$endDate,$id)->result_array();

        }else{

            $query = "SELECT 
                    `pelanggan`.`nama` as `pelanggan_name`, `user`.`name` as `marketer_name`, `pendapatan`.*, `termin`.`website`, `termin`.`harga`
                FROM 
                    `pendapatan` 
                JOIN
                    `termin` ON `pendapatan`.`id_termin` = `termin`.`id_termin` 
                JOIN
                    `user` on `termin`.`id_marketing` = `user`.`id`
                JOIN
                    `pelanggan` ON `termin`.`id_pelanggan` = `pelanggan`.`id_pelanggan`
                WHERE
                    `pendapatan`.`id_marketer` = $id AND `termin`.`is_accept` = 1
            ";

            $pendapatan = $this->db->query($query)->result_array();
        }

        $data['user'] = $this->db->get_where('user', ['email' => 
        $this->session->userdata('email')])->row_array();

        $data['pendapatan'] = $pendapatan;

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar-marketing', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('marketing/m_pendapatan', $data);
        $this->load->view('templates/footer');
    }

    public function laporanku(){
        $data['title'] = 'Laporan Pendapatan';
        $data['user'] = $this->db->get_where('user', ['email' => 
        $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar-marketing', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('marketing/m_laporan', $data);
        $this->load->view('templates/footer'); 
    }

    public function report(){
        $id = $this->session->userdata('id');

        $start = $this->input->post('awal');
        $end = $this->input->post('akhir');

        $endDate = date_modify(new DateTime($end), '+1 days')->format('Y-m-d');

        $pendapatan = $this->my->getFilteredPendapatan($start,$endDate,$id);

        if($pendapatan->num_rows() > 0){
            $this->load->library('PDF','pdf');
            $date = date('d F Y', strtotime(date('Y-m-d')));

            $data['result'] = $pendapatan->result_array();
            $data['now'] = $date;
            $data['between'] = [
                'start' => date('d F Y', strtotime($start)), 
                'end' => date('d F Y', strtotime($end))
            ];
            
            $this->pdf->setPaper('A4', 'potrait');
            $this->pdf->filename = "laporan-marketing-".$date.".pdf";
            $this->pdf->load_view('marketing/view_laporan', $data);
        }else{
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            Hmm, Belum ditemukan data</div>');
            redirect('marketing/laporanku');
        }
    }

    public function report_harian(){
        $id = $this->session->userdata('id');

        $hari = date('Y-m-d');

        $pendapatan = $this->my->getPendapatanHarianMarketing($hari,$id);

        if($pendapatan->num_rows() > 0){
            $this->load->library('PDF','pdf');
            $date = date('d F Y', strtotime(date('Y-m-d')));

            $data['result'] = $pendapatan->result_array();
            $data['now'] = $date;
            
            $this->pdf->setPaper('A4', 'potrait');
            $this->pdf->filename = "laporan-marketing-".$date.".pdf";
            $this->pdf->load_view('marketing/view_laporan_harian', $data);
        }else{
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            Hmm, Belum ditemukan data</div>');
            redirect('marketing/laporanku');
        }
    }

    public function getHarga(){
        $id =  $this->input->get('id');

        $get = $this->db->get_where('jenis_web', ['id' => $id])->row();

        $encode = json_encode(['harga'=> $get->harga, 'formatted' => number_format($get->harga)]);
        echo $encode;
    }

    public function reminder(){
        $data['title'] = 'Termin Reminder';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $id = $this->session->userdata('id');

        $query = "SELECT 
                `pelanggan`.`nama` as `pelanggan_name`, `user`.`name` as `marketer_name`, `termin`.* 
            FROM 
                `termin` 
            JOIN
                `pelanggan` ON `termin`.`id_pelanggan` = `pelanggan`.`id_pelanggan` 
            JOIN
                `user` on `termin`.`id_marketing` = `user`.`id`
            WHERE
                `termin`.`id_marketing` = $id AND `termin`.`is_accept` = 1
        ";

        $termin = $this->db->query($query)->result_array();

        $data['termin'] = $termin;
    

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar-marketing', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('marketing/reminder', $data);
        $this->load->view('templates/footer');
    }

    public function print_reminder($idTermin){

            $this->load->library('PDF','pdf');
            $date = date('d F Y', strtotime(date('Y-m-d')));

            $query = "SELECT 
                    `pelanggan`.`nama` as `pelanggan_name`, `mkt`.`name` as `marketer_name`, `spv`.`name` as `supervisor_name`, `termin`.* 
                FROM 
                    `termin` 
                JOIN
                    `pelanggan` ON `termin`.`id_pelanggan` = `pelanggan`.`id_pelanggan` 
                JOIN
                    `user` as `mkt` on `termin`.`id_marketing` = `mkt`.`id`
                JOIN
                    `user` as `spv` on `termin`.`id_supervisor` = `spv`.`id`
                WHERE
                    `termin`.`id_termin` = $idTermin AND `termin`.`is_accept` = 1
                ";

            $termin = $this->db->query($query)->row_array();

            $data['result'] = $termin;
            $data['now'] = $date;
            
            $this->pdf->setPaper('A4', 'potrait');
            $this->pdf->filename = "termin reminder-".$date.".pdf";
            $this->pdf->load_view('marketing/print_view_reminder', $data);
    }
}