<?php

###############################################################################
# This is the Spanish language page for GeekLog!
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

$LANG_CHARSET = 'iso-8859-1';

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
    1 => 'Autor:',
    2 => 'lectura de l\'art�cle complet',
    3 => 'comentaris',
    4 => 'Edici�',
    5 => 'Vota',
    6 => 'Resultats',
    7 => 'Resultats de l\'enquesta',
    8 => 'vots',
    9 => 'Funcions de l\'Administrador/a:',
    10 => 'Propostes',
    11 => 'Not�cies',
    12 => 'Blocs',
    13 => 'Seccions',
    14 => 'Enlla�os',
    15 => 'Esdeveniments',
    16 => 'Enquestes',
    17 => 'Usuaris/es',
    18 => 'Cerca SQL',
    19 => 'Sortida',
    20 => 'Informaci� de l\'usuari/a:',
    21 => 'Nom de l\'usuari/a',
    22 => 'Identitat (ID) de l\'usuari/a',
    23 => 'Nivell de Seguretat',
    24 => 'An�nim',
    25 => 'Respondre',
    26 => 'Els seg�ents comentaris s�n de la persona que els hagi enviat. Aquest lloc no es fa responsable de les opinions expresades pels participants dels f�rums i seccions de comentaris, i el fet de publicar les mateixes no significa que s\'estigui d\'acord amb elles.',
    27 => 'Comentari m�s recent',
    28 => 'Borrar',
    29 => 'No hi ha comentaris dels usuaris.',
    30 => 'Noticies anteriors',
    31 => 'Etiquetes HTML permeses:',
    32 => 'Error, usuari inv�lid',
    33 => 'Error, no ha sigut possible escriure el registre',
    34 => 'Error',
    35 => 'Sortir',
    36 => 'sobre',
    37 => 'No hi ha noticies de l\'usuari/a',
    38 => 'Sindicaci� del contingut',
    39 => 'Actualitzaci�',
    40 => 'Tens <tt>register_globals = Off</tt> al teu <tt>php.ini</tt>. No obstant, Geeklog requereix que <tt>register_globals</tt> estigui <strong>on</strong>. Abans de continuar, siusplau cambia-ho a <strong>on</strong> i reengega el teu servidor web.',
    41 => 'Usuaris invitats',
    42 => 'Escrit per:',
    43 => 'Respondre a',
    44 => 'Torna',
    45 => 'N�mero d\'Error MySQL',
    46 => 'Missatge d\'Error MySQL',
    47 => 'Funcions de l\'usuari/a',
    48 => 'La meva conta',
    49 => 'Les meves Prefer�ncies',
    50 => 'Error en una frase SQL',
    51 => 'ajuda',
    52 => 'Nuevo',
    53 => 'Secci� d\'Administraci�',
    54 => 'No s\'ha pogut obrir l\'arxiu.',
    55 => 'Error en',
    56 => 'Vota',
    57 => 'Contrassenya',
    58 => 'Identificaci�',
    59 => "�Encara no tens una conta? <a href=\"{$_CONF['site_url']}/users.php?mode=new\">Inscr�u-te</a>",
    60 => 'Afegeix un comentari',
    61 => 'Crea una conta nova',
    62 => 'paraules',
    63 => 'Prefer�ncies de Not�cies',
    64 => 'Envia-la a un amic o amiga',
    65 => 'Veure la versi� per imprimir',
    66 => 'El meu Calendari',
    67 => 'Benvingut/da a ',
    68 => 'P�gina Inicial',
    69 => 'contacte',
    70 => 'cercar',
    71 => 'envia la not�cia',
    72 => 'enlla�os a altres webs',
    73 => 'enquestes anteriors',
    74 => 'calendari',
    75 => 'cerca avan�ada',
    76 => 'estad�stiques del lloc',
    77 => 'Plugins',
    78 => 'Propers Esdeveniments',
    79 => 'Novetats',
    80 => 'noticies',
    81 => 'noticia',
    82 => 'hores',
    83 => 'COMENTARIS',
    84 => 'ENLLA�OS',
    85 => '�ltimes 48 hores',
    86 => 'No hi ha comentaris nous',
    87 => '�ltimes 2 setmanes',
    88 => 'No hi ha enlla�os nous',
    89 => 'No hi ha propers esdeveniments',
    90 => 'P�gina Inicial',
    91 => 'Aquesta plana va ser creada en',
    92 => 'segons',
    93 => 'Drets d\'autor',
    94 => 'Totos les marques i drets en aquesta plana s�n dels seus respectius propietaris.',
    95 => 'Una altra web feta amb',
    96 => 'Grups',
    97 => 'Llista de Paraules',
    98 => 'Plug-ins',
    99 => 'NOTICIES',
    100 => 'No hi ha noticies noves',
    101 => 'Els meus Esdeveniments',
    102 => 'Esdeveniments del lloc',
    103 => 'Copies de seguretat de la base de dades',
    104 => 'per',
    105 => 'Usuaris del Correu',
    106 => 'Lectures',
    107 => 'Comprobaci� de la versi� de GL',
    108 => 'Neteja la c�pia de visites (Cach�)',
    109 => 'Den�ncia els abusos',
    110 => 'Den�ncia aquest missatge a l\'administrador d\'aquest lloc',
    111 => 'Veure la versi� PDF',
    112 => 'Usuaris inscrits',
    113 => 'Documentaci�',
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
    1 => 'Calendari d\'Esdeveniments',
    2 => 'Disculpa, no hi ha esdeveniments a mostrar.',
    3 => 'Quan',
    4 => 'On',
    5 => 'Descripci�',
    6 => 'Afegeix un esdeveniment',
    7 => 'Pr�xims esdeveniments',
    8 => 'A l\'afegir aquest esdeveniment al calendari podr�s veure rapidament els esdeveniments que t\'interessin. Per fer-ho escull "El meu Calendari" a l\'�rea de Funcions de l\'usuari/a.',
    9 => 'Afegir a "El meu Calendari"',
    10 => 'Treure de "El meu Calendari"',
    11 => "Afegint l\'Esdeveniment al calendari de {$_USER['username']}",
    12 => 'Esdeveniment',
    13 => 'Comen�a',
    14 => 'Acaba',
    15 => 'Tornar al Calendari'
);

###############################################################################
# comment.php

$LANG03 = array(
    1 => 'Afegeix un Comentari',
    2 => 'Tipo d\'enviament',
    3 => 'Sortida',
    4 => 'Crea una conta',
    5 => 'Nom de l\'usuari/a',
    6 => 'Aquest lloc requereix que tinguis una conta per a poder enviar un comentari. Si ja la tens, introdueix el nom d\'usuari i la contrassenya. Si no tens una conta, pots crear-ne una de nova al formulari de sota',
    7 => 'El teu �ltim comentari va ser fa ',
    8 => " segons. Aquest lloc requereix com a m�nim {$_CONF['commentspeedlimit']} segons entre comentari i comentari",
    9 => 'Comentari',
    10 => 'Envia la den�ncia',
    11 => 'Envia el comentari',
    12 => 'Siusplau completa el T�tol i Comentari, ja que s�n dades necessaries per enviar un comentari.',
    13 => 'La teva Informaci�',
    14 => 'Lectura Pr�via',
    15 => 'Den�ncia aquest missatge',
    16 => 'T�tol',
    17 => 'Error',
    18 => 'Coses Importants',
    19 => 'Siusplau, intenta mantindre el tema de la noticia.',
    20 => 'Intenta respondre als comentaris dels dem�s en lloc de comen�ar una nova discussi�.',
    21 => 'Llegeix els comentaris enviats per evitar comentaris duplicats.',
    22 => 'Utilitza un t�tol clar que descrigui el contingut del teu missatge.',
    23 => 'La teva direcci� de correu electr�nic NO ser� divulgada.',
    24 => 'Usuari An�nim',
    25 => '�Estas segur/a de que vols denunciar aquest missatge a l\'administrador del lloc?',
    26 => '%s ha denunciat el seg�ent comentari abusiu:',
    27 => 'Den�ncia d\'ab�s'
);

###############################################################################
# users.php

