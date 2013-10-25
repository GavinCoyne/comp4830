<?php 

include __dir__.'/controller/template.php';
	
class Page extends template
{
	public function __construct($function)
	{
       self::$function();
    }
	
    public function test()
	{
		parent::__construct();
		echo "This is a test function";
	}
	
	public function no()
	{
		
		echo "No tempale";
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