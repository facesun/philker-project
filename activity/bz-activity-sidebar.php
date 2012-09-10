<div class="bp-sidebar">
	<li class="localNavMenu">
		<div class="itemSideNav" role="user-section">
			<?php if( is_user_logged_in() ): ?>
				<?php locate_template( array( 'activity/bz-mini-post-form.php'), true ); ?>
			<?php endif; ?>
		</div>
		<div class="itemSideNav" role="navigation">
		    <h2>View Events</h2>
			<ul id="hyperlocal-nav" class="nav nav-list">
				
				<?php //do_action( 'bp_before_activity_type_tab_all' ); ?>
				
				<li id="activity-global" class="selected" rel="thirdparty">
					<a title="Global Activity"><i class="icon-road iconHyperNav"></i> <?php echo _e('Local Updates','bazaar'); ?></a>
				</li>
				
				<li id="activity-all" rel="bazaar">
					<a title="Bazaar Members"><i class="icon-user iconHyperNav"></i> <?php echo _e('Bazaar Members','bazaar'); ?></a>
				</li>
				
				<?php if ( is_user_logged_in() ) : ?>
					<?php //do_action( 'bp_before_activity_type_tab_friends' ) ?>
					
						<li id="activity-following">
							<a title="The public activity for everyone you are following on this site">
							<i class="icon-hand-up iconHyperNav"></i> Following <span><?php printf( __( '%d', 'bp-follow' ), (int)$counts['following'] ) ?></span>
							</a>
						</li>			
						
						<?php if ( bp_is_active( 'friends' ) ) : ?>
							<?php if ( bp_get_total_friend_count( bp_loggedin_user_id() ) ) : ?>
								<li id="activity-friends" rel="bazaar"><a href="<?php echo bp_loggedin_user_domain() . bp_get_activity_slug() . '/' . bp_get_friends_slug() . '/'; ?>" title="<?php _e( 'The activity of my friends only.', 'bazaar' ); ?>"><i class="icon-heart-empty iconHyperNav"></i> <?php printf( __( 'My Friends <span>%s</span>', 'bazaar' ), bp_get_total_friend_count( bp_loggedin_user_id() ) ); ?></a></li>
							<?php endif; ?>
						<?php endif; ?>
						<?php do_action( 'bp_before_activity_type_tab_groups' ) ?>
				<li id="activity-groups" rel="bazaar">
					<a title="My Groups"><i class="icon-group iconHyperNav"></i> <?php echo _e('My Groups','bazaar'); ?></a>
				</li>
					<?php do_action( 'bp_before_activity_type_tab_favorites' ); ?>
				<li id="activity-favorites" rel="bazaar">
					<a title="My Favorites"><i class="icon-gift iconHyperNav"></i> <?php echo _e('My Favorites','bazaar'); ?></a>
				</li>
					<?php do_action( 'bp_before_activity_type_tab_mentions' ); ?>						
				<li id="activity-mentions" rel="bazaar">
					<a title="My Mentions"><i class="icon-comments-alt iconHyperNav"></i> <?php echo _e('My Mentions','bazaar'); ?></a>
				</li>
					<?php do_action( 'bp_activity_type_tabs' ); ?>
				<?php endif; ?>
				<li id="activity-pics" rel="thirdparty">
					<a title="Pictures"> 
						<i class="icon-picture"></i> <?php echo _e('Images','bazaar'); ?>
					</a>
				</li>
				<li id="activity-tips" class="" rel="thirdparty">
					<a title="Tips"><i class="icon-star-empty iconHyperNav"></i> <?php echo _e('Tips','bazaar'); ?></a>
				</li>
				<li id="activity-tweets" class="" rel="thirdparty">
					<a title="Tweets"><i class="icon-twitter iconHyperNav"></i> <?php echo _e('Tweets','bazaar'); ?></a>
				</li>
			</ul>
		</div>
	</li>
</div>

