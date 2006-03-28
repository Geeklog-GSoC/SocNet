<?php

###############################################################################
# portuguese.php
# Esta é a tradução em Português do GeekLog!
#
# Copyright (C) 2003 Mário Seabra
# mseabra@bairrinfor.com
#
# Este programa é software livre; é permitida a sua distribuição e /ou
# modificação dentro dos termos GNU General Public License
# como publicado pela Free Software Foundation; incluindo a versão 2
# da Licença, ou (por opção sua) qualquer versão anterior.
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
    1 => 'Contribuição de:',
    2 => 'mais',
    3 => 'comentário',
    4 => 'Editar',
    5 => 'Votação',
    6 => 'Resultados',
    7 => 'Votações',
    8 => 'votos',
    9 => 'Funções administrativas:',
    10 => 'Submissões',
    11 => 'Notícias',
    12 => 'Blocos',
    13 => 'Tópicos',
    14 => 'Ligações',
    15 => 'Eventos',
    16 => 'Votações',
    17 => 'Utilizadores',
    18 => 'SQL Query',
    19 => 'Sair',
    20 => 'Informação do utilizador:',
    21 => 'Utilizador',
    22 => 'ID do utilizador',
    23 => 'Nível de segurança',
    24 => 'Anónimo',
    25 => 'Responder',
    26 => 'Os seguintes comentários são da responsabilidade de quem os fez. A página não é responsavél pelo contéudo dos mesmos.',
    27 => 'Comentário mais recente',
    28 => 'Apagar',
    29 => 'Sem comentários.',
    30 => 'Notícias anteriores',
    31 => 'Tags HTML permitidas:',
    32 => 'Erro, nome de utilizador inválido',
    33 => 'Erro, não consegue escrever para o ficheiro de log',
    34 => 'Erro',
    35 => 'Sair',
    36 => 'ligado',
    37 => 'Nenhuma notícia',
    38 => 'Content Syndication',
    39 => 'Actualizar',
    40 => 'You have <tt>register_globals = Off</tt> in your <tt>php.ini</tt>. However, Geeklog requires <tt>register_globals</tt> to be <strong>on</strong>. Before you continue, please set it to <strong>on</strong> and restart your web server.',
    41 => 'Utilizadores convidados',
    42 => 'Enviada por:',
    43 => 'Responder',
    44 => 'Parent',
    45 => 'Número de erro MySQL',
    46 => 'Mensagem de erro MySQL',
    47 => 'Utilizador',
    48 => 'Informação da conta',
    49 => 'Mostrar preferências',
    50 => 'Erro de SQL',
    51 => 'ajuda',
    52 => 'Novo',
    53 => 'Administração',
    54 => 'Impossível abrir o ficheiro.',
    55 => 'Erro em',
    56 => 'Votar',
    57 => 'Password',
    58 => 'Entrar',
    59 => "Ainda não tem uma conta?  Inscreva-se como <a href=\"{$_CONF['site_url']}/users.php?mode=new\">Novo Utilizador</a>",
    60 => 'Faça um comentário',
    61 => 'Criar uma conta',
    62 => 'palavras',
    63 => 'Preferências para os comentários',
    64 => 'Enviar artigo por Email',
    65 => 'Ver versão para impressão',
    66 => 'Calendário pessoal',
    67 => 'Bem-vindo a ',
    68 => 'início',
    69 => 'contacto',
    70 => 'procurar',
    71 => 'contribute',
    72 => 'recursos',
    73 => 'últimas votações',
    74 => 'calendário',
    75 => 'pesquisa avançada',
    76 => 'estatísticas',
    77 => 'Plugins',
    78 => 'Próximos Eventos',
    79 => 'Novidades',
    80 => 'notícias nas últimas',
    81 => 'notícia nas últimas',
    82 => 'horas',
    83 => 'COMENTÁRIOS',
    84 => 'LIGAÇÕES',
    85 => 'últimas 48 horas',
    86 => 'Nenhum comentário novo',
    87 => 'últimas 2 semanas',
    88 => 'Nenhuma ligação recente',
    89 => 'Não há eventos brevemente',
    90 => 'Início',
    91 => 'Página criada em',
    92 => 'segundos',
    93 => 'Copyright',
    94 => 'Todos os direitos de copyright desta página pertencem aos respectivos proprietários.',
    95 => 'Suportado por',
    96 => 'Grupos',
    97 => 'Lista de palavras',
    98 => 'Plug-ins',
    99 => 'NOTÍCIAS',
    100 => 'Nenhuma notícia nova',
    101 => 'Eventos pessoais',
    102 => 'Eventos globais',
    103 => 'DB Backups',
    104 => 'por',
    105 => 'Enviar email',
    106 => 'Visitas',
    107 => 'Teste à versão do GL',
    108 => 'Limpar Cache',
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
    1 => 'Calendário de Eventos',
    2 => 'Não há eventos para mostrar.',
    3 => 'Quando',
    4 => 'Onde',
    5 => 'Descrição',
    6 => 'Adicionar um Evento',
    7 => 'Próximos Eventos',
    8 => 'Adicionando este evento ao seu calendário pode ver rapidamente os eventos do seu interesse clicando em "O meu calendário" na área de funções do utilizador.',
    9 => 'Adicionar ao meu calendário',
    10 => 'Remover do meu calendário',
    11 => "A adicionar evento ao calendário de {$_USER['username']}",
    12 => 'Evento',
    13 => 'Início',
    14 => 'Fim',
    15 => 'Voltar ao calendário'
);

###############################################################################
# comment.php

$LANG03 = array(
    1 => 'Fazer comentário',
    2 => 'Modo de envio',
    3 => 'Sair',
    4 => 'Registar utilizador',
    5 => 'Nome de utilizador',
    6 => 'Este site obriga a que tenha efectuado o login para fazer um comentário, Por favor efectue o login.  Se não tiver uma conta criada pode utilizar o formulário seguinte para se registar.',
    7 => 'O seu último comentário foi ',
    8 => " segundos atrás.  Este site a pelo menos {$_CONF['commentspeedlimit']} segundos entre comentários",
    9 => 'Comentário',
    10 => 'Send Report',
    11 => 'Enviar comentário',
    12 => 'Preencha os campos título e comentário. Estes campos são necessários para o envio de um comentário.',
    13 => 'A sua informação',
    14 => 'Previsualizar',
    15 => 'Report this post',
    16 => 'Título',
    17 => 'Erro',
    18 => 'A ter em conta',
    19 => 'Tente manter os seus comentários relacionados com os tópicos.',
    20 => 'Tente responder aos outros comentários em vez de iniciar um assunto novo.',
    21 => 'Leia as mensagens das outras pessoas antes de fazer o seu comentário para evitar comentários em duplicado.',
    22 => 'Utilize um assunto objectivo que descreva a que se refere o seu comentário.',
    23 => 'O seu endereço de email não é tornado público.',
    24 => 'Utilizador anónimo',
    25 => 'Are you sure you want to report this post to the site admin?',
    26 => '%s reported the following abusive comment post:',
    27 => 'Abuse report'
);

