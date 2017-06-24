<?php
/**
 * Déclarations relatives à la base de données
 *
 * @plugin     CNDE
 * @copyright  2017
 * @author     Rainer Müller
 * @licence    GNU/GPL
 */

if (!defined('_ECRIRE_INC_VERSION')) return;



// Ajout de champs extras
function cnde_declarer_champs_extras($champs = array()) {

	$champs['spip_auteurs']= array(
		'organisation' => array(
			'saisie' => 'input',//Type du champ (voir plugin Saisies)
			'options' => array(
					'nom' => 'organisation',
					'label' => _T('cnde:label_organisation'),
					'sql' => "varchar(255) NOT NULL DEFAULT ''",
				),
			),
		'fonction' => array(
			'saisie' => 'input',//Type du champ (voir plugin Saisies)
			'options' => array(
				'nom' => 'fonction',
				'label' => _T('cnde:label_fonction'),
				'sql' => "varchar(255) NOT NULL DEFAULT ''",
			),
		),
	);

	$champs['spip_reservations']= array(
		'traduction' => array(
			'saisie' => 'oui_non',//Type du champ (voir plugin Saisies)
			'options' => array(
				'nom' => 'traduction',
				'label' => _T('cnde:label_traduction'),
				'sql' => "varchar(2) NOT NULL DEFAULT ''",
			),
		)
	);

	return $champs;

}
