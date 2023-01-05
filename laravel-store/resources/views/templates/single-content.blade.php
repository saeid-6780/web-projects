<div class="singlepost">
	<figure><img alt="" class="img-fluid" src="img/blog-single.jpg"></figure>
	<h1><?=$blog_post->title?></h1>
	<div class="postmeta">
		<ul>
			<li><a href="#"><i class="ti-folder"></i> Category</a></li>
			<li><i class="ti-calendar"></i> <?=$jalalidate?></li>
			<li><a href="#"><i class="ti-user"></i> Admin</a></li>
			<li><a href="#"><i class="ti-comment"></i> (14) Comments</a></li>
		</ul>
	</div>
	<!-- /post meta -->
	<div class="post-content">
		<div class="dropcaps">
			<p><?= $blog_post->description ?></p>
		</div>
	</div>
	<!-- /post -->
</div>