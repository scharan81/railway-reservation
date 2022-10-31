<head>
<link rel="shortcut icon" type="image/png" href="assets/img/title-logo.png">
<style>
.hover_bkgr_fricc{
    background:rgba(0,0,0,.4);
    cursor:pointer;
    display:none;
    height:100%;
    position:fixed;
    text-align:center;
    top:0;
    width:100%;
    z-index:10000;
}
.hover_bkgr_fricc .helper{
    display:inline-block;
    height:100%;
    vertical-align:middle;
}
.hover_bkgr_fricc > div {
    background-color: #fff;
    box-shadow: 10px 10px 60px #555;
    display: inline-block;
    height: auto;
    max-width: 551px;
    min-height: 100px;
    vertical-align: middle;
    width: 60%;
    position: relative;
    border-radius: 8px;
    padding: 15px 5%;
}
.popupCloseButton {
    background-color: #fff;
    border: 3px solid #999;
    border-radius: 50px;
    cursor: pointer;
    display: inline-block;
    font-family: arial;
    font-weight: bold;
    position: absolute;
    top: -20px;
    right: -20px;
    font-size: 25px;
    line-height: 30px;
    width: 30px;
    height: 30px;
    text-align: center;
}
.popupCloseButton:hover {
    background-color: #ccc;
}
.trigger_popup_fricc {
    cursor: pointer;
    font-size: 20px;
    margin: 20px;
    display: inline-block;
    font-weight: bold;
}
/* Popup box BEGIN */
</style>
<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
	<script src="https://www.google.com/jsapi"></script>
</head>
<?php
$host = "localhost";
$user = "root";
$password = "";
$db = "id16900325_ooad";
$conn=mysqli_connect($host,$user,$password,$db);


$custid=$_POST['custid'];
$email=$_POST['email'];
$item=$_POST['item'];
$quan=$_POST['quant'];
$phone=$_POST['phone1'];
$address=$_POST['address1'];
$paystat=$_POST['payment'];
$totalpay=$_POST['totalpay'];
$items = explode(",", $item);
$quans = explode(",", $quan);
if (isset($_POST['payment'])) 
{    
    $sql="INSERT INTO sales VALUES (Null,'$custid', '$email', '$phone', '$item', '$quan', '$address', '$paystat','$totalpay')";
    if(mysqli_query($conn,$sql))
    {
        for($i=0;$i<count($items);$i++){
            mysqli_query($conn,"UPDATE stock SET quantity_avai = quantity_avai-'$quans[$i]' WHERE stock.item = '$items[$i]'");
        }
        
        echo include 'checkout.html';
        echo '<div class="hover_bkgr_fricc">
            <span class="helper"></span>
            <div>
            <div class="popupCloseButton">&times;</div>
                <h4>Order Placed<br/>Keep Shopping</h4>
            </div>
            </div>
            
            <script>$(window).load(function () {    
                $(".hover_bkgr_fricc").show();
                $(".hover_bkgr_fricc").click(function(){
                    $(".hover_bkgr_fricc").hide();
                });
                $(".popupCloseButton").click(function(){
                    $(".hover_bkgr_fricc").hide();
                });
            });
            </script>
            ';
    }
    else 
    {
        echo mysqli_error($conn);
    }
}
else 
{
    print("payment not set");
}
?>