###############################################################################
# users.php

$LANG04 = array(
    1 => 'Perfil de utilizador de',
    2 => 'Nome de utilizador',
    3 => 'Nome completo',
    4 => 'Password',
    5 => 'Email',
    6 => 'Página principal',
    7 => 'Bio',
    8 => 'PGP Key',
    9 => 'Guardar informação',
    10 => 'Últimos 10 comentários do utilizador',
    11 => 'Nenhum comentário efectuado',
    12 => 'Preferências do utilizador para',
    13 => 'Email Nightly Digest',
    14 => 'Esta password foi gerada aleatoriamente. Recomendamos que a altere o mais rápido possível. Para alterar a password, efectue o login e clique em Informação da conta no bloco Utilizador.',
    15 => "A sua conta em {$_CONF['site_name']} foi criada com sucesso. Para poder utilizar todas as potêncialidades deve efectuar o login com a informação que lhe foi enviada. Guarde esta email para referência futura.",
    16 => 'Informação da sua conta',
    17 => 'A conta não existe',
    18 => 'O endereço de email introduzido não é válido',
    19 => 'O nome de utilizador ou email introduzido já existe',
    20 => 'O endereço de email introduzido não é válido',
    21 => 'Erro',
    22 => "Registe-se em {$_CONF['site_name']}!",
    23 => "Registar-se dá-lhe todos os benefícios de ser um membro da comunidade {$_CONF['site_name']} e permite-lhe fazer comentários e enviar informação com a identificação da sua autoria. Se não tiver uma conta, apenas poderá enviar informação anónima. Note que o seu endereço de email <b><i>nunca</i></b> será publicado neste site.",
    24 => 'A sua password será enviada para o endereço que indicar.',
    25 => 'Esqueceu-se da sua password?',
    26 => 'Introduza o seu nome de utilizador e clique em Email Password. Será enviada uma nova password para o email com que se registou.',
    27 => 'Registe-se agora!',
    28 => 'Email Password',
    29 => 'saiu a partir de',
    30 => 'entrou a partir de',
    31 => 'A função pretendida obriga a efectuar o login',
    32 => 'Assinatura',
    33 => 'Não é mostrado publicamente',
    34 => 'Este é o seu nome real',
    35 => 'Introduza a password para alterar',
    36 => 'Inicie com http://',
    37 => 'Aplicado aos seus comentários',
    38 => 'Isto é tudo acerca de si! Todos podem ler isto',
    39 => 'A sua chave PGP pública para partilhar',
    40 => 'Sem icones de tópico',
    41 => 'Pretende ser moderador',
    42 => 'Formato da data',
    43 => 'Máximo de notícias',
    44 => 'Sem caixas',
    45 => 'Mostrar preferências para',
    46 => 'Itens excluidos para',
    47 => 'Configuração da caixa de novidades para',
    48 => 'Tópicos',
    49 => 'Sem icones nas notícias',
    50 => 'Desmarque se não está interessado',
    51 => 'Apenas notícias novas',
    52 => 'Por defeito é',
    53 => 'Receber as notícias do dia',
    54 => 'Marque as caixas para os tópicos e autores que não pretende ver.',
    55 => 'Se deixar tudo desmarcado, significa que pretende a selecção feita por defeito. Se seleccionar alguma das caixas, não se esqueça de seleccionar todas as que pretende pois a selecção feita por defeito é anulada. A selecção feita por defeito está a Negrito.',
    56 => 'Autores',
    57 => 'Modo de visualização',
    58 => 'Ordenação',
    59 => 'Limite de comentários',
    60 => 'Como quer que os seus comentários sejam mostrados?',
    61 => 'Novas ou antigas primeiro?',
    62 => 'Por defeito é 100',
    63 => "A sua password foi enviada por email e deve chegar em breve. Siga as indicações presentes no email e obrigado por utilizar o site {$_CONF['site_name']}",
    64 => 'Preferências de comentários de',
    65 => 'Tente efectuar o login novamente',
    66 => "É provavel que se tenha enganado nos seus dados de login.  Tente fazer o login novamente. É um <a href=\"{$_CONF['site_url']}/users.php?mode=new\">novo utilizador</a>?",
    67 => 'Membro desde',
    68 => 'Lembrar durante',
    69 => 'Durante quanto tempo quer ser lembrado depois de efectuar o login?',
    70 => "Personalize a aparência e contéudo do site {$_CONF['site_name']}",
    71 => "Uma das opções do site {$_CONF['site_name']} é que pode personalizar o contéudo que quer ver e a aparência do site.  Para poder usar esta opção deve-se <a href=\"{$_CONF['site_url']}/users.php?mode=new\">registar</a> em {$_CONF['site_name']}.  Já é um membro registado?  Então utilize o formulário de login do lado esquerdo!",
    72 => 'Tema',
    73 => 'Idioma',
    74 => 'Mude a aparência deste site!',
    75 => 'Tópicos enviadoas para',
    76 => 'Se seleccionar um tópico da lista receberá todas as notícias colocadas nesse tópico durante o dia.  Seleccione apenas os tópicos do seu interesse!',
    77 => 'Foto',
    78 => 'Adicione a sua fotografia!',
    79 => 'Marque aqui para apagar esta imagem',
    80 => 'Login',
    81 => 'Enviar Email',
    82 => 'Últimas 10 notícias do utilizador',
    83 => 'Estatística de artigos do utilizador',
    84 => 'Número total de artigos:',
    85 => 'Número total de comentários:',
    86 => 'Encontrar todos os artigos de',
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
    1 => 'Nenhuma notícia para mostrar',
    2 => 'Não há notícias novas para mostrar.  Pode não haver notícias para este tópico ou as suas definições são demasiado restrictivas',
    3 => ' para o tópico %s',
    4 => 'Artigos do dia',
    5 => 'Próxima',
    6 => 'Anterior',
    7 => 'First',
    8 => 'Last'
);

