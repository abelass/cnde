<?php
/**
 * Utilisations de pipelines par Squelettes CNDE
 *
 * @plugin     Squelettes CNDE
 * @copyright  2017
 * @author     Rainer
 * @licence    GNU/GPL
 * @package    SPIP\Cnde\Pipelines
 */

if (!defined('_ECRIRE_INC_VERSION')) {
	return;
}


function cnde_insert_head($flux){
	$flux .= recuperer_fond('head/scripts');
	return $flux;
}