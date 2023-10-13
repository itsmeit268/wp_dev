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
		global $opt_themes;
		$names				= $opt_themes['exthemes_comments_3'];
		$emails				= $opt_themes['exthemes_comments_4'];
		$comments			= $opt_themes['exthemes_comments_5'];
		$commenter			= wp_get_current_commenter();
		$req				= get_option( 'require_name_email' );
		$aria_req			= ( $req ? " aria-required='true'" : '' );
		$fields				= array(
			'author'		=> '<div class="row"><div class="col-12 col-sm-6 form-group"><input class="form-control" id="author" name="author" type="text" value="'.esc_attr( $commenter['comment_author'] ).'" placeholder="'.$names.( $req ? '*' : '' ).'" size="30" '.$aria_req.' /></div>',
			'email'			=> '<div class="col-12 col-sm-6 form-group"><input class="form-control" id="email" name="email" type="text" value="'.esc_attr( $commenter['comment_author_email'] ).'" placeholder="'.$emails.($req ? '*' : '' ).'" size="30" '.$aria_req.' /></div></div>',
		);
		$args			= array(
			'comment_field'		=> '<div class="form-group"><textarea id="comment" class="form-control" name="comment" cols="45" rows="4" placeholder="'.$comments.'" aria-required="true"></textarea></div>',
			'fields'			=> apply_filters( 'comment_form_default_fields', $fields ),
		);
		ob_start();  
		comment_form( $args );
		$form				= ob_get_clean(); 
		$form				= str_replace('class="comment-form"','class="comment-form my-class"', $form);
		echo str_replace('id="submit"','class="btn btn-primary"', $form);
