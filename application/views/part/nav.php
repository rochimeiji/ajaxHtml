<?php ajaxAref();?>
<script>
$(function(){	
	$('.savehtml').click(function(){
		$.ajax({type:'POST', url: '<?php echo base_url();?>home/action/savehtml', data:$('#myform').serialize(),
		success: function(response) {
			//$('#hasilhtml').html(response);
		}});
			alert('Berhasil Menyimpan');
		return false;
	});
});
</script>
<div id='nav'>
	<div class='logo'>
	<a class='aref' href='<?php echo base_url();?>home/homee'><img src='<?php echo base_url();?>data/gambar/logoE.png' /></a>
	</div>
	<ul class='navl'>	
	<?php if($this->session->userdata('login')!=null){
		echo"<li><a class='aref' href='".base_url()."home/newhtml'>New</a></li>";
		echo"<li><a class='aref' href='".base_url()."home/html'>Html</a></li>";
		$hasil = $this->db->get_where('html',array('id_html'=>$this->session->userdata('id_html')))->row();
		if(($this->session->userdata('newhtml') == true)&&($hasil->id_user==$this->session->userdata('id_user'))){
		echo"<li><a class='savehtml' href='".base_url()."home/savehtml'>Save</a></li>";
		}
		}else{
			//echo"<li><a class='aref' href='".base_url()."home/hello'>Hello</a></li>";
			echo "<li><a class='aref' href='".base_url()."home/newhtml'>New</a></li>";
		}
	?>
		<li><a class='aref' href='<?php echo base_url();?>home/forum'>Forum</a></li>
	</ul>
	<ul class='navr'>
	<?php if($this->session->userdata('login')!=null){
		echo"<li><a class='aref' href='".base_url()."home/profil'>Profil</a></li>";
		echo"<li><a class='aref' href='".base_url()."home/action/logout'>Logout</a></li>";
		}else{
		echo "
			<li><a class='aref' href='".base_url()."home/login'>Login</a></li>
			<li><a class='aref' href='".base_url()."home/register'>Register</a></li>";
		}
	?>
	</ul>
</div>