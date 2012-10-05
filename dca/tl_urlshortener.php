<?php if (!defined('TL_ROOT')) die('You cannot access this file directly!');

/**
 * Contao Open Source CMS
 * Copyright (C) 2005-2011 Leo Feyer
 *
 * Formerly known as TYPOlight Open Source CMS.
 *
 * This program is free software: you can redistribute it and/or
 * modify it under the terms of the GNU Lesser General Public
 * License as published by the Free Software Foundation, either
 * version 3 of the License, or (at your option) any later version.
 * 
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU
 * Lesser General Public License for more details.
 * 
 * You should have received a copy of the GNU Lesser General Public
 * License along with this program. If not, please visit the Free
 * Software Foundation website at <http://www.gnu.org/licenses/>.
 *
 * PHP version 5
 * @copyright  MISSION:VISION 2012 
 * @author     Dominik Tomasi 
 * @package    URLShortener 
 * @license    GNU/LGPL 
 * @filesource
 */


/**
 * Table tl_urlshortener 
 */
$GLOBALS['TL_DCA']['tl_urlshortener'] = array
(

	// Config
	'config' => array
	(
		'dataContainer'               => 'Table',
		'enableVersioning'            => true,
        'flag'                    => 1,
	),

	// List
	'list' => array
	(
        'sorting' => array
        (
            'mode'                    => 1,
            'fields'                  => array('title'),
            'flag'                    => 1,
            'panelLayout'             => 'search,limit'
        ),
        'label' => array
        (
            'fields'                  => array('title','shortURL'),
            'format'                  => '%s <span style="color:#b3b3b3; padding-left:3px;">[%s]</span>'
        ),
		'global_operations' => array
		(
			'all' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['MSC']['all'],
				'href'                => 'act=select',
				'class'               => 'header_edit_all',
				'attributes'          => 'onclick="Backend.getScrollOffset();" accesskey="e"'
			)
		),
		'operations' => array
		(
			'edit' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['tl_urlshortener']['edit'],
				'href'                => 'act=edit',
				'icon'                => 'edit.gif'
			),
			'copy' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['tl_urlshortener']['copy'],
				'href'                => 'act=copy',
				'icon'                => 'copy.gif'
			),
			'delete' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['tl_urlshortener']['delete'],
				'href'                => 'act=delete',
				'icon'                => 'delete.gif',
				'attributes'          => 'onclick="if (!confirm(\'' . $GLOBALS['TL_LANG']['MSC']['deleteConfirm'] . '\')) return false; Backend.getScrollOffset();"'
			),
			'show' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['tl_urlshortener']['show'],
				'href'                => 'act=show',
				'icon'                => 'show.gif'
			)
		)
	),

	// Palettes
	'palettes' => array
	(
		'__selector__'                => array('tracking'),
		'default'                     => '{title_legend},title,longURL,shortURL;{tracking_legend:hide},tracking;{publish_legend},published,start,stop;',
	    'google' 	                    => '{title_legend},title,longURL,shortURL;{tracking_legend:hide},tracking;{publish_legend},published,start,stop;',
        'piwik'	                        => '{title_legend},title,longURL,shortURL;{tracking_legend:hide},tracking;{publish_legend},published,start,stop;'
    ),

	// Subpalettes
	'subpalettes' => array
	(
		'tracking'                            => 'service,campain,keyword'

	),

	// Fields
	'fields' => array
	(
        'title' => array
        (
            'label'                   => &$GLOBALS['TL_LANG']['tl_urlshortener']['title'],
            'search'                  => true,
            'inputType'               => 'text',
            'eval'                    => array('mandatory'=>true, 'maxlength'=>64, 'tl_class'=>'w50')
        ),
        'longURL' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_urlshortener']['longURL'],
			'exclude'                 => true,
			'inputType'               => 'text',
			'eval'                    => array('mandatory'=>true,'rgxp'=>'url', 'maxlength'=>255, 'tl_class'=>'w50')
		),
        'shortURL' => array
        (
            'label'                   => &$GLOBALS['TL_LANG']['tl_urlshortener']['shortURL'],
            'search'                  => true,
            'inputType'               => 'text',
            'eval'                    => array('rgxp'=>'url', 'unique'=>true, 'spaceToUnderscore'=>true, 'maxlength'=>128, 'tl_class'=>'w50'),
            'load_callback' => array
            (
                array('tl_urlshortener', 'generateShortURL')
            )
        ),
        'tracking' => array
        (
            'label'                   => &$GLOBALS['TL_LANG']['tl_urlshortener']['tracking'],
            'inputType'               => 'checkbox',
            'eval'                    => array('submitOnChange'=>true)
        ),
        'service' => array
        (
            'label'                   => &$GLOBALS['TL_LANG']['tl_urlshortener']['service'],
            'exclude'                 => true,
            'inputType'               => 'radio',
            'filter'                  => true,
            'default'				  => 'piwik',
            'options'				  => array(
                'google' 	            => &$GLOBALS['TL_LANG']['tl_urlshortener']['google'],
                'piwik'	                => &$GLOBALS['TL_LANG']['tl_urlshortener']['piwik']
            ),
            'eval'                    => array('mandatory'=>true,'submitOnChange'=>true)
        ),
        'campain' => array
        (
            'label'                   => &$GLOBALS['TL_LANG']['tl_urlshortener']['campain'],
            'search'                  => true,
            'inputType'               => 'text',
            'eval'                    => array('mandatory'=>true,'maxlength'=>64, 'tl_class'=>'w50')
        ),
        'keyword' => array
        (
            'label'                   => &$GLOBALS['TL_LANG']['tl_urlshortener']['keyword'],
            'search'                  => true,
            'inputType'               => 'text',
            'eval'                    => array('mandatory'=>true,'maxlength'=>64, 'tl_class'=>'w50')
        ),
        'published' => array
        (
            'label'                   => &$GLOBALS['TL_LANG']['tl_urlshortener']['published'],
            'exclude'                 => true,
            'filter'                  => true,
            'flag'                    => 1,
            'inputType'               => 'checkbox',
            'eval'                    => array('doNotCopy'=>true)
        )/*,

        'start' => array
        (
            'label'                   => &$GLOBALS['TL_LANG']['tl_urlshortener']['start'],
            'exclude'                 => true,
            'inputType'               => 'text',
            'eval'                    => array('rgxp'=>'datim', 'datepicker'=>true, 'tl_class'=>'w50 wizard')
        ),
        'stop' => array
        (
            'label'                   => &$GLOBALS['TL_LANG']['tl_urlshortener']['stop'],
            'exclude'                 => true,
            'inputType'               => 'text',
            'eval'                    => array('rgxp'=>'datim', 'datepicker'=>true, 'tl_class'=>'w50 wizard')
        )*/
    )
);

