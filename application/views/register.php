<div id='register'>
	<h2>Register</h2>
	<h5 id='pesan' style='margin:0px 30px;text-align:center;'></h5>
	<form class='myformreg' action='<?php echo base_url();?>home/action/register' method='post' enctype='multipart/form-data'>
		<input type='text' name='nama' placeholder='Nama Lengkap' required/>
		<input type='text' name='user' placeholder='Username' required/>
		<input type='password' name='pass' placeholder='********' required/>
		<input type='file' id='img' name='foto' title='Foto' placeholder='Foto' />
		<select name='kelas'>
			<?php 
			$tampil = $this->db->get('kelas')->result();
			foreach($tampil as $row){
				echo"
				<option value='".$row->kelas."'>".$row->kelas."</option>
				";
			}?>
		</select>
		<input type='text' name='alamat' placeholder='Alamat' />
		<input type='email' name='email' placeholder='Email' />
		<input type='text' name='hp' placeholder='No HP' />
		<input type='submit' name='register' value='REGISTER'/>
	</form>
</div>