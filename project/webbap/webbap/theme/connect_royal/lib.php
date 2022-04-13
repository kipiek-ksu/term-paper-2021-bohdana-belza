<?php
	
	function connect_process_css($css, $theme)
	{
		#############################################################################
		## Change the Following variables to alter the look of the core theme, 
		## other changes can be made in a stylesheet
		#############################################################################
		
		############ The Banner Images ############
		
		## c_universal_header - bool true/false - If true, will use the connect_core header images
		$c_universal_header = true;
		
		## c_banner_front - 512px x 120px - Used on the login and home pages
		$c_banner_front = "/pix/headers/Connect_Header_Front.jpg";
		
		## c_banner - 512px x 80px - Used on all other pages
		$c_banner = "/pix/headers/Connect_Header.jpg";
		
		
		############ Theme Style Changes ############
		
		## c_background - the main background colour
		$c_background = "#FFFFFF";
		
		## c_border - Navbar and block border colour
		$c_border = "rgb(28,28,28)";
		
		## c_nav_text - The colour of the text that appears in the navbar and block headers
		$c_nav_text = "#FFFFFF";
		
		## c_nav_link - The colour of the links that appear in the navbar and block headers
		$c_nav_link = "#CCCCCC";
		
		## c_nav_text_shadow - The colour of the text shadow that appears in modern browsers
		$c_nav_text_shadow = "rgb(28,28,28)";
		
		############ Theme Gradient Images ############
		
		## As long as you name the gradient images 'Theme_Gradient' and 'Course_Header_Glass'
		## you won't have to change these.
		
		## c_gradient - 2px x 80px - Navbar and block header background image
		$c_gradient = "/pix/gradients/Theme_Gradient.jpg";
		
		## c_course_gradient - Don't Change. This is the heading gradient for some courses
		$c_course_gradient = "/pix/gradients/Course_Header_Glass.jpg";
		
	
		#############################################################################
		## Developed by Alex Mills for SIDE 2011
		## DO NOT EDIT PAST HERE WITHOUT KNOWING WHAT YOU'RE DOING
		#############################################################################
	
		## CSS Post Processing Function
		
		####################################################
		
		## Add root dir to image addresses
		
		$root_dir = $theme->name;
		
		$c_banner_front = $root_dir . $c_banner_front;
		$c_banner = $root_dir . $c_banner;
		$c_gradient = $root_dir . $c_gradient;
		$c_course_gradient = $root_dir . $c_course_gradient;
		
		## Use the connect_core header images
		
		if ($c_universal_header)
		{
			$c_banner_front = "connect_core/pix/headers/Connect_Header_Front.jpg";
			$c_banner = "connect_core/pix/headers/Connect_Header.jpg";
		}
		
		####################################################
		
		## Background Color
		$tag = '[[setting:backgroundcolor]]';
		$css = str_replace($tag, $c_background, $css);
		
		####################################################
		
		## General Banner Image
		$tag = '[[setting:bannerimage]]';
		$css = str_replace($tag, $c_banner, $css);
		
		## Front Banner Image
		$tag = '[[setting:bannerimagefront]]';
		$css = str_replace($tag, $c_banner_front, $css);
		
		####################################################
		
		## Navbar Background Gradient
		$tag = '[[setting:navgradient]]';
		$css = str_replace($tag, $c_gradient, $css);
		
		## Navbar Border Colour
		$tag = '[[setting:navborder]]';
		$css = str_replace($tag, $c_border, $css);
		
		## Navbar Non-link Text Colour
		$tag = '[[setting:navtext]]';
		$css = str_replace($tag, $c_nav_text, $css);
		
		## Navbar Link Colour
		$tag = '[[setting:navlink]]';
		$css = str_replace($tag, $c_nav_link, $css);
		
		## Navbar & Block Text Shadow
		$tag = '[[setting:navshadow]]';
		$css = str_replace($tag, $c_nav_text_shadow, $css);
		
		####################################################
		
		## Block Header Background Gradient
		$tag = '[[setting:blockgradient]]';
		$css = str_replace($tag, $c_gradient, $css);
		
		## Block Header Title Colour
		$tag = '[[setting:blocktitle]]';
		$css = str_replace($tag, $c_nav_text, $css);
		
		## Block Border Color
		$tag = '[[setting:blockborder]]';
		$css = str_replace($tag, $c_border, $css);
		
		####################################################
		
		## Course/Forum Header Gradient Background
		$tag = '[[setting:coursegradient]]';
		$css = str_replace($tag, $c_course_gradient, $css);
		
		####################################################
		
		return $css;
	}

		