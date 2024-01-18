<html>

<head>
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="style.css">

    <style>
        .error {
            color: #FF0001;
        }
    </style>
</head>

<body>


    <?php
    // define variables to empty values  
    $emailErr = $passwordErr  = "";
    $email =  $password = "";

    //Input fields validation  
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        //String Validation  
        if (empty($_POST["email"])) {
            $emailErr = "Email is required";
        } else {

            $email = input_data($_POST["email"]);
            // check that the e-mail address is well-formed  //using filter_var
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $emailErr = "Invalid email format";
            }
        }



        //Password Validation   
        if (empty($_POST["password"])) {
            $passwordErr = "Password is required";
        } else {
            $password = input_data($_POST["password"]);
        }
    }
    function input_data($data)
    {
        $data = trim($data);
        $data = stripslashes($data);       //use to handle special chars
        $data = htmlspecialchars($data);  //use to handle special chars
        return $data;
    }
    ?>


    <div class="form">
        <h1>Login</h1>
        <div>
            <form method="post">
                <input type="text" name="email" placeholder="Email" />
                <span class="error">* <?php if ($emailErr) echo "<br>";
                                        echo $emailErr; ?> </span>
                <br /><br />
                <input type="password" name="password" placeholder="Password" />
                <span class="error">* <?php if ($passwordErr) echo "<br>";
                                        echo $passwordErr; ?> </span>
                <br />
                <br />
                <div style="display:flex;align-self:center;align-items:center;justify-content:center">
                    <input id="submit" type="submit" name="submit" value="Login" />

                </div>
                <div>
                    <p style="">New user? <a href="register.php">Start here</a></p>
                </div>
                <div>
                    <p style="">Admin? <a href="adminlogin.php">Click here</a></p>
                </div>
        </div>
    </div>
    </form>

    </div>


    <?php
    if (isset($_POST['submit'])) {

        if ($emailErr == "" && $passwordErr == "") {


            $x = $email;
            $y = $password;


            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "careclub";


            $conn = new mysqli($servername, $username, $password, $dbname);


            if ($conn->connect_error) {

                die("connection failed: " . $conn->connect_error);
            }

            // echo "Connected Successfully  <br><br>";




            $sql2 =    "SELECT * FROM `userinfo` where email='$x' and password='$y'";

            $retval = mysqli_query($conn, $sql2);

            if (!$retval) {
                echo 'Error:' . $sql2 . "<br>" . $conn->error;
            } else {
                if (mysqli_num_rows($retval) == 1) {

                    session_start();



                    while ($row = mysqli_fetch_assoc($retval)) {

                        $_SESSION['username'] = $row['username'];

                        $_SESSION['id'] = $row['id'];




                        if (isset($_SESSION['id']) && isset($_SESSION['username'])) {
                            echo "Executing";
                            header("Location:index.php");
                        } else {
                            echo "Not Executing";
                        }
                    }
                } else {
                    echo '<script>alert("Invalid Credentials!")</script>';
                }
            }


            $conn->close();
        } else {
            echo '<script>alert("You did not filled up the form correctly")</script>';
        }
    }
    ?>
</body>

</html>