<?php
// no direct access
defined('_JEXEC') or die('Restricted access');

if (count(JRequest::getVar('msg', null, 'post'))) {
    foreach (JRequest::getVar('msg', null, 'post') as $msg) {
        JError::raiseWarning(1, $msg);
    }
}

// try to cast to object next
$row = !$this->isNew ? $this->ndatum : (object)JRequest::get('post');
$offices = $this->offices;

jimport("pvcombo.PVCombo");

?>
<form action="<?=JRoute::_('index.php?option=com_pvnominations');?>" method="post" id="adminForm" name="adminForm" class="form-validate">
    <table cellpadding="0" cellspacing="0" border="0" class="adminform">
        <tbody>
            <tr>
                <td width="200" height="30">
                    <label id="officemsg" for="field">
                        <?=JText::_('OFFICE');?>:
                    </label>
                </td>
                <td>
                    <?=JHTML::_('select.genericlist', PVCombo::getsFromObject($offices, 'id', 'name'), 'office_id', '', 'idx', 'value', ($row->office_id ? $row->office_id : ''), 'office_id');?>
                </td>
            </tr>
            <tr>
                <td width="200" height="30">
                    <label id="sigsmsg" for="signatures">
                        <?=JText::_('SIGNATURES');?>:
                    </label>
                </td>
                <td>
                    <input type="text" id="signatures" name="signatures" size="62" value="<?=$row->signatures ? $row->signatures : '';?>" class="input_box required" maxlength="60" placeholder="<?=JText::_('SIGNATURES PLACEHOLDER');?>" />
                </td>
            </tr>
            <tr>
                <td width="200" height="30">
                    <label id="feesmsg" for="fees">
                        <?=JText::_('FEES');?>:
                    </label>
                </td>
                <td>
                    <input type="text" id="fees" name="fees" size="62" value="<?=$row->fees ? $row->fees : '';?>" class="input_box required" maxlength="60" placeholder="<?=JText::_('FEES PLACEHOLDER');?>" />
                </td>
            </tr>
            <tr>
                <td width="200" height="30">
                    <label id="descmsg" for="description">
                        <?=JText::_('DESCRIPTION');?>:
                    </label>
                </td>
                <td>
                    <textarea id="description" name="description" rows="5" cols="62" class="textbox_box" placeholder="<?=JText::_('DESCRIPTION PLACEHOLDER');?>" ><?=$row->description ? $row->description : '';?></textarea>
                </td>
            </tr>
            <tr>
                <td width="200" height="30">
                    <label id="namemsg" for="published">
                        <?=JText::_('PUBLISHED');?>:
                    </label>
                </td>
                <td>
                    <input type="checkbox" id="published" name="published" value="published" <?=$row->published ? "checked" : '' ;?> class="check_box required" />
                </td>
            </tr>
            <tr>
                <td height="30">&nbsp;</td>
                <td>
                    <button class="button validate" type="submit"><?=$this->isNew ? JText::_('SUBMIT') : JText::_('UPDATE');?></button>
                    <input type="hidden" name="task" value="<?=$this->isNew ? 'save' : 'update';?>" />
                    <input type="hidden" name="controller" value="ndatum" />
                    <input type="hidden" name="id" value="<?=$row->id;?>" />
                    <?=JHTML::_('form.token');?>
                </td>
            </tr>
        </tbody>
    </table>
</form>