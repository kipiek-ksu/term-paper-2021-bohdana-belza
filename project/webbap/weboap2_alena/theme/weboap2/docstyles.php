/**************************************
 * THEME NAME: convertible_colored_pencils
 *
 * Files included in this sheet:
 *
 *   convertible_colored_pencils/styles_default.css
 *   convertible_colored_pencils/styles_extras.css
 *   convertible_colored_pencils/styles_colored_pencils.css
 **************************************/

/***** convertible_colored_pencils/styles_default.css start *****/

/******************************************************************

*	Theeme Name: Convertible
*	Description: Convertible is a 960px fixed-width theme for Moodle.
*	Theme URL: http://newschoollearning.com/themes/convertible/
*	Support URL: http://support.newschoollearning.com
*	Author: Patrick Malley
*	Author URI: http://newschoollearning.com
*	Version: 1.0
*
* 	Note: Customize, edit, poke, prod, and adapt to your needs.
* 	However, do not share.  Unless other arrangements have been made,
*  	this style sheet (regardless of modification) remains the 
*  	property of NewSchool Learning and is licensed for use
*  	on a single installation of Moodle.  For questions, please
*  	contact the author at the above URI.  Enjoy.
 
*******************************************************************/


/*************
*  Core  *
*************/

html, body, * {
  margin:0;
  padding:0;
}

body {
  font-size:14px;
  line-height:1.3em;
}

#wrapper {
  width:933px;
  margin:0 auto;
}

#page {
  background:#fff
}

#front-img {
  padding:11px 17px 5px 17px;
}

#content {
  padding:5px 17px 20px;
}


#layout-table {
  border-collapse:collapse;
}

#left-column,
#right-column {
  width:183px !important;
}

.generalbox {
  margin-bottom:0;
}

#intro.generalbox {
  margin:20px auto;
  background:#fdffd1;
  border:1px dashed #d5d5d5;
}

h2.main, h3.main, h4.main, h5.main, h6.main {
  padding:10px;
}

p {
  padding-bottom:10px;
}

pre, code { font-family: 'Courier', monospace; }

code {background: #ddd; border: 1px dashed #888; padding:3px 7px; line-height: 2em; display: block;margin:10px; }

blockquote {
    margin:1em 3em;
    padding:0 0 0 4px;  
    color:#666;
    border-left:2px solid #999;
}


ul li,
ol li {
  margin-left:1.5em;
}

ul, ol {
  padding:5px 10px;
}

/***************
*  Header  *
***************/

#header-home,
#header {
  height:80px;
}

#header-home .headermain {
  font-size:1.75em;
}

#header-home .headermain {
  font-size:1.75em;
}

#header-home .headermain,
#header .headermain {
  color:#fff;
  padding:35px 10px 0;
}

#header-home .logininfo,
#header .logininfo {
  color:#fff;
  padding:5px;
}

#header-home a:link,
#header-home a:visited,
#header a:link,
#header a:visited {
  color:#fff;
}
/****************
*  Navbar  *
****************/
#bignavwrap {
  padding-top:10px;
}

#navbar-wrap-1 {
  margin:0 17px;
}

#navbar-wrap-2 {
    height:35px;
}

.navbar {
  border:none;
  margin:0 5px;
  color:#ccc;
  height:35px;
  padding:0;
}

.navbar .navbutton {
  margin-top:0;
  padding:8px 4px;
}

.navbar a:link,
.navbar a:visited {
  color:#fff;
  font-weight:bold;
}

.navbar a:hover,
.navbar a:active {
  color:#eee;
}

.navbar .breadcrumb .sep {
  color:#ccc;
  padding:0 4px;
  font-size:0.8em;
}

.breadcrumb {
  font-weight:normal;
  padding:7px;
}

.breadcrumb ul li {
  margin:0;
}

/***************
*  Footer  *
***************/


#credits {
  font-size: 0.8em;
  text-align: center;
  padding:5px 0 10px;
  clear: both;
}

#credits a:link,
#credits a:visited {
  color:#f9f9f9;
  width: 100%;
  display: block;
}

