$(document).ready(function(){
	hljs.initHighlighting();
	
	$("#editorInput").keydown(function(e){
		console.log('.change');
		 var code = e.keyCode || e.which;
		
			$('#editorWindow').append($('#editorInput').val());
			$('#editorInput').val('');
			hljs.highlightAuto('#editorWindow').value;
		
	});
	
});




function test()
{
	
}
