
﻿<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">

    <title>STL Surveillance Order Processing</title>


    <meta name="viewport" content="width=device-width">
    <!--<script type="text/javascript" src="jquery.min.js"></script>-->
    <!--<script src="js/jquery-3.1.0.js"></script>

    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
    <script src="//code.jquery.com/jquery-1.10.2.js"></script>
    <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>-->

    <!--------css-------->
    <link rel="stylesheet" href="css/jquery-ui.css">

    <!---------jQuery---------->
    <script src="js/jquery-3.1.0.js"></script>
    <script src="js/jquery-1.10.2.js"></script>
    <script src="js/jquery-ui.js"></script>

    <style>
        #top, #bottom, #left, #right {
            background: #a5ebff;
        }

        #left, #right {
            position: fixed;
            top: 0;
            bottom: 0;
            width: 15px;
        }

        #left {
            left: 0;
        }

        #right {
            right: 0;
        }

        #top, #bottom {
            position: fixed;
            left: 0;
            right: 0;
            height: 15px;
        }

        #top {
            top: 0;
        }

        #bottom {
            bottom: 0;
        }

        @media /* Fairly small screens including iphones */
        only screen and (max-width: 500px),

            /* iPads */
        only screen and (min-device-width: 768px) and (max-device-width: 1024px) {
            #top, #bottom, #left, #right {
                display: none;
            }
        }
    </style>

    <!--[if lte IE 6]>
    <style>#top, #bottom, #left, #right {
        display: none;
    }
    </style>
    <![endif]-->
    <style type="text/css">
        .fieldset-auto-width {
            width: 80%;
            margin-left: 8%;
            align-content: center;
            background-color: lightblue;
        }

        label {
            display: inline-block;
            width: 200px;
            text-align: right;
        }

        ​
    </style>

    <style>
        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        td, th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 6px;
        }

        tr:nth-child(even) {
            background-color: #dddddd;
        }
    </style>
</head>

<div>
    <div>
        <h4 style="margin-left:92%"><p><strong><a href="index.php">  Log Out</a></strong></p></h4>
        <h2 style="text-align: center">STL Surveillance Order Processing</h2>

    </div>

</div>


<body>

<?Php
require "connection.php"; // Database Connection
$sql = mysqli_query($db, "SELECT * FROM package_details");
?>


