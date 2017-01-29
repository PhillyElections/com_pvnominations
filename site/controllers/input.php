<?php
// No direct access
defined('_JEXEC') or die('Restricted access');

/**
 * Input Controller for Pvnominations Component
 *
 * @package    Philadelphia.Votes
 * @subpackage Components
 * @license    GNU/GPL
 */
class PvnominationsControllerInput extends PvnominationsController
{
    public $_msg = array();

    /**
     * Display the edit form
     * @return void
     */
    public function display()
    {
        JRequest::setVar('view', 'input');
        JRequest::setVar('msg', $this->_msg);

        parent::display();
    }

    /**
     * Save a record (and redirect to main page)
     *
     * @return void
     */
    public function save()
    {
        JRequest::checkToken() or jexit('Invalid Token');

        if (!$this->recaptcha()) {
            $this->_setMessage('Please make another attempt at verification.');
            $this->display();

            return;
        }

        $model = $this->getModel('Input');
        $post  = JRequest::get('post');

        if (!$post['confirm']) {
            JRequest::setVar('msg', 'Please confirm that you have read the Nomination Petition instructions.');

            return $this->display();
        }

        $post['user_ip'] = $_SERVER['REMOTE_ADDR'];

        if ($returns=$model->store($post)) {
        } else {
            // let's grab all those errors and make them available to the view
            JRequest::setVar('msg', $model->getErrors());

            return $this->display();
        }

        // let's just load output directly
        JRequest::setVar('view', 'output');

        if (isset($returns['id'])) {
            JRequest::setVar('id', $returns['id']);
            JRequest::setVar('hash', $returns['hash']);
        }

        parent::display();
    }

    /**
     * Set the message on usage of $this->display();.
     *
     * @param string $message message
     * @param bool   $append  append or new?
     */
    public function _setMessage($message, $append = true)
    {
        if (!$append) {
            $this->_msg = array($message);
        } else {
            array_push($this->_msg, $message);
        }
    }

    /**
     * Cancel editing a record
     * @return void
     */
    public function cancel()
    {
        $msg = JText::_('Operation Cancelled');
        $this->setRedirect('index.php?option=com_pvnominations', $msg);
    }

    public function unpublish()
    {
        $model = $this->getModel('input');
        $model->unpublish();
        

            $this->_setMessage('Thank you, that nomination form has rejected.');
            $this->display();
    }

    public function recaptcha()
    {
        jimport('recaptcha.ReCaptcha');

        // your secret key
        $secret = '6LcS4xIUAAAAAPPH4OG3jvUTohAGszwqGUA_EJ5d';

        // empty response
        $response = null;

        // check secret key
        $reCaptcha = new ReCaptcha($secret);

        // if submitted check response
        if ($_POST['g-recaptcha-response']) {
            $response = $reCaptcha->verifyResponse(
                $_SERVER['REMOTE_ADDR'],
                $_POST['g-recaptcha-response']
            );
        }
        if ($response != null && $response->success) {
            return true;
        }

        return false;
    }
}
