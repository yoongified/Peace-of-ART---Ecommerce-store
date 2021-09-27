<?php
require('DATABASE/connection.php');
require('DATABASE/functions.php');

if(isset($_POST["rating_data"]))
{

$pid=get_safe_value($con,$_POST['pid']);
$rating_data=get_safe_value($con,$_POST['rating_data']);
$customer_id=$_SESSION['USER_ID'];
$user_name=$_SESSION['USER_NAME'];
$user_review=get_safe_value($con,$_POST['user_review']);
$added_on=date('Y-m-d h:i:s');

	$query="INSERT INTO product_review(product_id,customer_id,`name`, rating, review, added_on)VALUES
	($pid,$customer_id,'$user_name',$rating_data,'$user_review','$added_on')";

	mysqli_query($con,$query);

	echo "Your Review & Rating Successfully Submitted";

}
if(isset($_POST["action"]))
{
	$average_rating = 0;
	$total_review = 0;
	$five_star_review = 0;
	$four_star_review = 0;
	$three_star_review = 0;
	$two_star_review = 0;
	$one_star_review = 0;
	$total_user_rating = 0;
	$review_content = array();

	$query = "SELECT * FROM product_review ORDER BY review_id DESC";
	$result=mysqli_query($con,$query);

	while($row=mysqli_fetch_assoc($result))
	{

		if($row['rating']==5)
		{
			$five_star_review++;
		}

		if($row['rating']==4)
		{
			$four_star_review++;
		}

		if($row['rating']==3)
		{
			$three_star_review++;
		}

		if($row['rating']==2)
		{
			$two_star_review++;
		}

		if($row['rating']==1)
		{
			$one_star_review++;
		}

		$total_review++;

		$total_user_rating = $total_user_rating + $row['rating'];

	}

	$average_rating = $total_user_rating / $total_review;

	$output = array(
		'average_rating'	=>	number_format($average_rating, 1),
		'total_review'		=>	$total_review,
		'five_star_review'	=>	$five_star_review,
		'four_star_review'	=>	$four_star_review,
		'three_star_review'	=>	$three_star_review,
		'two_star_review'	=>	$two_star_review,
		'one_star_review'	=>	$one_star_review,
		'review_data'		=>	$review_content
	);

	echo json_encode($output);

}

?>