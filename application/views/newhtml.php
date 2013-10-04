<script>
$(function(){
	$.ajax({type:'POST', url: '<?php echo base_url();?>home/hasilhtml', data:$('#myform').serialize(),
		success: function(response) {
			$('#hasilhtml').html(response);
		}});
		
	$('#myform').keyup(function(){
		$.ajax({type:'POST', url: '<?php echo base_url();?>home/hasilhtml', data:$(this).serialize(),
		success: function(response) {
			$('#hasilhtml').html(response);
		}});
		return false;
	});
	var inputTitle = $('.option ul').attr('aktive');
		$('.option ul li').click(function(){
			var input = $(this).next();
			if ( input.attr("aktive") == inputTitle ) {
			  input.removeAttr("aktive");
			  $(this).removeClass('nonaktiv');
			  $('.code').animate({'height':'33.3%'},500);
			  $('.code textarea').animate({'height':'100%'},500);
			} else {
			  input.attr("aktive", inputTitle);
			  $(this).addClass('nonaktiv');
			  $('.code').animate({'height':'50%'},500);
			  $('.code textarea').animate({'height':'100%'},500);
			}
		});
	
	$('li.btnhtml').click(function(){
		$('#shtml').toggle(500);
	});
	$('li.btncss').click(function(){
		$('#scss').toggle(500);
	});
	$('li.btnjavascript').click(function(){
		$('#sjavascript').toggle(500);
	});
	
	if($( window ).width()<670){
		$('#cscript').hide();
		$('#hasilhtml').css({'width':'100%'});
	}else{
		$('#cscript').show();
		$('#hasilhtml').css({'width':'64%'});
	};
	
});
</script>
<script src='<?php echo base_url();?>data/js/textarea.js'></script>
<div id='newhtml'>
	<div id='cscript'>
		<div class='option'>
			<ul aktive='true'>
				<li class='btnhtml'>HTML</li>
				<li class='btncss'>CSS</li>
				<li class='btnjavascript'>JavaScript</li>
				<li style='display:none'></li>
			</ul>
		</div>
		<div class='script'>
<?php
	$hasil = $this->db->get_where('html',array('id_html'=>$this->session->userdata('id_html')))->row();
?>
			<form id='myform' action='<?php echo base_url();?>home/hasilhtml' method='POST'>
			  <div class='code' id="shtml"><span class='title'>HTML</span>
				<textarea name='html'><?php if($hasil)echo $hasil->html;?></textarea></div>
			  <div class='code' id="scss"><span class='title'>CSS</span>
				<textarea name='css'><?php if($hasil)echo $hasil->css;?></textarea></div>
			  <div class='code' id='sjavascript'><span class='title'>JavaScript</span>
				<textarea name='js'><?php if($hasil)echo $hasil->js;?></textarea></div>
			</form>
		</div>
		<!--
		<div class='script'>	
			<form id='myform' action='home/hasilhtml' method='POST'>
			  <div class='code' id="shtml"><span class='title'>HTML</span>
			  <textarea id="html" name="html"></textarea></div>
			  <div class='code' id="scss"><span class='title'>CSS</span>
			  <textarea id="css" name="css"></textarea></div>
			  <div class='code' id="sjavascript"><span class='title'>JavaScript</span>
			  <textarea id="javascript" name="javascript"></textarea></div>
			  <input type='submit' name='coba' value='coba'/>
			</form>
		</div>
		<script>
		$(function(){
		  var html = document.getElementById("html");
		  var css = document.getElementById("css");
		  var jvs = document.getElementById("javascript");

		  window.editor = CodeMirror.fromTextArea(html, {
			mode: "text/html",
			lineNumbers: true,
			lineWrapping: true
		  });
		  window.editor = CodeMirror.fromTextArea(css, {
			mode: "text/css",
			lineNumbers: true,
			lineWrapping: true
		  });
		  window.editor = CodeMirror.fromTextArea(jvs, {
			mode: "javascript",
			lineNumbers: true,
			lineWrapping: true
		  });
		});
		</script>
	-->
	</div>
		<div id='hasilhtml'>
			
		</div>
</div>