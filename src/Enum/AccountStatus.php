<?php

  Namespace App\Enum;

  enum AccountStatus: string {
    case ACTIVE = 'active';
    case INACTIVE = 'inactive';
    case BLOCKED = 'blocked';
    CASE BANNED = 'banned';
  }

?>