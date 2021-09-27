<?php
ob_start();
  include("poa-top.php");
  include("WEB/_product.php"); 
  include("WEB/_recentlyviewed.php"); 
  include("poa-footer.php");
ob_flush();
?>