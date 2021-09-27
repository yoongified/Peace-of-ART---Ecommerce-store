<?php
session_start();
$con=mysqli_connect("localhost","root","","art");

if(mysqli_connect_error()){
    echo "Cannot Connect";
}

define('SERVER_PATH',$_SERVER['DOCUMENT_ROOT'].'/ART/');
define('SITE_PATH','http://127.0.0.1/ART/');

define('PRODUCT_IMAGE_SERVER_PATH',SERVER_PATH.'MEDIA/PRODUCT/');
define('PRODUCT_IMAGE_SITE_PATH',SITE_PATH.'MEDIA/PRODUCT/');

define('PRODUCT_MULTIPLE_IMAGE_SERVER_PATH',SERVER_PATH.'MEDIA/PRODUCT_IMAGES/');
define('PRODUCT_MULTIPLE_IMAGE_SITE_PATH',SITE_PATH.'MEDIA/PRODUCT_IMAGES/');

define('ADMIN_IMAGE_SERVER_PATH',SERVER_PATH.'MEDIA/TEAM/');
define('ADMIN_IMAGE_SITE_PATH',SITE_PATH.'MEDIA/TEAM/');
?>