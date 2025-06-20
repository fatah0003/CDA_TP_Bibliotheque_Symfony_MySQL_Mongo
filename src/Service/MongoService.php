<?php

namespace App\Service;

use Doctrine\ODM\MongoDB\DocumentManager;
use App\Document\Review;
use App\Document\ReadingSession;

class MongoService
{
    public function __construct(private DocumentManager $dm)
    {
    }

    /**
     * Récupère toutes les reviews d'un livre par ISBN
     *
     * @param string $bookIsbn
     * @return Review[]
     */
    public function getReviewsForBook(string $bookIsbn): array
    {
        return $this->dm->getRepository(Review::class)->findBy(['bookIsbn' => $bookIsbn]);
    }

    /**
     * Ajoute une nouvelle review
     */
    public function addReview(Review $review): void
    {
        $this->dm->persist($review);
        $this->dm->flush();
    }

    /**
     * Récupère toutes les sessions de lecture d'un livre par ISBN
     *
     * @param string $bookIsbn
     * @return ReadingSession[]
     */
    public function getReadingSessionsForBook(string $bookIsbn): array
    {
        return $this->dm->getRepository(ReadingSession::class)->findBy(['bookIsbn' => $bookIsbn]);
    }

    /**
     * Ajoute une nouvelle session de lecture
     */
    public function addReadingSession(ReadingSession $session): void
    {
        $this->dm->persist($session);
        $this->dm->flush();
    }
}
