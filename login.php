<!DOCTYPE html>
<html>
<head>
    <title>Login Account</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <script type="text/javascript" src="js/sweetalert.min.js"></script>
    <link rel="stylesheet" type="text/css" href="css/log.css">
    
</head>
<body>
    <div id="BG"><!--BG Open-->

        <div class="HD"><!--HD open-->
            <div class="Text">
                <p>You are not logged in.</p>
            </div>
        </div><!--HD close-->

        <div>
                <div class="A1" id="container">
                    <div class="pic1">
                        <img src="img/user.jpg">
                    </div>
                    <div class="logs1">
                        <form method="post">

                            <div>
                                <input type="text" placeholder="Enter Username" name="uname" maxlength="16" minlength="6" required/>
                            </div>

                            <div>
                                <input type="Password" placeholder="Enter Password" name="upass" maxlength="16" minlength="6" required />
                            </div>
                            <div class="g-recaptcha" data-sitekey="6LdtTU0qAAAAAGgIqe3GbOdonrOqhBNOa-6Y-YQ2"></div>
                            <div>
                                <button class="Li" type="submit" value="login" name="submit">Login</button> 
                               
                            </div>
                            <span class="psw">If forgot your Password ask your brain </span>
                            <div id="Line">
                            </div>
                            <button class="CA"><a href="contact.php" style="color: #ffffff; text-decoration: none;">Contact</a></button>
                            
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // reCAPTCHA verification
    $recaptcha_secret = "6LdtTU0qAAAAAJYSt3Y91Wl_DxmzGoVWMZM6K1mh";
    $recaptcha_response = $_POST['g-recaptcha-response'];

    $verify_response = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret=' . $recaptcha_secret . '&response=' . $recaptcha_response);
    $response_data = json_decode($verify_response);

    if ($response_data->success) {
        // reCAPTCHA validation successful
        // Process your form data here
?>
        <script>
          // used to create a customized alert message with a success icon
          swal("Form submitted successfully!", {
                icon: "success",
                buttons: false,
              });
            
          </script>
<?php
    } else {
        // reCAPTCHA validation failed
?>
        <script>
          // used to create a customized alert message with a failed icon
          swal("reCAPTCHA verification failed. Please try again.", {
                icon: "error",
                buttons: false,
              });
          </script>
<?php
    }
} else {
    // If not a POST request, redirect to the form page
    exit();
}
?>
                        </form>
                    </div>
                </div>
        </div>
    </div><!--BG clossing-->
</body>
</html>