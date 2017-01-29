<?php
defined('_JEXEC') or die('Restricted access');

$pagination = &$this->pagination;
$rows = $this->nominations;

?>
<form action="<?=JRoute::_('index.php?option=com_pvnominations');?>" method="post" name="adminForm" id="adminForm">
    <div id="editcell">
        <table class="adminlist">
            <thead>
                <tr>
                    <th width="1px">
                        <?=JText::_('ID');?>
                    </th>
                    <th width="1px">
                        <input type="checkbox" name="toggle" value="" onclick="checkAll(<?=count($rows);?>);" />
                    </th>
                    <th width="1px">
                        P
                    </th>
                    <th width="15%">
                        <?=JText::_('CANDIDATE NAME');?>
                    </th>
                    <th width="20%">
                        <?=JText::_('CANDIDATE OFFICE');?>
                    </th>
                    <th width="15%">
                        <?=JText::_('CANDIDATE ADDRESS');?>
                    </th>
                    <th width="10%">
                        <?=JText::_('CANDIDATE OCCUPATION');?>
                    </th>
                    <th width="10%">
                        <?=JText::_('CANDIDATE PARTY');?>
                    </th>
                    <th width="10%">
                        <?=JText::_('USER_IP');?>
                    </th>
                    <th width="10%">
                        <?=JText::_('CREATED');?>
                    </th>
                    <th width="10%\">
                        <?=JText::_('UPDATED');?>
                    </th>
                </tr>
            </thead>
            <tbody>
            <?php
$k = 0;
for ($i = 0, $n = count($rows); $i < $n; $i++) {
    $row     = &$rows[$i];
    $checked = JHTML::_('grid.id', $i, $row->id);
    $published = JHTML::_('grid.published', $row, $i);
    $link = JRoute::_('index.php?option=com_pvnominations&controller=nomination&task=edit&cid[]='.$row->id);
    ?>
                <tr class="<?="row$k";?>">
                    <td>
                        <?=$row->id;?>
                    </td>
                    <td>
                        <?=$checked;?>
                    </td>
                    <td>
                        <?=$published;?>
                    </td>
                    <td>
                        <a href="<?=$link?>"><?=$row->candidate_name;?></a>
                    </td>
                    <td>
                        <?=$row->office_name;?>
                    </td>
                    <td>
                        <?=$row->candidate_address;?>
                    </td>
                    <td>
                        <?=$row->candidate_occupation;?>
                    </td>
                    <td>
                        <?=$row->candidate_party;?>
                    </td>
                    <td>
                        <?=$row->user_ip;?>
                    </td>
                    <td>
                        <?=$row->created;?>
                    </td>
                    <td>
                        <?=$row->updated;?>
                    </td>
                </tr>
            <?php
$k = 1 - $k;
}
?>
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="11"><?php echo $pagination->getListFooter(); ?></td>
                </tr>
            </tfoot>
        </table>
    </div>
    <?=JHTML::_('form.token');?>
    <input type="hidden" name="task" value="" />
    <input type="hidden" name="boxchecked" value="0" />
    <input type="hidden" name="controller" value="nomination" />
    <?=JHTML::_('form.token');?>
</form>