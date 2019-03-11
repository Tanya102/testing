	<header>	
			<!-- Page Header -->
			<div class="page-header">
				<div class="container">
					<div class="row">
						<div class="col-md-10">
							<ul class="page-header-breadcrumb">
								<li><a href="<?php echo base_url('home/')?>">Home</a></li>
								<li>About us</li>
								<li>Contacts</li>
							</ul>
							<h1>WEBMAG</h1>
						</div>
					</div>
				</div>
			</div>
		</header>
		<!-- section -->
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<div class="col-md-8">
						<div class="row">
					<?php 
						$index=1;
						foreach ($category_articles as $data_category) { 
							if($index==1) { ?>
							<!-- post -->
							<div class="col-md-12">
								<div class="post post-thumb">
									<a class="post-img" href="<?php echo base_url('home/show_article/'.$data_category->id) ?>"><img src="<?php echo base_url();?>assets/img/<?php echo $data_category->image; ?>" alt=""></a>
									<div class="post-body">
										<div class="post-meta">
											<a class="post-category cat-2" href="<?php echo base_url('home/category/'.$data_category->category) ?>"><?php echo $data_category->category; ?></a>
											<span class="post-date"><?php echo $data_category->submit_date; ?></span>
										</div>
										<h3 class="post-title"><a href="<?php echo base_url('home/show_article/'.$data_category->id) ?>"><?php echo $data_category->title; ?></a></h3>
									</div>
								</div>
							</div>
							<!-- /post -->
					<?php } else { ?>		
							<!-- post -->
							<div class="col-md-6">
								<div class="post">
									<a class="post-img" href="<?php echo base_url('home/show_article/'.$data_category->id) ?>"><img src="<?php echo base_url();?>assets/img/<?php echo $data_category->image; ?>" alt=""></a>
									<div class="post-body">
										<div class="post-meta">
											<a class="post-category cat-2" href="<?php echo base_url('home/category/'.$data_category->category) ?>"><?php echo $data_category->category; ?></a>
											<span class="post-date"><?php echo $data_category->submit_date; ?></span>
										</div>
										<h3 class="post-title"><a href="<?php echo base_url('home/show_article/'.$data_category->id) ?>"><?php echo $data_category->title; ?></a></h3>
									</div>
								</div>
							</div>
							<!-- /post -->
						<?php } ?>
							<?php $index++;  }?>

							
							
							<div class="clearfix visible-md visible-lg"></div>
							
							<!-- ad -->
							<div class="col-md-12">
								<div class="section-row">
									<a href="#">
										<img class="img-responsive center-block" src="<?php echo base_url();?>assets/img/ad-2.jpg" alt="">
									</a>
								</div>
							</div>
							<!-- ad -->
							<?php foreach ($category_articles as $data_category): ?>
							<!-- post -->
							<div class="col-md-12">
								<div class="post post-row">
									<a class="post-img" href="<?php echo base_url('home/show_article/'.$data_category->id) ?>"><img src="<?php echo base_url();?>assets/img/<?php echo $data_category->image; ?>" alt=""></a>
									<div class="post-body">
										<div class="post-meta">
											<a class="post-category cat-2" href="<?php echo base_url('home/category/'.$data_category->category) ?>"><?php echo $data_category->category; ?></a>
											<span class="post-date"><?php echo $data_category->submit_date; ?></span>
										</div>
										<h3 class="post-title"><a href="<?php echo base_url('home/show_article/'.$data_category->id) ?>"><?php echo $data_category->title; ?></a></h3>
										<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam...</p>
									</div>
								</div>
							</div>
							<!-- /post -->
							<?php endforeach; ?>
							
							
							<div class="col-md-12">
								<div class="section-row">
									<button class="primary-button center-block">Load More</button>
								</div>
							</div>
						</div>
					</div>
					
					<div class="col-md-4">
						<!-- ad -->
						<div class="aside-widget text-center">
							<a href="#" style="display: inline-block;margin: auto;">
								<img class="img-responsive" src="<?php echo base_url();?>assets/img/ad-1.jpg"  alt="">
							</a>
						</div>
						<!-- /ad -->
						
						<!-- post widget -->
						<div class="aside-widget">
							<div class="section-title">
								<h2>Most Read</h2>
							</div>
								<?php foreach ($most_read as $article) { ?>
							<div class="post post-widget">
								<a class="post-img" href="<?php echo base_url('home/show_article/'.$article->id);?>"><img src="<?php echo base_url();?>assets/img/<?php echo $article->image; ?>"  alt=""></a>
								<div class="post-body">
									<h3 class="post-title"><a href="<?php echo base_url('home/show_article/'.$article->id);?>"><?php echo $article->title; ?></a></h3>
								</div>
							</div>
						<?php }?>

							
						</div>
						<!-- /post widget -->
						
						<!-- catagories -->
						<div class="aside-widget">
							<div class="section-title">
								<h2>Categories</h2>
							</div>
							<div class="category-widget">
								<ul>
									<li><a class="cat-1" href="<?php echo base_url('home/category/Technology');?>">Technology<span>340</span></a></li>
									<li><a class="cat-2"href="<?php echo base_url('home/category/Lifestyle');?>">Lifestyle<span>74</span></a></li>
									<li><a  class="cat-4"a href="<?php echo base_url('home/category/Politics');?>">Politics<span>41</span></a></li>
									<li><a  class="cat-3" href="<?php echo base_url('home/category/Food');?>">Food<span>35</span></a></li>
								</ul>
							</div>
						</div>
						<!-- /catagories -->
						
						<!-- tags -->
						<div class="aside-widget">
							<div class="tags-widget">
								<ul>
									<li><a href="#">Chrome</a></li>
									<li><a href="<?php echo base_url('home/category/Technology') ?>">Technology</a></li>
									<li><a href="#">Travel</a></li>
									<li><a href="#">Health</a></li>
									<li><a href="<?php echo base_url('home/category_data/Food') ?>">Food</a></li>
									<li><a href="#">Design</a></li>
									<li><a href="#">Development</a></li>
									<li><a href="<?php echo base_url('home/category_data/Lifestyle') ?>">Lifestyle</a></li>
									<li><a href="<?php echo base_url('home/') ?>">Website</a></li>
								</ul>
							</div>
						</div>
						<!-- /tags -->
						
						<!-- archive -->
						<div class="aside-widget">
							<div class="section-title">
								<h2>Archive</h2>
							</div>
							<div class="archive-widget">
								<ul>
									<li><a href="#">Jan 2018</a></li>
									<li><a href="#">Feb 2018</a></li>
									<li><a href="#">Mar 2018</a></li>
								</ul>
							</div>
						</div>
						<!-- /archive -->
					</div>
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /section -->

		

		<!-- jQuery Plugins -->
		<script src="js/jquery.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/main.js"></script>

	</body>
</html>
