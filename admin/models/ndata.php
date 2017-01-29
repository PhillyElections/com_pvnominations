<?php
// No direct access
defined('_JEXEC') or die('Restricted access');

/**
 * Nomination data Model for Pvnominations Component
 *
 * @package    Philadelphia.Votes
 * @subpackage Components
 * @license    GNU/GPL
 */
class PvnominationsModelNdata extends JModel
{
    /**
     * Nominations data array
     * @var array
     */
    public $_data;

    /**
     * Nominations published rows array
     * @var array
     */
    public $_published;

    /**
     * Nominations total
     * @var integer
     */
    public $_total;

    /**
     * Pagination object
     * @var object
     */
    public $_pagination;

    /**
     * Constructor prepares for pagination
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
     * Build and return the query
     * @return string SQL Query
     */
    public function _buildQuery()
    {
        $where = ' WHERE `o`.`id`=`nd`.`office_id` ';
        $query = ' SELECT `nd`.*, `o`.`name` AS `office_name` FROM `#__pv_nomination_data` AS `nd`, `#__pv_offices` AS `o` ';
        $order = ' ';
        return $query . $where . $order;
    }

    /**
     * Build and return the query
     * @return string SQL Query
     */
    public function _buildPublished()
    {
        $where = ' WHERE `o`.`id`=`nd`.`office_id` AND `nd`.`published`=1  ';
        $query = ' SELECT `nd`.*, `o`.`name` AS `office_name` FROM `#__pv_nomination_data` AS `nd`, `#__pv_offices` AS `o` ';
        $order = ' ';
        return $query . $where . $order;
    }

    /**
     * Retrieve, store, and returns Nominations data
     * @return array Nominations Data
     */
    public function &getData()
    {
        // if data hasn't already been obtained, load it
        if (empty($this->_data)) {
            $query       = $this->_buildQuery();
            $this->_data = $this->_getList($query, $this->getState('limitstart'), $this->getState('limit'));
        }

        return $this->_data;
    }

    /**
     * Get an nomination
     * @return object with data
     */
    public function &getPublished()
    {
        // Load the data
        if (empty($this->_published)) {
            $query = $this->_buildPublished();
            $this->_published = $this->_getList($query, $this->getState('limitstart'), $this->getState('limit'));
        }

        return $this->_published;
    }

    /**
     * Retrieve, store, and return number of Nominations rows
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
     * Retrieve, store and return a current JPagination object of Nominations
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
     * publish data
     *
     * @return void
     */
    public function publish()
    {
        $cid = JRequest::getVar('cid');

        foreach ($cid as $id) {
            $row = JTable::getInstance('Ndatum', 'Table');
            $row->load($id);
            $row->publish($id, 1);
        }
    }

    /**
     * unpublish data
     *
     * @return void
     */
    public function unpublish()
    {
        $cid = JRequest::getVar('cid');

        foreach ($cid as $id) {
            $row = JTable::getInstance('Ndatum', 'Table');
            $row->load($id);
            $row->publish($id, 0);
        }
    }

    /**
     * unpublish data
     *
     * @return void
     */
    public function delete()
    {
        $cid = JRequest::getVar('cid');

        foreach ($cid as $id) {
            $row = JTable::getInstance('Ndatum', 'Table');
            $row->delete($id);
        }
    }
}
