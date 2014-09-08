<?php

class ComProfileControllerBehaviorExecutable extends ComDefaultControllerBehaviorExecutable
{
    public function canAdd()
    {
        $parameters = JComponentHelper::getParams('com_users');

        if($parameters->get('allowUserRegistration') == '0') {
            return false;
        }

        return true;
    }

    public function canRead()
    {
    	$parameters = JComponentHelper::getParams('com_users');

        if($parameters->get('allowUserRegistration') == '0')
        {
	        $view = $this->getView();
	    	if ($view->getName() === 'user' && $view->getLayout() === 'register') {
	    		return false;
	    	}
        }

        return true;
    }
    
    public function canBrowse()
    {
        return false;
    }

    public function canEdit()
    {
        $request = $this->getRequest();

        if($request->id == 0 || $request->id != JFactory::getUser()->id) {
            return false;
        }

        $result = !JFactory::getUser()->guest;
        return $result;
    }
    
    public function canLogout()
    {
        $userid = JFactory::getUser()->id;

        //Allow logging out ourselves
        if($userid) {
             return true;
        }

        if(JFactory::getUser()->get('gid') > 24) {
            return true;
        }

        return false;
    }

	protected function _checkToken()
	{
		return true;
	}
}