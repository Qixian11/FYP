<?php 
include("dataconnection.php"); 
session_start(); 
$_SESSION["active"] = 0;
if(isset($_GET["login"]))
	$_SESSION["loginactive"] = $_GET["id"];
if(empty($_SESSION["loginactive"]))
	$_SESSION["loginactive"] = 0;
?>
<html>
<style>

html
{
	scroll-behavior:smooth;
}

@font-face
{
	font-family:mine;
	src:url(OPTICopperplate.otf);
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
	bottom:1.3vh;
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

.first
{
	margin-bottom:4vh;
	text-align:center;
}

.first img
{
	width:100%;
	height:100%;
}
		
.first .button{font-size:3.8vh;
		 margin-top:1.3%;
    	 font-family: 'consolas';
		 text-transform:uppercase;
		 width:14%;
		 height:auto;
		 display:inline-block;
		 position:relative;
		 color:#03e9f4;
		 text-decoration:none;
		 transition:0.5s;
		 overflow:hidden;
		 -webkit-box-reflect:below 1px linear-gradient(transparent, #0005);
		 filter:hue-rotate(110deg);
		 background-color:#050801;}
		 
.first .button:hover
{
	background:#03e9f4;
	color:#050801;
	box-shadow:0 0 5px #03e9f4, 0 0 25px #03e9f4, 0 0 50px #03e9f4, 0 0 200px #03e9f4;
}	

.first .button span
{
	position:absolute;
	display:block;
}	

.first .button span:nth-child(1)
{
	top:0;
	left:-100%;
	width:100%;
	height:2px;
	background:linear-gradient(90deg, transparent, #03e9f4);
	animation:animate1 1s linear infinite;
} 

@keyframes animate1
{
	0%
	{
		left: -100%;
	}
	50%, 100%
	{
		left:100%;
	}
}

.first .button span:nth-child(2)
{
	top:-100%;
	right:0;
	width:2px;
	height:100%;
	background:linear-gradient(180deg, transparent, #03e9f4);
	animation:animate2 1s linear infinite;
	animation-delay:0.25s;
}	

@keyframes animate2
{
	0%
	{
		top: -100%;
	}
	50%, 100%
	{
		top:100%;
	}
}
	
.first .button span:nth-child(3)
{
	bottom:0;
	right:-100%;
	width:100%;
	height:2px;
	background:linear-gradient(270deg, transparent, #03e9f4);
	animation:animate3 1s linear infinite;
	animation-delay:0.5s;
}	

@keyframes animate3
{
	0%
	{
		right: -100%;
	}
	50%, 100%
	{
		right:100%;
	}
}

.first .button span:nth-child(4)
{
	bottom:-100%;
	left:0;
	width:2px;
	height:100%;
	background:linear-gradient(360deg, transparent, #03e9f4);
	animation:animate4 1s linear infinite;
	animation-delay:0.75s;
}	

@keyframes animate4
{
	0%
	{
		bottom: -100%;
	}
	50%, 100%
	{
		bottom:100%;
	}
}

h1
{
	font-family: 'Poppins', sans-serif;
	text-transform:uppercase;
	font-size:2.5vh;
	letter-spacing:0.1vh;
	text-decoration:underline;
	font-weight;bold;
}

.second
{
	margin-top:2vh;
}

.second .hotsalesbox
{
	display:flex;
	margin:3vh 0 4.0vh;
	overflow:auto;
}

.second .hotsalesbox img
{
	width:23.5vw;
	padding-right:1.5vh;
}

.second .hotsalesbox a
{
	text-decoration:none;
	font-family: 'Noto Sans JP', sans-serif;
	color:black;
	font-size:2vh;
	letter-spacing:0.1vh;
}

.second .hotsalesbox a p
{
	font-family:"times new roman";
	font-size:1.5vh;
	color:grey;
	padding-bottom:3vh;
}

.second .hotsalesbox a .more
{
	display:none;
	font-family:consolas;
	font-size:1.8vh;
	font-weight:bold;
	color:black;
}

.second .hotsalesbox a:hover .more
{
	display:block;
	text-decoration:underline;
	animation:bounce 1s infinite;
}

@keyframes bounce
{
	0%,20%,60%, 100%
	{
		transform:translateY(0);
	}
	40%
	{
		transform:translateY(-30px);
	}
	80%
	{
		transform:translateY(-20px);
	}
}

.hotsalesbox::-webkit-scrollbar
{
	height:1.5vh;
	top:5vh;
	position:relative;
}

.hotsalesbox::-webkit-scrollbar-track {
  background: #e6e6e6;
}

.hotsalesbox::-webkit-scrollbar-thumb {
  background: black;
}

.hotsalesbox::-webkit-scrollbar-thumb:hover {
  background: grey;
}

.third
{
	display:flex;
	margin-bottom:4vh;
}

.third .third1
{
	width:49.5%;
	margin-right:0.5%;
}

.third .third1 .slider
{
	display:flex;
	overflow:hidden;
	z-index:1;
}

.third .third1 .slider input
{
	display:none;
}

.third .third1 .slider image
{
	width:20%;
	transition:2s;
}

.third1 .navigation-manual
{
	position:absolute;
	margin-left:17.75vw;
	margin-top:49.2vh;
	display:flex;
	justify-content:center;
}

.third1 .manual-btn
{
	border:2px solid black;
	padding:0.262vw;
	border-radius:10px;
	cursor:pointer;
	transition:1s;
	margin:2vh;
}

.third1 .manual-btn:hover
{
	background-color:black;
}

.third1 #radio1:checked ~ .lol
{
	margin-left:0;
}

.third1 #radio2:checked ~ .lol
{
	margin-left:-100%;
}

.third1 #radio3:checked ~ .lol
{
	margin-left:-200%;
}

.third1 .navigation-auto
{
	position:absolute;
	display:flex;
	justify-content:center;
	margin-top:49.2vh;
	margin-left:17.75vw;
}

.third1 .navigation-auto div
{
	border:2px solid black;
	padding:0.262vw;
	border-radius:10px;
	transition:1s;
	margin:2vh;
}

.third1 #radio1:checked ~ .navigation-auto .auto-btn1
{
	background-color:black;
}

.third1 #radio2:checked ~ .navigation-auto .auto-btn2
{
	background-color:black;
}

.third1 #radio3:checked ~ .navigation-auto .auto-btn3
{
	background-color:black;
}

.third .slider img
{
	height:55vh;
	width:46.13vw;
	margin-top:3vh;
	object-fix:cover;
	display:noe;
}

.third .third2
{
	width:49.5%;
	margin-left:0.5%;
}

.third .third2 .slider
{
	display:flex;
	overflow:hidden;
	z-index:1;
	width:100%;
	height:58vh;
}

.third .third2 .slider input
{
	display:none;
}

.third .third2 .slider simage
{
	width:20%;
	transition:2s;
}

.third2 .navigation-manual
{
	position:absolute;
	margin-left:17.75vw;
	margin-top:49.2vh;
	display:flex;
	justify-content:center;
}

.third2 .manual-btn
{
	border:2px solid black;
	padding:0.262vw;
	border-radius:10px;
	cursor:pointer;
	transition:1s;
	margin:2vh;
}

.third2 .manual-btn:hover
{
	background-color:black;
}

.third2 #dota1:checked ~ .lola
{
	margin-left:0;
}

.third2 #dota2:checked ~ .lola
{
	margin-left:-100%;
}

.third2 #dota3:checked ~ .lola
{
	margin-left:-200%;
}

.third2 .navigation-auto1
{
	position:absolute;
	display:flex;
	justify-content:center;
	margin-top:49.2vh;
	margin-left:17.75vw;
}

.third2 .navigation-auto1 div
{
	border:2px solid black;
	padding:0.262vw;
	border-radius:10px;
	transition:1s;
	margin:2vh;
}

.third2 #dota1:checked ~ .navigation-auto1 .auto-btn01
{
	background-color:black;
}

.third2 #dota2:checked ~ .navigation-auto1 .auto-btn02
{
	background-color:black;
}

.third2 #dota3:checked ~ .navigation-auto1 .auto-btn03
{
	background-color:black;
}

.third .third2 .btq
{
	background:none;
	width:10vw;
	height:6vh;
	position:absolute;
	margin-top:49vh;
	margin-left:3vw;
	border:1px solid black;
}

.third .third2 button
{
	position:absolute;
	background-color:black;
	width:10vw;
	height:6vh;
	text-align:center;
	color:white;
	font-weight:bolder;
	font-family: 'Poppins', sans-serif;
	font-size:2vh;
	right:0.1vw;
	bottom:0.2vh;
}

.third .third2 button:hover
{
	cursor:pointer;
	text-decoration:underline;
}

.fourth h1
{
	text-align:center;
}

.fourth .brands
{
	margin:3vh 0 4vh;
	display:block;
	width:93vw;
	height:70vh;
	justify-content:center;
	align-items:center;
}

.fourth .brands .video img
{
	width:93vw;
	height:70vh;
	position:absolute;
}

.fourth .brands .back
{
	display:flex;
}

.fourth .brands .back a img{height:70vh; width:100%;}

.fourth .brands .back a
{
	background:white;
	width:50%;
	height:70vh;
	mix-blend-mode:screen;
}

.fourth .brands .back img:hover
{
	background-color:black;
	filter:brightness(100);
	cursor:pointer;
}

.fourth .gotop
{
	margin-top:7vh;
	display:flex;
	justify-content:center;
}

.fourth .gotop a
{
	font-family: 'Poppins', sans-serif;
	font-size:2.0vh;
	text-decoration:none;
	background-color:white;
	width:8vw;
	color:black;
}

.fourth .gotop .fa-arrow-up
{
	position:relative;
	top:0.2vh;
	left:1vh;
	font-size:2.2vh;
}

.fourth .gotop a:hover
{
	text-decoration:underline;
	font-weight:bold;
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
	<div class = "first">
		<img src = "mainpage-item/Nike-React-Sony-a6400-Cinematic.gif">
		<a href = "product.php" class = "button">
			<span></span>
			<span></span>
			<span></span>
			<span></span>
			Shop Now
		</a>
	</div>
	<div class = "body">
	<div class = "second">
		<div class = "hotsales">
			<h1>Hot Sales in this month</h1>
			<div class = "hotsalesbox">
				<a href = "#"><img src ="mainpage-item/NMD_R1_Shoes_Black_B42200_01_standard.jpg">NMD_R1 SHOES<p>A Modern NMD Trainer With A Snug Knit Upper.</p><p class = "more">More about it</p></a>
				<a href = "#"><img src ="mainpage-item/jordan-why-not-zer03-pf-basketball-shoe-nNTc80 .jpg">Jordan 'Why Not?' Zer0.3 PF<p>Triple-double dynamo Russell Westbrook has the motor, muscle and mentality to match his fearlessness.</p><p class = "more">More about it</p></a>
				<a href = "#"><img src ="mainpage-item/GZ8668_01_standard.jpg.jpg">YEEZY BOOST 380<p>Extreme comfortable shoes in the World</p><p class = "more">More about it</p></a>
				<a href = "#"><img src ="mainpage-item/Ultra4D_Shoes_Black_FY4286_01_standard.jpg">ULTRA4D SHOES<p>High-Performance Running Shoes With A Progressive Lattice Midsole.</p><p class = "more">More about it</p></a>
				<a href = "#"><img src ="mainpage-item/NMD_R1_V2_Shoes_Black_FY1452_01_standard.jpg">NMD_R1 V2 SHOES<p>Super-Cushioned Shoes inspired By The World of Running.</p><p class = "more">More about it</p></a>
			</div>
		</div>
	</div>
	<div class = "third">
		<div class = "third1">
			<h1>Upcoming Product</h1>
			<div class = "slider">
				<input type = "radio" name = "radio-btn" id ="radio1">
				<input type = "radio" name = "radio-btn" id ="radio2">
				<input type = "radio" name = "radio-btn" id ="radio3">
				<div class = "image lol">
						<img src = "mainpage-item/kybrid-s2-pineapple-release-date.jpg">
				</div>
				<div class = "image">
					<img src = "mainpage-item/kybrid-s2-pineapple-release-date (1).jpg">
				</div>
				<div class = "image">
					<img src = "mainpage-item/kybrid-s2-pineapple-release-date (2).jpg">
				</div>
				<div class = "navigation-auto">
					<div class = "auto-btn1"></div>
					<div class = "auto-btn2"></div>
					<div class = "auto-btn3"></div>
				</div>
				<div class = "navigation-manual">
					<label for = "radio1" class = "manual-btn"></label>
					<label for = "radio2" class = "manual-btn"></label>
					<label for = "radio3" class = "manual-btn"></label>
				</div>
			</div>
		</div>
		<div class = "third2">
			<h1>New Arrival</h1>
			<div class = "slider">
				<div class = "btq">
					<a href = ""><button>Get Now</button></a>
				</div>
				<input type = "radio" name = "radio1-btn" id ="dota1">
				<input type = "radio" name = "radio1-btn" id ="dota2">
				<input type = "radio" name = "radio1-btn" id ="dota3">
				<div class = "simage lola">
					<img src = "mainpage-item/NMD-R1-The-Mandalorian-Shoes-Bla.gif">
				</div>
				<div class = "simage">
					<img src = "mainpage-item/NMD_R1_The_Mandalorian_Shoes_Black_GZ2737_01_standard.jpg">
				</div>
				<div class = "simage">
					<img src = "mainpage-item/NMD_R1_The_Mandalorian_Shoes_Black_GZ2737_04_standard.jpg">
				</div>
				<div class = "navigation-auto1">
					<div class = "auto-btn01"></div>
					<div class = "auto-btn02"></div>
					<div class = "auto-btn03"></div>
				</div>
				<div class = "navigation-manual">
					<label for = "dota1" class = "manual-btn"></label>
					<label for = "dota2" class = "manual-btn"></label>
					<label for = "dota3" class = "manual-btn"></label>
				</div>
			</div>
		</div>
	</div>
	<div class = "fourth">
		<h1>Shop by Brands</h1>
		<div class = "brands">
			<div class = "video">
				<img src = "mainpage-item/Untitled.gif">
			</div>
			<div class = "back">
				<a href = "only-adidas.php"><img src = "mainpage-item/Adidas.png" /></a>
				<a href = "only-nike.php"><img src = "mainpage-item/nike.png" /></a>
			</div>
		</div>
		<div class = "gotop">
				<a href = "#">Back to top<i class="fas fa-arrow-up"></i></a>
		</div>
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
<script type = "text/javascript">
		var counter = 2;
		setInterval(function a(){
			document.getElementById('radio' + counter).checked = true;
			counter++;
			if(counter > 3)
			{
				counter = 1;
			}
		},5000);
</script>

<script type = "text/javascript">
	var i = 2;
	setInterval(function b(){
		document.getElementById('dota' + i).checked = true;
		i++;
		if(i > 3)
		{
			i = 1;
		}
	},9250);

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
</body>
</html>