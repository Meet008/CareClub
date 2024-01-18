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
        width: 140px;
        height: 180px;
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
        margin-top: 50px;
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
        width: 40%;
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
        text-align: center;
        text-justify: inter-word;
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

            </div>

        </nav>

    <?php
                }

                $servername = "localhost";
                $username = "root";
                $password = "";
                $dbname = "careclub";

                $conn = new mysqli($servername, $username, $password, $dbname);



                if ($conn->connect_error) {

                    die("connection failed: " . $conn->connect_error);
                }

                $sql2 = "SELECT * FROM `partnerinfo`";

                $retval = mysqli_query($conn, $sql2);

                if (!$retval) {
                    echo 'Error:' . $sql2 . "<br>" . $conn->error;
                }

                while ($row = mysqli_fetch_assoc($retval)) {
    ?>

        <div style="display: flex;flex-direction:row;margin-top:50px">
            <div style="width:50%;display:flex;align-items:center;justify-content:center">

                <img class="charity_logo" src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row['profile']); ?>" />

            </div>
            <div style="width:50%">
                <h2 style="color:#0070AE; margin-top:50px "> <?php echo $row['name']; ?></h2>
                <p style="font-size:large; color:black">
                    <?php echo $row['work']; ?> </p>
                <p> <?php echo $row['description']; ?></p>
            </div>
        </div>

        <!-- <div class="card">


            <div class="title">
                <h3>
                    <?php echo $row['name']; ?></h3>
            </div>
            <div class="title">
                <h3>
                    <?php echo $row['work']; ?></h3>
            </div>
            <div class="des">
                <p> <?php echo $row['description']; ?></p>
            </div>
        </div> -->


    <?php    }


    ?>

    </div>
    <footer style="margin-top:80px">
        <p>&copy; Care Club 1999-2023</p>
    </footer>
</body>

</html>