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
global $wpdb, $post, $opt_themes;
$rtl_on							= $opt_themes['ex_themes_activate_rtl_'];
$rtl_homes						= $opt_themes['rtl_homes'];
$title_on						= $opt_themes['ex_themes_title_appname'];
$title_ps						= get_post_meta( $post->ID, 'wp_title_GP', true );
$title							= get_post_meta( $post->ID, 'wp_title_GP', true );
$title_alt						= get_the_title();
$appname_on						= $opt_themes['ex_themes_title_appname'];  
?>
<ul id="breadcrumb" class="breadcrumb <?php if($rtl_on){ ?>ml-3<?php } else{ ?><?php } ?>" style="margin-bottom: 10px;">
	<li class="breadcrumb-item home"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php if($rtl_on){ ?><?php echo $rtl_homes; ?><?php } else { ?>Home<?php } ?>"><?php if($rtl_on){ ?><?php echo $rtl_homes; ?><?php } else { ?>Home<?php } ?></a></li>
	<li class="breadcrumb-item active"><?php echo $title_alt; ?></li>
</ul>	