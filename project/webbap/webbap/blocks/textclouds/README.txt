Textclouds block for Moodle 1.9.* administrators' manual
========================================================

index of contents:

0. Credits
1. Prerequisites
2. Installation
3. Create a new language analyser


0. Credits
=================================

Moodle Text Clouds has been developed and is maintained by the laboratory of semantics and multimedia systems (LSMS) at the University of applied sciences of southern Switzerland (SUPSI) in Lugano.

Project head: Riccardo Mazza (riccardo.mazza@supsi.ch)
Developer: Andrea Baldassari (andrea.baldassari@supsi.ch)

Website: http://lsms.dti.supsi.ch



1. Prerequisites
=================================

Textclouds needs a Moodle installation on Apache2 and PHP 5.1.3 or above.

In order to work properly, TextClouds needs two external applications to be installed on the server system:

-> pdftotext (commonly installed by default on almost all major linux distros)
-> unoconv (easily installable via repos in CentOS5/RHEL5 and Ubuntu, needs OpenOffice 3.0 installed, which will be installed by dependency)
-> native PHP zip extension

For better results add paths of executables inside PATH environment variable, or set paths in file soffice_config.php.

IMPORTANT!!!
You have to start manually OpenOffice in socket mode. To do this, type in terminal

soffice -headless -accept='socket,host=127.0.0.1,port=8100;urp;' -nofirststartwizard

You can change host and port, but remember to change them also in soffice_config.php



2. Installation
=================================

To install this block, simply copy "textclouds" folder inside the "Blocks" folder sited in Moodle. In the Admin menu, press "Notifications" to install DB tables
needed by Textclouds in order to work

In order to use Text Clouds, you must start OpenOffice in headless and socket mode. In Unix, you can do this using the command:

soffice -headless -accept='socket,host=127.0.0.1,port=8100;urp;' -nofirststartwizard


3. Create a new language analyser
=================================

Language analysis engines are used in TextClouds in order to filter words.
These engines are composed like following:

L_<Language> (the main engine directory, MUST BE NAMED with L_ followed by language name)
-- data.dic (MANDATORY, a dictionary, either textual or binary file, containing a list of words in <Language> language)
-- stopwords.txt (MANDATORY, a list of words that must be not analysed, also known as stop words. WARNING! Don't use this list to block words you won't need in a specific course, you can do this inside the configuration of the block instance)
-- Stem<Language>.php (OPTIONAL, the implementation of a stemming engine for <Language> language. This must contain a PHP class that implements Stemmer_Interface) 


TextClouds block comes with 11 analysis languages (danish, dutch, english, french, german, italian, norwegian,
polish, portuguese, spanish and swedish), 4 of these (english, german, italian and spanish) contains also the stemming engine.
All engine folders must be placed inside <Textcloudspath>/engine/langsdata. Use an already present language as model in order to create a new one.
