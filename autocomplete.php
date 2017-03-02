<?php
//database configuration
include("connection.php");

//get search term
$searchTerm = $_GET['term'];

//get matched data from skills table
$query = $db->query("SELECT * FROM item_list WHERE itemType LIKE '%".$searchTerm."%' ORDER BY itemType ASC");
while ($row = $query->fetch_assoc()) {
    $data[] = $row['itemType'];
}

//return json data
echo json_encode($data);
?>