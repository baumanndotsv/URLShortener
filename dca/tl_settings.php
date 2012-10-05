<?php if (!defined('TL_ROOT')) die('You can not access this file directly!');

/**
 * @copyright 	4ward.media 2012 <http://www.4wardmedia.de>
 * @author 		Christoph Wiechert <wio@psitrax.de>
 * @license    	LGPL
 * @package 	redirect4ward
 * @filesource
 */

$GLOBALS['TL_DCA']['tl_settings']['palettes']['default'] .= ';{URLShortener_legend:hide},shortDomain,URLlenght,';


$GLOBALS['TL_DCA']['tl_settings']['fields']['shortDomain'] = array
(
    'label'                   => &$GLOBALS['TL_LANG']['tl_settings']['shortDomain'],
    'inputType'               => 'text',
    'eval'                    => array('madatory'=>true, 'tl_class'=>'m12 w50')
);
$GLOBALS['TL_DCA']['tl_settings']['fields']['URLlenght'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_settings']['URLlenght'],
	'inputType'               => 'text',
	'eval'                    => array('tl_class'=>'m12 w50')
);


?>
