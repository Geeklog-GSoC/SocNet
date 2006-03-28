<?php

###############################################################################
# slovak.php
# This is the slovak language page for GeekLog!
# Special thanks to Mischa Polivanov for his work on this project
#
# Copyright (C) 2000 Jason Whittenburg
# jwhitten@securitygeeks.com
#
# This program is free software; you can redistribute it and/or
# modify it under the terms of the GNU General Public License
# as published by the Free Software Foundation; either version 2
# of the License, or (at your option) any later version.
#
# This program is distributed in the hope that it will be useful,
# but WITHOUT ANY WARRANTY; without even the implied warranty of
# MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
# GNU General Public License for more details.
#
# You should have received a copy of the GNU General Public License
# along with this program; if not, write to the Free Software
# Foundation, Inc., 59 Temple Place - Suite 330, Boston, MA  02111-1307, USA.
#
###############################################################################

$LANG_CHARSET = 'UTF-8';

###############################################################################
# Array Format:
# $LANGXX[YY]:  $LANG - variable name
#               XX    - file id number
#               YY    - phrase id number
###############################################################################

###############################################################################
# USER PHRASES - These are file phrases used in end user scripts
###############################################################################

###############################################################################
# lib-common.php

$LANG01 = array(
    1 => 'Prispel:',
    2 => 'zvyšok článku',
    3 => 'komentáre(ov)',
    4 => 'Edituj',
    5 => 'Anketa',
    6 => 'Výsledky',
    7 => 'Výsledky hlasovania',
    8 => 'hlasy(ov)',
    9 => 'Admin Functions:',
    10 => 'Submissions',
    11 => 'Stories',
    12 => 'Blocks',
    13 => 'Topics',
    14 => 'Links',
    15 => 'Events',
    16 => 'Polls',
    17 => 'Users',
    18 => 'SQL Query',
    19 => 'Choď do preč',
    20 => 'User Information:',
    21 => 'Username',
    22 => 'User ID',
    23 => 'Security Level',
    24 => 'Anonymous',
    25 => 'Reply',
    26 => 'Nasledujúce kometáre majú na triku ich autori [ak sa nebáli podpísať]<br>Nesnaž sa to hodiť na krk tomuto sajtu.',
    27 => 'Posledný príspevok',
    28 => 'Zmaž',
    29 => 'Žiadne komentáre.',
    30 => 'Staršie príspevky',
    31 => 'Povolené HTML Tagy:',
    32 => 'Ups, zle meno',
    33 => 'Ups, nemôžem zapísať do log súboru',
    34 => 'Chyba',
    35 => 'Odhlásenie',
    36 => 'on',
    37 => 'Žiadne príspevky od užívateľov',
    38 => 'Content Syndication',
    39 => 'Obnov',
    40 => 'You have <tt>register_globals = Off</tt> in your <tt>php.ini</tt>. However, Geeklog requires <tt>register_globals</tt> to be <strong>on</strong>. Before you continue, please set it to <strong>on</strong> and restart your web server.',
    41 => 'Neprihlásený užívateľ',
    42 => 'Authored by:',
    43 => 'Reaguj',
    44 => 'Parent',
    45 => 'MySQL Error Number',
    46 => 'MySQL Error Message',
    47 => 'Prihlásenie',
    48 => 'Nastavenie užívateľa',
    49 => 'Nastavenie zobrazovania',
    50 => 'Problém s databázou',
    51 => 'pomoc',
    52 => 'Novinka(y)',
    53 => 'Admin Home',
    54 => 'Nemôžem otvoriť súbor',
    55 => 'Chyba na',
    56 => 'Hlasuj',
    57 => 'Heslo',
    58 => 'Meno',
    59 => "Ak chceš konto, klikni <a href=\"{$_CONF['site_url']}/users.php?mode=new\">sem</a>",
    60 => 'Pošli komentár',
    61 => 'Create New Account',
    62 => 'slov',
    63 => 'Nastavenie komentárov',
    64 => 'Pošli niekomu e-mailom',
    65 => 'Zobraz tlačiteľnú verziu',
    66 => 'Môj kalendár',
    67 => 'Vitaj na',
    68 => 'Domov',
    69 => 'kontakt',
    70 => 'Hľadaj',
    71 => 'Prispej',
    72 => 'Linky',
    73 => 'Staršie ankety',
    74 => 'Kalendár',
    75 => 'Fajnovejšie vyhľadávanie',
    76 => 'Štatistiky sajtu',
    77 => 'Plugins',
    78 => 'Blížiace sa akcie',
    79 => 'Čo je nove',
    80 => 'stories in last',
    81 => 'story in last',
    82 => 'hours',
    83 => 'KOMENTÁRE',
    84 => 'LINKY',
    85 => 'do 48 hod',
    86 => 'Žiadne nove kometáre',
    87 => 'do 2 týždňov',
    88 => 'Žiadne nove linky',
    89 => 'Žiadne nadchádzajúce akcie',
    90 => 'Hlavná stránka',
    91 => 'Vygenerované za',
    92 => 'sekúnd',
    93 => 'Copyright',
    94 => 'Všetky ochranné známky a autorské práva na tejto stránke patria dotyčným autorom a vlastníkom.',
    95 => 'Beží na',
    96 => 'Grupy',
    97 => 'Word List',
    98 => 'Plug-ins',
    99 => 'ČLÁNKY',
    100 => 'Žiadne nové články',
    101 => 'Tvoje Akcie',
    102 => 'Všeobecné Akcie',
    103 => 'DB Backups',
    104 => 'by',
    105 => 'Mail Users',
    106 => 'Videné',
    107 => 'GL Version Test',
    108 => 'Clear Cache',
    109 => 'Report abuse',
    110 => 'Report this post to the site admin',
    111 => 'View PDF Version',
    112 => 'Registered Users',
    113 => 'Documentation',
    114 => 'TRACKBACKS',
    115 => 'No new trackback comments',
    116 => 'Trackback',
    117 => 'Directory',
    118 => 'Please continue reading on the next page:',
    119 => "Lost your <a href=\"{$_CONF['site_url']}/users.php?mode=getpassword\">password</a>?",
    120 => 'Permanent link to this comment',
    121 => 'Comments (%d)',
    122 => 'Trackbacks (%d)',
    123 => 'All HTML is allowed'
);

###############################################################################
# calendar.php

$LANG02 = array(
    1 => 'Calendar of Events',
    2 => 'I\'m Sorry, there are no events to display.',
    3 => 'When',
    4 => 'Where',
    5 => 'Description',
    6 => 'Add An Event',
    7 => 'Upcoming Events',
    8 => 'By adding this event to your calendar you can quickly view only the events you are interested in by clicking "My Calendar" from the User Functions area.',
    9 => 'Add to My Calendar',
    10 => 'Remove from My Calendar',
    11 => "Adding Event to {$_USER['username']}'s Calendar",
    12 => 'Event',
    13 => 'Starts',
    14 => 'Ends',
    15 => 'Back to Calendar'
);

###############################################################################
# comment.php

$LANG03 = array(
    1 => 'Pošli komentár',
    2 => 'Post Mode',
    3 => 'Choď do preč',
    4 => 'Create Account',
    5 => 'meno',
    6 => 'This site requires you to be logged in to post a comment, please log in.  If you do not have an account you can use the form below to create one.',
    7 => 'Tvoj posledný komentár bol pred ',
    8 => " sekundami.  Tento sajt ma vyžaduje aspoň {$_CONF['commentspeedlimit']} sekúnd medzi komentármi",
    9 => 'Komentár',
    10 => 'Send Report',
    11 => 'Odošli komentár',
    12 => 'Prosím vyplň titulok a/alebo komentár samotný. Je to nutné, ak chceš komentár odoslať.',
    13 => 'Tvoje Info',
    14 => 'Ako to bude vyzerať?',
    15 => 'Report this post',
    16 => 'Titulok',
    17 => 'Chyba',
    18 => 'Dôležité oné',
    19 => 'Snaž sa držať témy.',
    20 => 'Je lepšie odpovedať na konkrétny komentár, ako začínať daľšiu vetvu.',
    21 => 'Prečítaj si príspevky ostatných, nech neposielaš tú istú sprostosť znovu.',
    22 => 'Do titulku napíš niečo jasné, aby všetci vedeli, o čo ti vlastne ide.',
    23 => 'Tvoj e-mail NEBUDE zobrazený',
    24 => 'Anonymný užívateľ',
    25 => 'Are you sure you want to report this post to the site admin?',
    26 => '%s reported the following abusive comment post:',
    27 => 'Abuse report'
);