#credits a:hover,
#credits a:active {
  color: #333;
  background: none;
  border: none;
}


/***************
*  Sideblocks  *
***************/

.sideblock .content,
.sideblock .header {
  border:none;
}

.sideblock .header {
    color:#333;
    text-transform:uppercase;
  font-family:Georgia, "Times New Roman", Times, serif;
  border-bottom:1px solid #ccc;

}
.sideblock .content {
  background:none;
}

.sideblock .content a {
  line-height:1.5em;
}

.sideblock li .icon img,
.sideblock .list .c0,
.sideblock .hide-show {
  display:none;
}

.sideblock .content h2 {
  margin-top:0;
  color:#555;
}

.sideblock ul,
.sideblock ul li {
  margin:0;
  padding:0;
}

.block_adminblock .header {
  color:#333;
}

.block_online_users .info {
  font-size:0.7em;
}

/******************
*  Login  *
******************/

.sideblock .footer {
  font-size:0.75em;
}

.loginbox {
  margin:0 auto;
}

#login-index #content {
  padding:20px 0;
}

/******************
*  Middle Column  *
******************/

h2.headingblock {
  border:none;
}

#middle-column .sitetopic {
  border:none;
}

/*******************
*  Admin  *
*******************/

.formtable tbody tr th {
  font-weight:bold;
}

.formtable tbody tr td p {
  padding:10px;
}

.block_admin_tree.sideblock .link.current {
  background:none;
}

#left-column .block_admin_tree a:hover {
  background:none !important;
  text-decoration:underline;
}

#admin-roles-assign .generaltable td.cell.c0,
#admin-roles-override .generaltable td.cell.c0 {
  font-size:0.8em;
}

#admin-roles-assign .cell,
#admin-roles-override .cell {
  padding:0.5em;
}

#admin-auth .generalbox {
  margin:20px auto;
}

#admin-auth .box {
  background:#d1d9e4;
}

#adminsettings fieldset,
#admin-module .generalbox {
  border:1px dotted #faff00;
  background:#ececcb;
}

.form-buttons {
  margin:10px auto;
  width:20%;
}

#admin-uploaduser td {
  padding:4px;
}

.profileeditor {
  text-align:center;
  padding-top:10px;
}

#user-profile-index .singlebutton {
  padding:10px;
}

.profilefield {
  margin-bottom:20px;
}

#admin-roles-allowassign .generalbox,
#admin-roles-allowoverride .generalbox,
#admin-roles-assign .generalbox,
#enrol .generalbox,
#admin-lang .generalbox {
  margin:20px !important;
  background:#d1d9e4;
}

#admin-roles-allowassign .generaltable,
#admin-roles-manage .generaltable,
#admin-roles-allowoverride .generaltable {
  font-size:0.8em;
}

#enrol #enrolmenu div div {
  margin:10px;
}

#admin-module td,
#admin-block td,
#admin-filter td {
  padding:6px;
}

#admin-module hr {
  margin:20px;
}

#admin-calendar_weekend.form-item table {
  width:80% !important;
  font-size:0.9em;
}

.backup table tbody tr td {
  padding:4px;
}

.backup #form1 div {
  margin:20px;
}

.backup .generalbox,
#admin-report-simpletest-index .generalbox {
  text-align:center;
  width:60%;
  background:#d1d9e4;
}

#files-index div hr {
  display:none;
}

#admin-mainenance #middle-column div {
  text-align:center;
}

#admin-maintenance #layout-table table {
  width:100%;
}

.environmenttable {
  margin-top:20px;
}

#trustedhosts {
  margin:20px
}

/*******************
*  Courses  *
*******************/

.categorybox, .coursebox {
  border:none;
}

#course-category .coursebox {
  border-bottom:1px groove #fff;
  padding-bottom:10px;
}

#course-index .categorybox,
#course-category .courseboxes {
  width:75%;
  margin:25px auto;
  padding:10px;
  border:1px solid #999;
  background:#e5e5e5;
}

.coursebox .info ul.teachers {
  padding:3px;
  font-size:0.8em;
}

.categorylist {
  margin-bottom:4px;
}

