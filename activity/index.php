<?php

/**
 * Template Name: BuddyPress - Activity Directory
 *
 * @package BuddyPress
 * @subpackage Theme
 */

get_header( 'buddypress' ); ?>
	<?php do_action( 'bp_before_directory_activity_page' ); ?>
	<div class="topClass">
		<div class="container mainDivider">
			<div class="row">
				<div class="pages">
					<div class="threecol last">
						<div class="widget">
							<?php locate_template( array( 'activity/bz-activity-sidebar.php' ), true ); ?>
						</div>
					</div>
					
					<div class="ninecol last leftSider">
					<div class="twelvecol last">
					
					<div class="VibePageTitle">
						<div class="threecol last"><h1>City Vibe</h1></div>
						
						<div class="item-list-tabs no-ajax" id="subnav" role="navigation">
							<div class="fourcol last rightSelect">
								<?php echo _e("Order by:","bazaar") ?>
									<select id="orderResult">
										<option value="date">Latest</option>
										<option value="distance">Nearest</option>
									</select>
							</div>
							<div class="threecol last rightSelect">
									<select id="sortResult">
										<option value="descending">Descending</option>
										<option value="ascending">Ascending</option>
									</select>
							</div>
						</div>
						
					</div>
					
					<div class="vibeSearchText">
							<div class="searchInput fivecol">
								<input type="text" name="searchKey" id="searchKey" value="" placeholder="Search" />
							</div>	
							<div class="searchInput fivecol">
								<input value="" type="text" class="defaultAddress" name="searchAddress" id="searchAddress" value="" placeholder="Please enter an address here" />
							</div>	
							<div class="searchInput twocol last">
								<button type="button" class="submit btn btn-warning" id="searchButton">Submit</button>
							</div>							
					</div>					
					
					<div id="content">
						<div class="padder">
							<div id="cityVibeMapElement">
								<div id="cityVibeMap" style="height: 250px;" role="map">
								</div>
							</div>
							
							<div class="main-content-city-vibe bp-content buzz-contents">
								<?php do_action( 'bp_before_directory_activity' ); ?>
									<?php if ( !is_user_logged_in() ) : ?>
										<h3><?php _e( 'Site Activity', 'buddypress' ); ?></h3>
									<?php endif; ?>
								<?php do_action( 'bp_before_directory_activity_content' ); ?>
								
								<?php do_action( 'template_notices' ); ?>
								


							<?php do_action( 'bp_before_directory_activity_list' ); ?>

							<div class="activity" role="main">

								<?php //locate_template( array( 'activity/activity-loop.php' ), true ); ?>

							</div><!-- .activity -->

							<?php do_action( 'bp_after_directory_activity_list' ); ?>

							<?php do_action( 'bp_directory_activity_content' ); ?>

							<?php do_action( 'bp_after_directory_activity_content' ); ?>

							<?php do_action( 'bp_after_directory_activity' ); ?>
						</div><!--main-content-city-vibe-->
						</div><!-- .padder -->
					</div><!-- #content -->
				</div>
				</div>
				
			</div><!-- .pages -->
			</div><!-- .row -->
		</div><!-- .mainDivider -->
</div><!-- #.topClass -->
<?php do_action( 'bp_after_directory_activity_page' ); ?>
<script type='text/javascript' src='<?php echo get_bloginfo('stylesheet_directory');?>/js/bazaar-activity.js?ver=1'></script>
<script type='text/javascript'>
jQuery(document).ready(function($){$('.defaultAddress').val(bazaarSettings.siteGeo.location_address);});
</script>
<?php get_footer( 'buddypress' ); ?>
