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

    <!-- Content -->
    <div id="content">
        <!-- Product  -->
        <div id="product">
            <h2 class="title-product" style="padding-top: 65px;">Featured products</h2>
            <div class="product-list">
                <?php
                    foreach ($lastestItems as $item) {
                        echo'<div class="product-list-item">
                            <a href="detail.php?id='.$item['id'].'" style=" text-decoration: none; color: black;">
                                <img src="'.$item['thumbnail'].'" alt="" class="product-img">
                                <p class="">'.$item['category_name'].'</p>
                                <p class="name-items">'.$item['title'].'</p>                        
                                <p class="price-items">'.number_format($item['discount']).'VND</p>
                            </a>
                                <p>
                                    <button class="btn-success" style="width:100%;" onclick="addCart('.$item['id'].', 1)">
                                    <i class="ti-shopping-cart" style="padding-right: 5px"></i>ADD TO CART
                                    </button>
                                </p>
                        </div>';
                    }
                ?>
            </div>
        </div>
        <hr>
    <?php
        require_once('layouts/footer.php');
    ?>
    