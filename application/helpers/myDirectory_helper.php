<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

if (!function_exists('getExcelDirectory')) {
    function getExcelDirectory()
    {
        return "./complemento/Excel_Files";
    }
}

if (!function_exists('getExcelUploadDirectory')) {
    function getExcelUploadConfig($fileName = '')
    {
        return array(
            'allowed_types' => 'xls|xlsx|xlsm|slk|xlsb|xlt|ods',
            'max_size' => 10000000,
            'upload_path' => getExcelDirectory(),
            'file_name' => $fileName
        );
    }
}