<script id="loadTemplate" type="text/template">
<ul id="activity-stream" class="activity-list item-list">
<%_.each( listings, function( value ){ %>
	<% if( value.type == "twitter" ) { %>
	<li class="activity activity_update activity-item">
		<div class="activity-avatar">
		<a href="<%=value.link%>">
			<img src="<%=value.user.profile_image%>" alt="Profile picture of admin" class="avatar user-1-avatar" width="50" height="50">
		</a>
		</div>
		<div class="activity-content">
			<div class="activity-header">
				<div class="stream_headers"></div>			
				<p><a href="<%=value.link%>" title="<%=value.user.name%>"><%=value.user.name%></a> posted an update via <%=value.type%> <a href="<%=value.link%>" class="view activity-time-since" title="View Discussion"><span class="time-since"><%=value.time_ago%></span></a></p>
			</div>
			<div class="activity-inner">
			<%=value.text%>
			</div>
			<div class="activity-header">
			<i class="icon-map-marker"></i> <%=value.distance%> Miles Near You
			</div>
		</div>
	</li>
	
	<% } else if (value.type == "foursquare") { %>
	<li class="activity activity_update activity-item">
		<div class="activity-avatar">
		<a href="#">
			<img src="<%=value.user.avatar%>" alt="Profile picture of admin" class="avatar user-1-avatar" width="50" height="50">
		</a>
		</div>
		<div class="activity-content">
			<div class="activity-header">
				<div class="stream_headers"></div>			
				<p><a href="#" title="<%=value.user.name%>"><%=value.user.name%></a> posted an update via <%=value.type%> <a href="<%=value.link%>" class="view activity-time-since" title="View Discussion"><span class="time-since"><%=value.time_ago%></span></a></p>
			</div>
			<div class="activity-inner">
			<img style="float:left;margin:0 10px 10px 0" src="<%=value.category_icon_url%>" />
			<%=value.text%>
			</div>
			<div class="activity-header">
			<i class="icon-map-marker"></i> <%=value.distance%> Miles Near You
			</div>
			<div class="activity-meta">
				<a class="acomment-reply bp-primary-action" href="<%=value.link%>" target="_blank">View</a>
			</div>
		</div>
		
	</li>
	<% } else if (value.type == "instagram") { %>
	<li class="activity activity_update activity-item">
		<div class="activity-avatar">
			<a href="#">
				<img src="<%=value.user.profile_picture%>" alt="Profile picture of admin" class="avatar user-1-avatar" width="50" height="50">
			</a>
		</div>
		<div class="activity-content">
			<div class="activity-header">
				<div class="stream_headers"></div>			
				<p><a href="#" title="<%=value.user.name%>"><%=value.user.name%></a> posted an update via <%=value.type%> <a href="<%=value.link%>" class="view activity-time-since" title="View Discussion"><span class="time-since"><%=value.time_ago%></span></a></p>
			</div>
			<div class="activity-inner">
			<img src="<%=value.images.thumbnail%>" class="activity-pics" style="float:left; margin-right: 10px;" />
				<%=value.user.text%>
			</div>
			<div class="activity-header">
				<i class="icon-map-marker"></i> <%=value.distance%> Miles Near You
			</div>
			<div class="activity-meta">
				<a class="acomment-reply bp-primary-action" href="<%=value.link%>" target="_blank">View</a>
			</div>
		</div>
	</li>
	<% } else if ( value.type == "bz_activity" ) { %>
	<li class="activity activity_update activity-item" id="activity-<%=value.id%>">
		<div class="activity-avatar">
		<a href="#">
			<%=value.author_html%>
			<!--<img src="" alt="Profile picture of admin" class="avatar user-1-avatar" width="50" height="50">-->
		</a>
		</div>
		<div class="activity-content">
			<div class="activity-header">
				<div class="stream_headers"></div>			
				<p><%=value.action%></p>
			</div>
			<div class="activity-inner">
			<%=value.content%>
			</div>
			<div class="activity-header">
			<i class="icon-map-marker"></i> <%=value.distance%> Miles Near You
			</div>
			<?php if( is_user_logged_in() ): ?>
			<div class="activity-meta">
					<a href="" class="acomment-reply bp-primary-action" id="acomment-comment-<%=value.id%>">Comment</a>
					<?php $del_url = bp_get_root_domain() . '/' . bp_get_activity_root_slug() . '/delete/'; ?>
					<?php $fav_url = bp_get_root_domain() . '/' . bp_get_activity_root_slug() . '/favorite/'; ?>
					<a href="<?php echo $del_url; ?><%=value.id%>?_wpnonce=<?php echo wp_create_nonce('mark_favorite');?>" class="fav bp-secondary-action" title="<?php esc_attr_e( 'Mark as Favorite', 'bazaar' ); ?>"><?php _e( 'Favorite', 'bazaar' ) ?></a>
					<a href="<?php echo $del_url; ?><%=value.id%>?_wpnonce=<?php echo wp_create_nonce('bp_activity_delete_link');?>" class="button item-button bp-secondary-action delete-activity confirm" rel="nofollow">Delete</a>
			</div>
			<div class="activity-comments">	
				<% if(value.comments){ %>
				<ul>
				<%_.each( value.comments, function( v ){ %>
					<%_.each( v, function( vs ){ %>
					<li id="acomment-<%=vs.id%>">
						<div class="acomment-avatar">
							<a href="<%=vs.primary_link%>">
								<%=vs.avatar_html%>		
							</a>
						</div>

						<div class="acomment-meta">
							<%=vs.action%>
							<span class="time-since"><%=vs.time_since%></span>	
						</div>

						<div class="acomment-content">
						<%=vs.content%>
						</div>

						<div class="acomment-options">

							
								<?php $urls = get_bloginfo('siteurl')."/activity"; ?>
								<a href="<?php echo $urls; ?>/delete/<%=vs.id%>?cid=<%=vs.id%>&amp;_wpnonce=<?php echo wp_create_nonce('bp_activity_delete_link');?>" class="delete acomment-delete confirm bp-secondary-action btn danger" rel="nofollow">Delete</a>
						</div>

					</li>
					
					<% }); %>
				<% }); %>
				</ul>
			<% } %>
				<form action="http://bazaar.me/bazaar-buzz/reply/" method="post" id="ac-form-<%=value.id%>" class="ac-form root">
					<div class="ac-reply-avatar">
					<?php echo get_avatar( get_current_user_id(), 50 ); ?>	
					</div>
					<div class="ac-reply-content">
						<div class="ac-textarea">
							<textarea id="ac-input-<%=value.id%>" class="ac-input" name="ac_input_<%=value.id%>"></textarea>
						</div>
						<input type="submit" name="ac_form_submit" class="btn primary" value="Post"> &nbsp; or press esc to cancel.						<input type="hidden" name="comment_form_id" value="<%=value.id%>">
					</div>

					<?php wp_nonce_field('new_activity_comment','_wpnonce_new_activity_comment'); ?>
					
				</form>
			</div>
			<?php endif; ?>
		</div>
	</li>
	<% } %>
<% }); %>
</ul>
<% if(actType == "all") { %>
	<% if( limitCount <= listings.count ) { %>
	<div id="loadMore">
		<a class="loadmoreText" id="loadTitle">Load More</a>
		<div class="progress progress-success progress-striped active" style="display:none;margin-bottom: 2px;">
		  <div class="bar" style="width: 100%;"></div>
		</div>
	</div>
	<% } %>
<% } %>
</script>


