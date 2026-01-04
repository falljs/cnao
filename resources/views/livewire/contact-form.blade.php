<div>
    <!-- resources/views/livewire/contact-form.blade.php -->

    <form wire:submit.prevent="submit">
        @if ($successMessage)
            <div class="alert alert-success mb-3">
                Votre message a été envoyé avec succès ✅
            </div>
        @endif

        <div class="row g-3">
            <div class="col-12">
                <input wire:model="name" type="text" class="form-control border-0 bg-light px-4" placeholder="Your Name"
                    style="height: 55px;">
                @error('name')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="col-12">
                <input wire:model="email" type="email" class="form-control border-0 bg-light px-4"
                    placeholder="Your Email" style="height: 55px;">
                @error('email')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="col-12">
                <input wire:model="subject" type="text" class="form-control border-0 bg-light px-4"
                    placeholder="Subject" style="height: 55px;">
                @error('subject')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="col-12">
                <textarea wire:model="message" class="form-control border-0 bg-light px-4 py-3" rows="5" placeholder="Message"></textarea>
                @error('message')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="col-12">
                <button class="btn btn-primary w-100 py-3">
                    Envoyer
                </button>
            </div>
        </div>
    </form>

</div>
