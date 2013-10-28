$(document).ready(function(){
	hljs.initHighlighting();
	
	$("#editorInput").keypress(function(e){
		console.log('.change');
		 var code = e.keyCode || e.which;
		 
			$('#editorWindow').append($('#editorInput').val());
			$('#editorInput').val('');
			hljs.highlightAuto('#editorWindow').value;
			if(code == 13) { //Enter keycode
				 
				$('#editorWindow').append('<br>');
			 }
		
	});
	
});




function test()
{
	
}
