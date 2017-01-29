<?php
// No direct access
defined('_JEXEC') or die('Restricted access');

/**
 * Nomination Model for Pvnominations Component
 *
 * @package    Philadelphia.Votes
 * @subpackage Components
 * @license    GNU/GPL
 */
class PvnominationsModelNomination extends JModel
{
    /**
     * Constructor retrieves the ID from the request.
     */
    public function __construct()
    {
        parent::__construct();

        $array = JRequest::getVar('cid', 0, '', 'array');
        $id = JRequest::getInt('id');
        if ($id) {
            // in case we're updating and check() failed
            $this->setId((int) $id);
        } else {
            $this->setId((int) $array[0]);
        }
    }

    /**
     * Set the active Nomination ID.
     *
     * @param int $id]
     */
    public function setId($id)
    {
        // Set id and wipe data
        $this->_id = $id;
        $this->_data = null;
    }

    /**
     * Get an nomination.
     *
     * @return object with data
     */
    public function &getData()
    {
        // Load the data
        if (empty($this->_data)) {
            $query = ' SELECT 
                        `n`.*, 
                        `nd`.`election_type`,
                        `o`.`name` as `office_name` 
                       FROM 
                          `#__pv_nominations` `n`
                        , `#__pv_nomination_displays` `nd`
                        , `#__pv_nomination_data` `na`
                        , `#__pv_offices` `o`
                       WHERE
                             `n`.`id`=' . $this->_db->quote($this->_id) . ' 
                        AND  `n`.`display_id`=`nd`.`id` 
                        AND  `nd`.`data_id`=`na`.`id` 
                        AND  `na`.`office_id`=`o`.`id`';

            $this->_db->setQuery($query);
            $this->_data = $this->_db->loadObject();
        }
        if (!$this->_data) {
            $this->_data = new stdClass();
            $this->_data->id = 0;
        }

        return $this->_data;
    }

    /**
     * Method to store a record.
     *
     * @return bool
     */
    public function store($data)
    {
        $row = &$this->getTable();
        $dateNow = &JFactory::getDate();
        $dateIndex = $this->_id ? 'updated' : 'created';

        foreach ($data as $key => $value) {
            $data[$key] = JString::trim($value);
        }

        $data[$dateIndex] = $dateNow->toMySQL();

        // Bind the form fields to the Nomination table
        if (!$row->bind($data)) {
            $this->setError($this->_db->getErrorMsg());

            return false;
        }

        // Make sure the Nomination record is valid
        if (!$row->check()) {
            //$this->setError($this->_db->getErrorMsg());
            foreach ($row->getErrors() as $msg) {
                $this->setError($msg);
            }

            return false;
        }

        // Store the web link table to the database
        if (!$row->store()) {
            $this->setError($row->getErrorMsg());

            return false;
        }

        return true;
    }

    /**
     * Delete record(s).
     *
     * @return bool
     */
    public function delete()
    {
        $cids = JRequest::getVar('cid', array(0), 'post', 'array');

        $row = &$this->getTable();

        if (count($cids)) {
            foreach ($cids as $cid) {
                if (!$row->delete($cid)) {
                    $this->setError($row->getErrorMsg());

                    return false;
                }
            }
        }

        return true;
    }
}
