<?php
// No direct access
defined('_JEXEC') or die('Restricted access');

/**
 * Output Model for Pvnominations Component.
 *
 * @license    GNU/GPL
 */
class PvnominationsModelOutput extends JModel
{
    /**
     * filename of test template.
     *
     * @var int
     */
    public $_id;

    /**
     * filename of test template.
     *
     * @var mixed
     */
    public $_data;

    /**
     * filename of test template.
     *
     * @var string
     */
    public $_template = 'petition-template-30.tpl';

    /**
     * filename of test css.
     *
     * @var string
     */
    public $_css = 'petition-letter-30.css';

    /**
     * array of test values.
     *
     * @var array
     */
    public $_values = array(
        'ASSETS' => array(
            'value' => '&nbsp;',
            'case' => '',
            ),
        'BARCODE' => array(
            'value' => '&nbsp;',
            'case' => '',
            ),
        'CANDIDATE_ADDRESS' => array(
            'value' => '&nbsp;',
            'case' => 'u',
            ),
        'CANDIDATE_NAME' => array(
            'value' => '&nbsp;',
            'case' => 'u',
            ),
        'CANDIDATE_OCCUPATION' => array(
            'value' => '&nbsp;',
            'case' => 'u',
            ),
        'CANDIDATE_OFFICE' => array(
            'value' => '&nbsp;',
            'case' => 'u',
            ),
        'CANDIDATE_PARTY' => array(
            'value' => '&nbsp;',
            'case' => 'u',
            ),
        'ELECTION_DAY' => array(
            'value' => '&nbsp;',
            'case' => '',
            ),
        'ELECTION_MONTH_EN' => array(
            'value' => '&nbsp;',
            'case' => 'u',
            ),
        'ELECTION_MONTH_ES' => array(
            'value' => '&nbsp;',
            'case' => 'u',
            ),
        'ELECTION_TYPE_EN' => array(
            'value' => '&nbsp;',
            'case' => 'u',
            ),
        'ELECTION_TYPE_ES' => array(
            'value' => '&nbsp;',
            'case' => 'u',
            ),
        'ELECTION_YEAR' => array(
            'value' => '&nbsp;',
            'case' => '',
            ),
        'FINISH_DAY' => array(
            'value' => '&nbsp;',
            'case' => '',
            ),
        'FINISH_DAY_SUFFIX' => array(
            'value' => '&nbsp;',
            'case' => '',
            ),
        'FINISH_MONTH_EN' => array(
            'value' => '&nbsp;',
            'case' => '',
            ),
        'FINISH_MONTH_ES' => array(
            'value' => '&nbsp;',
            'case' => '',
            ),
        'FINISH_YEAR' => array(
            'value' => '&nbsp;',
            'case' => '',
            ),
        'REQUIRED_SIGNATURES' => array(
            'value' => '&nbsp;',
            'case' => '',
            ),
        'START_DAY' => array(
            'value' => '&nbsp;',
            'case' => '',
            ),
        'START_DAY_SUFFIX' => array(
            'value' => '&nbsp;',
            'case' => '',
            ),
        'START_MONTH_EN' => array(
            'value' => '&nbsp;',
            'case' => '',
            ),
        'START_MONTH_ES' => array(
            'value' => '&nbsp;',
            'case' => '',
            ),
        );

    /**
     * Constructor retrieves the ID from the request.
     */
    public function __construct()
    {
        parent::__construct();

        // god i hate this.
        $this->_values['ASSETS']['value'] = JPATH_COMPONENT_SITE.'/assets';

        if (JRequest::getVar('test')) {
            $this->_test = true;
            return;
        }

        $array = JRequest::getVar('cid', 0, '', 'array');
        $id = JRequest::getInt('id');
        if ($id) {
            // in case we're updating and check() failed
            $this->setId((int) $id);
        } else {
            $this->setId((int) $array[0]);
        }
    }

    public function translate($value)
    {
        $replacements = array(
            'JANUARY' => 'enero',
            'FEBRUARY' => 'febrero',
            'MARCH' => 'marzo',
            'APRIL' => 'abril',
            'MAY' => 'mayo',
            'JUNE' => 'junio',
            'JULY' => 'julio',
            'AUGUST' => 'agosto',
            'SEPTEMBER' => 'septiembre',
            'OCTOBER' => 'octubre',
            'NOVEMBER' => 'noviembre',
            'DECEMBER' => 'diciembre',
            'SPECIAL' => 'Especial',
            'PRIMARY' => 'Primaria',
            'GENERAL' => 'General',
            );

        return $replacements[strtoupper($value)] ? $replacements[strtoupper($value)] : $value;
    }

