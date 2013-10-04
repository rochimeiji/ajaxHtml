<?php
	$id_user = $this->session->userdata('id_user');
	$tampil = $this->db->get_where('user',array('id_user'=>$id_user))->row();
?>
<div id='cprofil'>
	<img src='<?php echo $tampil->photo;?>'/>
	Nama : <?php echo $tampil->nama;?><br>
	Kelas : <?php echo $tampil->kelas;?><br>
	User : <?php echo $tampil->user;?><br>
	Pass : <u><a href='#'>Edit</a></u>
	<div class='cl'></div>
</div>
