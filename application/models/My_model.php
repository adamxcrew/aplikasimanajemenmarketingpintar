<?php
defined('BASEPATH') or exit('No direct script access allowed');

class My_Model extends CI_Model{

    public function getAllTerminData($accept, $done = 0)
    {
        $query = "SELECT 
                `pelanggan`.`nama` as `pelanggan_name`, `user`.`name` as `marketer_name`, `termin`.* 
            FROM 
                `termin` 
            JOIN
                `pelanggan` ON `termin`.`id_pelanggan` = `pelanggan`.`id_pelanggan` 
            JOIN
                `user` on `termin`.`id_marketing` = `user`.`id`
            WHERE
                `termin`.`is_accept` = $accept AND `termin`.`is_done` = $done
        ";

        return $this->db->query($query)->result_array();
    }

    public function getAcceptableTerminData($accept, $done = 0, $id = null){
        $query = "SELECT 
                `pelanggan`.`nama` as `pelanggan_name`, `user`.`name` as `marketer_name`, `termin`.* 
            FROM 
                `termin` 
            JOIN
                `pelanggan` ON `termin`.`id_pelanggan` = `pelanggan`.`id_pelanggan` 
            JOIN
                `user` on `termin`.`id_marketing` = `user`.`id`
            WHERE
                `termin`.`is_accept` = $accept AND `termin`.`is_done` = $done
                AND `termin`.`id_supervisor` = $id
        ";

        return $this->db->query($query)->result_array();
    }

    public function getFilteredPendapatan($start, $end,$id){
        $query = "SELECT 
                    `pelanggan`.`nama` as `pelanggan_name`, `user`.`name` as `marketer_name`, `pendapatan`.*, `termin`.`website`, `termin`.`harga`
                FROM 
                    `pendapatan` 
                JOIN
                    `termin` ON `pendapatan`.`id_termin` = `termin`.`id_termin` 
                JOIN
                    `user` on `termin`.`id_marketing` = `user`.`id`
                JOIN
                    `pelanggan` on `termin`.`id_pelanggan` = `pelanggan`.`id_pelanggan`
                WHERE
                    `pendapatan`.`id_marketer` = $id AND `termin`.`is_accept` = 1
                    AND `pendapatan`.`created_at` BETWEEN '$start' AND '$end'
            ";

            return $this->db->query($query);
    }

    public function getPendapatanHarianMarketing($hari,$id){
        $query = "SELECT 
                    `pelanggan`.`nama` as `pelanggan_name`, `user`.`name` as `marketer_name`, `pendapatan`.*, `termin`.`website`, `termin`.`harga`
                FROM 
                    `pendapatan` 
                JOIN
                    `termin` ON `pendapatan`.`id_termin` = `termin`.`id_termin` 
                JOIN
                    `user` on `termin`.`id_marketing` = `user`.`id`
                JOIN
                    `pelanggan` on `termin`.`id_pelanggan` = `pelanggan`.`id_pelanggan`
                WHERE
                    `pendapatan`.`id_marketer` = $id AND `termin`.`is_accept` = 1
                    AND `pendapatan`.`created_at` LIKE '$hari%'
            ";

            return $this->db->query($query);
    }

    public function getFilteredPendapatanMarketing($start, $end){
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
                    AND `pendapatan`.`created_at` BETWEEN '$start' AND '$end'
            ";

            return $this->db->query($query);
    }

    public function getReportData($start, $end){
        $query = "SELECT 
                    `m_u`.`name` as `marketer_name`,`s_u`.`name` as `spv_name`, `pelanggan`.`nama` as `pelanggan_name`, `termin`.*
                FROM 
                    `termin` 
                JOIN
                    `pelanggan` on `termin`.`id_pelanggan` = `pelanggan`.`id_pelanggan`
                JOIN
                    `user` as `m_u` on `termin`.`id_marketing` = `m_u`.`id`
                JOIN
                    `user` as `s_u` on `termin`.`id_supervisor` = `s_u`.`id`
                WHERE
                    `termin`.`created_at` >= '$start' AND `termin`.`created_at` <= '$end'
                    AND`termin`.`is_accept` = 1
            ";

            return $this->db->query($query);
    }