<form method="post" action="order.php" id="myform">
    <fieldset class="fieldset-auto-width">
        <legend style="font-size:large">Customer Details :</legend>
        <div>
            <label for="name"> Name</label>
            <input type="text" id="name" name="customerName" size="80" value="" required/>
        </div>

        <p></p>

        <div>
            <label for="add"> Address</label>
            <input type="text" id="add" size="80" name="address" placeholder="House, Road, Block,Street" required/>
        </div>

        <p></p>

        <div>
            <label for="area"> Area</label>
            <input type="text" id="area" size="35" placeholder="Area"/>

            City <input type="text" id="city" size="35" placeholder="City, Post Code"/>
        </div>

        <p></p>

        <div>
            <label for="mob1"> Mobile 1 </label>
            <input type="text" id="mob1" name="contactNo" size="80" required/>
        </div>
        <p></p>
        <div>
            <label for="mob2"> Mobile 2</label>
            <input type="text" id="mob2" size="80"/>
        </div>
    </fieldset>


    <fieldset class="fieldset-auto-width" style="background-color:lightgoldenrodyellow">
        <legend style="font-size:large">Order Details :</legend>


        <STRONG>Select Item Type</STRONG></br> <br>
        <!------------------------   Package:start   ----------------------------------->
        <div id="Group1" name="Group1">
            <div class="div-package">
                <input name="test" id="radio1"  type="radio" style="width: 25px" />Package

                <select id="packages" name="packages" style="margin-left:10%;width:45%">
                    <option value="">Select Package</option>
                    <?php
                    $sql = mysqli_query($db, "SELECT DISTINCT packageID FROM package_detail");
                    while ($row = $sql->fetch_assoc()) {
                        echo "<option value=\"{$row['packageID']}\">".'Package'."{$row['packageID']}</option>";
                    }
                    ?>
                </select>

                &nbsp;
                <span id="p-qty">Quantity<input id="abc-quantity" type="number" value="0" style="width: 40px;margin-right:10%" min="0" placeholder="quantity" name="package_qty"/></span>
                <input type="button" class="pckBtn" id="packageButton" name="add" value="Add Package" style="font-size:10pt;color:white;
         background-color:green;border:2px solid #336600;padding:3px;<font color='red'>margin-bottom:30px</font>">
            </div>

            <!------------------------   Package:end   ----------------------------------->
            <br>
            <br>
            <br>

            <!------------------------   Item:start   ----------------------------------->
            <div class="div-product">
                <input name="Radio1" type="radio" id="radio2" value="product" style="width: 25px"/>Individual Product


                <input list="item-list" type="text"  name="item"  style="margin-left:3%;width:45%" id="item" placeholder="Search Item" class="ui-widget">

                <span id="t-qty">Quantity<input id="item-quantity" type="number" value="" style="width: 40px" min="0" name="item_qty"/></span>
                <input type="button" class="yesBtn" name="add" value="Add Item" style="font-size:10pt;color:white;margin-left:11%;
         background-color:green;border:2px solid #336600;padding:3px;<font color='red'>margin-bottom:30px</font>">

            </div>
            &nbsp;
        </div>
        <!------------------------   Item:start   ----------------------------------->
        </div>

        <br/><br/>

    </fieldset>
    <p></p>
    <div>

        <table style="width:82%;margin-left:100px" id="dataGrid">

            <thead>
            <tr>
                <th>Item</th>
                <th>Quantity</th>
                <th>Rate</th>
                <th>Line Total</th>
                <th>Action</th>
            </tr>
            </thead>

            <tbody id="myGrid">
            <tr>
                <td name="itemID"></td>
                <td name="quantity"></td>
                <td name="rate"></td>
                <td name="total"></td>
                <td></td>
            </tr>
            </tbody>
        </table>

        <div id="results"></div>

    </div>

    <fieldset class="fieldset-auto-width" style="background-color:lightsteelblue">
        <legend style="font-size:large">Payment Details :</legend>

        <div>
            <label for="bill"> Total Bill</label>
            <input type="text" size="50" id="grandTotal" name="grandTotal"/>
        </div>

        <p></p>

        <div>
            <label for="payment"> Advance Payment</label>
            <input type="text" id="payment" size="50"/>
        </div>

        <p></p>
        <div>
            <label for="due">Due</label>
            <input type="text" id="due" size="50" readonly/>
        </div>

    </fieldset>

    <div style="margin-top:2%">
        <input type="submit" value="Submit" class="form_submit" style="font-size:10pt;color:white;margin-left:42%;
         background-color:green;border:2px solid #336600;padding:3px;<font color='red'>margin-bottom:30px</font>">

        <input type="reset" value="reset" style="font-size:10pt;color:black;margin-left:2%;
         background-color:lightblue;border:2px solid #336600;padding:4px;<font color='red'>margin-bottom:30px</font>">

    </div>



</form>


