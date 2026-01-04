<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\ContactMessage;
use Illuminate\Support\Facades\Mail;

class ContactForm extends Component
{
    public $name, $email, $subject, $message;
    public $successMessage = false;

    protected $rules = [
        'name'    => 'required|min:3',
        'email'   => 'required|email',
        'subject' => 'required|min:3',
        'message' => 'required|min:10',
    ];

    public function submit()
    {
        $this->validate();

        ContactMessage::create([
            'name'    => $this->name,
            'email'   => $this->email,
            'subject' => $this->subject,
            'message' => $this->message,
        ]);

        // Envoi email
        Mail::raw(
            "Nouveau message de contact :
            \nNom: {$this->name}
            \nEmail: {$this->email}
            \nSujet: {$this->subject}
            \nMessage:\n{$this->message}",
            function ($mail) {
                $mail->to('falljs@iconedev.com')
                     ->subject('Nouveau message de contact');
            }
        );

        $this->reset();
        $this->successMessage = true;
    }

    public function render()
    {
        return view('livewire.contact-form');
    }
}
