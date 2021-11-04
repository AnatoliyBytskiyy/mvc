<script src="../../js/Cookie.js"></script>

<div class="row">
	<div class="col-9">
		<form action="/" method="get">
			<div class="row">
				<!-- <div class="form-group"> -->
				<div class="col">
			    <select class="form-control" id="exampleFormControlSelect1" name="sort">
			     	<option disabled>Сортировать по</option>
			     	<option selected value="id">ID</option>
				   	<option value="name">Имени</option>
				   	<option value="mail">Имейлу</option>
				   	<option value="status">Статусу</option>
			    </select>
			  </div>
			  <div class="col">
			    <select class="form-control" id="exampleFormControlSelect2" name="sort_method">
			     	<option disabled>Сортировать по</option>
			     	<option selected value="ASC">Возрастанию</option>
				   	<option value="DESC">Убыванию</option>
			    </select>
			  </div>
			  <div class="col">
			  	<button type="submit" class="btn btn-outline-primary">Сортировать</button>
				</div>
			</div>
		</form>
	</div>
	<div class="col-3">
		<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
		  Новая задача
		</button>
	</div>	
</div>

</br>
<script src="../../js/EditText.js"></script>

<table class="table">
  <thead>
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Имя</th>
      <th scope="col">Мыло</th>
      <th scope="col">Текст</th>
      <th scope="col">Статус</th>
    </tr>
  </thead>
  <tbody>
<?php
	foreach($data as $row)
	{
		echo '<tr><th scope="row">'.$row['id'].'</th><td>'.$row['name'].'</td><td>'.$row['mail'].'</td><td>';

		if($_COOKIE["admin"] == 1){
			echo "<form id='link".$row['id']."' action='/' method='post'><a href='#' onclick='editText(event, "."\"".$row['txt']."\"".", ".$row['id'].")'>".$row['txt']."</a></form>";
		}else{
			echo $row['txt'];
		}

		echo '</td><td>';

		if($row['status']){
			echo "<p class='true'>Выполненно</p>";
		}else{
			if($_COOKIE["admin"] == 1){
				echo "<form action='/' method='post'><input type='hidden' name='id[".$row['id']."]'><button type='submit' class='btn btn-outline-primary'>Не выполненно</button></form>";
			}else{
				echo "<p class='false'>Не выполненно</p>";
			}
		}

		if($row['edit_status']){
			echo "<p class='edited'>Отредактировано администратором</p>";
		}

		echo '</td></tr>';
	}
?>
  </tbody>
</table>

<ul class="pagination">
  <li>
  	<a id="first" href="<?php echo "?pageno=1&sort=".$sort."&sort_method=".$sort_method; ?>">First</a>
  </li>
  <li class="<?php if($pageno <= 1){ echo 'disabled'; } ?>">
    <a id="prev" href="<?php if($pageno <= 1){ echo '/'; } else { echo "?pageno=".($pageno - 1)."&sort=".$sort."&sort_method=".$sort_method; } ?>">Prev</a>
  </li>
  <li class="<?php if($pageno >= $total_pages){ echo 'disabled'; } ?>">
    <a id="next" href="<?php if($pageno >= $total_pages){ echo "/?pageno=".$total_pages."&sort=".$sort."&sort_method=".$sort_method; } else { echo "?pageno=".($pageno + 1)."&sort=".$sort."&sort_method=".$sort_method; } ?>">Next</a>
  </li>
  <li>
  	<a id="last" href="?pageno=<?php echo $total_pages."&sort=".$sort."&sort_method=".$sort_method; ?>">Last</a>
  </li>
</ul>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Добавить задачу</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="/" method="post">
					<div class="input-group mb-3">
						<div class="input-group-prepend">
					    <span class="input-group-text" id="inputGroup-sizing-default">Имя</span>
					  </div>
					  <input id="name" type="text" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" name='task[name]' required>
					</div>
					<div class="input-group mb-3">
						<div class="input-group-prepend">
					    <span class="input-group-text" id="inputGroup-sizing-default">Мыло</span>
					  </div>
					  <input id="mail" type="email" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" name='task[mail]' required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$">
					</div>
					<div class="input-group mb-3">
						<div class="input-group-prepend">
					    <span class="input-group-text" id="inputGroup-sizing-default">Текст</span>
					  </div>
					  <input id="txt" type="text" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" name='task[txt]' required>
					</div>
					<button type="submit" class="btn btn-outline-primary">Добавить</button>
				</form>
      </div>
    </div>
  </div>
</div>