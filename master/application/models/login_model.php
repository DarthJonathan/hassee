<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_model extends CI_Model {

	public function checkUsername ($username, $password)
	{
		return $this->db->query("SELECT * FROM `master_users` WHERE `username` = '$username' AND `password` = '$password'")->row();
	}

	public function checkUser ($email)
	{
		return $this->db->query("SELECT * FROM `master_users` WHERE `email` = '$email'")->row();
	}

	public function resetPass ($email)
	{
		$newPass = hash_password(substr(md5(microtime()),rand(0,26),5));

		if($this->db->query("UPDATE users SET password = '$newPass' WHERE email = '$email'"))
		{
			$to = $email;
				$subject = "Your Login In " . $company ." .gethassee.com";
				$message = "Hello!
							Your Reseted Password is
							
							Password : $newPass\n
							
							For Safety Please Quickly Change Your Password!";
								   
				$headers = 'From: noreply@gethassee.com' . "\r\n" .
							'Reply-To: devs@gmail.com' . "\r\n" .
							'X-Mailer: PHP/' . phpversion();
								
					if(mail($to, $subject, $message, $headers))
					{
						
						return true;
					}else
					{
						return false;
					}
		}else
		{
			return false;
		}
	}
}