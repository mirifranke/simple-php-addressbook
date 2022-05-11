<?php

declare(strict_types=1);

namespace App\Helpers;

use App\Models\Contact;
use App\Helpers\Database;
use Carbon\Carbon;

class DatabaseActions
{
    public static function getContacts(string $orderBy = null): array
    {
        $query = 'SELECT id, last_name, first_name, street, zip, city, phone_number
                     FROM contacts';
        if ($orderBy) {
            $query .= ' ORDER BY ' . $orderBy;
        }

        $stmt = Database::runQuery($query);

        $contacts = [];
        while ($row = $stmt->fetch()) {
            array_push($contacts, self::convert($row));
        }

        return $contacts;
    }

    public static function getContact(int $id): Contact
    {
        $statement = 'SELECT id, last_name, first_name, street, zip, city, phone_number
                        FROM contacts
                        WHERE id = :id';

        $params = array(':id' => $id);

        $stmt = Database::runPreparedStatement($statement, $params);

        return self::convert($stmt->fetch());
    }


    public static function createContact(Contact $contact)
    {
        $statement = 'INSERT INTO contacts (
                        last_name, first_name, street, zip, city, phone_number, created_at, updated_at)
                    VALUES (:last_name, :first_name, :street, :zip, :city, :phone_number,   :created_at, :updated_at)';

        $params = array(
            'last_name' => $contact->lastName,
            'first_name' => $contact->firstName,
            'street' => $contact->street,
            'zip' => $contact->zip,
            'city' => $contact->city,
            'phone_number' => $contact->phoneNumber,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        );

        Database::runPreparedStatement($statement, $params);
    }

    public static function updateContact(Contact $contact)
    {
        $statement = 'UPDATE contacts
                        SET
                            last_name = :last_name,
                            first_name = :first_name,
                            street = :street,
                            zip = :zip,
                            city = :city,
                            phone_number = :phone_number,
                            updated_at = :updated_at
                        WHERE id = :id';

        $params = array(
            ':last_name' => $contact->lastName,
            ':first_name' => $contact->firstName,
            ':street' => $contact->street,
            ':zip' => $contact->zip,
            ':city' => $contact->city,
            ':phone_number' => $contact->phoneNumber,
            ':updated_at' => Carbon::now(),
            ':id' => $contact->id
        );

        Database::runPreparedStatement($statement, $params);
    }

    public static function deleteContact(int $id)
    {
        $statement = 'DELETE FROM contacts WHERE id = :id';
        $params = array(':id' => $id);

        Database::runPreparedStatement($statement, $params);
    }

    private static function convert($row): Contact
    {
        $contact = new Contact(
            $row['last_name'],
            $row['first_name'] ? $row['first_name'] : '',
            $row['street'] ? $row['street'] : '',
            $row['zip'] ? $row['zip'] : '',
            $row['city'] ? $row['city'] : '',
            $row['phone_number'] ? $row['phone_number'] : ''
        );
        $contact->id = $row['id'];

        return $contact;
    }
}