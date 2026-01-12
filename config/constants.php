<?php

return [
    'roles' => [
        "admin",
        "user",
        "client",
        "supervisor",
        "employee"
    ],
    'permissions' => [
        "admin" => false,
        "user" => false,
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
