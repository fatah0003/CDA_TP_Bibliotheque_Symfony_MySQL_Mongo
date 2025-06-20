<?php

namespace App\Document;

use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;

#[MongoDB\Document]
class Review
{
#[MongoDB\Id]
private string $id;

#[MongoDB\Field(type: 'string')]
private string $bookIsbn;

#[MongoDB\Field(type: 'string')]
private ?string $comment = null;

#[MongoDB\Field(type: 'int')]
private int $rating;

#[MongoDB\Field(type: 'date')]
private \DateTime $createdAt;

    public function getId(): string
    {
        return $this->id;
    }

    public function setId(string $id): void
    {
        $this->id = $id;
    }

    public function getBookIsbn(): string
    {
        return $this->bookIsbn;
    }

    public function setBookIsbn(string $bookIsbn): void
    {
        $this->bookIsbn = $bookIsbn;
    }

    public function getComment(): string
    {
        return $this->comment;
    }

    public function setComment(string $comment): void
    {
        $this->comment = $comment;
    }

    public function getRating(): int
    {
        return $this->rating;
    }

    public function setRating(int $rating): void
    {
        $this->rating = $rating;
    }

    public function getCreatedAt(): \DateTime
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTime $createdAt): void
    {
        $this->createdAt = $createdAt;
    }


}
