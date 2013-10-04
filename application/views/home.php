<!--START Navigation Content-->
<?php ajaxAref();?>
<script>
$(function(){
	$('#pagination a').click(function(){
		$('#ccontent').hide(0);
		$('#ccontent').stop().animate({ opacity: 'show' },500);
		$.ajax({url:$(this).attr('href'),type:"get",
		success:function(a){
			$('#ccontent').html(a);
		}
		});
		return false;
	});
});
</script>
<div id='navc'>
	<ul>
		<li><a class='aktif' href='#'>Terbaru</a></li>
		<li><a href='#'>Terpopuler</a></li>
	</ul>
	<div id='pagination'><?php echo $pagination?></div>
	<div class='cl'></div>
</div>
	<div class='cl'></div>
<div id='ckarya'>
<?php
foreach($query as $row){
	echo"
	<div class='vkarya'>
		<div class='title'>
			<img src='".$row->photo."'/>
			<h5>".$row->nama." - ".$row->kelas."</h5>
		</div>
		<div class='cl'></div>
		<a class='aref' href='".base_url()."home/html?id_html=".$row->id_html."'><div class='kimg'>
			".$row->title."
		</div></a>
	</div>
	";
}?>
</div>
		<div class='cl'></div>
<!-- END Navigation Content-->