###############################################################################
# profiles.php

$LANG08 = array(
    1 => 'Houve um erro ao enviar a sua mensagem. Tente novamente.',
    2 => 'Mensagem enviada com sucesso.',
    3 => 'Certifique-se que utiliza um endereço de email válido no campo Responder para.',
    4 => 'Preencha os campos Nome, Responder Para, Assunto e Mensagem',
    5 => 'Erro: Nenhum utilizador.',
    6 => 'Existe um erro.',
    7 => 'Perfil de utilizador para',
    8 => 'Nome',
    9 => 'URL do utilizador',
    10 => 'Enviar email para',
    11 => 'Nome:',
    12 => 'Responder para:',
    13 => 'Assunto:',
    14 => 'Mensagem:',
    15 => 'HTML não será traduzido.',
    16 => 'Enviar mensagem',
    17 => 'Enviar Notícia a um amigo',
    18 => 'Para',
    19 => 'Email',
    20 => 'De',
    21 => 'Email',
    22 => 'São necessários todos os campos',
    23 => "Este email foi-lhe enviado por %s em %s porque ele(a) acredita que possa estar interessado(a) neste artigo do site {$_CONF['site_url']}.  Isto não é SPAM e os endereços de email envolvidos nesta operação não ficam registados para uso posterior.",
    24 => 'Comentários a esta notícia em',
    25 => 'Deve efectuar o login para poder utilizar esta opção.  Efectuando o login, ajuda-nos a prevenir a utilização fraudulenta do sistema',
    26 => 'Este formulário permite-lhe enviar um email para o utilizador seleccionado.  É necessário o preenchimento de todos os campos.',
    27 => 'Mensagem curta',
    28 => '%s escreveu: ',
    29 => "Este é o envio diário automático de {$_CONF['site_name']} para ",
    30 => ' Novidades diárias para ',
    31 => 'Titulo',
    32 => 'Data',
    33 => 'Leia o artigo completo em',
    34 => 'Fim da mensagem',
    35 => 'Sorry, this user prefers not to receive any emails.'
);

###############################################################################
# search.php

$LANG09 = array(
    1 => 'Pesquisa avançada',
    2 => 'Palavras a pesquisar',
    3 => 'Tópico',
    4 => 'Tudo',
    5 => 'Tipo',
    6 => 'Notícias',
    7 => 'Comentários',
    8 => 'Autores',
    9 => 'Tudo',
    10 => 'Pesquisar',
    11 => 'Resultados da pesquisa',
    12 => 'resultados',
    13 => 'Nenhuma correspondência com o critério',
    14 => 'Não foram encontrados registos na sua pesquisa de',
    15 => 'Tente de novo.',
    16 => 'Título',
    17 => 'Data',
    18 => 'Autor',
    19 => "Pesquise na base de dados {$_CONF['site_name']} em todas as notícias",
    20 => 'Data',
    21 => 'até',
    22 => '(Formato AAAA-MM-DD)',
    23 => 'Visitas',
    24 => 'Encontrados',
    25 => 'resultados para',
    26 => 'itens em',
    27 => 'segundos',
    28 => 'Nenhuma notícia ou comentário corresponde ao seu critério',
    29 => 'Resultado de Notícias e Comentários',
    30 => 'Nenhuma ligação corresponde a sua pesquisa',
    31 => 'Este plug-in não devolveu resultados',
    32 => 'Evento',
    33 => 'URL',
    34 => 'Localização',
    35 => 'Todo o dia',
    36 => 'Nenhum evento corresponde ao critério',
    37 => 'Resultado de eventos',
    38 => 'Resultado de ligações',
    39 => 'Ligações',
    40 => 'Eventos',
    41 => 'A frase a pesquisar deve ter no mínimo 3 caracteres.',
    42 => 'Utilize uma data com o seguinte formato AAAA-MM-DD (ano-mês-dia).',
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
    1 => 'Estatísticas do site',
    2 => 'Número total de Ligações ao sitema',
    3 => 'Notícias(Comentários) no sistema',
    4 => 'Votações(Respostas) no sistema',
    5 => 'Links(Clicks) no sistema',
    6 => 'Evento no sistema',
    7 => 'Top Ten de notícias visitadas',
    8 => 'Título da notícia',
    9 => 'Visitas',
    10 => 'Parece que não há nenhuma notícia no site ou nenhuma delas foi ainda visitada.',
    11 => 'Top Ten de notícias comentadas',
    12 => 'Comentários',
    13 => 'Parece que não há nenhuma notícia no site ou ainda não foi feito nenhum comentário.',
    14 => 'Top Ten de votações',
    15 => 'Pergunta da votação',
    16 => 'Votos',
    17 => 'Parece que não há nenhuma votação no site ou ainda ninguém votou em nenhuma.',
    18 => 'Top Ten Links',
    19 => 'Links',
    20 => 'Visitas',
    21 => 'Parece que não existem links no site ou ainda nenhum deles foi visitado.',
    22 => 'Top Ten Notícias enviadas',
    23 => 'Emails',
    24 => 'Parece que ainda não foi enviada nenhuma notícia deste site',
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
    1 => 'Artigos relaccionados',
    2 => 'Enviar notícia a um amigo',
    3 => 'Versão para impressão',
    4 => 'Opções da notícia',
    5 => 'PDF Story Format'
);

###############################################################################
# submit.php

