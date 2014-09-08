<?php
/**
 * ComProfile
 *
 * @author      Dave Li <dave@moyoweb.nl>
 * @category    Nooku
 * @package     Profile
 * @uses        Com_cck, com_taxonomy
 */

echo KService::get('com://admin/profile.dispatcher')->dispatch();