<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

function log_activity($status) {
    $CI =& get_instance();
    $CI->load->model('Log_model');

    $data = [
        'idUser'     => $CI->session->userdata('id'),
        'status'     => $status,
        'ipAddress'  => $_SERVER['REMOTE_ADDR'],
        'device'     => $CI->input->user_agent(),
        'terdaftar'  => date('Y-m-d H:i:s')
    ];

    $CI->Log_model->insert($data);
}
