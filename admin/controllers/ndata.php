<?php
// No direct access
defined('_JEXEC') or die('Restricted access');

/**
 * Ndata Controller for Pvnominations Component
 *
 * @package    Philadelphia.Votes
 * @subpackage Components
 * @license    GNU/GPL
 */
class PvnominationsControllerNdata extends PvnominationsController
{
    /**
     * the Ndata View
     * @return void
     */
    public function display()
    {
        JRequest::setVar('view', 'ndata');

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
        $mainframe->redirect('index.php?option=com_pvnominations&controller=ndatum&task=edit&cid=' . $cid[0]);
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
        $mainframe->redirect('index.php?option=com_pvnominations&controller=ndatum&task=add&&cid=' . $cid[0]);
    }

    public function publish()
    {
        JRequest::checkToken() or jexit('Invalid Token');

        $model = $this->getModel('ndata');
        $model->publish();
        $this->display();
    }

    public function unpublish()
    {
        JRequest::checkToken() or jexit('Invalid Token');

        $model = $this->getModel('ndata');
        $model->unpublish();
        $this->display();
    }
}
