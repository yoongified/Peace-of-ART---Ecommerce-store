<?php
    require('connection.php');
    require('functions.php'); 
if(isset($_SESSION['ADMIN_LOGIN']) && $_SESSION['ADMIN_LOGIN']!=''){}
else{
    header('location:admin-login.php');
    die();   
}

$category_id=get_safe_value($con,$_POST["category"]);
$subcategory_id=get_safe_value($con,$_POST["subcategory"]);
$result=mysqli_query($con,"SELECT * FROM subcategory where cat_id = $category_id");
if(mysqli_num_rows($result)>0){
    $html='';
    while($row=mysqli_fetch_assoc($result)){
        if($subcategory_id==$row['subcat_id']){
          
            $html.="<option value=".$row['subcat_id']." selected>".$row['subcat_name']."</option>";
        }else{
          

            $html.="<option value=".$row['subcat_id'].">".$row['subcat_name']."</option>";
        }
    }
    echo $html;
}
else{
    echo "<option value=''>No subcategories found</option>";
}
       					
?>
