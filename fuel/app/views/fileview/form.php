<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>FileViewer</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<?php echo Asset::css('bootstrap.css'); ?>
	<?php echo Asset::js('bootstrap.js'); ?>
</head>
<body>
	<div class="container">
		<div class="row">

			<div class="span6 offset3">
				<form method="post" action="/fileview/submit">
					<h2>ファイルビューアー</h2>
					<p>閲覧したいファイル名を以下のフォームに入力して下さい。</p>
					<fieldset>
						<input type="text" name="filename" placeholder="ファイル名"><br>
						<button class="btn btn-large btn-primary" type="submit">表示</button>
					</fieldset>
				</form>
			</div>

			<div class="span6 offset3">
				<?php if(!empty($file)) echo $file ?>
			</div>

		</div>
	</div> <!-- /container -->
</body>
</html>
