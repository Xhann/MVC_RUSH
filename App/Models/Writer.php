<?php

namespace App\Models;

use DateTime;

class Writer extends User{
    public function __construct()
    {
      $this->setPrivileges(Privileges::WRITER);
      $this->setStatus(Status::CREATION);
      $this->setCreationDate(new DateTime());
      $this->setModificationDate(new DateTime());
    }
}