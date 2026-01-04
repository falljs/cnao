<div>
    <!-- resources/views/livewire/appointment-form.blade.php -->

    <form wire:submit.prevent="submit">
        @if ($successMessage)
            <div class="alert alert-success mb-3">
                Rendez-vous envoyé avec succès ✅
            </div>
        @endif

        <div class="row g-3">
            <div class="col-12 col-sm-6">
                <select wire:model="service" class="form-select bg-light border-0" style="height: 55px;">
                    <option value="">Select A Service</option>
                    <option>Consultation</option>
                    <option>Soins dentaires</option>
                    <option>Urgence</option>
                </select>
                @error('service')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="col-12 col-sm-6">
                <select wire:model="doctor" class="form-select bg-light border-0" style="height: 55px;">
                    <option value="">Select Doctor</option>
                    <option>Dr Diop</option>
                    <option>Dr Fall</option>
                    <option>Dr Ndiaye</option>
                </select>
                @error('doctor')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="col-12 col-sm-6">
                <input wire:model="name" type="text" class="form-control bg-light border-0" placeholder="Your Name"
                    style="height: 55px;">
                @error('name')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="col-12 col-sm-6">
                <input wire:model="email" type="email" class="form-control bg-light border-0" placeholder="Your Email"
                    style="height: 55px;">
                @error('email')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="col-12 col-sm-6">
                <input wire:model="appointment_date" type="date" class="form-control bg-light border-0"
                    style="height: 55px;">
                @error('appointment_date')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="col-12 col-sm-6">
                <input wire:model="appointment_time" type="time" class="form-control bg-light border-0"
                    style="height: 55px;">
                @error('appointment_time')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="col-12">
                <button class="btn btn-dark w-100 py-3">
                    Envoyer
                </button>
            </div>
        </div>
    </form>

</div>
