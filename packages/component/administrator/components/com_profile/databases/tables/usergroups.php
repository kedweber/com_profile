<?php

class ComProfileDatabaseTableUsergroups extends KDatabaseTableDefault
{
    public function _initialize(KConfig $config)
    {
        $config->append(array(
            'name' => 'usergroups',
            'base' => 'usergroups',
            'identity_column' => 'id',
        ));
        
        parent::_initialize($config);
    }
}