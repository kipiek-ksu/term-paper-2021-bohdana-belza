<?php

// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 * Automatically generated strings for Moodle 2.0 installer
 *
 * Do not edit this file manually! It contains just a subset of strings
 * needed during the very first steps of installation. This file was
 * generated automatically by export-installer.php (which is part of AMOS
 * {@link http://docs.moodle.org/en/Development:Languages/AMOS}) using the
 * list of strings defined in /install/stringnames.txt.
 *
 * @package   installer
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

$string['admindirname'] = 'Φάκελος Admin';
$string['availablelangs'] = 'Λίστα διαθέσιμων γλωσσών';
$string['chooselanguagehead'] = 'Επιλογή γλώσσας';
$string['chooselanguagesub'] = 'Παρακαλώ, επιλέξτε γλώσσα για την εγκατάσταση ΜΟΝΟ. Θα μπορείτε να επιλέξετε γλώσσα ιστοσελίδας και χρηστών σε μια μετέπειτα οθόνη.';
$string['databasehost'] = 'Κεντρικός Υπολογιστής Βάσης Δεδομένων';
$string['databasename'] = 'Όνομα Βάσης Δεδομένων';
$string['databasetypehead'] = 'Επιλογή οδηγού βάσης δεδομένων';
$string['dataroot'] = 'Φάκελος Δεδομένων';
$string['dbprefix'] = 'Πρόθεμα πινάκων';
$string['dirroot'] = 'Φάκελος ΠΗΛΕΑΣ';
$string['environmenthead'] = 'Έλεγχος περιβάλλοντος...';
$string['environmentsub2'] = 'Κάθε έκδοση Moodle έχει κάποια ελάχιστη απαίτηση σχετικά με την έκδοση της PHP και ενός αριθμού από αναγκαίες επεκτάσεις PHP.
Ο πλήρης έλεγχος του περιβάλλοντος πραγματοποιείται πριν κάθε εγκατάσταση και αναβάθμιση. Παρακαλούμε επικοινωνήστε με τον διαχειριστή του εξυπηρετητή εάν δεν ξέρετε πως να εγκαταστήσετε νέα έκδοση της PHP ή να ενεργοποιήσετε επεκτάσεις της.';
$string['errorsinenvironment'] = 'Ο έλεγχος του περιβάλλοντος απέτυχε!';
$string['installation'] = 'Εγκατάσταση';
$string['langdownloaderror'] = 'Δυστυχώς η γλώσσα "{$a}" δεν είναι εγκατεστημένη. Η εγκατάσταση θα συνεχιστεί στα αγγλικά.';
$string['memorylimithelp'] = '<p>Το memory limit της PHP στο server σας είναι ορισμένο αυτή τη στιγμή στα {$a}.</p>

<p>Αυτό μπορεί να προκαλέσει προβλήματα μνήμης στο ΠΗΛΕΑΣ στη συνέχεια, ειδικά αν έχετε πολλά ενεργοποιημένα αρθρώματα και/ή πολλούς χρήστες.</p>

<p>Προτείνεται η ρύθμιση της PHP με μεγαλύτερο όριο, αν αυτό είναι δυνατό, π.χ. 16M. Υπάρχουν πολλοί τρόποι που μπορείτε να δοκιμάσετε να το κάνετε αυτό:</p>
<ol>
<li>Αν έχετε τη δυνατότητα, κάνετε επαναμεταγλώττιση την PHP με την παράμετρο <i>--enable-memory-limit</i>.
Αυτό θα επιτρέψει στο Moodle να ορίσει μόνο του το memory limit.</li>
<li>Αν έχετε πρόσβαση στο αρχείο php.ini, μπορείτε να αλλάξετε τη ρύθμιση <b>memory_limit</b>
σε 16M. Αν δεν έχετε πρόσβαση ζητήστε από το διαχειριστή να το κάνει για εσάς.</li>
<li>Σε κάποιους εξυπηρετητές PHP μπορείτε να δημιουργήσετε ένα αρχείο .htaccess στο φάκελο του ΠΗΛΕΑΣ που να περιέχει τις παρακάτω γραμμές:<p><blockquote>php_value memory_limit 16M</blockquote></p>
<p>Ωστόσο, σε κάποιους εξυπηρετητές αυτό θα εμποδίσει τη λειτουργία <b>όλων</b> των σελιδών PHP
(θα βλέπετε σφάλματα όταν ανοίγετε τις σελίδες), σε αυτήν την περίπτωση θα πρέπει να διαγράψετε το αρχείο .htaccess.</p></li>
</ol>';
$string['paths'] = 'Διαδρομές';
$string['pathserrcreatedataroot'] = 'Ο Φάκελος Δεδομένων ({$a->dataroot}) δεν μπορεί να δημιουργθεί από το πρόγραμμα εγκατάστασης.';
$string['pathshead'] = 'Επιβεβαίωση Διαδρομών';
$string['pathsrodataroot'] = 'Ο Φάκελος Δεδομένων δεν είναι εγγράψιμος.';
$string['pathsroparentdataroot'] = 'Ο Φάκελος γονέας ({$a->parent}) δεν είναι εγγράψιμος. Ο Φάκελος Δεδομένων ({$a->dataroot}) δεν μπορεί να δημιουργθεί από το πρόγραμμα εγκατάστασης.';
$string['pathssubadmindir'] = 'Λίγοι κεντρικοί υπολογιστές ιστού χρησιμοποιούν το /admin σαν ένα ειδικό URL για να έχετε πρόσβαση
σε έναν πίνακα ελέγχου ή κάτι παρόμοιο.  Δυστυχώς αυτό έρχεται σε σύγκρουση με την πρότυπη τοποθεσία για τις σελίδες διαχείρισης του Moodle.  Μπορείτε να το διορθώσετε αυτό
μετονομάζοντας τον φάκελο admin στην εγκατάσταση σας, και βάζοντας ένα νέο όνομα εδώ.  Για παράδειγμα: <em>moodleadmin</em>. Αυτό θα διορθώσει τους συνδέσμους στο Moodle.';
$string['pathssubdataroot'] = 'Χρειάζεστε ένα μέρος όπου το Moodle μπορεί να αποθηκεύει τα ανεβασμένα αρχεία. Αυτός ο φάκελος θα πρέπει να μπορεί να διαβάζεται και να εγγράφεται από τον χρήστη του εξυπηρετητή ιστού
(συνήθως \'nobody\' ή \'apache\'), αλλά δεν πρέπει να είναι προσβάσιμος απευθείας μέσω ιστού. Το πρόγραμμα εγκατάστασης θα προσπαθήσει να τον δημιουργήσει εάν δεν υπάρχει.';
$string['pathssubdirroot'] = 'Πλήρης διαδρομή φακέλου για την εγκατάσταση moodle. Αλλάξτε την μόνο εάν χρειάζεται να χρησιμοποιήστε symbolic links.';
$string['pathssubwwwroot'] = 'Πλήρης διεύθυνση ιστού από την οποία θα υπάρχει πρόσβαση στο moodle.
Δεν είναι δυνατόν να έχετε πρόβαση στο Moodle χρησιμοποιώντας πολλαπλές διευθύνσεις.
Εάν ο ιστοχώρος έχει πολλαπλές δημόσιες διευθύνσεις θα πρέπει να ρυθμίσετε μόνιμες ανακατευθύνσεις σε καθεμία από αυτές εκτός από αυτήν.
Εάν ο ιστοχώρος σας είναι προσβάσιμος και από intranet και από το Διαδίκτυο χρησιμοποιήστε την δημόσια διεύθυνση εδώ και ρυθμίστε τον DNS ώστε οι χρήστες του inranet να μπορούν να χρησιμοποιούν και αυτοί την δημόσια διεύθυνση.';
$string['pathsunsecuredataroot'] = 'Η τοποθεσία του Φάκελου Δεδομένων δεν είναι ασφαλής';
$string['pathswrongadmindir'] = 'Ο Φάκελος Admin δεν υπάρχει';
$string['phpextension'] = 'Επέκταση {$a} της PHP';
$string['phpversion'] = 'Έκδοση της PHP';
$string['phpversionhelp'] = '<p>Το ΠΗΛΕΑΣ απαιτεί η έκδοση της PHP να είναι τουλάχιστον 4.3.0 ή 5.1.0 (η 5.0.x έχει ένα αριθμό γνωστών προβλημάτων).</p>
<p>Αυτή τη στιγμή έχετε την έκδοση {$a}</p>
<p>Πρέπει να κάνετε upgrade την PHP ή να μεταφερθείτε σε ένα κεντρικό υπολογιστή με μια νεότερη έκδοση της PHP!<br/>
(Σε περίπτωση που έχετε την 5.0.x μπορείτε επίσης να κάνετε και υποβάθμιση στην έκδοση 4.4.x)</p>';
$string['welcomep10'] = '{$a->installername} ({$a->installerversion})';
$string['welcomep20'] = 'Βλέπετε αυτή τη σελίδα γιατί εγκαταστήσατε και ξεκινήσατε με επιτυχία το πακέτο <strong>{$a->packname} {$a->packversion}</strong> στον υπολογιστή σας. Συγχαρητήρια!';
$string['welcomep30'] = 'Αυτή η έκδοση <strong>{$a->installername}</strong> περιλαμβάνει τις εφαρμογές για τη δημιουργία ενός περιβάλλοντος μέσα στο οποίο θα λειτουργεί το <strong>ΠΗΛΕΑΣ </strong>:';
$string['welcomep40'] = 'Το πακέτο περιλαμβάνει επίσης <strong>Moodle {$a->moodlerelease} ({$a->moodleversion})</strong>.';
$string['welcomep50'] = 'Η χρήση όλων των εφαρμογών σε αυτό το πακέτο υπόκειται στις αντίστοιχες άδειες. Ολόκληρο το πακέτο <strong>{$a->installername}</strong> είναι <a href="http://www.opensource.org/docs/definition_plain.html">open source</a> και διανέμεται με την <a href="http://www.gnu.org/copyleft/gpl.html">GPL</a> άδεια.';
$string['welcomep60'] = 'Οι παρακάτω σελίδες θα σας καθοδηγήσουν με εύκολα βήματα στην εγκατάσταση και ρύθμιση του <strong>ΠΗΛΕΑΣ </strong> στο υπολογιστή σας. Μπορείτε να δεχθείτε τις προκαθορισμένες ρυθμίσεις ή να τις αλλάξετε ανάλογα με τις ανάγκες σας.';
$string['welcomep70'] = 'Πατήστε το κουμπί "Συνέχεια" για να συνεχίσετε με την εκγατάσταση του <strong>Moodle</strong>.';
$string['wwwroot'] = 'Διεύθυνση ιστοσελίδας';
