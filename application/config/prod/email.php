<?php
/**********************************
 * EMAIL CONF PROD  !!!!
 **********************************/
$config['protocol'] 	= 'smtp';
$config['smtp_host']	= 'smtpauth.phpnet.org';
$config['smtp_user'] 	= 'suivi@en-production.net';
$config['smtp_port'] 	= '25';						//8025Port spécifique pour phpnet pour contourner les probs d'envois SMTP bloqués (notamment par orange)
$config['smtp_pass'] 	= 'puce0975';
$config['mailtype'] 	= 'html';
$config['charset']		= 'UTF-8';//iso-8859-2

$config['app_mail_address']			= array('guillaume.lecoz@gmjphoenix.com');
$config['app_mail_from']			= 'Equipe Importexport.fr';
$config['app_mail_subject_prefx']	= '[SolutionsTMD] ';