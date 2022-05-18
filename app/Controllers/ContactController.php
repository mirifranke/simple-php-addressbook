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
            lastName: self::getRequestData('lastName'),
            firstName: self::getRequestData('firstName'),
            street: self::getRequestData('street'),
            zip: self::getRequestData('zip'),
            city: self::getRequestData('city'),
            phoneNumber: self::getRequestData('phoneNumber'),
        );
        DatabaseActions::createContact($contact);

        header("Location: /");
    }

    public function update($id)
    {
        $contact = DatabaseActions::getContact($id);
        $contact->lastName = self::getRequestData('lastName');
        $contact->firstName = self::getRequestData('firstName');
        $contact->street = self::getRequestData('street');
        $contact->zip = self::getRequestData('zip');
        $contact->city = self::getRequestData('city');
        $contact->phoneNumber = self::getRequestData('phoneNumber');
        DatabaseActions::updateContact($contact);

        header("Location: /");
    }

    public function delete($id)
    {
        DatabaseActions::deleteContact($id);

        header("Location: /");
    }

    public static function getRequestData(string $field)
    {
        return htmlspecialchars($_REQUEST[$field]);
    }
}