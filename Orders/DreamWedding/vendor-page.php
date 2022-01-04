<?php require_once('./INC/connection.php'); ?>
<?php
$errors = array();

$CusName = "";
$OrderDate = "";
$PckgName = "";
$OrderRemarks = "";

if (isset($_POST['submit'])) {
    $CusName = "$_POST[CusName]";
    $OrderDate = "$_POST[OrderDate]";
    $PckgName = "$_POST[PckgName]";
    $OrderRemarks = "$_POST[OrderRemarks]";

    //checking name entered
    if (empty(trim($_POST['CusName']))) {
        $errors[] = "Name is required";
    }

    //checking length
    $max_len_fields = array('CusName' => 100, 'OrderRemarks' => 300);

    foreach ($max_len_fields as $field => $max_len) {
        if (strlen(trim($_POST[$field])) > $max_len) {
            $errors[] = 'Please a enter a name less than ' . $max_len . ' characters';
        }
    }

    //checking whether there is a same package order for same day
    $query = "SELECT * FROM order_table WHERE OrderDate = '{$_POST['OrderDate']}' AND PckgName = '{$_POST['PckgName']}' LIMIT 1 ";

    $result_set = mysqli_query($connection, $query);
    if ($result_set) {
        if (mysqli_num_rows($result_set) == 1) {
            $errors[] = "Package is not availabe for the selected date.Please select another package or a date";
        }
    }

    if (empty($errors)) {
        //no errors found
        $CusName = mysqli_real_escape_string($connection, $_POST['CusName']);
        $OrderRemarks = mysqli_real_escape_string($connection, $_POST['OrderRemarks']);

        $query = "INSERT INTO order_table ( ";
        $query .= "CusName, OrderDate, PckgName, OrderRemarks, Is_deleted";
        $query .= ") VALUES (";
        $query .= "'{$CusName}', '{$OrderDate}', '{$PckgName}', '{$OrderRemarks}', 0 ";
        $query .= ")";

        $result = mysqli_query($connection, $query);

        if ($result) {
            //query success
            header('Location: customer-cart.php?Order_placed=true');
        } else {
            $errors[] = 'Failed to place the order';
        }
    }
}
?>
<!DOCTYPE html>

