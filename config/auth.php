<?php

return [

    
    'multi' => [
        'student' => [
            'driver' => 'eloquent',
            'model'  => App\Student::class,
            'table'  => 'students'
        ],
        'consultant' => [
            'driver' => 'eloquent',
            'model'  => App\Consultant::class,
            'table'  => 'consultants'
        ]
     ],

];
