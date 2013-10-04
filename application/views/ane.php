<script>
$(function(){
	$('#myform').keyup(function(){
		$.ajax({type:'POST', url: '<?php echo base_url();?>home/tane', data:$(this).serialize(),
		success: function(response) {
			$('#tampil').html(response);
		}});
		return false;
	});
});
</script>
<form id='myform' action='asdsa'>
	<textarea name='name'></textarea>
</form>
<div id='tampil'>
cob dulu ya
</div>