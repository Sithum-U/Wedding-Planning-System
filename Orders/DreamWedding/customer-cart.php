<?php require_once('./INC/connection.php'); ?>
<?php
$orderlist = "";

//getting the list of orders
$query = "SELECT * FROM order_table WHERE is_deleted=0 ORDER BY OrderID";
$orders = mysqli_query($connection, $query);

if ($orders) {
    while ($order = mysqli_fetch_assoc($orders)) {
        $orderlist .= "<tr>";
        $orderlist .= "<td>{$order['OrderID']}</td>";
        $orderlist .= "<td>{$order['OrderDate']}</td>";
        $orderlist .= "<td>{$order['PckgName']}</td>";
        $orderlist .= "<td><a href=\"modify-order.php?Order_ID={$order['OrderID']}\">Edit Order </a></td>";
        $orderlist .= "<td><a href=\"delete-order.php?Order_ID={$order['OrderID']}\">Delete Order </a></td>";
        $orderlist .= "</tr>";
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>DreamWedding-Customer Cart</title>
    <link rel="stylesheet" href="./CSS/style.css" />
    <link rel="stylesheet" href="./CSS/main.css" />
    <script src="./JS/javascript.js" defer></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <header>
        <div class="logo">
            <a href="HTML/Home Page.html"><img src="./IMG/logo.png" /></a>
        </div>
        <div id="user-controls">
            <div id="user-icons">
                <div id="cart-link">
                    <a href="#"><img src="./IMG/shopping-cart.png" alt="" /></a>
                </div>
                <div id="profile">
                    <a href="#"><img src="./IMG/user.png" alt="" /> </a>
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

    <main>
        <span><a href="vendor-page.php">
                < Back to vendor </a> </span> <h1>Customer Cart</h1>
                    <table class="masterlist">
                        <tr>
                            <th>Order ID</th>
                            <th>Order date </th>
                            <th>Package Name </th>
                        </tr>
                        <?php echo $orderlist; ?>
                    </table>
    </main>
    <br><br><br>
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