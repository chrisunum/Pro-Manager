<?php $this->view("header", $data); ?>
	
	<section id="form"><!--form-->
		<div class="container">
			<div class="row">
				<div class="col-sm-4"></div>
				
				<div class="col-sm-4">
					<div class="signup-form"><!--sign up form-->
						<h2>New User Signup!</h2>
						<form method="post">
							<input type="text" name="name" placeholder="Username"/>
							<input type="email" name="email" placeholder="Email Address"/>
							<input type="password" name="password" placeholder="Password"/>
							<input type="password" name="password2" placeholder="Password"/>
							<span style="color:red; margin:10px 5px;"><?php check_error()."<br>" ?></span>
							<button type="submit" class="btn btn-default">Sign Up</button>
							<br>
							<a href="<?= ROOT ?>login">Already have an account? login here</a>
						</form>
					</div><!--/sign up form-->
				</div>

				<div class="col-sm-4"></div>
			</div>
		</div>
	</section><!--/form-->