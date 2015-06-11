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
 * Plugin 'Poll' for the 'jk_poll' extension.
 *
 * @author	Johannes Krausmueller <johannes@krausmueller.de>
*/

class ext_update  {

    /**
     * Main function, returning the HTML content of the module
     * 
     * @return    string        HTML
     */
    function main()    {
    	//select all polls
    	$res_polls = $GLOBALS['TYPO3_DB']->exec_SELECTquery('*', 'tx_jkpoll_poll','');
		while ($row_polls = $GLOBALS['TYPO3_DB']->sql_fetch_assoc($res_polls)) {	
			//check if update is necessary
			$pos = strpos($row_polls['answers'], '|');
			if ($pos > 0) {
				// get every answer
				$answers = explode("\n", $row_polls['answers']);
				$answers_new = "";
				$votes_new = "";
				$colors_new = "";
				foreach ($answers as $answer) {				
					list ($votes, $text, $color) = explode('|', $answer);				
					$answers_new .=  $text."\n";
					$votes_new .= $votes."\n";
					$colors_new .= $color."\n";
				} 
				$answers_new =  trim($answers_new);
				$votes_new = trim($votes_new);
				$colors_new = trim($colors_new);
				
				//write back to database			
				$updateFields = array(
					'answers' => $answers_new,
					'votes' => $votes_new,
					'colors' => $colors_new
				);
				$GLOBALS['TYPO3_DB']->exec_UPDATEquery('tx_jkpoll_poll', 'uid='.$row_polls['uid'], $updateFields);
			}
		}        
		$content.= '<br />Update complete!';
        return $content;    
    }
    
    /**
     * Checks if update is needed
     * 
     * @return    boolean        
     */
    function access()    {

		//check if update is necessary
       	$res_polls = $GLOBALS['TYPO3_DB']->exec_SELECTquery('*', 'tx_jkpoll_poll','');
		while ($row_polls = $GLOBALS['TYPO3_DB']->sql_fetch_assoc($res_polls)) {	
			$pos = strpos($row_polls['answers'], '|');
			if ($pos > 0) {
				$update = true;
			}			
    	}
    	if ($update == true) {
    		return $update;
		}
    }        
}
?>