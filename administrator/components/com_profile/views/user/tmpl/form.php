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
        <div class="span8">
            <fieldset>
                <legend><?= @text('User Details'); ?></legend>
                <div class="control-group">
                    <label class="control-label"><?= @text('Name'); ?></label>
                    <div class="controls">
                        <input class="required" type="text" name="name" value="<?= $user->name; ?>" placeholder="<?= @text('Name'); ?>" />
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label"><?= @text('Username'); ?></label>
                    <div class="controls">
                        <input class="required minLength:2" type="text" name="username" value="<?= $user->username; ?>" placeholder="<?= @text('Username'); ?>" />
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label"><?= @text('Email'); ?></label>
                    <div class="controls">
                        <input class="required validate-email" type="text" name="email" value="<?= $user->email; ?>" placeholder="<?= @text('Email'); ?>" />
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label"><?= @text('Password'); ?></label>
                    <div class="controls">
                        <input type="password" name="password" value="" placeholder="<?= @text('Password'); ?>" />
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label"><?= @text('Verify Password'); ?></label>
                    <div class="controls">
                        <input class="validate-match matchInput:'password' matchName:'password'" type="password" name="password_verify" value="" placeholder="<?= @text('Verify Password'); ?>" />
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label"><?= @text('Type'); ?></label>
                    <?= @template('com://admin/cck.view.connection.listbox'); ?>
                </div>
            </fieldset>

            <fieldset>
                <legend><?= @text('Fieldset'); ?></legend>
                <div id="fieldset"></div>
            </fieldset>
        </div>
        <div class="span4">
            <fieldset>
                <legend><?= @text('Details'); ?></legend>

            </fieldset>
        </div>
    </div>
</form>