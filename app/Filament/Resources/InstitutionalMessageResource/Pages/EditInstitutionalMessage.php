<?php

namespace App\Filament\Resources\InstitutionalMessageResource\Pages;

use App\Filament\Resources\InstitutionalMessageResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditInstitutionalMessage extends EditRecord
{
    protected static string $resource = InstitutionalMessageResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
