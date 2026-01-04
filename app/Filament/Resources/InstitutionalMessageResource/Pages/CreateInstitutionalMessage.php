<?php

namespace App\Filament\Resources\InstitutionalMessageResource\Pages;

use App\Filament\Resources\InstitutionalMessageResource;
use App\Models\InstitutionalMessage;
use Filament\Resources\Pages\CreateRecord;

class CreateInstitutionalMessage extends CreateRecord
{
    protected static string $resource = InstitutionalMessageResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        if (InstitutionalMessage::exists()) {
            abort(403);
        }

        return $data;
    }
}
