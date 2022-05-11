<?php

namespace App\Controllers;

use App\Models\Contact;
use App\Helpers\DatabaseActions;
use App\Helpers\View;

class ContactController
{
    public function index()
    {
        $orderBy = 'last_name';
        if (array_key_exists('orderBy', $_REQUEST)) {
            $orderBy = $_REQUEST['orderBy'];
        }

        $contacts = DatabaseActions::getContacts($orderBy);

        View::show('contacts.index', [
            'contacts' => $contacts,
        ]);
    }

    public function show($id)
    {
        $contact = DatabaseActions::getContact($id);
        View::show('contacts.show', [
            'contact' => $contact,
        ]);
    }

    public function create()
    {
        $contact = new Contact(
            lastName: $_REQUEST['lastName'],
            firstName: $_REQUEST['firstName'],
            street: $_REQUEST['street'],
            zip: $_REQUEST['zip'],
            city: $_REQUEST['city'],
            phoneNumber: $_REQUEST['phoneNumber'],
        );
        DatabaseActions::createContact($contact);

        header("Location: /");
    }

    public function update($id)
    {
        $contact = DatabaseActions::getContact($id);
        $contact->lastName = $_REQUEST['lastName'];
        $contact->firstName = $_REQUEST['firstName'];
        $contact->street = $_REQUEST['street'];
        $contact->zip = $_REQUEST['zip'];
        $contact->city = $_REQUEST['city'];
        $contact->phoneNumber = $_REQUEST['phoneNumber'];
        DatabaseActions::updateContact($contact);

        header("Location: /");
    }

    public function delete($id)
    {
        DatabaseActions::deleteContact($id);

        header("Location: /");
    }
}