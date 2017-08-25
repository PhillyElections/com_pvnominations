<?php

// No direct access
defined('_JEXEC') or die('Restricted access');

/**
 * Input Controller for Pvnominations Component.
 *
 * @package    Philadelphia.Votes
 * @subpackage Components
 *
 * @license    GNU/GPL
 */
class PvnominationsControllerInstructions extends PvnominationsController
{
    /**
     * Display the edit form.
     *
     * @return void
     */
    public function display()
    {
        JRequest::setVar('view', 'instructions');

        parent::display();
    }
}
