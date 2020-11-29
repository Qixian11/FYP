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

.body
{
	margin-left:3%;
	margin-right:3%;
}

.title
{
	font-family:"sec";
	justify-content:center;
	font-size:3.5vw;
	letter-spacing:1vh;
	margin-bottom:3vh;
	background-image:url(product-item/giphy.gif);
	background-size:cover;
	color:white;
	height:40vh;
	display:flex;
	align-items:center;
}

.content-bar
{
	font-family:"sec";
	display:grid;
	grid-template-columns:19% 81%;
	margin:0 3% 0 3%;
	height:4vh;
}

.content-bar .filter-name
{
	display:flex;
	align-items:center;
	justify-content:center;
	font-size:3vh;
	font-weight:bold;
}

.content-bar .sort
{
	
	display:flex;
	justify-content:flex-end;
	position:relative;
	margin-right:0.7vw;
}

.content-bar .sort button,input
{
	width:6vw;
	height:100%;
	background-color:white;
	color:black;
}

.content-bar .sort button:hover{opacity:0.5}

.content-bar .sort button
{
	font-size:2vh;
	letter-spacing:0.1vh;
	border:none;
	outline:none;
}

.content-bar .sort button i{margin-left:0.4vh;}

.content-bar .sort .sort-option
{
	position:absolute;
	z-index:1000;
	top:4vh;
	display:none;
}

.content-bar .sort ul li
{
	list-style:none;
	height:4vh;
}

.content-bar .sort ul li input{font-size:2vh;}

.content-bar .sort ul li input:hover{cursor:pointer;}

.content
{
	width:94%;
	margin:auto;
	display:grid;
	grid-template-columns:19% 81%;;
}

.content .filter-side
{
}

.content .filter-side form{font-family:"sec";}

.content .filter-side .clear
{
	text-align:center;
	margin-top:2vh;
	height:6vh;
}

.content .filter-side .clear input
{
	width:13vw;
	height:6vh;
	font-size:3.5vh;
	font-family:"consolas";
	background-color:white;
	color:black;
	transition:all 0.5s ease-in-out;
}

.content .filter-side .clear input:hover
{
	cursor:pointer;
	background-color:black;
	color:white;
}

.content .filter-side .type
{
	margin:2vh 1vh;
	height:23vh;
}

.content .filter-side .type h4
{
	font-size:3vh;
}

.content .filter-side .type input
{
	margin:1vh 0 0 -0.5vh;
	height:2vh;
	width:2vw;
}

.content .filter-side .type input:hover
{
	cursor:pointer;
	opacity:0.5;
}

.content .filter-side .type span
{
	margin-left:1vh;
	font-size:2.5vh;
	letter-spacing:0.1vh;
}

.content .filter-side .size
{
	margin:0 1vh;
}

.content .filter-side .size h4{font-size:3vh;}

.content .filter-side .size .size-content{margin-top:1vh;}

.content .filter-side .size label
{
	cursor:pointer;
}

.content .filter-side .size label input[type = "checkbox"]
{
	display:none;
}

.content .filter-side .size label input[type = "checkbox"]:checked ~ span
{
	background-color:white;
	color:black;
	border-bottom:6px solid black;
}

.content .filter-side .size label span
{
	position:relative;
	display:inline-block;
	background-color:white;
	padding:15px 15px;
	color:grey;
	border:1px solid black;
	text-shadow: 0 0 10px #FFFFFF;
	font-size:2vh;
	width:7.9vw;
	height:6vh;
	text-align:center;
	margin-bottom:0.5vh;
}

.content .filter-side .size label span:hover
{
	border-bottom:4px solid black;
}

.content .filter-side .size label span:before
{
	content:"";
	position:absolute;
	top:0;
	left:0;
	background:rgba(255,255,255,.1);
}

.content .filter-side .price
{
	margin:3vh 1vh 0 1vh;
	height:17vh;
}

.content .filter-side .price h4{font-size:3vh;}

