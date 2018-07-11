<?php

namespace RevoSystems\SageAccounting\SObjects;

use RevoSystems\SageAccounting\Validators\Validator;
use RevoSystems\SageAccounting\SObject;

class Contact extends SObject
{
    const RESOURCE_NAME = "addresses";

    protected $fields   = [
        "address_type_id"               => ["required" => true, "type" => "string()"              ],
        "name"                          => ["required" => true, "type" => "string()"              ],
        "is_main_address"               => ["required" => true, "type" => "boolean()"             ],
        "transaction_id"                => ["required" => false, "type" => "string()"             ], // The ID of the Transaction
        "transaction_type_id"           => ["required" => false, "type" => "string()"             ], // The ID of the Transaction Type
        "deleted_at"                    => ["required" => false, "type" => "string(date-time)"    ], // The datetime when the item was deleted
        "bank_account_id"               => ["required" => false, "type" => "string()"             ], // The related bank account of the address
        "contact_id"                    => ["required" => false, "type" => "string()"             ], // The related contact of the address
        "address_line_1"                => ["required" => false, "type" => "string()"             ], // The first line of the address
        "address_line_2"                => ["required" => false, "type" => "string()"             ], // The second line of the address
        "city"                          => ["required" => false, "type" => "string()"             ], // The address town/city
        "region"                        => ["required" => false, "type" => "string()"             ], // The address state/province/region
        "postal_code"                   => ["required" => false, "type" => "string()"             ], // The address postal code/zipcode
        "country_id"                    => ["required" => false, "type" => "string()"             ], // The ID of the Country.
        "country_group_id"              => ["required" => false, "type" => "string()"             ], // The ID of the Country Group.
    ];
}