###############################################################################
# users.php

$LANG04 = array(
    1 => 'Profil užívateľa',
    2 => 'Meno užívateľa',
    3 => 'Celé meno',
    4 => 'Heslo',
    5 => 'E-mail',
    6 => 'Domovska web stránka',
    7 => 'O mne',
    8 => 'PGP Klúč',
    9 => 'Ulož',
    10 => 'Posledných 10 komentárov užívateľa',
    11 => 'Žiadne komentáraComments',
    12 => 'User Preferences for',
    13 => 'Email Nightly Digest',
    14 => 'This password is generated by a randomizer. It is recommended that you change this password immediately. To change your password, log in and then click Account Information from the User Functions menu.',
    15 => "Your {$_CONF['site_name']} account has been created successfully. To be able to use it, you must login using the information below. Please save this mail for further reference.",
    16 => 'Your Account Information',
    17 => 'Account does not exist',
    18 => 'The email address provided does not appear to be a valid email address',
    19 => 'The username or email address provided already exists',
    20 => 'The email address provided does not appear to be a valid email address',
    21 => 'Error',
    22 => "Register with {$_CONF['site_name']}!",
    23 => 'Vytvorením loginu máš možnosť písať kometáre a prispievať článkami pod svojim menom.<br>Pokiaľ konto nemáš, vždy budeš pod anonymnou hlavičkou.<br><b>Tvoj e-mail nikde nebude zobrazený.<b><br>',
    24 => 'Your password will be sent to the email address you enter.',
    25 => 'Did You Forget Your Password?',
    26 => 'Enter your username and click Email Password and a new password will be mailed to the email address on record.',
    27 => 'Register Now!',
    28 => 'Email Password',
    29 => 'logged out from',
    30 => 'logged in from',
    31 => 'To, čo chceš robiť, vyžaduje prihlásenie',
    32 => 'Podpis',
    33 => 'Verejne sa nezobrazuje',
    34 => 'Tvoje reálne meno',
    35 => 'Zadaj heslo, ak ho chceš zmeniť',
    36 => 'Musí začat s http://',
    37 => 'Použije sa na tvoje kometáre',
    38 => 'Hocičo, čo chceš, aby ostatní o tebe vedeli.',
    39 => 'Tvoj verejný PGP kľúč',
    40 => 'Žiadne ikonky tém',
    41 => 'Willing to Moderate',
    42 => 'Date Format',
    43 => 'Maximum Stories',
    44 => 'No boxes',
    45 => 'Nastavenie zobrazovania pre',
    46 => 'Vynechané položky pre',
    47 => 'Konfigurácia boxíkov na pravej strane pre',
    48 => 'Témy',
    49 => 'V článkoch sa nebudú zobrazovať ikony tém',
    50 => 'Uncheck this if you aren\'t interested',
    51 => 'Just the news stories',
    52 => 'The default is',
    53 => 'Receive the days stories every night',
    54 => 'Označ témy a autorov, ktorých nechceš vidieť.',
    55 => 'Ak necháš všetko neoznačené, znamená to, že chceš štandardné nastavenie. Ak už začneš označovať, označ naozaj všetko, co chceš. Štandardné nastavenie bude ignorovať. Štandardné položky sú <strong>boldom</strong>.',
    56 => 'Autori',
    57 => 'Mód zobrazenia',
    58 => 'Poradie triedenia',
    59 => 'Limit na počet komentárov',
    60 => 'Ako chceš zobrazovať komentáre?',
    61 => 'Od najnovších alebo od najstarších?',
    62 => 'Štandard je 100',
    63 => "Your password has been emailed to you and should arrive momentarily. Please follow the directions in the message and we thank-you for using {$_CONF['site_name']}",
    64 => 'Nastavenie komentárov pre',
    65 => 'Skús sa prihlásiť znovu',
    66 => "You may have mistyped your login credentials.  Please try logging in again below. Are you a <a href=\"{$_CONF['site_url']}/users.php?mode=new\">new user</a>?",
    67 => 'Member Since',
    68 => 'Pamätaj si ma',
    69 => 'Ako dlho po prihlásení si ťa ma tento sajt pamäteť?',
    70 => "Customize the layout and content of {$_CONF['site_name']}",
    71 => "One of the great features of {$_CONF['site_name']} is you can customize the content you get and you can change the overall layout of this site.  In order to take advantage of these great features you must first <a href=\"{$_CONF['site_url']}/users.php?mode=new\">register</a> with {$_CONF['site_name']}.  Are you already a member?  Then use the login form to the left to log in!",
    72 => 'Téma zobrazenia',
    73 => 'Jazyk',
    74 => 'Zmeň si vzhľad sajty',
    75 => 'Emailed Topics for',
    76 => 'If you select a topic from the list below you will receive any new stories posted to that topic at the end of each day.  Choose only the topics that interest you!',
    77 => 'Foto',
    78 => 'Pridaj svoje foto.',
    79 => 'Zaškrtni, ak chceš zmazať fotku.',
    80 => 'Login',
    81 => 'Send Email',
    82 => 'Last 10 stories for user',
    83 => 'Posting statistics for user',
    84 => 'Total number of articles:',
    85 => 'Total number of comments:',
    86 => 'Find all postings by',
    87 => 'Your login name',
    88 => "Someone (possibly you) has requested a new password for your account \"%s\" on {$_CONF['site_name']}, <{$_CONF['site_url']}>.\n\nIf you really want this action to be taken, please click on the following link:\n\n",
    89 => "If you do not want this action to be taken, simply ignore this message and the request will be disregarded (your password will remain unchanged).\n\n",
    90 => 'You can enter a new password for your account below. Please note that your old password is still valid until you submit this form.',
    91 => 'Set New Password',
    92 => 'Enter New Password',
    93 => 'Your last request for a new password was %d seconds ago. This site requires at least %d seconds between password requests.',
    94 => 'Delete Account "%s"',
    95 => 'Click the "delete account" button below to remove your account from our database. Please note that any stories and comments you posted under this account will <strong>not</strong> be deleted but show up as being posted by "Anonymous".',
    96 => 'delete account',
    97 => 'Confirm Account Deletion',
    98 => 'Are you sure you want to delete your account? By doing so, you will not be able to log into this site again (unless you create a new account). If you are sure, click "delete account" again on the form below.',
    99 => 'Privacy Options for',
    100 => 'Email from Admin',
    101 => 'Allow email from Site Admins',
    102 => 'Email from Users',
    103 => 'Allow email from other users',
    104 => 'Show Online Status',
    105 => 'Show up in Who\'s Online block',
    106 => 'Location',
    107 => 'Shown in your public profile',
    108 => 'Confirm new password',
    109 => 'Enter the New password again here',
    110 => 'Current Password',
    111 => 'Please enter your Current password',
    112 => 'You have exceeded the number of allowed login attempts.  Please try again later.',
    113 => 'Login Attempt Failed',
    114 => 'Account Disabled',
    115 => 'Your account has been disabled, you may not login. Please contact an Administrator.',
    116 => 'Account Awaiting Activation',
    117 => 'Your account is currently awaiting activation by an administrator. You will not be able to login until your account has been approved.',
    118 => "Your {$_CONF['site_name']} account has now been activated by an administrator. You may now login to the site at the url below using your username (<username>) and password as previously emailed to you.",
    119 => 'If you have forgotten your password, you may request a new one at this url:',
    120 => 'Account Activated',
    121 => 'Service',
    122 => 'Sorry, new user registration is disabled',
    123 => "Are you a <a href=\"{$_CONF['site_url']}/users.php?mode=new\">new user</a>?"
);

###############################################################################
# index.php

$LANG05 = array(
    1 => 'No News to Display',
    2 => 'There are no news stories to display.  There may be no news for this topic or your user preferences may be too restrictive',
    3 => ' for topic %s',
    4 => 'Dnešný hlavný članok',
    5 => 'Ďaľší',
    6 => 'Predošlý',
    7 => 'First',
    8 => 'Last'
);

###############################################################################
# profiles.php

