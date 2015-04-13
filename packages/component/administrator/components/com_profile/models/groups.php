<?php

class ComProfileModelGroups extends ComTaxonomyModelTaxonomies
{
    public function __construct(KConfig $config)
    {
        parent::__construct($config);
        
        $this->_state->insert('group_id', 'int');
    }
    
    public function _buildQueryWhere(KDatabaseQuery $query)
    {
        if(is_array($this->_state->group_id))
        {
            foreach($this->_state->group_id as $group) {
                $query->where('FIND_IN_SET(' . $group . ', REPLACE(SUBSTRING_INDEX(SUBSTR(ANCESTORS,LOCATE(\'"GROUPS":[\',ANCESTORS)+CHAR_LENGTH(\'"GROUPS":[\')),\']\', 1),\'\', \'\'))', null, null, 'OR');
            }
        } else if(is_int($this->_state->group_id)) {
            $query->where('FIND_IN_SET(' . $this->_state->group_id . ', REPLACE(SUBSTRING_INDEX(SUBSTR(ANCESTORS,LOCATE(\'"GROUPS":[\',ANCESTORS)+CHAR_LENGTH(\'"GROUPS":[\')),\']\', 1),\'\', \'\'))', null, null);
        }
    }
}