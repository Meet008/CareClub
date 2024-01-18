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

    .image img {
        width: 100%;
        border-top-right-radius: 5px;
        border-top-left-radius: 5px;

    }

    .title {

        text-align: center;
        padding: 10px;

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

                session_start();

                if (isset($_SESSION['id']) && isset($_SESSION['username'])) {
                ?>
                    <div class="dropdown">
                        <button onclick="myFunction()" class="dropbtn">
                            <?php echo "Hello, " . $_SESSION['username']; ?>
                            <p>Profile & Links &#8595</p>
                        </button>
                        <div id="myDropdown" class="dropdown-content">
                            <a href="userProfile.php">Profile</a>
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
    <div class="main_heading">
        <h1>Place for donating and fundraising online.</h1>
    </div>

    <div>
        <marquee direction="left" scrollamount="30">
            <img class="charity_logo_speed" src="images/ch1.jpg">
            <img class="charity_logo_speed" src="images/ch2">
            <img class="charity_logo_speed" src="images/ch3.jpg">
            <img class="charity_logo_speed" src="images/ch4.jpg">
            <img class="charity_logo_speed" src="images/ch5.jpg">
        </marquee>
    </div>

    <div>
        <div style="display: flex;flex-direction:row;margin: 80px 0px 50px 0px">
            <h2 style="margin: 2%;display:flex;align-items:center; color: #0070AE">Get Started: Find a Charity</h2>
            <form method="post" id="myform">
                <div style="display: flex;flex-direction:row;align-items:center;justify-content:center">

                    <input style="font-size:15px;border:#dde1ea 1px solid; width:200px;height:50px;" type="text" name="search" placeholder="Search for a Charity" />
                    <div>
                        <input style=" width:80px;height: 54px;font-size:16px;background:#96174b;color:#fff;" id="submit" type="submit" name="button1" value="Search" />

                        <input style=" width:120px;height: 54px;font-size:16px;background:#0070AE;color:#fff;" id="submit" type="submit" name="button2" value="Reset Filter" />

                    </div>

                </div>
            </form>
        </div>

        <!-- <script>
            document.getElementById("myform").addEventListener("click", function(event) {
                event.preventDefault()
            });
        </script> -->
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
                    <div>
                        <button class="card_button" onclick="<?php if (isset($_SESSION['id'])) { ?>
                     window.location.href='charityInfo.php?id=<?php echo $row['id'];
                                                                ?>'<?php } else { ?> window.location.href='login.php'//this.disabled='disabled'<?php } ?> " style="width:80px;height: 45px;font-size:15px;background:#0070ae;color:#fff;">Donate</button>
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