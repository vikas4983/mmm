<?php


return [

    'register' => [

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
            'rules' =>   'required|integer|unique:users,mobile|regex:/^[0-9]{10,12}$/',
        ],
        'profile_for' => [
            'type' => 'select',
            'label' => 'Created By',
            'name' => 'profile_for',
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

    'accountDetails' => [
        'name' => [
            'type' => 'text',
            'name' => 'name',
            'id' => 'userName',
            'label' => 'Full Name',
            'placeholder' => 'Enter Full Name',
            'rules' => 'required|string|regex:/^[\pL\s]+$/u|max:30',
        ],
        'email' => [
            'type' => 'email',
            'name' => 'email',
            'id' => 'userEmail',
            'label' => 'Email',
            'placeholder' => 'Enter Email',
            'rules' => 'required|email|max:30',
        ],
        'mobile' => [
            'type' => 'number',
            'name' => 'mobile',
            'id' => 'userMobile',
            'label' => 'Mobile',
            'placeholder' => 'Enter Mobile',
            'rules' => 'required|email|max:30',
        ],
        'profile_for' => [
            'type' => 'select',
            'label' => 'Profile For',
            'name' => 'profile_for',
            'id' => 'userProfileFor',
            'options' => [],
            'rules' => 'required',
        ],

        'country' => [
            'type' => 'select',
            'label' => 'Country',
            'name' => 'country',
            'id' => 'userCountry',
            'relation' => 'carrierDetails',
            'nestedRelation' => 'countries',
            'options' => [],
            'rules' => 'required|numeric',
        ],
        'state' => [
            'type' => 'select',
            'label' => 'State',
            'name' => 'state',
            'id' => 'userState',
            'relation' => 'carrierDetails',
            'nestedRelation' => 'states',
            'options' => [],
            'rules' => 'required|numeric',
        ],
        'city' => [
            'type' => 'select',
            'label' => 'City',
            'name' => 'city',
            'id' => 'userCity',
            'relation' => 'carrierDetails',
            'nestedRelation' => 'cities',
            'options' => [],
            'rules' => 'required|numeric',
        ],

    ],
    'editAccountDetails' => [
        'name' => [
            'type' => 'text',
            'name' => 'name',
            'id' => 'userName',
            'label' => 'Full Name',
            'placeholder' => 'Enter Full Name',
            'rules' => 'required|string|regex:/^[\pL\s]+$/u|max:30',
        ],
        'user_email' => [
            'type' => 'email',
            'name' => 'user_email',
            'id' => 'userEmail',
            'label' => 'Email',
            'placeholder' => 'Enter Email',
            'rules' => 'required|email|max:30',
        ],

        'profile_for' => [
            'type' => 'select',
            'label' => 'Profile For',
            'name' => 'profile_for',
            'id' => 'userProfileFor',
            'options' => [],
            'rules' => 'required',
        ],

        'user_country' => [
            'type' => 'select',
            'label' => 'Country',
            'name' => 'country',
            'id' => 'userpCountry',
            'relation' => 'carrierDetails',
            'nestedRelation' => 'countries',
            'options' => [],
            'rules' => 'required|numeric',
        ],


    ],


    'login' => [
        'email' => [
            'name' => 'email',
            'type' => 'email',
            'label' => 'Email',
            'placeholder' => 'Enter Email',
            'rules' => 'required|email|unique:users,email|max:50',
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
            'rules' => 'required|date|before:' . now()->subYears(18)->toDateString(),
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
    'editBasicDetails' => [
        // 'dob' => [
        //     'type' => 'date',
        //     'name' => 'dob',
        //     'label' => 'Date of Birth',
        //    'rules' => 'required|date|before:' . now()->subYears(18)->toDateString(),
        // ],
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

        // 'religion' => [
        //     'type' => 'select',
        //     'name' => 'religion',
        //     'label' => 'Religion',
        //     'options' => [],
        //     'rules' => 'required|string',
        // ],

        // 'marital_status' => [
        //     'type' => 'select',
        //     'name' => 'marital_status',
        //     'label' => 'Marital Status',
        //     'options' => [],
        //     'rules' => 'required|string',
        // ],

    ],

    'horoscopeDetails' => [

        'country_of_birth' => [
            'type' => 'select',
            'label' => 'Country',
            'name' => 'country',
            'options' => [],
            'rules' => 'nullable|numeric',
        ],
        'time_of_birth' => [
            'type' => 'time',
            'name' => 'time_of_birth',
            'label' => 'Time of Birth',
            'rules' => 'nullable|string|max:255',
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
                '1' => 'Yes',
                '2' => 'No',
                '0' => "Don't Know"
            ],
            'rules' => 'nullable|string',
            'value' => '1',
        ],


        'horoscope_match' => [
            'type' => 'radio',
            'name' => 'horoscope_match',
            'label' => 'Horoscope Match',
            'options' => [
                '1' => 'Yes',
                '2' => 'No',
                "0" => "Does't Matter"
            ],
            'rules' => 'nullable|string',
            'value' => '1',


        ],
        'horoscope_show' => [
            'type' => 'radio',
            'name' => 'horoscope_show',
            'label' => 'Horoscope Show',
            'options' => [
                '1' => 'Yes',
                "2" => "Only Accept Member",
                '0' => 'No',

            ],
            'rules' => 'nullable|string',
            'value' => '1',
        ],

    ],
    'editHoroscopeDetails' => [

        'date_of_birth' => [
            'type' => 'date',
            'name' => 'date_of_birth',
            'label' => 'DOB',
            'rules' => 'nullable|date|max:255',
        ],
        'time_of_birth' => [
            'type' => 'time',
            'name' => 'time_of_birth',
            'label' => 'Time of Birth',
            'rules' => 'nullable|string|max:255',
        ],
        'country' => [
            'type' => 'select',
            'label' => 'Country of birth',
            'name' => 'country',
            'options' => [],
            'rules' => 'nullable|numeric',
        ],
        'rashi' => [
            'type' => 'select',
            'name' => 'rashi',
            'label' => 'Rashi',
            'options' => [],
            'rules' => 'nullable|numeric',
        ],
        'manglik' => [
            'type' => 'select',
            'label' => 'Manglik',
            'name' => 'manglik',
            'options' => [
                'yes' => 'Yes',
                'no' => 'No',
                "don't know" => "Don't Know"
            ],
            'rules' => 'required|string',
        ],


        'horoscope_match' => [
            'type' => 'select',
            'name' => 'horoscope_match',
            'label' => 'Horoscope Match',
            'options' => [
                'yes' => 'Yes',
                'no' => 'No',
                "doesn't matter" => "Does't Matter"
            ],
            'rules' => 'nullable|string',
        ],
        'horoscope_show' => [
            'type' => 'select',
            'name' => 'horoscope_show',
            'label' => 'Horoscope Show',
            'options' => [
                'yes' => 'Yes',
                "only accept member" => "Only Accept Member",
                'no' => 'No',

            ],
            'rules' => 'nullable|string',
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
    'editCarrierDetails' => [
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
        'occupation' => [
            'type' => 'select',
            'name' => 'occupation',
            'label' => 'Occupation',
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
        'organization_name' => [
            'type' => 'text',
            'name' => 'organization_name',
            'label' => 'Organization Name',
            'placeholder' => 'Enter',
            'rules' => 'nullable|string|max:50',
        ],
        'school_name' => [
            'type' => 'text',
            'name' => 'school_name',
            'label' => 'School Name',
            'placeholder' => 'Enter',
            'rules' => 'nullable|string|max:50',
        ],
        'college_name' => [
            'type' => 'text',
            'name' => 'college_name',
            'label' => 'College Name',
            'placeholder' => 'Enter',
            'rules' => 'nullable|string|max:50',
        ],
        'interested_abroad' => [
            'type' => 'select',
            'name' => 'interested_abroad',
            'label' => 'Sittled Abroad',
            'options' => [],
            'rules' => 'nullable|numeric',
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
            'options' => ['none' => '0', '1' => '1', '2' => '2', '3' => '3+'],
            'rules' => 'nullable|string',
        ],
        'brother_married' => [
            'type' => 'select',
            'name' => 'brother_married',
            'label' => 'Brother Married',
            'options' => ['none' => '0', '1' => '1', '2' => '2', '3' => '3+'],
            'rules' => 'nullable|string',
        ],
        'sister' => [
            'type' => 'select',
            'name' => 'sister',
            'label' => 'Sister',
            'options' => ['none' => '0', '1' => '1', '2' => '2', '3' => '3+'],
            'rules' => 'nullable|string',
        ],
        'sister_married' => [
            'type' => 'select',
            'name' => 'sister_married',
            'label' => 'Sister Married',
            'options' => ['none' => '0', '1' => '1', '2' => '2', '3' => '3+'],
            'rules' => 'nullable|string',
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
    'editUserFamilyDetails' => [

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
            'rules' => 'nullable|string',
        ],
        'brother_married' => [
            'type' => 'select',
            'name' => 'brother_married',
            'label' => 'Brother Married',
            'options' => [],
            'rules' => 'nullable|string',
        ],
        'sister' => [
            'type' => 'select',
            'name' => 'sister',
            'label' => 'Sister',
            'options' => [],
            'rules' => 'nullable|string',
        ],
        'sister_married' => [
            'type' => 'select',
            'name' => 'sister_married',
            'label' => 'Sister Married',
            'options' => [],
            'rules' => 'nullable|string',
        ],
        'family_type' => [
            'type' => 'select',
            'name' => 'family_type',
            'label' => 'Family Type',
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
        'family_value' => [
            'type' => 'select',
            'name' => 'family_value',
            'label' => 'Family Value',
            'options' => [],
            'rules' => 'nullable|numeric',
        ],
        'father_gotra' => [
            'type' => 'text',
            'name' => 'father_gotra',
            'label' => "Father's Gotra",
            'placeholder' => 'Enter',
            'rules' => 'nullable|string|max:50',
        ],
        'mother_gotra' => [
            'type' => 'text',
            'name' => 'mother_gotra',
            'label' => "Mother's Gotra",
            'placeholder' => 'Enter',
            'rules' => 'nullable|string|max:50',
        ],
        'family_living' => [
            'type' => 'select',
            'name' => 'family_living',
            'label' => 'Family Living',
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
    ],

    'lifestyleDetails' => [

        'body_type' => [
            'type' => 'select',
            'name' => 'body_type',
            'label' => 'Body Type',
            'options' => [],
            'rules' => 'required|numeric',
        ],
        'complextion' => [
            'type' => 'select',
            'name' => 'complextion',
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
            'label' => 'Weight In Kg',
            'placeholder' => 'Enter weight in number',
            'rules' => 'nullable|numeric',
        ],

    ],

    'editLifestyleDetails' => [
        'body_type' => [
            'type' => 'select',
            'id' => 'userBodyType',
            'name' => 'body_type',
            'label' => 'Body Type',
            'relation' => 'bodyTypes',
            'options' => [],
            'rules' => 'required|numeric',
        ],
        'complextion' => [
            'type' => 'select',
            'id' => 'userComplextion',
            'name' => 'complextion',
            'label' => 'Complextion',
            'relation' => 'complextions',
            'options' => [],
            'rules' => 'required|numeric',
        ],

        'dietary_habit' => [
            'type' => 'select',
            'id' => 'userDietaryHabit',
            'name' => 'dietary_habit',
            'label' => 'Dietary Habits',
            'relation' => 'dietaryHabits',
            'options' => [],
            'rules' => 'required|numeric',
        ],
        'drinking_habit' => [
            'type' => 'select',
            'id' => 'userDrinkingHabit',
            'name' => 'drinking_habit',
            'label' => 'Drinking Habits',
            'relation' => 'drinkingHabits',
            'options' => [],
            'rules' => 'required|numeric',
        ],
        'smoking_habit' => [
            'type' => 'select',
            'id' => 'userSmokingHabit',
            'name' => 'smoking_habit',
            'label' => 'Smoking Habits',
            'relation' => 'smokingHabits',
            'options' => [],
            'rules' => 'required|numeric',
        ],
        'physical_status' => [
            'type' => 'select',
            'id' => 'userPhysicalStatus',
            'name' => 'physical_status',
            'label' => 'Physical Status',
            'relation' => 'physicalStatus',
            'options' => [],
            'rules' => 'required|numeric',
        ],
        'weight' => [
            'type' => 'text',
            'id' => 'userWeights',
            'name' => 'weight',
            'label' => 'Weight In Kg',
            'placeholder' => 'Enter weight in number',
            'rules' => 'nullable|numeric',
        ],
        'blood_group' => [
            'type' => 'select',
            'id' => 'userBloodGroup',
            'name' => 'blood_group',
            'label' => 'Blood Group ',
            'relation' => 'bloodGroups',
            'options' => [],
            'rules' => 'nullable|numeric',
        ],
        'open_to_pet' => [
            'type' => 'select',
            'id' => 'userOpenToPet',
            'name' => 'open_to_pet',
            'label' => 'Open For Pet ',
            'options' => [],
            'rules' => 'nullable|string',
        ],
        'own_house' => [
            'type' => 'select',
            'id' => 'userOwnHouse',
            'name' => 'own_house',
            'label' => 'Own House ',
            'options' => [],
            'rules' => 'nullable|string',
        ],
        'own_car' => [
            'type' => 'select',
            'id' => 'userOwnCar',
            'name' => 'own_car',
            'label' => 'Own Car',
            'options' => [],
            'rules' => 'nullable|string',
        ],
        'language_speak' => [
            'type' => 'select',
            'id' => 'userLanguageSpeak',
            'name' => 'language_speak',
            'label' => 'Speak Language',
            'relation' => 'speaklanguages',
            'options' => [],
            'rules' => 'nullable|numeric',
        ],
        'hiv' => [
            'type' => 'select',
            'id' => 'userHiv',
            'name' => 'hiv',
            'label' => 'Hiv+',
            'options' => [],
            'rules' => 'nullable|string',
        ],
        'thalassemia' => [
            'type' => 'select',
            'id' => 'userThalassemia',
            'name' => 'thalassemia',
            'label' => 'Thalassemia+',
            'options' => [],
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
            'id' => 'userAlternateMobile',
            'label' => 'Alternate Mobile Number ',
            'placeholder' => 'Enter number',
            'rules' =>  'sometimes|numeric|regex:/^[0-9]{10,12}$/',
        ],

        'alternate_owned_by' => [
            'type' => 'select',
            'name' => 'alternate_owned_by',
            'id' => 'userAlternateOwned',
            'label' => 'Alternate Mobile number owned by ',
            'options' => [],
            'rules' => 'sometimes|string',
        ],

        'landline_number' => [
            'type' => 'text',
            'name' => 'landline_number',
            'id' => 'userLandlineNumber',
            'label' => 'Landline number with code ',
            'placeholder' => 'Enter number',
            'rules' =>  'sometimes|numeric|regex:/^[0-9]{10,12}$/'

        ],
        'landline_owned_by' => [
            'type' => 'select',
            'name' => 'landline_owned_by',
            'id' => 'userLandlineOwned',
            'label' => 'Landline number owned by ',
            'options' => [],
            'rules' => 'sometimes|string',
        ],
        'address' => [
            'type' => 'text',
            'name' => 'address',
            'id' => 'userAddress',
            'label' => 'Address',
            'placeholder' => 'Enter Address',
            'rules' =>  'sometimes|string|'

        ],




    ],
    'editContactDetails' => [
        'alternate_mobile' => [
            'type' => 'text',
            'name' => 'alternate_mobile',
            'id' => 'userAlternateMobile',
            'label' => 'Alternate Mobile Number ',
            'placeholder' => 'Enter number',
            'rules' =>  'nullable|numeric|regex:/^[0-9]{10,12}$/',
        ],

        'alternate_owned_by' => [
            'type' => 'select',
            'name' => 'alternate_owned_by',
            'id' => 'userAlternateOwned',
            'label' => 'Alternate Mobile number owned by ',
            'options' => [],
            'rules' => 'nullable|string',
        ],

        'landline_number' => [
            'type' => 'text',
            'name' => 'landline_number',
            'id' => 'userLandlineNumber',
            'label' => 'Landline number with code ',
            'placeholder' => 'Enter number',
            'rules' =>  'nullable|numeric|regex:/^[0-9]{10,12}$/'

        ],
        'landline_owned_by' => [
            'type' => 'select',
            'name' => 'landline_owned_by',
            'id' => 'userLandlineOwned',
            'label' => 'Landline number owned by ',
            'options' => [],
            'rules' => 'nullable|string',
        ],
        'address' => [
            'type' => 'text',
            'name' => 'address',
            'id' => 'userAddress',
            'label' => 'Address',
            'placeholder' => 'Enter Address',
            'rules' =>  'nullable|string|'

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
