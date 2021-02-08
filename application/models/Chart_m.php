<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Chart_m extends CI_Model
{

    function get_total($table, $param = [])
    {
        if ($param) $this->db->where($param);
        return $this->db->select('count(0) as total')
            ->from($table)
            ->get()
            ->row('total');
    }

    // function user($param = [])
    // {
    //     if ($param) $this->db->where($param);
    //     for ($i = 1; $i <= 12; $i++) {
    //         $res = $this->db->select("count(0) as jumlah")
    //             ->from('user_crud')
    //             ->where('YEAR(date_created)', date('Y')) //TAHUN SEKARANG
    //             ->group_by('MONTH(date_created)')
    //             ->order_by('MONTH(date_created)', 'desc')
    //             ->get()
    //             ->row_array();
    //         if ($res == null) {
    //             $res == 0;
    //         }
    //         krsort($res);
    //         return $res;
    //     }
    // }

    function user($param = [])
    {
        if ($param) $this->db->where($param);
        $res = $this->db->select("MONTH(date_created) as bulan, count(0) as jumlah")
            ->from('user_crud')
            ->where('YEAR(date_created)', date('Y')) //TAHUN SEKARANG
            ->group_by('MONTH(date_created)')
            ->order_by('MONTH(date_created)', 'desc')
            ->get()
            ->result_array();
        krsort($res);
        return $res;
    }

    function layanan_intervensi($param = [])
    {
        if ($param) $this->db->where($param);
        $res = $this->db->select("MONTH(tanggal_intervensi) as bulan, count(0) as jumlah")
            ->from('intervensi')
            ->where('status', 1)
            ->where('YEAR(tanggal_intervensi)', date('Y'))
            ->group_by('MONTH(tanggal_intervensi)')
            ->order_by('MONTH(tanggal_intervensi)', 'desc')
            ->get()
            ->result_array();
        krsort($res);
        return $res;
    }

    function siswa_konseling($param = [])
    {
        if ($param) $this->db->where($param);
        $res = $this->db->select("MONTH(created_time) as bulan, count(0) as jumlah")
            ->from('siswa_konseling')
            ->where('YEAR(created_time)', date('Y')) //TAHUN SEKARANG
            ->group_by('MONTH(created_time)')
            ->order_by('MONTH(created_time)', 'desc')
            ->get()
            ->result_array();
        krsort($res);
        return $res;
    }
}
/* End of file model_dashboard.php */
/* Location: ./application/models/model_dashboard.php */