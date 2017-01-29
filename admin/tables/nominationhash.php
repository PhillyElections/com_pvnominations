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
class TableNominationhash extends JTable
{
    public $id;
    public $hash;
    public $display_id;
    public $candidate_name;
    public $candidate_address;
    public $candidate_occupation;
    public $candidate_party;
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
        parent::__construct('#__pv_nominations', 'hash', $_db);
    }
}
