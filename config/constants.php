<?php

return [
    'roles' => [
        "admin",
        "client",
        "supervisor",
        "employee"
    ],
    'permissions' => [
        "admin" => false,
        "client" => false,
        "supervisor" => false,
        "employee" => false
    ],
    'cleanStates' => [
        "Canceled",
        "Doing",
        "Done",
        "To do"
    ]
];