.content .filter-side .price input
{
	width:48%;
	height:5vh;
	margin-top:1vh;
	margin-bottom:0.2vh;
	border:3px solid black;
	text-align:center;
	font-family:"sec";
	font-size:2vh;
}

.content .filter-side .priceinput::-webkit-outer-spin-button,
input::-webkit-inner-spin-button {
  -webkit-appearance: none;
  margin: 0;
}

.content .filter-side .price .min
{
	margin-left:3vw;
	font-size:2vh;
}

.content .filter-side .price .max
{
	margin-left:5.8vw;
	font-size:2vh;
}

#error{color:black;}

.content .product
{
	width:75.5vw;
	height:100%;
	display:flex;
	position:relative;
	transform-style:preserve-3d;
	flex-wrap:wrap;
	padding-top:0.75vh;
}

.content .product .item
{
	border:1px solid black;
	background-color:white;
	width:23vw;
	height:55vh;
	postition:relative;
	transform-style:preserve-3d;
	z-index:-1;
	margin:1vh 1.075vw;
}

.content .product .item::before
{
	content:"Dragon";
	position:absolute;
	margin-left:6.8vw;
	margin-top:3vh;
	font-size:6.5vh;
	font-weight:900;
	color:#d9d9d9;
	font-style:italic;
	opacity:0;
}

.content .product .item::after
{
	content:"Sport";
	position:absolute;
	font-size:6.5vh;
	font-weight:900;
	color:#d9d9d9;
	font-style:italic;
	opacity:0;
	transition:0.5s;
	margin-left:7.8vw;
	margin-top:34vh;
}

.content .product .item:hover::before,
.content .product .item:hover::after
{
	opacity:0.4;
}

.content .product .item h2
{
	position:absolute;
	text-align:center;
	color:black;
	transform-style:preserve-3d;
	transform:translate3d(0,0,75px);
	transition:0.5s;
	opacity:0;
	z-index:10;
	top:2vh;
	width:15vw;
	margin-left:4.5vw;
	font-size:1.2vw;
}

.content .product .item:hover h2
{
	top:3vh;
	opacity:1;
}

.content .product .item .buy
{
	text-align:center;
	position:absolute;
	bottom:2vh;
	margin-left:11.5vw;
	transform-style:preserve-3d;
	transform:translate3d(-50%,0,75px);
	color:white;
	background-color:black;
	border-radius:30px;
	text-decoration:none;
	transition:0.5s;
	padding:10px 25px;
	opacity:0;
	z-index:10;
	font-size:0.8vw;
}

.content .product .item:hover .buy
{
	bottom:3vh;
	opacity:1;
}

