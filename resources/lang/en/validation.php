<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    'accepted'             => 'The :attribute must be accepted.',
    'active_url'           => 'The :attribute is not a valid URL.',
    'after'                => 'The :attribute must be a date after :date.',
    'after_or_equal'       => 'The :attribute must be a date after or equal to :date.',
    'alpha'                => 'The :attribute may only contain letters.',
    'alpha_dash'           => 'The :attribute may only contain letters, numbers, and dashes.',
    'alpha_num'            => 'The :attribute may only contain letters and numbers.',
    'array'                => 'The :attribute must be an array.',
    'before'               => 'The :attribute must be a date before :date.',
    'before_or_equal'      => 'The :attribute must be a date before or equal to :date.',
    'between'              => [
        'numeric' => 'The :attribute must be between :min and :max.',
        'file'    => 'The :attribute must be between :min and :max kilobytes.',
        'string'  => 'The :attribute must be between :min and :max characters.',
        'array'   => 'The :attribute must have between :min and :max items.',
    ],
    'boolean'              => 'The :attribute field must be true or false.',
    'confirmed'            => 'The :attribute confirmation does not match.',
    'date'                 => 'The :attribute is not a valid date.',
    'date_format'          => 'The :attribute does not match the format :format.',
    'different'            => 'The :attribute and :other must be different.',
    'digits'               => 'The :attribute must be :digits digits.',
    'digits_between'       => 'The :attribute must be between :min and :max digits.',
    'dimensions'           => 'The :attribute has invalid image dimensions.',
    'distinct'             => 'The :attribute field has a duplicate value.',
    'email'                => 'The :attribute must be a valid email address.',
    'exists'               => 'The selected :attribute is invalid.',
    'file'                 => 'The :attribute must be a file.',
    'filled'               => 'The :attribute field must have a value.',
    'image'                => 'The :attribute must be an image.',
    'in'                   => 'The selected :attribute is invalid.',
    'in_array'             => 'The :attribute field does not exist in :other.',
    'integer'              => 'The :attribute must be an integer.',
    'ip'                   => 'The :attribute must be a valid IP address.',
    'ipv4'                 => 'The :attribute must be a valid IPv4 address.',
    'ipv6'                 => 'The :attribute must be a valid IPv6 address.',
    'json'                 => 'The :attribute must be a valid JSON string.',
    'max'                  => [
        'numeric' => 'The :attribute may not be greater than :max.',
        'file'    => 'The :attribute may not be greater than :max kilobytes.',
        'string'  => 'The :attribute may not be greater than :max characters.',
        'array'   => 'The :attribute may not have more than :max items.',
    ],
    'mimes'                => 'The :attribute must be a file of type: :values.',
    'mimetypes'            => 'The :attribute must be a file of type: :values.',
    'min'                  => [
        'numeric' => 'The :attribute must be at least :min.',
        'file'    => 'The :attribute must be at least :min kilobytes.',
        'string'  => 'The :attribute must be at least :min characters.',
        'array'   => 'The :attribute must have at least :min items.',
    ],
    'not_in'               => 'The selected :attribute is invalid.',
    'numeric'              => 'The :attribute must be a number.',
    'present'              => 'The :attribute field must be present.',
    'regex'                => 'The :attribute format is invalid.',
    'required'             => 'The :attribute field is required.',
    'required_if'          => 'The :attribute field is required when :other is :value.',
    'required_unless'      => 'The :attribute field is required unless :other is in :values.',
    'required_with'        => 'The :attribute field is required when :values is present.',
    'required_with_all'    => 'The :attribute field is required when :values is present.',
    'required_without'     => 'The :attribute field is required when :values is not present.',
    'required_without_all' => 'The :attribute field is required when none of :values are present.',
    'same'                 => 'The :attribute and :other must match.',
    'size'                 => [
        'numeric' => 'The :attribute must be :size.',
        'file'    => 'The :attribute must be :size kilobytes.',
        'string'  => 'The :attribute must be :size characters.',
        'array'   => 'The :attribute must contain :size items.',
    ],
    'string'               => 'The :attribute must be a string.',
    'timezone'             => 'The :attribute must be a valid zone.',
    'unique'               => 'The :attribute has already been taken.',
    'uploaded'             => 'The :attribute failed to upload.',
    'url'                  => 'The :attribute format is invalid.',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap attribute place-holders
    | with something more reader friendly such as E-Mail Address instead
    | of "email". This simply helps us make messages a little cleaner.
    |
    */

    'attributes' => [

        'backend' => [
            'access' => [
                'permissions' => [
                    'associated_roles' => 'Associated Roles',
                    'dependencies'     => 'Dependencies',
                    'display_name'     => 'Display Name',
                    'group'            => 'Group',
                    'group_sort'       => 'Group Sort',

                    'groups' => [
                        'name' => 'Group Name',
                    ],

                    'name'       => 'Name',
                    'first_name' => 'First Name',
                    'last_name'  => 'Last Name',
                    'system'     => 'System',
                ],

                'roles' => [
                    'associated_permissions' => 'Associated Permissions',
                    'name'                   => 'Name',
                    'sort'                   => 'Sort',
                ],

                'users' => [
                    'active'                  => 'Active',
                    'associated_roles'        => 'Associated Roles',
                    'confirmed'               => 'Confirmed',
                    'email'                   => 'E-mail Address',
                    'name'                    => 'Name',
                    'last_name'               => 'Last Name',
                    'first_name'              => 'First Name',
                    'other_permissions'       => 'Other Permissions',
                    'password'                => 'Password',
                    'password_confirmation'   => 'Password Confirmation',
                    'send_confirmation_email' => 'Send Confirmation E-mail',
                    'department'              => 'Department Name',
                    'dob'                     => 'Date of Birth',
                    'contact_no'              => 'Contact No',
                    'fax_no'                  => 'Fax No',
                    'nric_code'               => 'Nric Code',
                    'gender'                  => 'Gender',
                    'martial_status'          => 'Martial Status',
                    'nationality'             => 'Nationality',
                    'address'                 => 'Address',
                    'position'                => 'Position',
                    'is_meter_owner'          => 'Meter Owner',
                    'is_civil_servant'        => 'Civil Servant',
                ],

                'permission' => [
                    'active'              => 'Active',
                    'name'                => 'Name',
                    'display_name'        => 'Display Name',
                    'description'         => 'Description',
                    'system'              => 'System',
                    'sort'                => 'Sort',
                ],
            ],

            'nric_codes' => [
                    'active'              => 'Active',
                    'nric_code'           => 'Nric Code',
                    'name'                => 'Name',
                    'description'         => 'Description',
            ],

            'nric_township' => [
                'active'                  => 'Active',
                'township'                => 'Nric Township',
                'name'                    => 'Name',
                'nric_code'               => 'Nric Code',
                'short_name'              => 'Short Name',
                'serial_no'               => 'Serial No',
                'description'             => 'Description',
            ],

            'region' => [
                'active'                  => 'Active',
                'region_name'             => 'Region Name',
                'region_code'             => 'Region Code',
                'description'             => 'Description',
                'latitude'                => 'Latitude',
                'longitude'               => 'Longitude',
                'image1'                  => 'Image',
                'image2'                  => 'Image',
            ],

            'district' => [
                'active'                  => 'Active',
                'region_id'               => 'Region',
                'district_name'           => 'District Name',
                'district_code'           => 'District Code',
                'description'             => 'Description',
                'latitude'                => 'Latitude',
                'longitude'               => 'Longitude',
            ],

            'township' => [
                'active'                  => 'Active',
                'township_name'           => 'Township Name',
                'township_code'           => 'Township Code',
                'district'                => 'District Name',
                'description'             => 'Description',
                'latitude'                => 'Latitude',
                'longitude'               => 'Longitude',
            ],

            'village_tract' => [
                'active'                 => 'Active',
                'village_name'           => 'Village Name',
                'village_code'           => 'Village Code',
                'township'               => 'Township Name',
                'description'            => 'Description',
                'latitude'               => 'Latitude',
                'longitude'              => 'Longitude',
            ],

            'community' => [
                'active'                  => 'Active',
                'village'                 => 'Village',
                'community_name'          => 'Community Name',
                'community_code'          => 'Community Code',
                'district'                => 'District Name',
                'description'             => 'Description',
                'latitude'                => 'Latitude',
                'longitude'               => 'Longitude',
            ],
            
            'department' => [
                'region'        => 'Region Name',
                'district'      => 'District Name',
                'township'      => 'Township Name',
                'village'       => 'Village Name',
                'community'     => 'Community Name',
                'department_name' => 'Department Name',
                'department_code' => 'Department Code',
                'description'   => 'Description',
            ],

            'civil_servant' =>  [
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
            ],

            'meter_owner' =>  [
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
            ],

            'meter'     => [
                'nric_township'     => 'Nric Township',
                'meter_no'          => 'Meter No',
                'meter_type'        => 'Meter Type',
                'register_date'     => 'Register Date',
                'owner'             => 'Owner',
                'region'            => 'Region Name',
                'district'          => 'District Name',
                'township'          => 'Township Name',
                'village'           => 'Village Name',
                'community'         => 'Community Name',
                'department_name'   => 'Department Name',
                'department_code'   => 'Department Code',
                'street'            => 'Street',               
                'address'           => 'Address',               
                'status'            => 'Status', 
                 'latitude'         => 'Latitude',
                'longitude'         => 'Longitude', 
                'qrcode'            => 'Qr',
            ],

            'meter_unit'    => [
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
            ],

            'unit_rate' => [
                'active'               => 'Active',
                'meter_type'           => 'Meter Type',
                'unit_price'           => 'Unit Price',
            ],

            'street' => [
                'active'                  => 'Active',
                'community'               => 'Community',
                'street_name'             => 'Street Name',
                'street_code'             => 'Street Code',
                'description'             => 'Description',
                'latitude'                => 'Latitude',
                'longitude'               => 'Longitude',
            ],

            'lamp' => [
                'active'                  => 'Active',
                'street'                  => 'Street',
                'lamp_post_name'          => 'Lamp Post Name',
                'latitude'                => 'Latitude',
                'longitude'               => 'Longitude',
                'qrcode'                  => 'Qr',

            ],

            'transformer' => [
                'active'                  => 'Active',
                'street'                  => 'Street',
                'transformer_name'        => 'Transformer Name',
                'qrcode'                  => 'QR Code/Bar Code',
                'latitude'                => 'Latitude',
                'longitude'               => 'Longitude',
            ],

            'report_type' => [
                'active'               => 'Active',
                'type_name'            => 'Type Name',
                'description'          => 'Description',
            ],

            'report' => [
                'active'                  => 'Active',
                'type_name'               => 'Report Type Name',
                'report_name'             => 'Report Name',
                'latitude'                => 'Latitude',
                'longitude'               => 'Longitude',
                'qrcode'                  => 'Qr',
                'description'             => 'Description',
                'datetime'                => 'Report Date',

            ],

            'notification' => [
                'active'                  => 'Active',
                'name'                    => 'Notification Name',
                'description'             => 'Description',
                'street'                  => 'Street',

            ],
        ],

        'frontend' => [
            'email'                     => 'E-mail Address',
            'first_name'                => 'First Name',
            'last_name'                 => 'Last Name',
            'name'                        => 'Full Name',
            'password'                  => 'Password',
            'password_confirmation'     => 'Password Confirmation',
            'phone' => 'Phone',
            'message' => 'Message',
            'new_password'              => 'New Password',
            'new_password_confirmation' => 'New Password Confirmation',
            'old_password'              => 'Old Password',
        ],
    ],

];