$LANG08 = array(
    1 => 'There was an error sending your message. Please try again.',
    2 => 'Message sent successfully.',
    3 => 'Please make sure you use a valid email address in the Reply To field.',
    4 => 'Please fill in the Your Name, Reply To, Subject and Message fields',
    5 => 'Error: No such user.',
    6 => 'There was an error.',
    7 => 'User Profile for',
    8 => 'User Name',
    9 => 'User URL',
    10 => 'Send mail to',
    11 => 'Your Name:',
    12 => 'Reply To:',
    13 => 'Subject:',
    14 => 'Message:',
    15 => 'HTML will not be translated.',
    16 => 'Send Message',
    17 => 'Mail Story to a Friend',
    18 => 'To Name',
    19 => 'To Email Address',
    20 => 'From Name',
    21 => 'From Email Address',
    22 => 'All fields are required',
    23 => "This email was sent to you by %s at %s because they thought you might be interested it this article from {$_CONF['site_url']}.  This is not SPAM and the email addresses involved in this transaction were not saved to a list or stored for later use.",
    24 => 'Comment on this story at',
    25 => 'You must be logged in to user this feature.  By having you log in, it helps us prevent misuse of the system',
    26 => 'This form will allow you to send an email to the selected user.  All fields are required.',
    27 => 'Short message',
    28 => '%s wrote: ',
    29 => "This is the daily digest from {$_CONF['site_name']} for ",
    30 => ' Daily Newsletter for ',
    31 => 'Title',
    32 => 'Date',
    33 => 'Read the full article at',
    34 => 'End of Message',
    35 => 'Sorry, this user prefers not to receive any emails.'
);

###############################################################################
# search.php

$LANG09 = array(
    1 => 'Fajnovejšie vyhľadávanie',
    2 => 'Kľúčové slová',
    3 => 'Téma',
    4 => 'Všetko',
    5 => 'Typ',
    6 => 'Články',
    7 => 'Komentáre',
    8 => 'Autor',
    9 => 'Všetko',
    10 => 'Hľadaj',
    11 => 'Výsledky hľadania',
    12 => 'zhôd',
    13 => 'Výsledok hľadania: žiadna zhoda',
    14 => 'Nenašla sa žiadna zhoda pri hľadaní',
    15 => 'Skús znova.',
    16 => 'Titul',
    17 => 'Dátum',
    18 => 'Autor',
    19 => 'Prehľadávanie celej databázy terajších a starých článkov',
    20 => 'Dátum',
    21 => 'do',
    22 => '(Formát dátumu YYYY-MM-DD)',
    23 => 'Prístupy',
    24 => 'Nášiel',
    25 => 'zhôd pre',
    26 => 'položiek za',
    27 => 'sekúnd',
    28 => 'Žiadny článok alebo komentár nepasuje na tvoje hľadanie',
    29 => 'Výsledok pre články a komentáre',
    30 => '%Ziadna linka nepasuje na tvoje hľadanie',
    31 => 'Tento modul nenašiel žiadnu zhodu',
    32 => 'Akcia',
    33 => 'URL',
    34 => 'Miesto',
    35 => 'Celý deň',
    36 => 'Žiadna akcia nepasuje na tvoje hľadanie',
    37 => 'Výsledok pre akcie',
    38 => 'Výsledok pre linky',
    39 => 'Linky',
    40 => 'Akcie',
    41 => 'Your query string should have at least 3 characters.',
    42 => 'Please use a date formatted as YYYY-MM-DD (year-month-day).',
    43 => 'exact phrase',
    44 => 'all of these words',
    45 => 'any of these words',
    46 => 'Next',
    47 => 'Previous',
    48 => 'Author',
    49 => 'Date',
    50 => 'Hits',
    51 => 'Link',
    52 => 'Location',
    53 => 'Story Results',
    54 => 'Comment Results',
    55 => 'the phrase',
    56 => 'AND',
    57 => 'OR',
    58 => 'More results &gt;&gt;',
    59 => 'Results',
    60 => 'per page',
    61 => 'Refine search'
);

###############################################################################
# stats.php

$LANG10 = array(
    1 => 'Štatistiky sajty',
    2 => 'Celkový počet prístupov',
    3 => 'Články(Komentáre)',
    4 => 'Ankety(Hlasované)',
    5 => 'Linky(Kliknuté)',
    6 => 'Akcie',
    7 => 'Najčítanejšie články',
    8 => 'Titulok',
    9 => 'Čítané',
    10 => 'Zdá sa, že na sajte nie sú žiadne články alebo ich nikto nečíta.',
    11 => 'Najkomentovanejšie články',
    12 => 'Komentárov',
    13 => 'Zdá sa, že na sajte nie sú žiadne články alebo ich nikto nekomentuje.',
    14 => 'Najpristupovanejšie ankety',
    15 => 'Anketná otázka',
    16 => 'Hlasov',
    17 => 'Zdá sa, že na sajte nie sú žiadne ankety alebo nikto nehlasoval.',
    18 => 'Najpristupovanejšie linky',
    19 => 'Linky',
    20 => 'Pristupy',
    21 => 'Zdá sa, že na sajte nie sú žiadne linky alebo na ne nikto nechodi.',
    22 => 'Články najviac posielané e-mailom',
    23 => 'E-maily',
    24 => 'Zdá sa, že nikto neposielal článok e-mailom.',
    25 => 'Top Ten Trackback Commented Stories',
    26 => 'No trackback comments found.',
    27 => 'Number of active users',
    28 => 'Top Ten Events',
    29 => 'Event',
    30 => 'Hits',
    31 => 'It appears that there are no events on this site or no one has ever clicked on one.'
);

###############################################################################
# article.php

$LANG11 = array(
    1 => 'Podobné',
    2 => 'Pošli e-mailom',
    3 => 'Verzia pre tlač',
    4 => 'Voľby článku',
    5 => 'PDF Story Format'
);

###############################################################################
# submit.php

$LANG12 = array(
    1 => 'To submit a %s you are required to be logged in as a user.',
    2 => 'Login',
    3 => 'New User',
    4 => 'Submit a Event',
    5 => 'Submit a Link',
    6 => 'Submit a Story',
    7 => 'Login is Required',
    8 => 'Submit',
    9 => 'When submitting information for use on this site we ask that you follow the following suggestions...<ul><li>Fill in all the fields, they\'re required<li>Provide complete and accurate information<li>Double check those URLs</ul>',
    10 => 'Title',
    11 => 'Link',
    12 => 'Start Date',
    13 => 'End Date',
    14 => 'Location',
    15 => 'Description',
    16 => 'If other, please specify',
    17 => 'Category',
    18 => 'Other',
    19 => 'Read First',
    20 => 'Error: Missing Category',
    21 => 'When selecting "Other" please also provide a category name',
    22 => 'Error: Missing Fields',
    23 => 'Please fill in all the fields on the form.  All fields are required.',
    24 => 'Submission Saved',
    25 => 'Your %s submission has been saved successfully.',
    26 => 'Speed Limit',
    27 => 'Username',
    28 => 'Topic',
    29 => 'Story',
    30 => 'Your last submission was ',
    31 => " seconds ago.  This site requires at least {$_CONF['speedlimit']} seconds between submissions",
    32 => 'Preview',
    33 => 'Story Preview',
    34 => 'Log Out',
    35 => 'HTML tags are not allowed',
    36 => 'Post Mode',
    37 => "Submitting an event to {$_CONF['site_name']} will put your event on the master calendar where users can optionally add your event to their personal calendar. This feature is <b>NOT</b> meant to store your personal events such as birthdays and anniversaries.<br><br>Once you submit your event it will be sent to our administrators and if approved, your event will appear on the master calendar.",
    38 => 'Add Event To',
    39 => 'Master Calendar',
    40 => 'Personal Calendar',
    41 => 'End Time',
    42 => 'Start Time',
    43 => 'All Day Event',
    44 => 'Address Line 1',
    45 => 'Address Line 2',
    46 => 'City/Town',
    47 => 'State',
    48 => 'Zip Code',
    49 => 'Event Type',
    50 => 'Edit Event Types',
    51 => 'Location',
    52 => 'Delete',
    53 => 'Create Account'
);

###############################################################################
# ADMIN PHRASES - These are file phrases used in admin scripts
###############################################################################

###############################################################################
# admin/auth.inc.php

$LANG20 = array(
    1 => 'Authentication Required',
    2 => 'Denied! Incorrect Login Information',
    3 => 'Invalid password for user',
    4 => 'Username:',
    5 => 'Password:',
    6 => 'All access to administrative portions of this web site are logged and reviewed.<br>This page is for the use of authorized personnel only.',
    7 => 'login'
);

###############################################################################
# admin/block.php

