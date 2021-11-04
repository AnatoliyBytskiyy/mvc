<?php
class Model_Admin extends Model
{
	public function get_data($login = false)
	{	
		if($login){
			$log = filter_var(trim($login['name']), FILTER_SANITIZE_STRING);
			$pass = filter_var(trim($login['password']), FILTER_SANITIZE_STRING);

			mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
			$mysqli = new mysqli("localhost", "root", "root", "tasks_db");

			$stmt = $mysqli->prepare("SELECT name FROM Admin WHERE name = ? AND password = ?");
			$stmt->bind_param("ss", $log, $pass);
			$stmt->execute();
			$stmt->bind_result($user);
			$stmt->fetch();

			if(count($user) == 0){
				echo "<p class='false'>Логин или пароль введен не верно!</p>";
			}else{
				echo "<p class='true'>Авторизация прошла успешно!</p>";
			}

			return $user;
		}

		return 0;
	}
}