<script id="loadTemplates" type="text/template">
<ul id="activity-stream" class="activity-list item-list">
<%_.each( listings, function( value ){ %>
	<li class="activity activity_update activity-item" id="activity-<%=value.id%>">
		<div class="activity-avatar">
		<a href="#">
			<%=value.author_html%>
			<!--<img src="" alt="Profile picture of admin" class="avatar user-1-avatar" width="50" height="50">-->
		</a>
		</div>
		<div class="activity-content">
			<div class="activity-header">
				<div class="stream_headers"></div>			
				<p><%=value.action%></p>
			</div>
			<div class="activity-inner">
			<%=value.content%>
			</div>
			<div class="activity-header">
			<i class="icon-map-marker"></i> <%=value.distance%> Miles Near You
			</div>
			<?php if( is_user_logged_in() ): ?>
			<div class="activity-meta">
					<a href="" class="acomment-reply bp-primary-action" id="acomment-comment-<%=value.id%>">Comment</a>
					<?php $del_url = bp_get_root_domain() . '/' . bp_get_activity_root_slug() . '/delete/'; ?>
					<?php $fav_url = bp_get_root_domain() . '/' . bp_get_activity_root_slug() . '/favorite/'; ?>
					<a href="<?php echo $del_url; ?><%=value.id%>?_wpnonce=<?php echo wp_create_nonce('mark_favorite');?>" class="fav bp-secondary-action" title="<?php esc_attr_e( 'Mark as Favorite', 'bazaar' ); ?>"><?php _e( 'Favorite', 'bazaar' ) ?></a>
					<a href="<?php echo $del_url; ?><%=value.id%>?_wpnonce=<?php echo wp_create_nonce('bp_activity_delete_link');?>" class="button item-button bp-secondary-action delete-activity confirm" rel="nofollow">Delete</a>
			</div>
			<div class="activity-comments">	
				<% if(value.comments){ %>
				<ul>
				<%_.each( value.comments, function( v ){ %>
					<%_.each( v, function( vs ){ %>
					<li id="acomment-<%=vs.id%>">
						<div class="acomment-avatar">
							<a href="<%=vs.primary_link%>">
								<%=vs.avatar_html%>		
							</a>
						</div>

						<div class="acomment-meta">
							<%=vs.action%>
							<span class="time-since"><%=vs.time_since%></span>	
						</div>

						<div class="acomment-content">
						<%=vs.content%>
						</div>
						
						<div class="acomment-options">

								<?php $urls = get_bloginfo('siteurl')."/activity"; ?>
								<a href="<?php echo $urls; ?>/delete/<%=vs.id%>?cid=<%=vs.id%>&amp;_wpnonce=<?php echo wp_create_nonce('bp_activity_delete_link');?>" class="delete acomment-delete confirm bp-secondary-action btn danger" rel="nofollow">Delete</a>
						</div>

					</li>
					
					<% }); %>
				<% }); %>
				</ul>
			<% } %>
				<form action="http://bazaar.me/bazaar-buzz/reply/" method="post" id="ac-form-<%=value.id%>" class="ac-form root">
					<div class="ac-reply-avatar">
					<?php echo get_avatar( get_current_user_id(), 50 ); ?>	
					</div>
					<div class="ac-reply-content">
						<div class="ac-textarea">
							<textarea id="ac-input-<%=value.id%>" class="ac-input" name="ac_input_<%=value.id%>"></textarea>
						</div>
						
						
						<input type="submit" name="ac_form_submit" class="btn primary" value="Post"> &nbsp; or press esc to cancel.						<input type="hidden" name="comment_form_id" value="<%=value.id%>">
					</div>

					<?php wp_nonce_field('new_activity_comment','_wpnonce_new_activity_comment'); ?>
					
				</form>
			</div>
			<?php endif; ?>
		</div>
	</li>
<% }); %>
</ul>
</script>