    /**
     * Gets the values.
     *
     * @return @mixed The values
     */
    public function getValues()
    {
        if ($this->_test) {
            $finish = JFactory::getDate('2017-03-07');
            $start = JFactory::getDate('2017-02-14');
            $election = JFactory::getDate('2017-05-17');

            $this->_values['BARCODE']['value'] = '00000000';
            $this->_values['ELECTION_DAY']['value'] = date('j', $election->toUnix());
            $this->_values['ELECTION_MONTH_EN']['value'] = date('F', $election->toUnix());
            $this->_values['ELECTION_MONTH_ES']['value'] = $this->translate(date('F', $election->toUnix()));
            $this->_values['ELECTION_TYPE_EN']['value'] = 'primary';
            $this->_values['ELECTION_TYPE_ES']['value'] = $this->translate('primary');
            $this->_values['ELECTION_YEAR']['value'] = date('Y', $election->toUnix());
            $this->_values['FINISH_DAY']['value'] = date('j', $finish->toUnix());
            $this->_values['FINISH_DAY_SUFFIX']['value'] = date('S', $finish->toUnix());
            $this->_values['FINISH_MONTH_EN']['value'] = date('F', $finish->toUnix());
            $this->_values['FINISH_MONTH_ES']['value'] = $this->translate(date('F', $finish->toUnix()));
            $this->_values['FINISH_YEAR']['value'] = date('Y', $finish->toUnix());
            $this->_values['REQUIRED_SIGNATURES']['value'] = 1000;
            $this->_values['START_DAY']['value'] = date('j', $start->toUnix());
            $this->_values['START_DAY_SUFFIX']['value'] = date('S', $start->toUnix());
            $this->_values['START_MONTH_EN']['value'] = date('F', $start->toUnix());
            $this->_values['START_MONTH_ES']['value'] = $this->translate(date('F', $start->toUnix()));
            return $this->_values;
        }

        $data = $this->getData();

// ordinal suffix for day is date("S", $datevalue);
        $finish = JFactory::getDate($data->signing_stop);
        $start = JFactory::getDate($data->signing_start);
        $election = JFactory::getDate($data->election_date);

        $this->_values['BARCODE']['value'] = str_pad($data->id, 8, '0', STR_PAD_LEFT);
        $this->_values['CANDIDATE_ADDRESS']['value'] = $data->candidate_address;
        $this->_values['CANDIDATE_NAME']['value'] = $data->candidate_name;
        $this->_values['CANDIDATE_OCCUPATION']['value'] = $data->candidate_occupation;
        $this->_values['CANDIDATE_OFFICE']['value'] = $data->office_name;
        $this->_values['CANDIDATE_PARTY']['value'] = $data->candidate_party;
        $this->_values['ELECTION_DAY']['value'] = date('j', $election->toUnix());
        $this->_values['ELECTION_MONTH_EN']['value'] = date('F', $election->toUnix());
        $this->_values['ELECTION_MONTH_ES']['value'] = $this->translate(date('F', $election->toUnix()));
        $this->_values['ELECTION_TYPE_EN']['value'] = $data->election_type;
        $this->_values['ELECTION_TYPE_ES']['value'] = $this->translate($data->election_type);
        $this->_values['ELECTION_YEAR']['value'] = date('Y', $election->toUnix());
        $this->_values['FINISH_DAY']['value'] = date('j', $finish->toUnix());
        $this->_values['FINISH_DAY_SUFFIX']['value'] = date('S', $finish->toUnix());
        $this->_values['FINISH_MONTH_EN']['value'] = date('F', $finish->toUnix());
        $this->_values['FINISH_MONTH_ES']['value'] = $this->translate(date('F', $finish->toUnix()));
        $this->_values['FINISH_YEAR']['value'] = date('Y', $finish->toUnix());
        $this->_values['REQUIRED_SIGNATURES']['value'] = $data->signatures;
        $this->_values['START_DAY']['value'] = date('j', $start->toUnix());
        $this->_values['START_DAY_SUFFIX']['value'] = date('S', $start->toUnix());
        $this->_values['START_MONTH_EN']['value'] = date('F', $start->toUnix());
        $this->_values['START_MONTH_ES']['value'] = $this->translate(date('F', $start->toUnix()));

        return $this->_values;
    }

    /**
     * Gets the css.
     *
     * @return @string The css
     */
    public function getCss()
    {
        return file_get_contents(JPATH_COMPONENT_SITE.'/assets/css/'.$this->_css);
    }

    /**
     * Gets the template.
     *
     * @return @string The template
     */
    public function getTemplate()
    {
        return file_get_contents(JPATH_COMPONENT_SITE.'/assets/html/'.$this->_template);
    }

    /**
     * Gets the html.
     *
     * @return @string The html
     */
    public function getHtml()
    {
        $template = $this->getTemplate();
        $values = $this->getValues();
        foreach ($values as $key => $value) {
            if ($value['case'] == 'u') {
                $temp = strtoupper($value['value']);
            } else {
                $temp = $value['value'];
            }
            $template = str_replace('{'.$key.'}', $temp, $template);
        }

        return $template;
    }

    /**
     * Set the Input identifier.
     *
     * @param    int item identifier
     */
    public function setId($id)
    {
        // Set id and wipe data
        $this->_id = $id;
        $this->_data = null;
    }

    public function _buildQuery()
    {
        $query = ' SELECT `n`.*
                    , `o`.`name` AS `office_name`
                    , `na`.`signatures`
                    , `nd`.`signing_start`
                    , `nd`.`signing_stop`
                    , `nd`.`election_date`
                    , `nd`.`election_type`
                   FROM `#__pv_nominations` AS `n`
                    , `#__pv_nomination_displays` AS `nd`
                    , `#__pv_nomination_data` AS `na`
                    , `#__pv_offices` AS `o` ';
        $where = ' WHERE ';
        $where .= ' `n`.`display_id`=`nd`.`id` AND ';
        $where .= ' `nd`.`data_id`=`na`.`id` AND ';
        $where .= ' `na`.`office_id`=`o`.`id` AND ';
        $where .= ' `n`.`id`='.$this->_db->quote($this->_id);

        return $query.$where;
    }

    /**
     * Get an item.
     *
     * @return object with data
     */
    public function &getData()
    {
        // Load the data
        if (empty($this->_data)) {
            $query = $this->_buildQuery();
            $this->_db->setQuery($query);
            $this->_data = $this->_db->loadObject();
        }

        return $this->_data;
    }
}
