<?php
// no direct access
defined('_JEXEC') or die('Restricted access');

$params = &JComponentHelper::getParams('com_pvnominations');

//force the token to change (so we can't browse in and duplicate hashes)
$reset=JUtility::getToken(true);

$document = &JFactory::getDocument();

$messages = JRequest::getVar('msg', null, 'post');
if (count($messages)) {
    foreach ($messages as $msg) {
        JError::raiseWarning(1, $msg);
    }
}

$ndisplays = $this->ndisplays;

if (! count($ndisplays)) {
    echo '<p>' . JText::_('NOTHING TO SEE HERE') . '</p>';
} else {
    $row = (object) JRequest::get('post');

    jimport('pvcombo.PVCombo');

    $candidate_parties = array(
        (object) array(
            'idx'=>'', 'value'=>'Select a party'
            ),
        (object) array(
            'idx'=>'Democratic', 'value'=>'Democratic'
            ),
        (object) array(
            'idx'=>'Republican', 'value'=>'Republican'
            )
        );
    $candidate_offices = PVCombo::getsFromObject($ndisplays, 'id', 'office_name');

    array_unshift($candidate_offices, (object) array(
        'idx'=>'', 'value'=>'Select an office.'
        ));

    $document->addCustomTag('<script src="https://www.google.com/recaptcha/api.js" async defer></script>');
    JHtml::_('behavior.formvalidation'); ?>
<p><?=JText::_('INTRODUCTORY TEXT'); ?></p>
<form action="<?=JRoute::_('index.php?option=com_pvnominations'); ?>" method="post" id="josForm" name="josForm" class="form-validate">
    <table cellpadding="0" cellspacing="0" border="0" width="100%" class="contentpane">
        <tr>
            <td width="200" height="30">
                <label id="office_msg" for="display_id">
                    <?=JText::_('CANDIDATE OFFICE'); ?>:
                </label>
            </td>
            <td>
                <?=JHTML::_(
    'select.genericlist',
                    $candidate_offices,
                    'display_id',
                    'required',
                    'idx',
                    'value',
                    ($row->display_id ? $row->display_id : ''),
                    'display_id'
                ); ?>
            </td>
        </tr>
        <tr>
            <td height="40">
                <label id="candidate_name_msg" for="candidate_name"><?=JText::_('CANDIDATE NAME'); ?>:</label>
            </td>
            <td>
                <input type="text" id="candidate_name" name="candidate_name" size="60%" value="<?=$row->candidate_name; ?>" class="inputbox required" maxlength="60" placeholder="<?=JText::_('CANDIDATE NAME PLACEHOLDER'); ?>" />
            </td>
        </tr>
        <tr>
            <td height="40">
                <label id="candidate_address_msg" for="candidate_address"><?=JText::_('CANDIDATE ADDRESS'); ?>:</label>
            </td>
            <td>
                <input type="text" id="candidate_address" name="candidate_address" size="60%" value="<?=$row->candidate_address; ?>" class="inputbox required" maxlength="60" placeholder="<?=JText::_('CANDIDATE ADDRESS PLACEHOLDER'); ?>" />
            </td>
        </tr>
        <tr>
            <td height="40">
                <label id="candidate_occupation_msg" for="candidate_occupation"><?=JText::_('CANDIDATE OCCUPATION'); ?>:</label>
            </td>
            <td>
                <input type="text" id="candidate_occupation" name="candidate_occupation" size="60%" value="<?=$row->candidate_occupation; ?>" class="inputbox required" maxlength="60" placeholder="<?=JText::_('CANDIDATE OCCUPATION PLACEHOLDER'); ?>" />
            </td>
        </tr>
        <tr>
            <td height="40">
                <label id="candidate_party_msg" for="candidate_party"><?=JText::_('CANDIDATE PARTY'); ?>:</label>
            </td>
            <td>
<?php
        if ($ndisplays[0]->election_type === 'primary' || $row->election_type === 'primary') {
            ?>
                <?=JHTML::_(
    'select.genericlist',
                    $candidate_parties,
                    'candidate_party',
                    'required',
                    'idx',
                    'value',
                    ($row->candidate_party ? $row->candidate_party : ''),
                    'candidate_party'
                ); ?>
<?php
        } else {
            ?>
                <input type="text" id="candidate_party" name="candidate_party" size="60%" value="<?=$row->candidate_party; ?>" class="inputbox required" maxlength="60" placeholder="<?=JText::_('CANDIDATE PARTY PLACEHOLDER'); ?>" />
<?php
        } ?>
            </td>
        </tr>
        <tr>
            <td height="40">
                &nbsp;
            </td>
            <td>
                 <?=JHTML::_(
    'select.radiolist',
                    array(
                        (object) array(
                            'idx'=>'yes',
                            'value'=>'I have read and understand the <a href="/components/com_pvnominations/assets/pdf/Instructions_for_Circulating_and_Filing_Nomination_Petitions.pdf" download="Instructions_for_Circulating_and_Filing_Nomination_Petitions.pdf" target="_blank" >instructions</a>.'
                            ),
                        ),
                   'confirm',
                   'required',
                   'idx',
                   'value',
                   'no',
                   'confirm'
                ); ?>

            </td>
        </tr>
<?php
if ($params->get('recaptcha_show')) {
                    ?>
        <tr>
            <td height="40">&nbsp;
            </td>
            <td>
                <div class="g-recaptcha" data-sitekey="<?=$params->get('recaptcha_client'); ?>"></div>
            </td>
        </tr>
<?php
                } ?>
        <tr>
            <td height="40">&nbsp;</td>
            <td>
                <button class="button validate" type="submit"><?=JText::_('CREATE'); ?></button>
                <input type="hidden" name="task" value="save" />
                <input type="hidden" name="view" value="input" />
                <input type="hidden" name="ItemId" value="<?=JRequest::getVar('ItemId', '', 'int'); ?>" />
                <?=JHTML::_('form.token'); ?>
            </td>
        </tr>
    </table>
</form>
<?php
}
?>
