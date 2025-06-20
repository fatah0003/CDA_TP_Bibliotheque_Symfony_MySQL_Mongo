<?php

namespace App\Controller;

use App\Document\Review;
use App\Service\MongoService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class ReviewController extends AbstractController
{
#[Route('/book/{isbn}/reviews', name: 'book_reviews')]
public function showReviews(MongoService $mongo, string $isbn)
{
$reviews = $mongo->getReviewsForBook($isbn);
$moyenne = $mongo->getAverageRating($isbn);

return $this->render('review/index.html.twig', [
'reviews' => $reviews,
'isbn' => $isbn,
'moyenne' => $moyenne
]);
}

#[Route('/book/{isbn}/review/add', name: 'add_review', methods: ['POST', 'GET'])]
public function addReview(Request $request, MongoService $mongo, string $isbn)
{
$review = new Review();
$review->setBookIsbn($isbn);
$review->setComment($request->request->get('comment'));
$review->setRating((int) $request->request->get('rating'));
$review->setCreatedAt(new \DateTime());

$mongo->addReview($review);

return $this->redirectToRoute('book_reviews', ['isbn' => $isbn]);
}
}
