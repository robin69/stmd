Processus de déploiement du système :

Dans le fichier index.php :
	- ajouter les chemins vers les répertoires applications et system pour le cas "production",
	- dans le fichier application>config>database.php modifier les information de base de données pour le groupe-environnement "production".
	
	Le profiler CI se trouve dans les hook > hook_importexport.