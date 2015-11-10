<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>BBS</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<?php echo Asset::css('bootstrap.css'); ?>
	<?php echo Asset::js('bootstrap.js'); ?>
</head>
<body>
	<div class="container">
		<div class="row">

			<div class="span6 offset3">
				<h2>掲示板</h2>
				<form method="post" action="/bbs/submit">
					<fieldset>
						<input type="text" name="name" placeholder="投稿者"><br>
						<textarea name="message" rows="6" placeholder="メッセージ"></textarea><br>
						<button class="btn btn-large btn-primary" type="submit">投稿</button>
					</fieldset>
				</form>
				<!-- IDを適当な文字列、パスワードに「' OR 'A'='A」と入力すると・・  -->
			</div>

			<div class="span6 offset3">
				<?php
					foreach($all_post as $post) {
/*

						print($post['name'] . '：');
						print(date("Y-m-d H:i:s", $post['created_at']));
						print($post['message']);
*/
						print('<div>');
						print('<span class="name">' . $post['name'] . '</span>：');
						print('<span class="date">' . date("Y-m-d H:i:s", $post['created_at']) . '</span><br>');
						print('<span class="message">' . $post['message'] . '</span>');
						print('</div>');

					}
				?>
			</div>

		</div>
	</div> <!-- /container -->
</body>
</html>
