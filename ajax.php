<?php

require 'connection.php';

if (isset($_POST['itemId'])) {
    //echo $_POST['itemId'];exit;
    $sql = "SELECT * FROM item_list WHERE itemType LIKE '" . $_POST['itemId'] . "%'";


    //"SELECT * FROM item_list WHERE skill LIKE '%".$searchTerm."%' ORDER BY skill ASC"

    $result = mysqli_query($db, $sql);
    $array = mysqli_fetch_row($result);
    echo json_encode($array);
}

if (isset($_POST['packageId'])) {

    /*$package_sql = "SELECT * FROM item_list INNER JOIN package_detail
                      ON item_list.itemID = package_detail.itemID
                      WHERE package_detail.ID=" . $_POST['packageId'];
    $result = mysqli_query($db, $package_sql);
    $array = mysqli_fetch_row($result);
    echo json_encode($array);*/

//echo ($_POST['packageId']);exit;



    $package_sql = "SELECT 	* FROM 	item_list JOIN	package_detail ON item_list.itemID = package_detail.itemID 
                    WHERE package_detail.packageID=" . $_POST['packageId'];

    $result = mysqli_query($db,$package_sql);

    $rows = array();
    while($row = mysqli_fetch_array($result))
    {

        $rows[] = $row;

    }
    echo  json_encode($rows);


    //print_r($result);exit;
    //echo json_encode($array);
}


