<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include_once '../db.php';
include_once 'operations.php';

$database = new Database();
$db = $database->getConnection();

$items = new testclass($db);

$stmt = $items->gettest();
$itemCount = $stmt->rowCount();

if($itemCount > 0){

    $POArr = array();
    $POArr["body"] = array();
    $POArr["itemCount"] = $itemCount;

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        extract($row);
        $e = array(
            "id" => $id,
            "GRnum" => $GRnum, 
            "vendor" => $vendor,
            "date" => $date, 
            "no_of_item" => $no_of_item, 
            
            "note1" => $note1, 
            "note2" => $note2, 
            // "vendor" => $vendor, 
            //   "uom" => $uom, 
           
       
        );

        array_push($POArr["body"], $e);
    }
    echo json_encode($POArr);
}

else{
    http_response_code(404);
    echo json_encode(
        array("message" => "No record found.")
    );
}
?>