#course-view h2.headingblock {
  display:none;
}

#course-view .section td.content {
  border:1px dashed #999;
  border-left:0px;
  border-right:0px;
  background:#e9e9e9;
}

#course-view .section td.side {
  border:1px dashed #999;
  background:#e9e9e9;
}

#course-view .section td.left {
  border-right:0px;
}

#course-view .section td.right {
  

/*necessary to prevent solid line on content??*/
  border-left-color:#e9e9e9;
}


#course-view #section-0 .content,
#course-view #section-0 .side {
  border:none;
  background:none;
}

#course-view .weeks .section .left {
  display:none;
}

#course-view .weeks .main td.content {
  border-left:1px dashed #006699;
}

#course-view .weekdates {
  font-size:0.8em;
}

.rolelink a {
  padding:2px 4px;
  border:1px solid #e7e7e7;
  background:#f7f7f7;
}

.categorypicker {
  padding:15px;
}

#course-category .singlebutton,
#course-category .categoryediting form div,
#course-index .singlebutton {
  padding:10px;
}

#coursesearch2 {
  padding:10px;
}

#course-import .plugin fieldset,
#course-import .plugin .box,
#course-import .plugin legend {
  border:none;
  background:none;
}

#course-import .plugin,
#reset .courseinfo,
#reset .foruminfo,
#course-report .plugin {
  border:1px dotted #d5d5d5;
  background:#ececcb;
  padding:10px;
}

#reset {
  width:50%;
  margin:auto;
}

#reset h3.main {
  text-align:center !important;
  margin-top:20px;
}

#course-report .plugin p {
  padding-bottom:0;
}

#course-report-outline-index #content {
  padding:50px;
}

#course-report-outline-index table {
  margin:15px;
}

#course-report-outline-index table td {
  padding:4px;
}

#course-report-outline-index h2 {
  padding-top:10px;
}

#participationreport .modulename {
  padding:20px;
}

#participationreport h2 {
  padding-bottom:20px;
}

#participationreport .reporttable {
  margin-bottom:20px;
}

#course-scales .generalbox {
  text-align:center;
  border:none;
}

#grade-index table {
  margin:20px auto;
}

#grade-index .singlebutton {
  margin:auto 10px;
}

#grade-index th,
#grade-index td {
  padding:4px;
}

#grade-index .generalbox {
  background:#d5e7ff;
}

#grade-exceptions .generalbox {
  margin:auto;
  background:#d5e7ff;
}

/*******************
*  Questions  *
*******************/

.questionbank,
.quizquestions {
  background:#d5e7ff;
  margin:4px;
}

.questionbank fieldset,
.questionbank fieldset div,
.quizquestions fieldset div {
  padding:2px;
}

.questionbank input,
.questionbank select {
  margin-right:5px;
}

.questionbank table,
.quizquestions table {
  margin:10px auto;
}

.questionbank p {
  text-align:center;
  font-weight:bold;
  padding-top:10px;
}

#question-import .generalbox,
#question-export .generalbox {
  width:50%;
  margin:20px auto;
  background:#d5e7ff;
}

#question-import .generalbox table td,
#question-export .generalbox table td {
  padding:4px;
}

#showbreaks fieldset input {
  margin:4px;
}

#showbreaks {
  text-align:center
}

#showbreaks fieldset {
  text-align:left;
}

/*******************
*  Calendar  *
*******************/

.block_calendar_month .calendar-controls .previous a,
.block_calendar_month .calendar-controls .next a {
  font-size:0.8em;
  padding:0 6px;
}

.block_calendar_month .minicalendar {
  border:none;
  padding:0
}

#calendar .sidecalendar .minicalendar {
  border:none;
}

#calendar .sidecalendar .minicalendarblock,
#calendar .sidecalendar .filters {
  margin-bottom:10px;
}

#calendar .maincalendar {
  border:none;
}

#calendar .sidecalendar {
  border:none;
}

#calendar .maincalendar .calendarmonth {
  background:#ddd;
  border:1px dashed #999;
  border-top:0px;
}

