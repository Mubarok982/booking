<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . 'libraries/qrcode/qrlib.php';

class Ciqrcode {

    public function generate($params = []) {
        if (isset($params['data'])) {
            $data = $params['data'];
        } else {
            return false;
        }

        $level = $params['level'] ?? 'L';
        $size = $params['size'] ?? 4;
        $savename = $params['savename'] ?? false;

        if ($savename) {
            return QRcode::png($data, $savename, $level, $size);
        } else {
            return QRcode::png($data, null, $level, $size);
        }
    }
}
