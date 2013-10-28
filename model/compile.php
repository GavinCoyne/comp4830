<?php 

require_once("envVars.php");

if(isset($_POST['className'])){
	$javaClass = $_POST['className'];
}
if(isset($_POST['code'])){

	$code = $_POST['code'];
	
	// Environment Variables //
	$PATH = "$JAVA_HOME/bin";

	putenv("JAVA_HOME=$JAVA_HOME");
	putenv("PATH=$PATH");

	$file = __DIR__."/compscript$env"; //the script file we will use to compile java code (.cmd for windows, .sh for linux)
	
	$handle = fopen($file, 'w'); //open file for writing

	if($env == ".sh"){
		$data1 = "ulimit -t 30\n"; //set the upper time limit of the process to be run to 30 seconds (only workins in a linux environment)
	} else {
		set_time_limit(30); //Use the PHP script level timeout if we're running in windows

	fwrite($handle, $data1); //write the ulimit statement to the file
	//we need to parse the entered java code for the class name here
	$data = "javac ".$javaClass.".java";
	fwrite($handle, $data); //sets the filename for the java class to be written
	fclose($handle);
	
	$file2 = __DIR__."/".$javaClass.".java";
	
	//Create the .java file to be compiled
	$handle2 = fopen($file2, 'w');
	fwrite($handle2, $code); //we may need some preprocessing of this to handle the input from the textarea
	fclose($handle2);
	
	//Compile the java code
	$output['compile'] = shell_exec("compscript$env 2>&1"); //we want stderr to go into output as well, at least for now...
	
	//compiler error handling goes here (we need to parse the output['compile'] and figure out if we need to cancel any attempt at execution
	
	$handle = fopen($file, 'w');
	fwrite($handle, $data1); 
	$data = "java " . $javaClass; //execute the program after compiling (in a script file)
	fwrite($handle, $data);
	fclose($handle);
	
	//execution of the program code goes here
	$output['execute'] = shell_exec($file . ' 2>&1'); //'2>&1' --> redirect stderr output to stdout which is currently being processed by shell_exec
	
	//delete files used once completed...if we use any sort of try-catch then this would be in a finally block...need to watch and make sure we execute this every time preferrably
	unlink($file);
	unlink($file2);
	unlink($javaClass.".class");
	
	echo json_encode($output);
}
?>
