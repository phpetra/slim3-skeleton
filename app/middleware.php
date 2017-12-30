<?php
// Application middleware

$app->add(new \Slim\Middleware\HttpBasicAuthentication([
    "path" => "/admin",
    "realm" => 'Secret site',
    "secure" => false, // turn ON on https!
    "users" => [
        "admin" => '$2y$10$0S7AUOBzEm06gKbvdj1MjuC/ZmDGZ4ugxQIAU9YoNtd/.cZ1GzPXC'
    ]
]));

// Generate hashed passwords on the commandline:
// htpasswd -nbBC 10 admin password
