<?php require_once 'app/views/templates/headerPublic.php'?>
<?php
if (session_status() === PHP_SESSION_NONE) {
	session_start();
}

	if(isset($_SESSION['login_error'])) {
		echo '<div class="alert alert-danger">' . $_SESSION['login_error'] . '</div>';
		unset($_SESSION['login_error']);
	}
?>
		
<main role="main" class="container">
    <div class="page-header" id="banner">
        <div class="row mt-5">
            <div class="col-lg-12 text-center">
                <h1>Please Log In</h1>
            </div>
        </div>
    </div>

<div class="row justify-content-center">
    <div class="col-md-6 col-lg-4">
		<form action="/login/verify" method="post" >
		<fieldset>
			<div class="form-group">
				<label for="username">Username</label>
				<input required type="text" class="form-control" name="username">
			</div>
			<div class="form-group">
				<label for="password">Password</label>
				<input required type="password" class="form-control" name="password">
			</div>
            <br>
		    <button type="submit" class="btn btn-primary">Login</button>
		</fieldset>
		</form> 

		<br>
			<a href="/create" class="btn btn-primary">Create Account</a>
	</div>
</div>
</main>
    <?php require_once 'app/views/templates/footer.php' ?>
