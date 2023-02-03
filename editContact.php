<?php
$contactID = $_GET['contactID'];
?>
<html>
    <head>
        <script type="text/javascript" src="js/code.js"></script>
        <link rel="stylesheet" type="text/css" href="css/coolStyle-edit.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Barlow+Semi+Condensed:wght@700&display=swap" rel="stylesheet">
        <script src="https://kit.fontawesome.com/6bfbfd351b.js" crossorigin="anonymous"></script>
        <title>Edit Contact</title>
    </head>
    <body>
        <div class="container">
            <header class="return">
                <a href="myContacts.php">
                    <i class="fas fa-arrow-circle-left back-btn"></i>
                </a>
            </header>
            <section class="contact-info">
              
                <div class="info-line">
                    <i class="fas fa-regular fa-face-smile icon-gradient"></i>   
                    <input type="text" id="firstName" name="firstName" class="type" placeholder="First Name">
                </div>
                
                <div class="info-line">
                    <i class="fas fa-regular fa-face-smile icon-gradient"></i>   
                    <input type="text" id="lastName" name="lastName" class="type" placeholder="Last Name">
                </div>

                <div class="info-line">
                    <i class="fas fa-envelope icon-gradient"></i>   
                    <input type="email" id="email" name="email" class="type" placeholder="Email">
                </div>

                <div class="info-line">
                    <i class="fas fa-phone icon-gradient"></i>   
                    <input type="text" id="phoneNumber" name="phoneNumber" class="type" placeholder="Phone Number">
                </div>
            </section>

            <section class="button-container">
                    <div class="update-contact">
                        <i class="fas fa-check-circle icon-gradient"></i>
                        <button class="button" onclick="editContact(<?php echo $contactID?>)">Save Contact</button>
                        <span id="contactEditResult"></span>
                    </div>
                </a>
            </section>
        </div>
    </body>
</html>
