<html>
<head>
	<title>Forum HTML</title></head>
<?php
	$ajs = array('jquery-1.8.2.js','editor/codemirror.js','editor/xml.js','editor/css.js','editor/javascript.js');
	foreach($ajs as $js){
		echo "<script src='".base_url()."data/js/".$js."'></script>";
	}
	$page = $this->session->userdata('page');
	if($page!=null){
	echo"
	<script>
	$(function(){
		$.ajax({url:'".$page."',type:'get',
		success:function(a){
			$('#ccontent').html(a);
		}
		});
	});
	</script>";
	}
?>
	<link href='<?php echo base_url()?>data/css/style.css' rel='stylesheet' type='text/css' />
	<link href='<?php echo base_url()?>data/js/editor/codemirror.css' rel='stylesheet' type='text/css' />
<body>
<?php $this->load->view('part/nav');?>
<div id='ccontent'>
<div id='loading'></div>

</div>
<?php $this->load->view('part/footer'); ?>
</body>
</html>