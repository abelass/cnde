<?php
/**
 * Fichier gérant l'installation et désinstallation du plugin Squelettes CNDE
 *
 * @plugin     Squelettes CNDE
 * @copyright  2017
 * @author     Rainer
 * @licence    GNU/GPL
 * @package    SPIP\Cnde\Installation
 */

if (!defined('_ECRIRE_INC_VERSION')) {
	return;
}
include_spip('inc/cextras');
include_spip('base/cnde');

/**
 * Fonction d'installation et de mise à jour du plugin Squelettes CNDE.
 *
 * Vous pouvez :
 *
 * - créer la structure SQL,
 * - insérer du pre-contenu,
 * - installer des valeurs de configuration,
 * - mettre à jour la structure SQL
 *
 * @param string $nom_meta_base_version
 *     Nom de la meta informant de la version du schéma de données du plugin installé dans SPIP
 * @param string $version_cible
 *     Version du schéma de données dans ce plugin (déclaré dans paquet.xml)
 * @return void
**/
function cnde_upgrade($nom_meta_base_version, $version_cible) {
	$maj = array();
	cextras_api_upgrade(cnde_declarer_champs_extras(), $maj['create']);
	cextras_api_upgrade(cnde_declarer_champs_extras(), $maj['1.0.1']);


	include_spip('base/upgrade');
	maj_plugin($nom_meta_base_version, $version_cible, $maj);
}


/**
 * Fonction de désinstallation du plugin Squelettes CNDE.
 *
 * Vous devez :
 *
 * - nettoyer toutes les données ajoutées par le plugin et son utilisation
 * - supprimer les tables et les champs créés par le plugin.
 *
 * @param string $nom_meta_base_version
 *     Nom de la meta informant de la version du schéma de données du plugin installé dans SPIP
 * @return void
**/
function cnde_vider_tables($nom_meta_base_version) {
	# quelques exemples
	# (que vous pouvez supprimer !)
	# sql_drop_table('spip_xx');
	# sql_drop_table('spip_xx_liens');

	cextras_api_vider_tables(cnde_declarer_champs_extras());
	effacer_meta($nom_meta_base_version);
}
