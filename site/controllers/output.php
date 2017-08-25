<?php

// No direct access
defined('_JEXEC') or die('Restricted access');

/**
 * Output Model for Pvnominations Component.
 *
 * @package    Philadelphia.Votes
 * @subpackage Components
 *
 * @license    GNU/GPL
 */
class PvnominationsControllerOutput extends PvnominationsController
{
    /**
     * Display the edit form.
     *
     * @return void
     */
    public function display()
    {
        JRequest::setVar('view', 'output');

        parent::display();
    }
}
