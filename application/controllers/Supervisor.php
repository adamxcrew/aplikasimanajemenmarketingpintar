<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Supervisor extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('my_model', 'mymodel');

        $role = $this->session->userdata('role_id');
        if($role == 1){
            redirect('admin');
        }elseif($role == 3){
            redirect('marketing');
        }
    }

    public function index()
    {
        $data['title'] = 'Halaman Supervisor';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $id = $this->session->userdata('id');

        //========GET PELANGGAN===
            $this->db->select('id');
            $getIdMarketing = $this->db->get_where('user',['role_id' => 3, 'spv_id' => $this->session->userdata('id')])->result_array();

            $rows = [];
            foreach($getIdMarketing as $row)
            {
                $rows[] = $row['id'];
            }

            if(!empty($rows)){
                $this->db->where_in('id_marketing', $rows);
                $pelanggan = $this->db->get('pelanggan')->num_rows();
            }else{
                $pelanggan = 0;
            }
        //========================


        $data['amount'] = $this->mymodel->getPendapatanBulanIniSpv($id)->row()->amount;
        $data['marketer'] = $this->db->get_where('user',['role_id' => 3, 'spv_id' => $this->session->userdata('id')])->num_rows();
        $data['pelanggan'] = $pelanggan;
        $data['termin'] = $this->mymodel->terminSelesaiSpv($id);


        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar-supervisor', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('supervisor/index', $data);
        $this->load->view('templates/footer');
    }

    public function pelanggan(){
        $data['title'] = 'Data Pelanggan';

        $this->db->select('id');
        $getIdMarketing = $this->db->get_where('user',['role_id' => 3, 'spv_id' => $this->session->userdata('id')])->result_array();

        $rows = [];
        foreach($getIdMarketing as $row)
        {
            $rows[] = $row['id'];
        }

        if(!empty($rows)){
            $this->db->where_in('id_marketing', $rows);
            $pelanggan = $this->db->get('pelanggan')->result_array();
        }else{
            $pelanggan = null;
        }

        $data['pelanggan'] = $pelanggan;

        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar-supervisor', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('pelanggan/index', $data);
        $this->load->view('templates/footer');
    }

    public function dataMasuk()
    {
        $data['title'] = 'Konfirmasi Data Masuk';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $id = $this->session->userdata('id');
        $data['termin'] = $this->mymodel->getAcceptableTerminData(2,0,$id);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar-supervisor', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('supervisor/datamasuk', $data);
        $this->load->view('templates/footer');
    }

    public function dataTermin()
    {
        $data['title'] = 'Data Termin';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $id = $this->session->userdata('id');
        $data['termin'] = $this->mymodel->getAcceptableTerminData(1,0,$id);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar-supervisor', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('supervisor/datatermin', $data);
        $this->load->view('templates/footer');
    }

    public function acceptTermin(){
        $id = $this->input->get('id');

        $data = [
            'is_accept' => 1,
            'id_supervisor' => $this->session->userdata('id')
        ];

        $this->db->set($data);
        $this->db->where('id_termin', $id);
        $update = $this->db->update('termin');

        if($update){
            redirect('supervisor/datamasuk');
        }else{
            echo "Hmm, something went wrong, please try again!";
        }
    }

    public function declineTermin(){
        $id = $this->input->get('id');

        $data = [
            'is_accept' => 0,
            'id_supervisor' => $this->session->userdata('id')
        ];

        $this->db->set($data);
        $this->db->where('id_termin', $id);
        $update = $this->db->update('termin');

        if($update){
            redirect('supervisor/datamasuk');
        }else{
            echo "Hmm, something went wrong, please try again!";
        }
    }

    public function uploadBuktiTermin(){
        $termin = $this->input->get('termin');
        $data['title'] = 'Upload Bukti Termin ' .$termin;
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['termin'] = $termin;
        $data['terminId'] = $this->input->get('code');

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar-supervisor', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('supervisor/upload_bukti', $data);
        $this->load->view('templates/footer');
    }

    public function do_uploadBuktiTermin(){
        $bukti = $this->_uploadImage();
        $termin = $this->input->post('termin');
        $id = $this->input->post('id_termin');
        $date = date('Y-m-d H:i:s');

        $storedTerminName = 'bukti_termin'.$termin;
        $storedCreatedTerminName = 'termin'.$termin.'_created'; 

        $dataTermin = [
            ''.$storedTerminName.'' => $bukti,
            ''.$storedCreatedTerminName.'' => $date
        ];

        $pendapatanData = $this->db->get_where('pendapatan', ['id_termin' => $id])->row_array();
        $terminData = $this->db->get_where('termin', ['id_termin' => $id])->row_array();

        $pendapatanTerminNumber = 'pendapatan_termin'.$termin;

        $amountTerminNumber = 'termin'.$termin;
        $marketerAmount = $terminData[''.$amountTerminNumber.''] * 0.1;

        //get total pendapatan for marketer;
        $amountPendapatanTermin1 = $pendapatanData['pendapatan_termin1'];
        $amountPendapatanTermin2 = $pendapatanData['pendapatan_termin2'];
        $amountPendapatanTermin3 = $pendapatanData['pendapatan_termin3'];

        $total = $amountPendapatanTermin1 + $amountPendapatanTermin2 + $amountPendapatanTermin3 + $marketerAmount;

        //pendapatan data for updating table
        $dataPendapatan = [
            ''.$pendapatanTerminNumber.'' => $marketerAmount,
            'total_pendapatan' => $total
        ];

        //begin transaction
        try {
            $this->db->trans_start();
            
                $this->db->where('id_termin',$id);
                $this->db->set($dataTermin);
                $this->db->update('termin');

                $this->db->where('id_pendapatan', $pendapatanData
                    ['id_pendapatan']);
                $this->db->set($dataPendapatan);
                $this->db->update('pendapatan');

            $this->db->trans_complete();

            $this->session->set_flashdata('massage', 'Berhasil upload bukti untuk termin '.$termin);
            redirect('supervisor/datatermin');

        } catch (Exception $e) {
            $this->db->trans_rollback();
            $this->session->set_flashdata('massage', 'Gagal upload bukti untuk termin '.$termin);
            redirect('supervisor/datatermin');
        }
    }

    private function _uploadImage()
    {
        $path = './upload/bukti_termin/';
        $time = strtotime(date('Y-m-d H:i:s'));
        $strname = 'bukti_termin_' . $time . '_' . rand(10000,99999);
        

        $config['upload_path']          = $path;
        $config['allowed_types']        = 'jpg|png|jpeg';
        $config['file_name']            = $strname;
        $config['overwrite']            = true;
        $config['max_size']             = 2048; // 1MB

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('image')) {
            return $this->upload->data("file_name");
        }
        
        return "default.jpg";
    }

    public function markdone(){
        $id = $this->input->get('id');

        $this->db->set(['is_done' => 1]);
        $this->db->where('id_termin', $id);
        if($this->db->update('termin')){
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Sukses mengganti status</div>');
            redirect('supervisor/datatermin');
        }else{
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            Gagal mengganti status!</div>');
            redirect('supervisor/datatermin');
        }      
    }

    public function laporan(){
        $data['title'] = 'Laporan Pembayaran';
        $data['user'] = $this->db->get_where('user', ['email' => 
        $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar-supervisor', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('supervisor/s_laporan', $data);
        $this->load->view('templates/footer'); 
    }

    public function remove_cache(){
        $this->db->cache_delete_all();
    }

    public function report(){

        $start = $this->input->post('awal');
        $end = $this->input->post('akhir');
        $id = $this->session->userdata('id');

        $endDate = date_modify(new DateTime($end), '+1 days')->format('Y-m-d');

        $pendapatan = $this->mymodel->getReportDataSpv($start,$endDate,$id);
        $data['result'] = $pendapatan->result_array();
        if($pendapatan->num_rows() > 0){
            $this->load->library('PDF','pdf');
            $date = date('d F Y', strtotime(date('Y-m-d')));
            

            $data['now'] = $date;
            $data['between'] = [
                'start' => date('d F Y', strtotime($start)), 
                'end' => date('d F Y', strtotime($end))
            ];
            
            $this->pdf->setPaper('A4', 'landscape');
            $this->pdf->filename = "laporan-pembayaran-".$date.".pdf";
            $this->pdf->load_view('supervisor/view_laporan', $data);
        }else{
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            Hmm, Belum ditemukan data</div>');
            redirect('supervisor/laporan');
        }
    }

    public function report_harian(){

        $hari = date('Y-m-d');
        $id = $this->session->userdata('id');

        $pendapatan = $this->mymodel->getReportHarianDataSpv($hari,$id);
        if($pendapatan->num_rows() > 0){
            $this->load->library('PDF','pdf');
            $date = date('d F Y', strtotime(date('Y-m-d')));

            $data['result'] = $pendapatan->result_array();

            $data['now'] = $date;
            
            $this->pdf->setPaper('A4', 'landscape');
            $this->pdf->filename = "laporan-pembayaran-harian-spv-".$date.".pdf";
            $this->pdf->load_view('supervisor/view_laporan_harian', $data);
        }else{
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            Hmm, Belum ditemukan data</div>');
            redirect('supervisor/laporan');
        }
    }

    public function marketer(){
        $data['title'] = 'Data Marketing';
        $data['marketer'] = $this->db->get_where('user',['role_id' => 3, 'spv_id' => $this->session->userdata('id'), 'is_active' => 1])->result_array();

        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar-supervisor', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('supervisor/marketer', $data);
        $this->load->view('templates/footer');
    }

    public function blocked_marketer(){
        $data['title'] = 'Data Marketing terbokir';
        $data['marketer'] = $this->db->get_where('user',['role_id' => 3, 'spv_id' => $this->session->userdata('id'), 'is_active' => 0])->result_array();

        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar-supervisor', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('supervisor/marketer', $data);
        $this->load->view('templates/footer');
    }

    public function block_marketing(){
        $id = $this->input->get('id');

        $this->db->where('id', $id);
        if($this->db->update('user', ['is_active' => 0])){
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Berhasil memblokir marketing</div>');
            redirect('supervisor/marketer');
        }else{
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            Gagal memblokir marketing!</div>');
            redirect('supervisor/marketer');
        }
    }

    public function unblock_marketing(){
        $id = $this->input->get('id');

        $this->db->where('id', $id);
        if($this->db->update('user', ['is_active' => 1])){
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Berhasil membuka blokir marketing</div>');
            redirect('supervisor/blocked_marketer');
        }else{
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            Gagal membuka blokir marketing!</div>');
            redirect('supervisor/blocked_marketer');
        }
    }

    public function pendapatan_marketing(){
        $data['title'] = 'Data Pendapatan Marketing';
        $id = $this->session->userdata('id');

        if(isset($_POST['filter'])){

            $start = $this->input->post('awal');
            $end = $this->input->post('akhir');
            $endDate = date_modify(new DateTime($end), '+1 days')->format('Y-m-d');
            $pendapatan = $this->mymodel->getFilteredPendapatanMarketing($start,$endDate)->result_array();

        }else{

            $query = "SELECT 
                    `user`.`name` as `marketer_name`, `pendapatan`.*, SUM(`pendapatan`.`total_pendapatan`) as `pendapatan`
                FROM 
                    `pendapatan` 
                JOIN
                    `termin` ON `pendapatan`.`id_termin` = `termin`.`id_termin` 
                JOIN
                    `user` on `termin`.`id_marketing` = `user`.`id`
                WHERE
                    `termin`.`is_accept` = 1
                    AND `termin`.`id_supervisor` = $id
                GROUP BY
                    `pendapatan`.`id_marketer`
            ";

            $pendapatan = $this->db->query($query)->result_array();
        }

        $data['pendapatan'] = $pendapatan;

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar-supervisor', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('supervisor/pendapatan_marketing', $data);
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
        $this->load->view('templates/sidebar-supervisor', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('supervisor/detail_pendapatan', $data);
        $this->load->view('templates/footer');
    }

    public function createMarketer(){
        $this->load->library('form_validation');
        $this->form_validation->set_rules('nama', 'Nama', 'trim|required');
        $this->form_validation->set_rules('no_telp', 'Nomor Telepon', 'trim|required');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');

        if(!$this->form_validation->run()){
            $this->session->set_flashdata('message', '<div class="alert alert-warning" role="alert">
            Silahkan masukan data yang lengkap!</div>');
            redirect('supervisor/marketer');
        }

        $nama = $this->input->post('nama');
        $phone = $this->input->post('no_telp');
        $email = $this->input->post('email');
        $spv = $this->session->userdata('id');

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
            Berhasil menambahkan marketing baru, Email : '.$email.' & Kata Sandi : '.$email.'</div>');
            redirect('supervisor/marketer');

        }else{
            $this->session->set_flashdata('message', '<div class="alert alert-warning" role="alert">
            Email '.$email.' telah didaftarkan sebelumnya..</div>');
            redirect('supervisor/marketer');
        }
    }

    public function selesai()
    {
        $data['title'] = 'Termin selesai';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $id = $this->session->userdata('id');
        $data['termin'] = $this->mymodel->getAcceptableTerminData(1,1,$id);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar-supervisor', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('supervisor/selesai', $data);
        $this->load->view('templates/footer');
    }

    public function ditolak()
    {
        $data['title'] = 'Termin ditolak';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $id = $this->session->userdata('id');

        $data['termin'] = $this->mymodel->getAcceptableTerminData(0,0,$id);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar-supervisor', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('supervisor/ditolak', $data);
        $this->load->view('templates/footer');
    }

    public function reset_password_marketing(){
        $id = $this->input->get('id');
        $email = $this->input->get('email');

        $password = password_hash($email, PASSWORD_DEFAULT);

        $this->db->set(['password' => $password]);
        $this->db->where('id',$id);

        if($this->db->update('user')){
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Reset password berhasil.</div>');
            redirect('supervisor/marketer');
        }else{
            $this->session->set_flashdata('message', '<div class="alert alert-warning" role="alert">
            something went wrong, please try again later!</div>');
            redirect('supervisor/marketer');
        }

    }
}

