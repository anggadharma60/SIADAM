<?php

function check_already_login() {
    $ci =& get_instance();
    $user_session = $ci->session->userdata('idPegawai');
    if($user_session) {
        redirect('Dashboard');
    }
}

function check_not_login() {
    $ci =& get_instance();
    $user_session = $ci->session->userdata('idPegawai');
    if(!$user_session) {
        redirect('Autentikasi');
    }
}

function check_admin() {
    $ci =& get_instance();
    $ci->load->library('fungsi');
    if($ci->fungsi->user_login()->status != 'Admin') {
        redirect('dashboard');
    }
}

?>