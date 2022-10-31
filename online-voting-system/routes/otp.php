<html>
    <head>
        <title>Online voting system - Login</title>
        <link rel="stylesheet" href="../css/stylesheet.css">
    </head>
    <body>
        <center>
            <div id="headerSection">
            <h1>Online Voting System</h1>
            </div>
            <hr>
            <h2>Enter OTP here</h2>
            <form action="../api/otp.php" method="POST">
                <input type="text" style="width: 15%" name="otp" placeholder="Enter OTP" required><br><br>
                <button id="loginbtn" style= "cursor:pointer; width:65px; border-radius:8px; margin-right=5px" type="submit" name="otp">SUBMIT</button>
            </form>
        </center>
    </body>
</html>