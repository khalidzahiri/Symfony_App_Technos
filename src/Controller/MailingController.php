<?php

namespace App\Controller;

use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class MailingController extends AbstractController
{
    /**
     * @Route ("/sendMail", name="sendMail")
     */
    public function sendMail(Request $request)
    {
        $transporter=(new \Swift_SmtpTransport('smtp.gmail.com', 465, 'ssl'))
            ->setUsername('test.testwf3@gmail.com')
            ->setPassword('testwf3dev');

        $mailer=new \Swift_Mailer($transporter);

        $mess = $request->request->get('message');
        $name = $request->request->get('name');
        $surname = $request->request->get('surname');
        $subject = $request->request->get('need');
        $from = $request->request->get('email');

        $message= (new \Swift_Message($subject))
            ->setFrom($from)
            ->setTo('test.testwf3@gmail.com');

        $cid=$message->embed(\Swift_Image::fromPath("upload/favicon.png"));
        $message->SetBody(
            $this->render('mail/mail_template.html.twig', [
                'from'=>$from,
                'name'=>$name,
                'surname'=>$surname,
                'subject'=>$subject,
                'message'=>$mess,
                'objectif'=>'Accéder au site',
                'liens'=> 'http://127.0.0.1:8000'
            ]),
            'text/html'
        );
        $mailer->send($message);

        $this->addFlash('success', 'l\'email a bien été transmis');
        return $this->redirectToRoute('home');
    }

    /**
     * @Route("/mailForm", name="mailForm")
     */
    public function mailForm()
    {
        return $this->render('mail/mail_form.html.twig');
    }

    /**
     * @Route("/mailTemplate", name="mailTemplate")
     */
    public function mailTemplate()
    {
        return $this->render('mail/mail_template.html.twig');
    }


    /**
     * @Route("/forgotPassword", name="forgotPassword")
     */
    public function forgotPassword(Request $request, UserRepository $repository, EntityManagerInterface $manager)
    {
        if ($_POST):

            $email=$request->request->get('email');

            $user=$repository->findOneBy(['email'=>$email]);

            if ($user):

                $transporter=(new \Swift_SmtpTransport('smtp.gmail.com', 465, 'ssl'))
                    ->setUsername('test.testwf3@gmail.com')
                    ->setPassword('testwf3dev');

                $mailer=new \Swift_Mailer($transporter);

                $mess ='Vous avez fait une demande de réinitialisation de mot de passe, veuillez cliquer sur le lien ci-dessous';
                $name = "";
                $surname = "";
                $subject = "Mot de passe oublié";
                $from ="test.testwf3@gmail.com";

                $message= (new \Swift_Message($subject))
                    ->setFrom($from)
                    ->setTo($email);

                $mail=$user->getId();
                $token=uniqid();
                $user->setReset($token);

                $manager->persist($user);
                $manager->flush();
                $cid=$message->embed(\Swift_Image::fromPath("upload/favicon.png"));
                $message->SetBody(
                    $this->render('mail/mail_template.html.twig', [
                        'from'=>$from,
                        'name'=>$name,
                        'surname'=>$surname,
                        'subject'=>$subject,
                        'message'=>$mess,
                        'logo'=>$cid,
                        'objectif'=>'Réinitialiser',
                        'liens'=> 'http://127.0.0.1:8000/resetToken/' . $mail . '/' . $token
                    ]),
                    'text/html'
                );
                $mailer->send($message);
                $this->addFlash('success', 'Un lien de réinitialisation vous a été envoyé à votre adresse mail');
            else:
                $this->addFlash('error', 'Aucun utilisateur ne correspond à cet Email');
                $this->redirectToRoute('forgotPassword');
            endif;

        endif;

        return $this->render('security/forgotPassword.html.twig');
    }


    /**
     * @Route("/resetToken/{email}/{token}", name="resetToken")
     */
    public function resetToken($email, $token, UserRepository $repository)
    {
        $mail=urldecode($email);
        $user =$repository->findOneBy(['id'=>$email, 'reset'=>$token]);
        //dd($token);
        if ($user):
            return $this->render('security/resetPassword.html.twig',[
                'id'=>$user->getId()
            ]);

        else:
            $this->addFlash('error', 'Une erreur est survenue, veuillez refaire une demande de réinitialisation de mot de passe');
            return $this->redirectToRoute('login');
        endif;
    }


    /**
     * @Route("/resetPassword", name="resetPassword")
     */
    public function resetPassword(Request $request, EntityManagerInterface $manager, UserPasswordEncoderInterface $encoder, UserRepository $repository)
    {

        if ($_POST):

            $password = $request->request->get('password');
            $confirmPassword=$request->request->get('confirmPassword');
            $id=$request->request->get('id');
            //dd($password, $confirmPassword, $id);
            $user=$repository->find($id);
            //dd($user);
            if ($password==$confirmPassword):


                $hash=$encoder->encodePassword($user, $password);
                $user->setPassword($hash);
                $user->setReset(null);
                $manager->persist($user);
                $manager->flush();
                $this->addFlash('success', 'Votre mot de passe a bien été modifié, vous pouvez vous connecter');
                return $this->redirectToRoute('login');
            else:
                $this->addFlash('error', 'Les mots de passe saisis ne correspondent pas, veuillez les saisir à nouveau');
                return $this->render('security/resetPassword.html.twig',[
                    'id'=>$id
                ]);
            endif;


        endif;

        return $this->render('security/resetPassword.html.twig');
    }

    /**
     * @Route("/contact", name="contact")
     */
    public function contact()
    {
        return $this->render('front/contact.html.twig');
    }

    /**
     * @Route ("/contactMail", name="contactMail")
     */
    public function contactMail(Request $request)
    {
        $transporter=(new \Swift_SmtpTransport('smtp.gmail.com', 465, 'ssl'))
            ->setUsername('test.testwf3@gmail.com')
            ->setPassword('testwf3dev');

        $mailer=new \Swift_Mailer($transporter);

        $idUser = $request->request->get('idUser');
        $mess = $request->request->get('message');
        $subject = $request->request->get('subject');
        $from = $request->request->get('email');

        $message= (new \Swift_Message($subject))
            ->setFrom('test.testwf3@gmail.com')
            ->setTo('test.testwf3@gmail.com');

        $message->SetBody(
            $this->render('mail/mailContactTemplate.html.twig', [
                'idUser'=>$idUser,
                'from'=>$from,
                'subject'=>$subject,
                'message'=>$mess,
            ]),
            'text/html'
        );
        $mailer->send($message);

        $this->addFlash('success', 'Le message a bien été transmis');
        return $this->redirectToRoute('home');
    }
}