#calendar .maincalendar .controls {
  background:#ddd;
  padding:10px 4px;
  margin:0 7px;
  border:1px dashed #999;
  border-bottom:0px;
}

#calendar .maincalendar .eventlist {
  background:#ddd;
  margin:0 7px;
  border:1px dashed #999;
  border-top:0px;
}

#calendar .maincalendar .eventlist .event td.side,
#calendar .maincalendar .eventlist .event td.picture {
  background:none;
}

#calendar .eventlist .event td.topic {
  border:1px solid #999;
  border-bottom:0px;
}

#calendar .eventlist .event td.description {
  border:solid #999 !important;
  border-width:0px 1px 4px 1px !important;
}

#calendar .maincalendar .controls a {
  font-size:0.8em;
}

#calendar .maincalendar .header {
  margin-bottom:15px;
}

#calendar .maincalendar .filters {
  margin:20px 0;
}

#calendar .maincalendar .eventlist {
  margin-bottom:20px;
}

#calendar-preferences .generalbox {
  border:none;
}

#calendar .maincalendar #selecteventtype input,
#calendar .maincalendar #eventform input,
#calendar .maincalendar #eventform select {
  margin:4px;
}

#calendar .maincalendar #eventform table tbody tr td {
  padding:10px;
}

/*******************
*  Users  *
*******************/

#user-view #content,
#course-user #content {
  padding-bottom:20px;
}

.userinfobox {
  border:none;
  margin-bottom:20px;
}

.userinfobox .content {
  border:4px solid #999;
  background:#ddd;
  font-size:0.9em;
}

.userinfobox .content hr {
  margin:10px;
}

/***********************
*  Reports  & Tables  *
***********************/

#course-user #content .section {
  margin-bottom:0;
  margin-top:20px;
}

#course-user .section .content td {
  padding:2px;
}

#course-user .section .content h4 {
  padding-top:10px;
}

.logselectform {
  text-align:center;
}

.logtable {
  width:99%;
}

.forumheaderlist,
.generaltable,
.logtable,
table.files,
#categoryquestions,
.quizquestions {
  border:1px solid #d6d6d6;
  border-collapse:collapse;
}

.generaltable th,
.forumheaderlist th,
.logtable th,
.files th,
#categoryquestions th,
.quizquestions .invisiblefieldset th,
.editcourse th,
#movecourses th,
.generaltableheader th,
#attempts th,
#mod-lesson-edit .generalbox th {
  background:#ddd;
  border-bottom:1px solid #aaa;
  border-left:1px solid #fff;
  text-transform:uppercase;
  font-weight:normal;
  padding:3px 5px 1px !important;
  font-size:0.8em;
}

.forumheaderlist td,
.generaltable td,
.logtable td,
.files td,
#categoryquestions td,
.quizquestions td,
.editcourse td,
#movecourses td,
#admin-lang .translator td {
  border:none;
  border-left:1px solid #e7e7e7;
  padding:3px;
}

.forumheaderlist .r0,
.generaltable .r0,
table.flexible .r0,
.logtable .r0,
#admin-lang .translator tr.r0,
body#admin-blocks table#blocks .r0,
body#admin-blocks table#incompatible .r0,
body#grade-index .grades .r0 {
  background:#e7e7e7;
}

.forumheaderlist tr:hover,
.generaltable tr:hover,
.logtable tr:hover,
table.files tr:hover,
#listdirectories tr:hover,
.editcourse tr:hover,
#admin-lang .translator tr:hover,
body#admin-blocks table#blocks tr:hover,
body#admin-blocks table#incompatible tr:hover,
#categoryquestions tr:hover,
.quizquestions tr:hover,
#attempts tr:hover {
  background:#f9ffdd;
}

.logtable th,
#participants th,
#attempts th {
  padding:2px 5px 0;
}

.editcourse td,
#movecourses td {
  border-bottom:1px solid #f7f7f7;
  border-right:1px solid #f7f7f7;
}

.generaltable .cell {
  background:none;
  border:none;
}

#admin-user .generaltable {
  font-size:0.8em;
  width:100%;
}

.logtable td.c1 {
  text-align:left;
}

