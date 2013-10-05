<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class home extends CI_Controller {

	public function __construct(){
		parent::__construct();	
		//zainu rochim
		//$this->session->sess_destroy();
		$this->load->library('pagination');
	}
	public function index()
	{
		if($this->session->userdata('page')==null){
			$this->session->set_userdata('page',page('home/homee'));
		}
		$this->load->view('main');
	}
	public function homee()
	{
		$this->session->unset_userdata('newhtml');
		$config['base_url'] = base_url().'home/homee/';
		$config['per_page'] = 6;
		$config['uri_segment'] = 3;
		$config['display_pages'] = FALSE;
		$config['next_link'] = '&gt;';
		$config['prev_link'] = '&lt;';
		$config['total_rows'] = $this->db->count_all('html');
		$paging = $this->uri->segment(3);
		$this->pagination->initialize($config);
		
		$this->db->limit($config['per_page'],$paging);
		$this->db->order_by('id_html','desc');
		$this->db->join('user','user.id_user = html.id_user');
		$data['pagination'] = $this->pagination->create_links();;
		$data['query'] = $this->db->get('html')->result();
		
		$this->session->set_userdata('page',selfPage());
		$this->load->view('home',$data);
		//refresh();
	}
	public function nav()
	{
		$this->load->view('part/nav');
	}
	public function login(){
		$this->session->set_userdata('page',selfPage());
		$this->load->view('login');
		//refresh();
	}
	public function forum(){
		$this->session->unset_userdata('newhtml');
		$this->session->set_userdata('page',selfPage());
		$this->load->view('forum');
		//refresh();
	}
	public function fcomment(){
		$this->session->set_userdata('id_forum',$this->uri->segment(3));
		$this->session->set_userdata('page',selfPage());
		$this->load->view('fcomment');
		//refresh();
	}
	public function profil(){
		$this->session->unset_userdata('newhtml');
		$this->session->set_userdata('page',selfPage());
		$this->load->view('profil');
		//refresh();
	}
	public function register(){
		$this->session->set_userdata('page',selfPage());
		$this->load->view('register');
		//refresh();
	}
	public function html(){
		$this->session->unset_userdata('newhtml');
		if(isset($_GET['id_html'])){
			$this->session->set_userdata('page',selfPage());
			$this->session->set_userdata('id_html',$_GET['id_html']);
			$this->session->set_userdata('newhtml',true);
			$this->load->view('newhtml');
			//refresh();
		}else{
			$this->session->set_userdata('page',selfPage());
			$this->load->view('html');
			//refresh();
		}
	}
	public function newhtml(){
		$this->session->unset_userdata('newhtml');
		if($this->uri->segment(3)=='gettitle'){
			$data = array('title'=>$_POST['title'],'id_user'=>$this->session->userdata('id_user'));
			$this->db->insert('html',$data);		
			$this->session->unset_userdata('id_html');
			$this->session->set_userdata('page',selfPage());
			$this->session->set_userdata('newhtml',true);
			$this->db->select_max('id_html');
			$query = $this->db->get('html')->row();
			$id_html = $query->id_html;
			$this->session->set_userdata('id_html',$id_html);
			$page = 'home/html?id_html='.$id_html;
			ajax('#ccontent',page($page));
		}else{
		if($this->session->userdata('id_user')!=null){
			$this->session->set_userdata('page',selfPage());
			$this->load->view('htmltitle');
		}else{
			$this->session->unset_userdata('id_html');
			$this->session->set_userdata('page',selfPage());
			$this->load->view('newhtml');
		}}
		//refresh();
	}
	public function savehtml(){
		$this->load->view('hasilhtml');
	}
	public function hasilhtml(){
		echo"<script>".$_POST['js']."</script>
			<style>".$_POST['css']."</style>
			".$_POST['html']."
		";
	}
	public function action(){
		if($this->uri->segment(3)=='register'){
			$dir = "./data/foto/";
			$image = $dir.$_FILES['foto']['name'];
			$urlImage = base_url()."data/foto/".$_FILES['foto']['name'];
			if(move_uploaded_file($_FILES['foto']['tmp_name'],$image)){
				echo "<script>alert('berhasil')</script>";
				$data = array(
					'nama' => $_POST['nama'],
					'user' => $_POST['user'],
					'pass' => sha1($_POST['pass']),
					'photo' => $urlImage,
					'kelas' => $_POST['kelas'],
					'email' => $_POST['email'],
					'alamat' => $_POST['alamat'],
					'hp' => $_POST['hp']
				);
				$this->db->insert('user',$data);
				$this->session->set_userdata('page',page('home/login'));
				redirect();
			}else{
				echo "<script>alert('gagal')</script>";
			}
		}
		if($this->uri->segment(3)=='login'){
		$query = $this->db->get_where('user',array('user'=>$_POST['user'],'pass'=>sha1($_POST['pass'])))->row();
			if($query!=null){
				$this->session->unset_userdata('error');
				$this->session->set_userdata('page',page('home/homee'));
				$this->session->set_userdata('login','true');
				$this->session->set_userdata('id_user',$query->id_user);
				ajax('#ccontent',page('home/homee'));
			}else{
				if($this->session->userdata('error')!=null){
					$total = $this->session->userdata('error')+1;
					$this->session->set_userdata('error',$total);
				}else{
					$this->session->set_userdata('error',1);
				}
				$er = $this->session->userdata('error');
				echo "Username atau Password anda salah ".$er." kali, silahkan coba lagi ";
			}
		}
		if($this->uri->segment(3)=='delete'){
			$this->db->where('id_html',$this->uri->segment(4));
			$this->db->delete('html');
			$this->load->view('html');
			//refresh();
		}
		if($this->uri->segment(3)=='logout'){
			$this->session->unset_userdata('login');
			$this->session->unset_userdata('id_user');
			$this->session->set_userdata('page',selfPage());
			$this->load->view('login');
			//refresh();
		}
		if($this->uri->segment(3)=='savehtml'){
			$this->db->where('id_html',$this->session->userdata('id_html'));
			$data = array('html'=>$_POST['html'],'css'=>$_POST['css'],'js'=>$_POST['js']);
			$this->db->update('html',$data);
		}
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */