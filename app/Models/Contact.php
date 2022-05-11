<?php

namespace App\Models;

class Contact
{
    public int $id;

    public function __construct(
        public string $lastName,
        public string $firstName,
        public string $street,
        public string $zip,
        public string $city,
        public string $phoneNumber
    )
    {
    }

    public function getFullName()
    {
        if ($this->firstName) {
            return $this->firstName . ' ' . $this->lastName;
        }

        return $this->lastName;
    }

    public function getLastName()
    {
        if ($this->lastName) {
            return $this->lastName;
        }

        return '';
    }

    public function getFirstName()
    {
        if ($this->firstName) {
            return $this->firstName;
        }

        return '';
    }

    public function getStreet()
    {
        if ($this->street) {
            return $this->street;
        }

        return '';
    }

    public function getCity()
    {
        if ($this->zip && $this->city) {
            return $this->zip . ' ' . $this->city;
        }

        if ($this->zip) {
            return $this->zip;
        }

        if ($this->city) {
            return $this->city;
        }

        return '';
    }

    public function getPhoneNumber()
    {
        if ($this->phoneNumber) {
            return $this->phoneNumber;
        }

        return '';
    }
}