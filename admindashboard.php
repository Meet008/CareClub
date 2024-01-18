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
        height: auto;
        width: 100%;
        justify-content: "space-between";
        align-items: center;
    }

    .error {
        color: #FF0001;
    }



    .Main_logo {
        width: 500px;
        /* height: 70px */
    }

    .charity_logo {
        width: 100px;
        height: 200px;
    }

    .charity_logo_speed {
        /* width: 300px; */
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
        margin-top: 20px;
        margin-bottom: 50px;

    }

    /* * {
    margin: 0px;
    padding: 0px;
    } */


    .main {

        margin: 2%;
    }

    .card {
        width: 20%;
        display: inline-block;
        box-shadow: 2px 2px 20px black;
        border-radius: 5px;
        margin: 2%;
    }

    .card_form {
        width: 60%;
        display: inline-block;
        box-shadow: 2px 2px 20px black;
        border-radius: 5px;
        margin: 2%;
    }

    .image img {
        width: 100%;
        border-top-right-radius: 5px;
        border-top-left-radius: 5px;

    }

    .title {

        text-align: center;
        padding: 10px;

    }


    .des_form {
        padding: 3px;
        text-align: center;


        border-bottom-right-radius: 5px;
        border-bottom-left-radius: 5px;
    }

    .des {
        padding: 3px;
        text-align: center;

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

    .card:hover {
        background-color: #ddd;
        color: black;
        transition: .5s;
        cursor: pointer;
    }

    li.menu-item {
        margin-left: 10px;
        padding-left: 20px;
    }


    .dropbtn {
        padding-top: 10px;
        width: 160px;
        background-color: #0070AE;
        color: white;
        /* padding: 16px;
        font-size: 16px; */
        border: none;
        cursor: pointer;
    }

    /* Dropdown button on hover & focus */
    .dropbtn:hover,
    .dropbtn:focus {
        background-color: #3498DB;
    }

    /* The container <div> - needed to position the dropdown content */
    .dropdown {
        position: relative;
        display: inline-block;
    }

    /* Dropdown Content (Hidden by Default) */
    .dropdown-content {
        display: none;
        position: absolute;
        background-color: #f1f1f1;
        min-width: 160px;
        box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
        z-index: 1;
    }

    /* Links inside the dropdown */
    .dropdown-content a {
        color: black;
        padding: 12px 16px;
        text-decoration: none;
        display: block;
    }

    /* Change color of dropdown links on hover */
    .dropdown-content a:hover {
        background-color: #ddd;
    }

    /* Show the dropdown menu (use JS to add this class to the .dropdown-content container when the user clicks on the dropdown button) */
    .show {
        display: block;
    }
</style>


<body>

    <div class="mymenu">
        <nav class="header" style="display:flex; flex-direction:row;justify-content:space-between">
            <div>
                <img class="Main_logo" src="images/Logo.jpeg">
            </div>
            <div>
                <ul class="menu-items" style="display:flex;justify-content:flex-end; flex-direction:row;list-style:none;">
                    <li class="menu-item"><a href="#" class="active">Home</a></li>
                    <li class="menu-item"><a href="aboutus.php">About Us</a></li>
                    <li class="menu-item"><a href="partners.php">Our Partners</a></li>
                    <li class="menu-item" id="login"><a href="login.php">Sign In</a></li>
                    <li class="menu-item" id="register"><a href="register.php">Sign Up</a></li>

                </ul>
            </div>
            <div>
                <?php



                if (isset($_SESSION['id']) && isset($_SESSION['username'])) {
                ?>
                    <div class="dropdown">
                        <button onclick="myFunction()" class="dropbtn">
                            <?php echo "Hello, " . $_SESSION['username']; ?>
                            <p> Links &#8595</p>
                        </button>
                        <div id="myDropdown" class="dropdown-content">
                            <!-- <a href="userProfile.php">Profile</a> -->
                            <a href="logout.php">Logout</a>
                        </div>
                    </div>

                    <script>
                        /* When the user clicks on the button, 
toggle between hiding and showing the dropdown content */
                        function myFunction() {
                            document.getElementById("myDropdown").classList.toggle("show");
                        }

                        // Close the dropdown if the user clicks outside of it
                        window.onclick = function(event) {
                            if (!event.target.matches('.dropbtn')) {
                                var dropdowns = document.getElementsByClassName("dropdown-content");
                                var i;
                                for (i = 0; i < dropdowns.length; i++) {
                                    var openDropdown = dropdowns[i];
                                    if (openDropdown.classList.contains('show')) {
                                        openDropdown.classList.remove('show');
                                    }
                                }
                            }
                        }
                    </script>
                <?php
                    echo " 
    <script >
    document.getElementById('login').style.display = 'none';
    document.getElementById('register').style.display = 'none';
    
    </script>";
                } else {
                    // echo "Not Executing";
                }
                ?>
            </div>
        </nav>
    </div>

    </div>
    <div>
        <?php
        // define variables to empty values  
        $businessNo = $contact = $email = $mission = $about = $address = $fileupload = $charityName = "";
        $busineesNoErr = $contactErr = $emailErr = $missionErr = $aboutErr = $addressErr = $fileuploadErr = $charityNameErr = "";

        //Input fields validation  
        if ($_SERVER["REQUEST_METHOD"] == "POST") {


            if (empty($_POST["charityName"])) {
                $charityNameErr = "Charity Name is required";
            } else {
                $charityName = $_POST["charityName"];

                if (!preg_match("/^[a-zA-Z0-9 ]*$/", $businessNo)) {
                    $charityNameErr = "Only alphabets and numbers are allowed";
                }
            }


            //businessNo Validation  
            if (empty($_POST["businessNo"])) {
                $busineesNoErr = "Business Number is required";
            } else {
                $businessNo = $_POST["businessNo"];

                if (!preg_match("/^[a-zA-Z0-9 ]*$/", $businessNo)) {
                    $busineesNoErr = "Only alphabets and numbers are allowed";
                }
            }

            if (empty($_POST["contact"])) {
                $contactErr = "Contact Number is required";
            } else {
                $contact = $_POST["contact"];

                if (!preg_match("/^[0-9]*$/", $contact)) {
                    $contactErr = "Only numbers are allowed";
                }
            }

            if (empty($_POST["email"])) {
                $emailErr = "Email is required";
            } else {
                $email = $_POST["email"];

                if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    $emailErr = "Invalid email format";
                }
            }

            if (empty($_POST["mission"])) {
                $missionErr = "Mission Information is required";
            } else {
                $mission = $_POST["mission"];

                if (!preg_match("/^[a-zA-Z ]*$/", $mission)) {
                    $missionErr = "Only alphabets and white space are allowed";
                }
            }

            if (empty($_POST["about"])) {
                $aboutErr = "About Information is required";
            } else {
                $about = $_POST["about"];

                if (!preg_match("/^[a-zA-Z ]*$/", $about)) {
                    $aboutErr = "Only alphabets and white space are allowed";
                }
            }

            if (empty($_POST["address"])) {
                $addressErr = "address is required";
            } else {
                $address = $_POST["address"];

                if (!preg_match("/^[a-zA-Z0-9 ]*$/", $address)) {
                    $addressErr = "Only alphabets and numbers are allowed";
                }
            }
        }

        ?>
    </div>
    <div class="des">

        <div class="card_form">
            <div class="title">

                <div class="main_heading" style="color:#0070AE">

                    <h1>Add New Charity</h1>

                </div>
            </div>
            <div class="des_form">
                <form method="post" enctype="multipart/form-data">


                    <input type="text" name="charityName" placeholder="Charity Name">
                    <span class="error">

                        <?php if ($charityNameErr) echo "<br>";
                        echo $charityNameErr; ?> </span>
                    <br>

                    <br>

                    <input type="text" name="businessNo" placeholder="Business Number">
                    <span class="error">

                        <?php if ($busineesNoErr) echo "<br>";
                        echo $busineesNoErr; ?> </span>
                    <br>

                    <br>
                    <input type="number" name="contact" placeholder="Contact No">
                    <span class="error">

                        <?php if ($contactErr) echo "<br>";
                        echo $contactErr; ?> </span>
                    <br>

                    <br>
                    <input type="text" name="email" placeholder="Email">
                    <span class="error">

                        <?php if ($emailErr) echo "<br>";
                        echo $emailErr; ?> </span>
                    <br>

                    <br>
                    <input type="text" name="mission" placeholder="Mission">
                    <span class="error">

                        <?php if ($missionErr) echo "<br>";
                        echo $missionErr; ?> </span>
                    <br>

                    <br>
                    <input type="text" name="about" placeholder="About">
                    <span class="error">

                        <?php if ($aboutErr) echo "<br>";
                        echo $aboutErr; ?> </span>
                    <br>

                    <br>
                    <input type="text" name="address" placeholder="Address">
                    <span class="error">

                        <?php if ($addressErr) echo "<br>";
                        echo $addressErr; ?> </span>
                    <br>

                    <br>
                    <p>Upload Charity Logo</p>
                    <input type="file" name="image" placeholder="Image">
                    <span class="error">

                        <?php if ($busineesNoErr) echo "<br>";
                        echo $busineesNoErr; ?> </span>
                    <br>

                    <br>

                    <input id="submit" class="card_button" style="margin-bottom:50px;width:80px;height: 45px;font-size:15px;background:#0070ae;color:#fff;" type="submit" name="submit" value="Save" />
                    <!-- <button class="card_button" style="width:80px;height: 45px;font-size:15px;background:#0070ae;color:#fff;">Donate</button> -->
                </form>
            </div>

        </div>

    </div>


    <div>

        <?php
        if (isset($_POST['submit'])) {

            if ($charityName = $busineesNoErr = $contactErr = $emailErr = $missionErr = $aboutErr = $addressErr  == "") {

                // echo $businessNo;
                // echo $contact;
                // echo  $email;
                // echo $mission;
                // echo $about;
                // echo $address;

                if (!empty($_FILES['image']['name'])) {



                    $fileName = basename($_FILES["image"]["name"]);
                    $fileType = pathinfo($fileName, PATHINFO_EXTENSION);

                    // echo $fileName;

                    // echo $fileType;

                    $allowTypes = array('jpg', 'png', 'gif', 'jpeg');

                    if (in_array($fileType, $allowTypes)) {
                        $image = $_FILES['image']['tmp_name'];
                        $imgContent = addslashes(file_get_contents($image));


                        $servername = "localhost";
                        $username = "root";
                        $password = "";
                        $dbname = "careclub";

                        $conn = new mysqli($servername, $username, $password, $dbname);

                        if ($conn->connect_error) {

                            die("connection failed: " . $conn->connect_error);
                        }

                        // Insert image content into database 

                        $sql = "INSERT INTO `charityinfo` (`charityName`,`businessNo`,`phone`,`email`,`missionInfo`,`aboutInfo`,`address`,`logo` )
                         VALUES ('$charityName','$businessNo','$contact', '$email', '$mission',  '$about',  '$address'  ,'$imgContent' )";


                        if ($conn->query($sql) === TRUE) {
                            $status = 'success';
                            $statusMsg = "File uploaded successfully.";
                        } else {
                            $statusMsg = "File upload failed, please try again.";
                        }
                    } else {
                        $statusMsg = 'Sorry, only JPG, JPEG, PNG, & GIF files are allowed to upload.';
                    }
                } else {
                    $statusMsg = 'Please select an image file to upload.';
                }
            }
            echo '<script language="javascript">';
            echo 'alert($statusMsg)';
            echo '</script>';
        }

        ?>

    </div>

    <div style="margin-left:50px">

        <h1>Associated Charities</h1>

    </div>
    <div>



        <?php
        // define variables to empty values  
        $searchErr   = "";
        $search = "";
        $sql2 = "SELECT * FROM `charityinfo`";
        //Input fields validation  
        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            //String Validation  
            if (empty($_POST["search"])) {
                $searchErr = "Search text can't be empty";
            } else {

                $search = input_data($_POST["search"]);
            }
        }
        function input_data($data)
        {
            $data = trim($data);
            $data = stripslashes($data);       //use to handle special chars
            $data = htmlspecialchars($data);  //use to handle special chars
            return $data;
        }


        if (isset($_POST['button1'])) {



            function getFilteredCharity($x)
            {
                return "SELECT * from `charityinfo` where charityName LIKE '%$x%'";
            }

            $sql2 = getFilteredCharity($search);
        }

        if (isset($_POST['button2'])) {


            function getAllCharity()
            {

                return   "SELECT * FROM `charityinfo`";
            }


            $sql2 = getAllCharity();
        }

        ?>

        <?php


        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "careclub";

        $conn = new mysqli($servername, $username, $password, $dbname);



        if ($conn->connect_error) {

            die("connection failed: " . $conn->connect_error);
        }


        $retval = mysqli_query($conn, $sql2);

        if (!$retval) {
            echo 'Error:' . $sql2 . "<br>" . $conn->error;
        }

        while ($row = mysqli_fetch_assoc($retval)) {
        ?>


            <div class="card">

                <div class="image">
                    <!-- <img class="charity_logo" src="images/charity5.png"> -->
                    <img class="charity_logo" src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row['logo']); ?>" />
                </div>
                <div class="title">
                    <h3 style="color:#0070AE">
                        <?php echo $row['charityName']; ?></h3>
                </div>
                <div class="des">
                    <div>
                        <p> <?php echo $row['address']; ?></p>
                    </div>

                </div>
            </div>


        <?php    }


        ?>

    </div>
    <footer style="margin-top:80px">
        <p>&copy; Care Club 1999-2023</p>
    </footer>
</body>

</html>