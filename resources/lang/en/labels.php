<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Labels Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines are used in labels throughout the system.
    | Regardless where it is placed, a label can be listed here so it is easily
    | found in a intuitive way.
    |
    */

    'general' => [
        'all'     => 'All',
        'yes'     => 'Yes',
        'no'      => 'No',
        'custom'  => 'Custom',
        'actions' => 'Actions',
        'active'  => 'Active',
        'buttons' => [
            'save'   => 'Save',
            'update' => 'Update',
        ],
        'hide'              => 'Hide',
        'inactive'          => 'Inactive',
        'none'              => 'None',
        'show'              => 'Show',
        'toggle_navigation' => 'Toggle Navigation',
    ],

    'backend' => [
        'access' => [
            'roles' => [
                'create'     => 'Create Role',
                'edit'       => 'Edit Role',
                'management' => 'Role Management',

                'table' => [
                    'number_of_users' => 'Number of Users',
                    'permissions'     => 'Permissions',
                    'role'            => 'Role',
                    'sort'            => 'Sort',
                    'total'           => 'role total|roles total',
                ],
            ],

            'users' => [
                'active'              => 'Active Users',
                'all_permissions'     => 'All Permissions',
                'change_password'     => 'Change Password',
                'change_password_for' => 'Change Password for :user',
                'create'              => 'Create User',
                'deactivated'         => 'Deactivated Users',
                'deleted'             => 'Deleted Users',
                'edit'                => 'Edit User',
                'management'          => 'User Management',
                'no_permissions'      => 'No Permissions',
                'no_roles'            => 'No Roles to set.',
                'permissions'         => 'Permissions',

                'table' => [
                    'confirmed'      => 'Confirmed',
                    'created'        => 'Created',
                    'email'          => 'E-mail',
                    'id'             => 'ID',
                    'last_updated'   => 'Last Updated',
                    'first_name'     => 'First Name',
                    'last_name'      => 'Last Name',
                    'department'     => 'Department Name',
                    'dob'            => 'Date of Birth',
                    'contact_no'     => 'Contact No',
                    'fax_no'         => 'Fax No',
                    'nric_code'      => 'Nric Code',
                    'gender'         => 'Gender',
                    'martial_status' => 'Martial Status',
                    'nationality'    => 'Nationality',
                    'address'        => 'Address',
                    'position'       => 'Position',
                    'no_deactivated' => 'No Deactivated Users',
                    'no_deleted'     => 'No Deleted Users',
                    'roles'          => 'Roles',
                    'social' => 'Social',
                    'total'          => 'user total|users total',
                ],

                'tabs' => [
                    'titles' => [
                        'overview' => 'Overview',
                        'history'  => 'History',
                    ],

                    'content' => [
                        'overview' => [
                            'avatar'       => 'Avatar',
                            'confirmed'    => 'Confirmed',
                            'created_at'   => 'Created At',
                            'deleted_at'   => 'Deleted At',
                            'email'        => 'E-mail',
                            'last_updated' => 'Last Updated',
                            'name'         => 'Name',
                            'first_name'   => 'First Name',
                            'last_name'    => 'Last Name',
                            'status'       => 'Status',
                            'department'    => 'Department Name',
                            'dob'           => 'Date of Birth',
                            'contact_no'    => 'Contact No',
                            'fax_no'        => 'Fax No',
                            'nric_code'     => 'Nric Code',
                            'gender'        => 'Gender',
                            'martial_status'=> 'Martial Status',
                            'nationality'   => 'Nationality',
                            'address'       => 'Address',
                            'position'      => 'Position',
                            'is_meter_owner'=> 'Meter Owner',
                            'is_civil_servant'=> 'Civil Servant',
                        ],
                    ],
                ],

                'view' => 'View User',
            ],

            'permission' => [
                'create'     => 'Create Permission',
                'edit'       => 'Edit Permission',
                'management' => 'Permission Management',
                'active'    => 'Permission',

                'table' => [
                    'id'              => 'Id',
                    'name'            => 'Name',
                    'display_name'    => 'Display Name',
                    'system'          => 'System',
                    'created'         => 'Created',
                    'last_updated'    => 'Updated',
                ],
            ],
        ],

        'nric_codes' => [
            'create'     => 'Create NRIC Code',
            'edit'       => 'Edit NRIC Code',
            'management' => 'NRIC Code Management',
            'active'    => 'Nric Code',

            'table' => [
                'id'              => 'Id',
                'nric_code'       => 'NRIC Code',
                'description'     => 'Description',
                'created'         => 'Created',
                'last_updated'    => 'Updated',
            ],
        ],

        'nric_township' => [
            'create'     => 'Create NRIC Township',
            'edit'       => 'Edit NRIC Township',
            'management' => 'NRIC Township Management',
            'active'     => 'Nric Township',

            'table' => [
                'id'            => 'Id',
                'township'      => 'NRIC Township',
                'created'       => 'Created',
                'last_updated'  => 'Updated',
                'short_name'    =>  'Short Name',
                'serial_no'     =>  'Serial No',
            ],
        ],

        'region' => [
            'create'     => 'Create Region',
            'edit'       => 'Edit Region',
            'management' => 'Region Management',
            'active'     => 'Region',

            'table' => [
                'id'            => 'Id',
                'region_name'   => 'Region Name',
                'region_code'   => 'Region Code',
                'description'   => 'Description',
                'created'       => 'Created',
                'last_updated'  => 'Updated',
            ],
        ],

        'district' => [
            'create'     => 'Create District',
            'edit'       => 'Edit District',
            'management' => 'District Management',
            'active'     => 'District',

            'table' => [
                'id'            => 'Id',
                'district_name' => 'District Name',
                'district_code' => 'District Code',
                'description'   => 'Description',
                'created'       => 'Created',
                'last_updated'  => 'Updated',
            ],
        ],

        'township' => [
            'create'     => 'Create Township',
            'edit'       => 'Edit Township',
            'management' => 'Township Management',
            'active'     => 'Township',

            'table' => [
                'id'            => 'Id',
                'district'      => 'District Name',
                'township_name' => 'Township Name',
                'township_code' => 'Township Code',
                'description'   => 'Description',
                'created'       => 'Created',
                'last_updated'  => 'Updated',
            ],
        ],

        'village_tract' => [
            'create'     => 'Create VillageTract',
            'edit'       => 'Edit VillageTract',
            'management' => 'VillageTract Management',
            'active'     => 'VillageTract',

            'table' => [
                'id'            => 'Id',
                'township'      => 'Township Name',
                'village_tract_name' => 'VillageTract Name',
                'village_tract_code' => 'VillageTract Code',
                'description'   => 'Description',
                'created'       => 'Created',
                'last_updated'  => 'Updated',
            ],
        ],

        'community' => [
            'create'     => 'Create Community',
            'edit'       => 'Edit Community',
            'management' => 'Community Management',
            'active'     => 'Community',

            'table' => [
                'id'            => 'Id',
                'village'       => 'Village Name',
                'community_name' => 'Community Name',
                'community_code' => 'Community Code',
                'description'   => 'Description',
                'created'       => 'Created',
                'last_updated'  => 'Updated',
            ],
        ],

        'department' => [
            'create'     => 'Create Department',
            'edit'       => 'Edit Department',
            'management' => 'Department Management',
            'active'     => 'Department',

            'table' => [
                'id'            => 'Id',
                'region'        => 'Region Name',
                'district'      => 'District Name',
                'township'      => 'Township Name',
                'village'       => 'Village Name',
                'community'     => 'Community Name',
                'department_name' => 'Department Name',
                'department_code' => 'Department Code',
                'description'   => 'Description',
                'created'       => 'Created',
                'last_updated'  => 'Updated',
            ],
        ],

        'civil_servant' => [
            'create'     => 'Create Civil Servant',
            'edit'       => 'Edit Civil Servant',
            'management' => 'Civil Servant Management',
            'active'     => 'Civil Servant',

            'table' => [
                'id'                => 'Id',
                'department'        => 'Department Name',
                'name'              => 'Name',
                'email'             => 'Email',
                'password'          => 'Password',
                'dob'               => 'Date of Birth',
                'contact_no'        => 'Contact No',
                'fax_no'            => 'Fax No',
                'nric_code'         => 'Nric Code',
                'gender'            => 'Gender',
                'martial_status'    => 'Martial Status',
                'nationality'       => 'Nationality',
                'address'           => 'Address',
                'position'          => 'Position',
                'created'           => 'Created',
                'last_updated'      => 'Updated',
            ],
        ],

        'meter_owner' => [
            'create'     => 'Create Meter Owner',
            'edit'       => 'Edit Meter Owner',
            'management' => 'Meter Owner Management',
            'active'     => 'Meter Owner',

            'table' => [
                'id'                => 'Id',
                'nric_township'     => 'Nric Township',
                'name'              => 'Name',
                'email'             => 'Email',
                'password'          => 'Password',
                'dob'               => 'Date of Birth',
                'contact_no'        => 'Contact No',
                'fax_no'            => 'Fax No',
                'nric_code'         => 'Nric Code',
                'gender'            => 'Gender',
                'martial_status'    => 'Martial Status',
                'nationality'       => 'Nationality',
                'address'           => 'Address',
                'position'          => 'Position',
                'created'           => 'Created',
                'last_updated'      => 'Updated',
            ],
        ],

        'meter' => [
            'create'     => 'Create Meter',
            'edit'       => 'Edit Meter',
            'management' => 'Meter Management',
            'active'     => 'Meter',

            'table' => [
                'id'                => 'Id',
                'nric_township'     => 'Nric Township',
                'meter_no'          => 'Meter No',
                'owner'             => 'Owner',
                'register_date'     => 'Register Date',
                'region'            => 'Region Name',
                'district'          => 'District Name',
                'township'          => 'Township Name',
                'village'           => 'Village Name',
                'community'         => 'Community Name',
                'department_name'   => 'Department Name',
                'department_code'   => 'Department Code',
                'description'       => 'Description',               
                'created'           => 'Created',
                'last_updated'      => 'Updated',
            ],
        ],

        'meter_unit' => [
            'create'     => 'Create Monthly Meter Unit',
            'edit'       => 'Edit Monthly Meter Unit',
            'management' => 'Monthly Meter Unit Management',
            'active'     => 'Monthly Meter Unit',

            'table' => [
                'id'                => 'Id',
                'meter'             => 'Meter',
                'read_date'         => 'Read Date',
                'prev_unit'         => 'Prev Unit',
                'unit'              => 'Unit',
                'reading_unit'      => 'Reading Unit',
                'usage_unit'        => 'Usage Unit',
                'total_amount'      => 'Total Amount',
                'payable_amount'    => 'Payable Amount',
                'received_amount'   => 'Received Amount',
                'penalty_amount'    => 'Penalty Amount',
                'tax_amount'        => 'Tax Amount',
                'tax_percentage'    => 'Tax Percentage',
                'service_percentage'=> 'Service Percentage',
                'service_amount'    => 'Service Amount',
                'remarks'           => 'Remarks',
                'created'           => 'Created',
                'last_updated'      => 'Updated',
            ],
        ],

        'unit_rate' => [
            'create'     => 'Create Meter Unit Rate',
            'edit'       => 'Edit Meter Unit Rate',
            'management' => 'Meter Unit Rate Management',
            'active'     => 'Meter Unit Rate',

            'table' => [
                'id'                => 'Id',
                'meter_type'        => 'Meter Type',
                'unit_price'        => 'Unit Price',
                'prev_unit'         => 'Prev Unit',
                'unit'              => 'Unit',
                'reading_unit'      => 'Reading Unit',
                'usage_unit'        => 'Usage Unit',
                'total_amount'      => 'Total Amount',
                'payable_amount'    => 'Payable Amount',
                'received_amount'   => 'Received Amount',
                'penalty_amount'    => 'Penalty Amount',
                'tax_amount'        => 'Tax Amount',
                'tax_percentage'    => 'Tax Percentage',
                'service_percentage'=> 'Service Percentage',
                'service_amount'    => 'Service Amount',
                'remarks'           => 'Remarks',
                'created'           => 'Created',
                'last_updated'      => 'Updated',
            ],
        ],

        'street' => [
            'create'     => 'Create Street',
            'edit'       => 'Edit Street',
            'management' => 'Street Management',
            'active'     => 'Street',

            'table' => [
                'id'            => 'Id',
                'community'     => 'Community Name',
                'street_name'   => 'Street Name',
                'street_code'   => 'Street Code',
                'description'   => 'Description',
                'created'       => 'Created',
                'last_updated'  => 'Updated',
            ],
        ],

         'lamp' => [
            'create'     => 'Create Lamp Post',
            'edit'       => 'Edit Lamp Post',
            'management' => 'Lamp Post Management',
            'active'     => 'Lamp Post',

            'table' => [
                'id'            => 'Id',
                'street'        => 'Street Name',
                'lamp_post_name'=> 'Lamp Post Name',
                'latitude'      => 'Latitude',
                'longitude'     => 'Longitude',
                'created'       => 'Created',
                'last_updated'  => 'Updated',
            ],
        ],
    ],

    'frontend' => [

        'auth' => [
            'login_box_title'    => 'Login',
            'login_button'       => 'Login',
            'login_with'         => 'Login with :social_media',
            'register_box_title' => 'Register',
            'register_button'    => 'Register',
            'remember_me'        => 'Remember Me',
        ],

        'contact' => [
            'box_title' => 'Contact Us',
            'button' => 'Send Information',
        ],

        'passwords' => [
            'forgot_password'                 => 'Forgot Your Password?',
            'reset_password_box_title'        => 'Reset Password',
            'reset_password_button'           => 'Reset Password',
            'send_password_reset_link_button' => 'Send Password Reset Link',
        ],

        'macros' => [
            'country' => [
                'alpha'   => 'Country Alpha Codes',
                'alpha2'  => 'Country Alpha 2 Codes',
                'alpha3'  => 'Country Alpha 3 Codes',
                'numeric' => 'Country Numeric Codes',
            ],

            'macro_examples' => 'Macro Examples',

            'state' => [
                'mexico' => 'Mexico State List',
                'us'     => [
                    'us'       => 'US States',
                    'outlying' => 'US Outlying Territories',
                    'armed'    => 'US Armed Forces',
                ],
            ],

            'territories' => [
                'canada' => 'Canada Province & Territories List',
            ],

            'timezone' => 'Timezone',
        ],

        'user' => [
            'passwords' => [
                'change' => 'Change Password',
            ],

            'profile' => [
                'avatar'             => 'Avatar',
                'created_at'         => 'Created At',
                'edit_information'   => 'Edit Information',
                'email'              => 'E-mail',
                'last_updated'       => 'Last Updated',
                'name'               => 'Name',
                'first_name'         => 'First Name',
                'last_name'          => 'Last Name',
                'update_information' => 'Update Information',
            ],
        ],

    ],
];
