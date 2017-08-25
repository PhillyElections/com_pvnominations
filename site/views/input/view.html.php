<?php

// No direct access
defined('_JEXEC') or die('Restricted access');

/**
 * Item View for Pvnominations Component.
 *
 * @package    Philadelphia.Votes
 * @subpackage Components
 *
 * @license    GNU/GPL
 */
class PvnominationsViewInput extends JView
{
    /**
     * display method of Item view.
     *
     * @param null|mixed $tpl
     *
     * @return void
     **/
    public function display($tpl = null)
    {
        $model = $this->getModel();
        $ndisplays = $this->get('Data');
        $this->assignRef('ndisplays', $ndisplays);

        parent::display($tpl);
    }
}
