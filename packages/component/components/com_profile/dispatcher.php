<?php

class ComProfileDispatcher extends ComDefaultDispatcher
{
    public function _initialize(KConfig $config){
        $config->append(array(
            'controller' => 'login'
        ));

        parent::_initialize($config);
    }
}