.content .product .item .circle
{
	position:absolute;
	width:16vw;
	height:29vh;
	border-radius:50%;
	transition:0.5s;
	background:linear-gradient(to right, #FD6585 ,#0D25B9);
	transform-style:preserve-3d;
	transform:translate3d(-50%,-50%,50px);
	z-index:-1;
	opacity:1;
	left:50%;
	top:50%;
}

.content .product .item button
{
	float:right;
	margin-right:1vh;
	margin-top:1.5vh;
	background-color:white;
	width:2vw;
	height:3.5vh;
	outline:none;
	border:none;
	transition:all 0.3s ease-in-out;
}

.content .product .item button i{font-size:1.5vw;}

.content .product .item button:hover
{
	cursor:pointer;
	color:red;
}

.content .product .item .product-img
{
	position:absolute;
	width:23vw;
	z-index:10;
	transform-style:preserve-3d;
	transform:translate3d(1%,-60%,100px) rotate(20deg);
	transition:0.5s;
	top:50%;
}

.viewmore
{
	width:73.4vw;
	margin-left:21.73vw;
	display:flex;
	justify-content:center;
	margin-top:1vh;
}

.viewmore button
{
	border:none;
	outline:none;
	height:5vh;
	width:8vw;
	cursor:pointer;
	font-family: 'Poppins', sans-serif;
	font-size:0.8vw;
	font-weight:light;
	background:linear-gradient(to right, #42275a      , #734b6d);
	color:white;
}

.viewmore button:hover
{
	text-decoration:underline;
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
	display:flex;
	justify-content:space-around;
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
	font-size:1.5vh;
	color: #CFD3D6;
	text-transform:uppercase;
	font-weight:lighter;
}

.navbottom .content ul{margin-top:1.2vh;}

.navbottom .content li
{
	list-style:none;
	padding:0.7vh 0;
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
	height:15%;
	display:flex;
	margin:3vh auto;
	align-items:center;
}

.navbottom .social p
{
	font-family: mine;
	letter-spacing:0.1vh;
	font-size:0.9vw;
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

.no-result
{
	font-family:"sec";
	font-size:5vh;
}
</style>
<head>
	<title>Dragon Sport</title>
	<link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0">
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
	<div class = "title">
		<h3>All Product</h3>
	</div>
	<div class = "content-bar">
		<div class = "filter-name">
			Filter
		</div>
		<div class = "sort">
			<button>Sort By<i class="fas fa-sort"></i></button>
			<div class = "sort-option" id = "sort-opt">
				<form name = "sort" action = "" method = "post">
					<ul>
						<li><input type = "button" name = "sort-acc" value = "A - Z"/></li>
						<li><input type = "button" name = "sort-desc" value = "Z - A"/></li>
					</ul>
				</form>
			</div>
		</div>
	</div>
	<div class = "content">
		<div class = "filter-side">
			<form name = "filter" action = "" method = "post">
				<div class = "clear">
					<input type = "submit"  name = "submit-btn" value = "CLEAR ALL" class = "clear-btn"/>
				</div>
				<?php
					if(isset($_POST["submit-btn"]))
					{
				?>
						<script>
							location.href = "product.php";
						</script>
				<?php
					}
				?>
				<div class = "type">
					<h4>Types</h4>
					<p><input type = "checkbox" name = "type[]" value = "Lifestyle" id = "type"/><span>Lifestyle</span></p>
					<p><input type = "checkbox" name = "type[]" value = "Running" id = "type"/><span>Running</span></p>
					<p><input type = "checkbox" name = "type[]" value = "Football" id = "type"/><span>Football</span></p>
					<p><input type = "checkbox" name = "type[]" value = "Tennis" id = "type"/><span>Tennis</span></p>
					<p><input type = "checkbox" name = "type[]" value = "Training" id = "type"/><span>Training</span></p>
				</div>
				<div class = "size">
					<h4>Size</h4>
					<div class = "size-content">
						<label>
							<input type = "checkbox" name = "size[]" value = "1"/><span>5-US</span>
						</label>
						<label>
							<input type = "checkbox" name = "size[]" value = "2"/><span>5.5-US</span>
						</label>
						<label>
							<input type = "checkbox" name = "size[]" value = "3"/><span>6-US</span>
						</label>
						<label>
							<input type = "checkbox" name = "size[]" value = "4"/><span>6.5-US</span>
						</label>
						<label>
							<input type = "checkbox" name = "size[]" value = "5"/><span>7-US</span>
						</label>
						<label>								
							<input type = "checkbox" name = "size[]" value = "6"/><span>7.5-US</span>
						</label>
						<label>
							<input type = "checkbox" name = "size[]" value = "7"/><span>8-US</span>
						</label>
						<label>
							<input type = "checkbox" name = "size[]" value = "8"/><span>8.5-US</span>
						</label>							
						<label>
							<input type = "checkbox" name = "size[]" value = "9"/><span>9-US</span>
						</label>
						<label>
							<input type = "checkbox" name = "size[]" value = "10"/><span>9.5-US</span>
						</label>
						<label>
							<input type = "checkbox" name = "size[]" value = "11"/><span>10-US</span>
						</label>
						<label>
							<input type = "checkbox" name = "size[]" value = "12"/><span>10.5-US</span>
						</label>
						<label>
							<input type = "checkbox" name = "size[]" value = "13"/><span>11-US</span>
						</label>
						<label>
							<input type = "checkbox" name = "size[]" value = "14"/><span>11.5-US</span>
						</label>							
						<label>
							<input type = "checkbox" name = "size[]" value = "15"/><span>12-US</span>
						</label>
					</div>	
				</div>
				<div class = "price">
					<h4>Price</h4>
					<input type = "number" name = "price-min" value = "130" min = "130" max = "1000" id = "price-min"/>
					<input type = "number" name = "price-max" value = "1000" min = "130" max = "1000" id = "price-max"/>
					<br>
					<span class = "min">MIN</span>
					<span class = "max">MAX</span>
				</div>
			</form>
		</div>
		<div class = "product" id = "product">
	
		</div>
	</div>
	<div class = "viewmore">
		<button>View More</button>
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
VanillaTilt.init(document.querySelectorAll(".item"), {
		max: 25,
		speed: 400
	});

$(document).ready(function()
{
	let price_min = 130, price_max = 1000, checkb = 0, limit = 9;
	let checktc = 0, checksc = 0, sizec = [], typec = [], sort = 0;
	let cdf = 0, flimit = 9;
		
	$(".product").load("default.php",{
			c3:checkb, limit:limit
	});

	$(".filter-side input[type = 'checkbox']").click(function()
	{
		let type = [];
		let size = [];
		let checkt = 0, checks = 0;
		cdf = 1;flimit = 9;
		$('.type input[type="checkbox"]:checked').each(function()
		{
            type.push($(this).val());
			checkt = 1;
			typec = type;
        });
		if (!$(".type input[type = 'checkbox']").is(":checked"))
			checkt = 0;
		checktc = checkt;
		$('.size input[type="checkbox"]:checked').each(function()
		{
             size.push($(this).val());
			 checks = 1;
			 sizec=size;
        });
		if (!$(".size input[type = 'checkbox']").is(":checked"))
			checks = 0;
		checksc = checks;
		$(".product").load("filter.php", {
			type:type, size:size, price_min:price_min, price_max:price_max, c1:checkt, c2:checks, sort:sort, c3:checkb , flimit:flimit
		});
	});
	$(".price input[type = 'number']").keyup(function()
	{
		cdf = 1;flimit = 9;
		price_min = $(".price input[name = 'price-min']").val();
		price_max = $(".price input[name = 'price-max']").val();
		$(".product").load("filter.php", {
			type:typec, size:sizec, price_min:price_min, price_max:price_max, c1:checktc, c2:checksc, sort:sort, c3:checkb, flimit:flimit
		});
	});
		
	$(".sort input[name = 'sort-acc']").click(function()
	{
		sort = 1;cdf = 1;flimit = 9;
		$(".product").load("filter.php", {
			type:typec, size:sizec, price_min:price_min, price_max:price_max, c1:checktc, c2:checksc, sort:sort, c3:checkb, flimit:flimit
		});
	});
	
	$(".sort input[name = 'sort-desc']").click(function()
	{
		sort = 2;cdf = 1;flimit = 9;
		$(".product").load("filter.php", {
			type:typec, size:sizec, price_min:price_min, price_max:price_max, c1:checktc, c2:checksc, sort:sort, c3:checkb, flimit:flimit
		});
	});
	
	$(".sort button").click(function()
	{
		$(".sort-option").fadeToggle();
	});
	
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
	
	<?php
	if($_SESSION["loginactive"] == 1)
	{
	if(mysqli_num_rows($countwish) == 0 || $_SESSION["loginactive"] == 0)
	{
	?>
		$(".wishcount").css("display", "none");
	<?php
	}
	else
	{
	?>
		$(".wishcount").css("display", "initial");
	<?php
	}
	}
	?>
	
	$(".viewmore button").click(function()
	{
		if(cdf == 0)
		{
			limit = limit + 9;
			$(".product").load("default.php",{
				c3:checkb, limit:limit
			});
		}
		else
		{
			flimit = flimit + 9;
			$(".product").load("filter.php",{
				type:typec, size:sizec, price_min:price_min, price_max:price_max, c1:checktc, c2:checksc, sort:sort, c3:checkb, flimit:flimit
			});
		}
	});
});
</script>
</html>