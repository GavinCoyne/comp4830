<?php 

include __dir__.'/controller/template.php';
	
class Page extends template
{
	public function __construct($function) {
       parent::__construct();
       var_dump($function);
       
       self::$function();
   }
	
   public function test()
	{
		echo "This is a test function"
	}
}


	
	
//Templating controller	
	if(isset($_GET['action']))
	{
		echo '<link rel="stylesheet" type="text/css" href="css/index.css" />';
		$func = (isset($_GET["func"]) ? $_GET["func"] : null);
		
		//i.e. http://localhost/comp4830/?action=index&func=test
		$test = new page($func);
		
	}