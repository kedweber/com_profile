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

class ComProfileControllerUser extends ComDefaultControllerResource
{
    protected function _actionLogin(KCommandContext $context)
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
                JFactory::getApplication()->input->cookie->set('_token', JSession::getFormToken(), 0, '/');
            }
        }
    }

    protected function _actionLogout(KCommandContext $context)
    {
        $user = JFactory::getUser();

        if($user->id)
        {
            $app = JFactory::getApplication();

            $error = $app->logout();

            if (!($error instanceof Exception))
            {

            }
            else
            {
                $context->status = KHttpResponse::OK;
            }
        }

        if(KRequest::type() != 'AJAX') {
            $this->_redirect = KRequest::referrer();
//			return $rowset;
        }
    }
}