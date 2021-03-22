<?php $this->view("header", $data); ?>
	
	<section id="form"><!--form-->
		<div class="container">
			<div class="row">
				<div class="col-sm-4"></div>
				<div class="col-sm-4">
					<div class="login-form"><!--login form-->
						<h2>Login to your account</h2>
						<form method="post">
							<input type="email" name="email" placeholder="Email" />
							<input type="password" name="password" placeholder="Password" />
							<span>
								<input type="checkbox" class="checkbox"> 
								Keep me signed in
							</span>
							<span style="color:red; margin:10px 5px;"><?php check_error()."<br>" ?></span>
							<button type="submit" class="btn btn-default">Login</button>
						</form>
						<br>
						<a href="<?= ROOT ?>signup">Dont have an account? Signup here</a>
					</div><!--/login form-->
				</div>
				
				<div class="col-sm-4"></div>
			</div>
		</div>
	</section><!--/form-->