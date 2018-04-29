<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html>
<head>
<title>Signup Form </title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta charset="utf-8">
<meta name="keywords" content="Haunt Signup Form Responsive, Signup form web template, Sign up Web Templates, Flat Web Templates, Login signup Responsive web template, Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<link href="<?php echo base_url(); ?>css/font-awesome.min.css" rel="stylesheet" type="text/css" media="all">
<link href="<?php echo base_url(); ?>css/style.css" rel="stylesheet" type="text/css" media="all"/>
<link href="//fonts.googleapis.com/css?family=Raleway:400,500,600,700,800,900" rel="stylesheet">
<link href="//fonts.googleapis.com/css?family=Josefin+Sans:400,600,700" rel="stylesheet">
</head>
<body>
<h1></h1>
<div class="container">
<form action="<?php echo base_url(); ?>" method="post">
<h2>SIGN UP </h2>

<div class="w3l_o">
<div class="strip"></div>
</div>
<h2><?php echo (isset($alert) ? $alert :'');?></h2>
<div class="agileinfo">
<input type="text" name="name" placeholder="First Name" required="">
</div>

<div class="agileinfo">
<input type="email" name="email" placeholder="Email" required="">
</div>

<div class="agileinfo">
<input type="text" name="mobile" placeholder="Mobile Number" required="">
</div>

<div class="agileinfo">
<input type="Password" name="password" placeholder="Password" required="">
</div>
<div class="agileinfo">
<input type="password" name="retype" placeholder="Confirm Password" required="">
</div>



<div class="w3l_but">
<input type="submit" name="Submit" value="submit">
</div>
</form>
<div class="wthree_down">
<h3>Already had an Account please Login</h3>
</div>
<div class="w3agile_side">
<div class="main">
    <div class="panel">
        <a href="<?php echo base_url();?>home/login"  id="login_pop">LOGIN</a>
    </div>
</div>
<!-- popup form #1 -->
<a href="#x" class="overlay" id="login_form"></a>
   <div class="popup">
     <h2>Welcome</h2>
     <p>Please enter your Username and Password here</p>
	 <form action="#" method="post">
   <div>
      <input type="text" name="name" placeholder="Username" required="">
   </div>
   <div>

   <input type="password" name="name" placeholder="Password" required="">
   </div>
   <a href="><input type="submit" value="LOGIN" /></a>
   <a class="close" href="#close"></a>
   </form>
</div>
</div>
<div class="clear"></div>
</div>
<div class="footer">
 <p>&copy;  Signup Form  2018. All Rights Reserved | Design by <a href="" target="blank"></a></p>
 </div>
</body>
</html>