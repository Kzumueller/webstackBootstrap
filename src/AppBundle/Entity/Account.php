<?php
/**
 * Created by PhpStorm.
 * User: Kevin
 * Date: 2018-03-12
 * Time: 11:39 PM
 */

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity
 * @ORM\Table(name="account")
 */
class Account {

    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     *
     * @var int
     */
    private $id = 0;

    /**
     * @ORM\Column(type="string", nullable=TRUE)
     *
     * @var ?string
     */
    private $company = '';

    /**
     * @ORM\Column(type="string", length=50, nullable=TRUE)
     *
     * @var ?string
     */
    private $vatNumber = '';

    /**
     * @ORM\Column(type="string", columnDefinition="ENUM('m', 'f')")
     *
     * @var string
     */
    private $salutation = '';

    /**
     * @ORM\Column(type="string", length=100)
     *
     * @Assert\NotBlank()
     *
     * @var string
     */
    private $givenName = '';

    /**
     * @ORM\Column(type="string", length=100)
     *
     * @Assert\NotBlank()
     *
     * @var string
     */
    private $familyName = '';

    /**
     * @ORM\Column(type="string")
     *
     * @Assert\NotBlank()
     *
     * @var string
     */
    private $address = '';

    /**
     * @ORM\Column(type="string", length=50)
     *
     * @Assert\NotBlank()
     *
     * @var string
     */
    private $zipCode = '';

    /**
     * @ORM\Column(type="string")
     *
     * @Assert\NotBlank()
     *
     * @var string
     */
    private $city = '';

    /**
     * @ORM\Column(type="string")
     *
     * @Assert\Country()
     *
     * @var string
     */
    private $country = '';

    /**
     * @ORM\Column(type="string", length=100)
     *
     * @Assert\NotBlank()
     *
     * @var string
     */
    private $phone = '';

    /**
     * @ORM\Column(type="string", length=100)
     *
     * @Assert\NotBlank()
     *
     * @var string
     */
    private $fax = '';

    /**
     * @ORM\Column(type="string")
     *
     * @Assert\Email()
     *
     * @var string
     */
    private $email = '';

    /**
     * @ORM\Column(type="string", length=1024)
     *
     * @Assert\NotBlank()
     *
     * @var string
     */
    private $password = '';

    /**
     * @return int
     */
    public function getId(): int {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void {
        $this->id = $id;
    }

    /**
     * @return null|string
     */
    public function getCompany(): ?string {
        return $this->company;
    }

    /**
     * @param null|string $company
     */
    public function setCompany(?string $company): void {
        $this->company = $company;
    }

    /**
     * @return null|string
     */
    public function getVatNumber(): ?string {
        return $this->vatNumber;
    }

    /**
     * @param null|string $vatNumber
     */
    public function setVatNumber(?string $vatNumber): void {
        $this->vatNumber = $vatNumber;
    }

    /**
     * @return string
     */
    public function getSalutation(): string {
        return $this->salutation;
    }

    /**
     * @param string $salutation
     */
    public function setSalutation(string $salutation): void {
        $this->salutation = $salutation;
    }

    /**
     * @return string
     */
    public function getGivenName(): string {
        return $this->givenName;
    }

    /**
     * @param string $givenName
     */
    public function setGivenName(string $givenName): void {
        $this->givenName = $givenName;
    }

    /**
     * @return string
     */
    public function getFamilyName(): string {
        return $this->familyName;
    }

    /**
     * @param string $familyName
     */
    public function setFamilyName(string $familyName): void {
        $this->familyName = $familyName;
    }

    /**
     * @return string
     */
    public function getAddress(): string {
        return $this->address;
    }

    /**
     * @param string $address
     */
    public function setAddress(string $address): void {
        $this->address = $address;
    }

    /**
     * @return string
     */
    public function getZipCode(): string {
        return $this->zipCode;
    }

    /**
     * @param string $zipCode
     */
    public function setZipCode(string $zipCode): void {
        $this->zipCode = $zipCode;
    }

    /**
     * @return string
     */
    public function getCity(): string {
        return $this->city;
    }

    /**
     * @param string $city
     */
    public function setCity(string $city): void {
        $this->city = $city;
    }

    /**
     * @return string
     */
    public function getCountry(): string {
        return $this->country;
    }

    /**
     * @param string $country
     */
    public function setCountry(string $country): void {
        $this->country = $country;
    }

    /**
     * @return string
     */
    public function getPhone(): string {
        return $this->phone;
    }

    /**
     * @param string $phone
     */
    public function setPhone(string $phone): void {
        $this->phone = $phone;
    }

    /**
     * @return string
     */
    public function getFax(): string {
        return $this->fax;
    }

    /**
     * @param string $fax
     */
    public function setFax(string $fax): void {
        $this->fax = $fax;
    }

    /**
     * @return string
     */
    public function getEmail(): string {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail(string $email): void {
        $this->email = $email;
    }

    /**
     * @return string
     */
    public function getPassword(): string {
        return $this->password;
    }

    /**
     * @param string $password
     */
    public function setPassword(string $password): void {
        $this->password = $password;
    }


}