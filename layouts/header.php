<?php
	session_start();
	require_once('utils/utility.php');
	require_once('db/dbhelper.php');

	$sql = "select * from Category";
	$menuItems = executeResult($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/themify-icons/themify-icons.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans+Condensed:wght@700&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@900&display=swap" rel="stylesheet">
    <link rel="shortcut icon" href="./assets/image/logo3.png">
    <!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <!-- Popper JS -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <link rel="stylesheet" href="./assets/css/style.css">
    <title>NOVEMBER</title>
</head>
<body>
    <div id="header">
        <ul id="nav">
            <li><a href="index.php">HOME</a></li>       
            <li>
                <a href="allProduct.php">ALL-PRODUCT<i style="margin-left: 5px;" class="nav-down ti-angle-down"></i></a>
                <ul class="menu-list">
                    <?php
                        foreach($menuItems as $item) {
                            echo'<li><a href="category.php?id='.$item['id'].'">'.$item['name'].'</a></li>';
                        }
                    ?>
                </ul>
            </li>
            <li><a href="contact.php">CONTACT</a></li>
        </ul>
    </div>

    <!-- Dùng chung -->
    <!-- CSS dùng cho mục ADD TO CART -->
    <style type="text/css">
        .menu-list{
            position: absolute;
            background: #222;
            list-style: none;
            opacity: 0.9;
            min-width: 180px;
            top: 100%;
            left: 0px;
        }
        #nav > li:hover,
        .menu-list > li:hover{
            background: #ddd;
        }
        .menu-list{
            display: none;
        }
        #nav > li:hover .menu-list{
            display: block;
        }
        .btn-success{
            width: 70%;
            padding: 15px 30px;
            margin-top: 20px;
            background: #cfbb99;
            outline: none;
            border: none;
            cursor: pointer;
            font-family: 'Roboto', sans-serif;
            font-size: 15px;
        }
        .btn-success:hover{
            opacity: 0.8;
        }
    </style>

    <!-- JS dùng chung: thêm vào giỏ hàng  -->
    <script type="text/javascript">
	function addCart(productId, num) {
		$.post('api/ajax_request.php', {
			'action': 'cart',
			'id': productId,
			'num': num,
		}, function(data) {
			location.reload()
		})
	}
</script>
    