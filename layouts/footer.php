 
 <!-- CSS cho phần giỏ hàng  -->
<style type="text/css">
    .cart-icon{
        position: fixed;
        top: 40%;
        right: 0px;
        cursor: pointer;
    }
    .cart-icon:hover{
        opacity: 0.8;
    }
    .cart-count{
        padding: 4px 6px;
        background-color: red;
        color: #fff;
        border-radius: 50%;
        font-size: 12px;
        position: fixed;
        margin-left: -12px;
        margin-top: -15px;
    }
    .cart-icon a{
        text-decoration: none; 
    }
    .cart-icon i{
        padding: 8px;
        background-color: #cfbb99;
        border-radius: 50%;
        color: black;
    }
</style>

 <!-- Footer -->
        <div id="footer">
            <div class="main-footer">
                <div class="footer-module col-half">
                    <div class="footer-module-list">
                        <h4>NAVIGATE</h4>
                        <ul>
                            <li><a href="index.php">Home</a></li>
                            <li><a href="allProduct.php">Products</a></li>
                        </ul>
                    </div>
                    <div class="footer-module-list">
                        <h4>SUPPORT</h4>
                        <ul>
                            <li><a href="contact.php">Contact</a></li>
                            <li><a href="#contact">About Us</a></li>
                        </ul>
                    </div>
                </div>
                <div class="footer-module">
                    <h4>ABOUT THE CONTENT</h4>
                    <p class="footer-module-content">Đây là demo môn lập trình WEB của nhóm 6. Nhóm 6 tham khảo mẫu giao diện của trang 
                        <a href="https://themes.shopify.com/">Shopify</a>
                        và hình ảnh của
                        <a href="https://www.pexels.com/vi-vn/">Pexels.</a>
                    </p>
                </div>
                <div class="footer-module">
                    <input type="email" name="" placeholder="your@email.com" required id="" class="form-email">
                    <div class="footer-module-icon">
                        <a href=""><i class="ti-facebook"></i></a>
                        <a href=""><i class="ti-twitter-alt"></i></a>
                        <a href=""><i class="ti-instagram"></i></a>
                        <a href=""><i class="ti-email"></i></a>
                        <a href=""><i class="ti-pinterest"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Thêm vào giỏ hàng -->
    <?php
        if(!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = [];
        }
        $count = 0;
        foreach($_SESSION['cart'] as $item) {
            $count += $item['num'];
        }
    ?>
    <span class="cart-icon">      
        <span class="cart-count"><?=$count?></span>  
        <a href="cart.php"><i class="ti-shopping-cart"></i></a>
    </span>
</body>
</html>
