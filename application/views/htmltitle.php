<script>
$(function(){
	$('.myformlog').submit(function(){
		$.ajax({url:$(this).attr('action'),type:$(this).attr('method'),data:$(this).serialize(),
		success:function(a){
			$('h5#pesan').html(a);
		}
		});
		return false;
	});
});
</script>
<div id='login'>
	<h2>Judul Html</h2>
	<h5 id='pesan' style='margin:0px 30px;text-align:center;'></h5>
	<form class='myformlog' action='<?php echo base_url();?>home/newhtml/gettitle' method='post'>
		<input type='text' name='title' placeholder='Title' required/>
		<input type='submit' name='save' value='Save' />
	</form>
</div>