<script type="text/javascript">

    $(document).ready(function () {

        var counter = 0;
        var due = 0;

        $(".yesBtn").click(function () {
            //Get Item and Quantity Value
            var itemId = $('#item').val();
            var quantity = $('#item-quantity').val();
            var grandTotal = $('#grandTotal').val();

            if(itemId == '' || quantity == ''){
                alert('Please select item and quantity to add');
            }

            //Call Ajax
            $.ajax({
                url: 'ajax.php',
                type: 'POST',
                data: 'itemId=' + itemId,
                dataType: 'json',

                success: function (data) {
                   // console.log(data[4]);
                    //Append the result into table
                    $('#myGrid').append('<tr><td><input type="hidden" name="itemID[]" value="'+data[0]+'" />'+data[1]+'</td><td><input type="text" name="quantity[]" value="'+quantity+'" readonly/></td><td><input type="text" name="rate[]" value="'+data[4]+'" readonly/></td><td><input type="text" name="total[]" id="item_total_'+counter+'" value="'+quantity*data[4]+'" readonly/></td><td><input type="hidden" value="'+quantity*data[4]+'" id="delRow"/><button onclick="deleteRow(this)">delete</button></td></tr>');

                    //Calculate Grand Total

                    var gTotal = Number(grandTotal) + Number($('#item_total_'+counter).val());
                    $('#grandTotal').val(gTotal);

                }
            });
            counter++;
        });


        /*packages............................*/

        $('#packageButton').click(function () {
            var packageId = $('#packages option:selected').val();
            var packageQty = $('#abc-quantity').val();
            var total = $('#grandTotal').val();

            $.ajax({
                url: 'ajax.php',
                type: 'POST',
                data: 'packageId=' + packageId,
                dataType: 'json',

                success: function (data) {
                    var packageTotalTextBoxPosition = 0;
                    var packageTotalSumResult = 0;

                    if (data.length > 1){

                        //Append the result into table
                        $.each(data, function(i, data){
                            //$("table.table").append("<tr><td>" + data.member_id + "</td><td>" + data.comment + "</td></tr>");
                            $('#myGrid').append('<tr><td><input type="hidden" name="itemID[]" value="'+data[0]+'" />'+data[1]+'</td><td><input type="text" name="quantity[]" value="'+packageQty+'" readonly/></td><td><input type="text" name="rate[]" value="'+data[4]+'" readonly/></td><td><input type="text" name="total[]" id="package_total_'+packageTotalTextBoxPosition+'" value="'+packageQty*data[4]+'" readonly/></td><td><input type="button" value="Delete" onclick="deleteRow(this)"/></td></tr>');
                            //Calculate Grand Total
                            var gTotal = Number(total) + Number($('#package_total_'+packageTotalTextBoxPosition).val());
                            packageTotalSumResult = packageTotalSumResult + gTotal;
                            packageTotalTextBoxPosition++;
                        });
                        $('#grandTotal').val(packageTotalSumResult);
                    }else {
                        //Append the result into table
                       $.each(data, function(i, data){
                            $('#myGrid').append('<tr><td><input type="hidden" name="itemID[]" value="'+data[0]+'" />'+data[1]+'</td><td><input type="text" name="quantity[]" value="'+packageQty+'" readonly/></td><td><input type="text" name="rate[]" value="'+data[4]+'" readonly/></td><td><input type="text" name="total[]" id="package_total_'+counter+'" value="'+packageQty*data[4]+'" readonly/></td><td><input type="button" value="Delete" onclick="deleteRow(this)"/></td></tr>');
                        });
                        //Calculate Grand Total
                       var gTotal = Number(total) + Number($('#package_total_'+counter).val());
                       $('#grandTotal').val(gTotal);
                    }
                }
            });

            counter++;
        });

        $('#payment').keyup(function () {
         due = $('#grandTotal').val() - $(this).val();
         $('#due').val(due);
        });

    });

    //checked radio button..............
    $("input[type=radio]").on("click",function(){
        $("input[type=radio]").prop("checked",false);
        $(this).prop("checked",true);
    });



    function deleteRow(btn) {
        var row = btn.parentNode.parentNode;
        row.parentNode.removeChild(row);


        var deleted_val = $('#delRow').val();
        alert(deleted_val);
        var current_total = $('#grandTotal').val();
        alert(current_total);
        var total = current_total - deleted_val;
        $('#grandTotal').val(total);
    }



</script>

<script>
    $(function() {
        $( "#item" ).autocomplete({
            source: 'autocomplete.php'
        });
    });
</script>


<div id="left"></div>
<div id="right"></div>
<div id="top"></div>
<div id="bottom"></div>


</body>

</html>
