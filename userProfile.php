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

    <script>
        function indexClick() {
            header("Location:index.php");
        }
    </script>
    <div class="mymenu">
        <nav class="header" style="display:flex; flex-direction:row;justify-content:space-between">
            <div>
                <img class="Main_logo" src="images/Logo.jpeg" onclick="indexClick()">
            </div>

            <div>
                <?php

                session_start();

                if (isset($_SESSION['id']) && isset($_SESSION['username'])) {
                ?>
                    <div class="dropdown">
                        <button onclick="myFunction()" class="dropbtn">
                            <?php echo "Hello, " . $_SESSION['username']; ?>
                            <p>Profile & Links &#8595;
                            </p>
                        </button>
                        <div id="myDropdown" class="dropdown-content">
                            <a href="#">Profile</a>
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
        <h1 style="color:#96174b">Hello, <?php echo $_SESSION['username'] ?></h1>
    </div>
    <div>
        <h2 style="color:#0070AE; ">Your Donation History</h2>
    </div>

    <div>







        <?php


        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "careclub";

        $conn = new mysqli($servername, $username, $password, $dbname);


        $x = $_SESSION['id'];

        if ($conn->connect_error) {

            die("connection failed: " . $conn->connect_error);
        }

        $sql2 =    "SELECT * FROM `donationinfo` where userId='$x' ";

        $retval = mysqli_query($conn, $sql2);

        if (!$retval) {
            echo 'Error:' . $sql2 . "<br>" . $conn->error;
        }
        ?>

        <?php

        if (mysqli_num_rows($retval) > 0) {
        ?>
            <table border="1px" style="width:100%;margin-bottom:100px; margin-top:30px; line-height:40px;">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Charity Name</th>
                        <th>Donation Amount</th>
                        <th>Transaction Date</th>
                    </tr>
                </thead>

            <?php
        } else {
            echo '<div style="display:flex;justify-content:center;align-items:center;margin: 80px 0 80px 0;"><h3 style="margin-right:5px">No History Found! Start your journey today by  </h3> <a href="index.php">  Click here</a> </div>';
        }
            ?>


            <?php
            $j = 1;
            while ($row = mysqli_fetch_assoc($retval)) {

            ?>
                <tbody>
                    <tr>
                        <td><?php echo $j ?></td>
                        <td><?php echo $row['charityName']  ?></td>
                        <td><?php echo $row['donationAmt']; ?></td>
                        <td><?php echo $row['transactionDate'] ?></td>

                    <tr>
                </tbody>
            <?php $j++;
            } ?>






            </table>

    </div>
    <footer>
        <p>&copy; Care Club 1999-2023</p>
    </footer>
</body>

</html>