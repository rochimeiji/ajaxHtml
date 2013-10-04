<div id='forum'>
	<h1>Forum</h1>
<?php 
	$this->db->join('user','user.id_user = forum.id_user');
	$query = $this->db->get('forum')->result();
	foreach($query as $row){
?>
	<div id='iforum'>
		<img src='<?php echo $row->photo?>' />
		<div class='content'>
		<h2><a class='aref' href='<?php echo base_url();?>home/fcomment/<?php echo $row->id_forum;?>'><?php echo $row->judul;?></a></h2>
		<p><?php echo $row->pesan;?></p>
		</div>
	</div>
		<div class='cl'></div>
<?php } ?>
</div>