<?php
/**
 * ComProfile
 *
 * @author      Joep van der Heijden <joep.van.der.heijden@moyoweb.nl>
 * @category    Nooku
 * @package     Profile
 * @uses        Com_cck, com_taxonomy
 */

class ComProfileDatabaseRowUser extends KDatabaseRowDefault
{

    /**
     * Saves the row to the database. And saves a Joomla User.
     *
     * This performs an intelligent insert/update and reloads the properties
     * with fresh data from the table on success.
     *
     * @return boolean	If successfull return TRUE, otherwise FALSE
     */
    public function save()
    {
        $user = JUser::getInstance();

        if(isset($this->_modified['password'])) {

            $data = array(
                'id'        => $this->id,
                'name'      => $this->name,
                'username'  => $this->username,
                'email'     => $this->email,
                'groups'    => $this->groups
            );

            if ($this->password !== '' && $this->password_verify !== '') {
                $data['password'] = $this->password;
                $data['password2'] = $this->password_verify;
            }

            $user->id = $this->id;
            $user->bind($data);

            if ($this->isNew() && empty($this->password)) {
                JFactory::getApplication()->redirect(KRequest::referrer(), 'No password.', 'error');
            }

            if(!$user->save()) {
                JFactory::getApplication()->redirect(KRequest::referrer(), 'Error while saving Joomla user.', 'error');
            }
        }

        if($this->isNew()) {
            $this->setData(array(
                'id' => $user->id,
                'profile_user_id' => $user->id,
            ));
        }

        parent::save();
    }
}