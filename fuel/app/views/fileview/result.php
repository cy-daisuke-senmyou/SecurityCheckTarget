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
				<h2>ファイル出力結果</h2>
				<div class="hero-unit">
					<p><?php if(!empty($file)) echo $file ?></p>
				</div>
			</div>
		</div>
	</div> <!-- /container -->
</body>
</html>
