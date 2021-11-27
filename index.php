<?php
// check if user coming from form request
if (isset($_REQUEST['submit'])) {
  $username = filter_var($_REQUEST['username'], FILTER_SANITIZE_STRING);
  $email = filter_var($_REQUEST['email'], FILTER_SANITIZE_EMAIL);
  $phone = filter_var($_REQUEST['phone'], FILTER_SANITIZE_NUMBER_INT);
  $message = filter_var($_REQUEST['message'], FILTER_SANITIZE_STRING);

  $errors = array();
  //username
  if (strlen($username) <= 3) :
    $errors[] = 'username must be larger than <strong>3 characters</strong> ';
  endif;

  //email
  if (strlen($email) == 0) {
    $errors[] = 'email can\'t be <strong>empty</strong>';
  }

  //phone
  if (strlen($_REQUEST['phone']) == 0) {
    $errors[] = 'cell phone can\'t be <strong>empty</strong>';
  } else if (!filter_var($_REQUEST['phone'], FILTER_VALIDATE_INT)) {
    $errors[] = 'cell phone can\'t contain <strong>any character</strong>';
  }

  //message
  if (strlen($message) <= 10) :
    $errors[] = 'message must be larget than <strong>10 characters</strong> ';
  endif;
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Contact Form</title>
  <!-- Google Fonts  -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;500;700;800&display=swap" rel="stylesheet">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css">
  <!-- main.css  -->
  <link rel="stylesheet" href="css/contact.css">
</head>

<body>
  <!-- ================================ -->
  <!-- start contact us -->
  <!-- ================================ -->
  <div class="contact">
    <h1>Contact Us</h1>
    <?php if (!empty($errors)) { ?>
      <div class="errors alert" role="alert">
        <?php
        foreach ($errors as $error) {
          echo $error . '<br>';
        }
        ?>
      </div>
    <?php
    }
    ?>
    <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST">
      <label for="inputName">Your name</label>
      <div class="input-parent name-parent">
        <span>@</span>
        <input type="text" id="inputName" name="username" placeholder="Username" value="<?php echo (!empty($errors)) ? $username : ""; ?>">
      </div>
      <div class="alert nameError">
        username must be larger than <strong> &#160; 3 characters &#160;</strong>
      </div>
      <div class="input-parent email-parent">
        <i class="fas fa-envelope email-icon"></i>
        <input type="email" name="email" id="emailInput" placeholder="Enter email" value="<?php echo (!empty($errors)) ? $email : ""; ?>">
      </div>
      <div class="alert emailError">
        Please Enter <strong> &#160; Valid &#160;</strong> Email Address
      </div>
      <div class="input-parent phone-parent">
        <i class="fas fa-phone phone-icon"></i>
        <input type="text" name="phone" id="phoneInput" placeholder="Type Your Cell Phone" value="<?php echo (!empty($errors)) ? $phone : ""; ?>">
      </div>
      <div class="alert phoneError">
        Input Can't Contain <strong> &#160; Any Character &#160;</strong>
      </div>
      <div class="message-parent">
        <textarea id="messageInput" name="message" placeholder="Your Message!" value="<?php echo (!empty($errors)) ? $message : ""; ?>"></textarea>
      </div>
      <div class="alert messageError">
        message must be larget than <strong> &#160; 10 characters &#160;</strong>
      </div>
      <div class="submit">
        <i class="fas fa-paper-plane send"></i>
        <input type="submit" value="send message" name="submit">
      </div>
    </form>
  </div>
  <!-- ================================ -->
  <!-- end contact us -->
  <!-- ================================ -->
  <script src="js/main.js"></script>
</body>

</html>