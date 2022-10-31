<html>
<head>
    <title>Shift Your Tickets</title>
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
    body{
         background-image:url('img/Boat2.png');
         
         background-position:absolute;
         background-repeat:no-repeat;
         background-size:cover;
         border:0;
         margin:0;
    }
    input[type=text]
    {  
      height:30px;
      font-size:14pt;
      margin-top:30px;
    }
    input[type=date]
    {
      height:30px;
      font-size:14pt;
      margin-top:30px;
    }
    input[type=submit]
    {
        margin-top:30px;
        padding:5px;
    }
    input[type=submit]:hover
    {
        background-color:azure;
        padding:7px;
        cursor: pointer;
    }
ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
  overflow: hidden;
  background-color: #333;
  border:0;
  margin:0;
}

li {
  float: left;
}

li a {
  display: block;
  color: white;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
}

li a:hover:not(.active) {
  background-color: grey;
}

.active {
  background-color:#BCD4E6 ;
}
.box{
width:1000px;
height:300px;
border:3px solid white;
margin:100px 150px;
border-radius:25px;
background-color:#BCD4E6;
text-align:center;
}
</style>
<body>
<ul> 
    <li><a href="booking1.html">Home</a></li>
    <li><a href="mybooking.html">My Bookings</a><li>
    <li><a class='active' href="#">Shift Tickets</a></li>
    <li><a  href="canceltickets.php">Cancel Tickets</a></li>
    <li><a href="complaints.php">Complaints</a></li>
    <li><a href="index.html">Logout</a></li>
    <li><a href="about.html">About</a></li>
   
  </ul>
    <form action="" method="POST">
      <div class="box">
        <p style="font-size:40px">Enter your details below</p>
        <table >
            <tr>
                <td><p style="color:black;font-size:20px;margin:0 150px;">Enter Ticket Number</p></td>
                <td><input type='text' name='ticketnumber' style="margin:0 50px" required></td>
            </tr>
            <tr>
                <td><p style="color:black;font-size:20px;margin:0 150px;">Enter Date to Shift Tickets</p></td>
                <td><input type='date' name='date' style="margin:0 50px" required></td>
            </tr>
            <tr>
                <td><input type="submit" name="sub" style="margin:50 200px" value="Shift Ticket"></td>
            </tr>
        </table>
</div>

    </form><br><br><br>
