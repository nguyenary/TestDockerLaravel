<?php

namespace App\DTOs;

/**
 * Class CreateUserDTO
 * @package App\DTOs
 */
class CreateUserDTO
{
    private string $firstName;
    private string $lastName;
    private string $address;
    private string $phone;

    //TODO...

    /**
     * CreateUserDTO constructor.
     * @param array $inputData
     */
    public function __construct(array $inputData)
    {
        $this->map($inputData);
    }

    /**
     * @param array $inputData
     */
    public function map(array $inputData): void
    {
        $this->firstName = $inputData['first_name'];
        //TODO ....
    }

    /**
     * @return string
     */
    public function getFirstName(): string
    {
        return $this->firstName;
    }

    /**
     * @param string $firstName
     */
    public function setFirstName(string $firstName): void
    {
        $this->firstName = $firstName;
    }

    /**
     * @return string
     */
    public function getLastName(): string
    {
        return $this->lastName;
    }

    /**
     * @param string $lastName
     */
    public function setLastName(string $lastName): void
    {
        $this->lastName = $lastName;
    }

    /**
     * @return string
     */
    public function getAddress(): string
    {
        return $this->address;
    }

    /**
     * @param string $address
     */
    public function setAddress(string $address): void
    {
        $this->address = $address;
    }

    /**
     * @return string
     */
    public function getPhone(): string
    {
        return $this->phone;
    }

    /**
     * @param string $phone
     */
    public function setPhone(string $phone): void
    {
        $this->phone = $phone;
    }
}