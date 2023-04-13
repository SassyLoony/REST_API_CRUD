<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include_once '../db.php';
include_once 'operations.php';

$database = new Database();
$db = $database->getConnection();

$item = new testclass($db);

$data = json_decode(file_get_contents("php://input"));

$item->GRnum = $data->GRnum;
$item->matcode = $data->matcode;
$item->matdesc = $data->matdesc;
$item->quantity = $data->quantity;
$item->scan_date = $data->scan_date;
$item->scan_time = $data->scan_time;
$item->serial_num = $data->serial_num;
$item->uom = $data->uom;




if($item->createtest()){
    echo 'Created';
} else{
    echo 'Not Created';
}
?>