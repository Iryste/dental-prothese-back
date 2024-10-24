<?php 

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;
use Symfony\Component\Security\Core\Exception\InvalidCsrfTokenException;
use Symfony\Component\Security\Csrf\CsrfTokenManagerInterface;
use Symfony\Component\Security\Csrf\CsrfToken;
use Symfony\Component\Security\Csrf\CsrfTokenManager;

class FormController extends AbstractController
{
    #[Route('/api/get-csrf-token', name: 'get_csrf_token', methods: ['GET'])]
    public function getCsrfToken(CsrfTokenManagerInterface $csrfTokenManager): JsonResponse
    {
        
        $csrfToken = $csrfTokenManager->getToken('submit_form')->getValue();

        error_log("getCsrfToken called");

        
        return new JsonResponse(['csrfToken' => $csrfToken]);
    }

    #[Route('/api/submit-form', name: 'submit_form', methods: ['POST'])]
public function submitForm(Request $request, MailerInterface $mailer, CsrfTokenManagerInterface $csrfTokenManager): JsonResponse
{

    $data = json_decode($request->getContent(), true);
    
    
    // $submittedCsrfToken = $request->headers->get('X-CSRF-Token');
    
    $token = new CsrfToken('submit_form', $request->headers->get('X-CSRF-Token'));

    if (!$csrfTokenManager->isTokenValid($token)) {
        return new JsonResponse(['message' => 'Token CSRF invalide'], 400);
    } else {
        error_log("Token CSRF valide");
    }

    // if (!$csrfTokenManager->isTokenValid(new CsrfToken('submit_form', $submittedCsrfToken))) {
    //     error_log("Token CSRF invalide");
    //     return new JsonResponse(['message' => 'Token CSRF invalide'], 400);
    // } else {
    //     error_log("Token CSRF valide");
    // }
        
        $email = (new Email())
            ->from($data['email'])
            ->to('jbhamel62@gmail.com')
            ->subject('Demande via le site internet')
            ->text(sprintf(
                "Nom: %s\nPrénom: %s\nEmail: %s\nDemande:\n%s",
                $data['nom'],
                $data['prenom'],
                $data['email'],
                $data['demande']
            ));

        try {
            $mailer->send($email);
            return new JsonResponse(['message' => 'Email envoyé avec succès !']);
        } catch (\Exception $e) {
            return new JsonResponse(['message' => 'Erreur lors de l\'envoi de l\'email'], 500);
        }
    }
}
