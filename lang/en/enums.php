<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Enums Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines are used by the enums classes translations.
    |
    */

    'EmployeeType' => [
        \App\Enums\EmployeeType::ADMIN->value => 'Admin',
        \App\Enums\EmployeeType::EMPLOYEE->value => 'Employee',
    ],

    'RoomType' => [
        \App\Enums\RoomType::SINGLE->value => 'Single',
        \App\Enums\RoomType::DOUBLE->value => 'Double',
        \App\Enums\RoomType::SUITE->value => 'Suite',
    ],

    'RoomStatus' => [
        \App\Enums\RoomStatus::AVAILABLE->value => 'Available',
        \App\Enums\RoomStatus::BOOKED->value => 'Booked',
        \App\Enums\RoomStatus::PENDING->value => 'Pending',
    ],

    'BookingStatus' => [
        \App\Enums\BookingStatus::PENDING->value => 'Pending',
        \App\Enums\BookingStatus::APPROVED->value => 'Approved',
        \App\Enums\BookingStatus::REJECTED->value => 'Rejected',
    ],
];
