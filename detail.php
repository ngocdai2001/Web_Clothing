<?php
        require_once('layouts/header.php');

        $productId = getGet('id');
        $sql = "select Product.*, Category.name as category_name from Product left join Category on
            Product.category_id = Category.id where Product.id = $productId";
        $product = executeResult($sql, true);

        $category_id = $product['category_id'];
        $sql = "select Product.*, Category.name as category_name from Product left join Category on
        Product.category_id = Category.id where Product.category_id = $category_id
        order by Product.updated_at desc limit 0,3   ";

	    $lastestItems = executeResult($sql);
    ?>

    <style type="text/css">
        .title-detail{
            padding-top: 55px;
            margin: 50px 0px -10px;
            text-align: center;
            text-transform: uppercase;
            font-family: 'Roboto', sans-serif;
            font-size: 18px;
        }
        .photo-detail{
            padding: 0px 38px;
            width: 70%;
            text-align: center;
        }
        .info-detail ul{
            list-style: none;
            display:inline-flex;
        }
        .info-detail ul a{
            text-decoration: none; 
            color: black;
            text-transform: uppercase;
            font-family:Arial, Helvetica, sans-serif;
            font-size: 12px;
        }
        .edit{
            margin-top: 20px;
            display: flex;
        }
        .btn-edit{
            padding: 3px 8px;
            font-size: 15px;
            outline: none;
            border: 1px solid #ccc;
            border-radius: 3px;
            cursor: pointer;
            background: #cfbb99;
        }
        .btn-edit:hover{
            opacity: 0.8;
        }
        .form-control{
            padding: 4px 0px;
            width: 15%;
            border: 1px solid #cfbb99;
            border-radius: 3px;
            outline: none;
        }
    </style>

    <h2 class="title-detail" style="font-size: 25px; color: #cfbb99;">PRODUCT DETAILS</h2>
    <div class="wrapper-info detail">
        <div class="photo photo-detail">
            <img src="<?=$product['thumbnail']?>" alt="" class="info-img">
        </div>

        <div class="intro info-detail">
            <ul>
                <li><a href="index.php">HOME</a></li>
                <li><a href="category.php?id=<?=$product['category_id']?>"> / <?=$product['category_name']?></a></li>
                <li><a href=""> / <?=$product['title']?></a></li>
            </ul>
            <h2 style="text-transform: uppercase; font-family: 'Roboto', sans-serif; margin-top: 20px">
                <?=$product['title']?>
            </h2>

            <p style="font-size: 20px; color: red; margin-top: 20px">
                <?=number_format($product['discount'])?>VND
            </p>
            <p style="font-size: 15px; opacity: 0.7; margin-top: 10px; text-decoration: line-through;">
                <?=number_format($product['price'])?>VND
            </p>
            <div class="edit">
                <button class="btn-edit" onclick="addMoreCart(-1)" >-</button>
                <input type="number" name="num" class="form-control" step="1" value="1" onchange="fixCartNum()" >
                <button class="btn-edit" onclick="addMoreCart(1)" >+</button>               
            </div>

            <button class="btn-success" onclick="addCart(<?=$product['id']?>, $('[name=num]').val())">
                <i class="ti-shopping-cart" style="padding-right: 5px"></i> ADD TO CART
            </button>
            <button class="btn-success" style="background: black; color: #cfbb99">
                <i class="ti-search" style="padding-right: 5px;"></i> PRODUCT DETAILS
            </button>
        </div>     
    </div>
    <hr>

    <h2 class="title-product" style="font-size: 25px; color: #cfbb99;">product information</h2>
    <div class="main-post" style="text-align: center; margin: -30px 100px 40px;">
        <?=$product['description']?>
    </div>
    <hr>

    <!-- Content -->
    <div id="content">
        <!-- Product  -->
        <div id="product">
            <h2 class="title-product" style="font-size: 25px; color: #cfbb99;">related products</h2>
            <div class="product-list">
                <?php
                    foreach ($lastestItems as $item) {
                        echo'<div class="product-list-item">
                            <a href="detail.php?id='.$item['id'].'" style=" text-decoration: none; color: black;">
                                <img src="'.$item['thumbnail'].'" alt="" class="product-img">
                                <p class="">'.$item['category_name'].'</p>
                                <p class="name-items">'.$item['title'].'</p>                        
                                <p class="price-items">'.number_format($item['discount']).'VND</p>
                                <p>
                                    <button class="btn-success" style="width:100%;" onclick="addCart('.$item['id'].', 1)">
                                    <i class="ti-shopping-cart" style="padding-right: 5px"></i>ADD TO CART
                                    </button>
                                </p>
                            </a>
                        </div>';
                    }
                ?>
            </div>
        </div>
        <hr>

    <!-- JS dùng thực hiện thêm số lượng sp -->
    <script type="text/javascript">

        function addMoreCart(delta) {
            num = parseInt($('[name=num]').val())
            num += delta;
            if(num < 1) num = 1;
            $('[name=num]').val(num)
        }

        function fixCartNum() {
            $('[name=num]').val(Math.abs($('[name=num]').val()))
        }

    </script>
    <?php
        require_once('layouts/footer.php');
    ?>
    
    