$LANG04 = array(
    1 => 'Perfil de l\'usuari/a per',
    2 => 'Nom de l\'usuari/a',
    3 => 'Nom Complet',
    4 => 'Contrassenya',
    5 => 'Correu electr�nic',
    6 => 'P�gina personal',
    7 => 'Biograf�a',
    8 => 'Clau PGP',
    9 => 'Guardar la Informaci�',
    10 => '�ltims 10 comentaris',
    11 => 'No hi ha comentaris',
    12 => 'Prefer�ncies de l\'usuari/a per',
    13 => 'Enviar un resum cada nit per correu electr�nic',
    14 => 'Aquesta contrassenya es genera a l\'atzar. Es recomana cambiar la contrassenya el m�s aviat possible. Per cambiar la contrassenya conecta al lloc amb el teu nom d\'usuari.',
    15 => "La teva conta a {$_CONF['site_name']} s\'ha creat satisfactoriament. Per poder utilitzar-la tens que ingressar utilizant les dades donades m�s aball. Guarda aquest missatge per futures refer�ncies.",
    16 => 'Informaci� de la teva conta',
    17 => 'La conta no existeix',
    18 => 'La direcci� de correu electr�nic ingressada no sembla ser v�lida.',
    19 => 'l\'usuari/a i la direcci� de correu electr�nic ja existeixen',
    20 => 'La direcci� de correu electr�nic ingressada no sembla ser v�lida.',
    21 => 'Error',
    22 => "Inscr�u-te a {$_CONF['site_name']}!",
    23 => "La creaci� d\'una conta et donar� les ventatges dels usuaris de {$_CONF['site_name']} i et permetr� enviar noticies, comentaris, etc. Si no tens una conta nom�s ho podr�s fer an�nimament. Volem remarcar que la teva direcci� de correu electr�nic <b><i>mai</i></b> ser� publicada en aquest lloc.",
    24 => 'La Contrassenya s\'enviar� a la direcci� de correu electr�nic que ingressis.',
    25 => '�No recordes la teva contrassenya?',
    26 => 'Ingressa <em>o</em> el teu nom d\'usuari <em>o</em> la direcci� de correu electr�nic que vas utilitzar per inscriure\'t i clica Enviar Contrassenya. T\'arrivaran per correu electr�nic les instruccions per crear una nova contrassenya a la direcci� que figura a l\'arxiu,.',
    27 => '�Inscriu-te ara!',
    28 => 'Enviar la contrassenya per correu electr�nic',
    29 => 'desconectat/da de',
    30 => 'conectat/da a',
    31 => 'La funci� que has escollit requereix que estiguis connectat/da',
    32 => 'Firma',
    33 => 'No es mostrar� publicament',
    34 => 'Aquest es el teu nom de veritat',
    35 => 'Ingressa la nova contrassenya per cambiar-la',
    36 => 'Comen�a amb http://',
    37 => 'S\'aplica als teus comentaris',
    38 => '�Tot sobre Tu! Tothomm podr� llegir aix�.',
    39 => 'La teva clau p�blica de PGP per compartir',
    40 => 'Sense icones de seccions',
    41 => 'Intenci� de moderar',
    42 => 'Format de la data',
    43 => 'Quantitat m�xima de noticies',
    44 => 'Sense requadres',
    45 => 'Mostrar las preferencies de',
    46 => 'Elements exclosos de',
    47 => 'Configuraci� de Noticies per',
    48 => 'Seccions',
    49 => 'Sense icones en les noticies',
    50 => 'No seleccionis aix� si no est�s interessat',
    51 => 'Nom�s les noticies noves',
    52 => 'El valor per defecte es',
    53 => 'Recepci� cada nit les noticies del dia',
    54 => 'Selecciona les Seccions i Autors que no vols veure.',
    55 => 'Si no en selecciones cap significa que vols la sel�lecci� per defecte. De seleccionar-ne alguna, selecciona totes les del teu inter�s ja que les opcions per defecte ja no ser�n tingudes en compte. Les opcions per defecte es mostren resaltades.',
    56 => 'Autors',
    57 => 'Mode de Presentaci�',
    58 => 'Ordre de classificaci�',
    59 => 'L�mit per Comentari',
    60 => 'Com vols veure els comentaris?',
    61 => 'Primer els m�s antics o els m�s recents?',
    62 => 'El valor per defecte es 100',
    63 => "Gracies per utilitzar {$_CONF['site_name']}. T\'hem enviat la teva contrassenya per correu electr�nic i arribar� en uns moments. Siusplau segueix les instruccions del missatge.",
    64 => 'Prefer�ncies pels comentaris de',
    65 => 'Intenta reconectar-te una altre vegada',
    66 => "Les dades ingressades no son v�lides. Intenta reconectar a sota. �Ets un <a href=\"{$_CONF['site_url']}/users.php?mode=new\">usuari/a nou/va</a>?",
    67 => 'Membre desde',
    68 => 'Recorda\'m durant',
    69 => '�Quanta estona hem de mantenir el teu nom d\'usuari/a en actiu despr�s de conectar?',
    70 => "Personalitza l\'aparen�a i el contingut de {$_CONF['site_name']}",
    71 => "Una de les grans virtuts de {$_CONF['site_name']} es que pots personalitzar el contingut que reps i l\'aparen�a del lloc. Per poder fer-ho, primer has d\'<a href=\"{$_CONF['site_url']}/users.php?mode=new\">inscriure\'t</a> a {$_CONF['site_name']}. Si ja ets membre, utilitza el formulari de l\'esquerra per conectar-te.",
    72 => 'Tema',
    73 => 'Idioma',
    74 => '�Cambia l\'aparien�a d\'aquesta p�gina!',
    75 => 'Seccions enviades per correu electr�nic a',
    76 => 'Si selecciones una o m�s Seccions de la llista de sota, totes les noticies noves d\'aquestes Seccions et seran enviades per correu electr�nic al finalitzar el dia.',
    77 => 'Foto',
    78 => '�Afegeix una foto teva!',
    79 => 'Activa aix� per borrar aquesta imatge',
    80 => 'Identificaci�',
    81 => 'Envia per correu electr�nic',
    82 => '�ltimes 10 noticies per l\'usuari/a',
    83 => 'Estad�stiques de noticies per l\'usuari/a',
    84 => 'Nombre total d\'articles:',
    85 => 'Nombre total de comentaris:',
    86 => 'Buscar tots els comentaris de',
    87 => 'El teu nom d\'acc�s',
    88 => "Alg� (possiblement tu mateix/a) ha solicitat una contrassenya nova per la teva conta  \"%s\" a {$_CONF['site_name']}, <{$_CONF['site_url']}>.\n\nSi de veritat vols que es porti a terme aquesta acci�, siusplau apreta a l\'enlla� seg�ent:\n\n",
    89 => "si no vols que es porti a terme aquesta acci�, simplement ignora aquest missatge i la petici� ser� desatinguda (la teva contrassenya no es modificar�).\n\n",
    90 => 'Pots ingressar a sota una contrassenya nova per la teva conta. Siusplau, tingues en compte que la contrassenya antiga seguira sent v�lida fins que enviis aquest formulari.',
    91 => 'Crea una contrassenya nova',
    92 => 'Ingressa una contrassenya nova',
    93 => 'La teva ultima petici� d\'una nova contrassenya va ser fa %d segons. Aquest lloc requereix com a m�nim %d segons entre peticions de contrassenyes.',
    94 => 'Borra la conta "%s"',
    95 => 'Apreta a sota el bot� "borrar la conta" per retirar la teva conta de la nostra base de dades. Siusplau, tingues en compte que qualsevol noticia o comentari que hagis publicat amb aquesta conta <strong>no</strong> es borrara, sino que apareixera com "An�nim".',
    96 => 'Borra la conta',
    97 => 'Confirma el borrat de la Conta',
    98 => 'Est�s segur/a de que vols borrar la teva conta? Al fer-ho, no podras accedir a aquest lloc una altre vegada (a no ser que creis una conta nova). Si est�s segur/a, apreta "borrar conta" de nou en el formulari de sota.',
    99 => 'Opcions de privacitat per',
    100 => 'Correu de l\'Administrador/a',
    101 => 'Permet el correu dels Administradors/es del lloc',
    102 => 'Correu dels usuaris',
    103 => 'Permet el correu d\'altres usuaris',
    104 => 'Mostra l\'estat de qui est� conectat/da',
    105 => 'Mostra al bloc Who\'s Online (usuaris conectats)',
    106 => 'Ubicaci�',
    107 => 'Mostrat en el teu perfil public',
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
    1 => 'No hi ha novetats a mostrar',
    2 => 'No hi ha noves noticies a mostrar. Pot ser que no hi hagi novetats en aquest Secci� o que les teves prefer�ncies siguin molt restrictives.',
    3 => 'per la Secci� %s',
    4 => 'Not�cia del Dia',
    5 => 'Seg�ent',
    6 => 'Anterior',
    7 => 'Primer',
    8 => '�ltim'
);

###############################################################################
# profiles.php

