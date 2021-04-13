<?php
	/*
	  This is the main template part used in the tabbed search results as they are found at www.paidmembershipspro.com.
	  This will not function on it's own. Some notes:
	  * This is part of a child theme using the Memberlite theme as a parent.
	  * There is a search.php file in the child theme folder that loads this template part.
	  * There is also a search-result.php template part used by this.
	  * This also relies on CSS styles in Memberlite and our child theme.
	*/
	
	global $query_string, $s;
	
	//do searches across 3 post types
	$posts = query_posts($query_string . '&post_type=post&posts_per_page=25');
	$pages = query_posts(array("s"=>$s, "post_type"=>array('page', 'hook'), "posts_per_page"=>25));
	$topics = query_posts($query_string . '&post_type=topic&posts_per_page=25');
	
	//figure out counts
	if(count($posts) == 25)
		$posts_count = "25+";
	else
		$posts_count = count($posts);
	if(count($pages) == 25)
		$pages_count = "25+";
	else
		$pages_count = count($pages);
	if(count($topics) == 25)
		$topics_count = "25+";
	else
		$topics_count = count($topics);
?>

<div class="row">
		
	<div id="content" class="span9 blogposts">
	
		<div class="memberlite_tabbable">
			<ul class="memberlite_tabs">
				<li class="memberlite_active"><a href="#tab1" data-toggle="tab">From the Blog (<?php echo $posts_count;?>)</a></li>
				<li><a href="#tab2" data-toggle="tab">Documentation (<?php echo $pages_count;?>)</a></li>
				<li><a href="#tab3" data-toggle="tab">Forums (<?php echo $topics_count;?>)</a></li>
			</ul>
								
			<div class="memberlite_tab_content">
				<div class="memberlite_tab_pane memberlite_active" id="tab1">
												
					<?php if(!empty($posts)) { ?>
					
						<?php foreach($posts as $post) { ?>
						
							<?php get_template_part( 'templates/search', 'result' ); ?>
			
						<?php } ?>
					
					<?php } else { ?>	
					
						<div class="post page">
							<h2 class="pagetitle">No Search Results Found</h2>
							<div class="pagetext">
								<p>Your search returned no results.</p>
								<p>Please try another search above or <a href="<?php echo get_option('home'); ?>/">visit the homepage</a> or visit our <a href="/site-map/">site map</a>.</p>	
							</div> <!-- end pagetext -->
						</div> <!-- end post, page -->
						
					<?php } ?>							
				</div> <!-- end memberlite_tab_pane -->
				
				<div class="memberlite_tab_pane" id="tab2">							
					<?php if(!empty($pages)) { ?>
						
						<?php foreach($pages as $post) { ?>
						
							<?php get_template_part( 'templates/search', 'result' ); ?>
			
						<?php } ?>
						
					<?php } else { ?>								
						
						<div class="post page">
							<h2 class="pagetitle">No Search Results Found</h2>
							<div class="pagetext">
								<p>Your search returned no results.</p>
								<p>Please try another search above or <a href="<?php echo get_option('home'); ?>/">visit the homepage</a> or visit our <a href="/site-map/">site map</a>.</p>	
							</div> <!-- end pagetext -->
						</div> <!-- end post, page -->
			
					<?php } ?>
				</div> <!-- end memberlite_tab_pane -->
				
				<div class="memberlite_tab_pane" id="tab3">
			
					<?php if(!empty($topics)) { ?>
						
						<?php foreach($topics as $post) { ?>
						
							<?php get_template_part( 'templates/search', 'result' ); ?>
			
						<?php } ?>
					
					<?php } else { ?>								
						
						<div class="post page">
							<h2 class="pagetitle">No Search Results Found</h2>
							<div class="pagetext">
								<p>Your search returned no results.</p>
								<p>Please try another search above or <a href="<?php echo get_option('home'); ?>/">visit the homepage</a> or visit our <a href="/site-map/">site map</a>.</p>	
							</div> <!-- end pagetext -->
						</div> <!-- end post, page -->
			
					<?php } ?>
					
				</div> <!-- end memberlite_tab_pane -->
			</div> <!-- end memberlite_tab_content -->
		</div> <!-- end tabbable -->
		
	</div> <!-- end content -->

	<?php //get_sidebar(); ?>
	
</div> <!-- end row -->
