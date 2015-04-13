<?php
/**
 * ComProfile
 *
 * @author      Dave Li <dave@moyoweb.nl>
 * @category    Nooku
 * @package     Profile
 * @uses        Com_cck, com_taxonomy
 */

defined('KOOWA') or die('Protected resource'); ?>

<?= @helper('behavior.mootools'); ?>

<script src="media://lib_koowa/js/koowa.js" />
<style src="media://lib_koowa/css/koowa.css" />

<form action="<?= @route(); ?>" class="-koowa-grid" method="get">
    <table class="table table-striped">
        <thead>
        <tr>
            <th width="10"></th>
            <th>
                <?= @helper('grid.sort', array('column' => 'name')) ?>
            </th>
            <th width="8%">
                <?= @helper('grid.sort', array('title' => 'Date', 'column' => 'created_on')) ?>
            </th>
        </tr>
        </thead>
        <tfoot>
        <tr>
            <td colspan="3">
                <?= @helper('paginator.pagination', array('total' => $total)) ?>
            </td>
        </tr>
        </tfoot>
        <tbody>
        <? foreach($groups as $group) : ?>
            <tr>
                <td align="center">
                    <?= @helper('grid.checkbox' , array('row' => $group)) ?>
                </td>
                <td>
                    <a href="<?= @route('view=group&id='.$group->id) ?>">
                        <?= @escape($user->title) ?>
                    </a>
                </td>
                <td>
                    <?= @helper('date.humanize', array('date' => $group->created_on)) ?>
                </td>
            </tr>
        <? endforeach ?>
        </tbody>
    </table>
</form>