$LANG21 = array(
    1 => 'Insufficient Admin Rights',
    2 => 'You do not have the necessary rights to edit this block.',
    3 => 'Block Editor',
    4 => 'There was a problem reading this feed (see error.log for details).',
    5 => 'Block Title',
    6 => 'Topic',
    7 => 'All',
    8 => 'Block Security Level',
    9 => 'Block Order',
    10 => 'Block Type',
    11 => 'Portal Block',
    12 => 'Normal Block',
    13 => 'Portal Block Options',
    14 => 'RDF URL',
    15 => 'Last RDF Update',
    16 => 'Normal Block Options',
    17 => 'Block Content',
    18 => 'Please fill in the Block Title, Security Level and Content fields',
    19 => 'Block Manager',
    20 => 'Block Title',
    21 => 'Block SecLev',
    22 => 'Block Type',
    23 => 'Block Order',
    24 => 'Block Topic',
    25 => 'To modify or delete a block, click on that block below.  To create a new block click on new block above.',
    26 => 'Layout Block',
    27 => 'PHP Block',
    28 => 'PHP Block Options',
    29 => 'Block Function',
    30 => 'If you would like to have one of your blocks use PHP code, enter the name of the function above.  Your function name must start with the prefix "phpblock_" (e.g. phpblock_getweather).  If it does not have this prefix, your function will NOT be called.  We do this to keep people who may have hacked your Geeklog installation from putting arbitrary function calls that may be harmful to your system.  Be sure not to put empty parenthisis "()" after your function name.  Finally, it is recommended that you put all your PHP Block code in /path/to/geeklog/system/lib-custom.php.  That will allow the code to stay with you even when you upgrade to a newer version of Geeklog.',
    31 => 'Error in PHP Block.  Function, %s, does not exist.',
    32 => 'Error Missing Field(s)',
    33 => 'You must enter the URL to the .rdf file for portal blocks',
    34 => 'You must enter the title and the function for PHP blocks',
    35 => 'You must enter the title and the content for normal blocks',
    36 => 'You must enter the content for layout blocks',
    37 => 'Bad PHP block function name',
    38 => 'Functions for PHP Blocks must have the prefix \'phpblock_\' (e.g. phpblock_getweather).  The \'phpblock_\' prefix is required for security reasons to prevent the execution of arbitrary code.',
    39 => 'Side',
    40 => 'Left',
    41 => 'Right',
    42 => 'You must enter the blockorder and security level for Geeklog default blocks',
    43 => 'Homepage Only',
    44 => 'Access Denied',
    45 => "You are trying to access a block that you don't have rights to.  This attempt has been logged. Please <a href=\"{$_CONF['site_admin_url']}/block.php\">go back to the block administration screen</a>.",
    46 => 'New Block',
    47 => 'Admin Home',
    48 => 'Block Name',
    49 => ' (no spaces and must be unique)',
    50 => 'Help File URL',
    51 => 'include http://',
    52 => 'If you leave this blank the help icon for this block will not be displayed',
    53 => 'Enabled',
    54 => 'save',
    55 => 'cancel',
    56 => 'delete',
    57 => 'Move Block Down',
    58 => 'Move Block Up',
    59 => 'Move block to the right side',
    60 => 'Move block to the left side',
    61 => 'No Title',
    62 => 'Article Limit',
    63 => 'Bad Block Title',
    64 => 'Your Title must not be empty and cannot contain HTML!',
    65 => 'Order'
);

###############################################################################
# admin/event.php

$LANG22 = array(
    1 => 'Event Editor',
    2 => 'Error',
    3 => 'Event Title',
    4 => 'Event URL',
    5 => 'Event Start Date',
    6 => 'Event End Date',
    7 => 'Event Location',
    8 => 'Event Description',
    9 => '(include http://)',
    10 => 'You must provide the dates/times, description and event location!',
    11 => 'Event Manager',
    12 => 'To modify or delete a event, click on that event below.  To create a new event click on new event above.',
    13 => 'Event Title',
    14 => 'Start Date',
    15 => 'End Date',
    16 => 'Access Denied',
    17 => "You are trying to access an event that you don't have rights to.  This attempt has been logged. Please <a href=\"{$_CONF['site_admin_url']}/event.php\">go back to the event administration screen</a>.",
    18 => 'New Event',
    19 => 'Admin Home',
    20 => 'save',
    21 => 'cancel',
    22 => 'delete',
    23 => 'Bad start date.',
    24 => 'Bad end date.',
    25 => 'End date is before start date.'
);

###############################################################################
# admin/story.php

$LANG24 = array(
    1 => 'Previous Stories',
    2 => 'Next Stories',
    3 => 'Mode',
    4 => 'Post Mode',
    5 => 'Story Editor',
    6 => 'There are no stories in the system',
    7 => 'Author',
    8 => 'save',
    9 => 'preview',
    10 => 'cancel',
    11 => 'delete',
    12 => 'ID',
    13 => 'Title',
    14 => 'Topic',
    15 => 'Date',
    16 => 'Intro Text',
    17 => 'Body Text',
    18 => 'Hits',
    19 => 'Comments',
    20 => 'Ping',
    21 => 'Send Ping',
    22 => 'Story List',
    23 => 'To modify or delete a story, click on that story\'s number below. To view a story, click on the title of the story you wish to view. To create a new story click on new story above.',
    24 => 'The ID you chose for this story is already in use. Please use another ID.',
    25 => 'Error when saving story',
    26 => 'Story Preview',
    27 => 'If you use [unscaledX] instead of [imageX], the image will be inserted at its original dimensions.',
    28 => '<p><b>PREVIEWING</b>: Previewing a story with images attached is best done by saving the article as a draft INSTEAD OF hitting the preview button.  Use the preview button only when images are not attached.',
    29 => 'Trackbacks',
    30 => 'File Upload Errors',
    31 => 'Please fill in the Author, Title and Intro Text fields',
    32 => 'Featured',
    33 => 'There can only be one featured story',
    34 => 'Draft',
    35 => 'Yes',
    36 => 'No',
    37 => 'Viac od',
    38 => 'Viac z',
    39 => 'Emails',
    40 => 'Access Denied',
    41 => "You are trying to access a story that you don't have rights to.  This attempt has been logged.  You may view the article in read-only below. Please <a href=\"{$_CONF['site_admin_url']}/story.php\">go back to the story administration screen</a> when you are done.",
    42 => "You are trying to access a story that you don't have rights to.  This attempt has been logged.  Please <a href=\"{$_CONF['site_admin_url']}/story.php\">go back to the story administration screen</a>.",
    43 => 'New Story',
    44 => 'Admin Home',
    45 => 'Access',
    46 => '<b>NOTE:</b> if you modify this date to be in the future, this article will not be published until that date.  That also means the story will not be included in your RDF headline feed and it will be ignored by the search and statistics pages.',
    47 => 'Images',
    48 => 'image',
    49 => 'right',
    50 => 'left',
    51 => 'To add one of the images you are attaching to this article you need to insert specially formatted text.  The specially formatted text is [imageX], [imageX_right] or [imageX_left] where X is the number of the image you have attached.  NOTE: You must use the images you attach.  If you do not you will be unable to save your story.<BR><P><B>PREVIEWING</B>: Previewing a story with images attached is best done by saving the article as a draft INSTEAD OF hitting the preview button.  Use the preview button only when images are not attached.',
    52 => 'Delete',
    53 => 'was not used.  You must include this image in the intro or body before you can save your changes',
    54 => 'Attached Images Not Used',
    55 => 'The following errors occured while trying to save your story.  Please correct these errors before saving',
    56 => 'Show Topic Icon',
    57 => 'View unscaled image',
    58 => 'Story Management',
    59 => 'Option',
    60 => 'Enabled',
    61 => 'Auto Archive',
    62 => 'Auto Delete',
    63 => '',
    64 => '',
    65 => '',
    66 => '',
    67 => 'Expand the Content Edit Area size',
    68 => 'Reduce the Content Edit Area size',
    69 => 'Publish Story Date',
    70 => 'Toolbar Selection',
    71 => 'Basic Toolbar',
    72 => 'Common Toolbar',
    73 => 'Advanced Toolbar',
    74 => 'Advanced II Toolbar',
    75 => 'Full Featured',
    76 => 'Publish Options',
    77 => 'Javascript needs to be enabled for Advanced Editor. Option can be disabled in the main site config.php',
    78 => 'Click <a href="%s/story.php?mode=edit&amp;sid=%s&amp;editopt=default">here</a> to use default editor',
    79 => 'Preview',
    80 => 'Editor',
    81 => 'Publish Options',
    82 => 'Images',
    83 => 'Archive Options',
    84 => 'Permissions',
    85 => 'Show All'
);

