<?php

namespace RevoSystems\SageAccounting\SObjects;

use RevoSystems\SageAccounting\Validators\Validator;
use RevoSystems\SageAccounting\SObject;

class ContactPerson extends SObject
{
    const RESOURCE_NAME = "contact_persons";

    const ACCOUNTS = 'ACCOUNTS';
    const SALES = 'SALES';
    const PURCHASING = 'PURCHASING';

    protected $fields   = [
        "address_id"                              => ["required" => true, "type" => "string()"            ],    // The address of the contact person
        "name"                                    => ["required" => true, "type" => "string()"            ],    // The name of the contact person
        "contact_person_type_ids"                 => ["required" => true, "type" => "array"               ],    // The IDs of the Contact Person Types.
        "transaction_id"                          => ["required" => false, "type" => "string()"           ],    // The ID of the Transaction
        "transaction_type_id"                     => ["required" => false, "type" => "string()"           ],	// The ID of the Transaction Type
        "deleted_at"                              => ["required" => false, "type" => "string(date-time)"  ],	// The datetime when the item was deleted	string(date-time)
        "job_title"                               => ["required" => false, "type" => "string()"           ],	// The job title of the contact person
        "telephone"                               => ["required" => false, "type" => "string()"           ],	// The telephone number of the contact person
        "mobile"                                  => ["required" => false, "type" => "string()"           ],	// The mobile number of the contact person
        "email"                                   => ["required" => false, "type" => "string()"           ],	// The email address of the contact person
        "fax"                                     => ["required" => false, "type" => "string()"           ],	// The fax number of the contact person
        "is_main_contact"                         => ["required" => false, "type" => "boolean()"          ],	// Indicates whether this is the main contact person
        "is_preferred_contact"                    => ["required" => false, "type" => "boolean()"          ],	// Indicates that this contact person is a preferred contact
    ];
}
