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
/* 
table of content 2  
https://brogramo.com/create-a-dynamic-table-of-contents-in-wordpress-without-a-plugin-easy-to-follow-steps/
*/
function insert_table_of_contents($content) {
    global $opt_themes;
	// used to determine the location of the
	// table of contents when $fixed_location is set to false
	$html_comment		= "<!--insert-toc-->";
	// checks if $html_comment exists in $content
	$comment_found		= strpos($content, $html_comment) ? true : false;
	// set to true to insert the table of contents in a fixed location
	// set to false to replace $html_comment with $table_of_contents
	$fixed_location		= true;
	// return the $content if
	// $comment_found and $fixed_location are false
	if (!$fixed_location && !$comment_found) {
		return $content;
	}
	// exclude the table of contents from all pages
	// other exclusion options include:
	// in_category($id)
	// has_term($term_name)
	// is_single($array)
	// is_author($id)
    if (is_page()) {
        return $content;
    }
		
	// regex to match all HTML heading elements 2-6
    /* <h[\d](?:\sid=\"(.*)\")?(?:.*)?>(.*)<\/h[\d]> */
	$regex				= "~(<h([1-6]))(.*?>(.*)<\/h[1-6]>)~";

	// preg_match_all() searches the $content using $regex patterns and
	// returns the results to $heading_results[]
	//
	// $heading_results[0][] contains all matches in full
	// $heading_results[1][] contains '<h2-6'
	// $heading_results[2][] contains '2-6'
	// $heading_results[3][] contains '>heading title</h2-6>
	// $heading_results[4][] contains the title text
	preg_match_all($regex, $content, $heading_results);
	// return $content if less than 3 heading exist in the $content
	$num_match = count($heading_results[0]);
	if($num_match < 1) {
		return $content;
	}
	// declare local variable
	$link_list = "";
	// loop through $heading_results
	for ($i = 0; $i < $num_match; ++ $i) {
	    // rebuild heading elements to have anchors array( '/\s+/', '/\-+/' ), 
		//$namesIDX = strtolower(strip_tags(preg_replace(array( '#[\\s-]+#', '#[^A-Za-z0-9. -]+#' ), array( '-', '' ), $heading_results[4][$i])));		
		$is = $i + 1; 
        $namesIDX			= strtolower(preg_replace(array('/[^a-z0-9]/i', '/[-]+/', '/\s+/'), "-", $heading_results[4][$i])); 	
		$namesIDX			= str_replace(array('.',':','?',',','!','&','amp',';' ), '', $namesIDX); 
		$namesIDX			= preg_replace(array('/[-]+/'), '-', $namesIDX); 
        $namesIDX			= trim(strip_tags($namesIDX));
		$tutupin			= '';
		$heading_results_	= ''.$heading_results[3][$i].'';
	    $new_heading		= $heading_results[1][$i] . " id='".$is."_".sanitize_title($namesIDX)."' " . $heading_results_ . $tutupin;
	    // find original heading elements that don't have anchors
	    $old_heading		= $heading_results[0][$i];
	    // search the $content for $old_heading and replace with $new_heading 
	    $beforeheadingcontents = '<a name="'.sanitize_title($namesIDX).'"></a>';	
		$content			= str_replace($old_heading, $beforeheadingcontents.$new_heading, $content);
	    // generate links for each heading element
	    // each link points to an anchor
	    $link_list			.= "<a class=\"d-block mb-2\" href='#".sanitize_title($namesIDX)."'>" . $heading_results[4][$i] . "</a>";
	}	
	// title 
	$open			= '<div class="mb-3">';
    $closed			= '</div>';
    $titleX			= $opt_themes['exthemes_toc'];
	$title			= "<a class=\"btn btn-light collapsed\" data-toggle=\"collapse\" href=\"#table-of-contents\">".$titleX."</a>";
     
	// wrap links in '<ul>' element
	$link_list		= "<div id=\"table-of-contents\" class=\"collapse\" style=\"text-transform: uppercase!important;\"><div class=\"bg-light rounded d-inline-block p-3 table-of-contents\" style=\"margin-top: -1px;\"><div class=\"links_toc\">" . $link_list . "</div></div></div>";

	// piece together the table of contents
	$table_of_contents = $open . $title . $link_list . $closed;

	// if $fixed_location is true and
	// $comment_found is false
	// insert the table of contents at a fixed location
	if($fixed_location && !$comment_found) {
		// location of first paragraph
		$first_paragraph = strpos($content, '<p>', 0) + 0;
		// location of second paragraph
		$second_paragraph = strpos($content, '<p>', $first_paragraph);
		// insert $table_of_contents after $second_paragraph
	return substr_replace($content, $table_of_contents, $second_paragraph + 0 , 0);
	}
	// if $fixed_location is false and
	// $comment_found is true
	else {
		// replace $html_comment with the $table_of_contents
		return str_replace($html_comment, $table_of_contents, $content);
	}
}  
// pass the function to the content add_filter hook
add_filter('the_content', 'insert_table_of_contents');