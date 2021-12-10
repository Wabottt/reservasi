<?php

function cek_sudah_login(){
    $ci =& get_instance();
    $user_session = $ci->session->userdata('id_karyawan');
    if($user_session){
        redirect('home');
    }
}

function cek_belum_login(){
    $ci =& get_instance();
    $user_session = $ci->session->userdata('id_karyawan');
    if(!$user_session){
        redirect('auth');
    }
}