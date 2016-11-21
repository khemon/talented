#!/usr/bin/sh
#Fonction de logging
log_message()
{
	vSEV=$1
	vMSG=$2
	echo `date +'%Y-%m-%d %H:%M:%S'`" [${vSEV}]: ${vMSG}" | tee -a ${LOG_FILE}
}

log_message NORMAL "Suppression du repertoire des Entites"
rm -rf $WORK_DIR/src/AppBundle/Entity
cd $WORK_DIR
log_message NORMAL "Regeneration des entites avec Annonation & getters"
php bin/console doctrine:mapping:import --force AppBundle
php bin/console doctrine:mapping:convert annotation ./src
php bin/console doctrine:generate:entities AppBundle/Entity/
cd $WORK_DIR/src/AppBundle/Entity/
log_message NORMAL "Suppression des fichiers entites backupees"
rm -f *~
