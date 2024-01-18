<?php

session_start();

?>
<!DOCTYPE html>

<head>
</head>
<style>
    .header {
        display: "flex";
        flex-direction: "row";
        height: 150px;
        width: 100%;
    }



    .Main_logo {
        width: 500px;
        /* height: 70px */
    }

    .error {
        color: #FF0001;
    }

    .charity_logo {
        width: 100px;
        height: 200px;
    }

    footer {
        text-align: center;
        padding: 10px;
        background-color: #0070AE;
        color: white;
        width: 100%;
    }

    .main_heading {
        text-align: center;

    }

    /* * {
    margin: 0px;
    padding: 0px;
    } */


    .main {

        margin: 2%;
    }

    .card {
        width: 40%;
        display: inline-block;
        box-shadow: 2px 2px 20px black;
        border-radius: 5px;
        margin: 2%;
    }

    .image img {
        width: 50%;
        border-top-right-radius: 5px;
        border-top-left-radius: 5px;

    }

    .title {

        text-align: center;
        padding: 10px;

    }



    .des {
        padding: 3px;
        display: flex;
        justify-content: center;
        margin-left: 80px;
        padding-top: 10px;
        border-bottom-right-radius: 5px;
        border-bottom-left-radius: 5px;
    }

    .card_button {
        margin-top: 20px;
        margin-bottom: 10px;
        background-color: white;
        border: 1px solid black;
        border-radius: 5px;
        padding: 10px;
    }

    /* .card:hover {
        background-color: #ddd;
        color: black;
        transition: .5s;
        cursor: pointer;
    } */

    li.menu-item {
        margin-left: 10px;
        padding-left: 20px;
    }
</style>


<body>

    <!-- <div class="mymenu">
        <nav class="header" style="display:flex; flex-direction:row; ">
            <div>
                <img class="Main_logo" src="images/Logo.jpeg">
            </div>

        </nav>
    </div> -->
    <?php
    $id = $_GET["id"];

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "careclub";

    $conn = new mysqli($servername, $username, $password, $dbname);


    if ($conn->connect_error) {

        die("connection failed: " . $conn->connect_error);
    }

    $sql2 =    "SELECT * FROM `charityinfo` WHERE id =  '$id'";


    $retval = mysqli_query($conn, $sql2);

    if (!$retval) {
        echo 'Error:' . $sql2 . "<br>" . $conn->error;
    }




    while ($row = mysqli_fetch_assoc($retval)) {




    ?>

        <?php
        // define variables to empty values  
        $donationAmtErr = "";
        $donationAmt = $message = "";

        //Input fields validation  
        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            //String Validation  
            if (empty($_POST["donationAmt"])) {
                $donationAmtErr = "Amount is required";
            } else {
                $donationAmt = $_POST["donationAmt"];
            }

            $message = $_POST["message"];
        }
        function input_data($data)
        {
            $data = trim($data);
            $data = stripslashes($data);       //use to handle special chars
            $data = htmlspecialchars($data);  //use to handle special chars
            return $data;
        }
        ?>



        <div style="margin:2%">
            <div style="display:flex;flex-direction:row">
                <div style="width:50%;justify-content:center;display:flex;flex-direction:column">
                    <div class="image">
                        <img class="charity_logo" src="images/charity2.png">
                    </div>
                    <h1 style="color:#96174b"><?php echo $row['charityName'] ?></h1>
                    <div style="display:flex;flex-direction:row; align-items:center">
                        <p>Business No: </p>
                        <h3 style="margin-left:10px"> <?php echo $row['businessNo'] ?> </h3>
                    </div>
                    <div style="display:flex;flex-direction:row; align-items:center">
                        <p>Email: </p>
                        <h3 style="margin-left:10px"> <?php echo $row['email'] ?> </h3>
                    </div>
                    <div style="display:flex;flex-direction:row; align-items:center">
                        <p>Registered Charity Address: </p>
                        <h3 style="margin-left:10px"> <?php echo $row['address'] ?> </h3>
                    </div>

                </div>




                <div class="card">

                    <div class="title">
                        <h1 style="color:#0070AE">
                            Donate To This Charity </h1>
                    </div>
                    <div class="des">
                        <form method="post">
                            <div style="display:flex;flex-direction:row;align-items:center">
                                <h3 style="margin-right:2px">Donation Amount </h3> <span class="error"> *</span>

                            </div>

                            <input type="number" name="donationAmt" placeholder="Enter Amount">
                            <span class="error">

                                <?php if ($donationAmtErr) echo "<br>";
                                echo $donationAmtErr; ?> </span>
                            <br>
                            <h3>Send a message to this charity (optional)</h3>
                            <input type="text" name="message" placeholder="Enter Message">
                            <br>

                            <input id="submit" class="card_button" style="width:80px;height: 45px;font-size:15px;background:#0070ae;color:#fff;" type="submit" name="submit" value="Donate" />
                            <!-- <button class="card_button" style="width:80px;height: 45px;font-size:15px;background:#0070ae;color:#fff;">Donate</button> -->
                        </form>
                    </div>
                    <?php
                    if (isset($_POST['submit'])) {
                        if ($donationAmtErr == "") {


                            $x = $row['id'];
                            $y = $row['charityName'];

                            if ($_SESSION['id'] && $_SESSION['username']) {
                                $z = $_SESSION['id'];
                            } else {

                                $z = 0;
                            }
                            $a = $donationAmt;
                            $b = $message;



                            $servername = "localhost";
                            $username = "root";
                            $password = "";
                            $dbname = "careclub";


                            $conn = new mysqli($servername, $username, $password, $dbname);


                            if ($conn->connect_error) {

                                die("connection failed: " . $conn->connect_error);
                            }

                            // echo "Connected Successfully  <br><br>";


                            $sql = "INSERT INTO `donationinfo` ( `charityId`, `charityName`, `userId`,`donationAmt`,`charityMessage`) VALUES ('$x', '$y','$z','$a','$b')";

                            if ($conn->query($sql) === TRUE) {

                                echo '<script>alert("You have sucessfully donated your Amount!")</script>';
                                // echo 'New record created';

                                // echo "<h3 color = #FF0001> <b>You have sucessfully donated your Amount.</b> </h3>";

                                // echo "--------------------";
                            } else {
                                echo 'Error:' . $sql . "<br>" . $conn->error;
                            }



                            $conn->close();
                        } else {
                            // echo "<h3> <b>You didn't filled up the form correctly.</b> </h3>";
                        }
                    }
                    ?>


                </div>

            </div>

            <h2 style="color:#0070AE; margin-top: 50px;">Our Mission</h2>
            <p>

                <?php echo $row['missionInfo'] ?>
            </p>
            <h2 style="color:#0070AE ; margin-top: 50px;">About Foodshare Toronto</h2>
            <p>
                <?php echo $row['aboutInfo'] ?> </p>

        </div>

    <?php } ?>
    <footer>
        <p>&copy; Care Club 1999-2023</p>
    </footer>
</body>

</html>