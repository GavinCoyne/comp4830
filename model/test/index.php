<html>
	<head>
		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	</head>
	<body>
		<script>
			$.ajax({
				url: "../compile.php",
				type: "POST",
				data: {
					"className": "HelloWorld",
					"code": "public class HelloWorld{\n\tpublic static void main(String args[]){\n\t\tSystem.out.println(\"Hello World!\");\n\t}\n}"
				},			
				dataType: "JSON",
				error: function(err){
					console.log(err.message);
					}
			}).done(function(data){
				$("#code").html("Compile Data: <br />" + data.compile + "<br /><br />Execution Data: <br />" + data.execute);
			});
		</script>
		<pre id="code"></pre>
	</body>
</html>