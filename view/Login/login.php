<?php
/*
================================

Este archivo muestra un formulario que
se envía a insertar.php, el cual guardará
los datos
================================
*/
?>
<?php

include_once './headerlogin.php'; ?>
<div class="row">
	<div class="col-12">
		<h1>Login</h1>
		<form action="../../app/user/configlogin.php" method="POST">
			<div class="form-group">
				<label for="user">Usuario</label>
				<input required name="user" type="text" id="user" placeholder="User" class="form-control">
			</div>
			<div class="form-group">
				<label for="pass">Password</label>
				<input required name="pass" type="number" id="pass" placeholder="Pass" class="form-control">
			</div>
			<button type="submit" class="btn btn-success">Login</button>

		</form>
	</div>
</div>
<?php 
include_once '../../resources/footer.php'; ?>