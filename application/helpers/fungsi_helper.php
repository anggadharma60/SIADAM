<?php

function check_already_login() {
    $ci =& get_instance();
    $user_session = $ci->session->userdata('idPegawai');
    if($user_session) {
        redirect('Admin');
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
        redirect('Admin');
    }
}

function check_daman() {
    $ci =& get_instance();
    $ci->load->library('fungsi');
    if($ci->fungsi->user_login()->status != 'Daman') {
        redirect($ci->fungsi->user_login()->status);
    }
}

function check_hddaman() {
    $ci =& get_instance();
    $ci->load->library('fungsi');
    if($ci->fungsi->user_login()->status != 'HD Daman') {
        redirect('HDDaman');
    }
}

function check_ondesk() {
    $ci =& get_instance();
    $ci->load->library('fungsi');
    if($ci->fungsi->user_login()->status != 'Ondesk') {
        redirect('Ondesk');
    }
}

function check_onsite() {
    $ci =& get_instance();
    $ci->load->library('fungsi');
    if($ci->fungsi->user_login()->status != 'Onsite') {
        redirect('Onsite');
    }
}

function check_dava() {
    $ci =& get_instance();
    $ci->load->library('fungsi');
    if($ci->fungsi->user_login()->status != 'Dava') {
        redirect('Dava');
    }
}

function check_sdi() {
    $ci =& get_instance();
    $ci->load->library('fungsi');
    if($ci->fungsi->user_login()->status != 'SDI') {
        redirect('SDI');
    }
}

?>
