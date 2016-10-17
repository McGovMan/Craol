<?php
/*
	Template Name: Events Page
*/
?>
<?php get_header(); ?>

<div id="main-content">


	<div class="container">
		<div id="content-area" class="clearfix">

				<?php 
					$args = array (
						'post_type' => 'event',
						'orderby' => 'event_start_date',
						'order'   => 'ASC',
					);

					$query = new WP_Query ($args);

				?>
				<?php the_content(); ?>
				<div class="et_pb_section  et_pb_section_0 et_section_regular">
					<div class=" et_pb_row et_pb_row_0">
				
						<div class="et_pb_column et_pb_column_4_4  et_pb_column_0">
				
							<div class="et_pb_blog_grid_wrapper">
								<div class="et_pb_blog_grid clearfix et_pb_module et_pb_bg_layout_light  et_pb_cpt_archive_0" data-columns="3">
									<?php if( $query->have_posts() ) : while( $query->have_posts() ) : $query->the_post(); ?>
										<div class="column size-1of3">
											<article id="<?php the_ID(); ?>" class="et_pb_post_type et_pb_post_type_event et_pb_post post-<?php the_ID(); ?> event type-event status-publish has-post-thumbnail hentry article-card" style="padding-bottom: 129px;">
												<div class="et_pb_image_container">
													<a href="<?php the_permalink(); ?>" class="entry-featured-image-url">
														<?php the_post_thumbnail('full'); ?>
													</a>
												</div><!-- .et_pb_image_container -->
												<div class="article-card__content">
													<h2 class="entry-title article-card__title">
														
														<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
													</h2>
													<div class="article-card__excerpt" style="display: none; height: 69px; opacity: 1;">
														<?php the_excerpt(); ?>
													</div>
													<div class="article-card__meta">
														<span class="author vcard article-card__author">
															<a href="http://craol.dev/author/spoogleadmin/" title="Posts by spoogleadmin">spoogleadmin</a>
														</span>
													</div>
												</div>
												<div class="article-card__date">                  
													<span class="article-card__day">
														<?php
															$eventDate = get_field('event_start_date', false, false);
															// make date object
															$eventDate = new DateTime($eventDate);

															//store formated date as a variable
															$formatDate = $eventDate->format('d');

															
															echo $formatDate; 
														?>
													</span>                  
													<span class="article-card__month">
														<?php
															$eventDate = get_field('event_start_date', false, false);
															// make date object
															$eventDate = new DateTime($eventDate);

															//store formated date as a variable
															$formatDate = $eventDate->format('M');

															
															echo $formatDate; 
														?>
													</span>                
												</div>
											</article>
										</div>
									<?php endwhile; endif; wp_reset_postdata(); ?>
							 	</div>
							</div> <!-- .et_pb_posts -->
						</div>
					</div> <!-- .et_pb_column -->
				</div> <!-- .et_pb_row -->
		</div>
	</div> <!-- #left-area -->
</div> <!-- #content-area -->
	
<?php get_footer(); ?>