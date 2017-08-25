<?php

// No direct access
defined('_JEXEC') or die('Restricted access');

/**
 * Nominations View for Pvnominations Component.
 *
 * @package    Philadelphia.Votes
 * @subpackage Components
 *
 * @license    GNU/GPL
 */
class PvnominationsViewNdisplays extends JView
{
    /**
     * Pvnominations view display method.
     *
     * @param null|mixed $tpl
     *
     * @return void
     **/
    public function display($tpl = null)
    {
        JToolBarHelper::title(JText::_('Nomination Displays'), 'generic.png');
        JToolBarHelper::deleteList();
        JToolBarHelper::editListX();
        JToolBarHelper::addNewX();
        JToolBarHelper::publish();
        JToolBarHelper::unpublish();

        $ndisplays  = &$this->get('Data');
        $pagination = &$this->get('Pagination');

        $this->assignRef('ndisplays', $ndisplays);
        $this->assignRef('pagination', $pagination);

        parent::display($tpl);
    }
}
