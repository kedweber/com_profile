<?php

class ComProfileModelGroups extends ComDefaultModelDefault
{
    public function __construct(KConfig $config)
    {
        parent::__construct($config);
        
        $this->_state->insert('user_id', 'int');
    }
    
    public function _buildQueryWhere(KDatabaseQuery $query)
    {
        if($this->_state->user_id)
        {
            $query->where('FIND_IN_SET('.$this->_state->user_id.', REPLACE(SUBSTRING_INDEX(SUBSTR(ANCESTORS,LOCATE(\'"USERS":[\',ANCESTORS)+CHAR_LENGTH(\'"USERS":[\')),\']\', 1),\'\', \'\'))', null, null);
        }
    }
}