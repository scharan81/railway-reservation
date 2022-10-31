<?php 
    include 'mybooking1.php';
?>

<html>
    <head>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
    <script>
        $(document).ready(function(){
            var ticketcount=1;
            $("button").click(function(){
                ticketcount = ticketcount + 1;
                $("#comments").load("load-tickets.php", {
                    ticketsnewcount: ticketcount
                });
            })
        });

    </script>
    </head>

<body>

<div id="comments">
        <?php
            $sql="SELECT * FROM passenger_details LIMIT 1";
            $result=mysqli_query($conn,$sql);
            if(mysqli_num_rows($result)>0){
                while($row=mysqli_fetch_assoc($result))
                {
                    echo "<p>";
                    echo $row['pname'];
                    echo "<br>";
                    echo $row['page'];
                    echo "</p>";
                }
            }
            else{
                echo "There are no tickets";
            }
        ?>
</div>

<button>Show previous Tickets</button>
</body>
</html>