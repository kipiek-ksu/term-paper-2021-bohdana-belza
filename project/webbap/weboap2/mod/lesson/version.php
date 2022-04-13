<?php // $Id: version.php,v 1.35.2.1 2007/02/23 17:55:26 mark-nielsen Exp $
/**
 * Code fragment to define the version of lesson
 * This fragment is called by moodle_needs_upgrading() and /admin/index.php
 *
 * @version $Id: version.php,v 1.35.2.1 2007/02/23 17:55:26 mark-nielsen Exp $
 * @license http://www.gnu.org/copyleft/gpl.html GNU Public License
 * @package lesson
 **/

$module->version  = 2007020201;  // The current module version (Date: YYYYMMDDXX)
$module->requires = 2007020200;  // Requires this Moodle version
$module->cron     = 0;           // Period for cron to check this module (secs)

?>
