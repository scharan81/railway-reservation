<html>
    <head>
        <title>Online voting system - Logout</title>
        <link rel="stylesheet" href="../css/stylesheet.css">
    </head>
    <style>
    button{
        float: center;
        padding: 15px;
        font-size: 15px;
        background-color: #3498db;
        color: white;
        border-radius: 5px;
        cursor: pointer;
    }
    </style>
    <body>
        <center>
            <div id="headerSection">
            <form action="../routes/exit.php" method="POST" enctype="multipart/form-data">
            <h4>Do you really want to logout?</h4>
            <a href="../"><button id="loginbtn" style= "cursor:pointer" type="submit" name="yes-button"> YES </button></a>
            <a href="dashboard.php"><button id="loginbtn" style= "cursor:pointer" type="submit" name="no-button"> NO </button></a>
        </center>
    </body>
</html>