<?php

  Namespace App\Enum;

  enum CommentStatus: string {
    case PENDING = 'pending';
    case VALIDATED = 'validated';
    case REJECTED = 'rejected';
  }

?>