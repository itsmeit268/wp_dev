<?php
/*-----------------------------------------------------------------------------------*/
/*  EXTHEM.ES
/*  PREMIUM WORDRESS THEMES
/*
/*  STOP DON'T TRY EDIT
/*  IF YOU DON'T KNOW PHP
/*  AS ERRORS IN YOUR THEMES ARE NOT THE RESPONSIBILITY OF THE DEVELOPERS
/*
/*
/*  @EXTHEM.ES
/*  Follow Social Media Exthem.es
/*  Youtube : https://www.youtube.com/channel/UCpcZNXk6ySLtwRSBN6fVyLA
/*  Facebook : https://www.facebook.com/groups/exthem.es
/*  Twitter : https://twitter.com/ExThemes
/*  Instagram : https://www.instagram.com/exthemescom/
/*	More Premium Themes Visit Now On https://exthem.es/
/*
/*-----------------------------------------------------------------------------------*/ 
?>

				
<div class="rmp-rating-widget js-rmp-rating-widget dlpro-rating-widget">
  <div class="row-rmp-rating-widget">
    <div id="left-rating" class="col-md-4 text-center">
      <div class="rmp-heading rmp-heading--title"> Rating </div>
      <p class="dlpro-averagerating js-rmp-results">
        <span class="js-rmp-avg-rating">4.3</span>
      </p>
      <span class="dlpro-votecount">( <span class="js-rmp-vote-count">17518325</span> Votes ) </span>
    </div>
    <div id="right-rating" class="col-md-8">
	<?php if (shortcode_exists( 'ratemypost' )) {
		echo do_shortcode( '[ratemypost]' );
		}
	?>
     
       
    </div>
  </div>
</div>			
				
 
<style>
				
/* Rating Plugin https://wordpress.org/plugins/rate-my-post/ */
.rmp-widgets-container.rmp-wp-plugin.rmp-main-container {
    text-align: left;
	color: #888888;
	margin: 10px 0 20px 0;
}
.rmp-results-widget__avg-rating,
.rmp-results-widget__vote-count {
	font-size: 10px;
	color: #aaaaaa;
}
.dlpro-votecount {
	font-size: 13px;
	line-height: 13px;
}
.rmp-rating-widget {
	border: 1px solid rgba(0,0,0,0.05);
	background-color: rgba(0,0,0,0.05);
	padding: 20px;
	margin: 0 auto;
	font-size: 12px;
	-webkit-border-radius:8px;
	border-radius:8px;
}
.rmp-rating-widget .rmp-icon--ratings {
	font-size: 1.8rem;
}
.rmp-widgets-container.rmp-wp-plugin.rmp-main-container .rmp-heading.rmp-heading--title {
	margin: 0 0 5px 0;
	font-size: 16px;
	font-weight: 700;
	-webkit-border-radius:8px;
	border-radius:8px;
}
.rmp-widgets-container.rmp-wp-plugin.rmp-main-container .rmp-heading.rmp-heading--title .small-text {
	font-size: 13px;
	color: #333333;
}
#left-rating {border-right: 4px solid #ffffff;}
@media (max-width: 992px) {
	#left-rating {border-right: 0px; border-bottom: 4px solid #ffffff;margin-bottom: 20px;padding-bottom: 20px;}
}
.dlpro-averagerating {
	font-size: 38px;
	line-height: 38px;
	font-weight: 700;
}
/* Rating Plugin https://id.wordpress.org/plugins/wp-postratings/ */
.dlpro-postratings-results {
	font-size: 10px;
	color: #aaaaaa;
	margin-top: 5px;
}
.row-rmp-rating-widget {
  margin-left: -10px;
  margin-right: -10px;
  display: flex;
  flex-wrap: wrap;
  align-items: flex-start;
}

.col-md-1, .col-md-2, .col-md-3, .col-md-4, .col-md-5, .col-md-6, .col-md-7, .col-md-8, .col-md-9, .col-md-10, .col-md-11, .col-md-12, .grid-container .gmr-infeed-banner {
	position: relative;
	min-height: 1px;
	padding-left: 10px;
	padding-right: 10px;
	width: 100%;
}
@media (min-width: 1200px) {
	.col-md-12 {
		flex: 0 0 auto;width: 100%;
	}
	.col-md-11 {
		flex: 0 0 auto;width: 91.66666667%;
	}
	.col-md-10 {
		flex: 0 0 auto;width: 83.33333333%;
	}
	.col-md-9 {
		flex: 0 0 auto;width: 75%;
	}
	.col-md-8 {
		flex: 0 0 auto;width: 66.66666667%;
	}
	.col-md-7 {
		flex: 0 0 auto;width: 58.33333333%;
	}
	.col-md-6 {
		flex: 0 0 auto;width: 50%;
	}
	.col-md-5 {
		flex: 0 0 auto;width: 41.66666667%;
	}
	.col-md-4 {
		flex: 0 0 auto;width: 33.33333333%;
	}
	.col-md-8 .grid-container .gmr-infeed-banner,
	.col-md-3 {
		flex: 0 0 auto;width: 25%;
	}
	.col-md-12 .grid-container .gmr-infeed-banner,
	.col-md-2 {
		flex: 0 0 auto;width: 16.66666667%;
	}
	.col-md-1 {
		flex: 0 0 auto;width: 8.33333333%;
	}
}
.text-center {
  text-align: center;
}
li.rmp-rating-widget__icons-list__icon.js-rmp-rating-item {
  list-style-type: none!important;
  padding: 0;
  margin: 0;
}
</style>

