<?php

namespace App\Controller;

use App\Service\MessageGenerator;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Route;
use Symfony\Component\HttpFoundation\Response;

class HomeController extends AbstractController
{
    public function __construct(Private MessageGenerator $messageGenerator)
    {
    }

    #[Route("", name:"index")]
    public function index(): Response
    {
        return new Response($this->messageGenerator->getHappyMessage());
    }
}