/*******************
*  Blogs  *
*******************/

.block_blog_tags .content ul li a {
  display:inline !important;
  background:#333 !important;
}

.block_blog_tags .content ul li a:hover {
  text-decoration:underline !important;
}

.blogpost .audience {
  font-style:italic;
}

#blog-index #right-column,
#blog-index .blogpost {
  padding-left:10px;
}

/*******************
*  Forums  *
********************/

.mod-forum #content {
  padding-bottom:20px;
}

.forumaddnew {
  margin:0 auto 20px;
}

.forumpost {
  border:none;
}

.forumpost .left {
  background:#fff;
}

.forumpost .side {
  background:#fff url(pix/forum/bg_forum_bottom_left.png) repeat-y bottom right;
}

.forumpost .picture {
  background:#fff url(pix/forum/bg_forum_top_left.png) no-repeat top right;
  padding-right:25px !important;
}

.forumpost .topic {
  border:none;
  background:#fff url(pix/forum/bg_forum_top_right.png) no-repeat top right;
  padding-left:0;
  padding-top:7px;
}

.forumpost .content {
  background:#fff url(pix/forum/bg_forum_bottom_right.png) repeat-y bottom right;
  padding:5px 15px 20px 0 !important;
  line-height:1.3em;
  font-family:"Lucida Grande", Lucida, Verdana, sans-serif;
  font-size:0.9em;
}

.forumpost .author {
  border-bottom:1px dashed #444;
  margin-right:20px;
  padding-bottom:4px;
}

.forumpost .commands,
.forumpost .link,
.forumpost .footer {
  padding-right:10px;
  font-size:0.75em;
}

.forumpost .commands {
  padding-top:10px;
}

.forumpost .link,
.forumpost .footer {
  padding-top:3px;
}

img.userpicture,
img.grouppicture,
#message-index img.userpicture {
  background:url(pix/bg/shadow_35.png) no-repeat bottom right !important;
  padding:0 4px 4px 0;
}

.sideblock img.userpicture {
  background:url(pix/bg/shadow_16.png) no-repeat bottom right !important;
  padding:0 2px 2px 0;
}

.userinfobox img.userpicture,
#message-history img.userpicture,
#message-user img.userpicture {
  background:url(pix/bg/shadow_100.png) no-repeat bottom right !important;
  padding:0 7px 7px 0;
}

.forumolddiscuss {
  font-size:0.8em;
}

/****************
*  Tabs  *
****************/

.tabtree ul li ul li a span {
  color:#006699;
}

/*******************
*  Modules  *
*******************/

#mod-resource-view div#footer {
  margin-top:0;
}

#mod-resource-view .generalbox {
  border:none;
  padding-bottom:25px;
}

#mod-resource-view #wrapper {
  width:auto;
  margin:0;
}

#mod-resource-view #content,
body#mod-resource-view,
#mod-resource-view #wrap-outside,
#mod-resource-view #wrap-inside {
  background:none;
}

#mod-resource-view #content {
  padding:3px;
}

#mod-resource-view #navbar-wrap-1,
#mod-resource-view #navbar-wrap-2 {
  background:#333;
  background-image: none !important;
  border-bottom:1px solid #999;
  margin:0;
}

#mod-resource-view #bignavwrap {padding:0;}

#mod-resource-view #header {
  background:#333;
  padding-top:5px;
  height:35px;
}

#mod-resource-view .headermain {padding:10px 10px 0;}

#mod-resource-view #footer {
  display:none;
}

#mod-resource-view .files {
  margin:auto;
}

.quizinfo {
  margin:auto !important;
  width:30%
}

.quizinfo p {
  margin-top:10px;
  font-weight:bold;
}

#mod-quiz-attempt #page {
  text-align:left;
}

#mod-quiz-attempt .generalbox {
  width:70%;
  margin:20px auto;
  background:#fdffd1;
}

#passwordform fieldset {
  margin:0 auto;
  width:100%
}

#passwordform fieldset .generalbox {
  width:25%;
  margin-top:0;
  background:#EA9089;
  border-bottom:2px solid #f33;
  border-top:2px solid #f33;
  text-align:center;
}

