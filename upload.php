<?php

function uploadFile($inputFileName = '', $fileName = '', $file_directory = '')
{
    $handle = new \Verot\Upload\Upload($_FILES[$inputFileName]);
    $ex = explode('.', $_FILES[$inputFileName]['name']);
    $ext = $ex[count($ex) - 1];
    if ($handle->uploaded) {
        $handle->file_new_name_body = rand(1, 100) . date("dmyhis");
        $handle->file_new_name_ext = $ext;
        $handle->file_force_extension = false;
        $handle->file_overwrite = true;
        $handle->file_safe_name = true;
        $handle->jpeg_quality = 50;
        $handle->process($file_directory . 'assets/geojson/' . $fileName . '/');
        if ($handle->processed) {
            return $handle->file_dst_name;
        } else {
            echo 'error : ' . $handle->error;
            return false;
        }
    }
}