###############################################################################
# admin/topic.php

$LANG27 = array(
    1 => 'Topic Editor',
    2 => 'Topic ID',
    3 => 'Topic Name',
    4 => 'Topic Image',
    5 => '(do not use spaces)',
    6 => 'Deleting a topic deletes all stories and blocks associated with it',
    7 => 'Please fill in the Topic ID and Topic Name fields',
    8 => 'Topic Manager',
    9 => 'To modify or delete a topic, click on that topic.  To create a new topic click the new topic button to the left. You will find your access level for each topic in parenthesis',
    10 => 'Sort Order',
    11 => 'Stories/Page',
    12 => 'Access Denied',
    13 => "You are trying to access a topic that you don't have rights to.  This attempt has been logged. Please <a href=\"{$_CONF['site_admin_url']}/topic.php\">go back to the topic administration screen</a>.",
    14 => 'Sort Method',
    15 => 'alphabetical',
    16 => 'default is',
    17 => 'New Topic',
    18 => 'Admin Home',
    19 => 'save',
    20 => 'cancel',
    21 => 'delete',
    22 => 'Default',
    23 => 'make this the default topic for new story submissions',
    24 => '(*)',
    25 => 'Archive Topic',
    26 => 'make this the default topic for archived stories. Only one topic allowed.',
    27 => 'Or Upload Topic Icon',
    28 => 'Maximum',
    29 => 'File Upload Errors'
);

###############################################################################
# admin/user.php

$LANG28 = array(
    1 => 'User Editor',
    2 => 'User ID',
    3 => 'User Name',
    4 => 'Full Name',
    5 => 'Password',
    6 => 'Security Level',
    7 => 'Email Address',
    8 => 'Domů, do Prahy, do Podolí,...',
    9 => '(do not use spaces)',
    10 => 'Please fill in the Username, Full name, Security Level and Email Address fields',
    11 => 'User Manager',
    12 => 'To modify or delete a user, click on that user below.  To create a new user click the new user button to the left. You can do simple searches by entering parts of a username,email address or fullname (e.g.*son* or *.edu) in the form below.',
    13 => 'SecLev',
    14 => 'Reg. Date',
    15 => 'New User',
    16 => 'Admin Home',
    17 => 'changepw',
    18 => 'cancel',
    19 => 'delete',
    20 => 'save',
    21 => 'The username you tried saving already exists.',
    22 => 'Error',
    23 => 'Batch Add',
    24 => 'Batch Import of Users',
    25 => 'You can import a batch of users into Geeklog.  The import file must a tab-delimited text file and must have the fields in the following order: full name, username, email address.  Each user you import will be emailed with a random password.  You must have one user entered per line.  Failure to follow these instructions will cause problems that may require manual work so double check your entries!',
    26 => 'Search',
    27 => 'Limit Results',
    28 => 'Check here to delete this picture',
    29 => 'Path',
    30 => 'Import',
    31 => 'New Users',
    32 => 'Done processing. Imported %d and encountered %d failures',
    33 => 'submit',
    34 => 'Error: You must specify a file to upload.',
    35 => 'Last Login',
    36 => '(never)',
    37 => 'UID',
    38 => 'Group Listing',
    39 => 'Password (again)',
    40 => 'Registration Date',
    41 => 'Last login Date',
    42 => 'Banned',
    43 => 'Awaiting Activation',
    44 => 'Awaiting Authorization',
    45 => 'Active',
    46 => 'User Status',
    47 => 'Edit'
);

###############################################################################
# admin/moderation.php

$LANG29 = array(
    1 => 'Approve',
    2 => 'Delete',
    3 => 'Edit',
    4 => 'Profile',
    10 => 'Title',
    11 => 'Start Date',
    12 => 'URL',
    13 => 'Category',
    14 => 'Date',
    15 => 'Topic',
    16 => 'User name',
    17 => 'Full name',
    18 => 'Email',
    34 => 'Command and Control',
    35 => 'Story Submissions',
    36 => 'Link Submissions',
    37 => 'Event Submissions',
    38 => 'Submit',
    39 => 'There are no submissions to moderate at this time',
    40 => 'User Submissions'
);

###############################################################################
# calendar.php

$LANG30 = array(
    1 => 'Sunday',
    2 => 'Monday',
    3 => 'Tuesday',
    4 => 'Wednesday',
    5 => 'Thursday',
    6 => 'Friday',
    7 => 'Saturday',
    8 => 'Add Event',
    9 => 'Geeklog Event',
    10 => 'Events for',
    11 => 'Master Calendar',
    12 => 'My Calendar',
    13 => 'January',
    14 => 'February',
    15 => 'March',
    16 => 'April',
    17 => 'May',
    18 => 'June',
    19 => 'July',
    20 => 'August',
    21 => 'September',
    22 => 'October',
    23 => 'November',
    24 => 'December',
    25 => 'Back to ',
    26 => 'All Day',
    27 => 'Week',
    28 => 'Personal Calendar for',
    29 => 'Public Calendar',
    30 => 'delete event',
    31 => 'Add',
    32 => 'Event',
    33 => 'Date',
    34 => 'Time',
    35 => 'Quick Add',
    36 => 'Submit',
    37 => 'Sorry, the personal calendar feature is not enabled on this site',
    38 => 'Personal Event Editor',
    39 => 'Day',
    40 => 'Week',
    41 => 'Month'
);

###############################################################################
# admin/mail.php

$LANG31 = array(
    1 => "{$_CONF['site_name']} Mail Utility",
    2 => 'From',
    3 => 'Reply-to',
    4 => 'Subject',
    5 => 'Body',
    6 => 'Send to:',
    7 => 'All users',
    8 => 'Admin',
    9 => 'Options',
    10 => 'HTML',
    11 => 'Urgent message!',
    12 => 'Send',
    13 => 'Reset',
    14 => 'Ignore user settings',
    15 => 'Error when sending to: ',
    16 => 'Successfully sent messages to: ',
    17 => "<a href={$_CONF['site_admin_url']}/mail.php>Send another message</a>",
    18 => 'To',
    19 => 'NOTE: if you wish to send a message to all site members, select the Logged-in Users group from the drop down.',
    20 => "Successfully sent <successcount> messages and unsuccessfully sent <failcount> messages.  If you need them, the details of each message attempts is below.  Otherwise you can <a href=\"{$_CONF['site_admin_url']}/mail.php\">Send another message</a> or you can <a href=\"{$_CONF['site_admin_url']}/moderation.php\">go back to the administration page</a>.",
    21 => 'Failures',
    22 => 'Successes',
    23 => 'No failures',
    24 => 'No successes',
    25 => '-- Select Group --',
    26 => 'Please fill in all the fields on the form and select a group of users from the drop down.'
);

###############################################################################
# admin/plugins.php

$LANG32 = array(
    1 => 'Installing plugins could possibly cause damage to your Geeklog installation and, possibly, to your system.  It is important that you only install plugins downloaded from the <a href="http://www.geeklog.net" target="_blank">Geeklog Homepage</a> as we thoroughly test all plugins submitted to our site on a variety of operating systems.  It is important that you understand that the plugin installation process will require the execution of a few filesystem commands which could lead to security problems particularly if you use plugins from third party sites.  Even with this warning you are getting, we do not gaurantee the success of any installation nor are we liable for damage caused by installing a Geeklog plugin.  In other words, install at your own risk.  For the wary, directions on how to manually install a plugin is included with each plugin package.',
    2 => 'Plug-in Installation Disclaimer',
    3 => 'Plug-in Installation Form',
    4 => 'Plug-in File',
    5 => 'Plug-in List',
    6 => 'Warning: Plug-in Already Installed!',
    7 => 'The plug-in you are trying to install already exists.  Please delete the plugin before re-installing it',
    8 => 'Plugin Compatibility Check Failed',
    9 => 'This plugin requires a newer version of Geeklog. Either upgrade your copy of <a href="http://www.geeklog.net">Geeklog</a> or get a newer version of the plug-in.',
    10 => '<br><b>There are no plugins currently installed.</b><br><br>',
    11 => 'To modify or delete a plug-in, click on that plug-in\'s number below. To learn more about a plug-in, click the plug-in name and you will be directed to that plug-in\'s website. To install or upgrade a plug-in please consult it\'s documentation.',
    12 => 'no plugin name provided to plugineditor()',
    13 => 'Plugin Editor',
    14 => 'New Plug-in',
    15 => 'Admin Home',
    16 => 'Plug-in Name',
    17 => 'Plug-in Version',
    18 => 'Geeklog Version',
    19 => 'Enabled',
    20 => 'Yes',
    21 => 'No',
    22 => 'Install',
    23 => 'Save',
    24 => 'Cancel',
    25 => 'Delete',
    26 => 'Plug-in Name',
    27 => 'Plug-in Homepage',
    28 => 'Plug-in Version',
    29 => 'Geeklog Version',
    30 => 'Delete Plug-in?',
    31 => 'Are you sure you want to delete this plug-in?  By doing so you will remove all the files, data and data structures that this plug-in uses.  If you are sure, click delete again on the form below.',
    32 => '<p><b>Error AutoLink tag not correct format</b></p>',
    33 => 'Code Version',
    34 => 'Update',
    35 => 'Edit',
    36 => 'Code',
    37 => 'Data',
    38 => 'Update!'
);