$LANG08 = array(
    1 => 'Hi ha hagut un error a l\'enviar el teu missatge. Prova-ho de nou siusplau.',
    2 => 'El missatge s\'ha enviat satisfactoriament.',
    3 => 'Siusplau assegura\'t d\'ingressar una direcci� de correu electr�nic v�lida al camp \'Respondre a\'.',
    4 => 'Siusplau completa els camps Remitent, Respondre a, T�tol i Missatge',
    5 => 'Error: No existeix l\'usuari/a.',
    6 => 'Hi ha hagut un error.',
    7 => 'Perfil d\'usuari/a de',
    8 => 'Nom de l\'usuari/a',
    9 => 'URL de l\'usuari/a',
    10 => 'Envia un missatge a',
    11 => 'Remitent:',
    12 => 'Respondre a:',
    13 => 'T�tol:',
    14 => 'Missatge:',
    15 => 'No es traduir� el codi HTML.',
    16 => 'Envia el missatge',
    17 => 'Enviar a un amic o amiga',
    18 => 'Destinatari/a',
    19 => 'Direcci� de correu electr�nic de dest�',
    20 => 'Remitent',
    21 => 'Respondre a',
    22 => 'Es necessari omplir tots els camps',
    23 => "Aquest correu electr�nic te l\'ha enviat %s en %s perque va pensar que podria interessar-te aquesta not�cia a  {$_CONF['site_url']}. Aix� no �s SPAM (correu escombraria) i les direccions de correu electr�nic involucrades en aquest enviament no s\'han guardat pel seu �s posterior.",
    24 => 'Comentari sobre aquesta not�cia a',
    25 => 'Has de conectar-te per utilitzar aquesta eina. Aquest control es realitza per prevenir del mal �s del sistema.',
    26 => 'Aquest formulari et permetr� enviar un correu electr�nic a l\'usuari seleccionat. Tots els camps s�n necessaris.',
    27 => 'Missatge curt',
    28 => '%s va escriure: ',
    29 => "Aquest �s el resum diari de {$_CONF['site_name']} per ",
    30 => ' Noticies diaries per ',
    31 => 'T�tol',
    32 => 'Data',
    33 => 'Llegeix la Not�cia completa a',
    34 => 'Fi del missatge',
    35 => 'Ho sento, aquest usuari prefereix no rebre missatges.'
);

###############################################################################
# search.php

$LANG09 = array(
    1 => 'Cerca Avan�ada',
    2 => 'Paraules Clau',
    3 => 'Secci�',
    4 => 'Tot',
    5 => 'Tipo',
    6 => 'noticies',
    7 => 'Comentaris',
    8 => 'Autors',
    9 => 'Tot',
    10 => 'Cerca',
    11 => 'Resultats de la cerca',
    12 => 'resultats',
    13 => 'Cerca de noticies: No hi ha hagut coincidencies',
    14 => 'No s\'han trobat coincidencies al buscar: ',
    15 => 'Siusplau torna-ho a provar.',
    16 => 'T�tol',
    17 => 'Data',
    18 => 'Autor',
    19 => "Cerca en tota la base de dades de <B>{$_CONF['site_name']}</B>",
    20 => 'Data',
    21 => 'a',
    22 => '(Format de data DD-MM-YYYY)',
    23 => 'Lectures',
    24 => 'Trobats %d elements',
    25 => 'coincidencies amb',
    26 => 'elements en ',
    27 => 'segons',
    28 => 'No s\'han trobat coincidencies en Noticies i Comentaris',
    29 => 'Resultats de les Noticies i Comentaris',
    30 => 'Cap enlla�e coincideix amb la teva cerca',
    31 => 'Aquest plug-in no ha donat resultats',
    32 => 'Esdeveniment',
    33 => 'URL',
    34 => 'Ubicaci�',
    35 => 'Tot el dia',
    36 => 'Cap esdeveniment ha coincidit amb la teva cerca',
    37 => 'Resultats d\'Esdeveniments',
    38 => 'Resultats d\'Enlla�os',
    39 => 'Enlla�os',
    40 => 'Esdeveniments',
    41 => 'La paraula a cercar ha de tenir com a m�nim 3 lletres.',
    42 => 'Siusplau utilitza una data en el seg�ent format: YYYY-MM-DD (any-mes-dia).',
    43 => 'frase exacta',
    44 => 'totes aquestes paraules',
    45 => 'qualsevol d\'aquestes paraules',
    46 => 'Seg�ent',
    47 => 'Anterior',
    48 => 'Autor/a',
    49 => 'Data',
    50 => 'Lectures',
    51 => 'Enlla�',
    52 => 'Ubicaci�',
    53 => 'Resultats de la not�cia',
    54 => 'Resultats de Comentari',
    55 => 'la frase',
    56 => 'I',
    57 => 'O',
    58 => 'More results &gt;&gt;',
    59 => 'Results',
    60 => 'per page',
    61 => 'Refine search'
);

###############################################################################
# stats.php

$LANG10 = array(
    1 => 'Estad�stiques del lloc',
    2 => 'Total d\'accessos al sistema',
    3 => 'Noticies(Comentaris) en el sistema',
    4 => 'Enquestes(Respostes) en el sistema',
    5 => 'Enlla�os(Visitats) en el sistema',
    6 => 'Esdeveniments en el sistema',
    7 => 'Les 10 Noticies m�s llegides',
    8 => 'T�tol de la Noticia',
    9 => 'Accessos',
    10 => 'Sembla que no hi ha not�cies en aquest lloc o que ning� les ha vist encara.',
    11 => 'Les 10 noticies m�s comentades',
    12 => 'Comentaris',
    13 => 'Sembla que no hi ha noticies en aquest lloc o que ning� ha escrit un comentari sobre elles.',
    14 => 'Les 10 Enquestes amb m�s vots',
    15 => 'Pregunta',
    16 => 'Vots',
    17 => 'Sembla que no hi ha enquestes en aquest lloc o que ning� ha votat encara.',
    18 => 'Els 10 Enlla�os m�s visitats',
    19 => 'Enlla�os',
    20 => 'Visites',
    21 => 'Sembla que en aquest lloc no hi ha enlla�os o que ning� els ha visitat.',
    22 => 'Les 10 Noticies m�s enviades per correu electr�nic',
    23 => 'missatges per correu electr�nic',
    24 => 'Sembla que ning� ha enviat una not�cia per correu electr�nic en aquest lloc.',
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
    1 => 'Relacionat amb aix�...',
    2 => 'Env�a-ho a un amic',
    3 => 'Versi� per imprimir',
    4 => 'Opcions de la Not�cia',
    5 => 'Format de not�cia en PDF'
);

###############################################################################
# submit.php

$LANG12 = array(
    1 => 'Per enviar %s has d\'estar conectat com usuari/a.',
    2 => 'Ingressa',
    3 => 'Nou Usuari/a',
    4 => 'Afegeix un Esdeveniment',
    5 => 'Afegeix un Enlla�',
    6 => 'Afegeix una not�cia',
    7 => 'Has de conectar-te',
    8 => 'Enviament de col�laboracions',
    9 => 'Quan env�es informaci� a aquest lloc et demanem que tinguis en compte els seg�ents consells: <ul><li>Completa tots els camps requerits<li>Comprova b� les URL\'s<li>Facilita informaci� completa i precisa</ul>',
    10 => 'T�tol',
    11 => 'Enlla�',
    12 => 'Data d\'inici',
    13 => 'Data de finalitzaci�',
    14 => 'Lloc',
    15 => 'Descripci�',
    16 => 'Si es un altre, especifica',
    17 => 'Categor�a',
    18 => 'Un altre',
    19 => 'Llegeix abans',
    20 => 'Error: Falta la Categor�a',
    21 => 'Siusplau, quan seleccionis \'Un altre\' completa el nom de la categor�a',
    22 => 'Error: Falten Camps',
    23 => 'Siusplau completa tots els camps del formulari. Es necessari omplir tots els camps.',
    24 => 'Colaboraci� guardada',
    25 => 'Les teves col�laboracions s\'han guardat satisfactoriament.',
    26 => 'L�mit de Velocitat',
    27 => 'Nom de l\'usuari/a',
    28 => 'Secci�',
    29 => 'Not�cia',
    30 => 'La teva darrera col�laboraci� va ser fa ',
    31 => " segons.  Aquest lloc requereix com a m�nim {$_CONF['speedlimit']} segons entre enviaments",
    32 => 'Lectura Previa',
    33 => 'Lectura previa de la noticia',
    34 => 'Sortida',
    35 => 'No es permeten etiquetes d\'HTML',
    36 => 'Format del text',
    37 => "Els esdeveniments enviats a {$_CONF['site_name']} s\'afegeixen al Calendari P�blic, on la resta d\'usuaris poden afegir-lo al seu Calendari Personal. Aquesta funci� <b>NO</b> est� pensada per guardar els teus esdeveniments personals com ara aniversaris, cites, etc.<br><br>Una vegada enviat, l\'esdeveniment ser� evaluat pels Administradors. De ser aprobat, es mostrar� al Calendari P�blic",
    38 => 'Afegeix un esdeveniment a',
    39 => 'Calendari P�blic',
    40 => 'Calendari Personal',
    41 => 'Hora de finalitzaci�',
    42 => 'Hora d\'inici',
    43 => 'Esdeveniment que dura tot el dia',
    44 => 'Direcci�, linia 1',
    45 => 'Direcci�, linia 2',
    46 => 'Ciutat/Localitat',
    47 => 'Prov�ncia/Estat',
    48 => 'C�dig Postal',
    49 => 'Tipo d\'Esdeveniment',
    50 => 'Edita els tipus d\'esdeveniments',
    51 => 'Lloc',
    52 => 'Borrar',
    53 => 'Crea una conta'
);