class tl_urlshortener extends Controller {



    public function __construct()
    {
        parent::__construct();
        $this->import('Database');
    }

    /**
     * Auto-generate the news alias if it has not been set yet
     * @param mixed
     * @param DataContainer
     * @return string
     */
    public function generateShortURL($varValue, DataContainer $dc)
    {

        $objAlias = $this->Database->prepare("SELECT id FROM tl_urlshortener WHERE shortURL=?")
            ->execute($varValue);

        if ($objAlias->shortURL > 0){
            return $varValue;
            exit;
        }else{
            // Generate alias if there is none
            if (!strlen($varValue))
            {
                $varValue = $this->generateURL();

            }

        }
        return $varValue;
    }
    protected function generateHash() {


        $laenge= $GLOBALS['TL_CONFIG']['URLlenght'];
        //Zeichen, die im Zufallsstring vorkommen sollen
        $zeichen = '1234567890abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $hash = '';
        $anzahl_zeichen = strlen($zeichen);
        for($i=0;$i<$laenge;$i++)
        {
            $hash .= $zeichen[mt_rand(0, $anzahl_zeichen - 1)];
        }
        return $hash;



    }
    protected function generateURL() {

        $hash = $this->generateHash();
        $domain = $_SERVER['HTTP_HOST'];

        if (strlen($GLOBALS['TL_CONFIG']['shortDomain']) > 1){
            $url = $GLOBALS['TL_CONFIG']['shortDomain'] .'/'. $hash;
            return $url;
        }else if (strlen($GLOBALS['TL_CONFIG']['websitePath']) > 1){
            $url = $domain .$GLOBALS['TL_CONFIG']['websitePath'].'/'. $hash;
            return $url;

        }else{
            $url = $domain .'/'. $hash;
            return $url;

        }


    }



}


?>