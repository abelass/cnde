<?php
/**
 * Fonctions utiles au plugin Squelettes CNDE
 *
 * @plugin     Squelettes CNDE
 * @copyright  2017
 * @author     Rainer
 * @licence    GNU/GPL
 * @package    SPIP\Cnde\Fonctions
 */

if (!defined('_ECRIRE_INC_VERSION')) {
	return;
}
/**
 * Affiche un text avec liens vers traductions si pas de texte.
 *
 * @param string $texte
 *          Le texte dont on teste la présence
 * @param string $objet
 *          L'objet spip.
 * @param integer $id_trad
 *          L'id de traduction.
 * @param string $lang
 *          La langue de l'objet.
 * @return string
 */
function traductions_diponibles($texte, $objet, $id_trad, $lang) {
	if (!$texte) {
		if ($id_trad > 0) {
			$identite = 'id_' .$objet;
			$champs = ['titre', $identite, 'lang'];
			$from = 'spip_' . $objet . 's';

			$where = [
				'id_trad =' . $id_trad ,
				'lang !=' .sql_quote($lang),
				'texte NOT LIKE ""',
			];
			$sql = sql_select($champs, $from, $where);
			$traductions = '';
			$i = 0;
			while ($data = sql_fetch($sql)) {
				if ($i != 0) {
					$traductions .= '<span class="separator">, </span>';
				}
				$i++;
				$traductions .= '<a href="' . generer_url_entite($data[$identite], $objet) . '" title="' . supprimer_numero($data['titre']) .'">' . traduire_nom_langue($data['lang']). '</a>';
			}

			if ($traductions) {
				$texte = _T('cnde:traductions_disponibles', ['traductions' => $traductions]);
			}
		}
	}

	return $texte;
}