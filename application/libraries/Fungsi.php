<?php

Class Fungsi {
    
    protected $ci;

    public function __construct() {
        $this->ci =& get_instance();
    }

    function user_login() {
        $this->ci->load->model('pegawai_model');
        $idPegawai = $this->ci->session->userdata('idPegawai');
        $user_data = $this->ci->pegawai_model->getDataPegawai($idPegawai)->row();
        return $user_data;
    }
}
