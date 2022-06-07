<?php
include('controllers/UserController.php');
$controller = new UserController();
$login_results = $controller->login();
include('includes/head.php');
?>

<body class="img h-full bg-no-repeat bg-cover" style="background-image: url(images/grandhotelnight.jpg);">
	<div class="flex w-full  justify-center items-center h-full">
		<section class="w-full">
			<div class=" text-white p-5 bg-black " style="--tw-bg-opacity:0.6">
				<div class="row justify-content-center">
					<div class="col-md-6 text-center mb-5">
						<h2 class="text-4xl">Login Page</h2>
					</div>
				</div>
				<?php
				if ($login_results) {
				?>
					<p class="bg-red-200 text-red-600 px-8 py-2">

						<?= $login_results;?>
					</p>
				<?php
				}
				?>
				<div class="row justify-content-center">
					<div class="col-md-6 col-lg-4">
						<div class="login-wrap p-0">
							<form method="POST" class="signin-form">
								<div class="form-group">
									<input type="email" class="form-control" placeholder="Username" name="email" required>
								</div>
								<div class="form-group flex">
									<input id="password-field" type="password" class="w-full rounded-l-md px-4 text-black" name="password" placeholder="Password" required>
									<span toggle="#password-field" class="fa fa-eye field-icon text-xl p-2 rounded-r-md cursor-pointer bg-blue-500 toggle-password"></span>
								</div>
								<div class="form-group">
									<button type="submit" name="login" class="form-control btn btn-primary submit px-3">Sign In</button>
								</div>
								<a href="#">
									<h3 class="mb-4 text-center text-xl">Create account</h3>
								</a>

								<div class="form-group d-md-flex">
									<div class="w-50">
										<label class="checkbox-wrap checkbox-primary">Remember Me
											<input type="checkbox" checked>
											<span class="checkmark"></span>
										</label>
									</div>
									<div class="w-50 text-md-right">
										<a href="#" style="color: #fff">Forgot Password</a>
									</div>
								</div>
							</form>

						</div>
					</div>
				</div>
			</div>
		</section>
	</div>
	<script src="layout/js/jquery.min.js"></script>
	<script src="layout/js/popper.js"></script>
	<script src="layout/js/bootstrap.min.js"></script>
	<script src="layout/js/main.js"></script>
	<script>
		var images = [
			"grandhotelnight.jpg",
			"Hotel-Diplomat-Stockholm.jpg",
			"background-10.jpg"
		]
		var image = images[Math.floor(Math.random() * images.length)];
		document.body.style.backgroundImage = "url(images/" + image + ")";
	</script>
</body>

</html>
