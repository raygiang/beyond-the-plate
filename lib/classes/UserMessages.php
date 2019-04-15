<?php
	class UserMessages
	{
		public function sendmessage($authorid,$currentuserid,$usermessage,$db)
			{
				$sql = "INSERT INTO usermessages(author_id,current_userid,user_message,sent_date) 
				VALUES(:authorid,:currentuserid,:usermessage,:sent_date)";
				$time=time();
				$pdostm = $db->prepare($sql);
				$pdostm->bindParam(':authorid',$authorid);
				$pdostm->bindParam(':currentuserid',$currentuserid);
				$pdostm->bindParam(':usermessage',$usermessage);
				$pdostm->bindParam(':sent_date',$time);
				$count = $pdostm->execute();
				return $count;
			}
	
		public function getAllMessages($userid,$db)
			{
				$sql = "SELECT usermessages.user_message,users.first_name AS 'authorfname',users.last_name AS 'authorlname' 
				FROM usermessages
				INNER JOIN users 
				ON usermessages.current_userid=users.id  where usermessages.author_id=:id";
				$pdostm = $db->prepare($sql);
				$pdostm->bindParam(':id',$userid);
				$pdostm->execute();
				$messages=$pdostm->fetchAll(PDO::FETCH_OBJ);
				return $messages;
			}
	}
?>