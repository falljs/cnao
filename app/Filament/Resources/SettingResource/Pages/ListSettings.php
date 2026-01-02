<?php

namespace App\Filament\Resources\SettingResource\Pages;

use App\Filament\Resources\SettingResource;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Database\Eloquent\Builder;

class ListSettings extends ListRecords
{
    protected static string $resource = SettingResource::class;

    /**
     * Désactiver le bouton "Créer"
     */
    protected function getHeaderActions(): array
    {
        return [];
    }

    /**
     * Forcer une seule ligne de paramètres
     */
    protected function getTableQuery(): Builder
    {
        return parent::getTableQuery()->limit(1);
    }
}
