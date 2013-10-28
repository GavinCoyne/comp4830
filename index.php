<?php 

include __dir__.'/controller/template.php';
	
class Page extends template
{
	public function __construct($function = "index")
	{
       self::$function();
    }
	
    public function index()
	{
		$content = self::requireToVar(__dir__.'/view/index.php');
		parent::__construct($content);

	}
	
	public function no()
	{
		echo "No template";
	}
	
	public function requireToVar($file)
	{
		ob_start();
		require $file;
		return ob_get_clean();
	}
}


	
	
//Templating controller	
	if(true)
	{
		
		echo '<link rel="stylesheet" type="text/css" href="js/highlight.js/styles/monokai.css" />';
		echo '<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>';
		echo '<script src="js/highlight.js/highlight.pack.js"></script>';
		
		
		echo '<link rel="stylesheet" type="text/css" href="css/index.css" />';
		echo '<script src="js/system.js"></script>';
		
		$func = (isset($_GET["func"]) ? $_GET["func"] : 'index');
		
		//i.e. http://localhost/comp4830/?action=index&func=test
		$test = new page($func);
		
	}