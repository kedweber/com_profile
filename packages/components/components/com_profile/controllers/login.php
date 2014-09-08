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

class ComProfileControllerLogin extends ComDefaultControllerResource
{
	protected function _actionPost(KCommandContext $context)
	{

		if($context->data->username && $context->data->password) {
			$credentials = array(
				'username' => $context->data->username,
				'password' => $context->data->password
			);

			// If we did receive the user credentials from the user, try to login
			if(JFactory::getApplication()->login($credentials) !== true)
			{
				$context->status = KHttpResponse::UNAUTHORIZED;
			} else {
				$context->status = KHttpResponse::OK;
			}
		}
	}
}