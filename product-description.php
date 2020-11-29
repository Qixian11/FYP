<?php 
include("dataconnection.php"); 
session_start(); 
$_SESSION["active"] = 0;
if(isset($_GET["login"]))
	$_SESSION["loginactive"] = $_GET["id"];
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
	bottom:1.8vh;
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

.background
{
	padding-top:13vh;
	background:#161821;
	display:grid;
}

.background .content
{
	width:100vw;
	height:65vh;
	display:flex;
}

.background .product-intro
{
	width:40%;
	height:100%;
	margin-left:5vw;
	color:#fff;
	font-family:montserrat, sans-serif;
	padding-left:5vw;
	padding-top:12vh;
}

.background .product-intro p
{
	color:rgba(110,105,105,1.00);
	font-size:1.3vw;
	margin-bottom:3vh;
}

.background .product-intro h2
{
	font-size:3.5vw;
	word-spacing:-2px;
	margin-bottom:2vh;
}

.background .product-intro div{display:flex;}

.background .product-intro select
{
	border:2px solid #828282;
	box-sizing:border-box;
	background-color:transparent;
	color:white;
	outline:none;
	width:5vw;
	height:6vh;
	margin-right:2vw;
	cursor:pointer;
	font-size:1vw;
}

.background .product-intro .price
{
	width:5vw;
	height:6vh;
	border:2px solid #dc721f;
	box-sizing:border-box;
	background-color:transparent;
	color:#dc721f;
	outline:none;
	display:flex;
	align-items:center;
	justify-content:center;
	font-weight:bold;
	font-size:1vw;
}

.background .product-intro option
{
	color:#000000;
	text-align:center;
}

.background .product-image
{
	width:40%;
	height:100%;
	margin-left:10vw;
	display:flex;
	justify-content:center;
	align-items:center;
}

.background .product-image img
{
	width:40vw;
}

.background .add
{
	height:7vh;
	margin-top:8vh;
	display:flex;
	justify-content:flex-end;
	position:relative;
	bottom:0;
}

.background .add input
{
	width:12vw;
	height:6.5vh;
	margin-right:2vw;
	background-color:rgba(54,53,53,1.00);
	border:1px solid #dc721f;
	color:#dc721f;
	font-size:1vw;
	font-weight:bold;
	outline:none;
}

.background .add input:nth-child(2){margin-right:0;}

.background .add input:hover
{
	background-color:#dc721f;
	transition:all ease 0.5s;
	color:white;
	cursor:pointer;
}

.background .previous-btn
{
	position:absolute;
	background-color:rgba(54,53,53,1.00);
	width:4vw;
	height:7vh;
	left:0;
	bottom:0;
	color:#dc721f;
	border:1px solid #dc721f;
	text-align:center;
	border-left:none;
	z-index:1;
}

.background .previous-btn i
{
	position:relative;
	top:1.5vh;
	font-size:2vw;
}

.background .previous-btn:hover
{
	background-color:#dc721f;
	transition:all ease 0.5s;
	color:white;
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
	<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
</head>
<body>
<nav>
		<div class = "logo">
			<img src = "mainpage-item/logo.png">
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
				<a href = "wishlist.php" class = "wishlist"><i class="far fa-heart"></i>
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
<?php
if(isset($_GET["buy"]))
{
	$id = $_GET["id"];
	$result = mysqli_query($connect, "SELECT * FROM product WHERE Shoes_ID = $id");
	$sizer = mysqli_query($connect, "SELECT * FROM product_size INNER JOIN product_entry ON product_entry.size_id = product_size.Size_ID WHERE product_id = $id");
	$row = mysqli_fetch_assoc($result);
}
?>
<div class = "background">
	<a href = "<?php echo $_SESSION["previous_page"];?>" class = "previous-btn"><i class="fas fa-chevron-left"></i></a>
	<div class = "content">
		<div class = "product-intro">
			<h2><?php echo $row["Shoes_Name"];?></h2>
			<p><?php echo $row["Shoes_Description"];?></p>
			<div>
			<select class = "qty">
				<?php
				for($i = 1; $i < 7; $i++)
				{
				?>
				<option value = "<?php echo $i?>"><?php echo $i?></option>
				<?php
				}
				?>
			</select>
			<select>
				<option disabled selected value>SIZE</option>
				<?php
				while($size = mysqli_fetch_assoc($sizer))
				{
				?>
				<option><?php echo $size["Size"]?></option>
				<?php
				}
				?>
			</select>
			<div class = "price">
				RM <span id = "price"><?php echo $row["Shoes_Price"]?></span>
			</div>
			</div>
		</div>
		<div class = "product-image">
			<?php echo '<img src = "data:image;base64,'.base64_encode($row['Shoes_IMG']).'" class = "product-img" >'; ?>
		</div>
	</div>
	<div class = "add">
		<?php
		if($_SESSION["loginactive"] == 1)
		{
			$user_id = $_SESSION["userid"];
			$countshoes = mysqli_query($connect, "SELECT * FROM wishlist WHERE user_id = $user_id AND shoes_id = $id");
			if(mysqli_num_rows($countshoes) == 0)
			{
			?>
				<input type = "button" name = "wish" value = "Add To Wishlist" class = "wishlist-btn"/>
				<script>let checkbtn = 1;</script>
			<?php
			}
			else if(mysqli_num_rows($countshoes) > 0)
			{
			?>
				<input type = "button" name = "wish" value = "Remove From Wishlist" class = "wishlist-btn"/>
				<script>let checkbtn = 0;</script>
			<?php
			}
		}
		else
		{
		?>
			<input type = "button" name = "wish" value = "Add To Wishlist" class = "wishlist-btn"/>
		<?php
		}
		?>
		<input type = "submit" name = "cart" value = "Add to Cart"/>
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
	
	$(".qty").change(function()
	{
		$price = <?php echo $row["Shoes_Price"];?>;
		$qty = $(".qty").val();
		$total = $price * $qty;
		$("#price").html($total);
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
	
	$(".wishlist-btn").click(function()
	{
		<?php 
		if($_SESSION["loginactive"] == 0)
		{
		?>
			alert("Please log in your accout before you add");
		<?php
		}
		else
		{
		?>
			shoes = <?php echo $id;?>;
			$(".wishcount").load("wishlist(add).php", {
				sid:shoes
			});
			if(checkbtn == 0)
			{
				$(".wishlist-btn").val("Add To Wishlist");
				checkbtn = 1;
			}
			else if(checkbtn == 1)
			{
				$(".wishlist-btn").val("Remove From Wishlist");
				checkbtn = 0;
			}
		<?php	
		}
		?>
	});
	
	
});
</script>
</html>