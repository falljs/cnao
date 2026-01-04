<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\NewsletterSubscriber;

class NewsletterForm extends Component
{
   public $contact;
    public $successMessage = false;

    protected $rules = [
        'contact' => 'required|min:5|unique:newsletter_subscribers,contact',
    ];

    protected $messages = [
        'contact.required' => 'Veuillez saisir un email ou un numéro.',
        'contact.unique'   => 'Ce contact est déjà abonné.',
    ];

    public function submit()
    {
        $this->validate();

        NewsletterSubscriber::create([
            'contact' => $this->contact,
        ]);

        $this->reset('contact');
        $this->successMessage = true;
    }

    public function render()
    {
        return view('livewire.newsletter-form');
    }
}
