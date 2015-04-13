<?php
/**
 * ComProfile
 *
 * @author      Joep van der Heijden <joep.van.der.heijden@moyoweb.nl>
 * @category    Nooku
 * @package     Profile
 * @uses        Com_cck, com_taxonomy, com_moyo
 */

defined('KOOWA') or die('Protected resource'); ?>

<?= @helper('behavior.mootools'); ?>

<? JHtml::_('formbehavior.chosen', 'select'); ?>

<?= @helper('behavior.keepalive'); ?>
<?= @helper('behavior.validator'); ?>

<script src="media://lib_koowa/js/koowa.js" />

<? /* @TODO move this into a separate JS file */ ?>
<script>
    if(Form && Form.Validator) {
        Form.Validator.add('validate-match', {
            errorMsg: function(element, props){
                return Form.Validator.getMsg('match').substitute({matchName: props.matchName || document.id(props.matchInput).get('name')});
            },
            test: function(element, props){
                var eleVal = element.get('value');
                var matchVal = document.id(props.matchInput) && document.id(props.matchInput).get('value');
                return matchVal ? eleVal == matchVal : true;
            }
        });
    }
</script>

<form action="" class="form-horizontal -koowa-form" method="post">
    <div class="row-fluid">
        <div class="span12">
            <fieldset>
                <legend><?= @text('Group Details'); ?></legend>
                
                <div class="control-group">
                    <label class="control-label"><?= @text('Title'); ?></label>
                    <div class="controls">
                        <input class="required" type="text" name="title" value="<?= $group->title; ?>" placeholder="<?= @text('Title'); ?>" />
                    </div>
                </div>
            </fieldset>

            <fieldset>
                <legend><?= @text('Relations'); ?></legend>
                
                
                
                <div id="fieldset">
                    <div class="control-group">
                        <label class="control-label"><?= @text('Regions'); ?></label>
                        <div class="controls">
                            <?= @helper('com://admin/taxonomy.template.helper.listbox.taxonomies', array(
                                'identifier' => 'com://admin/regions.model.regions',
                                'name' => 'regions[]',
                                'attribs' => array('multiple' => true, 'size' => 10, 'class' => 'select2-listbox'),
                                'selected' => $group->regions ? $group->regions->getColumn('id') : array(),
                                'type' => 'region',
                                'relation' => 'ancestors'
                            )); ?>
                        </div>
                    </div>
                    
                    <div class="control-group">
                        <label class="control-label"><?= @text('Groups'); ?></label>
                        <div class="controls">
                            <?= @helper('com://admin/taxonomy.template.helper.listbox.taxonomies', array(
                                'identifier' => 'com://admin/profile.model.usergroups',
                                'name' => 'groups[]',
                                'attribs' => array('multiple' => true, 'size' => 10, 'class' => 'select2-listbox'),
                                'selected' => $group->groups ? $group->groups->getColumn('id') : array(),
                                'type' => 'profile',
                                'relation' => 'ancestors'
                            )); ?>
                        </div>
                    </div>
                </div>
            </fieldset>
        </div>
    </div>
</form>