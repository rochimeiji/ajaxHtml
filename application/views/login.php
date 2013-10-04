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
	<h2>LOGIN</h2>
	<h5 id='pesan' style='margin:0px 30px;text-align:center;'></h5>
	<form class='myformlog' action='<?php echo base_url();?>home/action/login' method='post'>
		<input type='text' name='user' placeholder='Username' required/>
		<input type='password' name='pass' placeholder='********' required/>
		<input type='submit' name='login' value='LOGIN' />
	</form>
</div>