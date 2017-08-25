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
class PvnominationsViewNdata extends JView
{
    /**
     * Ndata view display method.
     *
     * @param null|mixed $tpl
     *
     * @return void
     **/
    public function display($tpl = null)
    {
        JToolBarHelper::title(JText::_('Nomination Data'), 'generic.png');
        JToolBarHelper::deleteList();
        JToolBarHelper::editListX();
        JToolBarHelper::addNewX();
        JToolBarHelper::publish();
        JToolBarHelper::unpublish();

        $ndata      = &$this->get('Data');
        $pagination = &$this->get('Pagination');

        $this->assignRef('ndata', $ndata);
        $this->assignRef('pagination', $pagination);

        parent::display($tpl);
    }
}
