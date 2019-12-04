<?php

namespace App\Models;

use DateTime;

class Writer extends User{
    public function __construct()
    {
      $this->setGroup(Group::WRITER);
      $this->setStatus(Status::CREATION);
      $this->setCreationDate(new DateTime());
      $this->setModificationDate(new DateTime());
    }
}