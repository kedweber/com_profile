<?php

class ComProfileDatabaseRowsetGroups extends KDatabaseRowsetDefault
{
    public function getRegions() {
        $regions = array();
        
        if(!JFactory::getUser()->get('isRoot')) {
            foreach ($this as $group) {
                foreach ($group->regions as $region) {
                    if (!in_array($region->id, $regions)) {
                        $regions[] = $region->id;
                    }
                }
            }
        }
        
        return $regions;
    }
}