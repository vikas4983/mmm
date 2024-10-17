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

        'marital_status' => [
            'type' => 'select',
            'name' => 'marital_status',
            'label' => 'Marital Status',
            'options' => [],
            'rules' => 'required|string',
        ],

    ],
    'horoscopeDetails' => [
     
        'country_of_birth' => [
            'type' => 'select',
            'label' => 'Country of birth',
            'name' => 'country',
            'options' => [],
            'rules' => 'nullable|numeric',
        ],
       
        'time_of_birth' => [
            'type' => 'time',
            'name' => 'time_of_birth',
            'label' => 'Time of Birth',
            'rules' => 'max:255',
        ],
        'rashi' => [
            'type' => 'select',
            'name' => 'rashi',
            'label' => 'Rashi',
            'options' => [],
          'rules' => 'nullable|numeric',
        ],
        'manglik' => [
            'type' => 'radio',
            'label' => 'Manglik',
            'name' => 'manglik',
            'options' => [
                'yes' => 'Yes',
                'no' => 'No',
                "don't know" => "Don't Know"
            ],
            'rules' => 'string',
        ],
       

        'horoscope_match' => [
            'type' => 'radio',
            'name' => 'horoscope_match',
            'label' => 'Horoscope Match',
            'options' => [
                'yes' => 'Yes',
                'no' => 'No',
                "doesn't matter" => "Does't Matter"
            ],
            'rules' => 'string',
        ],
        'horoscope_show' => [
            'type' => 'radio',
            'name' => 'horoscope_show',
            'label' => 'Horoscope Show',
            'options' => [
                'yes' => 'Yes',
                "only accept member" => "Only Accept Member",
                'no' => 'No',

            ],
            'rules' => 'string',
        ],

    ],
     'carrierDetails' => [
     
        'country' => [
            'type' => 'select',
            'label' => 'Country',
            'name' => 'country',
            'options' => [],
            'rules' => 'required|numeric',
        ],
        'education' => [
            'type' => 'select',
            'name' => 'education',
            'label' => 'Highest Degree',
            'options' => [],
         'rules' => 'required|numeric',
        ],
        'employee' => [
            'type' => 'select',
            'name' => 'employee',
            'label' => 'Employed In',
            'options' => [],
           'rules' => 'required|numeric',
        ],
       
        'income' => [
            'type' => 'select',
            'name' => 'income',
            'label' => 'Income',
            'options' => [],
           'rules' => 'required|numeric',
        ],
        'about_me' => [
            'type' => 'textarea',
            'name' => 'about_me',
            'label' => 'About you',
            'options' => [],
            'rules' => 'string',
        ],
    ],
        
        'carrierDetails' => [

            'country' => [
                'type' => 'select',
                'label' => 'Country',
                'name' => 'country',
                'options' => [],
                'rules' => 'required|numeric',
            ],
            'education' => [
                'type' => 'select',
                'name' => 'education',
                'label' => 'Highest Degree',
                'options' => [],
                'rules' => 'required|numeric',
            ],
            'employee' => [
                'type' => 'select',
                'name' => 'employee',
                'label' => 'Employed In',
                'options' => [],
                'rules' => 'required|numeric',
            ],
    
            'income' => [
                'type' => 'select',
                'name' => 'income',
                'label' => 'Income',
                'options' => [],
                'rules' => 'required|numeric',
            ],
            'about_me' => [
                'type' => 'textarea',
                'name' => 'about_me',
                'label' => 'About you',
                'placeholder' => 'Enter about yourself',
                'rules' => 'string',
            ],
        ],
    
    'familyDetails' => [
                'father_occupation' => [
                    'type' => 'select',
                    'label' => 'Father Occupation',
                    'name' => 'father_occupation',
                    'options' => [],
                    'rules' => 'nullable|numeric',
                ],
                'mother_occupation' => [
                    'type' => 'select',
                    'label' => 'Mother Occupation',
                    'name' => 'mother_occupation',
                    'options' => [],
                    'rules' => 'nullable|numeric',
                ],
                'brother' => [
                    'type' => 'select',
                    'name' => 'brother',
                    'label' => 'Brother',
                    'options' => [],
                    'rules' => 'nullable|numeric',
                ],
                'sister' => [
                    'type' => 'select',
                    'name' => 'sister',
                    'label' => 'Sister',
                    'options' => [],
                    'rules' => 'nullable|numeric',
                ],
    
                'family_living' => [
                    'type' => 'select',
                    'name' => 'country',
                    'label' => 'Family Living In',
                    'options' => [],
                    'rules' => 'nullable|numeric',
                ],
                'about_family' => [
                    'type' => 'textarea',
                    'name' => 'about_family',
                    'label' => 'About Family',
                    'placeholder' => 'Describe about your family',
                    'rules' => 'nullable|string',
                ],
    
    
            ],
    
        ];

    
        

        

 