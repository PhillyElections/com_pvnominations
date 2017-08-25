<?php

// No direct access
defined('_JEXEC') or die('Restricted access');

/**
 * Nominations Model for Pvnominations Component.
 *
 * @package    Philadelphia.Votes
 * @subpackage Components
 *
 * @license    GNU/GPL
 */
class PvnominationsModelNominations extends JModel
{
    /**
     * Nominations data array.
     *
     * @var array
     */
    public $_data;

    /**
     * Nominations total.
     *
     * @var integer
     */
    public $_total;

    /**
     * Pagination object.
     *
     * @var object
     */
    public $_pagination;

    /**
     * Constructor prepares for pagination.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();

        $mainframe = JFactory::getApplication();

        // Get pagination request variables
        $limit      = $mainframe->getUserStateFromRequest('global.list.limit', 'limit', $mainframe->getCfg('list_limit'), 'int');
        $limitstart = JRequest::getVar('limitstart', 0, '', 'int');

        // In case limit has been changed, adjust it
        $limitstart = ($limit != 0 ? (floor($limitstart / $limit) * $limit) : 0);

        $this->setState('limit', $limit);
        $this->setState('limitstart', $limitstart);
    }

    /**
     * Build and return the query.
     *
     * @return string SQL Query
     */
    public function _buildQuery()
    {
        $where = ' ';
        $query = ' SELECT 
                        `n`.* 
                       , `nd`.`election_type`
                       , `o`.`name` as `office_name` 
                       FROM 
                          `#__pv_nominations` `n`
                        , `#__pv_nomination_displays` `nd`
                        , `#__pv_nomination_data` `na`
                        , `#__pv_offices` `o`
                       WHERE
                           `n`.`display_id`=`nd`.`id` 
                       AND `nd`.`data_id`=`na`.`id` 
                       AND `na`.`office_id`=`o`.`id` ORDER BY `n`.`id` ';

        return $query . $where;
    }

    /**
     * Retrieve, store, and returns Nominations data.
     *
     * @return array Nominations Data
     */
    public function getData()
    {
        // if data hasn't already been obtained, load it
        if (empty($this->_data)) {
            $query       = $this->_buildQuery();
            $this->_data = $this->_getList($query, $this->getState('limitstart'), $this->getState('limit'));
        }

        return $this->_data;
    }

    /**
     * Retrieve, store, and return number of Nominations rows.
     *
     * @return int number of rows
     */
    public function getTotal()
    {
        // Load the content if it doesn't already exist
        if (empty($this->_total)) {
            $query        = $this->_buildQuery();
            $this->_total = $this->_getListCount($query);
        }

        return $this->_total;
    }

    /**
     * Retrieve, store and return a current JPagination object of Nominations.
     *
     * @return array Array of objects containing the data from the database
     */
    public function getPagination()
    {
        // Load the content if it doesn't already exist
        if (empty($this->_pagination)) {
            jimport('joomla.html.pagination');
            $this->_pagination = new JPagination($this->getTotal(), $this->getState('limitstart'), $this->getState('limit'));
        }

        return $this->_pagination;
    }

    /**
     * publish nominations.
     *
     * @return void
     */
    public function publish()
    {
        $cid = JRequest::getVar('cid');

        foreach ($cid as $id) {
            $row = JTable::getInstance('Nomination', 'Table');
            $row->load($id);
            $row->publish($id, 1);
        }
    }

    /**
     * unpublish nominations.
     *
     * @return void
     */
    public function unpublish()
    {
        $cid = JRequest::getVar('cid');

        foreach ($cid as $id) {
            $row = JTable::getInstance('Nomination', 'Table');
            $row->load($id);
            $row->publish($id, 0);
        }
    }

    /**
     * unpublish nominations.
     *
     * @return void
     */
    public function delete()
    {
        $cid = JRequest::getVar('cid');

        foreach ($cid as $id) {
            $row = JTable::getInstance('Nomination', 'Table');
            $row->delete($id);
        }
    }
}
