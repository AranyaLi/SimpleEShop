<html>
<head>
<link href="<?php echo base_url();?>application/css/login.css" rel="stylesheet" type="text/css">
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

<script>
function formvalidate() {

  var email = signup.email.value;
  var pwd=signup.password.value;
var pwd_filter = /^[a-zA-Z0-9]{5,15}$/;
  if (!pwd_filter.test(pwd)) {
    alert("Password is 5-15 characters long, character and digit only");
    return false;
  }


  var email_filter = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
  if (!email_filter.test(email)) {

    alert("please enter a valid email");
    return false;
  }
    
  return true;
}
</script>
</head>

<body>
  <form name="signup" onsubmit="formvalidate()" action="<?echo base_url().'index.php/loginController/signup'?>" method="POST">
  <div class="body"></div>
		<div class="grad"></div>
		<div class="header">
			<div>Anya's<span>Selection</span></div>
		</div>
		<br>
		<div class="login">
				<input type="text" placeholder="Email" name="email"><br>
				<input type="password" placeholder="password" name="password"><br>
				<input type="submit" value="Sigu Up!" name="signup_button">
		</div>
</form>
<div class="signup">Already A Member?<a href="<?echo base_url().'index.php/loginController/'?>"> Log In</div>
</body>

</html>
