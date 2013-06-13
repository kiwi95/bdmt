<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Edit Post</title>
</head>
<body>
	<?php if($success == 1){ ?>
	<div>this post has been ipdated</div>
	<? } ?>
	<form action="<?=base_url()?>posts/editpost/<?=$post['postID']?>" method="post" >
	<p>Title:<br /><input type="text" name="title" value="<?=$post['title']?>"></p>
	<p>Description:<br /><textarea name="post"><?=$post['post']?></textarea></p>
	<p><input type="submit" value="Edit post"></p>
</form>

</body>
</html>