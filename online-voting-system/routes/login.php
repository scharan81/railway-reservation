<html>
    <head>
        <title>Online voting system - Login</title>
        <link rel="stylesheet" href="../css/stylesheet.css">
    </head>
    <body>
        <center>
            <div id="headerSection">
            <a href="../"><button id="loginbtn" style= "float:left; cursor:pointer; width:65px; border-radius:8px; margin-right=5px" type="submit" name="back"> Back</button></a>  
            <h1>Online Voting System</h1>
            </div>
            <hr>

            <h2>Login Here</h2>
            <form action="../api/login.php" method="POST">
                    <input type="text" style="width: 15%" name="name" placeholder="Enter Name" required><br><br>
                    <input type="number" style="width: 15%" name="mob" placeholder="Enter Mobile Number" required><br><br>
                    <input type="number" style="width: 18%" name="aadhar" placeholder="Enter Aadhar Number" required><br><br>
                    <input type="email" style="width: 18%" name="email" placeholder="Enter e-mail" required><br><br>
                    <input type="password" style="width: 18%" name="pass" placeholder="Enter Password" required><br><br>
                    <select name="role" style="width: 18%; border: 2px solid black">
                        <option value="1">Voter</option>
                        <option value="2">Group</option>
                    </select><br><br>                
                    <button id="loginbtn" style= "cursor:pointer; width:65px; border-radius:8px; margin-right=5px" type="submit" name="loginbtn">Login</button>
                </form>
            </center>
    </body>
</html>