<?php
/**
 * ComProfile
 *
 * @author      Dave Li <dave@moyoweb.nl>
 * @category    Nooku
 * @package     Profile
 * @uses        Com_cck, com_taxonomy
 */

class ComProfileModelUsers extends ComDefaultModelDefault
{

    /**
     * Construct the model
     *
     * @param KConfig $config
     */
    public function __construct(KConfig $config)
    {
        parent::__construct($config);
        $this->getState()->insert('search', 'string')
                         ->insert('sort', 'word', 'name');
    }

    /**
     * @param KDatabaseQuery $query
     */
    protected function _buildQueryJoins(KDatabaseQuery $query)
    {
        parent::_buildQueryJoins($query);

        $query->select('users.name AS name');
        $query->select('users.username AS username');
        $query->select('users.email AS email');
        $query->join('LEFT', 'users AS users', 'users.id = tbl.profile_user_id');
    }

    /**
     * Build where query
     *
     * @param KDatabaseQuery $query
     */
    public function _buildQueryWhere(KDatabaseQuery $query)
    {
        parent::_buildQueryWhere($query);

        if($this->_state->search) {
            $query->where('name', 'LIKE', '%'.$this->_state->search.'%');
        }
    }
}