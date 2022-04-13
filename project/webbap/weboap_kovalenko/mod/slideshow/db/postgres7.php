<?PHP

function slideshow_upgrade($oldversion) {
/// This function does anything necessary to upgrade 
/// older versions to match current functionality 

    global $CFG;
    if ($oldversion < 2006112100) {
        table_column('slideshow', '', 'layout', 'int', '2', 'unsigned', '0', 'not null', '');
    }
    if ($oldversion < 2006092600) {
        table_column('slideshow', '', 'location', 'int', '2', 'unsigned', '0', 'not null', '');
    }
    if ($oldversion < 2006012600) {
       table_column('slideshow', '', 'filename', 'int', '2', 'unsigned', '0', 'not null', '');
    }
    if ($oldversion < 2006112700) {
         modify_database('',"CREATE TABLE ".$CFG->prefix."slideshow_captions (
              id SERIAL PRIMARY KEY,
              slideshow integer NOT NULL default '0',
              image text NOT NULL,
              title text NOT NULL,
              caption text NOT NULL
            )
        ");
    }
    if ($oldversion < 2007070702) {
       table_column('slideshow', '', 'delaytime', 'int', '2', 'unsigned', '7', 'not null', '');
    }
    if ($oldversion < 2007070703) {
       table_column('slideshow', '', 'centred', 'int', '2', 'unsigned', '0', 'not null', '');
       table_column('slideshow', '', 'autobgcolor', 'int', '2', 'unsigned', '0', 'not null', '');
    }
    

    return true;
}

?>
