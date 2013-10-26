<?php 
$file = __DIR__."/compscript.sh"; //the script file we will use to compile java code
$handle = fopen($file, 'w'); //open file for writing
$data1 = "ulimit -t 30\n"; //set the upper time limit of the process to be run to 30 seconds
fwrite($handle, $data1); //write the ulimit statement to the file
//we need to parse the entered java code for the class name here
$data = "javac ".$javaClass.".java";
fwrite($handle, $data); //sets the filename for the java class to be written
fclose($handle);

//execution of the compiler goes here

//$javaFile = $javaClass . ".class"; //may not need this line...depending
$handle = fopen($file, 'w');
fwrite($handle, $data1);
$data = "java " . $javaClass;
fwrite($handle, $data);
fclose($handle);
