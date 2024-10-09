<?php


return [

    'register' => [

        // 'image' => [
        //     'type' => 'file',
        //     'name' => 'image',
        //     'label' => 'Profile Image',
        //     'rules' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        // ],
        'name' => [
            'type' => 'text',
            'name' => 'name',
            'label' => 'Full Name',
            'placeholder' => 'Enter Full Name',
            'rules' => 'required|string|regex:/^[\pL\s]+$/u|max:255',
        ],
        'email' => [
            'type' => 'email',
            'name' => 'email',
            'label' => 'Email',
            'placeholder' => 'Enter Email',
            'rules' => 'required|email|unique:users,email|max:255',
        ],
        'password' => [
            'type' => 'password',
            'name' => 'password',
            'label' => 'Password',
            'placeholder' => 'Enter Password',
            'rules' => 'required|min:8|regex:/[a-z]/|regex:/[A-Z]/|regex:/[0-9]/|regex:/[@$!%*?&]/',
        ],
        'password_confirmation' => [
            'type' => 'password',
            'name' => 'password_confirmation',
            'label' => 'Confirm Password',
            'placeholder' => 'Enter confirm password',
            'rules' => 'required|same:password',
        ],
        'mobile' => [
            'type' => 'number',
            'name' => 'mobile',
            'label' => 'Mobile',
            'placeholder' => 'Enter Mobile Number',
            'rules' => 'required|numeric|digits:10',
        ],
        'profileFor' => [
            'type' => 'select',
            'label' => 'Profile For',
            'name' => 'profileFor',
            'options' => [],
            'rules' => 'required',
        ],
        'gender' => [
            'type' => 'select',
            'label' => 'Gender',
            'name' => 'gender',
            'options' => ['male' => 'male', 'female' => 'female'],
            'rules' => 'required',
        ],



    ],

    'login' => [
        'email' => [
            'name' => 'email',
            'type' => 'email',
            'label' => 'Email',
            'placeholder' => 'Enter Email',
            'rules' => 'required|email|unique:users,email|max:255',
        ],
        'password' => [
            'name' => 'password',
            'type' => 'password',
            'label' => 'Password',
            'placeholder' => 'Enter Password',
            'rules' => 'required|min:8|regex:/^[a-zA-Z0-9\s\-\_\@\.\,\!\#\$\%\^\&\*\(\)\_\+\=]*$/',
        ]
    ],

    'basicDetails' => [
        'dob' => [
            'type' => 'date',
            'name' => 'dob',
            'label' => 'Date of Birth',
            'rules' => 'required|date|max:15',
        ],
        'height' => [
            'type' => 'select',
            'label' => 'Height',
            'name' => 'height',
            'options' => [],
            'rules' => 'required|string',
        ],
        'mother_tongue' => [
            'type' => 'select',
            'label' => 'Mother Tongue',
            'name' => 'mother_tongue',
            'options' => [],
            'rules' => 'required|string',
        ],
        'religion' => [
            'type' => 'select',
            'name' => 'religion',
            'label' => 'Religion',
            'options' => [],
            'rules' => 'required|string',
        ],
        // 'caste' => [
        //     'type' => 'select',
        //     'name' => 'caste',
        //     'label' => 'Caste',
        //     'options' => [],
        //     'rules' => 'required|string',
        // ],
        'marital_status' => [
            'type' => 'select',
            'name' => 'marital_status',
            'label' => 'Marital Status',
            'options' => [],
            'rules' => 'required|string',
        ],

    ],
];
