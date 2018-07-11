<?php

include_once('vendor/autoload.php');

use RevoSystems\SageAccounting\Auth;
use RevoSystems\SageAccounting\Api;
use RevoSystems\SageAccounting\SObjects\Contact;
use RevoSystems\SageAccounting\SObjects\ContactPerson;
use RevoSystems\SageAccounting\SObjects\SalesInvoice;

use Dotenv\Dotenv;

(new Dotenv(__DIR__, "./.env"))->load();

echo "<pre>";

$sage_config = array(
    'CLIENT_ID' => getenv('SAGE_CLIENT_ID'),
    'CLIENT_SECRET' => getenv('SAGE_CLIENT_SECRET'),
    'COUNTRY' => getenv('SAGE_COUNTRY'),
    'SAGE_RESOURCE_OWNER_ID' => getenv('SAGE_RESOURCE_OWNER_ID'),
    'SAGE_SUBSCRIPTION_ID' => getenv('SAGE_SUBSCRIPTION_ID'),
);

try {
    $auth = new Auth($sage_config['CLIENT_ID'], $sage_config['CLIENT_SECRET']);
}
catch(Exception $ex) {
    echo $ex->getMessage();
    return;
}



$auth = $auth->setAuthKeys([
    "access_token"      => getenv('SAGE_ACCESS_TOKEN'),
    "refresh_token"     => getenv('SAGE_REFRESH_TOKEN'),
], [
    "country"           => $sage_config['SAGE_COUNTRY'],
    "resource_owner_id" => $sage_config['SAGE_RESOURCE_OWNER_ID'],
    "subscription_id"   => $sage_config['SAGE_SUBSCRIPTION_ID'],
]);

$api = new Api($auth, $sage_config['COUNTRY']);


// create_new_contact($api);
create_new_contact_person($api);
// create_new_sales_invoice($api);



function create_new_contact($api) {

    $contactResource = (new Contact($api));

    echo "\n\n\n\n <h2>COUNT CONTACTS: ".$contactResource->count()."</h2>";

    echo "\n\n\n\n <h2>INSERT NEW CONTACT:</h2>";

    $contact_json = json_decode(file_get_contents("./src/Fixtures/contact.json"), true);

    $contact = new Contact($api, $contact_json);

    $result = $contact->create();

    // echo "\n\n\n\n <h2>CREATE RESPONSE:</h2>";

    var_dump($result);

    echo "\n\n\n\n <h2>COUNT CONTACTS: ".$contactResource->count()."</h2>";

    // echo "\n\n\n\n <h2>ALL CONTACTS:</h2>";

    // $res = $contactResource->all();

}


function create_new_contact_person($api) {

    $contactResource = (new ContactPerson($api));

    echo "\n\n\n\n <h2>COUNT CONTACTS: ".$contactResource->count()."</h2>";

    echo "\n\n\n\n <h2>INSERT NEW CONTACT:</h2>";

    $contact_json = json_decode(file_get_contents("./src/Fixtures/contactPerson.json"), true);

    $contact = new ContactPerson($api, $contact_json);

    $result = $contact->create();

    // echo "\n\n\n\n <h2>CREATE RESPONSE:</h2>";

    var_dump($result);

    echo "\n\n\n\n <h2>COUNT CONTACTS: ".$contactResource->count()."</h2>";

    // echo "\n\n\n\n <h2>ALL CONTACTS:</h2>";

    // $res = $contactResource->all();

}




function create_new_sales_invoice($api) {

    $salesInvoiceResource = (new SalesInvoice($api));

    echo "\n\nSales_Invoice count: " . $salesInvoiceResource->count();

    echo "\n\ninsert new Sales_Invoice: ";

    $sales_invoice_json = json_decode(file_get_contents("./src/Fixtures/invoice.json"), true);

    $sales_invoice = new SalesInvoice($api, $sales_invoice_json);

    $result = $sales_invoice->create();

    echo "\n\nSales_Invoice count: " . $salesInvoiceResource->count();

}
