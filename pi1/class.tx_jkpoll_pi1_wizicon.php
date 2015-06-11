<?php
/***************************************************************
*  Copyright notice
*
*  (c) 2004 Johannes Krausmueller (johannes@krausmueller.de)
*  All rights reserved
*
*  This script is part of the TYPO3 project. The TYPO3 project is
*  free software; you can redistribute it and/or modify
*  it under the terms of the GNU General Public License as published by
*  the Free Software Foundation; either version 2 of the License, or
*  (at your option) any later version.
*
*  The GNU General Public License can be found at
*  http://www.gnu.org/copyleft/gpl.html.
*
*  This script is distributed in the hope that it will be useful,
*  but WITHOUT ANY WARRANTY; without even the implied warranty of
*  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
*  GNU General Public License for more details.
*
*  This copyright notice MUST APPEAR in all copies of the script!
***************************************************************/
/**
 * Class that adds the wizard icon.
 *
 * @author	Johannes Krausmueller <johannes@krausmueller.de>
 */



class tx_jkpoll_pi1_wizicon {
	function proc($wizardItems)	{
		global $LANG;

		$LL = $this->includeLocalLang();

		$wizardItems["plugins_tx_jkpoll_pi1"] = array(
			"icon"=>t3lib_extMgm::extRelPath("jk_poll")."pi1/ce_wiz.gif",
			"title"=>$LANG->getLLL("pi1_title",$LL),
			"description"=>$LANG->getLLL("pi1_plus_wiz_description",$LL),
			"params"=>"&defVals[tt_content][CType]=list&defVals[tt_content][list_type]=jk_poll_pi1"
		);

		return $wizardItems;
	}
	function includeLocalLang()    {
        $llFile = t3lib_extMgm::extPath('jk_poll').'locallang_db.xml';
        //if (t3lib_div::int_from_ver(TYPO3_version) < 4007000) {
	if (version_compare(TYPO3_branch,'4.7','<')) {
        	$LOCAL_LANG = t3lib_div::readLLXMLfile($llFile, $GLOBALS['LANG']->lang);
        } else {
        	$llxmlParser = t3lib_div::makeInstance('t3lib_l10n_parser_Llxml');
		$LOCAL_LANG = $llxmlParser->getParsedData($llFile, $GLOBALS['LANG']->lang);
        }
        return $LOCAL_LANG;
    }
}



if (defined("TYPO3_MODE") && $TYPO3_CONF_VARS[TYPO3_MODE]["XCLASS"]["ext/jk_poll/pi1/class.tx_jkpoll_pi1_wizicon.php"])	{
	include_once($TYPO3_CONF_VARS[TYPO3_MODE]["XCLASS"]["ext/jk_poll/pi1/class.tx_jkpoll_pi1_wizicon.php"]);
}

?>
