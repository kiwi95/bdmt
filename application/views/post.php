<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Show One Post</title>
</head>
<body>
<?php if(empty($post)){ ?>
	<h2> empty post;</h2>
<? } else { ?>
	<h2><?=$post['title']?></h2>
	<?=$post['post']?>
<? } ?>
</body>
</html>