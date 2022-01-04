<?php require_once('./INC/connection.php'); ?>
<?php
$errors = array();

$OrderID = "";
$CusName = "";
$OrderDate = "";
$PckgName = "";
$OrderRemarks = "";

if (isset($_GET['Order_ID'])) {
    //getting order information
    $OrderID = mysqli_real_escape_string($connection, $_GET['Order_ID']);
    $query = "SELECT * FROM order_table WHERE OrderId = {$OrderID} LIMIT 1";

    $result_set = mysqli_query($connection, $query);

    if ($result_set) {
        if (mysqli_num_rows($result_set) == 1) {
            //order found
            $result = mysqli_fetch_assoc($result_set);
            $CusName = $result['CusName'];
            $OrderDate = $result['OrderDate'];
            $PckgName = $result['PckgName'];
            $OrderRemarks = $result['OrderRemarks'];
        } else {
            //order not found
            header('Location: customer-cart.php?err=order_not_found');
        }
    } else {
        //query unsuccesful 
        header('Location: customer-cart.php?err=query_failed');
    }
}

//validation
if (isset($_POST['submit'])) {
    $OrderID = "$_POST[OrderID]";
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
    $query = "SELECT * FROM order_table WHERE OrderDate = '{$OrderDate}' AND PckgName = '{$PckgName}' AND OrderID != '{$OrderID}' LIMIT 1 ";

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

        $query = "UPDATE order_table SET ";
        $query .= "CusName = '{$CusName}',";
        $query .= "OrderDate = '{$OrderDate}',";
        $query .= "PckgName = '{$PckgName}',";
        $query .= "OrderRemarks = '{$OrderRemarks}'";
        $query .= "WHERE OrderID = {$OrderID} LIMIT 1 ";

        $result = mysqli_query($connection, $query);

        if ($result) {
            //query success
            header('Location: customer-cart.php?Order_updated=true');
        } else {
            //query failed
            $errors[] = 'Failed to update the order';
        }
    }
}
?>
<!DOCTYPE html>

<head>
    <title>DreamWedding-Modify Order</title>
    <link rel="stylesheet" href="./CSS/style.css" />
    <script src="./JS/javascript.js" defer></script>
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
    <hr style="border:3px solid #f1f1f1">

    <span><a href="customer-cart.php">
            < Back to cart </a> </span> <div class="containerorderform">
                <h1> Update Order</h1>
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
                <form action="modify-order.php" id="orderform" method="POST">
                    <input type="hidden" name="OrderID" value="<?php echo $OrderID; ?>">

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
                        <input type="text" name="OrderDate" value="<?php echo $OrderDate; ?>"> </p>

                    <p>
                        <label for="Remarks">Remarks (optional) </label>
                        <textarea id="Remarks" name="OrderRemarks" placeholder="Message to vendor.."></textarea>
                    </p>
                    <input type="submit" name="submit" value="Update Order">

                </form>
                <hr style="border:3px solid #f1f1f1">
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
                </div>

</body>

</html>
<?php mysqli_close($connection); ?>