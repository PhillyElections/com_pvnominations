<?php
// No direct access
defined('_JEXEC') or die('Restricted access');

/**
 * Item View for Pvnominations Component
 *
 * @package    Philadelphia.Votes
 * @subpackage Components
 * @license    GNU/GPL
 */
class PvnominationsViewOutput extends JView
{
    /**
     * display method of Item view
     * @return void
     **/
    public function display($tpl = 'raw')
    {

        $html = &$this->get('Html');
        $css = &$this->get('Css');

        $this->assignRef('html', $html);
        $this->assignRef('css', $css);

        parent::display($tpl);
    }
}
