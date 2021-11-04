<p class="auth_title">Авторизация Администратора</p>

<form action="/admin" method="post">
	<div class="input-group mb-3">
		<div class="input-group-prepend">
		    <span class="input-group-text" id="inputGroup-sizing-default">Логин</span>
		</div>
		<input type="text" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" name='login[name]' required>
	</div>
	<div class="input-group mb-3">
		<div class="input-group-prepend">
		    <span class="input-group-text" id="inputGroup-sizing-default">Пароль</span>
		</div>
		<input type="text" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" name='login[password]' required>
	</div>
	<button type="submit" class="btn btn-outline-primary">Войти</button>
</form>

<script type="text/javascript">
	var data='<?= $data ?>';

	if(data != 0){
		document.cookie = "admin=1";
		location="/";
	}
</script>
