<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="author" content="Yinka Enoch Adedokun">
  <meta name="description" content="Simple Forgot Password Page Using HTML and CSS">
  <meta name="keywords" content="forgot password page, basic html and css">
  <title>Forgot Password</title>
  <link rel="stylesheet" href="./css/forgot.css">
</head>

<body>
  <div class="row">
    <h1>Forgot Password</h1>
    <h6 class="information-text">Enter your registered email to reset your password.</h6>
    <div class="form-group">
      <input type="email" name="user_email" id="user_email">
      <p><label for="username">Email</label></p>
      <button onclick="showSpinner()">Reset Password</button>
    </div>
    <div class="footer">
      <h5>New here? <a href="./chackup.php">Sign Up.</a></h5>
      <h5>Already have an account? <a href="./login.php">Sign In.</a></h5>
      <p class="information-text"><span class="symbols" title="Lots of love from me to YOU!">&hearts; </span><a href="https://fonclick.com/furkan" target="_blank" title="Connect with me on Facebook">fonclick</a></p>
    </div>
  </div>
</body>