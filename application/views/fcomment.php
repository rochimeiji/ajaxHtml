<?php
	$id_forum = $this->session->userdata('id_forum');
	$this->db->join('user','user.id_user = forum.id_user');
	$row = $this->db->get_where('forum',array('id_forum'=>$id_forum))->row();
?>
<div id='cforum'>
	<div class='tanggal'>Tanggal : 31-08-2013 Jam : 09:44</div>
	<div class='profil'>
		<center><img src='<?php echo $row->photo;?>'/></center>
		<center><?php echo $row->nama;?><br><?php echo $row->kelas;?></center>
	</div>
	<div class='comment'>
		<h2><?php echo $row->judul;?></h2>
		<p><?php echo $row->pesan;?></p>
	</div>
	<div class='cl'></div>
</div>
<div class='cl'></div>
<?php
	$id_forum = $this->session->userdata('id_forum');
	$this->db->join('user','user.id_user = fcomment.id_user');
	$this->db->order_by('id_fcoment','asc');
	$query = $this->db->get_where('fcomment',array('id_forum'=>$id_forum))->result();
	foreach($query as $row){
?>
<div id='cforum'>
	<div class='tanggal'>Tanggal : 31-08-2013 Jam : 10:44</div>
	<div class='profil'>
		<center><img src='<?php echo $row->photo;?>'/></center>
		<center><?php echo $row->nama;?><br><?php echo $row->kelas;?></center>
	</div>
	<div class='comment'><?php echo $row->pesan;?>
	</div>
	<div class='cl'></div>
</div>
<div class='cl'></div>
<?php } ?>