<?php 

if(isset($_POST['className'])){
	$javaClass = $_POST['className'];
}
if(isset($_POST['code'])){

	$code = $_POST['code'];
	
	// Environment Variables //
	$JAVA_HOME = "\"C:\Program Files (x86)\Java\jdk1.7.0_40\""; //Set your java path here
	$PATH = "$JAVA_HOME/bin";

	putenv("JAVA_HOME=$JAVA_HOME");
	putenv("PATH=$PATH");

	$env = ".cmd"; //This is for a windows environment
	//$env = ".sh"; //This is for a linux environment

	$file = __DIR__."/compscript$env"; //the script file we will use to compile java code (.cmd for windows, .sh for linux)
	
	$handle = fopen($file, 'w'); //open file for writing

	if($env == ".sh"){
		$data1 = "ulimit -t 30\n"; //set the upper time limit of the process to be run to 30 seconds (only workins in a linux environment)
	} else {
		$data1 = ""; //Just because I'm feeling silly, there is no limit to set in windows that will work...best to run this on a linux box.
	}

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