    public function getReportHarianAdminData($hari){
        $query = "SELECT 
                    `m_u`.`name` as `marketer_name`, `s_u`.`name` as `spv_name`, `pelanggan`.`nama` as `pelanggan_name`, `termin`.*
                FROM 
                    `termin` 
                JOIN
                    `pelanggan` on `termin`.`id_pelanggan` = `pelanggan`.`id_pelanggan`
                JOIN
                    `user` as `m_u` on `termin`.`id_marketing` = `m_u`.`id`
                JOIN
                    `user` as `s_u` on `termin`.`id_supervisor` = `s_u`.`id`
                WHERE
                    `termin`.`is_accept` = 1
                    AND `termin`.`created_at` LIKE '$hari%'
            ";

            return $this->db->query($query);
    }

    public function getReportDataSpv($start, $end, $id){
        $query = "SELECT 
                    `m_u`.`name` as `marketer_name`, `pelanggan`.`nama` as `pelanggan_name`, `termin`.*
                FROM 
                    `termin` 
                JOIN
                    `pelanggan` on `termin`.`id_pelanggan` = `pelanggan`.`id_pelanggan`
                JOIN
                    `user` as `m_u` on `termin`.`id_marketing` = `m_u`.`id`
                WHERE
                    `termin`.`is_accept` = 1
                    AND `termin`.`created_at` BETWEEN '$start' AND '$end'
                    AND `termin`.`id_supervisor` = $id
            ";

            return $this->db->query($query);
    }

    public function getReportHarianDataSpv($hari, $id){
        $query = "SELECT 
                    `m_u`.`name` as `marketer_name`, `pelanggan`.`nama` as `pelanggan_name`, `termin`.*
                FROM 
                    `termin` 
                JOIN
                    `pelanggan` on `termin`.`id_pelanggan` = `pelanggan`.`id_pelanggan`
                JOIN
                    `user` as `m_u` on `termin`.`id_marketing` = `m_u`.`id`
                WHERE
                    `termin`.`is_accept` = 1
                    AND `termin`.`created_at` LIKE '$hari%'
                    AND `id_supervisor` = $id
            ";

            return $this->db->query($query);
    }

    public function getPendapatanBulanIni(){
        $now = date('Y-m-d');
        $firstDay = date("Y-m-01", strtotime($now));
        $lastDay = date("Y-m-t", strtotime($now)); 
        
        $query = "SELECT SUM(harga) as amount
                    FROM `termin`
                    WHERE `is_accept` = 1 AND `is_done` = 1
                    AND created_at BETWEEN '$firstDay' AND '$lastDay'
        ";
        return $this->db->query($query);
    }

    public function getPendapatanBulanIniSpv($id){
        $now = date('Y-m-d');
        $firstDay = date("Y-m-01", strtotime($now));
        $lastDay = date("Y-m-t", strtotime($now)); 
        
        $query = "SELECT SUM(harga) as amount
                    FROM `termin`
                    WHERE `is_accept` = 1 AND `is_done` = 1
                    AND created_at BETWEEN '$firstDay' AND '$lastDay'
                    AND `id_supervisor` = $id
        ";
        return $this->db->query($query);
    }

    public function statusTermin($accept, $status){
        $now = date('Y-m-d');
        
        $query = "SELECT `harga`
                    FROM `termin`
                    WHERE `is_accept` = $accept AND `is_done` = $status
        ";
        return $this->db->query($query)->num_rows();
    }

    public function terminSelesaiSpv($id){
        $now = date('Y-m-d');
        
        $query = "SELECT `harga`
                    FROM `termin`
                    WHERE `is_accept` = 1 AND `is_done` = 1
                    AND `id_supervisor` = $id
        ";
        return $this->db->query($query)->num_rows();
    }

}