<?php

class ComProfileDatabaseTableProfiles extends KDatabaseTableDefault
{
    public function _initialize(KConfig $config)
    {
        $config->append(array(
            'name' => 'users',
            'base' => 'users',
            'identity_column' => 'id',
            'column_map' => array(
                'title' => 'username'
            )
        ));
        
        parent::_initialize($config);
    }
}