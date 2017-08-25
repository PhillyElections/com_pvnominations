<?php
/**
 * Pvnominations View for Pvnominations Component.
 *
 * @package    Joomla.Tutorials
 * @subpackage Components
 *
 * @link http://docs.joomla.org/Developing_a_Model-View-Controller_Component_-_Part_4
 *
 * @license        GNU/GPL
 */

// No direct access
defined('_JEXEC') or die('Restricted access');

/**
 * Pvnominations View.
 *
 * @package    Joomla.Tutorials
 * @subpackage Components
 */
class PvnominationsViewNominations extends JView
{
    /**
     * Pvnominations view display method.
     *
     * @param mixed $tpl
     *
     * @return void
     **/
    public function display($tpl = 'export')
    {

        // Get data from the model

        $items = &$this->get('Data');

        if (! count($items)) {
            $mainframe = JFactory::getApplication();
            $mainframe->redirect('index.php?option=com_pvnominations', 'You cannot export an empty result set.');
        }

        $this->assignRef('items', $items);

        parent::display($tpl);
    }
}
