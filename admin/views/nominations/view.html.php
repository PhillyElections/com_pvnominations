<?php
// No direct access
defined('_JEXEC') or die('Restricted access');

/**
 * Nominations View for Pvnominations Component
 *
 * @package    Philadelphia.Votes
 * @subpackage Components
 * @license    GNU/GPL
 */
class PvnominationsViewNominations extends JView
{
    /**
     * Pvnominations view display method
     * @return void
     **/
    public function display($tpl = null)
    {
        JToolBarHelper::title(JText::_('Nominations Manager'), 'generic.png');
        JToolBarHelper::editListX();
        JToolBarHelper::publish();
        JToolBarHelper::unpublish();

        $nominations = &$this->get('Data');
        $pagination  = &$this->get('Pagination');

        $this->assignRef('nominations', $nominations);
        $this->assignRef('pagination', $pagination);

        parent::display($tpl);
    }
}
