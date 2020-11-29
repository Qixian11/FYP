<?php 
include("dataconnection.php"); 
session_start(); 
$_SESSION["active"] = 0;
if(empty($_SESSION["loginactive"]))
	$_SESSION["loginactive"] = 0;
$_SESSION["previous_page"] = $_SERVER["PHP_SELF"];
?>
<!DOCTYPE html>
<html>
<style>
@font-face
{
	font-family:sec;
	src:url(product-item/HarmoniaSansProCyr-Cond.ttf);
}

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
	border-bottom:1px solid #CFD3D6;
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

::placeholder
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

.wishandcart .wishcount
{
	position:absolute;
	font-size:0.7vw;
	color:white;
	border:1px solid black;
	border-radius:100%;
	background-color:black;
	height:2vh;
	width:1vw;
	text-align:center;
	left:1.9vw;
	top:0;
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
	outline:none;
}

.account .profile-name
{
	width:8vw;
	text-align:center;
	font-size:0.85vw;
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
	background-color:white;
	border:none;
	font-weight:bold;
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

.wishlist-side
{
	margin-top:3%;
	margin-left:3%;
	margin-right:3%;
	font-family: 'Poppins', sans-serif;
	font-size:2vw;
	text-align:center;
	font-weight:500;
}

.wishlist-side .wish-container
{
	display:flex;
	flex-wrap:wrap;
	justify-content:flex-start;
}

.wishlist-side .wish-container .wish-grid
{
	display:grid;
	width:30vw;
	height:60vh;
	grid-template-rows: 50vh 4vh 6vh;
	margin-left:0.75vw;
	margin-bottom:1.5vh;
}

.wishlist-side .wish-container .wish-grid .product-img
{
	background-color:#efefef;
	justify-content:center;
	align-items:center;
	display:flex;
	position:relative;
}

.wishlist-side .wish-container .wish-grid .product-img img
{
	width:25vw;
}

.wishlist-side .wish-container .wish-grid .product-img .remove-btn
{
	position:absolute;
	right:1vw;
	top:1.5vh;
	border:none;
	outline:none;
	font-size:1.2vw;
	cursor:pointer;
	opacity:0.50;
}

.wishlist-side .wish-container .wish-grid .product-img .remove-btn:hover
{
	opacity:1;
}

.wishlist-side .wish-container .wish-grid .name
{
	font-size:1vw;
	padding-top:1vh;
}

.wishlist-side .wish-container .wish-grid .name #name{float:left;}

.wishlist-side .wish-container .wish-grid .name #price{float:right}

.wishlist-side .wish-container .wish-grid .view-btn
{
}

.wishlist-side .wish-container .wish-grid .view-btn a
{
	float:left;
	text-decoration:none;
	border:1px solid black;
	color:black;
	border-radius:15%;
	font-size:1vw;
	padding:0.5vh;
	margin-top:0.8vh;
}

.wishlist-side .wish-container .wish-grid .view-btn a:hover
{
	opacity:0.5;
	cursor:pointer;
}

.count0
{
	font-size:1.3vw;
	font-weight:lighter;
	margin-top:3vh;
	color:#808080;
}

.recommend
{
	height:60vh;
	margin-left:3%;
	margin-right:3%;
	margin-top:12vh;
}

.recommend p
{
	text-align:center;
	font-size:1.5vw;
	padding:3vh;
	font-size:100;
	font-family: 'Poppins', sans-serif;
}

.recommend .recommend-item
{
	display:flex;
	justify-content:space-between;
	height:49.5vh;
}

.recommend .recommend-item img
{
	width:20vw;
}

.navbottom
{
	background-color:black;
	margin-top:2vh;
	padding:6vh 0 0.5vh;
}

.navbottom .content
{
	width:70%;
	margin:auto;
	display:flex;
	justify-content:space-around
}

.navbottom .content .shoes,.service,.term
{
	width:20%;
	height:100%;
}

.navbottom .content p
{
	font-family: mine;
	letter-spacing:0.1vh;
	font-size:0.9vw;
	color: #CFD3D6;
	text-transform:uppercase;
	font-weight:lighter;
}

.navbottom .content ul{margin-top:1.2vh;}

.navbottom .content li
{
	padding:0.7vh 0 0.7vh;
	list-style:none;
}

.navbottom .content a:hover{color:gold;}

.navbottom .content a
{
	text-decoration:none;
	color:white;
	transition: all 0.2s ease-in;
	font-size:0.85vw;
}

.navbottom .social
{
	width:18%;
	height:4vh;
	display:flex;
	margin:3vh auto 0;
	align-items:center;
}

.navbottom .social p
{
	font-family: mine;
	letter-spacing:0.1vh;
	font-size:0.8vw;
	color: #CFD3D6;
	text-transform:uppercase;
	font-weight:lighter;
}

.navbottom .social .fab
{
	color:white;
	font-size:3vh;
	margin-left:2vw;
	transition:all 0.2s ease-in-out;
}

.navbottom .social .fab:hover
{
	font-size:3.5vh;
	cursor:pointer;
	color: lightblue;
}

hr{border-color:grey;}
</style>
<head>
	<title>Dragon Sport</title>
	<link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<script src="https://kit.fontawesome.com/a076d05399.js"></script>
	<script src = "product-item/vanilla-tilt.min.js"></script>
	<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
	<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>
<nav>
		<div class = "logo">
			<img src = "product-item/logo.png">
		</div>
		<ul class = "nav-link">
			<li><a href = "mainpage.php">Home</a></li>
			<li><a href = "product.php">Shop All</a></li>
			<li><a>Brands</a><i class="fas fa-caret-down"></i>
				<ul>
					<li><a href = "only-adidas.php">Adidas</a></li>
					<li><a href = "only-nike.php">Nike</a></li>
				</ul>
			</li>
			<li><a href = "#">Contact</a></li>
			<li><a href = "#">About Us</a></li>
		</ul>
		<div class = "search-bar">
			<form name = "search-item" action = "product.php" method = "post">
				<input  type = "search" placeholder = "Search" name = "search-content">
				<label class = "icon">
					<span><button><i class="fas fa-search"></i></button></span>
				</label>
			</form>
		</div>
		<?php
			if(isset($_POST["search-content"]) || isset($_POST["search-btn"]))
			{
				$_SESSION["active"] = 1;
				$_SESSION["content"] = $_POST["search-content"];
			}
		?>
		<div class = "wishandcart">
				<a href = "#" class = "wishlist"><i class="far fa-heart"></i>
		<?php
			if($_SESSION["loginactive"] == 1)
			{	
				$user_id = $_SESSION["userid"];
				$countwish = mysqli_query($connect, "SELECT * FROM wishlist WHERE user_id = $user_id");
				if(mysqli_num_rows($countwish) > 0)
				{
		?>
					<span class = "wishcount"><?php echo mysqli_num_rows($countwish);?></span></a>
		<?php
				}
				else
				{
		?>
					<span class = "wishcount"></span></a>
		<?php
				}
			}
		?>
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
				echo "<div class = 'profile-name'>Hello, ".$_SESSION["username"]."</div>";
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
		?>
				<script>location.href = "mainpage.php"</script>
		<?php	
			}
		?>
		</div>
	</nav>
	<div class = "wishlist-side">
		<p><i class="far fa-heart"></i></p>
		<p>Your Wishlist</p>
		<?php
		$scountwish = mysqli_query($connect, "SELECT * FROM wishlist INNER JOIN product ON product.Shoes_ID = wishlist.shoes_id  WHERE user_id = $user_id");
		if(mysqli_num_rows($scountwish) > 0)
		{
		?>
		<div class = "wish-container">
		<?php
			while($shoes = mysqli_fetch_assoc($scountwish))
			{
		?>
			<div class = "wish-grid">
				<div class = "product-img">
					<?php echo '<img src = "data:image;base64,'.base64_encode($shoes['Shoes_IMG']).'">'; ?>
					<button class = "remove-btn" value = "<?php echo $shoes['Shoes_ID']?>"><i class="fas fa-times"></i></button>
				</div>
				<div class = "name">
					<span id = "name"><?php echo $shoes["Shoes_Name"];?></span>
					<span id = "price">RM <?php echo $shoes["Shoes_Price"];?></span>
				</div>
				<div class = "view-btn">
					<a href = "product-description.php?buy&id= <?php echo $shoes['Shoes_ID']?>">Check Now</a>
				</div>
			</div>
		<?php
			}
		?>
		</div>
		<?php
		}
		?>
		<p class = "count0">You haven't added any items to your wishlist yet. Explore the shop to find your favourite items.</p>
	</div>
	<div class = "recommend">
		<p>OnFeet Styles</p>
		<div class = "recommend-item">
			<img src = "wishlist-item/temp1565448199.jpeg">
			<img src = "wishlist-item/temp1545076054.jpeg">
			<img src = "wishlist-item/temp1562417496.jpeg">
			<img src = "wishlist-item/temp1546717803.jpeg">
		</div>
	</div>
	<div class = "navbottom">
		<div class = "content">
			<div class = "shoes";>
				<p>Shoes</p>
				<hr>
				<ul>
					<li><a href = "">Lifestyle</a></li>
					<li><a href = "">Running</a></li>
					<li><a href = "">Football</a></li>
					<li><a href = "">Tennis</a></li>
					<li><a href = "">Training</a></li>
				</ul>
			</div>
			<div class = "service">
				<p>Customer Care</p>
				<hr>
				<ul>
					<li><a href = "">Returns Policy</a></li>
					<li><a href = "">FAQ</a></li>
					<li><a href = "">Contact Us</a></li>
					<li><a href = "">Send Us Feed Back</a></li>
				</ul>
			</div>
			<div class = "term">
				<p>Legal Notices</p>
				<hr>
				<ul>
					<li><a href = "">Terms of Use</a></li>
					<li><a href = "">Privacy Notice</a></li>
					<li><a href = "">Cookies</a></li>
				</ul>
			</div>
		</div>
		<div class = "social">
			<p>Find Us On : </p>
			<i class="fab fa-facebook-f"></i>
			<i class="fab fa-instagram"></i>
			<i class="fab fa-twitter"></i>
			<hr>
		</div>
	</div>
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
	
	
	
	<?php
	if($_SESSION["loginactive"] == 1)
	{
	if(mysqli_num_rows($countwish) == 0 || $_SESSION["loginactive"] == 0)
	{
	?>
		$(".wishcount").css("display", "none");
		$(".count0").css("display", "initial");
	<?php
	}
	else
	{
	?>
		$(".wishcount").css("display", "initial");
		$(".count0").css("display", "none");
	<?php
	}
	}
	?>
	
	$(".remove-btn").click(function()
	{
		shoes = $(this).val();
		$(".wishcount").load("wishlist(add).php", {
				sid:shoes
		});
		
		$(this).parent().parent().fadeOut();
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