<?php
include("dataconnection.php");
session_start();
if(empty($_SESSION["loginactive"]))
	$_SESSION["loginactive"] = 0;
?>
<!DOCTYPE html>
<html>
<style>
*
{margin:0px;
  padding:0px;
  box-sizing:border-box;
}

nav{display:flex;
	justify-content:space-around;
	align-items:center;
	height:7vh;
	font-family: 'Poppins', sans-serif;
	width:100%;
	background:none;
}

.logo{margin-left:3%;}

.logo img{width:7vh;
		  
}

.nav-link{display:inline-flex;
		  margin-left:2%;
		  justify-content:space-around;
		  width:50%;
		  height:4vh;
		  padding-top:0.5vh;
}

.nav-link a
{
	margin:0 0.2vw;
	color:black;
	text-decoration:none;
	letter-spacing:0.3vh;
	font-weight:bold;
	font-size:1.2vw;
}
  
.nav-link a:hover
{
	color:grey;
	text-decoration:underline;	
}
  
.nav-link ul
{
	top:4vh;
	position:absolute;
	opacity:1;
	visibility:hidden;
}

.nav-link ul li
{
	background-color:white;
	padding:1vh 0 1vh;
	border-top:2px solid black;
	position:relative;
	top:3vh;
	display:list-item;
	width:8vw;
	text-align:center;
}

.nav-link ul li .fas
{	
	float:right;
	position:relative;
	font-size:2vh;
	right:1vw;
	top:0.6vh;
}

.nav-link ul li a
{
	color:black;
}

.nav-link li{list-style:none;
			 width:8vw;
			 text-align:center;
}

.nav-link li .fa-caret-down
{
	display:block;
	text-align:center;
	display:none;
}

.nav-link li:hover > .fa-caret-down
{
	display:block;
}

.nav-link li:hover > ul
{
	opacity:1;
	visibility:visible;
}

.search-bar
{
	width:20vw;
	height:4vh;
	background-color:black;
	display:flex;
	border-radius:1vh;
	margin-left:1.9vw;
}

.search-bar ul
{
	list-style:none;
}

.search-bar input
{
	width:18vw;
	height:100%;
	border:none;
	border-radius:1vh 0 0 1vh;
	outline:none;
	padding:0 1vw;
	background-color:#e6e6e6;
	color:black;
}

::.search-bar placeholder
{
	color:black;
}

.search-bar .icon
{
	background-color:black;
	height:100%;
	width:2vw;
	text-align:center;
	border-radius:0 1vh 1vh 0;
}

.search-bar .icon button:hover
{
	background-color:black;
	cursor:pointer;
}

.search-bar .icon span
{
	position:relative;
	background-color:black;
}

.search-bar .icon span button
{
	background-color:black;
	border:none;
	height:3vh;
	width:1.7vw;
	color:white;
}

@media only screen and (max-width: 1569px)
{
	.search-bar input
	{
		width:17.5vw;
	}
}


@media only screen and (max-width: 1172px)
{
	.search-bar input
	{
		width:17vw;
	}
}

.wishandcart .wishlist
{
	color:black;
	font-size:2.7vh;
	transition:0.5s;
}

.wishandcart .shoppingcart
{
	font-size:2.7vh;
	color:black;
	transition:0.5s;
}

.wishandcart .shoppingcart:hover{font-size:3vh;}
.wishandcart .wishlist:hover{font-size:3vh; color:red;}

.wishandcart
{
	display:flex;
	align-items:center;
	position:relative;
	width:7%;
	margin-left:1vh;
	justify-content:space-around;
}

.account
{
	width:11%;
	display:flex;
	justify-content:center;
	align-items:center;
}

.account .profile
{
	border-radius:50%;
	width:2.5vw;
	height:4.5vh;
	background-color:white;
	margin-left:3vh;
	outline:none;
}

.account .profile-list
{
	position:absolute;
	right:0;
	margin-top:20.5vh;
	z-index:1000;
	background-color:white;
	border:1px solid black;
	width:11vw;
	display:none;
}

.account .profile-list li
{
	list-style:none;
	padding:2vh 0;
	text-align:center;
}

.account .profile-list li a
{
	color:black;
	text-decoration:none;
	font-size:1vw;
}

.account .profile-list li input
{
	background-color:white;
	border:none;
	font-family: 'Poppins', sans-serif;
	font-size:1vw;
}

.account .profile-list li input:hover{cursor:pointer;}

.account .profile-list li:nth-child(1){border-bottom:1px solid black;}

.account a button
{
	width:5vw;
	height:3.5vh;
	font-family: 'Poppins', sans-serif;
	background:none;
	border:none;
	font-weight:bold;
	color:black;
	font-size:0.85vw;
}

.account button:hover
{
	background-color:black;
	color:white;
	cursor:pointer;
}

.account a:nth-child(1){border-right:1px solid black;}
.account .profile-list a:nth-child(1){border:none;}

.login
{
	font-family:sans-serif;
	width:25vw;
	text-align:center;
	position:absolute;
	background: rgba(35, 31, 31,0.75);
}

.login input[type = "text"], .login input[type = "password"]
{
	border:0;
	margin:1.8vh auto;
	background:none;
	text-align:center;
	border:3px solid #3498db;
	padding:14px 10px;
	outline:none;
	color:white;
	border-radius:24px;
	transition:0.25s;
	width:12vw;
	height:5vh;
	font-size:0.7vw;
}

.login input[type = "text"]:focus, .login input[type = "password"]:focus
{
	border-color:#2ecc71;
	width:17vw;
}

