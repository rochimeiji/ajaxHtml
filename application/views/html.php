<?php ajaxAref();?>
<script>
$(function(){
	$('.confirm').click(function(){
		if(confirm('Yakin untuk menhapusnya,.?')){
			$.ajax({url:$(this).attr('url'),type:'get',
				success:function(a){
					$('#ccontent').html(a);
				}
			});
		}else{
			return false;
		}
	});
});
</script>
<div id='ckarya'>
<?php
	$query = $this->db->get('html')->result();
	
	foreach($query as $row){
	if($row->id_user==$this->session->userdata('id_user')){
		echo"
		<div class='vkarya'>
			<div class='title'>
				<h5 align='center'><a class='aref' href='".base_url()."home/html?id_html=".$row->id_html."'>".$row->title."</a>
				<a icon-delete url='".base_url()."home/action/delete/".$row->id_html."' class='confirm' title='delete'></a>
				</h5>
			</div>
			<div class='cl'></div>
			<div class='kimg'>
			
			</div>
		</div>";
	}
	};
?>
</div>
		<div class='cl'></div>