<html>

<head>
    <title>Sign Up</title>
    <link rel="stylesheet" type="text/css" href="style.css">

    <style>
        .error {
            color: #FF0001;
        }
    </style>
</head>

<body>

    <?php


    require 'includes/src/PHPMailer.php';
    require 'includes/src/SMTP.php';
    require 'includes/src/Exception.php';


    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;




    //$mail->SMTPDebug = 3;                               // Enable verbose debug output


    ?>


    <?php
    // define variables to empty values  
    $usernameErr = $emailErr = $passwordErr = $cpasswordErr = "";
    $username = $email = $password = $cpassword  = "";

    //Input fields validation  
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        //String Validation  
        if (empty($_POST["username"])) {
            $usernameErr = "Name is required";
        } else {
            $username = input_data($_POST["username"]);
            // check if name only contains letters and whitespace  
            if (!preg_match("/^[a-zA-Z ]*$/", $username)) {
                $usernameErr = "Only alphabets and white space are allowed";
            }
        }

        //Email Validation   
        if (empty($_POST["email"])) {
            $emailErr = "Email is required";
        } else {
            $email = input_data($_POST["email"]);
            // check that the e-mail address is well-formed  
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

        //CPassword Validation   
        if (empty($_POST["cpassword"])) {
            $cpasswordErr = "Password not matched!";
        } else {
            $cpassword = input_data($_POST["cpassword"]);

            if (input_data($_POST["cpassword"]) != input_data($_POST["password"])) {
                $cpasswordErr = "Password not matched!";
            }
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
        <h1>Sign Up</h1>

        <div>
            <form method="post">
                <input type="text" name="username" placeholder="Username" />
                <span class="error">* <?php if ($usernameErr) echo "<br>";
                                        echo $usernameErr; ?> </span>
                <br /><br />
                <input type="text" name="email" placeholder="Email" />
                <span class="error">* <?php if ($emailErr) echo "<br>";
                                        echo $emailErr; ?> </span>
                <br /><br />

                <input type="password" name="password" placeholder="Password" />
                <span class="error">* <?php if ($passwordErr) echo "<br>";
                                        echo $passwordErr; ?> </span>
                <br /><br />
                <input type="password" name="cpassword" placeholder="Confirm Password" />
                <span class="error">* <?php if ($cpasswordErr) echo "<br>";
                                        echo $cpasswordErr; ?> </span>
                <br><br>
                <span class="error" style="justify-content:flex-end;display:flex;">* required field </span>


                <br />
                <br />
                <div style="display:flex;align-self:center;align-items:center;justify-content:center">
                    <input id="submit" type="submit" name="submit" value="Sign Up" />
                </div>
                <div>
                    <p style="">Already user? <a href="login.php">Login here</a></p>
                </div>

        </div>
    </div>
    </form>

    </div>

    <?php
    if (isset($_POST['submit'])) {
        if ($usernameErr == "" && $emailErr == "" && $passwordErr == "" && $cpasswordErr == "") {

            $x = $username;
            $y = $email;
            $z = $password;
            $a = $cpassword;

            $mail = new PHPMailer();
            $mail->isSMTP();                                      // Set mailer to use SMTP
            $mail->Host = "smtp.gmail.com";  // Specify main and backup SMTP servers
            $mail->SMTPAuth = true;                               // Enable SMTP authentication
            $mail->Username = 'meetchothani006@gmail.com';                 // SMTP username
            $mail->Password = 'nuqljvnmdagbhqde';                           // SMTP password
            $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
            $mail->Port = "587";                                    // TCP port to connect to


            $mail->Subject = 'Registration Message From CareClub';
            $mail->Body    = 'Registration is done successfully for username ' . $x;


            $mail->setFrom("meetchothani006@gmail.com");

            $mail->addAddress($y);



            if (!$mail->send()) {
                echo 'Message could not be sent.';
                echo 'Mailer Error: ' . $mail->ErrorInfo;
            } else {
                echo 'Message has been sent';
            }

            $mail->smtpClose();





            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "careclub";


            $conn = new mysqli($servername, $username, $password, $dbname);


            if ($conn->connect_error) {

                die("connection failed: " . $conn->connect_error);
            }

            // echo "Connected Successfully  <br><br>";


            $sql = "INSERT INTO `userinfo` ( `username`, `email`, `password`, `cpassword`) VALUES ('$x', '$y','$z','$a')";

            echo "Went here1";
            echo $conn->errno;
            echo "Went here2";
            if ($conn->query($sql) === TRUE) {

                $sql3 = "SELECT * FROM `userinfo` Order by id desc limit 1 ";
                $retval = mysqli_query($conn, $sql3);

                if (!$retval) {
                    echo 'Error:' . $sql3 . "<br>" . $conn->error;
                } else {

                    if (mysqli_num_rows($retval) == 1) {

                        session_start();



                        while ($row = mysqli_fetch_assoc($retval)) {

                            $_SESSION['username'] = $x;

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


                // echo 'New record created';

                // echo "<h3 color = #FF0001> <b>You have sucessfully registered.</b> </h3>";

                // echo "--------------------";
            } elseif ($conn->errno == 0) {
                echo '<script>alert("User already exist!")</script>';
            } else {
                echo "Went here";
                echo  $conn->error;
            }



            $conn->close();
        } else {
            echo '<script>alert("You did not filled up the form correctly")</script>';
        }
    }
    ?>



</body>


</html>