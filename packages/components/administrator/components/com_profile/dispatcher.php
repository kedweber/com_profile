<?php
/**
 * ComProfile
 *
 * @author      Joep van der Heijden <joep.van.der.heijden@moyoweb.nl>
 * @category    Nooku
 * @package     Profile
 * @uses        Com_cck, com_taxonomy, com_routes, com_moyo, com_translations
 */

defined('KOOWA') or die('Protected resource');

class ComProfileDispatcher extends ComDefaultDispatcher
{

    protected function _initialize(KConfig $config)
    {
        $config->append(array(
            'controller' => 'users',
        ));

        parent::_initialize($config);
    }
}