$LANG12 = array(
    1 => 'Para enviar um %s deve efectuar o login como utilizador.',
    2 => 'Login',
    3 => 'Novo utilizador',
    4 => 'Enviar um evento',
    5 => 'Enviar um link',
    6 => 'Enviar uma notícia',
    7 => 'É necessário Login',
    8 => 'Enviar',
    9 => 'Ao enviar informações para utilização neste site pedimos-lhe que cumpra as seguintes recomendações...<ul><li>Preencha todos os campos, eles são necessários<li>Forneça informação correta e completa<li>Verifique os URLs</ul>',
    10 => 'Titulo',
    11 => 'Ligação',
    12 => 'Data de início',
    13 => 'Data de fim',
    14 => 'Localização',
    15 => 'Descrição',
    16 => 'Se outra, especifique',
    17 => 'Categoria',
    18 => 'Outra',
    19 => 'Ler primeiro',
    20 => 'Erro: Falta a categoria',
    21 => 'Ao seleccionar "Outra" indique o nome da categoria',
    22 => 'Erro: Faltam campos',
    23 => 'Preencha todos os campos do formulário.  Todos eles são necessários.',
    24 => 'Envio registado',
    25 => 'O seu envio %s foi registado com sucesso.',
    26 => 'Limite de velocidade',
    27 => 'Utilizador',
    28 => 'Tópico',
    29 => 'Notícia',
    30 => 'O seu último envio foi à ',
    31 => " segundos.  Este site obriga a pelo menos {$_CONF['speedlimit']} segundos entre envios",
    32 => 'Previsualizar',
    33 => 'Previsualização da notícia',
    34 => 'Sair',
    35 => 'Tags HTML não são permitidas',
    36 => 'Modo de colocação',
    37 => "Enviar um evento para {$_CONF['site_name']} colocará este este evento no calendário geral onde os utilizadores poderam adicioná-lo ao seu calendário pessoal. Esta opção <b>NÃO</b> foi pensada para armazenar os seus eventos pessoais tipo aniversários e datas comemorativas.<br><br>Quando publica o seu evento este é enviado aos administradores e se aprovado, o seu evento aparecerá no calendário geral.",
    38 => 'Adicionar evento para',
    39 => 'Calendário geral',
    40 => 'Calendário pessoal',
    41 => 'Fim',
    42 => 'Início',
    43 => 'Todo o dia',
    44 => 'Morada',
    45 => 'Address Line 2',
    46 => 'Localidade',
    47 => 'Cidade',
    48 => 'C. Postal',
    49 => 'Tipo',
    50 => 'Editar Tipos de Evento',
    51 => 'Localização',
    52 => 'Apagar',
    53 => 'Criar conta'
);

###############################################################################
# ADMIN PHRASES - These are file phrases used in admin scripts
###############################################################################

###############################################################################
# admin/auth.inc.php

$LANG20 = array(
    1 => 'Autenticação necessária',
    2 => 'Não autorizado! Informação de Login incorrecta',
    3 => 'Password inválida para o utilizador',
    4 => 'Utilizador:',
    5 => 'Password:',
    6 => 'Todos os acessos administrativos deste site são registados e auditados.<br>Está página é apenas para utilização de pessoal autorizado.',
    7 => 'login'
);

###############################################################################
# admin/block.php

$LANG21 = array(
    1 => 'Direitos de administração insuficientes',
    2 => 'Não tem permissões suficientes para editar este bloco.',
    3 => 'Editor de blocos',
    4 => 'There was a problem reading this feed (see error.log for details).',
    5 => 'Título',
    6 => 'Tópico',
    7 => 'Todos',
    8 => 'Nível de segurança',
    9 => 'Ordem',
    10 => 'Tipo',
    11 => 'Bloco de portal',
    12 => 'Bloco normal',
    13 => 'Opções de bloco de portal',
    14 => 'RDF URL',
    15 => 'Última actualização RDF',
    16 => 'Opções para Blocos Normais',
    17 => 'Contéudo dos blocos',
    18 => 'Preencha os campos Título, Nível de segurança e Contéudo',
    19 => 'Manutenção de blocos',
    20 => 'Título',
    21 => 'Nível de segurança',
    22 => 'Tipo',
    23 => 'Ordem',
    24 => 'Tópico',
    25 => 'Para modificar ou apagar um bloco, clique nesse bloco.  Para criar um bloco novo clique em Novo Bloco.',
    26 => 'Aparência do bloco',
    27 => 'Bloco de PHP',
    28 => 'Opções de bloco PHP',
    29 => 'Função',
    30 => 'Se pretende que um dos seus blocos utilize código PHP, introduza o nome da função a utilizar. O nome da função deve ter o prefixo "phpblock_" (ex. phpblock_getweather). Se não tiver este prefixo, a sua função não será executada. Isto serve para que alguém que tenha conseguido acesso não autorizado ao seu site possa colocar código malicioso no seu sistema. Certifique-se que não coloca parentesis vazios "()" depois do nome da sua função.  Finalmente, é recomendado que coloque todo o seu código PHP em /camino/para/geeklog/system/lib-custom.php.  Isto permite-lhe que o seu código permaneça mesmo ao efectuar um upgrade à sua versão do Geeklog.',
    31 => 'Erro no bloco PHP.  A função %s não existe.',
    32 => 'Erro: Faltam campos',
    33 => 'Deve introduzir o URL para o ficheiro .rdf para os blocos de portal',
    34 => 'Deve introduzir o título e a função para os blocos PHP',
    35 => 'Deve introduzir o título e o contéudo para os blocos normais',
    36 => 'Deve introduzir o contéudo para os blocos de layout',
    37 => 'Nome de função PHP incorrecta',
    38 => 'Funções para os blocos PHP devem conter o prefixo \'phpblock_\' (ex. phpblock_getweather).  O prefixo \'phpblock_\' é necessário por razões de segurança.',
    39 => 'Lado',
    40 => 'Esquerdo',
    41 => 'Direito',
    42 => 'Deve introduzir a ordem do bloco e o nível de segurança para os blocos por defeito do Geeklog',
    43 => 'Apenas página principal',
    44 => 'Acesso não permitido',
    45 => "Está a tentar aceder a um bloco para o qual não tem permissões. Este procedimento foi registado. Volte à <a href=\"{$_CONF['site_admin_url']}/block.php\">janela de administração</a>.",
    46 => 'Novo Bloco',
    47 => 'Administração',
    48 => 'Nome',
    49 => ' (sem espaços e deve ser único)',
    50 => 'URL de ficheiro de ajuda',
    51 => 'inclua http://',
    52 => 'Se deixar em branco não aparecerá icon de ajuda para este bloco',
    53 => 'Autorizado',
    54 => 'guardar',
    55 => 'cancelar',
    56 => 'apagar',
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
    1 => 'Editor de eventos',
    2 => 'Error',
    3 => 'Título',
    4 => 'URL',
    5 => 'Data de início',
    6 => 'Data de fim',
    7 => 'Localização',
    8 => 'Descrição',
    9 => '(inclua http://)',
    10 => 'Deve inserir datas, horas, descrição e localização para o evento!',
    11 => 'Manutenção de eventos',
    12 => 'Para modificar ou apagar um evento, clique nesse evento a seguir.  Para criar um novo evento clique em Novo evento.',
    13 => 'Título',
    14 => 'Data de início',
    15 => 'Data de fim',
    16 => 'Acesso não permitido',
    17 => "Está a tentar aceder a um evento para o qual não tem permissões.  Esta acção ficou registada. Por favor <a href=\"{$_CONF['site_admin_url']}/event.php\">volte ao écran de administração de eventos</a>.",
    18 => 'Novo evento',
    19 => 'Administração',
    20 => 'guardar',
    21 => 'cancelar',
    22 => 'apagar',
    23 => 'Bad start date.',
    24 => 'Bad end date.',
    25 => 'End date is before start date.'
);

