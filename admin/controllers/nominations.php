<?php
// No direct access
defined('_JEXEC') or die('Restricted access');

/**
 * Nominations Controller for Pvnominations Component
 *
 * @package    Philadelphia.Votes
 * @subpackage Components
 * @license    GNU/GPL
 */
class PvnominationsControllerNominations extends PvnominationsController
{
    /**
     * Ndisplay the Nominations View
     * @return void
     */
    public function display()
    {
        JRequest::setVar('view', 'nominations');

        parent::display();
    }

    /**
     * Redirect Edit task to Nomination Controller
     * @return void
     */
    public function edit()
    {
        JRequest::checkToken() or jexit('Invalid Token');

        $mainframe = JFactory::getApplication();
        $cid       = JRequest::getVar('cid');
        $mainframe->redirect('index.php?option=com_pvnominations&controller=nomination&task=edit&cid=' . $cid[0]);
    }

    /**
     * Redirect Add task to Nomination Controller
     * @return void
     */
    public function add()
    {
        JRequest::checkToken() or jexit('Invalid Token');

        $mainframe = JFactory::getApplication();
        $cid       = JRequest::getVar('cid');
        $mainframe->redirect('index.php?option=com_pvnominations&controller=nomination&task=add&&cid=' . $cid[0]);
    }

    public function publish()
    {
        JRequest::checkToken() or jexit('Invalid Token');

        $model = $this->getModel('nominations');
        $model->publish();
        $this->display();
    }

    public function unpublish()
    {
        JRequest::checkToken() or jexit('Invalid Token');

        $model = $this->getModel('nominations');
        $model->unpublish();
        $this->display();
    }
}
