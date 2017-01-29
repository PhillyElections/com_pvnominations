<?php
defined('_JEXEC') or die('Restricted access');

$pagination = &$this->pagination;
$rows      = $this->ndata;

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
                    <th width="20%">
                        <?=JText::_('OFFICE');?>
                    </th>
                    <th >
                        <?=JText::_('DESCRIPTION');?>
                    </th>
                    <th width="10%">
                        <?=JText::_('SIGNATURES');?>
                    </th>
                    <th width="10%">
                        <?=JText::_('FEES');?>
                    </th>
                    <th width="10%">
                        <?=JText::_('CREATED');?>
                    </th>
                    <th width="10%">
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
    $link = JRoute::_('index.php?option=com_pvnominations&controller=ndatum&task=edit&cid[]='.$row->id);
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
                        <a href="<?=$link?>"><?=$row->office_name;?></a>
                    </td>
                    <td>
                        <?=$row->description;?>
                    </td>
                    <td>
                        <?=$row->signatures;?>
                    </td>
                    <td>
                        <?=money_format('%(#10n', $row->fees);?>
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
                    <td colspan="9"><?php echo $pagination->getListFooter(); ?></td>
                </tr>
            </tfoot>
        </table>
    </div>
    <?=JHTML::_('form.token');?>
    <input type="hidden" name="task" value="" />
    <input type="hidden" name="boxchecked" value="0" />
    <input type="hidden" name="controller" value="ndata" />
    <?=JHTML::_('form.token');?>
</form>