<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Contact;
use Mail;

class ContactComponent extends Component
{

    public $name;
    public $mail;
    public $tel;
    public $subject;
    public $message;

    public function storeContact() {
        /*$this->validate([
            'name'=>'required',
            'slug'=>'required'
        ]);*/
        $contact = new Contact();
        $contact->name = $this->name;
        $contact->mail = $this->mail;
        $contact->tel = $this->tel;
        $contact->subject = $this->subject;
        $contact->message = $this->message;
        $contact->save();
        /*$this->sendEmail($contact);*/
        session()->flash('message', 'Message envoyé avec succès! Nous vous contacterons bientot');
    }

    public function render()
    {
        return view('livewire.contact-component');
    }

    /*public function sendEmail($contact) {
        Mail::send(['contact' => $contact], function($message){
            $message->to('franckkamdem260104@gmail.com')->subject('Nouveau message de contact');
        });
    }*/
}
