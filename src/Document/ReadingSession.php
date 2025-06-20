<?php

namespace App\Document;

use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;

#[MongoDB\Document]
class ReadingSession
{
    #[MongoDB\Id]
    private ?string $id = null;

    #[MongoDB\Field(type:"int")]
    private int $pagesLues;

    #[MongoDB\Field(type:"int")]
    private int $tempsPasse; // en minutes par exemple

    #[MongoDB\Field(type:"string")]
    private string $notePersonnelle;

    // getters & setters ...
}
