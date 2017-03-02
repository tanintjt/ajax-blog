<?php

require 'connection.php';


//user info...
$name=$_POST['customerName'];
$address=$_POST['address'];
$contact=$_POST['contactNo'];

if(isset($_POST['total'])){
    $total=$_POST['total'];
}

if(isset($_POST['rate'])){
    $rate=$_POST['rate'];
}
if(isset($_POST['itemID'])){
    $product=$_POST['itemID'];
}
if(isset($_POST['quantity'])){
    $qty = $_POST['quantity'];
}

if(isset($_POST['packages'])){
    $package=$_POST['packages'];

}

if(isset($_POST['package_qty'])){
    $package_qty = $_POST['package_qty'];

}

if(isset($_POST['total']) == ''|| isset($_POST['rate'])=='' || isset($_POST['itemID'])=='' || isset($_POST['quantity']) =='' ){

    echo '<div style="text-align: center;font-size: large;background-color: bisque;height: 100px;
    width: 500px;background-color: powderblue;margin-left: 30%;margin-top: 6%;padding-top: 5px"> 
                <p>
                    <strong>Please select any item type(Package or Product) and quantity To add. </strong>
                    <p><strong><a href="product.php"> Go Back</a></strong></p>
                </p> 
     </div>';
}else{

    //insert customer info.....
    $sql=mysqli_query($db,"INSERT INTO customerinfo (customerName,address,contactNo)
		        VALUES ('$name','$address','$contact')");

//retrieve customer ID......
    $customer= mysqli_query($db,"SELECT LAST_INSERT_ID()");
    $customer_id = mysqli_fetch_row($customer);


    $items = array();

    $size = count($product);

    for($i = 0 ; $i < $size ; $i++){

        if (empty($product[$i]) || empty($qty[$i])) {
            continue;
        }
        $items[] = array(
            "customerID" => $customer_id,
            "itemID"     => $product[$i],
            "quantity"    => $qty[$i],
            "rate"    => $rate[$i],
            "total"       => $total[$i]
        );
    }



    if (!empty($items))
    {
        $values = array();

        foreach($items as $item)
        {

            $values[] = "('{$item['customerID']['0']}','{$item['itemID']}', '{$item['quantity']}', '{$item['rate']}','{$item['total']}')";
            $value = implode(",", $values);
            $sql = "INSERT INTO order_detail (customerID,itemID,quantity,rate,total) VALUES  $value" ;

        }

        $result = mysqli_query($db, $sql);


        if ($result||$sql) {

            echo '<meta http-equiv="refresh" content="2;url=product.php">';
            echo '<p style="text-align: center;font-size: large"> <strong>Successfully Added</strong></p>';

        } else {
            echo '<p style="text-align: center;font-size: large"> <strong>Not Added .Please try again</strong></p>';
        }
    }

}