###############################################################################
# ADMIN PHRASES - These are file phrases used in admin scripts
###############################################################################

###############################################################################
# admin/auth.inc.php

$LANG20 = array(
    1 => 'Es demana verificaci�',
    2 => 'Acc�s denegat! La informaci� d\'ingr�s �s incorrecta',
    3 => 'La contrassenya ingressada es inv�lida',
    4 => 'Usuari/a:',
    5 => 'Contrassenya:',
    6 => 'Tot acc�s a les parts administratives queda registrat i revisat.<br>Aquesta p�gina �s per l\'�s exclusiu del personal autoritzat.',
    7 => 'Identificaci�'
);

###############################################################################
# admin/block.php

$LANG21 = array(
    1 => 'No tens drets d\'Administrador/a',
    2 => 'No tens els drets suficients per editar aquest bloc.',
    3 => 'Editor de Blocs',
    4 => 'Hi ha hagut un problema amb la lectura d\'aquesta transmissi� (veure error.log per m�s detalls).',
    5 => 'T�tol del Bloc',
    6 => 'Secci�',
    7 => 'Tot',
    8 => 'Nivell de seguretat del bloc',
    9 => 'Ordre del Bloc',
    10 => 'Tipus de bloc',
    11 => 'Bloc del Sistema',
    12 => 'Bloc Normal',
    13 => 'Opcions per el Bloc del Sistema',
    14 => 'RDF(Resource Description Framework)URL',
    15 => '�ltima actualitzaci� del RDF',
    16 => 'Opcions per el Bloc Normal',
    17 => 'Contingut del Bloc',
    18 => 'Siusplau completa els camps T�tol, Nivell de Seguretat i Contingut del bloc',
    19 => 'Administrador',
    20 => 'T�tol',
    21 => 'Nivell de Seguretat',
    22 => 'Tipus',
    23 => 'Nombre d\'Ordre',
    24 => 'Secci�',
    25 => 'Per modificar o borrar un bloc, selecci�na\'l m�s avall. Per crear-ne un de nou, selecciona \'Nou Bloc\' a dalt.',
    26 => 'Bloc de maquetaci�',
    27 => 'Bloc de PHP',
    28 => 'Opcions del Bloc PHP',
    29 => 'Funcions del Bloc',
    30 => 'Si vols que el teu bloc utilitzi codi PHP, ingressa aqui el nom de la funci�. La funci� ha de tenir el prefixe "phpblock_" (ex. phpblock_getweather). De no ser aix� NO sera invocada. Assegura\'t de no incluir els par�ntesis, "()", al final del nom. Per �ltim, es recomana que guardis tot c�di PHP a /path/to/geeklog/system/lib-custom.php. Aix� et permetr� que el teu codi es mantingui als canvis de versio del sistema.',
    31 => 'Error en un Bloc PHP.  La funci�, %s, no existeix.',
    32 => 'Error, Falten Camps',
    33 => 'Has d\'ingressar la URL de l\'archivo .rdf pels Blocs del Sistema',
    34 => 'Has d\'ingressar el T�tol i la Funci� als Blocs PHP',
    35 => 'Has d\'ingressar el T�tulo i el Contingut pels Blocs Normals',
    36 => 'Has d\'ingressar el contingut pels Blocs de Maquetaci�',
    37 => 'El nom de la funci� en el Bloc PHP es inv�lid',
    38 => 'Les funcions pels Blocs PHP han de tenir el prefixe \'phpblock_\' (ex. phpblock_getweather). Es demana el prefixe per q�estions de seguretat, per evitar que s\'executi codi no desitjat.',
    39 => 'Ubicaci�',
    40 => 'Esquerra',
    41 => 'Dreta',
    42 => 'Has d\'ingressar el nombre d\'ordre i el nivell de seguretat pels blocs per defecte',
    43 => 'Nom�s a la P�gina d\'Inici',
    44 => 'Acc�s Denegat',
    45 => "Est�s intentant accedir a un bloc al que no tens drets d\'acc�s. Aquest intent s\'ha registrat. Siusplau <a href=\"{$_CONF['site_admin_url']}/block.php\">torna a la pantalla d\'administraci� de blocs</a>.",
    46 => 'Nou Bloc',
    47 => 'P�gina d\'Inici - Administrador',
    48 => 'Nom del Bloc',
    49 => ' (sense espais i ha de ser �nic)',
    50 => 'URL de l\'archiu d\'ajuda',
    51 => 'inclou http://',
    52 => 'Si deixes aquest camp en blanc no es mostrar� l\'icona d\'ajuda',
    53 => 'Habilitat',
    54 => 'guardar',
    55 => 'cancelar',
    56 => 'borrar',
    57 => 'Mou el bloc aball',
    58 => 'Mou el bloc amunt',
    59 => 'Mou el bloc a la dreta',
    60 => 'Mou el bloc a l\'esquerra',
    61 => 'No Title',
    62 => 'Article Limit',
    63 => 'Bad Block Title',
    64 => 'Your Title must not be empty and cannot contain HTML!',
    65 => 'Order'
);

###############################################################################
# admin/event.php

$LANG22 = array(
    1 => 'Editor d\'Esdeveniments',
    2 => 'Error',
    3 => 'T�tol',
    4 => 'URL',
    5 => 'Data d\'Inici',
    6 => 'Data de Finalitzaci�',
    7 => 'Lloc',
    8 => 'Descripci�',
    9 => '(inclou http://)',
    10 => 'Has de completar tots els camps d\'aquest formulari.',
    11 => 'Administrador de l\'Esdeveniment',
    12 => 'Per modificar o borrar un esdeveniment, clica sobre ell a sota. Per crear un Nou Esdeveniment clica sobre Nou Esdeveniment a dalt. Clica sobre [C] per crear una c�pia d\'un esdeveniment ja existent.',
    13 => 'T�tol',
    14 => 'Data d\'Inici',
    15 => 'Data de Finalitzaci�',
    16 => 'Acc�s Denegat',
    17 => "No tens perm�s per accedir a aquest Esdeveniment. Tot intent d\'acc�s ser� registrat. Siusplau, torna a <a href=\"{$_CONF['site_admin_url']}/event.php\">la p�gina d\'Administraci� d\'Esdeveniments</a>.",
    18 => 'Nou Esdeveniment',
    19 => 'P�gina d\'Inici - Administrador',
    20 => 'guardar',
    21 => 'cancelar',
    22 => 'borrar',
    23 => 'Data d\'inici incorrecta.',
    24 => 'Data de finalitzaci� incorrecta.',
    25 => 'La data de finalitzaci� es anterior a la d\'inici.'
);

###############################################################################
# admin/story.php

