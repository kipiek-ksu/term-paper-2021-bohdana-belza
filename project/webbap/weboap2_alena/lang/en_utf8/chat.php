<?PHP // $Id: chat.php,v 1.5 2006/11/01 09:44:04 moodler Exp $ 
      // chat.php - created with Moodle 1.7 beta + (2006101003)


$string['beep'] = 'beep';
$string['chat:chat'] = 'Talk in a chat';
$string['chat:deletelog'] = 'Delete chat logs';
$string['chat:readlog'] = 'Read chat logs';
$string['chatintro'] = 'Introduction text';
$string['chatname'] = 'Name of this chat room';
$string['chatreport'] = 'Chat sessions';
$string['chattime'] = 'Next chat time';
$string['configmethod'] = 'The normal chat method involves the clients regularly contacting the server for updates. It requires no configuration and works everywhere, but it can create a large load on the server with many chatters.  Using a server daemon requires shell access to Unix, but it results in a fast scalable chat environment.';
$string['confignormalupdatemode'] = 'Chatroom updates are normally served efficiently using the <em>Keep-Alive</em> feature of HTTP 1.1, but this is still quite heavy on the server. A more advanced method is to use the <em>Stream</em> strategy to feed updates to the users. Using <em>Stream</em> scales much better (similar to the chatd method) but may not be supported by your server.';
$string['configoldping'] = 'What is the maximum time that may pass before we detect that a user has disconnected (in seconds)? This is just an upper limit, as usually disconnects are detected very quickly. Lower values will be more demanding on your server. If you are using the normal method, <strong>never</strong> set this lower than 2 * chat_refresh_room.';
$string['configrefreshroom'] = 'How often should the chat room itself be refreshed? (in seconds).  Setting this low will make the chat room seem quicker, but it may place a higher load on your web server when many people are chatting. If you are using <em>Stream</em> updates, you can select higher refresh frequencies -- try with 2.';
$string['configrefreshuserlist'] = 'How often should the list of users be refreshed? (in seconds)';
$string['configserverhost'] = 'The hostname of the computer where the server daemon is';
$string['configserverip'] = 'The numerical IP address that matches the above hostname';
$string['configservermax'] = 'Max number of clients allowed';
$string['configserverport'] = 'Port to use on the server for the daemon';
$string['currentchats'] = 'Active chat sessions';
$string['currentusers'] = 'Current users';
$string['deletesession'] = 'Delete this session';
$string['deletesessionsure'] = 'Are you sure you want to delete this session?';
$string['donotusechattime'] = 'Don\'t publish any chat times';
$string['enterchat'] = 'Click here to enter the chat now';
$string['errornousers'] = 'Could not find any users!';
$string['explaingeneralconfig'] = 'These settings are <strong>always</strong> into effect';
$string['explainmethoddaemon'] = 'These settings matter <strong>only</strong> if you have selected \"Chat server daemon\" for chat_method';
$string['explainmethodnormal'] = 'These settings matter <strong>only</strong> if you have selected \"Normal method\" for chat_method';
$string['generalconfig'] = 'General configuration';
$string['helpchatting'] = 'Help with chatting';
$string['idle'] = 'Idle';
$string['messagebeepseveryone'] = '$a beeps everyone!';
$string['messagebeepsyou'] = '$a has just beeped you!';
$string['messageenter'] = '$a has just entered this chat';
$string['messageexit'] = '$a has left this chat';
$string['messages'] = 'Messages';
$string['methoddaemon'] = 'Chat server daemon';
$string['methodnormal'] = 'Normal method';
$string['modulename'] = 'Chat';
$string['modulenameplural'] = 'Chats';
$string['neverdeletemessages'] = 'Never delete messages';
$string['nextsession'] = 'Next scheduled session';
$string['noguests'] = 'The chat is not open to guests';
$string['nomessages'] = 'No messages yet';
$string['normalkeepalive'] = 'KeepAlive';
$string['normalstream'] = 'Stream';
$string['noscheduledsession'] = 'No scheduled session';
$string['repeatdaily'] = 'At the same time every day';
$string['repeatnone'] = 'No repeats - publish the specified time only';
$string['repeattimes'] = 'Repeat sessions';
$string['repeatweekly'] = 'At the same time every week';
$string['savemessages'] = 'Save past sessions';
$string['seesession'] = 'See this session';
$string['sessions'] = 'Chat sessions';
$string['strftimemessage'] = '%%H:%%M';
$string['studentseereports'] = 'Everyone can view past sessions';
$string['viewreport'] = 'View past chat sessions';

?>
