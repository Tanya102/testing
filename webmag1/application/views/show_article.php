<!-- section --><!-- Page Header -->
			<div id="post-header" class="page-header">
				<div class="background-img" style="background-image: url('<?php echo base_url();?>assets/img/<?php echo $selected_article->image; ?>');"></div>
				<div class="container">
					<div class="row">
						<div class="col-md-10">
							<div class="post-meta">
								<a class="post-category cat-2" href="category.html"><?php echo $selected_article->category; ?></a>
								<span class="post-date"><?php echo $selected_article->submit_date; ?></span>
							</div>
							<h1><?php echo $selected_article->title; ?></h1>
						</div>
					</div>
				</div>
			</div>
			<!-- /Page Header -->
    <input type="hidden" name="article_id" value="<?php echo  $selected_article->id; ?>" id="article_id">
       
		<!-- section -->
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<!-- Post content -->
					<div class="col-md-8">
						<div class="section-row sticky-container">
							<div class="main-post">
								<h3><?php echo $selected_article->title; ?></h3>
								
								<p><?php echo $selected_article->description; ?></p>
								<figure class="figure-img">
									<img class="img-responsive" src="<?php echo base_url();?>assets/img/<?php echo $selected_article->image; ?>" alt="">
									<figcaption><?php echo $selected_article->title; ?></figcaption>
								</figure>
								<p><?php echo $selected_article->description; ?></p>
								
								<blockquote class="blockquote">
									<?php echo $selected_article->title; ?>
								</blockquote>
							    <p><?php echo $selected_article->description; ?></p>
								<h3><?php echo $selected_article->title; ?></h3>
								<p><?php echo $selected_article->description; ?></p>
							</div>
							<div class="post-shares sticky-shares">
								<a href="#" class="share-facebook"><i class="fa fa-facebook"></i></a>
								<a href="#" class="share-twitter"><i class="fa fa-twitter"></i></a>
								<a href="#" class="share-google-plus"><i class="fa fa-google-plus"></i></a>
								<a href="#" class="share-pinterest"><i class="fa fa-pinterest"></i></a>
								<a href="#" class="share-linkedin"><i class="fa fa-linkedin"></i></a>
								<a href="#"><i class="fa fa-envelope"></i></a>
							</div>
						</div>

						<!-- ad -->
						<div class="section-row text-center">
							<a href="#" style="display: inline-block;margin: auto;">
								<img class="img-responsive" src="<?php echo  base_url('') ?>assets/img/ad-2.jpg" alt="">
							</a>
						</div>
						<!-- ad -->
						
						<!-- author -->
						<div class="section-row">
							<div class="post-author">
								<div class="media">
									<div class="media-left">
										<img class="media-object" src="<?php echo  base_url('') ?>assets/img/avatar.png" alt="">
									</div>
									<div class="media-body">
										<div class="media-heading">
											<h3>John Doe</h3>
										</div>
										<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
										<ul class="author-social">
											<li><a href="#"><i class="fa fa-facebook"></i></a></li>
											<li><a href="#"><i class="fa fa-twitter"></i></a></li>
											<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
											<li><a href="#"><i class="fa fa-instagram"></i></a></li>
										</ul>
									</div>
								</div>
							</div>
						</div>
						<!-- /author -->

						<!-- comments -->
						<div class="section-row">
							<div class="section-title">
								<h2>3 Comments</h2>
							</div>

							<div class="post-comments">
								<!-- comment -->
								<?php foreach ($comments as $data) :
									?>
								<div class="media">
									<div class="media-left">
										<img class="media-object" src="<?php echo  base_url('') ?>assets/img/avatar.png" alt="">
									</div>
									<div class="media-body">
										<div class="media-heading">
											<h4><?php echo $data->user_name ; ?></h4>
											<span class="time"><?php echo $data->submit_date ; ?></span>
											<a href="#" class="reply">Reply</a>
										</div>
										<p><?php echo $data->comment ; ?></p>

									
										
									</div>
								</div>
								<!-- /comment -->
								<?php endforeach; ?>

							
							</div>
						</div>
						<!-- /comments -->

						<!-- reply -->
						<div class="section-row">
							<div class="section-title">
								<h2>Leave a reply</h2>
								<p>your email address will not be published. required fields are marked *</p>
							</div>

							<form class="post-reply" method="POST">
								<div class="row">
									<div class="col-md-4">
										<div class="form-group">
											<span>Name *</span>
											<input class="input" value="" type="text" name="user_name" id="user_name">
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<span>Email *</span>
											<input class="input" value="" type="email" name="email" id="email">
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<span>Website</span>
											<input class="input" value="" type="text" name="website" id="website">
										</div>
									</div>
									<div class="col-md-12">
										<div class="form-group">
											<textarea class="input" name="comment" id ="comment" placeholder="Message" value=""></textarea>
										</div>
										<button class="primary-button" id="submit" >Submit</button>
									</div>
								</div>
							</form>
						</div>
						<!-- /reply -->
					</div>
					<!-- /Post content -->

					<!-- aside -->
					<div class="col-md-4">
						<!-- ad -->
						<div class="aside-widget text-center">
							<a href="#" style="display: inline-block;margin: auto;">
								<img class="img-responsive" src="<?php echo base_url();?>assets/img/ad-1.jpg" alt="">
							</a>
						</div>
						<!-- /ad -->

					<div class="aside-widget">
							<div class="section-title">
								<h2>Most Read</h2>
							</div>
                             <?php foreach($most_read as $pop_article) :?>
							<div class="post post-widget">
								<a class="post-img" href="<?php echo base_url('home/show_article/'.$pop_article->id);?>"><img src="<?php echo base_url();?>assets/img/<?php echo $pop_article->image; ?> " alt=""></a>
								<div class="post-body">
									<h3 class="post-title"><a href="<?php echo base_url('home/show_article/'.$pop_article->id);?>"><?php echo $pop_article->title; ?> </a></h3>
								</div>
							</div>
							<?php endforeach; ?>
						</div>
						<!-- post widget -->
						<div class="aside-widget">
							<div class="section-title">
								<h2>Featured Posts</h2>
							</div>
							<?php  foreach ($promoted_articles as $article): ?>	
					<!-- post -->
					
						<div class="post post-thumb">
							<a class="post-img" href="<?php echo base_url('home/show_article/'.$article->id) ?> "><img src="<?php echo base_url();?>assets/img/<?php echo $article->image; ?> " alt=""></a>
							<div class="post-body">
								<div class="post-meta">
									<a class="post-category cat-2" href="<?php echo base_url('home/category/'.$article->category) ?> "><?php echo $article->category; ?> </a>
									<span class="post-date"><?php echo $article->submit_date; ?> </span>
								</div>
								<h3 class="post-title"><a href="<?php echo base_url('home/show_article/'.$article->id) ?>"><?php echo $article->title; ?> </a></h3>
							</div>
						</div>
					</div>
					<!-- /post -->

			     <?php endforeach; ?>

				
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
									<li><a href="<?php echo base_url('home/category/Food') ?>">Food</a></li>
									<li><a href="#">Design</a></li>
									<li><a href="#">Development</a></li>
									<li><a href="<?php echo base_url('home/category/Lifestyle') ?>">Lifestyle</a></li>
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
									<li><a href="#">January 2018</a></li>
									<li><a href="#">Febuary 2018</a></li>
									<li><a href="#">March 2018</a></li>
								</ul>
							</div>
						</div>
						<!-- /archive -->
					</div>
					<!-- /aside -->
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /section -->

		<!-- /section -->
	  <script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
<script type="text/javascript">
  $(document).ready(function(){
        $("#submit").click(function(){
        
        var comment = $('#comment').val();
        var user_name = $('#user_name').val();
        var email = $('#email').val();
        var website = $('#website').val();
        var article_id = $('#article_id').val();
        $.ajax({
            url: "<?php echo base_url('home/insert'); ?>",
            type : 'POST',
            data: {
                comment: comment,
                user_name: user_name,
                email: email,
                website: website,
                article_id : article_id,
                
            },
            success : function(res) {
            }
         
        });
    }); 
 });


</script>

