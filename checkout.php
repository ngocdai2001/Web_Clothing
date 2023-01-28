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
        .pay-group{
            padding: initial;
            margin-bottom: 30px;
        }
        .info-group{
            width: 45%;
            margin-left: 15px;
        }
        .info-bill{
            width: 55%;
            margin-right: 15px;
        }
        .form-group{
            margin-bottom: 15px;
        }
        .form-info{
            /* width: 60%; */
            width: 80%;
            padding: 10px 10px;
            font-size: 13px;
            font-family: 'Roboto', sans-serif;
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

    <!-- Content -->
    <div id="content">
        <!-- Product  -->
        <div id="product">
            <h2 class="title-product" style="padding-top: 65px; margin: 30px 0px; font-size: 25px; color: #cfbb99;">CHECK OUT</h2> 
            <form method="post" onsubmit="return completeCheckout();">       
                <div class="wrapper-info pay-group">
                    <div class="photo info-group">
                        <div class="form-group">
                            <input required="true" type="text" class="form-info" id="fullname" name="fullname" placeholder="FULL NAME">
                        </div>
                        <div class="form-group">
                            <input required="true" type="email" class="form-info" id="email" name="email" placeholder="EMAIL">
                        </div>
                        <div class="form-group">
                            <input required="true" type="tel" class="form-info" id="phone" name="phone" placeholder="PHONE NUMBER">
                        </div>
                        <div class="form-group">
                            <input required="true" type="text" class="form-info" id="address" name="address" placeholder="ADDRESS">
                        </div>
                        <div class="form-group">
                            <textarea rows="4" type="text" class="form-info" id="note" name="note" placeholder="NOTE" ></textarea>
                        </div>
                    </div>

                    <div class="intro info-bill">
                        <div class="product-list">
                            <table border = "1" class="form-table" style="width: 100%; border: none; font-family:Arial, Helvetica, sans-serif">
                                <tr>
                                    <th>STT</th>
                                    <th>PRODUCT</th>
                                    <th>PRICE</th>
                                    <th>QUANTITY</th>
                                    <th>TOTAL</th>
                                </tr>
                            <?php
                                if(!isset($_SESSION['cart'])) {
                                    $_SESSION['cart'] = [];
                                }
                                $index = 0;
                                foreach($_SESSION['cart'] as $item) {
                                    echo '<tr style="text-align: center;">
                                            <td>'.(++$index).'</td>
                                            <td>'.$item['title'].'</td>
                                            <td>'.number_format($item['discount']).' VND</td>
                                            <td>'.$item['num'].'</td>
                                            <td>'.number_format($item['discount'] * $item['num']).' VND</td>
                                        </tr>';
                                }
                            ?>                   
                            </table>
                            <a href="checkout.php">
                                <button class="btn-success" style="width:100%; margin: 30px 0px; background: black; color: #cfbb99">
                                <i class="ti-check" style="padding-right: 5px"></i>PAY
                                </button>
                            </a>
                        </div>
                    </div>     
                </div>
            </form> 

            <script type="text/javascript">
                function completeCheckout() {
                    $.post('api/ajax_request.php', {
                        'action': 'checkout',
                        'fullname': $('[name=fullname]').val(),
                        'email': $('[name=email]').val(),
                        'phone': $('[name=phone]').val(),
                        'address': $('[name=address]').val(),
                        'note': $('[name=note]').val(),
                    }, function() {
                        window.open('complete.php', '_self');
                    })

                    return false;
                }
            </script>
            <hr>
        </div>
    <?php
        require_once('layouts/footer.php');
    ?>
    