CREATE TABLE `prefix_slideshow` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `course` int(10) unsigned NOT NULL default '0',
  `name` varchar(255) NOT NULL default '',
  `location` text NOT NULL,
  `layout` int(10) unsigned NOT NULL default '0',
  `filename` int(10) unsigned NOT NULL default '0',
  `delaytime` int(10) unsigned NOT NULL default '7',
  `centred` int(10) unsigned NOT NULL default '0',
  `autobgcolor` int(10) unsigned NOT NULL default '0',
  `timemodified` int(10) unsigned NOT NULL default '0',
  PRIMARY KEY  (`id`),
  KEY course (course)
);
CREATE TABLE `prefix_slideshow_captions` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `slideshow` int(10) unsigned NOT NULL default '0',
  `image` text NOT NULL,
  `title` text NOT NULL,
  `caption` text NOT NULL,
  PRIMARY KEY  (`id`),
  KEY slideshow(slideshow)
);
