<?php
/*-----------------------------------------------------------------------------------*/
/*  EXTHEM.ES
/*  PREMIUM WORDRESS THEMES
/*
/*  STOP DON'T TRY EDIT
/*  IF YOU DON'T KNOW PHP
/*  AS ERRORS IN YOUR THEMES ARE NOT THE RESPONSIBILITY OF THE DEVELOPERS
/*
/*  As Errors In Your Themes
/*  Are Not The Responsibility
/*  Of The DEVELOPERS
/*  @EXTHEM.ES
/*-----------------------------------------------------------------------------------*/  

/**
 * Disable default WP admin bar for users.
 *
 * @param <type> $user_id  The user identifier.
 */
function exthemes_set_user_admin_bar_false_by_default( $user_id ) {
	update_user_meta( $user_id, 'show_admin_bar_front', 'false' );
	update_user_meta( $user_id, 'show_admin_bar_admin', 'false' );
}
add_action( 'user_register', 'exthemes_set_user_admin_bar_false_by_default', 10, 1 );

 