.login input[type = "submit"]
{
	border:0;
	margin:1.5vh auto;
	background:none;
	text-align:center;
	border:3px solid #2ecc71;
	outline:none;
	color:white;
	border-radius:24px;
	transition:0.25s;
	cursor:pointer;
	height:5vh;
	width:7.5vw;
	font-size:0.8vw;
}

.login input[type = "submit"]:hover
{
	background:#2ecc71;
}

.login h1
{
	margin:2vh auto;
	color:white;
	text-transform:uppercase;
	font-weight:500;
	font-size:1.75vw;
}

.background
{
	background-image:url("black-background-costume-dark-mode.jpg");
	background-size:cover;
	height:93vh;
	display:flex;
	align-items:center;
	justify-content:center;
}

.login .forgot{margin-top:1vh; display:flex; justify-content:space-between}

.login .forgot a
{
	color:white;
	font-size:1.5vh;
	text-decoration:underline;
	margin:0 2vh 1vh;
	opacity:0.75;
}
</style>
<head>
	<title>Dragon Sport</title>
	<link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="https://fonts.googleapis.com/css2?family=Oswald:wght@600&display=swap" rel="stylesheet">
	<link href="mainpage.css" rel="styleshet">
	<script src="https://kit.fontawesome.com/a076d05399.js"></script>
	<link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@700&display=swap" rel="stylesheet">
	<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
	<script src = "https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" charset = "utf-8"></script>
</head>
<body>
<nav>
		<div class = "logo">
			<img src = "mainpage-item/logo.png">
		</div>
		<ul class = "nav-link">
			<li><a href = "mainpage.php">Home</a></li>
			<li><a href = "product.php">Shop All</a></li>
			<li><a href = "#">Brands</a><i class="fas fa-caret-down"></i>
				<ul>
					<li><a href = "only-adidas.php">Adidas</a></li>
					<li><a href = "only-nike.php">Nike</a></li>
				</ul>
			</li>
			<li><a href = "#">Contact</a></li>
			<li><a href = "#">About Us</a></li>
		</ul>
		<div class = "search-bar">
			<form name = "search-item" action = "product.php" method = "post" value = "">
				<input  type = "search" placeholder = "Search" name = "search-content">
				<label class = "icon">
					<span><button name = "search-btn"><i class="fas fa-search"></i></button></span>
				</label>
			</form>
		<?php
			if(isset($_POST["search-content"]) || isset($_POST["search-btn"]))
			{
				$_SESSION["active"] = 1;
				$_SESSION["content"] = $_POST["search-content"];
		?>
				<script>
					location.href = "product.php";
				</script>
		<?php
			}
		?>
		</div>
		<div class = "wishandcart">
				<a href = "#" class = "wishlist"><i class="far fa-heart"></i>
				<a href = "#" class = "shoppingcart"><i class="fas fa-shopping-cart"></i></a>
		</div>
		<div class = "account">
		<?php
			if($_SESSION["loginactive"] == 0)
			{	
		?>
				<a href = "register.php" id = "register"><button>Sign up</button></a>
				<a href = "login.php" id = "login"><button>Log in</button></a>
		<?php
			}
			else if($_SESSION["loginactive"] == 1)
			{
				echo "Hello, ".$_SESSION["username"];
				echo "<button class = 'profile'><i class='fas fa-user'></i></button>";
		?>
				<div class = "profile-list">
					<form method = "post">
					<ul>
						<li><a href = "user_profile.php">View Profile</a></li>
						<li><input type = "submit" name = "logout-btn" value = "Log out"/></li>
					</ul>
					</form>
				</div>
		<?php
			}
			if(isset($_POST["logout-btn"]))
			{
				$_SESSION["loginactive"] = 0;
				$_SESSION["username"] = "";
		?>
				<script>location.href = "mainpage.php"</script>
		<?php	
			}
		?>
		</div>
	</nav>
<div class = "background">
<div class = "login">
	<form name = "login" method = "post">
		<h1>Login</h1>
		<p><input type = "text" name = "useremail" placeholder = "Email / Username"/></p>
		<p><input type = "password" name = "password" placeholder = "Password"/></p>
		<p><input type = "submit" name = "submit" value = "Login"></p>
		<p class = "forgot">
			<a href = "register.php">Create an account</a>
			<a href = "">Forgot password</a>
		</p>
	</form>
</div>
</div>
<?php 
if(isset($_POST["submit"]))
{
	$loginactive = 0;
	$email = $_POST["useremail"];
	$password = $_POST["password"];
	$result = mysqli_query($connect, "SELECT * FROM user WHERE (user_email = '$email' OR user_name = '$email') and user_password = '$password'");
	$row = mysqli_fetch_assoc($result);
	if(mysqli_num_rows($result) == 0)
	{
?>
		<script>alert("Invalid Email or Password")</script>
<?php	
	}
	else
	{
		$loginactive = 1;
		$_SESSION["username"] = $row["user_name"];
		$_SESSION["userid"] = $row["user_id"];
?>
		<script>
			alert("Login Successful")
			location.href = "mainpage.php?login&id= <?php echo $loginactive ;?>";
		</script>
<?php	
		
	}
}
?>

</body>
<script>
$(document).ready(function()
{	
	$(".account .profile-list input[type = 'submit']").on("click", function()
	{
		return confirm("Are you sure you want to log out??");
	});
	
	$(".account .profile").click(function()
	{
		$(".account .profile-list").fadeToggle();
	});
	
	$(".wishandcart .wishlist").click(function(){
		<?php
		if($_SESSION["loginactive"] == 0)
		{
		?>
			alert("You can't see you wishlist before you log in");
		<?php
		}
		else
		{
		?>
			location.href = "wishlist.php";
		<?php
		}
		?>
	});
});
</script>
</html>