$LANG24 = array(
    1 => 'Noticies Anteriors',
    2 => 'Noticies Seg�ents',
    3 => 'Modo',
    4 => 'Modo d\'enviament',
    5 => 'Editor de Noticies',
    6 => 'No hi ha Noticies en el sistema',
    7 => 'Autor',
    8 => 'guardar',
    9 => 'Lectura previa',
    10 => 'cancelar',
    11 => 'borrar',
    12 => 'ID',
    13 => 'T�tol',
    14 => 'Secci�',
    15 => 'Data',
    16 => 'Introducci�',
    17 => 'Text',
    18 => 'Accessos',
    19 => 'Comentaris',
    20 => 'Ping',
    21 => 'Send Ping',
    22 => 'Llista de Noticies',
    23 => 'Per modificar o borrar una Not�cia selecciona el numero de Not�cia mes avall. Per veure la Not�cia selecciona el t�tol de la mateixa. Per crear una nova Not�cia selecciona \'Enviar Not�cia\' m�s amunt.',
    24 => 'L\'ID que has escollit per aquest tema ja est� sent utilitzada. Siusplau, utilitza un altre ID.',
    25 => 'Error when saving story',
    26 => 'Lectura Previa',
    27 => 'If you use [unscaledX] instead of [imageX], the image will be inserted at its original dimensions.',
    28 => '<p><b>PREVIEWING</b>: Previewing a story with images attached is best done by saving the article as a draft INSTEAD OF hitting the preview button.  Use the preview button only when images are not attached.',
    29 => 'Trackbacks',
    30 => 'Errors al Pujar Arxius',
    31 => 'Siusplau omple els camps d\'Autor, T�tol i Text',
    32 => 'Destacada',
    33 => 'Nom�s hi pot haver una Not�cia destacada',
    34 => 'Borrador',
    35 => 'Si',
    36 => 'No',
    37 => 'M�s de',
    38 => 'M�s en',
    39 => 'correus electr�nics',
    40 => 'Acc�s Denegat',
    41 => "Est�s intentant accedir a una Not�cia a la que no tens drets d\'acc�s, per tant, podr�s veure la Not�cia per� no editar-la. Siusplau torna a la <a href=\"{$_CONF['site_admin_url']}/story.php\">p�gina d\'administraci�</a> quan hagis acabat.",
    42 => "Est�s intentant accedir a una Not�cia a la que no tens drets d\'acc�s. Siusplau torna a la <a href=\"{$_CONF['site_admin_url']}/story.php\">p�gina d\'administraci�</a>.",
    43 => 'Nova Not�cia',
    44 => 'P�gina d\'Inici - Administrador',
    45 => 'Acc�s',
    46 => '<b>NOTA:</b> si modifiques aquesta data per una de futura, la Not�cia no es publicar� dins aquella data. Aix� tamb� inclou l\'enviament de titulars RDF(Resource Description Framework), la cerca i les estadistiques del lloc.',
    47 => 'Imatges',
    48 => 'imatge',
    49 => 'dre',
    50 => 'esq',
    51 => 'Per insertar una imatge a la Not�cia has d\'incloure un text amb el format [imageX], [imageX_left] o [imageX_right], on X es el nombre de la imatge dints de la llista. NOTA: nom�s pots utilitzar les imatges de la llista, si no la Not�cia no es podr� guardar',
    52 => 'Borrar',
    53 => 'no s\'ha utilitzat.  Has d\'incloure aquesta imatge a la Introducci� o el Text per poder guardar els canvis',
    54 => 'Imatges no utilitzades',
    55 => 'Hi ha hagut els seg�ents errors a l\'intentar guardar la teva Not�cia. Siusplau, corregeix els errors abans de guardar.',
    56 => 'Mostrar icona de Tema',
    57 => 'Veure imatge sense proporci�',
    58 => 'Gesti� de les noticies',
    59 => 'Opci�',
    60 => 'Habilitat',
    61 => 'Auto arxiu',
    62 => 'Auto borrat',
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
    1 => 'Editor de Seccions',
    2 => 'Identificaci� (ID)',
    3 => 'Nom',
    4 => 'Imatge',
    5 => '(no utilitzis espais)',
    6 => 'Al borrar una Secci� es borraran totes les teves Noticies i Blocs associats',
    7 => 'Siusplau completa els camps ID i Nom',
    8 => 'Administrador de Seccions',
    9 => 'Per modificar o borrar un tema, apreta sobre el tema. Per crear un tema nou, apreta el bot� de Nou Tema a l\'esquerra. Trobar�sel teu nivell d\'acc�s pel tema entre par�ntesis. L\'asterisc(*) denota el tema  per defecte.',
    10 => 'Nombre d\'Ordre',
    11 => 'Not�cies/P�gina',
    12 => 'Acc�s Denegat',
    13 => "Est�s intentant accedir a una Secci� a la que no tens drets d\'acc�s. Siusplau torna a la <a href=\"{$_CONF['site_admin_url']}/topic.php\">p�gina d\'administraci�.",
    14 => 'M�tode d\'Ordenament',
    15 => 'alfab�tic',
    16 => 'per defecte �s',
    17 => 'Nova Secci�',
    18 => 'P�gina d\'Inici - Administrador',
    19 => 'guardar',
    20 => 'cancelar',
    21 => 'borrar',
    22 => 'Per defecte',
    23 => 'converteix-lo en el tema per defecte per a noves col�laboracions',
    24 => '(*)',
    25 => 'Arxiva el tema',
    26 => 'converteix-lo en el tema per defecte per a not�cies arxivades. Nom�s es permet un tema.',
    27 => 'Or Upload Topic Icon',
    28 => 'Maximum',
    29 => 'File Upload Errors'
);

###############################################################################
# admin/user.php

$LANG28 = array(
    1 => 'Editor d\'Usuaris',
    2 => 'ID',
    3 => 'Nom d\'Usuari/a',
    4 => 'Nom Complet',
    5 => 'Contrassenya',
    6 => 'Nivell de Seguretat',
    7 => 'Direcci� de correu electr�nic',
    8 => 'P�gina d\'Inici',
    9 => '(no utilitzis espais)',
    10 => ' Siusplau, omple els camps de Nom d\'Usuari/a i direcci� de correu electr�nic',
    11 => 'Administrador d\'Usuaris',
    12 => 'Per modificar o borrar a un/a usuari/a, apreta sobre l\'usuari/a a sota.  Per crear un/a usuari/a nou apreta el bot� de Nou Usuari a l\'esquerra. Pots fer cerques senzilles al teclejar parts del nom d\'usuari, direcci� de correu electr�nic o nom complet (per exemple *son* o *.edu) al formulari de sota..',
    13 => 'Nivell de seguretat',
    14 => 'Data d\'Inscripci�',
    15 => 'Nou Usuari',
    16 => 'P�gina d\'Inici - Administrador',
    17 => 'Canvia la contrassenya',
    18 => 'Cancelar',
    19 => 'Borrar',
    20 => 'Guardar',
    21 => 'El Nom d\'Usuari/a proposat ja existeix.',
    22 => 'Error',
    23 => 'Importaci� Massiva',
    24 => 'Importaci� massiva d\'Usuaris',
    25 => "Pots importar una llista d\'Usuaris/es a {$_CONF['site_name']}. L\'arxiu amb la llista d\'usuaris/es ha de tenir un registre per linea i els camps separats per TAB (tabulador). Els camps han d\'estar en el seg�ent ordre: Nom Complet, Nom d\'Usuari, Direcci� de Correu electr�nic. A cada usuari afegit se li enviar� per correu electr�nic una contrassenya generada a l\'atzar, que podr�n canviar a l\'ingressar al lloc. Siusplau, comprova b� l\'arxiu d\'importaci� ja que els errors trovats poden arrivar a necessitar arranjaments manuals.",
    26 => 'Cerca',
    27 => 'Limita els resultats',
    28 => 'Marca la casella per borrar aquesta imatge',
    29 => 'Ruta',
    30 => 'Importaci�',
    31 => 'Nous Usuaris',
    32 => 'Proc�s finalitzat. S\'han importat %d i hi ha hagut %d errors',
    33 => 'enviar',
    34 => 'Error: Has d\'especificar l\'arxiu que vols pujar.',
    35 => '�ltim acc�s',
    36 => '(mai)',
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
    1 => 'Aprovar',
    2 => 'Borrar',
    3 => 'Editar',
    4 => 'Perfil',
    10 => 'T�tol',
    11 => 'Data d\'Inici',
    12 => 'URL',
    13 => 'Categoria',
    14 => 'Data',
    15 => 'Tema',
    16 => 'Nom de l\'usuari/a',
    17 => 'Nom complet',
    18 => 'correu electr�nic',
    34 => 'P�gina d\'administraci�',
    35 => 'Enviaments de Noticies',
    36 => 'Enviaments d\'Enlla�os',
    37 => 'Enviaments d\'Esdeveniments',
    38 => 'Enviar',
    39 => 'No hi ha enviaments a moderar en aquest moment',
    40 => 'Enviaments de l\'usuari/a'
);

###############################################################################
# calendar.php

