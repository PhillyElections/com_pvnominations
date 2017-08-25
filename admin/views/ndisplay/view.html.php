<?php

// No direct access
defined('_JEXEC') or die('Restricted access');

/**
 * Nomination View for Pvnominations Component.
 *
 * @package    Philadelphia.Votes
 * @subpackage Components
 *
 * @license    GNU/GPL
 */
class PvnominationsViewNdisplay extends JView
{
    /**
     * display method of Nomination view.
     *
     * @param null|mixed $tpl
     *
     * @return void
     **/
    public function display($tpl = null)
    {
        $ndisplay = &$this->get('Data');
        $isNew    = ($ndisplay->id < 1);

        $model = $this->getModel('Ndata');
        $ndata = $model->getPublished();

        $text = $isNew ? JText::_('New') : JText::_('Edit');
        JToolBarHelper::title(JText::_('Nomination Display') . ': <small><small>[ ' . $text . ' ]</small></small>');
        if ($isNew) {
            JToolBarHelper::save('save', 'Register');
            JToolBarHelper::cancel('cancel', 'Close');
        } else {
            // for existing nominations the button is renamed `close`
            JToolBarHelper::save('save', 'Update');
            JToolBarHelper::cancel('cancel', 'Close');
        }

        $this->assignRef('ndisplay', $ndisplay);
        $this->assignRef('ndata', $ndata);
        $this->assignRef('isNew', $isNew);

        parent::display($tpl);
    }
}
