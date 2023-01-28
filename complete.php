<?php
        require_once('layouts/header.php');

        $category_id = getGet('id');

        if($category_id == null || $category_id == '') {
            $sql = "select Product.*, Category.name as category_name from Product left join Category on
            Product.category_id = Category.id
            order by Product.updated_at desc limit 0,12 ";
        }else {
            $sql = "select Product.*, Category.name as category_name from Product left join Category on
            Product.category_id = Category.id where Product.category_id = $category_id
            order by Product.updated_at desc limit 0,12 ";
        }
	    $lastestItems = executeResult($sql);
    ?>

    <style type="text/css">
        #product{
            margin: 60px 0px;
            text-align: center;
            padding: 50px 38px 0px;
        }
        .complete-form{
            font-family: 'Roboto', sans-serif;
            color: #cfbb99;
            padding: 20px 0px 40px;
        }
    </style>

    <!-- Content -->
    <div id="content">
        <!-- Product  -->
        <div id="product">
            <h1 class="complete-form">ORDER SUCCESS!</h1>
            <a href="index.php"><button class="btn-success" style="width:22%; margin-bottom: 30px; background: black; color: #cfbb99">CONTINUE SHOPPING</button></a>
        </div>
        <hr>
        
    <?php
        require_once('layouts/footer.php');
    ?>
    