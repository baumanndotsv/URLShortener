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
 * Fields
 */
$GLOBALS['TL_LANG']['tl_urlshortener']['title'] = array('Titel', 'Ein Titel für die ShortURL');
$GLOBALS['TL_LANG']['tl_urlshortener']['shortURL'] = array('ShortURL', 'Bitte lassen sie dieses Feld leer. Hier wird das erzeugte URL-Fragment für die ShortURL ausgegeben. Wenn sie diesen Wert verändern und die ShortURL schon publiziert haben, wird die Weiterleitung nicht mehr funktionieren. Ändern sie diesen Wert also mit Bedacht.');
$GLOBALS['TL_LANG']['tl_urlshortener']['longURL'] = array('URL der Zielseite', 'Hier die zu kürzende URL');
$GLOBALS['TL_LANG']['tl_urlshortener']['tracking'] = array('Einstellungen für Tracking', 'Hier können sie der ShortURL Trackingtags von Piwik oder Google Analytics hinzufügen');
$GLOBALS['TL_LANG']['tl_urlshortener']['published'] = array('Aktiv ', 'hier können sie die Weiterleitung aktivieren');
$GLOBALS['TL_LANG']['tl_urlshortener']['start'] = array('Datum der Aktivierung', 'Hier können sie die Weiterleitung anhand des Datums aktivieren');
$GLOBALS['TL_LANG']['tl_urlshortener']['stop'] = array('Datum der Deaktivierung', 'Hier können sie die Weiterleitung anhand des Datums deaktivieren');
$GLOBALS['TL_LANG']['tl_urlshortener']['google'] = 'Google Analytics';
$GLOBALS['TL_LANG']['tl_urlshortener']['piwik'] = 'Piwik';
$GLOBALS['TL_LANG']['tl_urlshortener']['service'] = array('Trackingdienst','Auswahl der Linktrackingdienste');
$GLOBALS['TL_LANG']['tl_urlshortener']['campain'] = array('Kampagne','Kampagne für Tracking');
$GLOBALS['TL_LANG']['tl_urlshortener']['keyword'] = array('Keyword','Keyword für Tracking');

/**
 * Reference
 */
$GLOBALS['TL_LANG']['tl_urlshortener'][''] = '';

$GLOBALS['TL_LANG']['tl_urlshortener']['title_legend'] = 'Grundeinstellungen';
$GLOBALS['TL_LANG']['tl_urlshortener']['tracking_legend'] = 'Tracking Einstellungen';
$GLOBALS['TL_LANG']['tl_urlshortener']['publish_legend'] = 'Aktivierungseinstellungen';



/**
 * Buttons
 */
$GLOBALS['TL_LANG']['tl_urlshortener']['new']    = array('Neue ShortURL', 'Eine neue ShortURL erzeugen');
$GLOBALS['TL_LANG']['tl_urlshortener']['edit']   = array('Eintrag bearbeiten', '');
$GLOBALS['TL_LANG']['tl_urlshortener']['copy']   = array('Eintrag kopieren', '');
$GLOBALS['TL_LANG']['tl_urlshortener']['delete'] = array('Eintrag löschen', '');
$GLOBALS['TL_LANG']['tl_urlshortener']['show']   = array('Details anzeigen', '');

?>