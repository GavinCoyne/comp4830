<?php 

include __dir__.'/controller/template.php';
	
class Page extends template
{
	public function __construct() {
       parent::__construct();
   }

	
}


	
	
	
	if(isset($_GET['action']))
	{
		echo '<link rel="stylesheet" type="text/css" href="css/index.css" />';
	
		$test = new page();
		
	}