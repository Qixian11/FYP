<?php
include("dataconnection.php");
session_start();

$price_min = $_POST["price_min"];
$price_max = $_POST["price_max"];
$checkt = $_POST["c1"];
$checks = $_POST["c2"];
$checksort = $_POST["sort"];
$checkb = $_POST["c3"];
$limit = $_POST["flimit"];

if($price_max < $price_min)
{
	echo "<p class = 'no-result'>Price-Min should not be greater than Price-Max</p>";
	exit();
}
		
if($checkb == 0)	
	$query = "SELECT * FROM product INNER JOIN product_entry ON product_entry.product_id = product.Shoes_ID where qty != 0 AND Shoes_Price BETWEEN $price_min AND $price_max";
else if($checkb == 1)	
	$query = "SELECT * FROM product INNER JOIN product_entry ON product_entry.product_id = product.Shoes_ID where qty != 0 AND Shoes_Price BETWEEN $price_min AND $price_max AND Shoes_Brands = 'Adidas'";				
else if($checkb == 2)	
	$query = "SELECT * FROM product INNER JOIN product_entry ON product_entry.product_id = product.Shoes_ID where qty != 0 AND Shoes_Price BETWEEN $price_min AND $price_max AND Shoes_Brands = 'Nike'";

if($checkt == 0 && $checks == 0)
	$query .= " GROUP BY Shoes_Name";
				
if($checkt == 1)
{
	$type = implode("','", $_POST["type"]);
	$query .= " And Shoes_Types IN ('$type')";
	if($checks == 0)
		$query .= " GROUP BY Shoes_Name";
}
				
if($checks == 1)
{
	$size = implode("','", $_POST["size"]);
	$query .= " And size_id IN ('$size') GROUP BY Shoes_Name";
}	

if($checksort == 1)
	$query .= " ORDER BY Shoes_Name";
else if($checksort == 2)
	$query .= " ORDER BY Shoes_Name DESC";
			$countproduct = mysqli_num_rows(mysqli_query($connect, $query));
			if($limit > $countproduct)
			{
?>
				<script>$(".viewmore").css("display", "none");</script>
<?php
			}
			else
			{
?>
				<script>$(".viewmore").css("display", "flex");</script>
<?php
			}
			$query .= " Limit $limit";
			$result = mysqli_query($connect, $query);
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
			}?>
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
</script>