###############################################################################
# admin/syndication.php

$LANG33 = array(
    1 => 'create feed',
    2 => 'save',
    3 => 'delete',
    4 => 'cancel',
    10 => 'Content Syndication',
    11 => 'New Feed',
    12 => 'Admin Home',
    13 => 'To modify or delete a feed, click on the feed\'s title below. To create a new feed, click on New Feed above.',
    14 => 'Title',
    15 => 'Type',
    16 => 'Filename',
    17 => 'Format',
    18 => 'last updated',
    19 => 'Enabled',
    20 => 'Yes',
    21 => 'No',
    22 => '<i>(no feeds)</i>',
    23 => 'all Stories',
    24 => 'Feed Editor',
    25 => 'Feed Title',
    26 => 'Limit',
    27 => 'Length of entries',
    28 => '(0 = no text, 1 = full text, other = limit to that number of chars.)',
    29 => 'Description',
    30 => 'Last Update',
    31 => 'Character Set',
    32 => 'Language',
    33 => 'Contents',
    34 => 'Entries',
    35 => 'Hours',
    36 => 'Select type of feed',
    37 => 'You have at least one plugin installed that supports content syndication. Below you will need to select whether you want to create a Geeklog feed or a feed from one of the plugins.',
    38 => 'Error: Missing Fields',
    39 => 'Please fill in the Feed Title, Description, and Filename.',
    40 => 'Please enter a  number of entries or number of hours.',
    41 => 'Links',
    42 => 'Events',
    43 => 'All',
    44 => 'None',
    45 => 'Header-link in topic',
    46 => 'Limit Results',
    47 => 'Search',
    48 => 'Edit',
    49 => 'Feed Logo',
    50 => "Relative to site url ({$_CONF['site_url']})"
);

###############################################################################
# confirmation and error messages

$MESSAGE = array(
    1 => "Your password has been emailed to you and should arrive momentarily. Please follow the directions in the message and we thank-you for using {$_CONF['site_name']}",
    2 => "Thank-you for submitting your story to {$_CONF['site_name']}.  It has been submitted to our staff for approval. If approved, your story will be available for others to read on our site.",
    3 => "Thank-you for submitting a link to {$_CONF['site_name']}.  It has been submitted to our staff for approval.  If approved, your link will be seen in the <a href={$_CONF['site_url']}/links.php>links</a> section.",
    4 => "Thank-you for submitting an event to {$_CONF['site_name']}.  It has been submitted to our staff for approval.  If approved, your event will be seen in our <a href={$_CONF['site_url']}/calendar.php>calendar</a> section.",
    5 => 'Your account information has been successfully saved.',
    6 => 'Your display preferences have been successfully saved.',
    7 => 'Your comment preferences have been successfully saved.',
    8 => 'You have been successfully logged out.',
    9 => 'Your story has been successfully saved.',
    10 => 'The story has been successfully deleted.',
    11 => 'Your block has been successfully saved.',
    12 => 'The block has been successfully deleted.',
    13 => 'Your topic has been successfully saved.',
    14 => 'The topic and all it\'s stories an blocks have been successfully deleted.',
    15 => 'Your link has been successfully saved.',
    16 => 'The link has been successfully deleted.',
    17 => 'Your event has been successfully saved.',
    18 => 'The event has been successfully deleted.',
    19 => 'Your poll has been successfully saved.',
    20 => 'The poll has been successfully deleted.',
    21 => 'The new user has been successfully saved.',
    22 => 'The user has been successfully deleted',
    23 => 'Error trying to add an event to your calendar. There was no event id passed.',
    24 => 'The event has been saved to your calendar',
    25 => 'Cannot open your personal calendar until you login',
    26 => 'Event was successfully removed from your personal calendar',
    27 => 'Message successfully sent.',
    28 => 'The plug-in has been successfully saved',
    29 => 'Sorry, personal calendars are not enabled on this site',
    30 => 'Access Denied',
    31 => 'Sorry, you do not have access to the story administration page.  Please note that all attempts to access unauthorized features are logged',
    32 => 'Sorry, you do not have access to the topic administration page.  Please note that all attempts to access unauthorized features are logged',
    33 => 'Sorry, you do not have access to the block administration page.  Please note that all attempts to access unauthorized features are logged',
    34 => 'Sorry, you do not have access to the link administration page.  Please note that all attempts to access unauthorized features are logged',
    35 => 'Sorry, you do not have access to the event administration page.  Please note that all attempts to access unauthorized features are logged',
    36 => 'Sorry, you do not have access to the poll administration page.  Please note that all attempts to access unauthorized features are logged',
    37 => 'Sorry, you do not have access to the user administration page.  Please note that all attempts to access unauthorized features are logged',
    38 => 'Sorry, you do not have access to the plugin administration page.  Please note that all attempts to access unauthorized features are logged',
    39 => 'Sorry, you do not have access to the mail administration page.  Please note that all attempts to access unauthorized features are logged',
    40 => 'System Message',
    41 => 'Sorry, you do not have access to the word replacement page.  Please note that all attempts to access unauthorized features are logged',
    42 => 'Your word has been successfully saved.',
    43 => 'The word has been successfully deleted.',
    44 => 'The plug-in was successfully installed!',
    45 => 'The plug-in was successfully deleted.',
    46 => 'Sorry, you do not have access to the database backup utility.  Please note that all attempts to access unauthorized features are logged',
    47 => 'This functionality only works under *nix.  If you are running *nix as your operating system then your cache has been successfully cleared. If you are on Windows, you will need to search for files name adodb_*.php and remove them manually.',
    48 => "Thank you for applying for a membership with {$_CONF['site_name']}. Our team will review your application. If approved, your password will be emailed to you at the email address you just entered.",
    49 => 'Your group has been successfully saved.',
    50 => 'The group has been successfully deleted.',
    51 => 'This username is already in use. Please choose another one.',
    52 => 'The email address provided does not appear to be a valid email address.',
    53 => 'Your new password has been accepted. Please use your new password below to log in now.',
    54 => 'Your request for a new password has expired. Please try again below.',
    55 => 'An email has been sent to you and should arrive momentarily. Please follow the directions in the message to set a new password for your account.',
    56 => 'The email address provided is already in use for another account.',
    57 => 'Your account has been successfully deleted.',
    58 => 'Your feed has been successfully saved.',
    59 => 'The feed has been successfully deleted.',
    60 => 'The plugin was successfully updated',
    61 => 'Plugin %s: Unknown message placeholder',
    62 => 'The trackback comment has been deleted.',
    63 => 'An error occurred when deleting the trackback comment.',
    64 => 'Your trackback comment has been successfully sent.',
    65 => 'Weblog directory service successfully saved.',
    66 => 'The weblog directory service has been deleted.',
    67 => 'The new password does not match the confirmation password!',
    68 => 'You have to enter the correct current password.',
    69 => 'Your account has been blocked!',
    70 => 'Your account is awaiting administrator approval.',
    71 => 'Your account has now been confirmed and is awaiting administrator approval.',
    72 => 'An error occured while attempting to install the plugin. See error.log for details.',
    73 => 'An error occured while attempting to uninstall the plugin. See error.log for details.',
    74 => 'The pingback has been successfully sent.',
    75 => 'Trackbacks must be sent using a POST request.'
);

###############################################################################

