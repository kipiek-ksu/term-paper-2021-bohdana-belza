<?PHP // $Id: role.php,v 1.23.2.9 2007/05/18 12:47:24 jmg324 Exp $ 
      // role.php - created with Moodle 1.7 beta + (2006101003)


$string['addrole'] = 'Add a new role';
$string['allow'] = 'Allow';
$string['allowassign'] = 'Allow role assignments';
$string['allowoverride'] = 'Allow role overrides';
$string['assignroles'] = 'Assign roles';
$string['assignglobalroles'] = 'Assign global roles';
$string['blog:create'] = 'Create new blog entries';
$string['blog:manageentries'] = 'Edit and manage entries';
$string['blog:manageofficialtags'] = 'Manage official tags';
$string['blog:managepersonaltags'] = 'Manage personal tags';
$string['blog:view'] = 'View blog entries';
$string['calendar:manageentries'] = 'Manage any calendar entries';
$string['calendar:manageownentries'] = 'Manage own calendar entries';
$string['capabilities'] = 'Capabilities';
$string['capability'] = 'Capability';
$string['category:create'] = 'Create categories';
$string['category:delete'] = 'Delete categories';
$string['category:update'] = 'Update categories';
$string['category:visibility'] = 'See hidden categories';
$string['course:activityvisibility'] = 'Hide/show activities';
$string['course:bulkmessaging'] = 'Send a message to many people';
$string['course:create'] = 'Create courses';
$string['course:delete'] = 'Delete courses';
$string['course:manageactivities'] = 'Manage activities';
$string['course:managefiles'] = 'Manage files';
$string['course:managegrades'] = 'Manage grades';
$string['course:managegroups'] = 'Manage groups';
$string['course:managemetacourse'] = 'Manage metacourse';
$string['course:managescales'] = 'Manage scales';
$string['course:reset'] = 'Reset course';
$string['course:sectionvisibility'] = 'Control section visibility';
$string['course:setcurrentsection'] = 'Set current section';
$string['course:update'] = 'Update course settings';
$string['course:useremail'] = 'Enable/disable email address';
$string['course:view'] = 'View courses';
$string['course:viewcoursegrades'] = 'View course grades';
$string['course:viewhiddenactivities'] = 'View hidden activities';
$string['course:viewhiddencourses'] = 'View hidden courses';
$string['course:viewhiddensections'] = 'View hidden sections';
$string['course:viewhiddenuserfields'] = 'View hidden user fields';
$string['course:viewparticipants'] = 'View participants';
$string['course:viewscales'] = 'View scales';
$string['course:visibility'] = 'Hide/show courses';
$string['currentcontext'] = 'Current context';
$string['currentrole'] = 'Current role';
$string['defaultrole'] = 'Default role';
$string['defineroles'] = 'Define roles';
$string['deleterolesure'] = 'Are you sure that you want to delete role \"$a->name ($a->shortname)\"?</p><p>Currently this role is assigned to $a->count users.';
$string['duplicaterolesure'] = 'Are you sure that you want to duplicate role \"$a->name ($a->shortname)\"?</p>';
$string['duplicaterole'] = 'Duplicate role';
$string['editrole'] = 'Edit role';
$string['errorbadrolename'] = 'Incorrect role name';
$string['errorbadroleshortname'] = 'Incorrect role name';
$string['errorexistsrolename'] = 'Role name already exists';
$string['errorexistsroleshortname'] = 'Role name already exists';
$string['existingusers'] = '$a existing users';
$string['globalroleswarning'] = 'WARNING! Any roles you assign from this page will apply to the assigned users throughout the entire site, including the front page and all the courses.';
$string['inherit'] = 'Inherit';
$string['legacy:admin'] = 'LEGACY ROLE: Administrator';
$string['legacy:coursecreator'] = 'LEGACY ROLE: Course Creator';
$string['legacy:editingteacher'] = 'LEGACY ROLE: Teacher (editing)';
$string['legacy:guest'] = 'LEGACY ROLE: Guest';
$string['legacy:student'] = 'LEGACY ROLE: Student';
$string['legacy:teacher'] = 'LEGACY ROLE: Teacher (non-editing)';
$string['legacy:user'] = 'LEGACY ROLE: Authenticated user';
$string['legacytype'] = 'Legacy role type';
$string['listallroles'] = 'List all roles';
$string['manageroles'] = 'Manage roles';
$string['metaassignerror'] = 'Can not assign this role to user \"$a\" because Manage metacourse capability is needed.';
$string['metaunassignerror'] = 'Role of user \"$a\" was automatically reassigned, please unassign the role in child courses instead.';
$string['my:manageblocks'] = 'Manage myMoodle page blocks';
$string['nocapabilitiesincontext'] = 'No capabilities available in this context';
$string['notset'] = 'Not set';
$string['overrideroles'] = 'Override roles';
$string['overrides'] = 'Overrides';
$string['permissions'] = 'Permissions';
$string['potentialusers'] = '$a potential users';
$string['prevent'] = 'Prevent';
$string['prohibit'] = 'Prohibit';
$string['question:export'] = 'Export questions';
$string['question:import'] = 'Import questions';
$string['question:manage'] = 'Manage questions';
$string['question:managecategory'] = 'Manage question category';
$string['resetrole'] = 'Reset to defaults';
$string['resetrolenolegacy'] = 'Clear permissions';
$string['resetrolesure'] = 'Are you sure that you want to reset role \"$a->name ($a->shortname)\" to defaults?<p></p>The defaults are taken from the selected legacy capability ($a->legacytype).';
$string['resetrolesurenolegacy'] = 'Are you sure that you want to clear all permissions defined in this role \"$a->name ($a->shortname)\"?';
$string['risks'] = 'Risks';
$string['role:assign'] = 'Assign roles to users';
$string['role:manage'] = 'Create and manage roles';
$string['role:override'] = 'Override permissions for others';
$string['role:switchroles'] = 'Switch to other roles';
$string['role:unassignself'] = 'Unassign own roles';
$string['role:viewhiddenassigns'] = 'View hidden role assignments';
$string['roleassignments'] = 'Role assignments';
$string['roles'] = 'Roles';
$string['roletoassign'] = 'Role to assign';
$string['roletooverride'] = 'Role to override';
$string['selectrole'] = 'Select a role';
$string['showallroles'] = 'Show all roles';
$string['site:accessallgroups'] = 'Access all groups';
$string['site:approvecourse'] = 'Approve course creation';
$string['site:backup'] = 'Backup courses';
$string['site:config'] = 'Change site configuration';
$string['site:doanything'] = 'Allowed to do everything';
$string['site:doclinks'] = 'Show links to offsite docs';
$string['site:import'] = 'Import other courses into a course';
$string['site:manageblocks'] = 'Manage site-level blocks';
$string['site:readallmessages'] = 'Read all messages on site';
$string['site:restore'] = 'Restore courses';
$string['site:trustcontent'] = 'Trust submitted content';
$string['site:uploadusers'] = 'Upload new users from file';
$string['site:viewfullnames'] = 'Always see full names of users';
$string['site:viewparticipants'] = 'View participants';
$string['site:viewreports'] = 'View reports';
$string['user:create'] = 'Create users';
$string['user:delete'] = 'Delete users';
$string['user:editprofile'] = 'Edit user profile';
$string['user:loginas'] = 'Login as other users';
$string['user:readuserblogs'] = 'See all user blogs';
$string['user:readuserposts'] = 'See all user posts';
$string['user:update'] = 'Update user profiles';
$string['user:viewdetails'] = 'View user profiles';
$string['user:viewhiddendetails'] = 'View hidden details of users';
$string['user:viewuseractivitiesreport'] = 'See user activity reports';
$string['user:viewusergrades'] = 'View user grades';
$string['viewrole'] = 'View role details';
$string['xuserswiththerole'] = 'Users with the role \"$a->role\": $a->number';

// MNET
$string['site:mnetlogintoremote'] = 'Roam to a remote Moodle';
$string['site:mnetloginfromremote'] = 'Login from a remote Moodle';

?>
