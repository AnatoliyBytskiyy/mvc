<?php
class Controller_Main extends Controller
{
	function __construct()
	{
		$this->model = new Model_Main();
		$this->view = new View();
	}

	function action_index()
	{	
		if(isset($_POST['task'])){
			$this->model->add_data($_POST['task']);
		}

		if(isset($_POST['id'])){
			$this->model->edit_status($_POST['id']);	
		}

		if(isset($_POST['edit'])){
			$this->model->edit_txt($_POST['edit']);
		}

		$pageno = 1;
		if (isset($_GET['pageno'])) {
		    $pageno = $_GET['pageno'];
		} 

		$dates = array();
		$size_page = 3;
		$offset = ($pageno-1) * $size_page;
		$count  = $this->model->get_count_data();
		
		$dates['total_pages'] = ceil($count / $size_page);
		$dates['pageno'] = $pageno;
		$dates['data'] = $this->model->get_data($_GET['sort'], $_GET['sort_method'], $offset);
		
		if($_GET['sort']) {
			$dates['sort'] = $_GET['sort'];
		}else{
			$dates['sort'] = 'id';
		}

		if($_GET['sort_method']) {
			$dates['sort_method'] = $_GET['sort_method'];
		}else{
			$dates['sort_method'] = 'ASC';
		}

		$this->view->generate('main_view.php', 'template_view.php', $dates);	
	}
}