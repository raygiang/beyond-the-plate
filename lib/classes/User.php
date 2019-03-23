<?php

	class User
	{
		private $id;
		private $email;
		private $password;
		private $firstname;
		private $lastname;
		private $role;

		public function __construct()
		{

		}

		public function successfulLogin($email,$db)
		{
			$time=time();
			$sql = "UPDATE users SET last_login=:time WHERE email=:email";
			$pst = $db->prepare($sql);
			$pst->bindParam(':time',$time);
			$pst->bindParam(':email',$email);
			$count = $pst->execute();
			return $count;
		}
		public function verifyUser($email,$password,$db)
		{
			$sql = "SELECT * FROM users WHERE email=:email";
			$pst = $db->prepare($sql);
			$pst->bindParam(':email',$email);
			$pst->execute();

			if($user=$pst->fetch(PDO::FETCH_OBJ))
			{
				//var_dump($user);
				if(password_verify($password,$user->password))
				{
					return $user;
				}
				else
				{
					return false;
				}
			}
			else
			{
				return false;
			}
		}
		public function addUser($email,$password,$firstname,$lastname,$role,$db)
		{
			$sql = "INSERT INTO users (email,password,first_name,last_name,last_login,role,is_deleted,created_date,modified_date) 
			VALUES (:email,:password,:first_name,:last_name,:last_login,:role,:is_deleted,:created_date,:modified_date)";
			$pst = $db->prepare($sql);
			$pst->bindParam(':email',$email);
			$pst->bindParam(':password',password_hash($password,PASSWORD_BCRYPT));
			$pst->bindParam(':first_name',$firstname);
			$pst->bindParam(':last_name',$lastname);
			$pst->bindParam(':last_login',0);
			$pst->bindParam(':role',2);
			$pst->bindParam(':is_deleted',0);
			$pst->bindParam(':created_date',time());
			$pst->bindParam(':modified_date',time());
			$count = $pst->execute();
			return $count;
		}
		public function deleteUser($id,$db)
		{
			$sql = "UPDATE users SET is_deleted=1 WHERE id=:id";
			$pst = $db->prepare($sql);
			$pst->bindParam(':id',$id);
			$count = $pst->execute();
			return $count;
		}
		public function updateUser($id,$email,$password,$firstname,$lastname,$role,$db)
		{
			$sql = "UPDATE users SET email=:email,password=:password,first_name=:first_name,last_name=:last_name,modified_date=:modified_date 
			WHERE id=:id"; 
			$pst = $db->prepare($sql);
			$pst->bindParam(':email',$email);
			$pst->bindParam(':password',password_hash($password,PASSWORD_BCRYPT));
			$pst->bindParam(':first_name',$firstname);
			$pst->bindParam(':last_name',$lastname);
			$pst->bindParam(':modified_date',time());
			$pst->bindParam(':id',$id);
			$count = $pst->execute();
			return $count;
		}
	}

?>