$LANG30 = array(
    1 => 'Diumenge',
    2 => 'Dilluns',
    3 => 'Dimarts',
    4 => 'Dimecres',
    5 => 'Dijous',
    6 => 'Divendres',
    7 => 'Dissabte',
    8 => 'Afegeix un esdeveniment',
    9 => 'Esdeveniment de %s',
    10 => 'Esdeveniments per',
    11 => 'Calendari Mestre',
    12 => 'El meu Calendari',
    13 => 'Gener',
    14 => 'Febrer',
    15 => 'Mar�',
    16 => 'Abril',
    17 => 'Maig',
    18 => 'Juny',
    19 => 'Juliol',
    20 => 'Agost',
    21 => 'Setembre',
    22 => 'Octubre',
    23 => 'Novembre',
    24 => 'Desembre',
    25 => 'Tornar a ',
    26 => 'Tot el dia',
    27 => 'Setmana',
    28 => 'Calendari Personal per',
    29 => 'Calendari P�blic',
    30 => 'borra l\'esdeveniment',
    31 => 'Afegeix',
    32 => 'Esdeveniment',
    33 => 'Data',
    34 => 'Hora',
    35 => 'Afegit r�pid',
    36 => 'Env�a',
    37 => 'Disculpa, l\'opci� de calendari personal no es troba habilitada en aquest lloc',
    38 => 'Editor Personal d\'Esdeveniments',
    39 => 'Dia',
    40 => 'Setmana',
    41 => 'Mes'
);

###############################################################################
# admin/mail.php

$LANG31 = array(
    1 => "{$_CONF['site_name']}Utilidad de correo electr�nico",
    2 => 'De',
    3 => 'Respondre a',
    4 => 'T�tol',
    5 => 'Missatge',
    6 => 'Enviar a:',
    7 => 'Tots els usuaris',
    8 => 'Administrador',
    9 => 'Opcions',
    10 => 'HTML',
    11 => 'Missatge Urgent!',
    12 => 'Enviament',
    13 => 'Reinici',
    14 => 'Ignorar les preferencies de l\'usuari/a',
    15 => 'Error a l\'enviar a: ',
    16 => 'S\'ha enviat satisfactoriament a: ',
    17 => "<a href={$_CONF['site_admin_url']}/mail.php>Enviar un altre missatge</a>",
    18 => 'Per',
    19 => 'NOTA: si vols enviar un missatge a tots els membres del lloc, selecciona el grup Logged-In Users a la llista.',
    20 => "S\'han enviat <successcount> missatges satisfactoriament i <failcount> han fallat.  Si vols, els detalls de cada enviament figuren a sota. Tamb� pots <a href=\"{$_CONF['site_admin_url']}/mail.php\">enviar un altre missatge</a> o tornar a <a href=\"{$_CONF['site_admin_url']}/moderation.php\">la p�gina d\'administraci�</a>.",
    21 => 'Fallats',
    22 => 'Exitosos',
    23 => 'No hi ha hagut enviaments fallits',
    24 => 'No hi ha hagut enviaments satisfactoris',
    25 => '-- Selecciona el Grup --',
    26 => 'Siusplau, omple tots els camps del formulari i selecciona un grup d\'usuaris de la llista desplegable.'
);

###############################################################################
# admin/plugins.php

$LANG32 = array(
    1 => 'La instal�laci� de Plug-in(s) pot malmetre la teva instal�laci� de Geeklog i, possiblement, el teu sistema. Es important que nom�s instalis Plug-in(s) obtinguts de <a href="http://www.geeklog.net" target="_blank">Geeklog</a> ja que han sigut comprobats en varis entorns. Es tamb� important que entenguis que la instal�laci� del Plug-in necessita la execuci� d\'instruccions del sistema que poden portar problemes de seguretat. Tot i aquesta advertencia, no garantitzem l\'�xit de la instal�laci� del Plug-in ni ens fem responsables per qualsevol dany causat durant la instal�laci� (o posterior a la mateixa). En altres paraules, instal�la el Plug-in sota la teca responsabilitat. Les instruccions particulars d\'instal�laci� venen dints de cada Plug-in.',
    2 => 'Advert�ncia de la instal�laci� del Plug-in',
    3 => 'Formulari d\'instalaci� del Plug-in',
    4 => 'Arxiu del Plug-in',
    5 => 'Llistat de Plug-in(s)',
    6 => 'Advertencia: El Plug-in ja est� instal�lat!',
    7 => 'El Plug-in que intentes instal�lar ja existeix. Siusplau borra el Plug-in abans de reinstalar-lo.',
    8 => 'Ha fallat la comprobaci� de compatibilitat del Plug-in',
    9 => 'Aquest Plug-in requereix una versi� m�s nova de Geeklog. Pots obtenir una c�pia actualitzada de <a href=http://www.geeklog.net>Geeklog</a> o instal�lar una altre versi� del Plug-in.',
    10 => '<br><b>No hi ha Plug-in(s) instal�lats.</b><br><br>',
    11 => 'Per modificar o borrar un Plug-in selecciona el numero a l\'esquerra del mateix. Per accedir a la p�gina dels seus creadors seleccioni en el t�tol del Plug-in. Per instal�lar un nou Plug-in selecciona \'Nou Plug-in\' m�s amunt.',
    12 => 'no s\'ha donat un nom de plugin a la funci� plugineditor()',
    13 => 'Editor de Plugins',
    14 => 'Nou Plug-in',
    15 => 'P�gina d\'Inici - Administrador',
    16 => 'Nom del Plug-in',
    17 => 'Versi�',
    18 => 'Versi� de Geeklog',
    19 => 'Habilitat',
    20 => 'Si',
    21 => 'No',
    22 => 'Instal�laci�',
    23 => 'Guardar',
    24 => 'Cancelar',
    25 => 'Borrar',
    26 => 'Nom',
    27 => 'Portada',
    28 => 'Versi�',
    29 => 'Versi� de Geeklog',
    30 => 'Vols borrar el Plug-in?',
    31 => 'Est�s segur/a de que vols esborrar aquest Plug-in? Al fer-ho borrar�s tots els arxius, estructures i dades associades. Si est�s segur/a selecciona "Borrar" al formulari de sota.',
    32 => '<p><b>Error, l\'etiqueta AutoLink no t� el format correcte</b></p>',
    33 => 'Versi� del codi',
    34 => 'Actualitzaci�',
    35 => 'Edit',
    36 => 'Code',
    37 => 'Data',
    38 => 'Update!'
);

###############################################################################
# admin/syndication.php

