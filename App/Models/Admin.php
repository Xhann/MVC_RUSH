<?php

namespace App\Models;

use DateTime;

class Admin extends User{

    public function __construct()
    {
      $this->setPrivileges(Priv::ADMIN);
      $this->setStatus(Status::CREATION);
      $this->setCreationDate(new DateTime());
      $this->setModificationDate(new DateTime());
    }

}