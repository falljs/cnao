<div>
    <!-- resources/views/livewire/newsletter-form.blade.php -->

    <form wire:submit.prevent="submit" class="mx-auto" style="max-width: 600px;">
        @if ($successMessage)
            <div class="alert alert-success mb-3 text-center">
                Merci pour votre abonnement ✅
            </div>
        @endif

        <div class="input-group">
            <input wire:model.defer="contact" type="text" class="form-control border-white p-3"
                placeholder="Votre Email ou Téléphone">

            <button class="btn btn-dark px-4">
                S'abonner
            </button>
        </div>

        @error('contact')
            <small class="text-danger d-block mt-2 text-center">
                {{ $message }}
            </small>
        @enderror
    </form>

</div>
