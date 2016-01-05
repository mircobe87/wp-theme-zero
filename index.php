<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

		<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url'); ?>/libs/bootstrap/css/bootstrap.min.css"/>
		<link rel="stylesheet/less" type="text/css" href="<?php bloginfo('template_url'); ?>/less/style.less"/>

		<script src="<?php bloginfo('template_url'); ?>/libs/jquery/js/jquery-1.11.3.min.js"></script>
		<script src="<?php bloginfo('template_url'); ?>/libs/bootstrap/js/bootstrap.min.js"></script>
		<script src="<?php bloginfo('template_url'); ?>/libs/less/js/less.min.js"></script>

		<title>
			<?php bloginfo('name');?>
		</title>
	</head>
	<body class="container">
		<?php get_header();?>
		<div class="row">
					<div id="loop" class="col-xs-12 col-sm-8 col-md-9 col-lg-9 tile">
						<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
							<article>
								<header>
									<?php the_title(); ?>
								</header>
								<div>
									<?php the_content(); ?>
								</div>
								<footer>
									<?php the_author(); ?>
								</footer>
							</article>
						<?php endwhile; else : ?>
							<p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
						<?php endif; ?>
					</div>
					<div class="col-xs-12 col-sm-4 col-md-3 col-lg-3 tile">
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
					</div>
		</div>
		<?php get_footer();?>
	</body>
</html>