$LANG33 = array(
    1 => 'Creaci� de la transmissi�',
    2 => 'guardar',
    3 => 'borrar',
    4 => 'cancelar',
    10 => 'Sindicaci� del contingut',
    11 => 'Transmissi� nova',
    12 => 'Seu de l\'Administrador',
    13 => 'Per modificar o borrar una transmissi�, apreta sobre el t�tol de la transmissi� a sota. Per crear una transmissi� nova, apreta sobre Transmissi� nova a dalt.',
    14 => 'T�tol',
    15 => 'Tecleja',
    16 => 'Nom de l\'arxiu',
    17 => 'Format',
    18 => '�ltima actualitzaci�',
    19 => 'Habilitat',
    20 => 'Si',
    21 => 'No',
    22 => '<i>(no hi ha transmissions)</i>',
    23 => 'tots els Temes',
    24 => 'Editor de transmissions',
    25 => 'T�tol de la transmissi�',
    26 => 'L�mit',
    27 => 'Duraci� de les noticies',
    28 => '(0 = sense text, 1 = text complet, altres = limita a aquest nombre de car�cters.)',
    29 => 'Descripci�',
    30 => 'Actualitzaci� m�s recent',
    31 => 'Conjunt de car�cters',
    32 => 'Idioma',
    33 => 'Continguts',
    34 => 'Entrades',
    35 => 'Hores',
    36 => 'Selecciona el tipus de transmissi�',
    37 => 'Tens com a m�nim un plugin instal�lat que afavoreix la sindicaci� de contingut. A sota haur�s de seleccionar si vols una transmissi� de Geeklog o una transmissi� d\'un dels plugins.',
    38 => 'Error: Falten camps',
    39 => 'Siusplau, omple el T�tol, Descripci� i Nom de l\'arxiu de la transmissi�.',
    40 => 'Siusplau inclueix el nombre d\'entrades o nombre d\'hores.',
    41 => 'Enlla�os',
    42 => 'Esdeveniments',
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
    1 => "La teva contrassenya s\'ha enviat per correu electr�nic i arribar� d\'aqu� un moment. Siusplau segueix les indicacions del missatge. Gracies per utilitzar {$_CONF['site_name']}",
    2 => "Gracies per enviar la teva Not�cia a {$_CONF['site_name']}. La Not�cia es troba en proc�s d\'aprovaci�. De ser aprovada, podr� ser llegida per tots els visitants del lloc.",
    3 => "Gracies per enviar el teu Enlla� a {$_CONF['site_name']}. L\'Enlla� es troba en proc�s d\'aprovaci�. De ser aprovat, podr� ser vist per tots els visitants del lloc.",
    4 => "Gracies per enviar el teu Esdeveniment a {$_CONF['site_name']}. L\'Esdeveniment es troba en proc�s d\'aprovaci�. De ser aprovat, podr� ser vist per tots els visitants del lloc.",
    5 => 'La informaci� de la teva conta s\'ha guardat satisfactoriament.',
    6 => 'Les teves preferencies s\'han guardat satisfactoriament.',
    7 => 'Les teves preferencies per a Comentaris han sigut guardades satisfactoriament.',
    8 => 'T\'has desconectat satisfactoriament.',
    9 => 'La teva Not�cia s\'ha guardat satisfactoriament.',
    10 => 'La Not�cia s\'ha borrat satisfactoriament.',
    11 => 'El teu Bloc s\'ha guardat satisfactoriament.',
    12 => 'El Bloc s\'ha borrat satisfactoriament.',
    13 => 'La teva Secci� s\'ha guardat satisfactoriament.',
    14 => 'La Secci� juntament amb totes les teves Noticies i Blocs s\'han borrat satisfactoriament.',
    15 => 'El teu enlla� s\'ha guardat satisfactoriament.',
    16 => 'L\'enlla� s\'ha borrat satisfactoriament.',
    17 => 'El teu Esdeveniment s\'ha guardat satisfactoriament.',
    18 => 'L\'Esdeveniment s\'ha borrat satisfactoriament.',
    19 => 'La teva Enquesta s\'ha guardat satisfactoriament.',
    20 => 'L\'Enquesta s\'ha borrat satisfactoriament.',
    21 => 'El Nou Usuari s\'ha guardat satisfactoriament.',
    22 => 'L\'Usuari s\'ha borrat satisfactoriament',
    23 => 'Error al guardar l\'Esdeveniment al teu Calendari. No ha sigut processat l\'ID.',
    24 => 'L\'Esdeveniment s\'ha guardat al teu Calendari',
    25 => 'No pots accedir al teu Calendari Personal abans de conectar-te com a usuari',
    26 => 'L\'Esdeveniment s\'ha borrat del teu Calendari Personal',
    27 => 'Missatge enviat satisfactoriament.',
    28 => 'El Plug-in s\'ha guardat satisfactoriament',
    29 => 'Disculpa, els Calendaris Personals no estan habilitats en aquest lloc',
    30 => 'Acc�s Denegat',
    31 => 'Disculpa, no tens acc�s a la p�gina d\'administraci� de Noticies. Aclarem que tot acc�s sense autoritzaci� queda registrat al servidor.',
    32 => 'Disculpa, no tens acc�s a la p�gina d\'administraci� de Seccions. Aclarem que tot acc�s sense autoritzaci� queda registrat al servidor.',
    33 => 'Disculpa, no tens acc�s a la p�gina d\'administraci� de Blocs. Aclarem que tot acc�s sense autoritzaci� queda registrat al servidor.',
    34 => 'Disculpa, no tens acc�s a la p�gina d\'administraci� d\'Enlla�os. Aclarem que tot acc�s sense autoritzaci� queda registrat al servidor.',
    35 => 'Disculpa, no tens acc�s a la p�gina d\'administraci� d\'Esdeveniments. Aclarem que tot acc�s sense autoritzaci� queda registrat al servidor.',
    36 => 'Disculpa, no tens acc�s a la p�gina d\'administraci� d\'Enquestes. Aclarem que tot acc�s sense autoritzaci� queda registrat al servidor.',
    37 => 'Disculpa, no tens acc�s a la p�gina d\'administraci� d\'Usuaris. Aclarem que tot acc�s sense autoritzaci� queda registrat al servidor.',
    38 => 'Disculpa, no tens acc�s a la p�gina d\'administraci� de Plug-in(s). Aclarem que tot acc�s sense autoritzaci� queda registrat al servidor.',
    39 => 'Disculpa, no tens acc�s a la p�gina d\'administraci� de Correu electr�nic. Aclarem que tot acc�s sense autoritzaci� queda registrat al servidor.',
    40 => 'Missatge del Sistema',
    41 => 'Disculpa, no tens acc�s a la p�gina de Substituci� de Paraules. Aclarem que tot acc�s sense autoritzaci� queda registrat al servidor.',
    42 => 'La Paraula s\'ha guardat satisfactoriament.',
    43 => 'La Paraula s\'ha borrat satisfactoriament.',
    44 => 'El Plug-In s\'ha instalat satisfactoriament.',
    45 => 'El Plug-In s\'ha borrat satisfactoriament.',
    46 => 'Disculpa, no tens acc�s a l\'eina de c�pia de seguretat de la base de dades. Aclarem que tot acc�s sense autoritzaci� queda registrat al servidor.',
    47 => 'Aquesta funci� est� disponible sota *nix. Si est�s utilitzant *nix com a sistema operatiu, la teva c�pia de visites (cache) s\'ha netejat satisfactoriament. Si est�s sota Windows, haur�s de cercar els arxius adodb_*.php i borrar-los manualment.',
    48 => "Gracies per registrar-te com a membre a {$_CONF['site_name']}. El nostre equip comprobar� la teva solicitut. Si es aprovada, se t\'enviar� la teva Contrassenya a la direcci� correu electr�nico que ens has proporcionat.",
    49 => 'El teu grup s\'ha guardat satisfactoriament.',
    50 => 'El grup s\'ha borrat satisfactoriament.',
    51 => 'Aquest nom d\'usuari/a ja est� en �s. Siusplau, escolleix-ne un altre.',
    52 => 'La direcci� facilitada no sembla una direcci� v�lida de correu electr�nic.',
    53 => 'La teva nova contrassenya s\'ha acceptat. Siusplau, utilitza la nova contrassenya que apareix a sota per ingressar de nou.',
    54 => 'La teva petici� de nova contrassenya ha caducat. Siusplau, torna a provar-ho a sota.',
    55 => 'El sistema t\'ha enviat un correu electr�nic i t\'arrivar� en breu. Siusplau, segueix les instruccions del missatge per crear una nova contrassenya per la teva conta.',
    56 => 'La direcci� de correu electr�nic facilitada ja est� en �s en una altre conta.',
    57 => 'La teva conta s\'ha borrat satisfactoriament.',
    58 => 'La teva transmissi� s\'ha guardat satisfactoriament.',
    59 => 'La teva transmissi� s\'ha borrat satisfactoriament.',
    60 => 'El plugin s\'ha actualitzat satisfactoriament',
    61 => 'Plugin %s: marcador de missatge desconegut',
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
    'access' => 'Acc�s',
    'ownerroot' => 'Propietari/Arrel',
    'group' => 'Grup',
    'readonly' => 'Nom�s-Lectura',
    'accessrights' => 'Drets d\'acc�s',
    'owner' => 'Propietari',
    'grantgrouplabel' => 'Estableix els drets del Grup',
    'permmsg' => 'NOTA: membres s�n tots els membres conectats i els usuaris an�nims que estiguin al lloc.',
    'securitygroups' => 'Grups de Seguretat',
    'editrootmsg' => "Encara que siguis un/a Administrador/a d\'Usuaris/es, no pots editar un usuari d\'arrel sense abans haber-te donat d\'alta com usuari d\'arrel.  Pots editar a tots els dem�s usuaris excepte els usuaris d\'arrel. Siusplau, pren nota que qualsevol intent d\'editar il�legalment als usuaris d\'arrel quedar� registrat. Siusplau torna a <a href=\"{$_CONF['site_admin_url']}/users.php\">la p�gina d\'Administraci� d\'usuaris</a>.",
    'securitygroupsmsg' => 'Marca les caselles dels grups als que vols que pertanyi l\'usuari.',
    'groupeditor' => 'Editor de Grup',
    'description' => 'Descripci�',
    'name' => 'Nom',
    'rights' => 'Drets',
    'missingfields' => 'Camps que falten',
    'missingfieldsmsg' => 'Has d\'ingressar un nom i una descripci� pel Grup.',
    'groupmanager' => 'Administrador de Grups',
    'newgroupmsg' => 'Per modificar o borrar un grupo selecciona el grup aqu� sota. Per crear un grup selecciona \'Nou Grup\' aqu� dalt. Pensa que els Grups del Sistema no es poden borrar.',
    'groupname' => 'Nom del Grup',
    'coregroup' => 'Grup del Sistema? ',
    'yes' => 'Si',
    'no' => 'No',
    'corerightsdescr' => "Aquest grup es un Grup de Sistema de {$_CONF['site_name']}, i per tant els seus drts no es poden editar. A continuaci� es mostra una llista no editable dels drets d\'acc�s d\'aquest grup.",
    'groupmsg' => 'Els Grups de Segurtat d\'aquest lloc s�n jer�rquics. A l\'afegir aquest grup a qualsevol dels de sota li estar� donant els mateixos drets que tinguin aquests grups. De ser possible, es recomana utilitzar els grups existents per donar els drets a un nou grup. Si thas de modificar els drets del grup, pots seleccionar-los a la secci� anomenada \'Drets\'. Per afegir aquest grup a qualsevol dels de sota simplement marca els grups que vulguis.',
    'coregroupmsg' => "Aquest grup es un Grup de Sistema de {$_CONF['site_name']}, per aix� els grups que pertanyin a aquest grup no podr�n ser editats. A continuaci� es mostra un llistat (no editable) dels grups als quals pertany aquest grup.",
    'rightsdescr' => 'El dret d\'acc�s d\'un grupo a algun dels drets que s\'especifiquen a sota es poden donar directament al grup O a un grup diferent del que forma part aquest grup.  Els que veus a sota sense la casella marcada son els drets que s\'han otorgat a aquest grup perque pertany a un altre amb aquest dret. Els drets amb les caselles a sota son els drets que es poden otorgar directament a aquest grup.',
    'lock' => 'Bloqueig',
    'members' => 'Membres',
    'anonymous' => 'An�nim',
    'permissions' => 'Permisos',
    'permissionskey' => 'R = lectura, E = edici�, els permisos d\'edici� impliquen permisos de lectura',
    'edit' => 'Editar',
    'none' => 'Cap',
    'accessdenied' => 'Acc�s Denegat',
    'storydenialmsg' => "No tens acc�s per veure aquesta Not�cia. Aix� pot ser perqu� no ets membre de {$_CONF['site_name']}. Siusplau <a href=users.php?mode=new>entra entra com a membre</a> de {$_CONF['site_name']} per tenir acc�s.",
    'eventdenialmsg' => "No tens acc�s per veure aquest Esdeveniment. Aix� pot ser perqu� no ets membre de {$_CONF['site_name']}. Siusplau <a href=users.php?mode=new>entra com a membre</a> de {$_CONF['site_name']} per tenir acc�s.",
    'nogroupsforcoregroup' => 'Aquest grup no pertany a cap dels altres grups',
    'grouphasnorights' => 'Aquest grup no t� acc�s a les funcions d\'administraci�',
    'newgroup' => 'Nou Grupo',
    'adminhome' => 'P�gina d\'Administraci�',
    'save' => 'Guardar',
    'cancel' => 'Cancelar',
    'delete' => 'Borrar',
    'canteditroot' => 'Has intentat editar el grup Root (Arrel) per� no pertanys al grup Root, per tant se t\'ha denegat l\'acc�s.  Siusplau, contacta amb l\'administrador/a del sistema si creus que es tracta d\'un error',
    'listusers' => 'Llistat d\'Usuaris',
    'listthem' => 'llistat',
    'usersingroup' => 'Usuaris al grup %s',
    'usergroupadmin' => 'Administraci� del grup d\'usuaris',
    'add' => 'Afegir',
    'remove' => 'Borrar',
    'availmembers' => 'Membres disponibles',
    'groupmembers' => 'Membres del grup',
    'canteditgroup' => 'Per editar aquest grup, has de ser un membre del grup. Siusplau, contacta amb l\'administrador del sistema si creus que aix� es un error.',
    'cantlistgroup' => 'Per veure els membres d\'aquest grup, n\'has de ser membre. Siusplau contacta amb l\'administrador del sistema si creus que aix� es un error.',
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
    'last_ten_backups' => '�ltimes 10 c�pies de seguretat',
    'do_backup' => 'Fer una c�pia de seguretat',
    'backup_successful' => 'La c�pia de seguretat de la base de dades s\'ha realitzat satisfactoriament.',
    'db_explanation' => 'Per crear una c�pia de seguretat del sistema utilitza el bot� de sota',
    'not_found' => "Ruta incorrecta o la utilitat mysqldump no es pot executar.<br>Comprova la definici� de <strong>\$_DB_mysqldump_path</strong> al config.php.<br>La variable est� definida actualment com: <var>{$_DB_mysqldump_path}</var>",
    'zero_size' => 'Error de la c�pia de seguretat: La grand�ria era de 0 bytes',
    'path_not_found' => "{$_CONF['backup_path']} no existeix o no es una ruta",
    'no_access' => "ERROR: No es pot accedir al directori {$_CONF['backup_path']}.",
    'backup_file' => 'Arcxiu de copies de seguretat',
    'size' => 'Grand�ria',
    'bytes' => 'Bytes',
    'total_number' => 'Nombre total de copies de seguretat: %d'
);

