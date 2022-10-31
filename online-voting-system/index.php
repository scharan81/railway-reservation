<html>
    <head>
        <title>Online voting system - Home</title>
        <link rel="stylesheet" href="css/stylesheet.css">
    </head>
    <style>
        img{
            margin-left:7px;
        } 
    </style>
    <body>
        
            <center>
            <div id="headerSection">
            <h1>Online Voting System</h1>  
            </div>
            <hr>

            <div id="loginSection">
                <h2 aign='center'><b>Welcome to  the Voting Process</b></h2>
                <h2>Vote Your favourite group and let them win<br><br>
                <h2><b>Groups available are Shown below</b></h2><br>
                
            </div>
            <?php 
            $connect = mysqli_connect("localhost", "root", "", "online-voting-system");
            $getGroups = mysqli_query($connect, "select name, photo, votes, id from user1 where role=2 ");
            $groups = mysqli_fetch_all($getGroups, MYSQLI_ASSOC);
        
            for($i=0; $i<count($groups); $i++){
            ?>
            <img src="uploads/<?php echo $groups[$i]['photo']?>" height="200" width="200">
            
            <?php } ?><br><br>
            <div id="loginSection">
            <h2><b>Already User? </b><a href="routes/login.php"><b>Login here</b></a></h2><br>
            <h2><b>New User? </b><a href="routes/register.php"><b>Register here<b></a></h2>
            </div>
            </center>
    </body>
</html>