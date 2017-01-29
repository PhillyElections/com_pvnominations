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
class TableNomination extends JTable
{
    public $id;
    public $hash;
    public $display_id;
    public $candidate_name;
    public $candidate_address;
    public $candidate_occupation;
    public $candidate_party;
    public $user_ip;
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
        parent::__construct('#__pv_nominations', 'id', $_db);
    }

    /**
     * Validate before saving
     * @return boolean
     */
    public function check()
    {
        $error = 0;

        // we need a candidate name
        if (!$this->display_id) {
            $this->setError(JText::_('VALIDATION OFFICE REQUIRED'));
            $error++;
        }

        // we need a candidate name
        if (!$this->candidate_name) {
            $this->setError(JText::_('VALIDATION CANDIDATE NAME REQUIRED'));
            $error++;
        }

        // we need a candidate address
        if (!$this->candidate_address) {
            $this->setError(JText::_('VALIDATION CANDIDATE ADDRESS REQUIRED'));
            $error++;
        }

        // we need a candidate occupation
        if (!$this->candidate_occupation) {
            $this->setError(JText::_('VALIDATION CANDIDATE OCCUPATION REQUIRED'));
            $error++;
        }

        // we need a candidate party
        if (!$this->candidate_party) {
            $this->setError(JText::_('VALIDATION CANDIDATE PARTY REQUIRED'));
            $error++;
        }

        if ($error) {
            return false;
        }
        return true;
    }
}