</body>
</html>
<?php 
    $host = "localhost";
    $user = "id17109384_railways_user";
    $password ="Enterpassword@123";
    $db = "id17109384_railways";
    $conn=mysqli_connect($host,$user,$password,$db);
    $k=0;

    if(!empty($_POST['sub']))
    {
        if(isset($_POST['ticketnumber']) && isset($_POST['date']))
        {
            $t=$_POST['ticketnumber'];
            $d=$_POST['date'];
            
            $sql="SELECT * FROM passenger_details WHERE ticketno='$t'";
            if($res=mysqli_query($conn,$sql))
            {
              if(mysqli_num_rows($res))
              {

              $row1=mysqli_fetch_array($res);
              if($row1['cancellation']=='Y')
              {
                echo "<p style='font-size:25px;'>Tickets Already Cancelled.No shifting Possible.</p>";
                echo "<div id='charan'></div>";
              echo " <script>document.getElementById('charan').innerHTML+=`<div class='hover_bkgr_fricc'><span class='helper'></span><div><div class='popupCloseButton'>&times;</div><h3 style='color:green;text-align:center;'>Tickets Already Cancelled.No Shifting Possible. </h3></div></div>`; $('.hover_bkgr_fricc').show();
                      $('.hover_bkgr_fricc').click(function(){
                      $('.hover_bkgr_fricc').hide();
                      });
                      $('.popupCloseButton').click(function(){
                      $('.hover_bkgr_fricc').hide();
                      });</script>";
              }
              elseif($row1['jcompleted']=='Y')
              {
                echo "<p style='font-size:25px;'>Tickets Expired.</p>";
                echo "<div id='charan'></div>";
              echo " <script>document.getElementById('charan').innerHTML+=`<div class='hover_bkgr_fricc'><span class='helper'></span><div><div class='popupCloseButton'>&times;</div><h3 style='color:green;text-align:center;'>Tickets Expired.</h3></div></div>`; $('.hover_bkgr_fricc').show();
                      $('.hover_bkgr_fricc').click(function(){
                      $('.hover_bkgr_fricc').hide();
                      });
                      $('.popupCloseButton').click(function(){
                      $('.hover_bkgr_fricc').hide();
                      });</script>";
              }
          else{

              $i=$row1['trainid'];
              $pdjy=$row1['dateofjourney'];
              $sql1="SELECT * FROM trains_demo  WHERE trainid='$i' AND dateofjourney='$d'";
             if($res1=mysqli_query($conn,$sql1))
             {
               if(mysqli_num_rows(mysqli_query($conn,$sql1)))
               {
                echo "<style>td{text-align:center;} #our {border: 1px solid black; height:50px;}ul{list-style-type: none;margin: 0;padding: 0;overflow: hidden;background-color: #333;margin-top:0px;}li {float: left;}li a {display: block;color: white;text-align: center;padding: 14px 16px;text-decoration: none;}li a:hover:not(.active) {background-color: #111;}.active {background-color: #04AA6D;}</style>";
                echo "<body><form action='' method='POST'>";
                echo "<h1 style='color:white;margin-left: 150px;'>Available Trains</h1>";
                echo "<div style='margin-left:50px;'>";
                echo "<table id='our' style='align:center; background-color:white;'>";
                echo "<tr id='our'>";
                    echo "<th id='our'>Train Num</th>";
                    echo "<th id='our'>Train Name";
                    echo "<th id='our'>From</th>";
                    echo "<th id='our'>To</th>";
                    echo "<th id='our'>Date Of Journey</th>";
                    echo "<th id='our'>Available Tickets</th>";
                    echo "<th id='our'>Ticket Fare</th>";
                echo "</tr>";
                $n=1;
                while($row=mysqli_fetch_array($res1))
                {
                  $k=1;
                 echo "<tr id='our'>";
                echo "<td id='our' style='width: 100px;'><input type='hidden' name='trainid".htmlspecialchars($n)."' value=".$row["trainid"].">". $row["trainid"] . "</td>";
                echo "<td id='our' style='width: 150px;'><input type='hidden' name='tname".htmlspecialchars($n)."' value=".$row["tname"].">" . $row["tname"] . "</td>";
                echo "<td id='our' style='width: 150px;'><input type='hidden' name='fromcity".htmlspecialchars($n)."' value=".$row["fromcity"]." >" . $row["fromcity"] . "</td>";
                echo "<td id='our' style='width: 150px;'><input type='hidden' name='tocity".htmlspecialchars($n)."' value=".$row["tocity"].">" . $row["tocity"] . "</td>";
                echo "<td id='our' style='width: 150px;'><input type='hidden' name='".htmlspecialchars($n)."' value=".$row["dateofjourney"].">" . $row["dateofjourney"] . "</td>";
                echo "<td id='our' style='width: 150px;'><input type='hidden' name='nftick".htmlspecialchars($n)."' value=".$row["nooftickets"].">" . $row["nooftickets"] . "</td>";
                echo "<td id='our' style='width: 100px;'><input type='hidden' name='rate".htmlspecialchars($n)."' value=".$row["rate"].">" . $row["rate"] . "</td>";
                echo "<input type='hidden' name='pdjy' value=".$pdjy.">";
                echo "<input type='hidden' name='tdpy' value=".$i.">";
                echo "<input type='hidden' name='t' value=".$t.">";
                echo "<input type='hidden' name='d' value=".$d.">";
                echo "<td id='our' style='width: 100px;'><input type='submit' value='Book' name=".htmlspecialchars($n)."></td>";
              echo "</tr>";
              $n=$n+1;
               }
               echo "</div></table></form></body>";
             }
             else{
               echo "<p style='30px;'>No trains Available</p>";
              echo "<div id='charan'></div>";
              echo " <script>document.getElementById('charan').innerHTML+=`<div class='hover_bkgr_fricc'><span class='helper'></span><div><div class='popupCloseButton'>&times;</div><h3 style='color:green;text-align:center;'>NO Trains Available.</h3></div></div>`; $('.hover_bkgr_fricc').show();
                      $('.hover_bkgr_fricc').click(function(){
                      $('.hover_bkgr_fricc').hide();
                      });
                      $('.popupCloseButton').click(function(){
                      $('.hover_bkgr_fricc').hide();
                      });</script>";
             }
            }
            else{
              echo "sql1 error";
            }
            
        }
      }
      else{
        echo "<p style='30px;'>Enter valid ticket number</p>";
              echo "<div id='charan'></div>";
              echo " <script>document.getElementById('charan').innerHTML+=`<div class='hover_bkgr_fricc'><span class='helper'></span><div><div class='popupCloseButton'>&times;</div><h3 style='color:green;text-align:center;'>Enter Valid Ticket Number.</h3></div></div>`; $('.hover_bkgr_fricc').show();
                      $('.hover_bkgr_fricc').click(function(){
                      $('.hover_bkgr_fricc').hide();
                      });
                      $('.popupCloseButton').click(function(){
                      $('.hover_bkgr_fricc').hide();
                      });</script>";
      }
      }
        else{
          echo "sql query error";
        }
    }
    else
    {
      echo "every field required";
    }
  }

  $p=100;
  while($p>0)
    {
        $p=$p-1;
        $b=(string)$p;
        if(!empty($_POST[$b]))
        {
          $t=$_POST['t'];
          $d=$_POST['d'];
          $to=$_POST['tocity'.$b];
          $from=$_POST['fromcity'.$b];
          $pdj=$_POST['pdjy'];
          $tdpy=$_POST['tdpy'];
          $noft=$_POST['nftick'.$b];
          if((int)$noft > 0)
          {
           $sql="UPDATE passenger_details SET dateofjourney='$d',bstatus='CON' WHERE ticketno='$t'";
          }
          else{
            $noft=(int)($noft-1);
            $noft='WL'.(string)$noft;
            $sql="UPDATE passenger_details SET dateofjourney='$d',bstatus='$noft' WHERE ticketno='$t'";
          }
           echo "<style></style><body>";
           
           if(mysqli_query($conn,$sql))
           {
            $newsql="SELECT * FROM passenger_details WHERE  ticketno='$t'"; 
            if($r=mysqli_query($conn,$newsql))
            {
              $row=mysqli_fetch_array($r);
              echo "<div id='charan'></div>";
                            echo " <script>document.getElementById('charan').innerHTML+=`<div class='hover_bkgr_fricc'><span class='helper'></span><div><div class='popupCloseButton'>&times;</div><h3 style='color:green;text-align:center;'>Tickets Shifted To The Desired Date Successfully.</h3></div></div>`; $('.hover_bkgr_fricc').show();
                                    $('.hover_bkgr_fricc').click(function(){
                                    $('.hover_bkgr_fricc').hide();
                                    });
                                    $('.popupCloseButton').click(function(){
                                    $('.hover_bkgr_fricc').hide();
                                    });</script>";
              echo "<h2 style='margin-left:150px;'>Tickets Shifted To The Desired Date</h2>";
              echo "<div style='font-size:20px;background-color:white;width:450px;margin-top:0;margin-left:50px;padding-left:50px'>";
              echo "<p style='font-size:25px;color:brown;margin-left:80px;'>Your New Tickets</p>";
              echo "<p style='margin-left:100px;font-size:15px;'>Ticket No: ".$row['ticketno']."</p>";
              echo "<p style='font-size:15px;'>Passenger Name : ".$row['pname']."&emsp;&emsp;Age:".$row['page']."</p>";
              echo "<p style='font-size:15px;'>passenger Id:".$row['pid']."</p>";
              echo "<p style='font-size:15px;'>From:&emsp;".$from."&emsp;&emsp;To:&emsp;".$to."</p>";
              echo "<p style='font-size:15px;'>DateofJourney :".$row['dateofjourney']."&emsp;&emsp;Status:".$row['bstatus']."</p>";
              echo "<p style='margin-left:100px; font-size:15px;'>Happy Journey!!</p>";
              echo "<p>-------------------------------------------------------------<p>";
              echo "</div>";
              echo "</body>";
              if($r12=mysqli_query($conn,"SELECT * FROM trains_demo WHERE trainid='$tdpy' AND dateofjourney='$d'"))
              {
                $r13=mysqli_fetch_array($r12);
                $noft=(int)$r13['nooftickets'];
                $noft=$noft-1;
               mysqli_query($conn,"UPDATE trains_demo SET nooftickets='$noft' WHERE trainid='$tdpy' AND dateofjourney='$d'");
              }

           }
           

           else{
             echo "sql error in second set";
           }
          
        }
        else{
          echo "First sql error";
        }
        $res2=mysqli_query($conn,"SELECT * FROM passenger_details WHERE trainid='$tdpy' AND dateofjourney='$pdj' AND bstatus LIKE 'WL%' ");
        if(mysqli_num_rows($res2))
        {
          while($try=mysqli_fetch_array($res2))
          {
              $few=(int)substr($try['bstatus'],2,6);
              if($few==-1)
             {
                mysqli_query($conn,"UPDATE passenger_details SET bstatus='CON' WHERE trainid='$tdpy' AND dateofjourney='$pdj' AND bstatus LIKE 'WL-1' ");
              }
             else
             {
                   $s=$try['bstatus'];
                    $few=$few+1;
                    $s1='WL'.(string)$few;
                    mysqli_query($conn,"UPDATE passenger_details SET bstatus='$s1' WHERE trainid='$tdpy' AND dateofjourney='$pdj' AND bstatus='$s' ");
              }
          }
        }
        else
        {
            $newsql="SELECT * FROM trains_demo WHERE trainid='$tdpy' AND dateofjourney='$pdj' ";
            
            if($k1=mysqli_query($conn,$newsql))
            {
              if(mysqli_num_rows($k1)>0){
                $r1=mysqli_fetch_array($k1);
                $tnt=$r1['nooftickets']+1;
                mysqli_query($conn,"UPDATE trains_demo SET nooftickets='$tnt' WHERE trainid='$tdpy' AND dateofjourney='$pdj'");
            }
          }
        }



        break;
  }

}

?>
<html>
<h2 style="font-size:40px;margin-left:50px;">Terms For Shifting Your Tickets:</p>
<p style="font-size:20px">a)If a confirmed ticket has to change its date before 48 hours of the train then charges will be as follows<br>
->Rs.240+GST for AC first class.<br>
->Rs.200+GST for AC 2-tier or first class.<br>
->Rs.180+Gst for AC 3-tier, AC chair car.<br>
->Rs.120+GST for Sleeper class.<br>
->Rs.60+GST for Second sitting.<br>
b)If a confirmed ticket has to change its date inbetween 48 hours and 12 hours before the train is scheduling then charges will be 25% more than the 1st condition.<br>
c)If a confirmed ticket has to change its date after 12 hours and before the chart preparation then charges will be 50% more than the 1st condition.<br></p>
</html>