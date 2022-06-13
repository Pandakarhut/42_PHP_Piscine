<?php
    include "utils/utils.php";
    session_start();

?>

<html>
	<head>
		<title>The item store</title>
        <link rel="stylesheet" href="style.css" type="text/css" />
        <style type="text/css">
        <?php include "style.css"?>
        </style>

	</head>
	<body>
		<div class="container">
			<div class="header">
				<div class="basket">
                    <a class="basket" href="/store/index.php?page=cart"><?php include 'utils/basket_info.php'?></a>
				</div>
				<div class="login-container">
                    <?php
                    if ($_SESSION['loggued_on_user'])
                        include "sections/loggedin.php";
                    else
                        include "sections/login.php";
                    ?>
                </div>
			</div>
            <div class="main">
                <div class="leftNav">
                    <?php
                        include 'sections/categories.php';
                        if (is_admin())
                            include 'sections/admin.php';
                    ?>
                </div>
                <div class="content">
                    <?php
                    //Depending on page or error query parameter we show stuff here
                        switch ($_GET['page']) {
                        case 'error': include "pages/error.php"; break;
                        case 'welcome': include "pages/welcome.php"; break;
                        case 'admincategories': include "adminpages/categories.php"; break;
                        case 'adminproducts': include "adminpages/products.php"; break;
                        case 'adminusers': include "adminpages/users.php"; break;
                        case 'adminorders': include "adminpages/orders.php"; break;
                        case 'category': include "pages/category.php"; break;
                        case 'cart': include "pages/cart.php"; break;
                        case 'ordercomplete': include "pages/order_complete.php"; break;
                        case 'orders': include "pages/orders.php"; break;
                        case 'profile': include "pages/profile.php"; break;
                        case 'change_password': include "pages/modif.php"; break;
                        case 'delete_account': include "pages/delete_user.php"; break;
                        default: include "pages/welcome.php"; break;
                    }
                    ?>
                </div>
            </div>
		</div>
	</body>
</html>


