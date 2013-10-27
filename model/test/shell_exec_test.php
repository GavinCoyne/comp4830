<?php
$JAVA_HOME = "\"C:\Program Files (x86)\Java\jdk1.7.0_40\""; //Set your java path here
$PATH = "%PATH%;$JAVA_HOME/bin";
putenv("JAVA_HOME=$JAVA_HOME");
putenv("PATH=$PATH");
//$outputa = shell_exec('ulimit -t 30 2>&1'); //only works in linux env.
$env = ".cmd" //This is for a windows environment
//$env = ".sh" //This is for a linux environment
echo "<pre>$outputa</pre>";
$output = shell_exec('javac 2>&1'); //'2>&1' --> redirect stderr output to stdout which is currently being processed by shell_exec
echo "<pre>$output</pre>";
?>