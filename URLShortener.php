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
 * Class URLShortener 
 *
 * @copyright  MISSION:VISION 2012 
 * @author     Dominik Tomasi 
 * @package    Controller
 */

class URLShortener extends PageError404
{


    public function __construct()
    {
        parent::__construct();
        $this->redirectToShortURL();

    }


    protected function redirectToShortURL()
    {
        $url = $this->Environment->request;
        $this->import('Environment');
        $this->import('Database');
        
        $url = urldecode($url);
        $suffix = $GLOBALS['TL_CONFIG']['urlSuffix'];
        $url = rtrim($url,$suffix);
        $domain = $_SERVER['HTTP_HOST'];

        if (strlen($GLOBALS['TL_CONFIG']['shortDomain']) > 1){
            $url = $GLOBALS['TL_CONFIG']['shortDomain'] .'/'. $url;
        }else if (strlen($GLOBALS['TL_CONFIG']['websitePath']) > 1){
            $url = $domain .$GLOBALS['TL_CONFIG']['websitePath'].'/'. $url;
        }else{
            $url = $domain .'/'. $url;
        }
        $dbrequest = $this->Database->prepare('SELECT shortURL,longURL,tracking,service,campain,keyword
												FROM tl_urlshortener
												WHERE 	published=? AND  shortURL=?'
        )
            ->limit(1)->execute('1',$url);

        if($dbrequest->numRows > 0)
        {
                $targetURL = $dbrequest->longURL;
                if ($dbrequest->tracking == 1 ){
                    $this->redirect($this->buildTrackingURL($targetURL,$dbrequest),301);
                    exit;
                }else{
                    $this->redirect($targetURL,301);
                }
        }


    }
    protected function buildTrackingURL($trackingURL,$dbrequest){

        switch ($dbrequest->service)
        {
            // ...for internal redirects
            case 'piwik':
                //PIWIK
                //http://folg.it/?pk_campaign=mv&pk_kwd=keyword
                $trackingURL .= '?pk_campain='.$dbrequest->campain .'&pk_kwd='. $dbrequest->keyword;
                return $trackingURL;
                break;
            case 'google':
                //GOOGLEAnalytics
                //http://folg.it/?utm_source=google&utm_medium=banner&utm_campaign=mv
                $trackingURL .= '?utm_source=google&utm_medium='. $dbrequest->keyword.'&utm_campaign='.$dbrequest->campain ;
                return $trackingURL;
                break;
            default:
                return $trackingURL;
        }
    }
    public function getShortURL($params,$options){





    }
}
?>