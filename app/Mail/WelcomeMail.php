<?php

namespace App\Mail;

use Exception;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;


/**
 *  Classe de mailable de Laravel
 */
class WelcomeMail extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public $user;
    public $corpsMail;

    /**
     * Create a new message instance.
     */
    public function __construct($user, $corpsMail)
    {
        $this->user = $user;
        $this->corpsMail = $corpsMail;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Configuration de messagerie - AssurMate',
        );
    }

     /**
     * Get the message content definition.
     */
    public function content(): Content
    {

        //$bccDestinataires = ['game.doud@gmail.com', 'david.olv.gm@gmail.com']; 
        //->bcc($bccDestinataires)
        return new Content(
            view: 'emails.sample',
            with:[
                'prenom' => $this->user->prenom,
                'nom' => $this->user->nom,
                'corpsMail' => $this->corpsMail,
            ],
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }

    public function failed(Exception $exception)
    {
        Log::error('Échec de l\'envoi de l\'email de bienvenue : ', [
            'user_id' => $this->user->id,
            'email' => $this->user->email,
            'exception' => $exception->getMessage(),
        ]);
    }
    
}
