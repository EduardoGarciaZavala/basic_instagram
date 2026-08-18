<?php

namespace App\Enums;

enum AppMessages: string
{
    // Auth - Success
    case REGISTER_SUCCESS = 'auth.register.success';
    case LOGIN_SUCCESS    = 'auth.login.success';
    case LOGOUT_SUCCESS   = 'auth.logout.success';

        // Auth - Error
    case REGISTER_FAILED  = 'auth.register.failed';
    case LOGIN_FAILED     = 'auth.login.failed';
    case UNAUTHORIZED     = 'auth.unauthorized';

        // General
    case SERVER_ERROR     = 'messages.server_error';
    case NOT_FOUND        = 'messages.not_found';
}
