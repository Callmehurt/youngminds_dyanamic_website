<?php

namespace App\Http\Controllers;

use App\Models\Logs\LoginFails;
use App\Models\Logs\LoginLogs;
use Illuminate\Http\Request;

class LogController extends BaseController
{
    /**
     * @var LoginFails
     */
    private $loginFails;
    /**
     * @var LoginLogs
     */
    private $loginLogs;

    public function __construct(LoginFails $loginFails, LoginLogs $loginLogs)
    {
        parent::__construct();
        $this->loginFails = $loginFails;
        $this->loginLogs = $loginLogs;
    }

    public function loginLogs()
    {
        $logins = $this->loginLogs->all();
        return view('backend.logs.login', compact('logins'));
    }

    public function failLogin()
    {
        $failLogins = $this->loginFails->all();
        return view('backend.logs.failLogin', compact('failLogins'));
    }

}