$LANG_ACCESS = array(
    'access' => 'Access',
    'ownerroot' => 'Owner/Root',
    'group' => 'Group',
    'readonly' => 'Read-Only',
    'accessrights' => 'Access Rights',
    'owner' => 'Owner',
    'grantgrouplabel' => 'Grant Above Group Edit Rights',
    'permmsg' => 'NOTE: members is all logged in members of the site and anonymous is all users browsing the site that aren\'t logged in.',
    'securitygroups' => 'Security Groups',
    'editrootmsg' => "Even though you are a User Administrator, you can't edit a root user without first being a root user yourself.  You can edit all other users except root users. Please note that all attempts to illegally edit root users are logged.  Please go back to the <a href=\"{$_CONF['site_admin_url']}/users.php\">User Administration page</a>.",
    'securitygroupsmsg' => 'Select the checkboxes for the groups you want the user to belong to.',
    'groupeditor' => 'Group Editor',
    'description' => 'Description',
    'name' => 'Name',
    'rights' => 'Rights',
    'missingfields' => 'Missing Fields',
    'missingfieldsmsg' => 'You must supply the name and a description for a group',
    'groupmanager' => 'Group Manager',
    'newgroupmsg' => 'To modify or delete a group, click on that group below. To create a new group click new group above. Please note that core groups cannot be deleted because they are used in the system.',
    'groupname' => 'Group Name',
    'coregroup' => 'Core Group',
    'yes' => 'Yes',
    'no' => 'No',
    'corerightsdescr' => "This group is a core {$_CONF['site_name']} Group.  Therefore the rights for this group cannot be edited.  Below is a read-only list of the rights this group has access to.",
    'groupmsg' => 'Security Groups on this site are hierarchical.  By adding this group to any of the groups below you will giving this group the same rights that those groups have.  Where possible it is encouraged you use the groups below to give rights to a group.  If you need this group to have custom rights then you can select the rights to various site features in the section below called \'Rights\'.  To add this group to any of the ones below simply check the box next to the group(s) that you want.',
    'coregroupmsg' => "This group is a core {$_CONF['site_name']} Group.  Therefore the groups that this groups belongs to cannot be edited.  Below is a read-only list of the groups this group belongs to.",
    'rightsdescr' => 'A groups access to a certain right below can be given directly to the group OR to a different group that this group is a part of.  The ones you see below without a checkbox are the rights that have been given to this group because it belongs to another group with that right.  The rights with checkboxes below are rights that can be given directly to this group.',
    'lock' => 'Lock',
    'members' => 'Members',
    'anonymous' => 'Anonymous',
    'permissions' => 'Permissions',
    'permissionskey' => 'R = read, E = edit, edit rights assume read rights',
    'edit' => 'Edit',
    'none' => 'None',
    'accessdenied' => 'Access Denied',
    'storydenialmsg' => "You do not have access to view this story.  This could be because you aren't a member of {$_CONF['site_name']}.  Please <a href=users.php?mode=new> become a member</a> of {$_CONF['site_name']} to receive full membership access!",
    'eventdenialmsg' => "You do not have access to view this event.  This could be because you aren't a member of {$_CONF['site_name']}.  Please <a href=users.php?mode=new> become a member</a> of {$_CONF['site_name']} to receive full membership access!",
    'nogroupsforcoregroup' => 'This group doesn\'t belong to any of the other groups',
    'grouphasnorights' => 'This group doesn\'t have access to any of the administrative features of this site',
    'newgroup' => 'New Group',
    'adminhome' => 'Admin Home',
    'save' => 'save',
    'cancel' => 'cancel',
    'delete' => 'delete',
    'canteditroot' => 'You have tried to edit the Root group but you are not in the Root group yourself therefore your access to this group is denied.  Please contact the system administrator if you feel this is an error',
    'listusers' => 'List Users',
    'listthem' => 'list',
    'usersingroup' => 'Users in group "%s"',
    'usergroupadmin' => 'User Group Administration',
    'add' => 'Add',
    'remove' => 'Remove',
    'availmembers' => 'Available Members',
    'groupmembers' => 'Group Members',
    'canteditgroup' => 'To edit this group, you have to be a member of the group. Please contact the system administrator if you feel this is an error.',
    'cantlistgroup' => 'To see the members of this group, you have to be a member yourself. Please contact the system administrator if you feel this is an error.',
    'editgroupmsg' => 'To modify the group membership, click on the member names(s) and use the add or remove buttons. If the member is a member of the group, their name will appear on the right side only. Once you are complete - press <b>Save</b> to update the group and return to the main group admin page.',
    'listgroupmsg' => 'Listing of all current members in the group: <b>%s</b>',
    'search' => 'Search',
    'submit' => 'Submit',
    'limitresults' => 'Limit Results',
    'group_id' => 'Group ID',
    'plugin_access_denied_msg' => 'You are illegally trying access a plugin administration page.  Please note that all attempts to illegally access this page are logged.',
    'groupexists' => 'Group name already exists',
    'groupexistsmsg' => 'There is already a group with this name. Group names must be unique.'
);

###############################################################################
# admin/database.php

$LANG_DB_BACKUP = array(
    'last_ten_backups' => 'Last 10 Back-ups',
    'do_backup' => 'Do Backup',
    'backup_successful' => 'Database back up was successful.',
    'db_explanation' => 'To create a new backup of your Geeklog system, hit the button below',
    'not_found' => "Incorrect path or mysqldump utility not executable.<br>Check <strong>\$_DB_mysqldump_path</strong> definition in config.php.<br>Variable currently defined as: <var>{$_DB_mysqldump_path}</var>",
    'zero_size' => 'Backup Failed: Filesize was 0 bytes',
    'path_not_found' => "{$_CONF['backup_path']} does not exist or is not a directory",
    'no_access' => "ERROR: Directory {$_CONF['backup_path']} is not accessible.",
    'backup_file' => 'Backup file',
    'size' => 'Size',
    'bytes' => 'Bytes',
    'total_number' => 'Total number of backups: %d'
);

###############################################################################

$LANG_BUTTONS = array(
    1 => 'E.T. domů',
    2 => 'Kontakt',
    3 => 'Napíš článok',
    4 => 'Linky',
    5 => 'Ankety',
    6 => 'Kalendár',
    7 => 'Štatistiky sajty',
    8 => 'Prispôsobenie',
    9 => 'Hľadaj',
    10 => 'Fajnové vyhľadávanie',
    11 => 'Directory'
);

###############################################################################
# 404.php

$LANG_404 = array(
    1 => '404 Error',
    2 => 'Gee, I\'ve looked everywhere but I can not find <b>%s</b>.',
    3 => "<p>We're sorry, but the file you have requested does not exist. Please feel free to check the <a href=\"{$_CONF['site_url']}\">main page</a> or the <a href=\"{$_CONF['site_url']}/search.php\">search page</a> to see if you can find what you lost."
);

###############################################################################
# login form

$LANG_LOGIN = array(
    1 => 'Login required',
    2 => 'Sorry, to access this area you need to be logged in as a user.',
    3 => 'Login',
    4 => 'New User'
);

###############################################################################
# pdfgenerator.php

$LANG_PDF = array(
    1 => 'The PDF feature has been disabled',
    2 => 'The document provided was not rendered. The document was received but could not be processed.  Please make sure to submit only html formatted documents that have been written to the xHTML standard. Please note that overly complex html documents may not render correctly or at all.The document resulting from your attempt was 0 bytes in length, and has been deleted. If you\'re sure that your document should render fine, please re-submit it.',
    3 => 'Unknown error during PDF generation',
    4 => "No page data was given or you want to use the ad-hoc PDF generation tool below.  If you think you are getting this page\n          in error then please contact the system administrator.  Otherwise, you may use the form below to generate PDF's in an ad-hoc fashion.",
    5 => 'Loading your document.',
    6 => 'Please wait while your document is loaded.',
    7 => 'You may right click the button below and choose \'save target...\' or \'save link location...\' to save a copy of your document.',
    8 => "The path given in the configuration file to the HTMLDoc binary is invalid or this system cannot execute it.  Please contact the site administrator if this problem\n          persists.",
    9 => 'PDF Generator',
    10 => "This is the Ad-hoc PDF Generation tool. It will attempt to convert any URL you give into a PDF.  Please note that some web pages will not render properly with this feature.  This\n           is a limitation of the HTMLDoc PDF generation tool and such errors should not be reported to the administrators of this site",
    11 => 'URL',
    12 => 'Generate PDF!',
    13 => 'The PHP configuration on this server does not allow URLs to be used with the fopen() command.  The system administrator must edit the php.ini file and set allow_url_fopen to On',
    14 => 'The PDF you requested either does not exist or you tried to illegally access a file.'
);