###############################################################################

$LANG_BUTTONS = array(
    1 => 'Portada',
    2 => 'Contacte',
    3 => 'Col�laboracions',
    4 => 'Enlla�os',
    5 => 'Enquestes',
    6 => 'Calendari',
    7 => 'Estad�stiques',
    8 => 'Personalitzaci�',
    9 => 'Cerca',
    10 => 'Cerca avan�ada',
    11 => 'Directory'
);

###############################################################################
# 404.php

$LANG_404 = array(
    1 => 'Error 404',
    2 => 'Vaja, he buscat per tot arreu, per� no puc trobar <b>%s</b>.',
    3 => "<p>Ho sentim, per� el fitxer que demanes no existeix. Siusplau, consulta la <a href=\"{$_CONF['site_url']}\">p�gina principal</a> o la <a href=\"{$_CONF['site_url']}/search.php\">p�gina de cerca</a> per verure si pots trobar el que has perdut."
);

###############################################################################
# login form

$LANG_LOGIN = array(
    1 => 'es necessita ingressar',
    2 => 'Ho sento, per accedir a aquesta �rea has d\'estar verificat/da com usuari/a.',
    3 => 'ingressa',
    4 => 'Usuari/a nou/va'
);

###############################################################################
# pdfgenerator.php

$LANG_PDF = array(
    1 => 'La funci� PDF est� inhabilitada',
    2 => 'El document facilitat no s\'ha reproduit. S\'ha rebut el document per� no s\'ha processat. Siusplau, assegura\'t de que nom�s s\'enviin documents en format html amb l\'est�ndar xHTML. Siusplau, pensa que els documents molt complexes en html �s possible que no es reprodueixin correctament o que no apareguin. El document resultant del teu intent t� 0 bytes d\'extensi�, i ha sigut borrat. Si no est�s segur/a de que el teu document es reprodueixi b�, siusplau, torna a enviar-lo.',
    3 => 'Error desconegut durant la generaci� de PDF',
    4 => 'No has donat dades de la p�gina o vols utilitzar l\'eina de generaci� ad-hoc de PDF. Si creus que est�s rebent aquesta p�gina per error, contacta amb l\'administrador del sistema. Sin�, pots utilitzar el formulari que hi ha a sota per generar PDFs.',
    5 => 'Cargant el teu document.',
    6 => 'Siusplau, espera mentres es carrega el teu document.',
    7 => 'Pots apretar el bot� dret del ratol� sobre el bot� de sota i escollir \'save target...\' o \'save link location...\' per guardar una c�pia del teu document.',
    8 => 'La ruta donada per l\'arxiu de configuraci� a l\'HTMLDoc binari no �s v�lida o aquest sistema no el pot executar.  Siusplau contacta amb l\'administrador del sistema si aquest problema continua.',
    9 => 'Creador de PDF',
    10 => 'Aquesta es l\'eina ad-hoc de creaci� de PDF. Intentar� convertir qualsevol URL que li donguis en un PDF.  Siusplau, pensa que algunes p�gines de la xarxa (Web) no es generar�n correctament amb aquesta funci�.  Aix� �s una limitaci� de l\'eina generadora d\'HTMLDoc PDF i aquests errors no haurien de ser enviats a l\'administrador d\'aquest lloc',
    11 => 'URL',
    12 => 'Crea un PDF!',
    13 => 'La configuraci� PHP en aquest servidor no permet que les URL s\'utilitzin amb la instrucci� fopen.  L\'administrador del sistema ha d\'editar l\'arxiu php.ini i que estigui conectat allow_url_fopen',
    14 => 'El PDF que has solicitat o no existeix o has intentat accedir a un arxiu ilegalment.'
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