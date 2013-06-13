<!DOCTYPE html>
<html>
<head>
	<title>POSTS Index view</title>
</head>
<body>
<h1>hello my blog</h1>
<p><a href="<?=base_url()?>posts/new_post" title="New Post">New Post</a></p>
<?php 
if(!isset($posts)) {
?>
<p>There are no post on my blog.</p>
<?php
}else{
	foreach ($posts as $row) {
?>
<h2><a href="<?=base_url()?>posts/post/<?=$row['postID']?>"><?=$row['title']?></a></h2>
<h2><a href="<?=base_url()?>posts/editpost/<?=$row['postID']?>" title="Edit">Edit</a>
	<a href="<?=base_url()?>posts/deletepost/<?=$row['postID']?>" title="Delete">Delete</a>
</h2>
<p><?=substr(strip_tags($row['post']),0,150).'...'?></p>
<hr />
<?php
	}
}
 ?>
 <?=$pages?>
</body>
</html>