###############################################################################
# trackback.php

$LANG_TRB = array(
    'trackback' => 'Trackback',
    'from' => 'from',
    'tracked_on' => 'Tracked on',
    'read_more' => '[read more]',
    'intro_text' => 'Here\'s what others have to say about \'%s\':',
    'no_comments' => 'No trackback comments for this entry.',
    'this_trackback_url' => 'Trackback URL for this entry:',
    'num_comments' => '%d trackback comments',
    'send_trackback' => 'Send Pings',
    'preview' => 'Preview',
    'editor_title' => 'Send trackback comment',
    'trackback_url' => 'Trackback URL',
    'entry_url' => 'Entry URL',
    'entry_title' => 'Entry Title',
    'blog_name' => 'Site Name',
    'excerpt' => 'Excerpt',
    'truncate_warning' => 'Note: The receiving site may truncate your excerpt',
    'button_send' => 'Send',
    'button_preview' => 'Preview',
    'send_error' => 'Error',
    'send_error_details' => 'Error when sending trackback comment:',
    'url_missing' => 'No Entry URL',
    'url_required' => 'Please enter at least a URL for the entry.',
    'target_missing' => 'No Trackback URL',
    'target_required' => 'Please enter a trackback URL',
    'error_socket' => 'Could not open socket.',
    'error_response' => 'Response not understood.',
    'error_unspecified' => 'Unspecified error.',
    'select_url' => 'Select Trackback URL',
    'not_found' => 'Trackback URL not found',
    'autodetect_failed' => 'Geeklog could not detect the Trackback URL for the post you want to send your comment to. Please enter it manually below.',
    'trackback_explain' => 'From the links below, please select the URL you want to send your Trackback comment to. Geeklog will then try to determine the correct Trackback URL for that post. Or you can <a href="%s">enter it manually</a> if you know it already.',
    'no_links_trackback' => 'No links found. You can not send a Trackback comment for this entry.',
    'pingback' => 'Pingback',
    'pingback_results' => 'Pingback results',
    'send_pings' => 'Send Pings',
    'send_pings_for' => 'Send Pings for "%s"',
    'no_links_pingback' => 'No links found. No Pingbacks were sent for this entry.',
    'pingback_success' => 'Pingback sent.',
    'no_pingback_url' => 'No pingback URL found.',
    'resend' => 'Resend',
    'ping_all_explain' => 'You can now notify the sites you linked to (<a href="http://en.wikipedia.org/wiki/Pingback">Pingback</a>), advertise that your site has been updated by pinging weblog directory services, or send a <a href="http://en.wikipedia.org/wiki/Trackback">Trackback</a> comment in case you wrote about a post on someone else\'s site.',
    'pingback_button' => 'Send Pingback',
    'pingback_short' => 'Send Pingbacks to all sites linked from this entry.',
    'pingback_disabled' => '(Pingback disabled)',
    'ping_button' => 'Send Ping',
    'ping_short' => 'Ping weblog directory services.',
    'ping_disabled' => '(Ping disabled)',
    'trackback_button' => 'Send Trackback',
    'trackback_short' => 'Send a Trackback comment.',
    'trackback_disabled' => '(Trackback disabled)',
    'may_take_a_while' => 'Please note that sending Pingbacks and Pings may take a while.',
    'ping_results' => 'Ping results',
    'unknown_method' => 'Unknown ping method',
    'ping_success' => 'Ping sent.',
    'error_site_name' => 'Please enter the site\'s name.',
    'error_site_url' => 'Please enter the site\'s URL.',
    'error_ping_url' => 'Please enter a valid Ping URL.',
    'no_services' => 'No weblog directory services configured.',
    'services_headline' => 'Weblog Directory Services',
    'service_explain' => 'To modify or delete a weblog directory service, click on the edit icon of that service below. To add a new weblog directory service, click on "Create New" above.',
    'service' => 'Service',
    'ping_method' => 'Ping method',
    'service_website' => 'Website',
    'service_ping_url' => 'URL to ping',
    'ping_standard' => 'Standard Ping',
    'ping_extended' => 'Extended Ping',
    'ping_unknown' => '(unknown method)',
    'edit_service' => 'Edit Weblog Directory Service',
    'trackbacks' => 'Trackbacks',
    'editor_intro' => 'Prepare your trackback comment for <a href="%s">%s</a>.',
    'editor_intro_none' => 'Prepare your trackback comment.',
    'trackback_note' => 'To send a trackback comment for a story, go to the list of stories and click on "Send Ping" for the story. To send a trackback that is not related to a story, <a href="%s">click here</a>.',
    'pingback_explain' => 'Enter a URL to send the Pingback to. The pingback will point to your site\'s homepage.',
    'pingback_url' => 'Pingback URL',
    'site_url' => 'This site\'s URL',
    'pingback_note' => 'To send a pingback for a story, go to the list of stories and click on "Send Ping" for the story. To send a pingback that is not related to a story, <a href="%s">click here</a>.',
    'pbtarget_missing' => 'No Pingback URL',
    'pbtarget_required' => 'Please enter a pingback URL',
    'pb_error_details' => 'Error when sending the pingback:'
);

###############################################################################
# directory.php

$LANG_DIR = array(
    'title' => 'Article Directory',
    'title_year' => 'Article Directory for %d',
    'title_month_year' => 'Article Directory for %s %d',
    'nav_top' => 'Back to Article Directory',
    'no_articles' => 'No articles.'
);

###############################################################################
# "What's New" Time Strings
# 
# For the first two strings, you can use the following placeholders.
# Order them so it makes sense in your language:
# %i    item, "Stories"
# %n    amount, "2", "20" etc.
# %t    time, "2" (weeks)
# %s    scale, "hrs", "weeks"

$LANG_WHATSNEW = array(
    'new_string' => '%n new %i in the last %t %s',
    'new_last' => 'last %t %s',
    'minutes' => 'minutes',
    'hours' => 'hours',
    'days' => 'days',
    'weeks' => 'weeks',
    'months' => 'months',
    'minute' => 'minute',
    'hour' => 'hour',
    'day' => 'day',
    'week' => 'week',
    'month' => 'month'
);

###############################################################################
# Admin - Strings
# 
# These are some standard strings used by core functions as well as plugins to
# display administration lists and edit pages

$LANG_ADMIN = array(
    'search' => 'Search',
    'limit_results' => 'Limit Results',
    'submit' => 'Submit',
    'edit' => 'Edit',
    'admin_home' => 'Admin Home',
    'create_new' => 'Create New',
    'enabled' => 'Enabled',
    'title' => 'Title',
    'type' => 'Type',
    'topic' => 'Topic',
    'help_url' => 'Help File URL',
    'save' => 'Save',
    'cancel' => 'Cancel',
    'delete' => 'Delete',
    'copy' => 'Copy',
    'no_results' => '- No entries found -',
    'data_error' => 'There was an error processing the subscription data. Please check the data source.'
);

###############################################################################
# Localisation of the texts for the various drop-down menus that are actually
# stored in the database. If these exist, they override the texts from the
# database.

$LANG_commentcodes = array(
    0 => 'Comments Enabled',
    -1 => 'Comments Disabled'
);


$LANG_commentmodes = array(
    'flat' => 'Flat',
    'nested' => 'Nested',
    'threaded' => 'Threaded',
    'nocomment' => 'No Comments'
);

$LANG_cookiecodes = array(
    0 => '(don\'t)',
    3600 => '1 Hour',
    7200 => '2 Hours',
    10800 => '3 Hours',
    28800 => '8 Hours',
    86400 => '1 Day',
    604800 => '1 Week',
    2678400 => '1 Month'
);

$LANG_dateformats = array(
    0 => 'System Default'
);

$LANG_featurecodes = array(
    0 => 'Not Featured',
    1 => 'Featured'
);

$LANG_frontpagecodes = array(
    0 => 'Show Only in Topic',
    1 => 'Show on Front Page'
);

$LANG_postmodes = array(
    'plaintext' => 'Plain Old Text',
    'html' => 'HTML Formatted'
);

$LANG_sortcodes = array(
    'ASC' => 'Oldest First',
    'DESC' => 'Newest First'
);

$LANG_trackbackcodes = array(
    0 => 'Trackback Enabled',
    -1 => 'Trackback Disabled'
);

?>