#mod-assignment-view fieldset input {
  margin:10px;
}

#attempts {
  margin:20px auto;
}

#options fieldset {
  width:100%
}

#options fieldset #optiontable {
  margin:0 auto;
  background:#fdffd1;
  border:1px dotted #ff7600;
}

#options fieldset #optiontable td {
  padding:4px;
  text-align:center;
}

input#perpage {
  width:25px;
}

#mod-assignment-view #dates {
  width:40%;
  background:#ea9089;
  border-bottom:2px solid #f33;
  border-top:2px solid #f33;
}

#mod-assignment-view #dates table {
  margin:auto;
}

#mod-assignment-view #dates table td.c0 {
  padding-right:5px;
}

#mod-assignment-view #online {
  margin-bottom:25px;
  background:#d8d8d8;
  border:2px solid #333;
}

#mod-lesson-view table .generalbox,
#mod-lesson-lesson table .generalbox {
  margin:10px auto;
  width:85%;
  background:#fdffd1;
}

.lessonbutton {
  margin:10px;
}

#mod-lesson-lesson table table td {
  text-align:center;
}

#mod-lesson-edit .addlinks {
  margin:20px 0;
}

#mod-lesson-edit .generalbox td {
  padding:5px;
  font-size:0.9em;
}

#mod-lesson-import table {
  margin:auto;
}

#mod-lesson-import td {
  padding:4px;
}

#mod-lesson-lesson #editpage center .generalbox,
#mod-workshop-view .workshopuploadform table {
  border:none;
}

#mod-lesson-lesson #editpage table td,
#mod-workshop-view .workshopuploadform table td {
  padding:10px;
}

#mod-lesson-lesson #editpage table input {
  margin:0 5px;
}

#mod-workshop-view .generalbox.boxaligncenter {
  width:55%;
  font-size:0.8em;
  background:#e5e5e5;
  border-bottom:2px solid #f33;
  border-top:2px solid #f33;
}

#mod-workshop-view .generaltable {
  font-size:0.9em;
}

#mod-workshop-assessments #assessmentform td {
  padding:4px;
}

#mod-workshop-assessments #assessmentform table {
  margin:20px auto;
}

.workshopkey {
  width:65%;
  margin:20px auto;
  background:#fffadb;
  padding-top:10px;
  border:1px dashed #ffc91e;
}

#mod-choice-view .boxaligncenter td {
  padding:15px;
}

#mod-choice-view .boxaligncenter td input {
  margin-right:5px;
}

#mod-choice-view .generalboxcontent.boxaligncenter {
  width:50%;
  margin:20px auto;
  background:#0050a9;
  padding-top:10px;
  border:1px dashed #ffc91e;
  text-align:center;
  color:#fff;
}

.choiceresponse .attemptcell {
  padding:4px;
}

#mod-glossary-showentry table.glossarypost {
    background:#fdffd1;
  border:1px dashed #d5d5d5;
  padding:5px;
  margin-bottom:10px;	
}

#mod-glossary-view hr {
  margin:10px;
}

/****************
*  Misc  *
****************/

fieldset {
  border:#DDD solid 1px;
  font-size:0.95em;
  margin-top:10px;
  padding:6px;
}

legend {
  font-weight:bold;
  font-size:1.2em;
  border:#DDD solid 1px;
  background:url(pix/bg/fade-grey.gif) repeat-x top;
  padding:1px 10px;
}

#mform1.mform fieldset.hidden {
  margin-bottom:0;
}

#mform1.mform fieldset#general {
  margin-top:0;
}

.paging {
  margin-bottom:0;
  padding-bottom:20px;
  padding-top:20px;
}

.paging a {
  padding:3px 5px;
  border:1px solid #ddd;
}

.paging a:hover {
  color:#bbb;
  background:#eee;
  border-color:#aaa;
}

.searchbox {
  margin:auto;
}

.searchbox td {
  padding:4px;
}

.searchbox td.submit {
  padding-top:15px;
}

textarea {
  width:100%;
}

.notifyproblem,
.notifysuccess {
  width:75%;
  margin:20px auto !important;
}

