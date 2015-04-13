<?php

class ComProfileDatabaseTableGroups extends KDatabaseTableDefault
{
    public function _initialize(KConfig $config)
    {
        $relationable = $this->getBehavior('com://admin/taxonomy.database.behavior.relationable', array(
            'ancestors' => array(
                'regions' => array(
                    'identifier' => 'com://admin/regions.model.regions'
                ),
                'groups' => array(
                    'identifier' => 'com://admin/profile.model.usergroups'
                )
            )
        ));
        
        $config->append(array(
            'behaviors' => array(
                'lockable',
                'creatable',
                'modifiable',
                'identifiable',
                'orderable',
                'sluggable',
                $relationable,
                'com://admin/translations.database.behavior.translatable',
            )
        ));

        parent::_initialize($config);
    }
}