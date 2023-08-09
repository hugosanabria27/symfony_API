<?php
// src/Controller/UserController.php

namespace App\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use GuzzleHttp\Client;


class UserController extends AbstractController 
{
    public function listUsers(): Response
    {
        $client = new Client();
        $response = $client->request('GET', 'https://jsonplaceholder.typicode.com/users');
        // echo $response->getStatusCode();
        // echo $response->getHeaderLine('content-type');
        // echo $response->getBody();
        $users = json_decode($response->getBody(), true);
        // dd($users);

        return $this->render('users/list.html.twig', ['users' => $users]);
        
    } 
}