/****************
*  Messages & Glossary Popups & Help Popups *
****************/

#message-index #footer,
#message-discussion #footer,
#message-history #footer,
#mod-glossary-showentry #footer,
#mod-glossary-showentry #header,
#mod-glossary-showentry .navbar,
#help #footer {
  display:none;
}

#message-index #wrapper,
#message-user #wrapper,
#message-history #wrapper,
#mod-glossary-showentry #wrapper,
#help #wrapper {
  width:auto;
}

#message-user #page {
  margin:0;
}

#message-user #content {
  padding:0;
}

body#help,
#help #wrap-inside,
#help #wrap-outside,
body#message-index,
#message-index #wrap-inside,
#message-index #wrap-outside,
#message-user #wrap-inside,
#message-user #wrap-outside,
body#message-user,
body#message-send,
body#message-messages,
body#message-discussion,
#message-discussion #wrap-inside,
#message-discussion #wrap-outside,
#message-history #wrap-inside,
#message-history #wrap-outside,
body#message-history,
body#mod-glossary-showentry,
#mod-glossary-showentry #wrap-inside,
#mod-glossary-showentry #wrap-outside {
  background:none;
}

table#message_contacts,
table.message_form,
#message-history .generalbox table  {
  margin-left:auto;
  margin-right:auto	;
}

table#message_contacts td,
table.message_users td,
table.message_form td {
  padding:4px;
}

table.searchresults td {
  font-size:0.9em;
}
#message-index .heading {
  padding-bottom:10px;
}

#message-send #editing textarea {
  width:80%;
}

#message-history .generalbox {
  border:none;
}
#message-history .generalbox table td {
  padding:10px;
}

#mod-forum-post .notifyproblem {
  background:none;
  border:none;
}
/*****************
*  My  *
*****************/

#my-index .coursebox,
#help .generalboxcontent {
  background:#fbffd5;
  border:1px dashed #ffe713}
/***** convertible_colored_pencils/styles_default.css end *****/

/***** convertible_colored_pencils/styles_extras.css start *****/

/******************************************************************

	Name: NewSchool Learning CSS Extras
	Description: This document contains "CSS Extras" 
	that can be appended to any Moodle theme.
	Author: Patrick Malley
	Author URI: http://newschoollearning.com
	Version: 1.0

  Note: These styles are adapted from the work of Dean Robinson:
  http://www.deanjrobinson.com.  Background images come from
  the fabulous "Silk" set at http://famfamfam.com.  Newschool
  Learning does not claim license over these styles.
 
*******************************************************************/


/*************************
*  Style Extras   *
*************************/

.download {
	display: block;
	padding: 5px 0 5px 40px;
	margin: auto 25px ;
	background: #C9D2C9 url('pix/extras/package_go.png') no-repeat .5em center;
	border-bottom: 2px solid #383;
	border-top: 2px solid #383;
}

.alert,
.errorboxcontent,
#admin-roles-assign .generalbox,
#admin-module .boxwidthnormal,
#admin-block .boxwidthnormal,
#admin-filter .boxwidthnormal,
#course-reset .generalbox .generalbox,
.notifyproblem {
	display: block;
	padding: 5px 0 5px 40px;
	margin: auto 25px ;
	background: #EA9089 url('pix/extras/exclamation.png') no-repeat .5em center;
	border-bottom: 2px solid #f33;
	border-top: 2px solid #f33;
}

.errorbox {
  margin: auto !important;
  border-left: none;
  border-right: none;
}

.information,
#enrol .generalbox,
#login-forgot_password .generalbox,
.quizinfo,
.notifysuccess {
	display: block;
	padding: 5px 0 5px 40px;
	margin: auto 25px ;
	background: #AFB0BC url('pix/extras/information.png') no-repeat .5em center;
	border-bottom: 2px solid #33f;
	border-top: 2px solid #33f;
}

.construction {
	display: block;
	padding: 5px 0 5px 40px;
	margin: auto 25px ;
	background: #ffffd5 url('pix/extras/error.png') no-repeat .5em center;
	border-bottom: 2px solid #ff3;
	border-top: 2px solid #ff3;
}