###############################################################################
# admin/story.php

$LANG24 = array(
    1 => 'Notícia anterior',
    2 => 'Notícia seguinte',
    3 => 'Modo',
    4 => 'Modo de envio',
    5 => 'Editor de notícias',
    6 => 'Não há notícias no sistema',
    7 => 'Autor',
    8 => 'guardar',
    9 => 'previsualizar',
    10 => 'cancelar',
    11 => 'apagar',
    12 => 'ID',
    13 => 'Título',
    14 => 'Tópico',
    15 => 'Data',
    16 => 'Introdução',
    17 => 'Corpo',
    18 => 'Visitas',
    19 => 'Comentários',
    20 => 'Ping',
    21 => 'Send Ping',
    22 => 'Lista de notícias',
    23 => 'Para modificar ou apagar uma notícia, clique no número da notícia a seguir. Para ver uma notícia, clique no título da notícia que pretende ver. Para introduzir uma notícia clique em Inserir notícia a seguir.',
    24 => 'The ID you chose for this story is already in use. Please use another ID.',
    25 => 'Error when saving story',
    26 => 'Previsualização de notícias',
    27 => 'If you use [unscaledX] instead of [imageX], the image will be inserted at its original dimensions.',
    28 => '<p><b>PREVIEWING</b>: Previewing a story with images attached is best done by saving the article as a draft INSTEAD OF hitting the preview button.  Use the preview button only when images are not attached.',
    29 => 'Trackbacks',
    30 => 'File Upload Errors',
    31 => 'Por favor preencha os campos Autor, Título e Introdução',
    32 => 'Featured',
    33 => 'Só pode haver uma notícia featured',
    34 => 'Rascunho',
    35 => 'Sim',
    36 => 'Não',
    37 => 'Mais de',
    38 => 'Mais a partir de',
    39 => 'Emails',
    40 => 'Acesso não autorizado',
    41 => "Está a tentar aceder a uma notícia para a qual não tem permissões.  Esta acção ficou registada.  Pode ver esta notícia com permissões de leitura a seguir. Por favor <a href=\"{$_CONF['site_admin_url']}/story.php\">volte ao écran de administração de notícias</a> quando terminar.",
    42 => "Está a tentar aceder a uma notícia para a qual não tem permissões.  Esta acção ficou registada.  Por favor <a href=\"{$_CONF['site_admin_url']}/story.php\">volte ao écran de administração de notícias</a>.",
    43 => 'Inserir notícia',
    44 => 'Administração',
    45 => 'Acesso',
    46 => '<b>NOTA:</b> se modificar esta data para uma data futura, esta notícia não será publicada antes dessa data.  Isto significa também que a sua notícia não aparecerá nos cabeçalhos e será ignorada pelas pesquisas e páginas de estatísticas.',
    47 => 'Imagens',
    48 => 'imagem',
    49 => 'direita',
    50 => 'esquerda',
    51 => 'Para adicionar uma das imagens que está a anexar a esta notícia precisa de introduzir texto com formato especial.  O formato especial do texto é [imageX], [imageX_right] ou [imageX_left] onde X é o número da imagem que anexou.  NOTA: Deve utilizar as imagens que anexou.  Caso contrário não poderá guardar a sua notícia.<BR><P><B>PREVISUALIZAR</B>: Previsualizar uma notícia que contenha imagens deve ser efectuado guardando a notícia como rascunho EM VEZ DE seleccionar o botão de previsualização.  Utilize o botão de previsualização apenas quando não tiver imagens anexadas.',
    52 => 'Apagar',
    53 => 'não foi utilizada.  Deve incluir esta imagem na introdução ou no corpo da notícia antes de guardar as alterações',
    54 => 'Imagens associadas e não utilizadas',
    55 => 'Ocorreram os seguintes erros ao tentar guardar a sua notícia.  Por favor, corrija estes erros antes de guardar',
    56 => 'Mostrar imagem de tópico',
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
    1 => 'Editor de tópicos',
    2 => 'ID do tópico',
    3 => 'Nome',
    4 => 'Imagem',
    5 => '(não utilize espaços)',
    6 => 'Apagar um tópico remove também todas as notícias e blocos associados a ele.',
    7 => 'Preencha os campos ID de tópico e Nome',
    8 => 'Manutenção de tópicos',
    9 => 'Para modificar ou apagar um tópico, clique nesse tópico.  Para criar um novo tópico clique no botão Novo tópico à esquerda. Encontra o seu nível de acesso para cada tópico dentro de parêntesis',
    10 => 'Ordem',
    11 => 'Notícias/Página',
    12 => 'Acesso interdito',
    13 => "Está a tentar aceder a um tópico para o qual não tem permissão.  Esta tentativa foi registado. Por favor <a href=\"{$_CONF['site_admin_url']}/topic.php\">volte ao écran de administração de tópicos</a>.",
    14 => 'Método de ordenação',
    15 => 'alfabética',
    16 => 'normal é',
    17 => 'Novo Tópico',
    18 => 'Administração',
    19 => 'guardar',
    20 => 'cancelar',
    21 => 'apagar',
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
    1 => 'Detalhes do utilizador',
    2 => 'ID do utilizador',
    3 => 'Nome do utilizador',
    4 => 'Nome completo',
    5 => 'password',
    6 => 'Nível de segurança',
    7 => 'Email',
    8 => 'Página WEB',
    9 => '(não utilize espaços)',
    10 => 'Por favor preencha o Nome do utilizador, Nome completo, Nível de segurança e endereço de Email',
    11 => 'Manutenção de utilizadores',
    12 => 'Para modificar ou apagar um utilizador, clique nesse utilizador abaixo. Para criar um novo utilizador clique no botão Novo utilizador à esquerda. Pode efectuar pesquisas simples introduzindo partes do nome de utilizador, endereço de email ou do nome completo (ex.*Manuel* ou *.pt) no formulário abaixo.',
    13 => 'Nível de segurança',
    14 => 'Data de registo',
    15 => 'Novo utilizador',
    16 => 'Administração',
    17 => 'mudar password',
    18 => 'cancelar',
    19 => 'apagar',
    20 => 'guardar',
    21 => 'O nome de utilizador que tentou guardar já existe.',
    22 => 'Erro',
    23 => 'Adicionar automático',
    24 => 'Importação automática de utilizadores',
    25 => 'Pode importar um ficheiro de utilizadores para o site. O ficheiro de importação deve ser delimitado por tabulações e deve conter os campos na seguinte ordem: nome completo, nome de utilizador, endereço de email. Cada utilizador importado receberá uma password por email. Deve ter um utilizador em cada linha. Uma falha num destes pontos causará problemas que terão de ser resolvidos manualmente para resolver duplicação de registos!',
    26 => 'Procurar',
    27 => 'Limite de Resultados',
    28 => 'Seleccione aqui para apagar esta imagem',
    29 => 'Caminho',
    30 => 'Importar',
    31 => 'Novos Utilizadores',
    32 => 'Processo concluído. Foram importados %d e encontrados %d erros',
    33 => 'enviar',
    34 => 'Erro: Deve especificar um ficheiro para carregar.',
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
    1 => 'Aprovar',
    2 => 'Apagar',
    3 => 'Editar',
    4 => 'Perfil',
    10 => 'Título',
    11 => 'Data de início',
    12 => 'URL',
    13 => 'Categoria',
    14 => 'Data',
    15 => 'Tópico',
    16 => 'Nome de utilizador',
    17 => 'Nome completo',
    18 => 'Email',
    34 => 'Comando e Control',
    35 => 'Noticia para aprovação',
    36 => 'Ligações para aprovação',
    37 => 'Eventos para aprovação',
    38 => 'Submeter',
    39 => 'Não à envios para moderação neste momento',
    40 => 'Envios do utilizador'
);

