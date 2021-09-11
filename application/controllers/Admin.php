<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct(){
        parent::__construct();
        $this->load->model('My_model', 'mymodel');

        $role = $this->session->userdata('role_id');
        if($role == 2){
            redirect('supervisor');
        }elseif($role == 3){
            redirect('marketing');
        }
    }

    public function index()
    {
        $data['title'] = 'Halaman Administration';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        
        $data['amount'] = $this->mymodel->getPendapatanBulanIni()->row()->amount;
        $data['marketer'] = $this->db->get_where('user',['role_id' => 3])->num_rows();

        $data['pelanggan'] = $this->db->query("SELECT * FROM pelanggan JOIN user on `pelanggan`.`id_marketing` = `user`.`id`")->num_rows();

        $data['termin'] = $this->mymodel->statusTermin(1,1);

        $data['proses'] = $this->mymodel->statusTermin(1, 0);

        $data['ditolak'] = $this->mymodel->statusTermin(0, 0);

        $data['spv'] = $this->db->get_where('user',['role_id' => 2])->num_rows();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/index', $data);
        $this->load->view('templates/footer');
    }

    public function pelanggan(){
        $data['title'] = 'Data Seluruh Pelanggan';

        $query = "SELECT `s`.`name` as `supervisor_name`, `m`.`name` as `marketer_name`,
                        `pelanggan`.*
                    FROM `pelanggan`
                        JOIN `user` as `m` on `pelanggan`.`id_marketing` = `m`.`id`
                        JOIN `user` as `s` on `m`.`spv_id` = `s`.`id`
                        ORDER BY `pelanggan`.`created_at` DESC
        ";


        $data['pelanggan'] = $this->db->query($query)->result_array();

        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/pelanggan', $data);
        $this->load->view('templates/footer');
    }

    public function supervisor(){
        $data['title'] = 'Data Supervisor';

        $data['supervisors'] = $this->db->get_where('user',['role_id' => 2,'is_active' => 1])->result_array();
        
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/supervisor', $data);
        $this->load->view('templates/footer');
    }

    public function blocked_spv(){
        $data['title'] = 'Data Supervisor Terblokir';

        $data['supervisors'] = $this->db->get_where('user',['role_id' => 2,'is_active' => 0])->result_array();
        
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/supervisor', $data);
        $this->load->view('templates/footer');
    }

    public function unblock_spv(){
        $id = $this->input->get('id');
            $this->db->where('id', $id);
        if($this->db->update('user', ['is_active' => 1])){
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Berhasil membuka blokir supervisor</div>');
            redirect('admin/blocked_spv');
        }else{
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            Gagal membuka blokir supervisor!</div>');
            redirect('admin/blocked_spv');
        }
    }

    public function createSupervisor(){
        $nama = $this->input->post('nama');
        $phone = $this->input->post('no_telp');
        $email = $this->input->post('email');
        $spv = $this->input->post('spv');

        $getData = $this->db->get_where('user',['email' => $email]);

        if($getData->num_rows() == 0){

            $data = [
                'name' => $nama,
                'phone' => $phone,
                'email' => $email,
                'image' => 'default.jpg',
                'password' => password_hash($email, PASSWORD_DEFAULT),
                'role_id' => 2,
                'is_active' => 1,
                'date_created' => time()
            ];

            $this->db->set($data);
            $this->db->insert('user');

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Berhasil menambahkan supervisor baru, username : '.$email.' & password : '.$email.'</div>');
            redirect('admin/supervisor');

        }else{
            $this->session->set_flashdata('message', '<div class="alert alert-warning" role="alert">
            Email '.$email.' telah didaftarkan sebelumnya..</div>');
            redirect('admin/supervisor');
        }
    }

    public function marketer(){
        $data['title'] = 'Data Marketing';

        $query = "SELECT `u`.*, `s`.`name` as `spv_name`
                    FROM `user` as `u`
                    JOIN `user` as `s` on `u`.`spv_id` = `s`.`id`
                    WHERE `u`.`role_id` = 3
                    AND `u`.`is_active` = 1
                    ORDER BY `u`.`date_created` DESC
        ";

        $data['marketer'] = $this->db->query($query)->result_array();
        
        $data['spv'] = $this->db->get_where('user', ['role_id' => 2])->result();
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/marketer', $data);
        $this->load->view('templates/footer');
    }

    public function blocked_marketer(){
        $data['title'] = 'Data Marketing terblokir';

        $query = "SELECT `u`.*, `s`.`name` as `spv_name`
                    FROM `user` as `u`
                    JOIN `user` as `s` on `u`.`spv_id` = `s`.`id`
                    WHERE `u`.`role_id` = 3
                    AND `u`.`is_active` = 0
                    ORDER BY `u`.`date_created` DESC
        ";

        $data['marketer'] = $this->db->query($query)->result_array();
        
        $data['spv'] = $this->db->get_where('user', ['role_id' => 2])->result();
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/marketer', $data);
        $this->load->view('templates/footer');
    }

    public function createMarketer(){
        $nama = $this->input->post('nama');
        $phone = $this->input->post('no_telp');
        $email = $this->input->post('email');
        $spv = $this->input->post('spv');

        $getData = $this->db->get_where('user',['email' => $email]);

        if($getData->num_rows() == 0){

            $data = [
                'name' => $nama,
                'phone' => $phone,
                'email' => $email,
                'image' => 'default.jpg',
                'password' => password_hash($email, PASSWORD_DEFAULT),
                'role_id' => 3,
                'is_active' => 1,
                'spv_id' => $spv,
                'date_created' => time()
            ];

            $this->db->set($data);
            $this->db->insert('user');

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Berhasil menambahkan marketing baru, username : '.$email.' & password : '.$email.'</div>');
            redirect('admin/marketer');

        }else{
            $this->session->set_flashdata('message', '<div class="alert alert-warning" role="alert">
            Email '.$email.' telah didaftarkan sebelumnya..</div>');
            redirect('admin/marketer');
        }
    }

    public function pendapatan_marketing(){
        $data['title'] = 'Data Pendapatan Marketing';

        if(isset($_POST['filter'])){

            $start = $this->input->post('awal');
            $end = $this->input->post('akhir');
            $endDate = date_modify(new DateTime($end), '+1 days')->format('Y-m-d');
            $pendapatan = $this->mymodel->getFilteredPendapatanMarketing($start,$endDate)->result_array();

        }else{

            $query = "SELECT 
                    `m_u`.`name` as `marketer_name`, `s_u`.`name` as `spv_name`, `pendapatan`.*, SUM(`pendapatan`.`total_pendapatan`) as `pendapatan`
                FROM 
                    `pendapatan` 
                JOIN
                    `termin` ON `pendapatan`.`id_termin` = `termin`.`id_termin` 
                JOIN
                    `user` as `m_u` on `termin`.`id_marketing` = `m_u`.`id`
                JOIN
                    `user` as `s_u` on `termin`.`id_supervisor` = `s_u`.`id`
                WHERE
                    `termin`.`is_accept` = 1
                GROUP BY
                    `pendapatan`.`id_marketer`
            ";

            $pendapatan = $this->db->query($query)->result_array();
        }

        $data['pendapatan'] = $pendapatan;

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/pendapatan_marketing', $data);
        $this->load->view('templates/footer');
    } 

    public function detail_pendapatan($id){
        $data['title'] = 'Detail Pendapatan';

        if(isset($_POST['filter'])){
            $start = $this->input->post('awal');
            $end = $this->input->post('akhir');
            $endDate = date_modify(new DateTime($end), '+1 days')->format('Y-m-d');
            
            $pendapatan = $this->mymodel->getFilteredPendapatan($start,$endDate,$id)->result_array();

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

        $data['nama'] = $this->db->select('name')->get_where('user', ['id' => $id])->row()->name;
        $data['user'] = $this->db->get_where('user', ['email' => 
        $this->session->userdata('email')])->row_array();

        $data['pendapatan'] = $pendapatan;

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/detail_pendapatan', $data);
        $this->load->view('templates/footer');
    }

    public function laporan(){
        $data['title'] = 'Laporan Pembayaran Tim Supervisor';
        $data['user'] = $this->db->get_where('user', ['email' => 
        $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/laporan', $data);
        $this->load->view('templates/footer'); 
    }

    public function report(){

        $start = $this->input->post('awal');
        $end = $this->input->post('akhir');

        $endDate = date_modify(new DateTime($end), '+1 days')->format('Y-m-d');

        $pendapatan = $this->mymodel->getReportData($start,$endDate);
        if($pendapatan->num_rows() > 0){
            $this->load->library('PDF','pdf');
            $date = date('d F Y', strtotime(date('Y-m-d')));

            $data['result'] = $pendapatan->result_array();

            $data['now'] = $date;
            $data['between'] = [
                'start' => date('d F Y', strtotime($start)), 
                'end' => date('d F Y', strtotime($end))
            ];
            
            $this->pdf->setPaper('A4', 'landscape');
            $this->pdf->filename = "laporan-pembayaran-".$date.".pdf";
            $this->pdf->load_view('admin/view_laporan', $data);
        }else{
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            Hmm, Belum ditemukan data</div>');
            redirect('admin/laporan');
        }
    }

    public function report_harian(){
        $hari = date('Y-m-d');
        $pendapatan = $this->mymodel->getReportHarianAdminData($hari);

        if($pendapatan->num_rows() > 0){
            $this->load->library('PDF','pdf');
            $date = date('d F Y', strtotime(date('Y-m-d')));

            $data['result'] = $pendapatan->result_array();

            $data['now'] = $date;
            
            $this->pdf->setPaper('A4', 'landscape');
            $this->pdf->filename = "laporan-pembayaran-".$date.".pdf";
            $this->pdf->load_view('admin/view_laporan_harian', $data);
        }else{
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            Hmm, Belum ditemukan data</div>');
            redirect('admin/laporan');
        }
    }

    public function block_marketing(){
        $id = $this->input->get('id');

        $this->db->where('id', $id);
        if($this->db->update('user', ['is_active' => 0])){
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Berhasil memblokir marketing</div>');
            redirect('admin/marketer');
        }else{
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            Gagal memblokir marketing!</div>');
            redirect('admin/marketer');
        }
    }

    public function unblock_marketing(){
        $id = $this->input->get('id');

        $this->db->where('id', $id);
        if($this->db->update('user', ['is_active' => 1])){
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Berhasil membuka blokir marketing</div>');
            redirect('admin/blocked_marketer');
        }else{
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            Gagal membuka blokir marketing!</div>');
            redirect('admin/blocked_marketer');
        }
    }

    public function block_spv(){
        $id = $this->input->get('id');
            $this->db->where('id', $id);
        if($this->db->update('user', ['is_active' => 0])){
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Berhasil memblokir supervisor</div>');
            redirect('admin/supervisor');
        }else{
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            Gagal memblokir supervisor!</div>');
            redirect('admin/supervisor');
        }
    }

    public function dataTermin()
    {
        $data['title'] = 'Proses Semua Data Termin';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $id = $this->session->userdata('id');
        $data['termin'] = $this->mymodel->getAllTerminData(1, 0);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/datatermin', $data);
        $this->load->view('templates/footer');
    }

    public function selesai()
    {
        $data['title'] = 'Data Semua Termin selesai';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $id = $this->session->userdata('id');
        $data['termin'] = $this->mymodel->getAllTerminData(1, 1);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/selesai', $data);
        $this->load->view('templates/footer');
    }

    public function ditolak()
    {
        $data['title'] = 'Data Semua Termin ditolak';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $id = $this->session->userdata('id');

        $data['termin'] = $this->mymodel->getAllTerminData(0, 0);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/ditolak', $data);
        $this->load->view('templates/footer');
    }

    public function jenis(){
        $data['title'] = 'Jenis & harga website';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $id = $this->session->userdata('id');

        $data['jenis'] = $this->db->order_by('nama', 'asc')->get('jenis_web')->result();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/jenis', $data);
        $this->load->view('templates/footer');
    }

    public function store_jenis(){
        $jenis = $this->input->post('jenis');
        $harga = $this->input->post('harga');

        $data = ['nama' => $jenis, 'harga' => $harga];
        $ins = $this->db->insert('jenis_web', $data);
        if($ins){
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Berhasil menambah data.</div>');
            redirect('admin/jenis');
        }else{
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            Gagal menambah data!</div>');
            redirect('admin/jenis');
        }
    }

    public function delete_jenis($id){
        $this->db->where('id', $id);
        $del = $this->db->delete('jenis_web');
        if($del){
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Berhasil menghapus data.</div>');
            redirect('admin/jenis');
        }else{
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            Gagal menghapus data!</div>');
            redirect('admin/jenis');
        }
    }

    public function getDataJenis(){
        $id=$this->input->get('id');
        $data = $this->db->get_where('jenis_web', ['id' => $id])->row();
        $json = json_encode($data);
        echo($json);
    }

    public function save_jenis(){
        $jenis = $this->input->post('jenis');
        $harga = $this->input->post('harga');
        $id = $this->input->post('id');
        $data = ['nama' => $jenis, 'harga' => $harga];
        $this->db->where('id', $id);
        $ins = $this->db->update('jenis_web', $data);
        if($ins){
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Berhasil mengubah data.</div>');
            redirect('admin/jenis');
        }else{
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            Gagal mengubah data!</div>');
            redirect('admin/jenis');
        }
    }
}
