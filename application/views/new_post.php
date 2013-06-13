<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>New Post</title>
</head>
<body>
	<h1>hfidosaho</h1>
<form action="<?=base_url()?>posts/new_post" method="post" >
	<p>Title:<br /><input type="text" name="title" placeholder="title"></p>
	<p>Description:<br /><textarea name="post"></textarea></p>
	<p><input type="submit" value="Add post"></p>
</form>
</body>
</html>