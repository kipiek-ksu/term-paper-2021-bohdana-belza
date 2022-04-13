<?php

$hassidepre = $PAGE->blocks->region_has_content('side-pre', $OUTPUT);
$hassidepost = $PAGE->blocks->region_has_content('side-post', $OUTPUT);
$showsidepre = $hassidepre && !$PAGE->blocks->region_completely_docked('side-pre', $OUTPUT);
$showsidepost = $hassidepost && !$PAGE->blocks->region_completely_docked('side-post', $OUTPUT);

$custommenu = $OUTPUT->custom_menu();
$hascustommenu = (empty($PAGE->layout_options['nocustommenu']) && !empty($custommenu));

$bodyclasses = array();
if ($showsidepre && !$showsidepost) {
    $bodyclasses[] = 'side-pre-only';
} else if ($showsidepost && !$showsidepre) {
    $bodyclasses[] = 'side-post-only';
} else if (!$showsidepost && !$showsidepre) {
    $bodyclasses[] = 'content-only';
}
if ($hascustommenu) {
    $bodyclasses[] = 'has_custom_menu';
}

echo $OUTPUT->doctype() ?>
<html <?php echo $OUTPUT->htmlattributes() ?>>
<head>
    <title><?php echo $PAGE->title ?></title>
    <link rel="shortcut icon" href="<?php echo $OUTPUT->pix_url('favicon', 'theme')?>" />
    <meta name="description" content="<?php p(strip_tags(format_text($SITE->summary, FORMAT_HTML))) ?>" />
    <?php echo $OUTPUT->standard_head_html() ?>
</head>
<body id="<?php p($PAGE->bodyid) ?>" class="<?php p($PAGE->bodyclasses.' '.join(' ', $bodyclasses)) ?>">
<?php echo $OUTPUT->standard_top_of_body_html() ?>

<div id="page">
    <div id="page-content-outer">
        <div id="page-header" class="clearfix">
            <div id="logo">
                <?php include('profileblock.php')?>

            </div>
      </div>
<!-- END OF HEADER -->


        <?php if ($hascustommenu) { ?>
            <div id="custommenu"><?php echo $custommenu; ?></div>
        <?php } ?>


<div id="page-content-wrap">
    <div id="page-content">
        <div id="region-main-box">
            <div id="region-post-box">
                <div id="region-main-wrap">
                  <div id="region-main-pad">
                    <div id="region-main">
                      <div class="region-content">
                            <?php echo core_renderer::MAIN_CONTENT_TOKEN ?>
                      </div>
                    </div>
                  </div>
                </div>

                <?php if ($hassidepre) { ?>
                <div id="region-pre" class="block-region">
                   <div class="region-content">
                        <?php echo $OUTPUT->blocks_for_region('side-pre') ?>
                   </div>
                </div>
                <?php } ?>

                <?php if ($hassidepost) { ?>
                <div id="region-post" class="block-region">
                   <div class="region-content">
                        <?php echo $OUTPUT->blocks_for_region('side-post') ?>
                   </div>
                </div>
                <?php } ?>
            </div>
        </div>
    </div>
  </div>

<!-- START OF FOOTER -->
    <div id="page-footer">

    <div id="page-footer">

       <p class="footer-logo">  <img src="<?php echo $OUTPUT->pix_url('footer/logos/orglogo', 'theme') ?>"  alt="Moodle Logo" title="Moodle Logo" /></p>

       <p class="logininfo"><?php echo $OUTPUT->login_info();?></p>

       <div class="socioweb-icons">
        <ul>
         <li><a href="#" title="#"><img src="<?php echo $OUTPUT->pix_url('footer/logos/facebook', 'theme') ?>" height="30" width="30" alt="Facebook" title="Facebook" /></a></li>
         <li><a href="#" title="#"><img src="<?php echo $OUTPUT->pix_url('footer/logos/twitter', 'theme') ?>" height="30" width="30" alt="Twitter" title="Twitter" /></a></li>
         <li><a href="#" title="#"><img src="<?php echo $OUTPUT->pix_url('footer/logos/flickr', 'theme') ?>" height="30" width="30" alt="Flickr" title="Flickr" /></a></li>
        </ul>
       </div>

            <p class="copyright">Aardvark Makeover for Moodle 2.0 by Mary Evans</p>
    </div>


        <?php echo $OUTPUT->standard_footer_html(); ?>
    </div>
   </div>
  <div class="clearfix"></div>
</div>
<?php echo $OUTPUT->standard_end_of_body_html() ?>
</body>
</html>