###############################################################################
# calendar.php

$LANG30 = array(
    1 => 'Domingo',
    2 => 'Segunda',
    3 => 'Terça',
    4 => 'Quarta',
    5 => 'Quinta',
    6 => 'Sexta',
    7 => 'Sábado',
    8 => 'Adicionar Evento',
    9 => 'Evento Geral',
    10 => 'Eventos para',
    11 => 'Calendário Geral',
    12 => 'O Meu Calendário',
    13 => 'Janeiro',
    14 => 'Fevereiro',
    15 => 'Março',
    16 => 'Abril',
    17 => 'Maio',
    18 => 'Junho',
    19 => 'Julho',
    20 => 'Agosto',
    21 => 'Setembro',
    22 => 'Outubro',
    23 => 'Novembro',
    24 => 'Dezembro',
    25 => 'Voltar a ',
    26 => 'Todo o dia',
    27 => 'Semana',
    28 => 'Calendário pessoal de',
    29 => 'Calendário público',
    30 => 'apagar evento',
    31 => 'Adicionar',
    32 => 'Evento',
    33 => 'Data',
    34 => 'Hora',
    35 => 'Adicionar rápido',
    36 => 'Enviar',
    37 => 'Pedimos desculpa, o calendário pessoal está inactivo neste site',
    38 => 'Editor de eventos pessoais',
    39 => 'Dia',
    40 => 'Semana',
    41 => 'Mês'
);

###############################################################################
# admin/mail.php

$LANG31 = array(
    1 => "{$_CONF['site_name']} Utilitáriod de email",
    2 => 'De',
    3 => 'Responder a',
    4 => 'Assunto',
    5 => 'Mensagem',
    6 => 'Enviar para:',
    7 => 'Todos os utilizadores',
    8 => 'Admin',
    9 => 'Opções',
    10 => 'HTML',
    11 => 'Urgent message!',
    12 => 'Enviar',
    13 => 'Limpar',
    14 => 'Ignorar preferêncios do utilizador',
    15 => 'Erro ao enviar para: ',
    16 => 'Mensagens enviadas com sucesso para: ',
    17 => "<a href={$_CONF['site_admin_url']}/mail.php>Enviar outra mensagem</a>",
    18 => 'Para',
    19 => 'NOTA: se pretende enviar uma mensagem para todos os utilizadores do site, seleccione o grupo Logged-in Users na lista.',
    20 => "Enviadas <successcount> mensagens com sucesso e <failcount> sem sucesso.  Se precisar, os detalhes para cada mensagem estão a seguir. Caso contrário pode <a href=\"{$_CONF['site_admin_url']}/mail.php\">Enviar outra mensagem</a> ou voltar à <a href=\"{$_CONF['site_admin_url']}/moderation.php\">pagina de administração</a>.",
    21 => 'Falhas',
    22 => 'Sucessos',
    23 => 'Nenhuma falha',
    24 => 'Nenhum sucesso',
    25 => '-- Selecione o grupo --',
    26 => 'Preencha todos os campos no formulário e seleccione um grupo na lista.'
);

###############################################################################
# admin/plugins.php

