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
        height: 70px
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


    li {
        margin-left: 5px;
        font-size: large;
        /* padding-left: 20px; */
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
    <div style="margin:2%">
        <h1 style="color:#96174b; ">Why CareClub</h1>
        <h2 style="color:#0070AE; margin-top:50px ">Canada's destination for donating and fundraising online </h2>
        <p style="font-size:large; color:black">
            For more than 22 years, CareClub has been the trusted charity, informing, inspiring and connecting charities and donors, with the causes they care about. We have facilitated over $2 billion in giving.

        </p>
        <h2 style="color:#0070AE; margin-top:50px ">Registered Charity Address</h2>
        <p style="font-size:large; color:black">120 Industry Street, Unit C, Toronto, ON, M6M 4L8</p>
        <div style="display: flex;flex-direction:row;margin-top:50px">
            <div style="width:50%;display:flex;align-items:center;justify-content:center">
                <img class="" src="images/mission.png">
            </div>
            <div style="width:50%">
                <h2 style="color:#0070AE; margin-top:50px ">Our Mission</h2>
                <p style="font-size:large; color:black">
                    To inform, inspire, and connect donors and charities, and to democratize access to effective technology and education in the charitable sector.
                </p>
            </div>
        </div>

        <div style="display: flex;flex-direction:row;margin-top:100px">
            <div style="width:50%;display:flex;align-items:center;justify-content:center">
                <img class="" src="images/vision.jpg" style="width:250px;height:200px">

            </div>
            <div style="width:50%">
                <h2 style="color:#0070AE; margin-top:50px ">
                    Our Vision
                </h2>
                <p style="font-size:large; color:black">
                    We envision a society in which all Canadians are committed to giving and participating in the charitable sector, and in which all charities, regardless of size, have the capacity to increase their impact.
                </p>
            </div>
        </div>

        <div style="display: flex;flex-direction:row;margin-top:60px">
            <div style="width:40%;">
                <h2 style="color:#0070AE; margin-top:50px ">
                    A Charity that Supports All Canadian Charities
                </h2>
                <p style="font-size:large; color:black">
                    We support all Canadian charities, no matter how big or small. Offering much more than just donation processing, we enable the fastest disbursements, and provide robust reporting and the best fundraising technology to charities nationwide.
                </p>

            </div>
            <div style="width:10%;"></div>
            <div style="width:50%">
                <h2 style="color:#0070AE; margin-top:50px ">
                    Free All-In-One Solution For Donors
                </h2>
                <p style="font-size:large; color:black">
                    Donate to or fundraise for any Canadian charity and we’ll ensure the money reaches your favourite charity fast. We provide instant tax receipts as well as options to give monthly, give anonymously, and track your personal donations.
                </p>
            </div>
        </div>



        <div style="margin-bottom:150px">
            <div style="color:#fff; margin-top:50px;background-color:#0070AE ;padding:1px">
                <h2 style="margin-left:10px">
                    At a Glance
                </h2>
            </div>
            <div style="background-color:#F0F0F0;display:flex ">
                <ul>
                    <li>Over 3 million people have donated more than $2 billion</li>
                    <li>Trusted by Canadians for 22 years.</li>
                    <li>More than 26,000 charities depend on CareClub’ fundraising technology.</li>
                    <li>Canadians can donate to every charity in Canada – over 86,000 charities.</li>
                </ul>
            </div>

        </div>
    </div>


    <footer>
        <p>&copy; Care Club 1999-2023</p>
    </footer>
</body>

</html>