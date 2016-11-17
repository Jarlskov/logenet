<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Session;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * Success message severity.
     *
     * @var string
     */
    const MESSAGE_SEVERITY_SUCCESS = 'success';

    /**
     * Info message severity.
     *
     * @var string
     */
    const MESSAGE_SEVERITY_INFO = 'info';

    /**
     * Warning message severity.
     *
     * @var string
     */
    const MESSAGE_SEVERITY_WARNING = 'warning';

    /**
     * Error message severity.
     *
     * @var string
     */
    const MESSAGE_SEVERITY_ERROR = 'error';

    /**
     * Render template.
     */
    public function render($template, array $data = array())
    {
        $data += array(
            'messages' => array(),
        );

        if (Session::has('messages')) {
            $data['messages'] = Session::pull('messages');
        }

        return view($template, $data);
    }

    /**
     * Add a success message.
     */
    public function addSuccessMessage(string $message, array $data = array())
    {
        $this->addMessage(self::MESSAGE_SEVERITY_SUCCESS, $message, $data);
    }

    /**
     * Add info message.
     */
    public function addInfoMessage(string $message, array $data = array())
    {
        $this->addMessage(self::MESSAGE_SEVERITY_INFO, $message, $data);
    }

    /**
     * Add warning message.
     */
    public function addWarningMessage(string $message, array $data = array())
    {
        $this->addMessage(self::MESSAGE_SEVERITY_WARNING, $message, $data);
    }

    /**
     * Add error message.
     */
    public function addErrorMessage(string $message, array $data = array())
    {
        $this->addMessage(self::MESSAGE_SEVERITY_ERROR, $message, $data);
    }

    /**
     * Add a new status message.
     */
    protected function addMessage($severity, $message, $data = array())
    {
        if (!Session::has('messages')) {
            Session::flash('messages', array());
        }
        $messages = Session::get('messages');
        if (!array_key_exists($severity, $messages)) {
            $messages[$severity] = array();
        }
        if (empty($replacements)) {
            $messages[$severity][] = $message;
        } else {
            $messages[$severity][] = array('message' => $message, 'data' => $replacements);
        }
        Session::flash('messages', $messages);
    }
}
