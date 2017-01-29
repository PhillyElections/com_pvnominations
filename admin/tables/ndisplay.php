<?php
// No direct access
defined('_JEXEC') or die('Restricted access');

/**
 * Nomination Table for Pvnominations Component
 *
 * @package    Philadelphia.Votes
 * @subpackage Components
 * @license    GNU/GPL
 */
class TableNdisplay extends JTable
{
    public $id;
    public $data_id;
    public $signing_start;
    public $signing_stop;
    public $display_start;
    public $display_stop;
    public $election_type;
    public $election_date;
    public $description;
    public $published;
    public $checked_out;
    public $checked_out_time;
    public $created;
    public $updated;

    /**
     * Define our table, index 
     * @param [type] &$_db [description]
     */
    public function __construct(&$_db)
    {
        parent::__construct('#__pv_nomination_displays', 'id', $_db);
    }

    /**
     * Validate before saving
     * @return boolean
     */
    public function check()
    {
        $error = 0;

        // We need a complete signing date range
        if (!$this->signing_start || !$this->signing_stop) {
            $this->setError(JText::_('We need a complete signing date range.'));
            $error++;
        }

        // We need a complete display date range
        if (!$this->display_start || !$this->display_stop) {
            $this->setError(JText::_('We need a complete display date range.'));
            $error++;
        }

        // gotta have a data_id
        if (!is_numeric($this->data_id)) {
            $this->setError(JText::_('Please select a nomination data row to bind to.'));
            $error++;
        }

        if ($error) {
            return false;
        }
        return true;
    }
}