$LANG32 = array(
    1 => 'A instalação de plugins pode danificar a instalação do Geeklog e, possivelmente, o sistema. É importante que apenas instale plugins descarregados do <a href="http://www.geeklog.net" target="_blank">Site Geeklog</a> dado que nós testamos todos os plugins enviados para o nosso site nos mais variados sistemas operativos. É importante que perceba que a instalação de plugin\'s requere a execução de comandos do sistema que lhe podem trazer problemas de segurança se esses plugins não vierem de sites fidedignos. Para além deste aviso, nós não garantimos o sucesso da instalação de plugins nem podemos ser responsabilizados pelos danos causados pela instalação de plugin\'s. Por outras palavras, instale à sua responsabilidade. Por prudencia, recomendações de como instalar um plugin manualmente vem incluidas com cada plugin.',
    2 => 'Responsabilidade da Instalação de Plug-in',
    3 => 'Formulário de instalação de Plug-in',
    4 => 'Ficheiro do Plug-in',
    5 => 'Lista de Plug-in\'s ',
    6 => 'Aviso: o Plug-in já está instalado!',
    7 => 'O plug-in que está a tentar instalar já existe. Tem de apagar antes de reinstalar',
    8 => 'Falhou o teste de compatibilidade do Plugin',
    9 => 'Este plugin necessita de uma versão mais recente do Geeklog. Faça a actualização da sua cópia do <a href="http://www.geeklog.net">Geeklog</a> ou procure outra versão do plug-in.',
    10 => '<br><b>Não há plugins instalados.</b><br><br>',
    11 => 'Para modificar ou apagar um plug-in, clique no número desse plugin. Para saber maia sobre um plug-in, clique no nome do plug-in e será redireccionado para o site desse plugin. Para instalar ou actualizar um plug-in consulte a sua documentação.',
    12 => 'nenhum nome de plugin enviado à função plugineditor()',
    13 => 'Editor de Plug-in',
    14 => 'Novo Plug-in',
    15 => 'Administração',
    16 => 'Nome do Plug-in',
    17 => 'Versão do Plug-in',
    18 => 'Versão do Geeklog',
    19 => 'Activo',
    20 => 'Sim',
    21 => 'Não',
    22 => 'Instalar',
    23 => 'Guardar',
    24 => 'Cancelar',
    25 => 'Apagar',
    26 => 'Nome',
    27 => 'Página Web',
    28 => 'Versão do Plug-in',
    29 => 'Versão do GL',
    30 => 'Apagar o Plug-in?',
    31 => 'Tem a certeza que pretende apagar este plug-in?  Ao efectuar isto remove todos os dados e estructuras que este plug-in utiliza. Se tem a certeza, clique em apagar novamente.',
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
    1 => "A sua password foi enviada para o seu email e deve chegar em breve. Siga as indicações presentes na mensagem e obrigado por utilizar o site {$_CONF['site_name']}",
    2 => "Obrigado por enviar a sua notícia para {$_CONF['site_name']}.  Foi enviado para a nossa equipa para aprovação. Se for aceite, a sua notícia estará disponível para todos os utilizadores do nosso site.",
    3 => "Obrigado por enviar a sua ligação para {$_CONF['site_name']}.  Foi enviado para a nossa equipa para aprovação.  Se for aceite, o seu link estará disponível na secção <a href={$_CONF['site_url']}/links.php>links.</a>",
    4 => "Obrigado por enviar o seu evento para {$_CONF['site_name']}.  Foi enviado para a nossa equipa para aprovação.  Se for aceite, o seu evento estará visível na secção <a href={$_CONF['site_url']}/calendar.php>calendário.</a>",
    5 => 'A informação da sua conta foi guardada com sucesso.',
    6 => 'As suas preferências do layout do site foram guardadas com sucesso.',
    7 => 'As suas preferências para os comentários foram guardadas com sucesso.',
    8 => 'Terminou a sua sessão com sucesso.',
    9 => 'A sua notícia foi registada com sucesso.',
    10 => 'A sua notícia foi apagada com sucesso.',
    11 => 'O seu bloco foi guardado com sucesso.',
    12 => 'O bloco foi apagado com sucesso.',
    13 => 'O seu tópico foi guardado com sucesso.',
    14 => 'O tópico e todas as notícias desse tópico foram apagados com sucesso.',
    15 => 'O seu link foi guardado com sucesso.',
    16 => 'O link foi apagado com sucesso.',
    17 => 'O seu evento foi registado com sucesso.',
    18 => 'O evento foi apagado com sucesso.',
    19 => 'A sua votação foi guardada com sucesso.',
    20 => 'A votação foi apagada com sucesso.',
    21 => 'O novo utilizador foi guardado com sucesso.',
    22 => 'O utilizador foi apagado com sucesso',
    23 => 'Erro ao tentar adicionar um evento ao seu calendário. Não foi indicado o id do evento.',
    24 => 'O evento foi adicionado ao seu calendário',
    25 => 'Não pode abrir o seu calendário pessoal enquanto não efectuar o login',
    26 => 'O evento foi retirado do seu calendário pessoal com sucesso',
    27 => 'Mensagem enviada com sucesso.',
    28 => 'O plug-in foi guardado com sucesso',
    29 => 'Pedimos desculpa, o calendário pessoal não está autorizado neste site',
    30 => 'Acesso não permitido',
    31 => 'Não tem acesso à manutenção de notícias. Relembramos que todas as tentativas de acesso a funções não autorizadas são registadas',
    32 => 'Não tem acesso à manutenção de tópicos. Relembramos que todas as tentativas de acesso a funções não autorizadas são registadas',
    33 => 'Não tem acesso à manutenção de blocos. Relembramos que todas as tentativas de acesso a funções não autorizadas são registadas',
    34 => 'Não tem acesso à manutenção de links. Relembramos que todas as tentativas de acesso a funções não autorizadas são registadas',
    35 => 'Não tem acesso à manutenção de eventos. Relembramos que todas as tentativas de acesso a funções não autorizadas são registadas',
    36 => 'Não tem acesso à manutenção de votações. Relembramos que todas as tentativas de acesso a funções não autorizadas são registadas',
    37 => 'Não tem acesso à manutenção de utilizadores. Relembramos que todas as tentativas de acesso a funções não autorizadas são registadas',
    38 => 'Não tem acesso à manutenção de plugin\'s. Relembramos que todas as tentativas de acesso a funções não autorizadas são registadas',
    39 => 'Não tem acesso à manutenção de email. Relembramos que todas as tentativas de acesso a funções não autorizadas são registadas',
    40 => 'Mensagem do sistema',
    41 => 'Não tem acesso à manutenção de palavras de substituição. Relembramos que todas as tentativas de acesso a funções não autorizadas são registadas',
    42 => 'A palavra foi guardada com sucesso.',
    43 => 'A palavra foi apagada com sucesso.',
    44 => 'O plug-in foi instalado com sucesso!',
    45 => 'O plug-in foi apagado com sucesso.',
    46 => 'Não tem acesso à manutenção de cópias da base de dados. Relembramos que todas as tentativas de acesso a funções não autorizadas são registadas',
    47 => 'Esta funcionalidade apenas trabalha em ambientes *nix.  Se estiver a trabalhar num ambiente *nix a cache foi limpa com sucesso. Se estiver no Windows, procure os ficheiros com o nome adodb_*.php e remova-os manualmente.',
    48 => "Obrigado por se aplicar como um membro de {$_CONF['site_name']}. A nossa equipa irá rever a sua aplicação. Se aprovada, a sua password será enviada para o email que nos indicou.",
    49 => 'O seu grupo foi guardado com sucesso.',
    50 => 'O grupo foi apagado com sucesso.',
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
    'access' => 'Acesso',
    'ownerroot' => 'Editor/Root',
    'group' => 'Grupo',
    'readonly' => 'Só leitura',
    'accessrights' => 'Direitos de acesso',
    'owner' => 'Autor',
    'grantgrouplabel' => 'Dar permissão de edição a todos os Grupos',
    'permmsg' => 'NOTA: membros são todos os utilizadores que efectuaram o login e anónimos são os visitantes da página sem login efectuado.',
    'securitygroups' => 'Grupos de segurança',
    'editrootmsg' => "Mesmo sendo membro do grupo de Administradores, não pode editar a informação de um utilizador root sem ser primeiro um utilizador root também.  Pode editar todos os utilizadores excepto os do grupo root. Lembramos que todas as tentativas de edição ilegal de utilizadores root são registadas.  Volte à página de <a href=\"{$_CONF['site_admin_url']}/user.php\">Administração de utilizadores</a>.",
    'securitygroupsmsg' => 'Seleccione as caixas dos grupos aos quais o utilizador irá pertencer.',
    'groupeditor' => 'Editor de grupos',
    'description' => 'Descrição',
    'name' => 'Nome',
    'rights' => 'Direitos',
    'missingfields' => 'Faltam campos',
    'missingfieldsmsg' => 'Deve introduzir o nome e a descrição do grupo',
    'groupmanager' => 'Manutenção de grupos',
    'newgroupmsg' => 'Para modificar ou apagar um grupo, clique nesse grupo. Para criar um grupo novo clique em Novo grupo. Relembramos que os grupos do núcleo não podem ser apagados porque são utilizados no sistema.',
    'groupname' => 'Nome',
    'coregroup' => 'Grupo do núcleo',
    'yes' => 'Sim',
    'no' => 'Não',
    'corerightsdescr' => "Este grupo pertence ao núcleo do site {$_CONF['site_name']}.  Daí que os direitos deste grupo não podem ser editados.  A seguir está a lista dos direitos de acesso dos membros deste grupo.",
    'groupmsg' => 'Os Grupos de Segurança deste site são hierárquicos.  Adicionando este grupo a qualquer um dos grupos a seguir está a dar a este grupo os mesmos direitos desses grupos. Onde seja possível aconselhamos a utilizar os grupos listados a seguir para dar permissões ao grupo. Se necessita que este grupo tenha direitos personalizados seleccione os direitos de acesso às mais variadas funcionalidades deste site seleccionando \'Direitos\'.  Para adicionar este grupo a qualquer um dos seguintes seleccione a caixa correspondente.',
    'coregroupmsg' => "Este grupo pertence ao núcleo do site {$_CONF['site_name']}.  Daí que os direitos deste grupo não podem ser editados.  A seguir está a lista dos direitos de acesso dos membros deste grupo.",
    'rightsdescr' => 'O acesso de um grupo a um determinado direito pode ser dado directamente ao grupo OU a um grupo diferente que contenha esses direitos. Os que vê a seguir sem caixa de selecção são os direitos dados a este grupo porque este pertence a um grupo que tem essas permissões. Os direitos com caixas de selecção são direitos que podem ser dados directamente a este grupo.',
    'lock' => 'Bloquear',
    'members' => 'Membros',
    'anonymous' => 'Anónimos',
    'permissions' => 'Permissões',
    'permissionskey' => 'L = leitura, E = edição, direitos de edição assumem direitos de leitura',
    'edit' => 'Editar',
    'none' => 'N/A',
    'accessdenied' => 'Acesso não autorizado',
    'storydenialmsg' => "Não tem permissão para ver esta notícia.  Isto pode acontecer porque você não é membro do site {$_CONF['site_name']}.  <a href=users.php?mode=new> Torne-se membro</a> do site {$_CONF['site_name']} para ter acesso como utilizador registado!",
    'eventdenialmsg' => "Não tem permissão para ver este evento.  Isto pode acontecer porque você não é membro do site {$_CONF['site_name']}.  <a href=users.php?mode=new> Torne-se membro</a> do site {$_CONF['site_name']} para ter acesso como utilizador registado!",
    'nogroupsforcoregroup' => 'Este grupo não pertence a qualquer um dos outros grupos',
    'grouphasnorights' => 'Este grupo não tem qualquer acesso administrativo neste site',
    'newgroup' => 'Novo grupo',
    'adminhome' => 'Administração',
    'save' => 'guardar',
    'cancel' => 'cancelar',
    'delete' => 'apagar',
    'canteditroot' => 'Tentou editar o grupo Root mas como não está incluído nesse grupo não lhe é permitido o acesso. Contacte o administrador do sistema se acha que isto se deve a um erro',
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
    'last_ten_backups' => 'Últimas 10 cópias de segurança',
    'do_backup' => 'Fazer cópia',
    'backup_successful' => 'Cópia efectuada com sucesso.',
    'db_explanation' => 'Para criar uma cópia de segurança prima o botão a seguir',
    'not_found' => "Caminho incorrecto ou o utilitário mysqldump não é executável.<br>Verifique a definição de <strong>\$_DB_mysqldump_path</strong> em config.php.<br>Variavel actualmente definida como: <var>{$_DB_mysqldump_path}</var>",
    'zero_size' => 'Erro na cópia: O tamanho do ficheiro é 0 bytes',
    'path_not_found' => "{$_CONF['backup_path']} não existe ou não é uma directoria",
    'no_access' => "ERRO: A directoria {$_CONF['backup_path']} não está acessível.",
    'backup_file' => 'Ficheiro da cópia',
    'size' => 'Tamanho',
    'bytes' => 'Bytes',
    'total_number' => 'Total number of backups: %d'
);

###############################################################################

$LANG_BUTTONS = array(
    1 => 'Início',
    2 => 'Contacto',
    3 => 'Publicar',
    4 => 'Ligações',
    5 => 'Votações',
    6 => 'Calendário',
    7 => 'Estatísticas',
    8 => 'Personalizar',
    9 => 'Pesquisar',
    10 => 'pesquisa avançada',
    11 => 'Directory'
);

###############################################################################
# 404.php

$LANG_404 = array(
    1 => 'Erro 404',
    2 => 'Procurei em todo o lado mas não encontrei <b>%s</b>.',
    3 => "<p>Pedimos desculpa, mas o ficheiro que pediu não existe. Sinta-se à vontade e verifique na <a href=\"{$_CONF['site_url']}\">página principal</a> ou na <a href=\"{$_CONF['site_url']}/search.php\">página de pesquisa</a> para tentar encontrar o que perdeu."
);

###############################################################################
# login form

$LANG_LOGIN = array(
    1 => 'Login necessário',
    2 => 'Queira desculpar, para aceder a esta área necessita de efectuar o login como utilizador.',
    3 => 'Login',
    4 => 'Novo utilizador'
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