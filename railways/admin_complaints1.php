<html>
<head>

<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>

	<script src="https://www.google.com/jsapi"></script>
</head>
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
</style>    
</html>
<?php
 $host = "localhost";
 $user = "id17109384_railways_user";
 $password ="Enterpassword@123";
 $db = "id17109384_railways";
 $conn=mysqli_connect($host,$user,$password,$db);
$p=100;
     while($p>0)
     {
         $p=$p-1;
         $b=(string)$p;
         if(!empty($_POST[$b]))
         {
             $stage=$_POST['stage'.$b];
             $tcno=$_POST['tick'.$b];
             $train=$_POST['train'.$b];
             $id=$_POST['id'.$b];
             if($res=mysqli_query($conn,"SELECT * FROM stations WHERE trainid = '$train' "))
             {
                 $row=mysqli_fetch_row($res);
                   $i=0;
                   while($i<=8)
                   {
                    
                      if($row[$i]==$stage)
                      {
                       
                        mysqli_query($conn,"UPDATE complaints SET cstatus='R' WHERE id='$id' ");
                        echo "<div id='charan'></div>";
                        echo " <script>document.getElementById('charan').innerHTML+=`<div class='hover_bkgr_fricc'><span class='helper'></span><div><div class='popupCloseButton'>&times;</div><h3 style='color:green;text-align:center;'>".$row[$i+1]." station informed successfully.<br><p><a href='admin_complaints.php'>OK</a></p></h3></div></div>`; $('.hover_bkgr_fricc').show();
                                $('.hover_bkgr_fricc').click(function(){
                                window.location.href='admin_complaints.php';
                                });
                                $('.popupCloseButton').click(function(){
                                window.location.href='admin_complaints.php';
                                });</script>";
                        break;
                      }
                      else{
                          
                          $i=$i+1;
                      }
                if($i==9 and $row[$i]==$stage)
                {
                    mysqli_query($conn,"UPDATE complaints SET cstatus='R' WHERE id='$id' ");
                        echo "<div id='charan'></div>";
                        echo " <script>document.getElementById('charan').innerHTML+=`<div class='hover_bkgr_fricc'><span class='helper'></span><div><div class='popupCloseButton'>&times;</div><h3 style='color:green;text-align:center;'>".$row[$i]." is the last station for this train. Informed successfully.<br><p><a href='admin_complaints.php'>OK</a></p></h3></div></div>`; $('.hover_bkgr_fricc').show();
                                $('.hover_bkgr_fricc').click(function(){
                                window.location.href='admin_complaints.php';
                                });
                                $('.popupCloseButton').click(function(){
                                window.location.href='admin_complaints.php';
                                });</script>";
                }
                   else
                   {
                    mysqli_query($conn,"UPDATE complaints SET cstatus='S' WHERE id='$id' ");
                    echo "<div id='charan'></div>";
                    echo " <script>document.getElementById('charan').innerHTML+=`<div class='hover_bkgr_fricc'><span class='helper'></span><div><div class='popupCloseButton'>&times;</div><h3 style='color:green;text-align:center;'>No station Found In that Route.Spam complaint..<br><p><a href='admin_complaints.php'>OK</a></p></h3></div></div>`; $('.hover_bkgr_fricc').show();
                            $('.hover_bkgr_fricc').click(function(){
                            window.location.href='admin_complaints.php';
                            });
                            $('.popupCloseButton').click(function(){
                            window.location.href='admin_complaints.php';
                            });</script>";
                   }
                }   
            }    
            break;
            }
        }
    ?>