<?php

namespace App\DTOs;

/**
 * Class UpdateUserDTO
 * @package App\DTOs
 */
class UpdateUserDTO
{
    private string $firstName;
    private string $lastName;
    private string $phone;
    private string $email;
    private string $address;
    private string $gender;

    /**
     * UpdateUserDTO constructor.
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
        $this->firstName = $inputData['first_name'] ?? '';
        $this->lastName = $inputData['last_name'] ?? '';
        $this->phone = $inputData['phone'] ?? '';
        $this->email = $inputData['email'] ?? '';
        $this->address = $inputData['address'] ?? '';
        $this->gender = $inputData['gender'] ?? '';
    }

    public function toArray(): array
    {
        return array_filter([
            'first_name' => $this->getFirstName(),
            'last_name' => $this->getLastName(),
            'phone' => $this->getPhone(),
            'email' => $this->getEmail(),
            'address' => $this->getAddress(),
            'gender' => $this->getGender(),
        ]);
    }

    /**
     * @return string
     */
    public function getFirstName(): ?string
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
    public function getLastName(): ?string
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
    public function getPhone(): ?string
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

    /**
     * @return string
     */
    public function getEmail(): ?string
    {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    /**
     * @return string
     */
    public function getAddress(): ?string
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
    public function getGender(): ?string
    {
        return $this->gender;
    }

    /**
     * @param string $gender
     */
    public function setGender(string $gender): void
    {
        $this->gender = $gender;
    }
}
