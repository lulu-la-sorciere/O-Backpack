<?php

namespace App\Controller;

use App\Entity\Channel;
use App\Entity\Message;
use App\Repository\ChannelRepository;
use App\Repository\MessageRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;
use Symfony\Component\Mercure\HubInterface;
use Symfony\Component\Mercure\Update;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;

class ChannelController extends AbstractController
{
    /**
     * @Route("/channel", name="channel")
     */
    public function getChannels(ChannelRepository $channel): Response
    {
        $channels = $channel->findAll();

        return $this->render('channel/index.html.twig', [
            'channels' => $channels ?? []
        ]);
    }

    /**
     * @Route("/chat/{id}", name="chat_message", methods={"POST"})
     */
    public function sendMessage(
        Request $request,
        ChannelRepository $channel,
        EntityManagerInterface $em,
        SerializerInterface $serializer,
        HubInterface $publisher
    ): JsonResponse {
        $data = \json_decode($request->getContent(), true); // On récupère les data postées et on les déserialize
        if (empty($content = $data['content'])) {
            throw new AccessDeniedHttpException('No data sent');
        }
        $channel = $channel->findOneBy([
            'id' => $data['channel'] // On cherche à savoir de quel channel provient le message
        ]);
        if (!$channel) {
            throw new AccessDeniedHttpException('Message have to be sent on a specific channel');
        }

        $message = new Message(); // Après validation, on crée le nouveau message
        $message->setContent($content);
        $message->setChannel($channel);
        $message->setUser($this->getUser());

        $em->persist($message);
        $em->flush(); // Sauvegarde du nouvel objet en DB

        $jsonMessage = $serializer->serialize($message, 'json', [
            'groups' => ['message'] // On serialize la réponse avant de la renvoyer
        ]);
        dd($jsonMessage);
        $update = new Update( // Création d'une nouvelle update
            sprintf(
                'http://localhost:8080/chat/%d', // On précise le topic, avec pour Id l'identifiant de notre Channel
                $channel->getId()
            ),
            $jsonMessage, // On y passe le message serializer en content value
        );
        dd($update);
        $publisher->publish($update);
       
        return new JsonResponse( // Enfin, on retourne la réponse
            $jsonMessage,
            Response::HTTP_OK,
            [],
            true
        );
    }

    /**
     * @Route("/chat/{id}", name="chat", methods={"GET"})
     */
    public function chat(Channel $channel, MessageRepository $message): Response
    {
        $messages = $message->findBy([
            'channel' => $channel
        ], ['createdAt' => 'ASC']);

        return $this->render('channel/chat.html.twig', [
            'channel' => $channel,
            'messages' => $messages
        ]);
    }

   
}
