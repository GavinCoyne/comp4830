<?php 
if(isset($_GET['action']))
{
	echo '<link rel="stylesheet" type="text/css" href="css/index.css" />';
	//echo "__dir__.'/controller/template.php';";
	include __dir__.'/controller/template.php';
	$test = new page();
}


class page extends template
{
	public function __construct() {
       parent::__construct();
       return __dir__.'/controller/'.$_GET['action'].'.php';
   }
	
}