<?php 

// variables.
$post_id            = ( $post_id ) ? $post_id : get_the_id();
$rmp_options        = get_option( 'rmp_options' );
$rmp_custom_strings = $this->custom_strings();
$rating_icon_type   = self::icon_type();
$avg_rating         = Rate_My_Post_Common::get_average_rating( $post_id );
$vote_count         = Rate_My_Post_Common::get_vote_count( $post_id );
$icon_classes       = self::icons_classes( $post_id, true );
$results_text       = $this->rating_widget_results_text( $rmp_options, $avg_rating, $vote_count );
$max_rating         = Rate_My_Post_Common::max_rating();
?>

<!-- Rate my Post Plugin -->
<div class="rmp-widgets-container rmp-wp-plugin rmp-main-container js-rmp-widgets-container js-rmp-widgets-container--<?php echo esc_attr( $post_id ); ?>" data-post-id="<?php echo esc_attr( $post_id ); ?>">
	<?php do_action( 'rmp_before_all_widgets' ); ?>
	<!-- Rating widget -->
	<div class="rmp-rating-widget js-rmp-rating-widget dlpro-rating-widget">
		<div class="row">
			<div id="left-rating" class="col-md-4 text-center">
				<?php if ( str_replace( ' ', '', $rmp_custom_strings['rateTitle'] ) ) : ?>
					<div class="rmp-heading rmp-heading--title">
						<?php echo esc_attr( $rmp_custom_strings['rateTitle'] ); ?>
					</div>
				<?php endif; ?>

				<?php if ( str_replace( ' ', '', $rmp_custom_strings['rateSubtitle'] ) ) : ?>
					<div class="rmp-heading rmp-heading--subtitle">
						<?php echo esc_attr( $rmp_custom_strings['rateSubtitle'] ); ?>
					</div>
				<?php endif; ?>

				<?php
				$rating = rmp_get_avg_rating();
				echo '<p class="dlpro-averagerating js-rmp-results"><span class="js-rmp-avg-rating">' . esc_attr( $rating ) . '</span></p>';
				?>
				<?php
				$vote_count = rmp_get_vote_count();
				echo '<span class="dlpro-votecount">( <span class="js-rmp-vote-count">' . esc_attr( $vote_count ) . '</span> ' . esc_html( 'Votes', 'dlpro' ) . ' )</span>';
				?>
			</div>
			<div id="right-rating" class="col-md-8">
				<?php if ( str_replace( ' ', '', $rmp_custom_strings['rateTitle'] ) ) : ?>
					<div class="rmp-heading rmp-heading--title">
						<?php echo esc_attr__( 'Please Rate!', 'dlpro' ) . ' <div class="small-text">' . esc_html( get_the_title() ) . '</div>'; ?>
					</div>
				<?php endif; ?>
				<div class="rmp-rating-widget__icons wp-dark-mode-ignore">
					<ul class="rmp-rating-widget__icons-list js-rmp-rating-icons-list">
					<?php for ( $icons_count = 0; $icons_count < $max_rating; $icons_count++ ) : ?>
						<li class="rmp-rating-widget__icons-list__icon js-rmp-rating-item" data-descriptive-rating="<?php echo $rmp_custom_strings['star' . ( $icons_count + 1 )]; ?>" data-value="<?php echo $icons_count + 1 ?>">
						<i class="js-rmp-rating-icon <?php echo $rating_icon_type; ?> <?php echo $icon_classes[ $icons_count ]; ?>"></i>
						</li>
					<?php endfor; ?>
					</ul>
				</div>
				<p class="rmp-rating-widget__hover-text js-rmp-hover-text"></p>

				<button class="rmp-rating-widget__submit-btn rmp-btn js-submit-rating-btn">
					<?php echo $rmp_custom_strings['submitButtonText']; ?>
				</button>

				<p class="rmp-rating-widget__not-rated js-rmp-not-rated <?php echo $avg_rating ? 'rmp-rating-widget__not-rated--hidden' : ''; ?>">
					<?php echo $rmp_options['notShowRating'] == 1 ? $rmp_custom_strings['noRating'] : ''; ?>
				</p>

				<p class="rmp-rating-widget__msg js-rmp-msg"></p>
				
				<?php if ( $rmp_options['social'] === 2 ) : ?>
					<!-- Social widget -->
					<?php echo $this->social_widget(); ?>
				<?php endif; ?>

				<?php if ( $rmp_options['feedback'] === 2 ) : ?>
					<!-- Feedback widget -->
					<?php echo $this->feedback_widget(); ?>
				<?php endif; ?>
				
			</div>
		</div>
	</div>
	<?php do_action( 'rmp_after_all_widgets' ); ?>
</div>