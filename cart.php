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
        .btn-danger{

        }
    </style>

    <!-- Content -->
    <div id="content">
        <!-- Product  -->
        <div id="product">
            <h2 class="title-product" style="padding-top: 65px; margin: 30px 0px; font-size: 25px; color: #cfbb99;">CART</h2>
            <div class="product-list">
                <table border = "1" class="form-table" style="width: 100%; border: none; font-family:Arial, Helvetica, sans-serif">
                    <tr>
                        <th>STT</th>
                        <th>PHOTO</th>
                        <th>PRODUCT</th>
                        <th>PRICE</th>
                        <th>QUANTITY</th>
                        <th>TOTAL</th>
                        <!-- <th></th> -->
                    </tr>

<?php
    if(!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
    }
    $index = 0;
    foreach($_SESSION['cart'] as $item) {
        echo '<tr style="text-align: center;">
                <td>'.(++$index).'</td>
                <td><img src="'.$item['thumbnail'].'" style="height: 80px" alt=""></td>
                <td>'.$item['title'].'</td>
                <td>'.number_format($item['discount']).' VND</td>
                <td>
                    <button class="btn-edit" onclick="addMoreCart('.$item['id'].', -1)" >-</button>
                    <input type="number" value="'.$item['num'].'"  class="form-control" 
                    onchange="fixCartNum('.$item['id'].')"  id="num_'.$item['id'].'">
                    <button class="btn-edit" onclick="addMoreCart('.$item['id'].', 1)" >+</button>  
                </td>
                <td>'.number_format($item['discount'] * $item['num']).' VND</td>
            </tr>';
    }
?>
                </table>
                <a href="checkout.php"><button class="btn-success" style="width:100%; margin-bottom: 30px">CONTINUE TO PAY</button></a>
            </div>
        </div>
        <hr>
        <script type="text/javascript">

            function addMoreCart(id, delta) {
                num = parseInt($('#num_' + id).val())
                num += delta;
                $('#num_' + id).val(num)

                updateCart(id, num)
            }

            function fixCartNum(id) {
                $('#num_' + id).val(Math.abs($('#num_' + id).val()))

                updateCart(id, $('#num_' + id).val())
            }

            function updateCart(productId, num){
                $.post('api/ajax_request.php', {
                    'action': 'update_cart',
                    'id': productId,
                    'num': num
                }, function(data) {
                    location.reload()
                })
            }
        </script>
    <?php
        require_once('layouts/footer.php');
    ?>
    