<head>
    <title>DreamWedding-Vendor_1_Page</title>
    <link rel="stylesheet" href="./CSS/style.css">
    <script src="./JS/javascript.js" defer> </script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <header>
        <div class="logo">
            <a href="HTML/Home Page.html"><img src="./IMG/logo.png" alt="logo"></a>
        </div>
        <div id="user-controls">
            <div id="user-icons">
                <div id="cart-link">
                    <a href="customer-cart.php"><img src="./IMG/shopping-cart.png"></a>
                </div>
                <div id="profile">
                    <a href="#"><img src="./IMG/user.png"> </a>
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
        <a href="HTML/Home Page.html">Home</a>
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
        <a href="vendor-page.php">Vendors</a>
        <a href="#">NewsLetter</a>
        <a href="#">About Us</a>
        <a href="#">Contact Us</a>
    </div>
    <span class="vendorname">Vendor Name</span>
    <span class="fa fa-star checked"></span>
    <span class="fa fa-star checked"></span>
    <span class="fa fa-star checked"></span>
    <span class="fa fa-star checked"></span>
    <span class="fa fa-star"></span>
    <a href="#">
        <text id="review_detials">4.1 average based on 254 reviews.</text>
    </a>
    <hr style="border:3px solid #f1f1f1">

    <div class="parallaxvendor"></div>

    <div class="about vendor">
        <h2 class="package-h">About Vendor</h2>
        <p class="aboutvendor_p">Photography is the art, application and practice of creating durable images by recording light, either electronically by
            means of an image sensor, or chemically by means of a light-sensitive material such as photographic film. It is employed
            in many fields of science, manufacturing (e.g., photolithography), and business, as well as its more direct uses for
            art, film and video production, recreational purposes, hobby, and mass communication.<br>

            Typically, a lens is used to focus the light reflected or emitted from objects into a real image on the light-sensitive
            surface inside a camera during a timed exposure. With an electronic image sensor, this produces an electrical charge at
            each pixel, which is electronically processed and stored in a digital image file for subsequent display or processing.
            The result with photographic emulsion is an invisible latent image, which is later chemically "developed" into a visible
            image, either negative or positive depending on the purpose of the photographic material and the method of processing. A
            negative image on film is traditionally used to photographically create a positive image on a paper base, known as a
            print, either by using an enlarger or by contact printing.</p>
    </div>
    <div class="row">
        <div class="column">
            <img src="./IMG/1.jpg" alt="" style="width:100%;height: 500px;">
        </div>
        <div class="column">
            <img src="./IMG/2.jpg" alt="" style="width:100%;height: 500px;">
        </div>
        <div class="column">
            <img src="./IMG/3.jpg" alt="" style="width:100%;height: 500px;">
        </div>
    </div>
    <div class="row">
        <div class="column">
            <img src="./IMG/4.jpg" alt="" style="width:100%;height: 500px;">
        </div>
        <div class="column">
            <img src="./IMG/5.jpg" alt="" style="width:100%;height: 500px;">
        </div>
        <div class="column">
            <img src="./IMG/6.jpg" alt="" style="width:100%;height: 500px;">
        </div>
    </div>

    <hr style="border:3px solid #f1f1f1;">
    <h2 class="package-h">Packages</h2>
    <div class="columns">
        <ul class="price">
            <li class="header">Basic</li>
            <li class="grey">LKR 125,000 </li>
            <li>Full day coverage</li>
            <li>10 page album book</li>
            <li>Couple photo frame</li>
            <li>Soft copies will be given</li>
        </ul>
    </div>

    <div class="columns">
        <ul class="price">
            <li class="header">Pro</li>
            <li class="grey">LKR 175,000</li>
            <li>Full day coverage</li>
            <li>50 page album book</li>
            <li>Couple photo frame</li>
            <li>Soft copies will be given</li>
        </ul>
    </div>

    <div class="columns">
        <ul class="price">
            <li class="header">Premium</li>
            <li class="grey">LKR 200,000</li>
            <li>Full day coverage</li>
            <li>100 page album book</li>
            <li>Couple photo frame</li>
            <li>Soft copies will be given</li>
        </ul>
    </div>
    <hr style="border:3px solid #f1f1f1">

    <div class="containerorderform">
        <h1> Place Order</h1>
        <?php

        if (!empty($errors)) {
            echo '<div class ="errmsg">';
            echo "<b>There were errors in your form</b> <br>";
            foreach ($errors as $error) {
                echo $error . '<br>';
            }
            echo '</div>';
        }

        ?>
        <form action="vendor-page.php" id="orderform" method="POST">
            <p>
                <br><br>
                <label for="fname">Your Name</label>
                <input type="text" id="fname" name="CusName" placeholder="Your first name.." <?php echo 'value= "' . $CusName . '"' ?>>
            </p>

            <p>
                <label for="package">Choose a Package:</label>
                <select id="packages" name="PckgName" form="orderform" required>
                    <option disabled selected value> -- select an option -- </option>
                    <option value="Basic">Basic</option>
                    <option value="Pro">Pro</option>
                    <option value="Premium">Premium</option>
                </select>
            </p>

            <p>
                <label for="Date">Wedding Date</label>
                <input type="Date" id="Weddingdate" name="OrderDate" required> <br><br>
            </p>

            <p>
                <label for="Remarks">Remarks (optional) </label>
                <textarea id="Remarks" name="OrderRemarks" placeholder="Message to vendor.."></textarea>
            </p>
            <input type="submit" name="submit" value="Place order">
        </form>
    </div>

    <hr style="border:3px solid #f1f1f1;background-color:black;">

    <h2 class="package-h">Feedbacks by customers</h2>
    <div class="container">
        <img src="./IMG/user.png" alt="Avatar">
        <span style="font-size: 20px;margin: 0px 10px 0px 0px;">Customer 1</span>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star"></span>
        <p>Reviews Reviews Reviews Reviews Reviews Reviews Reviews Reviews Reviews Reviews Reviews Reviews</p>
        <span class="time-right">29-20-2020</span>
    </div>

    <div class="container darker">
        <img src="./IMG/user.png" alt="Avatar">
        <span style="font-size: 20px;margin: 0px 10px 0px 0px;">Customer 2</span>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star "></span>
        <span class="fa fa-star"></span>
        <p>Reviews Reviews Reviews Reviews Reviews Reviews Reviews Reviews Reviews Reviews Reviews Reviews</p>
        <span class="time-right">29-20-2020</span>
    </div>

    <div class="container">
        <img src="./IMG/user.png" alt="Avatar">
        <span style="font-size: 20px;margin: 0px 10px 0px 0px;">Customer 3</span>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
        <p>Reviews Reviews Reviews Reviews Reviews Reviews Reviews Reviews Reviews Reviews Reviews Reviews</p>
        <span class="time-right">29-20-2020</span>
    </div>

    <div class="container darker">
        <img src="./IMG/user.png" alt="Avatar">
        <span style="font-size: 20px;margin: 0px 10px 0px 0px;">Customer 4</span>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star "></span>
        <span class="fa fa-star"></span>
        <p>Reviews Reviews Reviews Reviews Reviews Reviews Reviews Reviews Reviews Reviews Reviews Reviews</p>
        <span class="time-right">29-20-2020</span>
    </div>
    </div>
    <hr style="border:3px solid #f1f1f1;background-color:black;">

    <div class="footer">
        <div id="site-map">
            <div class="columnleftfooter vertical-menu">
                <h2>DreamWedding</h2>
                <a href="HTML/Home Page.html" class="active">Home</a>
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
                <a href="vendor-page.php">Vendors</a>
                <a href="#">NewsLetter</a>
                <a href="#">About Us</a>
                <a href="#">Contact Us</a>
            </div>
            <div id="newsletter">
                <h2>NewsLetter</h2>
                <div id="email-sub">
                    <div id="enter-email">
                        <img src="./IMG/email.png" alt="" />
                        <input type="email" placeholder="Enter your e-mail" required />
                    </div>
                    <div>
                        <button>Subscribe to NewsLetter ></button>
                    </div>
                </div>
            </div>
            <div id="social-links">
                <h2>Connect us With</h2>
                <div id="social-media-img">
                    <img src="./IMG/facebook.png" alt="" />
                    <img src="./IMG/twitter.png" alt="" />
                    <img src="./IMG/youtube.png" alt="" />
                    <img src="./IMG/pinterest.png" alt="" />
                    <img src="./IMG/instagram.png" alt="" />
                    <img src="./IMG/linkedin.png" alt="" />
                </div>
            </div>
        </div>
        <div id="legal">
            <div>
                <div id="copyrights">
                    Copyright 2020
                    <a href="#">DreamWedding</a>
                    | All rights reserved
                </div>
                <div id="policies">
                    <ul>
                        <li><a href="#">Privacy Policy</a></li>
                        <li><a href="#">Terms of use</a></li>
                        <li><a href="#">Legal</a></li>
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
<?php mysqli_close($connection); ?>