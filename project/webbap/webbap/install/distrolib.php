<?php 

function distro_get_config() {

    $config = new stdClass();

    $config->installername = 'Moodle Windows Installer';
    $config->installerversion = '2009050100';
    $config->packname = 'Xampp Lite';
    $config->packversion = '1.7.1';
    $config->webname = 'Apache';
    $config->webversion = '2..2.11';
    $config->phpname = 'PHP';
    $config->phpversion = '5.2.9';
    $config->dbname = 'MySQL';
    $config->dbversion = '5.1.33 (Community Server)';
    $config->moodlerelease = '2.0.3+ (Build: 20110623)';
    $config->moodleversion = '2011033003.08';
    $config->dbtype='mysqli';
    $config->dbhost='localhost';
    $config->dbuser='root';

    return $config;
}

function distro_pre_create_db($database, $dbhost, $dbuser, $dbpass, $dbname, $prefix, $dboptions, $distro) {

/// We need to change the database password in windows installer, only if != ''
    if ($dbpass !== '') {
        try {
            if ($database->connect($dbhost, $dbuser, '', 'mysql', $prefix, $dboptions)) {
                $sql = "UPDATE user SET password=password(?) WHERE user='root'";
                $params = array($dbpass);
                $database->execute($sql, $params);
                $sql = "flush privileges";
                $database->execute($sql);
            }
        } catch (Exception $ignore) {
        }
    }
}
?>
