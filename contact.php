    <?php
        require_once('layouts/header.php');

        if(!empty($_POST)) {
            $firstname = getPost('firstname');
            $lastname = getPost('lastname');
            $email = getPost('email');
            $phone = getPost('phone');
            $subject_name = getPost('subject_name');
            $note = getPost('note');
            $created_at = $updated_at= date('Y-m-d H:i:s');

            $sql = "insert into feedback(firstname, lastname, email, phone, subject_name, note, created_at, updated_at, status)
            values('$firstname', '$lastname', '$email', '$phone', '$subject_name', '$note', '$created_at', '$updated_at', 0)";
            execute($sql);
        }
        
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
            <h2 class="title-product" style="padding-top: 65px; margin: 30px 0px; font-size: 25px; color: #cfbb99;">CONTACT</h2> 
            <form method="post">       
                <div class="wrapper-info pay-group">
                    <div class="photo info-group">
                        <div class="form-group">
                            <input required="true" type="text" class="form-info" id="firstname" name="firstname" placeholder="FIRST NAME">
                        </div>
                        <div class="form-group">
                            <input required="true" type="text" class="form-info" id="lastname" name="lastname" placeholder="LAST NAME">
                        </div>
                        <div class="form-group">
                            <input required="true" type="email" class="form-info" id="email" name="email" placeholder="EMAIL">
                        </div>
                        <div class="form-group">
                            <input required="true" type="tel" class="form-info" id="phone" name="phone" placeholder="PHONE NUMBER">
                        </div>
                        <div class="form-group">
                            <input required="true" type="text" class="form-info" id="subject_name" name="subject_name" placeholder="THEME">
                        </div>
                        <div class="form-group">
                            <textarea rows="4" type="text" class="form-info" id="note" name="note" placeholder="NOTE" ></textarea>
                        </div>
                        <a href="checkout.php">
                            <button class="btn-success" style="width:80%; margin: 15px 0px 30px; background: black; color: #cfbb99">
                            <i class="ti-check" style="padding-right: 5px"></i>SEND FEEDBACK
                            </button>
                        </a>
                    </div>

                    <div class="intro info-bill">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3725.205126981879!2d105.79677105288431!3d20.984412991016903!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.
                        1!3m3!1m2!1s0x3135acc6c44959d5%3A0xd7edcdb815622dd1!2zNTQgUGjhu5EgVHJp4buBdSBLaMO6YywgVGhhbmggWHXDom4gTmFtLCBUaGFuaCBYdcOibiwgSMOgIE7hu5lpLCBWaeG7h3QgTmFt!5e0!3m2!1svi!2s!4v1636769762506!5m2!1svi!2s" 
                        width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                    </div>     
                </div>
            </form> 
            <hr>
        </div>
    <?php
        require_once('layouts/footer.php');
    ?>
    