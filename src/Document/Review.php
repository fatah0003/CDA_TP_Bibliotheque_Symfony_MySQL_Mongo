<?php

namespace App\Document;

use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;

#[MongoDB\Document]
class Review
{
    #[MongoDB\Id]
    private ?string $id = null;

    #[MongoDB\Field(type:"int")]
    private int $note;

    #[MongoDB\Field(type:"string")]
    private string $commentaire;

    #[MongoDB\Field(type:"date")]
    private \DateTime $date;

    // getters & setters ...
}
