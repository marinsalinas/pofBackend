<?php

return array(

    'multi' => array(
        'admin' => array(
            'driver' => 'eloquent',
            'model' => 'Adminusr'
        ),
        'user' => array(
            'driver' => 'database',
            'table' => 'users'
        )
    ),

    'reminder' => array(

        'email' => 'emails.auth.reminder',

        'table' => 'password_reminders',

        'expire' => 60,

    ),

);




