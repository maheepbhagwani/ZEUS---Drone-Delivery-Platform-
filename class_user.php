<?php
class user{
	function sanitize_entries($input){
		$input=mysql_real_escape_string($input);
		$input=htmlspecialchars($input);
		return $input;
		//This fucntion isn't working at all
	}
	function register_user($first_name,$last_name,$age,$aadhaar_number,$login_id,$password,$contact_no){
		/*-----------------------------------------------------------*/
		//$sanitize=new user;
		/*XSS*/
		$first_name=htmlspecialchars($first_name);
		$last_name=htmlspecialchars($last_name);
		$age=htmlspecialchars($age);
		$aadhaar_number=htmlspecialchars($aadhaar_number);
		$login_id=htmlspecialchars($login_id);
		$password=htmlspecialchars($password);
		$contact_no=htmlspecialchars($contact_no);
		/*SQL Injection*/
		$first_name=mysql_real_escape_string($first_name);
		$last_name=mysql_real_escape_string($last_name);
		$age=mysql_real_escape_string($age);
		$aadhaar_number=mysql_real_escape_string($aadhaar_number);
		$login_id=mysql_real_escape_string($login_id);
		$password=mysql_real_escape_string($password);
		$contact_no=mysql_real_escape_string($contact_no);
		$password=md5($password);
		$sql="INSERT INTO customer VALUES('$first_name','$last_name','$age','$aadhaar_number','$login_id','$contact_no','$password')";
		$qry=mysql_query($sql);
		if($qry){
			echo"<script type='text/javascript'>
					$(document).ready(function(){
					new Messi('Registo Efectuado.', {title: 'Sucesso',titleClass:'anim success',buttons:[{id:0,
						label:'Fechar',val:'X'}]});
				})
	</script>";
		}else{
			echo mysql_error();
			echo"<script type='text/javascript'>
					$(document).ready(function(){
					new Messi('Falha A Registar.', {title: 'Falha',titleClass:'anim warning',buttons:[{id:0,
						label:'Fechar',val:'X'}]});
				})
	</script>";
		}
		//echo mysql_error();
	}
}

	?>