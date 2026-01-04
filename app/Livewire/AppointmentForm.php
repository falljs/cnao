<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Appointment;
use Illuminate\Support\Facades\Mail;

class AppointmentForm extends Component
{
    public $service, $doctor, $name, $email, $appointment_date, $appointment_time;
    public $successMessage = false;

    protected $rules = [
        'service' => 'required',
        'doctor' => 'required',
        'name' => 'required|min:3',
        'email' => 'required|email',
        'appointment_date' => 'required|date',
        'appointment_time' => 'required',
    ];

    public function submit()
    {
        $this->validate();

        $appointment = Appointment::create([
            'service' => $this->service,
            'doctor' => $this->doctor,
            'name' => $this->name,
            'email' => $this->email,
            'appointment_date' => $this->appointment_date,
            'appointment_time' => $this->appointment_time,
        ]);

        // Envoi Email
        Mail::raw(
            "Nouveau rendez-vous :
            \nNom: {$this->name}
            \nEmail: {$this->email}
            \nService: {$this->service}
            \nMédecin: {$this->doctor}
            \nDate: {$this->appointment_date}
            \nHeure: {$this->appointment_time}",
            function ($message) {
                $message->to('falljs@iconedev.com')
                        ->subject('Nouvelle prise de rendez-vous');
            }
        );

        $this->reset();
        $this->successMessage = true;
    }

    public function render()
    {
        return view('livewire.appointment-form');
    }
}

