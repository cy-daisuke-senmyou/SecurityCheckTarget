<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>LoginForm</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<?php echo Asset::css('bootstrap.css'); ?>
	<?php echo Asset::js('bootstrap.js'); ?>
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="span6 offset3">
				<form method="post" action="/login/submit">
					<h2>Please sign in</h2>
					<fieldset>
						<input type="text" name="username" placeholder="UserName"><br>
						<input type="password" name="password" placeholder="Password">
						<label class="checkbox">
						  <input type="checkbox" value="remember-me"> Remember me
						</label>
						<button class="btn btn-large btn-primary" type="submit">Sign in</button>
					</fieldset>
				</form>
				<!-- IDを適当な文字列、パスワードに「' OR 'A'='A」と入力すると・・  -->
			</div>
		</div>
	</div> <!-- /container -->
</body>
</html>
