<?php
	
	# Theme name
	$THEME->name = 'connect_royal';
	
	# Parent themes to extend on
	$THEME->parents = array('connect_core', 'base', 'standard');
	
	# The new 2.0 dock
	$THEME->enable_dock = false;
	
	# The CSS post preocess function
	$THEME->csspostprocess = 'connect_process_css';