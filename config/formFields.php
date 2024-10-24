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
            'rules' => 'required|string|regex:/^[\pL\s]+$/u|max:30',
        ],
        'email' => [
            'type' => 'email',
            'name' => 'email',
            'label' => 'Email',
            'placeholder' => 'Enter Email',
            'rules' => 'required|email|unique:users,email|max:30',
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
            'rules' =>   'required|numeric|regex:/^[0-9]{10,12}$/',
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
            'rules' => 'required|email|unique:users,email|max:30',
        ],
        'password' => [
            'name' => 'password',
            'type' => 'password',
            'label' => 'Password',
            'placeholder' => 'Enter Password',
            'rules' => 'required|min:8|max:16|regex:/^[a-zA-Z0-9\s\-\_\@\.\,\!\#\$\%\^\&\*\(\)\_\+\=]*$/',
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
        'education_detail' => [
            'type' => 'text',
            'name' => 'education_detail',
            'label' => 'Education Detail',
           'placeholder' => 'Enter Education Details',
           'rules' => 'nullable|string|regex:/^[\pL\s]+$/u|max:100',
        ],
        
        'employee' => [
            'type' => 'select',
            'name' => 'employee',
            'label' => 'Employed In',
            'options' => [],
            'rules' => 'required|numeric',
        ],
        'occupation_detail' => [
            'type' => 'text',
            'name' => 'occupation_detail',
            'label' => 'Occupation Detail',
            'placeholder' => 'Enter Occupation Details',
            'rules' => 'nullable|string|regex:/^[\pL\s]+$/u|max:100',
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
            'placeholder' => 'Enter about  you',
            'rules' => 'nullable|string|regex:/^[\pL\s]+$/u|max:300',
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
            'options' => ['none' => 'None', '1' => '1', '2' => '2', '3' => '3+'],
            'rules' => 'nullable|numeric',
        ],
        'brother_married' => [
            'type' => 'select',
            'name' => 'brother_married',
            'label' => 'Brother Married',
            'options' => ['none' => 'None', '1' => '1', '2' => '2', '3' => '3+'],
            'rules' => 'nullable|numeric',
        ],
        'sister' => [
            'type' => 'select',
            'name' => 'sister',
            'label' => 'Sister',
            'options' => ['none' => 'None', '1' => '1', '2' => '2', '3' => '3+'],
            'rules' => 'nullable|numeric',
        ],
        'sister_married' => [
            'type' => 'select',
            'name' => 'sister_married',
            'label' => 'Sister Married',
            'options' => ['none' => 'None', '1' => '1', '2' => '2', '3' => '3+'],
            'rules' => 'nullable|numeric',
        ],
        'family_living' => [
            'type' => 'select',
            'name' => 'country',
            'label' => 'Family Living In',
            'options' => [],
            'rules' => 'nullable|numeric',
        ],
        'contact_address' => [
            'type' => 'text',
            'name' => 'contact_address',
            'label' => 'Contact Address',
            'placeholder' => 'Enter Address',
            'rules' => 'nullable|string|max:50',
        ],
        'about_family' => [
            'type' => 'textarea',
            'name' => 'about_family',
            'label' => 'About Family',
            'placeholder' => 'Describe about your family',
            'rules' => 'nullable|string|regex:/^[\pL\s]+$/u|max:300',
        ],
    ],
    'EditfamilyDetails' => [
        'father_gotra' => [
            'type' => 'text',
            'name' => 'father_gotra',
            'label' => 'Father Gotra',
            'placeholder' => 'Enter Gotra',
            'rules' => 'nullable|string',
        ],
        'mother_gotra' => [
            'type' => 'text',
            'name' => 'mother_gotra',
            'label' => 'Contact Address',
            'placeholder' => 'Enter Gotra',
            'rules' => 'nullable|string',
        ],
        'family_type' => [
            'type' => 'select',
            'name' => 'family_type',
            'label' => 'Family Type',
            'options' => [],
            'rules' => 'nullable|numeric',
        ],
        'family_value' => [
            'type' => 'select',
            'name' => 'family_value',
            'label' => 'Family Value',
            'options' => [],
            'rules' => 'nullable|numeric',
        ],
        'family_status' => [
            'type' => 'select',
            'name' => 'family_status',
            'label' => 'Family Status',
            'options' => [],
            'rules' => 'nullable|numeric',
        ],
        'native_place' => [
            'type' => 'text',
            'name' => 'native_place',
            'label' => 'Family Native Place',
            'placeholder' => 'Enter Native Place',
            'rules' => 'nullable|string|max:30',
        ],
    ],
    'lifestyleDetails' => [

        'body_type' => [
            'type' => 'select',
            'name' => 'body_type',
            'label' => 'Body Type',
            'options' => [],
            'rules' => 'required|numeric',
        ],
        'complexion' => [
            'type' => 'select',
            'name' => 'complexion',
            'label' => 'Complexion',
            'options' => [],
            'rules' => 'required|numeric',
        ],

        'dietary_habit' => [
            'type' => 'select',
            'name' => 'dietary_habit',
            'label' => 'Dietary Habits',
            'options' => [],
            'rules' => 'required|numeric',
        ],
        'smoking_habit' => [
            'type' => 'select',
            'name' => 'smoking_habit',
            'label' => 'Smoking Habits',
            'options' => [],
            'rules' => 'required|numeric',
        ],
        'drinking_habit' => [
            'type' => 'select',
            'name' => 'drinking_habit',
            'label' => 'Drinking Habits',
            'options' => [],
            'rules' => 'required|numeric',
        ],
        'physical_status' => [
            'type' => 'select',
            'name' => 'physical_status',
            'label' => 'Physical Status',
            'options' => [],
            'rules' => 'required|numeric',
        ],
        'blood_group' => [
            'type' => 'select',
            'name' => 'blood_group',
            'label' => 'Blood Group ',
            'options' => [],
            'rules' => 'nullable|numeric',
        ],
        'Weight' => [
            'type' => 'text',
            'name' => 'weight',
            'label' => 'Weight',
            'placeholder' => 'Enter weight in number',
            'rules' => 'nullable|numeric',
        ],

    ],

    'EditlifestyleDetails' => [
        'Weight' => [
            'type' => 'text',
            'name' => 'weight',
            'label' => 'Weight',
            'placeholder' => 'Enter weight in number',
            'rules' => 'nullable|numeric',
        ],
        'open_to_pet' => [
            'type' => 'select',
            'name' => 'open_to_pet',
            'label' => 'Open To Pet ',
            'options' => ['yes' => 'Yes', 'no' => 'No'],
            'rules' => 'nullable|string',
        ],
        'own_house' => [
            'type' => 'select',
            'name' => 'own_house',
            'label' => 'Own House',
            'options' => ['yes' => 'Yes', 'no' => 'No'],
            'rules' => 'nullable|string',
        ],
        'own_car' => [
            'type' => 'select',
            'name' => 'own_car',
            'label' => 'Own Car',
            'options' => ['yes' => 'Yes', 'no' => 'No'],
            'rules' => 'nullable|string',
        ],
        'language_speak' => [
            'type' => 'select',
            'name' => 'language_speak',
            'label' => 'Language Speak  ',
            'options' => [],
            'rules' => 'nullable|string',
        ],
        'hiv' => [
            'type' => 'select',
            'name' => 'hiv',
            'label' => 'Hiv+  ',
            'options' => ['yes' => 'Yes', 'no' => 'No'],
            'rules' => 'nullable|string',
        ],
        'thalassemia' => [
            'type' => 'select',
            'name' => 'thalassemia',
            'label' => 'Thalassemia  ',
            'options' => ['yes' => 'Yes', 'no' => 'No'],
            'rules' => 'nullable|string',
        ],

    ],

    'likeDetails' => [
        'hobby' => [
            'type' => 'select',
            'name' => 'hobby',
            'label' => 'Hobbies ',
            'options' => [],
            'rules' => 'nullable|[]',
        ],
        'interest' => [
            'type' => 'select',
            'name' => 'interest',
            'label' => 'Interests ',
            'options' => [],
            'rules' => 'nullable|[]',
        ],
        'music' => [
            'type' => 'select',
            'name' => 'music',
            'label' => 'Favourite Music ',
            'options' => [],
            'rules' => 'nullable|[]',
        ],
        'dress' => [
            'type' => 'select',
            'name' => 'dress',
            'label' => 'Dress Style ',
            'options' => [],
            'rules' => 'nullable|[]',
        ],
        'movie' => [
            'type' => 'select',
            'name' => 'movie',
            'label' => 'Movies',
            'options' => [],
            'rules' => 'nullable|[]',
        ],
        'sport' => [
            'type' => 'select',
            'name' => 'sport',
            'label' => 'Sports',
            'options' => [],
            'rules' => 'nullable|[]',
        ],


    ],

    'contactDetails' => [
        'alternate_mobile' => [
            'type' => 'text',
            'name' => 'alternate_mobile',
            'label' => 'Alternate Mobile Number ',
            'placeholder' => 'Enter number',
            'rules' =>  'nullable|numeric|regex:/^[0-9]{10,12}$/',
        ],

        'alternate_owned_by' => [
            'type' => 'select',
            'name' => 'alternate_owned_by',
            'label' => 'Alternate Mobile number owned by ',
            'options' => [
                'self' => 'Self',
                'parent' => 'Parent',
                'brother' => 'Brother',
                'sister' => 'Sister',
                'sibling' => 'Sibling',
                'relative' => 'Relative'
            ],
            'rules' => 'nullable|string',
        ],

        'landline_number' => [
            'type' => 'text',
            'name' => 'landline_number',
            'label' => 'Landline number with code ',
            'placeholder' => 'Enter number',
            'rules' =>  'nullable|numeric|regex:/^[0-9]{10,12}$/'

        ],
        'landline_owned_by' => [
            'type' => 'select',
            'name' => 'landline_owned_by',
            'label' => 'Landline number owned by ',
            'options' => [
                'self' => 'Self',
                'parent' => 'Parent',
                'brother' => 'Brother',
                'sister' => 'Sister',
                'sibling' => 'Sibling',
                'relative' => 'Relative'
            ],
            'rules' => 'nullable|string',
        ],




    ],

    'images' => [
        'image' => [
            'type' => 'file',
            'name' => 'display_picture',
            'label' => 'Select Image',
            'rules' => 'required|file|mimes:jpeg,jpg,png|max:2048'
        ]

    ],


];
