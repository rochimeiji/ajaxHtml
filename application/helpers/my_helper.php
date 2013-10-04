<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

function Rupiah($nilaiUang)
{
  $nilaiRupiah 	   = "";
  $jumlahAngka  = strlen($nilaiUang);
  while($jumlahAngka > 3)
  {
    $nilaiRupiah    = "." . substr($nilaiUang,-3) . $nilaiRupiah;
    $sisaNilai         = strlen($nilaiUang) - 3;
    $nilaiUang       = substr($nilaiUang,0,$sisaNilai);
    $jumlahAngka = strlen($nilaiUang);
  }

  $nilaiRupiah       = "Rp " . $nilaiUang . $nilaiRupiah . ",-";
  return $nilaiRupiah;
}
function ajax($class,$url){
	echo"
	<script>
	$(function(){
		$.ajax({url:'".$url."',type:'get',
		success:function(a){
			$('".$class."').html(a);
			$('#nav').load('".page('home/nav')."');
		}
		});
	});
	</script>
	";
}
function refresh(){
	echo '<script>
			$(function(){
				$("body").load("'.base_url().'");
			});
		</script>';
}
function selfPage() {
	$pageURL = 'http';
	//if ($_SERVER["HTTPS"] == "on") {$pageURL .= "s";}
	$pageURL .= "://";
	if ($_SERVER["SERVER_PORT"] != "80") {
		$pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
	} else {
		$pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
	}
	return $pageURL;
}
function page($page='') {
	return base_url().$page;
}
function pagination($url,$paging,$count){
	if($paging > 0){
		echo "<a class='aref' href='".$url.($paging-6)."'>&lt;</a>";
	}
	if($paging < ($count-6)){
		echo "<a class='aref' href='".$url.($paging+6)."'>&gt;</a>";
	}
}
function ajaxAref(){
	echo"
	<script>
	$(function(){
		$('.aref').click(function(){
			$('#ccontent').hide(0);
			$('#ccontent').stop().animate({ opacity: 'show' },500);
			$.ajax({url:$(this).attr('href'),type:'get',
			success:function(a){
				$('#ccontent').html(a);
				$('#nav').load('".page('home/nav')."');
			}
			});
			return false;
		});
	});
	</script>";
}