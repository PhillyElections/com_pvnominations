<?php

// No direct access
defined('_JEXEC') or die('Restricted access');

/**
 * Ndisplays Controller for Pvnominations Component.
 *
 * @package    Philadelphia.Votes
 * @subpackage Components
 *
 * @license    GNU/GPL
 */
class PvnominationsControllerNdisplays extends PvnominationsController
{
    /**
     * Ndisplay the Nominations View.
     *
     * @return void
     */
    public function display()
    {
        JRequest::setVar('view', 'ndisplays');

        parent::display();
    }

    /**
     * Redirect Edit task to Nomination Controller.
     *
     * @return void
     */
    public function edit()
    {
        JRequest::checkToken() or jexit('Invalid Token');

        $mainframe = JFactory::getApplication();
        $cid       = JRequest::getVar('cid');
        $mainframe->redirect('index.php?option=com_pvnominations&controller=ndisplay&task=edit&cid=' . $cid[0]);
    }

    /**
     * Redirect Add task to Nomination Controller.
     *
     * @return void
     */
    public function add()
    {
        JRequest::checkToken() or jexit('Invalid Token');

        $mainframe = JFactory::getApplication();
        $cid       = JRequest::getVar('cid');
        $mainframe->redirect('index.php?option=com_pvnominations&controller=ndisplay&task=add&&cid=' . $cid[0]);
    }

    public function publish()
    {
        JRequest::checkToken() or jexit('Invalid Token');

        $model = $this->getModel('ndisplays');
        $model->publish();
        $this->display();
    }

    public function unpublish()
    {
        JRequest::checkToken() or jexit('Invalid Token');

        $model = $this->getModel('ndisplays');
        $model->unpublish();
        $this->display();
    }
}
