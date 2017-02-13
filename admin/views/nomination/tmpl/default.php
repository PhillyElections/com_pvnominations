<?php
// no direct access
defined('_JEXEC') or die('Restricted access');

if (count(JRequest::getVar('msg', null, 'post'))) {
  foreach (JRequest::getVar('msg', null, 'post') as $msg) {
    JError::raiseWarning(1, $msg);
  }
}
// try to cast to object next
$row = !$this->isNew ? $this->nomination : (object)JRequest::get('post');

?>
<table width="100%">
  <tr>
    <td>
      <form action="<?=JRoute::_('index.php?option=com_pvnominations');?>" method="post" id="adminForm" name="adminForm">
      <table cellpadding="0" cellspacing="0" border="0" class="adminform" width="20%">
        <tbody>
          <tr>
            <td width="200px" height="30px">
              <label>
                <?=JText::_('ID');?>
              </label>
            </td>
            <td>
              <?=$row->id;?>
            </td>
          </tr>
          <tr>
            <td width="200px" height="30px">
              <label>
                Published
              </label>
            </td>
            <td>
              <?=$row->published ? 'Yes': 'No' ;?>
            </td>
          </tr>
          <tr>
            <td width="200px" height="30px">
              <label>
                <?=JText::_('CANDIDATE NAME');?>
              </label>
            </td>
            <td>
              <?=$row->candidate_name;?>
            </td>
          </tr>
          <tr>
            <td width="200px" height="30px">
              <label>
                <?=JText::_('CANDIDATE OFFICE');?>
              </label>
            </td>
            <td>
              <?=$row->office_name;?>
            </td>
          </tr>
          <tr>
            <td width="200px" height="30px">
              <label>
                <?=JText::_('CANDIDATE ADDRESS');?>
              </label>
            </td>
            <td>
              <?=$row->candidate_address;?>
            </td>
          </tr>
          <tr>
            <td width="200px" height="30px">
              <label>
                <?=JText::_('CANDIDATE OCCUPATION');?>
              </label>
            </td>
            <td>
              <?=$row->candidate_occupation;?>
            </td>
          </tr>
          <tr>
            <td width="200px" height="30px">
              <label>
                <?=JText::_('CANDIDATE PARTY');?>
              </label>
            </td>
            <td>
              <?=$row->candidate_party;?>
            </td>
          </tr>
          <tr>
            <td width="200px" height="30px">
              <label>
                <?=JText::_('USER_IP');?>
              </label>
            </td>
            <td>
              <?=$row->user_ip;?>
            </td>
          </tr>
          <tr>
            <td width="200px" height="30px">
              <label>
                <?=JText::_('CREATED');?>
              </label>
            </td>
            <td>
              <?=$row->created;?>
            </td>
          </tr>
          <tr>
            <td width="200px" height="270px">
              &nbsp;
            </td>
            <td>
              <input type="hidden" name="task" value="<?=$this->isNew ? 'save' : 'update';?>" />
              <input type="hidden" name="controller" value="nomination" />
              <input type="hidden" name="id" value="<?=$row->id;?>" />
              <?=JHTML::_('form.token');?>
            </td>
          </tr>
        </tbody>
      </table>
    </form>
    </td>
    <td width="50%">
      <iframe width="100%" height="600px" src="/index.php?option=com_pvnominations&view=output&format=raw&id=<?=$row->id;?>" />
    </td>
    <td width="30%">
      &nbsp;
    </td>
  </tr>
</table>
