<?php
include("dataconnection.php");
session_start();
$checkb = $_POST["c3"];
$limit = $_POST["limit"];
if($_SESSION["active"] == 1)
{
	$_SESSION["active"] = 0;
	$content = $_SESSION["content"];
	$query = "SELECT * FROM product where Shoes_Name LIKE '%$content%'";
	if(mysqli_num_rows(mysqli_query($connect, $query)) < 1)
	{
		echo "<p class = 'no-result'>Sorry. No Result Found</p>";
?>
		<script>$(".viewmore").css("display","none")</script>
<?php
		exit();
	}
}
else
{
	if($checkb == 0)
		$query = "SELECT * FROM product";
	else if($checkb == 1)
		$query = "SELECT * FROM product WHERE Shoes_Brands = 'Adidas'";
	else if($checkb == 2)
		$query = "SELECT * FROM product WHERE Shoes_Brands = 'Nike'";
}
$query .= " LIMIT $limit";
$result = mysqli_query($connect, $query);
if($limit > mysqli_num_rows($result))
{
?>
	<script>$(".viewmore").css("display","none")</script>
<?php
}

if($_SESSION["loginactive"] == 1)	
{
	$name = $_SESSION['username'];
	$wish = mysqli_query($connect, "SELECT * FROM wishlist INNER JOIN user ON user.user_id = wishlist.user_id where user_name = '$name'");
	$x = 0;
	while($rwish = mysqli_fetch_assoc($wish))
	{
		$shoes_id[$x] = $rwish["shoes_id"];
		$x++;
	}
}
while($row = mysqli_fetch_assoc($result))
{
?>
	<div class = "item">
	<h2><?php echo $row["Shoes_Name"] ?></h2>
	<?php
	if($_SESSION["loginactive"] == 1 && !empty($shoes_id))
	{
		$check = 0;
		for($i = 0; $i < count($shoes_id); $i++)
		{
			if($shoes_id[$i] == $row["Shoes_ID"])
			{
			?>
				<button class = "wishlist-btn" value = "<?php echo $row['Shoes_ID'];?>"><i class="fas fa-heart" style = "color:red;"></i></button>
			<?php
				$check = 1;
			}
		}
		if($check == 0)
		{
		?>
			<button class = "wishlist-btn" value = "<?php echo $row['Shoes_ID'];?>"><i class="fas fa-heart" style = "color:black;"></i></button>
		<?php
		}
	}
	else
	{
	?>
		<button class = "wishlist-btn" value = "<?php echo $row['Shoes_ID'];?>"><i class="fas fa-heart" style = "color:black;"></i></button>
	<?php
	}
	?>
	<a href = "product-description.php?buy&id= <?php echo $row['Shoes_ID']?>" class = "buy">Buy Now</a>
	<div class = "circle"></div>
	<?php echo '<img src = "data:image;base64,'.base64_encode($row['Shoes_IMG']).'" class = "product-img" >'; ?>
	</div>
<?php
}
?>
<script>
VanillaTilt.init(document.querySelectorAll(".item"), {
		max: 25,
		speed: 400
	});

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
			shoes = $(this).val();
			$(".wishcount").load("wishlist(add).php", {
				sid:shoes
			});
			let color = $(".fa-heart", this).css("color");
			if(color == "rgb(0, 0, 0)")
				$(".fa-heart", this).css("color", "red");
			else if(color = "rgb(255, 0, 0)")
				$(".fa-heart", this).css("color", "black");
		<?php
		}
		?>
	});
<?php
if($limit > mysqli_num_rows(mysqli_query($connect, "SELECT * FROM product")))
{
?>
	$(".viewmore").css("display", "none");
<?php	
}
?>
</script>