.code {
  	display: block;
	padding: 5px 0 5px 40px;
	margin: auto 25px ;
	background: #aaa url('pix/extras/application_osx_terminal.png') no-repeat .5em center;
	border-bottom: 2px solid #444;
	border-top: 2px solid #444;
	font-family: 'Courier New', Courier, Fixed;
	font-size: 1.2em;
}

.note,
.generalbox.adminwarning,
#notice.generalbox,
#mod-resource-view .popupnotice {
	display: block;
	padding: 5px 0 5px 40px;
	margin: auto 25px ;
	background: #ccc url('pix/extras/page_white_text.png') no-repeat .5em center;
	border-bottom: 2px solid #444;
	border-top: 2px solid #444;
}

.new {
	display: block;
	padding: 5px 0 5px 40px;
	margin: auto 25px ;
	background: #A09187 url('pix/extras/new.png') no-repeat .5em center;
	border-bottom: 2px solid #643;
	border-top: 2px solid #643;
	color: #000;
}

#notice.box.generalbox,
#admin-module .boxwidthnormal,
#admin-block .boxwidthnormal,
#admin-filter .boxwidthnormal,
.environmentbox,
#login-forgot_password .generalbox,
#course-reset .generalbox .generalbox {
  margin: 25px auto !important;
  text-align:center;
}

.popupnotice {
  width:45%;
  margin: auto !important;
}/***** convertible_colored_pencils/styles_extras.css end *****/

/***** convertible_colored_pencils/styles_colored_pencils.css start *****/

body {
  background:#fff url(pix/bg_colored_pencils/body.png) repeat-x top left;
}


#wrap-outside {
  background:url(pix/bg_colored_pencils/page_right.png) no-repeat top right;
}

#wrap-inside {
  background:url(pix/bg_colored_pencils/page_left.png) no-repeat top left;
}

#header-home {
  background:url(pix/bg_colored_pencils/bg_header_home.jpg) no-repeat;
}

#navbar-wrap-1 {
  background: url(pix/bg_colored_pencils/navbar_left.png) no-repeat left;
}

#navbar-wrap-2 {
  background: url(pix/bg_colored_pencils/navbar_right.png) no-repeat right;
}

.navbar {
  background: #528CE0;
}

a:link, a:visited {
  color: #284571;
}

a:hover, a:active {
  color:#BBB;
}

#course-view .weekcss .current,
#course-view .current td.side,
#course-view .current td.content {
  background:#b2cfff !important;
  border-color: #628bdb !important;
}

#course-view .current td.right {
  border-left-color:#b2cfff !important;
}/***** convertible_colored_pencils/styles_colored_pencils.css end *****/

body {
    background-color:#FFFFFF;
}
p, a {
    font-size:small;
}

h1, h2, h3 {
    padding-left:0px;
    background-color:transparent;
    color:#000000;
}

h1 {
    font-size:1.7em; 
    margin:0.5em 0 0;
}

h2 {
    font-size:1.4em;
    margin:0.5em 0 0;
}

h3 {
    font-size:1.2em;
    margin:0.5em 0 0;
}


li {
    margin-bottom: 10px;
}

ul {
    margin-top: 10px;
}

.question {
    font-size: medium;
    font-weight: bold;
    border: 1px dotted;
    padding: 10px;
    background-color: #EEEEEE;
}

.answer {
    font-size: medium;
    border: none;
    padding-left: 40px;
}

.normaltext {
    font-size: medium;
    border: none;
    margin-left: 30px;
}

.answercode {
    font-family: "Courier New", Courier, mono;
    font-size: small;
    border: none;
    padding-left: 60px;
}

.questionlink {
    font-size: medium;
    border: none;
    padding-left: 40px;
}

.examplecode {
    font-family: "Courier New", Courier, mono;
    font-size: small;
    border: thin dashed #999999;
    background-color: #FBFBFB;
    margin: auto;
    margin-top: 0.5em;
    padding: 30px;
    height: auto;
    width: auto;
}

.spaced {
    margin-bottom: 30px;
}
