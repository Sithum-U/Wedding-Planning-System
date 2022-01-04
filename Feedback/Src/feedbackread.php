<?php

require '../Php/config.php';



if (isset($_POST["read"])) {
    $search = $_POST["read"];
    $sql  = "Select * From customerfeedback WHERE C_ID = '$search' ";
    $result = search($sql);
} 


function search($sql)
{
    global $con;
    $r =  mysqli_query($con, $sql);
    return $r;
}





?>

<html>

<head>
    <title> Feedback read</title>
    <link rel="stylesheet" href="../Style/style.css">
    <link rel="stylesheet" href="../Style/style1.css">
    <script src="../JS/javascript.js" defer></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
</head>
<style>
    .card {
       position: absolute;
        margin-left: 40%;
        background-color:pink;
        width: 59.7%;
    }

    .container {
        padding: 2px 16px;
    }

    table, th, td {
  border-collapse: collapse;
  padding: 15px;
  width: 100%;
  table-layout: fixed;
}
td{ overflow-wrap: break-word;
    max-width: 50px;
}

</style>

<body>
    <header>
        <div class="logo">
            <a href="#"><img src="../IMG/Webp.net-resizeimage.png" /></a>
        </div>
        <div id="user-controls">
            <div id="user-icons">
                <div id="cart-link">
                    <a href="#"><img src="../IMG/shopping-cart.png" alt="" /></a>
                </div>
                <div id="profile">
                    <a href="#"><img src="../IMG/user.png" alt="" /> </a>
                </div>
            </div>
            <div id="user-auth">
                <div><a href="">Log In</a></div>
                <div><a href="">Sign Up</a></div>
            </div>
            <div id="vendor-auth">
                <a href="">Are you a Vendor</a>
            </div>
        </div>
    </header>

    <div class="navbar" id="navbar">
        <a href="#home">Home</a>
        <div class="dropdown">
            <button class="dropbtn">Categories</button>
            <div class="dropdown-content">
                <a href="#">Category 1</a>
                <a href="#">Category 2</a>
                <a href="#">Category 3</a>
                <a href="#">Category 4</a>
                <a href="#">Category 5</a>
            </div>
        </div>
        <a href="#news">Vendors</a>
        <a href="#news">NewsLetter</a>
        <a href="#news">About Us</a>
        <a href="#news">Contact Us</a>
    </div> <br>


    <div class="feed">
        <form class="con3" target="_self" method="POST" onsubmit="">
            <center>

                <h1>R E A D<br> Feedback Details</h1>

            </center>

            <br>

            <input type="text" id="read" name="read" style="width:500px;" placeholder="Enter your customer ID number" required><br><br>

            <input class="submit" type="submit" id="btn1" name="btn1" value="Read"><br><br>

        </form>

        <div class="card">
            <div class="container">
            <table class="table" >
        <tr>
            <td> ID </td>
            <td> UserName </td>
            <td> Email </td>
            <td> Bill Id </td>
            <td> Rate </td>
            <td> Comment </td>
        </tr>

        <?php

        while ($row = mysqli_fetch_assoc($result)) {
            $CustomerID = $row['C_ID'];
            $CustomerU = $row['C_Username'];
            $CustomerE = $row['C_Email'];
            $CustomerB = $row['Bill_Id'];
            $CustomerR = $row['C_rate'];
            $CustomerC = $row['C_Comment'];


        ?>
            <tr>
                <td><?php echo $CustomerID ?></td>
                <td><?php echo $CustomerU ?></td>
                <td><?php echo $CustomerE ?></td>
                <td><?php echo $CustomerB ?></td>
                <td><?php echo $CustomerR ?></td>
                <td><?php echo $CustomerC ?></td>
            </tr>
        <?php
        }
        ?>


    </table>

            </div>
        </div>

    </div>



   



    <div class="footer">
        <button class="open-button" onclick="openForm()">Chat</button>
        <div class="chat-popup" id="myForm">
            <form action="#" class="form-container">
                <h1 style="text-align: center;">Messages</h1> <br>

                <label for="mail" style="text-align: left;"><b>Enter your email</b></label>
                <input for="mail" type="email" placeholder="Enter your mail address to reach you back" required><br>
                <label for="msg" style="text-align: left;"><b>Enter your message</b></label>
                <textarea placeholder="Type message.." name="msg" required></textarea>

                <button type="submit" class="btn">Send</button>
                <button type="button" class="btn cancel" onclick="closeForm()">
                    Close
                </button>
            </form>
        </div>
        <div id="site-map">
            <div class="columnleftfooter vertical-menu">
                <h2>DreamWedding</h2>
                <a href="#" class="active">Home</a>
                <div class="dropup">
                    <button class="dropbtn">Category</button>
                    <div class="dropup-content">
                        <a href="#">Category 1</a>
                        <a href="#">Category 2</a>
                        <a href="#">Category 3</a>
                        <a href="#">Category 4</a>
                        <a href="#">Category 5</a>
                    </div>
                </div>
                <a href="#">Vendors</a>
                <a href="#">NewsLetter</a>
                <a href="#">About Us</a>
                <a href="#">Contact Us</a>
            </div>
            <div id="newsletter">
                <h2>NewsLetter</h2>
                <div id="email-sub">
                    <div id="enter-email">
                        <img src="../IMG/email.png" alt="" width="40px" height="40px" />
                        <input type="email" placeholder="Enter your e-mail" />
                    </div>
                    <div id="emailSubcribe">
                        <div><button>Subscribe to NewsLetter ></button></div>
                    </div>
                </div>
            </div>
            <div id="social-links">
                <h2>Connect us With</h2>
                <div id="social-media-img">
                    <img src="../IMG/facebook.png" alt="" />
                    <img src="../IMG/twitter.png" alt="" />
                    <img src="../IMG/youtube.png" alt="" />
                    <img src="../IMG/pinterest.png" alt="" />
                    <img src="../IMG/instagram.png" alt="" />
                    <img src="../IMG/linkedin.png" alt="" />
                </div>
            </div>
        </div>
        <div id="legal">
            <div>
                <div id="copyrights">
                    Copyright 2020 DreamWedding | All rights reserved
                </div>
                <div id="policies">
                    <ul>
                        <li><a href="">Privacy Policy</a></li>
                        <li><a href="">Terms of use</a></li>
                        <li><a href="">Legal</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <button onclick="topFunction()" id="topBtn" title="Go to top">
        Back to Top
    </button>



</body>

</html>