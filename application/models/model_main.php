<?php

class Model_Main extends Model
{
	public function get_data($sort = 'id', $sort_method = 'ASC', $offset = 0)
	{
		mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
		$mysqli = new mysqli("localhost", "root", "root", "tasks_db");

		if(empty($sort)){
			$sort = 'id';
		}

		$query = "SELECT * FROM `Task` ORDER BY " . $sort . " " . $sort_method . " LIMIT ?, 3";
		$stmt = $mysqli->prepare($query);
		$stmt->bind_param("i", $offset);
		$stmt->execute();
		$res = mysqli_stmt_get_result($stmt);
		$row = array();

		for ($i=0; $i < $res->num_rows; $i++) {
			$row[$i] = $res->fetch_array(MYSQLI_ASSOC);
		}

		$mysqli->close();
		return $row;
	}

	public function add_data($parametrs)
	{			
		mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
		$mysqli = new mysqli("localhost", "root", "root", "tasks_db");

		$name = filter_var(trim($parametrs['name']), FILTER_SANITIZE_STRING);
		$mail = filter_var(trim($parametrs['mail']), FILTER_SANITIZE_STRING);
		$text = filter_var(trim($parametrs['txt']), FILTER_SANITIZE_STRING);

		$stmt = $mysqli->prepare("INSERT INTO Task(name, mail, txt, status) VALUES ( ?, ?, ?, 0 )");
		$stmt->bind_param("sss", $name, $mail, $text);

		if ($stmt->execute() === TRUE) {
		    echo "<p class='true'>Добавлена новая задача.</p>";
		} else {
		    echo "<p class='false'>Error: " . $query . "<br>" . $mysqli->error . "</p>";
		}

		$mysqli->close();
		return;
	}

	public function edit_status($id)
	{
		mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
		$mysqli = new mysqli("localhost", "root", "root", "tasks_db");

		$Id = array_keys($id);
		$i = $Id[0];
		settype($i, 'integer');

		$stmt = $mysqli->prepare("UPDATE Task SET status=1 WHERE id=?");
		$stmt->bind_param("i", $i);
		$stmt->execute();

		$mysqli->close();
		return;
	}

	public function edit_txt($txt)
	{
		mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
		$mysqli = new mysqli("localhost", "root", "root", "tasks_db");

		$id = $txt['id'];
		$text = $txt['txt'];
		settype($id, 'integer');

		$stmt = $mysqli->prepare("UPDATE Task SET txt=?, edit_status=1 WHERE id=?");
		$stmt->bind_param("si", $text, $id);
		$stmt->execute();

		$mysqli->close();
		return;
	}

	public function get_count_data()
	{
		mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
		$mysqli = new mysqli("localhost", "root", "root", "tasks_db");
		$count_sql = "SELECT COUNT(*) FROM Task";
		$result = $mysqli->query($count_sql);
		$total_rows = mysqli_fetch_array($result)[0];

		return $total_rows;
	}
}