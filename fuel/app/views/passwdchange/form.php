<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>PasswordChange</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<?php echo Asset::css('bootstrap.css'); ?>
	<?php echo Asset::js('bootstrap.js'); ?>
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="span6 offset3">
				<form method="post" action="/passwdchange/submit">
					<h2>パスワード変更</h2>
					<fieldset>
						<input type="password" name="password" placeholder="Password"><br>
						<button class="btn btn-large btn-primary" type="submit">送信</button>
					</fieldset>
				</form>
			</div>
		</div>
	</div> <!-- /container -->
</body>
</html>
