<?php // $Id: security.php,v 1.13.2.1 2007/04/02 15:12:22 skodak Exp $



// "sitepolicies" settingpage
$temp = new admin_settingpage('sitepolicies', get_string('sitepolicies', 'admin'));
$temp->add(new admin_setting_configcheckbox('protectusernames', get_string('protectusernames', 'admin'), get_string('configprotectusernames', 'admin'), 1));
$temp->add(new admin_setting_configcheckbox('forcelogin', get_string('forcelogin', 'admin'), get_string('configforcelogin', 'admin'), 0));
$temp->add(new admin_setting_configcheckbox('forceloginforprofiles', get_string('forceloginforprofiles', 'admin'), get_string('configforceloginforprofiles', 'admin'), 1));
$temp->add(new admin_setting_configcheckbox('opentogoogle', get_string('opentogoogle', 'admin'), get_string('configopentogoogle', 'admin'), 0));
$temp->add(new admin_setting_configtext('maxbytes', get_string('maxbytes', 'admin'), get_string('configmaxbytes', 'admin'), 0, PARAM_INT));
$temp->add(new admin_setting_configcheckbox('messaging', get_string('messaging', 'admin'), get_string('configmessaging','admin'), 1));
$temp->add(new admin_setting_configcheckbox('allowobjectembed', get_string('allowobjectembed', 'admin'), get_string('configallowobjectembed', 'admin'), 0));
$temp->add(new admin_setting_configcheckbox('enabletrusttext', get_string('enabletrusttext', 'admin'), get_string('configenabletrusttext', 'admin'), 0));
$temp->add(new admin_setting_configselect('maxeditingtime', get_string('maxeditingtime','admin'), get_string('configmaxeditingtime','admin'), 1800,
             array(60 => get_string('numminutes', '', 1),
                   300 => get_string('numminutes', '', 5),
                   900 => get_string('numminutes', '', 15),
                   1800 => get_string('numminutes', '', 30),
                   2700 => get_string('numminutes', '', 45),
                   3600 => get_string('numminutes', '', 60))));
$temp->add(new admin_setting_configselect('fullnamedisplay', get_string('fullnamedisplay', 'admin'), get_string('configfullnamedisplay', 'admin'),
              'firstname lastname', array('language' => get_string('language'),
              'firstname lastname' => get_string('firstname') . ' + ' . get_string('lastname'),
              'lastname firstname' => get_string('lastname') . ' + ' . get_string('firstname'),
              'firstname' => get_string('firstname'))));
$temp->add(new admin_setting_configcheckbox('extendedusernamechars', get_string('extendedusernamechars', 'admin'), get_string('configextendedusernamechars', 'admin'), 0));
$temp->add(new admin_setting_configtext('sitepolicy', get_string('sitepolicy', 'admin'), get_string('configsitepolicy', 'admin'), '', PARAM_RAW));
$temp->add(new admin_setting_configselect('bloglevel', get_string('bloglevel', 'admin'), get_string('configbloglevel', 'admin'), 4, array(5 => get_string('worldblogs','blog'),
                                                                                                                                          4 => get_string('siteblogs','blog'),
                                                                                                                                          3 => get_string('courseblogs','blog'),
                                                                                                                                          2 => get_string('groupblogs','blog'),
                                                                                                                                          1 => get_string('personalblogs','blog'),
                                                                                                                                          0 => get_string('disableblogs','blog'))));

$temp->add(new admin_setting_configcheckbox('cronclionly', get_string('cronclionly', 'admin'), get_string('configcronclionly', 'admin'), 0));
$temp->add(new admin_setting_configtext('cronremotepassword', get_string('cronremotepassword', 'admin'), get_string('configcronremotepassword', 'admin'), '', PARAM_RAW));

$ADMIN->add('security', $temp);




// "httpsecurity" settingpage
$temp = new admin_settingpage('httpsecurity', get_string('httpsecurity', 'admin'));
$temp->add(new admin_setting_configcheckbox('loginhttps', get_string('loginhttps', 'admin'), get_string('configloginhttps', 'admin'), 0));
$ADMIN->add('security', $temp);


// "modulesecurity" settingpage
$temp = new admin_settingpage('modulesecurity', get_string('modulesecurity', 'admin'));
$temp->add(new admin_setting_configselect('restrictmodulesfor', get_string('restrictmodulesfor', 'admin'), get_string('configrestrictmodulesfor', 'admin'), 'none', array('none' => 'No courses',
                                                                                                                                                                          'all' => 'All courses',
                                                                                                                                                                          'requested' => 'Requested courses')));
$temp->add(new admin_setting_configcheckbox('restrictbydefault', get_string('restrictbydefault', 'admin'), get_string('configrestrictbydefault', 'admin'), 0));
if (!$options = get_records("modules")) {
    $options = array();
}
$options2 = array();
foreach ($options as $option) {
    $options2[$option->id] = $option->name;
}
$temp->add(new admin_setting_configmultiselect('defaultallowedmodules', get_string('defaultallowedmodules', 'admin'), get_string('configdefaultallowedmodules', 'admin'), array(), $options2));
$ADMIN->add('security', $temp);



// "notifications" settingpage
$temp = new admin_settingpage('notifications', get_string('notifications', 'admin'));
$temp->add(new admin_setting_configselect('displayloginfailures', get_string('displayloginfailures', 'admin'), get_string('configdisplayloginfailures', 'admin'), '', array('' => get_string('nobody'),
                                                                                                                                                                            'admin' => get_string('administrators'),
                                                                                                                                                                            'teacher' => get_string('administratorsandteachers'),
                                                                                                                                                                            'everybody' => get_string('everybody'))));
$temp->add(new admin_setting_configselect('notifyloginfailures', get_string('notifyloginfailures', 'admin'), get_string('confignotifyloginfailures', 'admin'), '', array('' => get_string('nobody'),
                                                                                                                                                                         'mainadmin' => get_string('administrator'),
                                                                                                                                                                         'alladmins' => get_string('administratorsall'))));
$options = array();
for ($i = 1; $i <= 100; $i++) {
    $options[$i] = $i;
}
$temp->add(new admin_setting_configselect('notifyloginthreshold', get_string('notifyloginthreshold', 'admin'), get_string('confignotifyloginthreshold', 'admin'), '10', $options));
$ADMIN->add('security', $temp);






// "antivirus" settingpage
$temp = new admin_settingpage('antivirus', get_string('antivirus', 'admin'));
$temp->add(new admin_setting_configcheckbox('runclamonupload', get_string('runclamavonupload', 'admin'), get_string('configrunclamavonupload', 'admin'), 0));
$temp->add(new admin_setting_configtext('pathtoclam', get_string('pathtoclam', 'admin'), get_string('configpathtoclam', 'admin'), '', PARAM_RAW)); // TODO: add path validation
$temp->add(new admin_setting_configtext('quarantinedir', get_string('quarantinedir', 'admin'), get_string('configquarantinedir', 'admin'), '', PARAM_RAW)); // TODO: add path validation
$temp->add(new admin_setting_configselect('clamfailureonupload', get_string('clamfailureonupload', 'admin'), get_string('configclamfailureonupload', 'admin'), 'donothing', array('donothing' => get_string('configclamdonothing', 'admin'),
                                                                                                                                                                                  'actlikevirus' => get_string('configclamactlikevirus', 'admin'))));
$ADMIN->add('security', $temp);

?>
