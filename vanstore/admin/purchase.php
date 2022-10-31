<?php
$host = "localhost";
$user = "root";
$password = "";
$db = "id16900325_ooad";
$conn=mysqli_connect($host,$user,$password,$db);

$item=$_POST['items'];
$quan=$_POST['quants'];
$price=$_POST['prices'];
$item=rtrim($item,",");
$quan=rtrim($quan,",");
$price=rtrim($price,",");
$total=$_POST['total'];
$date=$_POST['date'];
$items=explode(",",$_POST['items']);
$quant=explode(",",$_POST['quants']);
$prices=explode(",",$_POST['prices']);
if(isset($_POST['submit'])){
    if(mysqli_query($conn,"INSERT INTO purchase_bills VALUES (NULL,'$date', '$item','$price', '$quan','$total')")){
        include 'purchase1.php';
        
    }
}

for($i=0;$i<sizeof($items);$i++){
    mysqli_query($conn,"UPDATE stock SET quantity_avai = quantity_avai +'$quant[$i]' WHERE stock.item = '$items[$i]'");
    
}
?>