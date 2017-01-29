<?php
// no direct access
defined('_JEXEC') or die('Restricted access');

if (count(JRequest::getVar('msg', null, 'post'))) {
    foreach (JRequest::getVar('msg', null, 'post') as $msg) {
        JError::raiseWarning(1, $msg);
    }
}
// try to cast to object next
$row = !$this->isNew ? $this->ndisplay : (object)JRequest::get('post');
$ndata = $this->ndata;
jimport("pvcombo.PVCombo");
$election_types = array((object)array('idx'=>'primary', 'value'=>'primary') , (object)array('idx'=>'general', 'value'=>'general') , (object)array('idx'=>'special', 'value'=>'special'));

?>
<form action="<?=JRoute::_('index.php?option=com_pvnominations');?>" method="post" id="adminForm" name="adminForm" class="form-validate">
    <table cellpadding="0" cellspacing="0" border="0" class="adminform">
        <tbody>
            <tr>
                <td width="200" height="30">
                    <label id="data_id_emsg" for="data_id">
                        <?=JText::_('OFFICE');?>:
                    </label>
                </td>
                <td><?//genericlist($arr, $name, $attribs = null, $key = 'value', $text = 'text', $selected = NULL, $idtag = false, $translate = false)?>
                    <?=JHTML::_('select.genericlist', PVCombo::getsFromObject($ndata, 'id', 'office_name'), 'data_id', '', 'idx', 'value', ($row->data_id ? $row->data_id : ''), 'data_id');?>
                </td>
            </tr>
            <tr>
                <td width="200" height="30">
                    <label id="election_type_msg" for="election_type">
                        <?=JText::_('ELECTION TYPE');?>:
                    </label>
                </td>
                <td>
                    <?=JHTML::_('select.genericlist', $election_types, 'election_type', '', 'idx', 'value', ($row->election_type ? $row->election_type : ''), 'election_type');?>
                </td>
            </tr>
            <tr>
                <td width="200" height="30">
                    <label id="election_date_msg" for="election_date">
                        <?=JText::_('ELECTION DATE');?>
                    </label>
                </td>
                <td>
                    <?=JHTML::_('calendar', $row->election_date, "election_date", "election_date");?>
                </td>
            </tr>
            <tr>
                <td width="200" height="30">
                    <label id="signing_start_msg" for="signing_start">
                        <?=JText::_('SIGNING START');?>
                    </label>
                </td>
                <td>
                    <?=JHTML::_('calendar', $row->signing_start, "signing_start", "signing_start");?>
                </td>
            </tr>
            <tr>
                <td width="200" height="30">
                    <label id="signing_stop_msg" for="signing_stop">
                        <?=JText::_('SIGNING STOP');?>
                    </label>
                </td>
                <td>
                    <?=JHTML::_('calendar', $row->signing_stop, "signing_stop", "signing_stop");?>
                </td>
            </tr>
            <tr>
                <td width="200" height="30">
                    <label id="display_start_msg" for="display_start">
                        <?=JText::_('DISPLAY START');?>
                    </label>
                </td>
                <td>
                    <?=JHTML::_('calendar', $row->display_start, "display_start", "display_start");?>
                </td>
            </tr>
            <tr>
                <td width="200" height="30">
                    <label id="display_stop_msg" for="display_stop">
                        <?=JText::_('DISPLAY STOP');?>
                    </label>
                </td>
                <td>
                    <?=JHTML::_('calendar', $row->display_stop, "display_stop", "display_stop");?>
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
                    <?=JHTML::_('select.booleanlist', 'published', 'class="inputbox"', $row->published);?>
                </td>
            </tr>
            <tr>
                <td height="30">&nbsp;</td>
                <td>
                    <button class="button validate" type="submit"><?=$this->isNew ? JText::_('SUBMIT') : JText::_('UPDATE');?></button>
                    <input type="hidden" name="task" value="<?=$this->isNew ? 'save' : 'update';?>" />
                    <input type="hidden" name="controller" value="ndisplay" />
                    <input type="hidden" name="id" value="<?=$row->id;?>" />
                    <?=JHTML::_('form.token');?>
                </td>
            </tr>
        </tbody>
    </table>
</form>