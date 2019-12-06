<?php
namespace App\Models;
use WebFramework\ORM;
use DateTime;

class User
{
    /**
     * @type integer
     */
    private $id;
    /**
     * @type string
     */
    private $username;
    /**
     * @type string
     */
    private $email;
    /**
     * @type string
     */
    private $password;
    /**
       * @type string
       */
    private $password_confirm;
    // Attributs supp
    /**
     * @type string
     */
    private $privileges;
    /**
     * @type string
     */
    private $status;
    /**
   * @type string
   */
    private $creationDate;
    /**
   * @type DateTime
   */
    private $modificationDate;
    /**
   * @type DateTime
   */

    public function getId(): ?int
    {
        return $this->id;
    }
    public function getUsername(): ?string
    {
        return $this->username;

    }
    public function setUsername(string $username): self
    {
        $this->username = $username;
        return $this;
    }
    public function getEmail(): ?string
    {
        return $this->email;
    }
    public function setEmail(string $email): self
    {
        $this->email = $email;
        return $this;
    }
    public function getPassword(): ?string
    {
        return $this->password;
    }
    public function setPassword(string $password): self
    {
        $this->password = $password;
        return $this;
    }
    public function getPasswordConfirm(): ?string
    {
        return $this->password_confirm;
    }
    public function setPasswordConfirm(string $password_confirm): self
    {
        $this->password_confirm = $password_confirm;
        return $this;
    }
    public function getPrivileges(): ?string
    {
        return $this->privileges;
    }
    public function setPrivileges(string $privileges): self
    {
        $this->privileges = $privileges;
        return $this;
    }
    public function getStatus(): ?string
    {
        return $this->status;
    }
    public function setStatus(string $status): self
    {
        $this->status = $status;
        return $this;
    }
    public function getCreationDate(): ?DateTime
    {
        return $this->creationDate;
    }
    public function setCreationDate(DateTime $creationDate): self
    {
        $this->creationDate = $creationDate;
        return $this;
    }
    public function getModificationDate(): ?DateTime
    {
        return $this->modificationDate;
    }
    public function setModificationDate(DateTime $modificationDate): self
    {
        $this->modificationDate = $modificationDate;
        return $this;
    }
    // faire le construct // Maj de modifdate sur tous les sets
    public function __construct()
    {
        $this->setPrivileges(Privileges::USER);
        $this->setStatus(Status::CREATION);
        $this->setCreationDate(new DateTime());
        $this->setModificationDate(new DateTime());
    }
    /**
     * Validate the User model data.
     *
     * @return string - Error message if the model data is invalid, else empty string.
     */
    public function validate(): string
    {
        $err = '';
        if (empty($this->username) || preg_match("#^[a-zA-Z0-9_]{3,10}$#", $this->username) != 1) {
            $err = $err . "Invalid 'username' field. Must have between than 3 and 10 characters.<br>";
        }
        if (empty($this->email) || preg_match('#^[a-zA-Z0-9._-]+@[a-zA-Z]{2,}\.[a-z]{2,4}$#', $this->email) != 1) {
            $err = $err . "Invalid 'email' field. Wrong format.<br>";
        }
        if (empty($this->password) || preg_match("#^[a-zA-Z0-9._-]{8,20}$#", $this->password) != 1) {
            $err = $err . "Invalid 'password' field. Must have between than 8 and 20 characters.<br>";
        }
        if (empty($this->password) || $this->password!==$this->password_confirm) {
            $err = $err . "'password' field and 'password' field don't match.<br>";
        }
        if (!empty($err)) {
            throw new \Exception($err);
        }
        return $err;
    }
}
