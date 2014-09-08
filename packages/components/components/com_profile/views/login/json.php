<?php
/**
 * Com
 *
 * @author      Dave Li <dave@moyoweb.nl>
 * @category    Nooku
 * @package     Socialhub
 * @subpackage  ...
 * @uses        Com_
 */
 
defined('KOOWA') or die('Protected resource');

class ComProfileViewLoginJson extends KViewJson
{
	/**
	 * @return array|JUser
	 */
	protected function _getItem()
	{
		$result = array();

		if(JFactory::getUser()) {
			$result = JFactory::getUser();
//			$result->bcrypt = password_hash();
//			unset($result->password);
//			unset($result->password_clear);
		}

		return $result;
	}
}