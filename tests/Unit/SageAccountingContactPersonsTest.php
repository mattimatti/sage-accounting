<?php

namespace Tests\Unit;

use RevoSystems\SageAccounting\SObjects\ContactPerson;

class SageAccountingContactPersonsTest extends SageAccountingBaseTest
{
    /** @test */
    public function can_create_and_delete_sage_contact_person() {

        $contactResource = (new ContactPerson($this->api));

        $contacts_count  = $contactResource->count();
        $reference = str_random(10);

        $this->object = (new ContactPerson($this->api, [
            "name"                      => "Pippo la pippa",
            "contact_person_type_ids"   => ["ACCOUNTS"],
            "address_id"                => "7eb46d9b7e1411e8a1b806d27594849a",
            "reference"                 => $reference,
        ]))->create();

        $this->assertNotFalse($this->object->id);
        $this->assertEquals("Pippo la pippa", $this->object->name);
        $this->assertEquals($reference, $this->object->reference);
        $this->assertArraySubset(["name" => "Main Address", "country_id" => "ES"], $this->object->main_address);
        $this->assertEquals($contacts_count + 1, $contactResource->count());
    }

    /** @test */
    public function can_update_sage_contact_person() {

    }

    /** @test */
    public function can_get_sage_contacts() {

    }

    /** @test */
    public function can_see_a_sage_contact() {

    }

    /** @test */
    public function can_set_sage_contact_main_person_to_contact() {

    }

    /** @test */
    public function can_change_sage_contact_main_person_to_contact() {

    }

}
