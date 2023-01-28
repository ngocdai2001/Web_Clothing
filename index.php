    <?php
        require_once('layouts/header.php');

        $sql = "select Product.*, Category.name as category_name from Product left join Category on
        Product.category_id = Category.id where category.deleted = 0 and Product.deleted = 0
        order by Product.updated_at desc limit 0,6 ";
	    $lastestItems = executeResult($sql);
    ?>

    <!-- CSS phần hình ảnh  -->
    <style type="text/css">
        #slide{
            background: url('./assets/image/man-2425121_1280.jpg') top center / cover no-repeat;
        }
        .trousers{
            background: url('./assets/image/slim-trouser-cotton-poplin-grey-12_1792x627.jpg') top center / cover no-repeat;
        }
        .Jackets{
            background: url('./assets/image/pexels-photo-1303862.jpeg') top center / cover no-repeat;
        }
        #contact{
            background: url('./assets/image/contact1.jpeg') center / cover no-repeat;
        }
    </style>

    <!-- Slide -->
    <div id="slide">
        <div class="text-heading">
            <h3 class="content-slide">
            Style is a way to say who
            you are without costing you a word 
            </h3>
        </div>
    </div>

    <!-- Content -->
    <div id="content">
        <!-- clothing -->
        <div id="clothing">
            <div class="trousers">
                <a href="#">trousers</a>
            </div>
            <div class="Jackets">
                <a href="#">Jackets</a>
            </div>
        </div>        
        <hr>

        <!-- Product  -->
        <div id="product">
            <h2 class="title-product" style="font-size: 25px; color: #cfbb99;">Featured products</h2>
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

        <!-- Info -->
        <div id="info">
            <div class="wrapper-info">
                <div class="intro">
                    <h2 class="title-intro">Made in the Workshop</h2>
                    <p class="content-intro">Shirts and jackets and trousers are cut and sewn in workrooms which do so only for shirts or jackets or trousers. 
                        Knitwear is hand-framed in one or another far-flung corner of an island. 
                        Cloth — often hand-woven — comes from mills very much above, if you will, the run of most mills. 
                        Buckles and toggles and so on are made by old hands in old establishments.
                    </p>
                </div>

                <div class="photo">
                    <img src="./assets/image/info-img1.jpg" alt="" class="info-img">
                </div>
            </div>

            <div class="wrapper-info">
                <div class="photo">
                    <img src="./assets/image/info-img2.jpg" alt="" class="info-img">
                </div>

                <div class="intro">
                    <h2 class="title-intro">Ventile Canvas</h2>
                    <p class="content-intro">Made by the water-haters at Ventile as a luggage-weight variety of their classic weather-proof cotton, 
                        and honed again and again until deemed fit to bear the company hallmark. 
                        Equivalent in heft to 15oz canvas and woven with the same top percentile of extra-long-staple cotton 
                        fibres with which the Ventile name has, since the 1940s, been built.
                    </p>
                </div>     
            </div>
        </div>
        <hr>

        <!-- Video -->
        <div class="showcase">
            <video src="./assets/image/video2.mp4" muted loop autoplay></video>
            <!-- <div class="text-showcase">
                <h3>We always bring you the best experience</h3>
            </div> -->
        </div>
        <hr>

        <!-- Post -->
        <div id="post">
            <div class="list-post">
                <h3 class="title-post">luxury space</h3>
                <div class="content-post">
                    <img src="./assets/image/post1.jpeg" alt="" class="img-post">
                    <p class="main-post">Entering the store, the first thing that your customers will feel is the modern and sophisticated interior space. 
                        They feel more respected, affirm their personal ego, and have their own fashion sense. 
                        The main color tone is a combination of earthy brown and milky white. 
                    </p>
                </div>
            </div>
            <div class="list-post">
                <h3 class="title-post">OUR FIVE PACKING TIPS</h3>
                <div class="content-post">
                    <img src="./assets/image/post2.jpeg" alt="" class="img-post">
                    <p class="main-post">If it is hard to find certain articles of clothing in your bedroom closet each morning, 
                        you probably need to work on your closet organization. 
                        There are a lot of accessible tools and items that will make this task easier, whether it is a major 
                        overhaul or just a simple closet organization project.
                    </p>
                </div>
            </div>
            <div class="list-post">
                <h3 class="title-post">Premium experience </h3>
                <div class="content-post">
                    <img src="./assets/image/post3.jpeg" alt="" class="img-post">
                    <p class="main-post">The fabrics we make products are always carefully selected materials to give customers a 
                        luxurious and best experience. Come to us, everything luxury, luxury is always for you. 
                    </p>
                </div>
            </div>
        </div>

        <!-- Contact -->
        <div id="contact">
            <div class="contact-info">
                <h2 class="title-contact">about</h2>
                <p class="content-contact">Đây là demo môn lập trình WEB của nhóm 6. Nhóm 6 tham khảo mẫu giao diện của trang 
                    <a href="https://themes.shopify.com/">Shopify</a>
                    và hình ảnh của
                    <a href="https://www.pexels.com/vi-vn/">Pexels.</a>
                </p>
                <p class="content-contact">Thành viên nhóm: <br>
                    - Hoàng Ngọc Đại <br>
                    - Phạm Văn Cương <br>
                    - Nguyễn Thanh Hải <br>
                    - Nguyễn Đức Anh Cường <br>
                    - Phạm Ngọc Đại <br>
                </p>
            </div>
        </div>
        <hr>
    <?php
        require_once('layouts/footer.php');
    ?>
    