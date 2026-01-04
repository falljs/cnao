<?php

namespace App\Filament\Resources;

use App\Filament\Resources\InstitutionalMessageResource\Pages;
use App\Models\InstitutionalMessage;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Forms\Components\Tabs;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;

class InstitutionalMessageResource extends Resource
{
    protected static ?string $model = InstitutionalMessage::class;

    protected static ?string $navigationLabel = 'Mot & Présentation';
    protected static ?string $navigationIcon = 'heroicon-o-chat-bubble-left-right';
    protected static ?string $navigationGroup = 'Contenu du site';
    protected static bool $shouldRegisterNavigation = true;

    /**
     * Redirection directe vers Create ou Edit
     */
    public static function getNavigationUrl(): string
    {
        $record = InstitutionalMessage::first();

        return $record
            ? static::getUrl('edit', ['record' => $record])
            : static::getUrl('create');
    }

    public static function form(Form $form): Form
    {
        return $form->schema([
            Tabs::make('institutional_tabs')
                ->tabs([

                    Tabs\Tab::make('Mot du Directeur')
                        ->schema([
                            TextInput::make('director_title')
                                ->label('Titre')
                                ->required(),

                            TextInput::make('director_subtitle')
                                ->label('Sous-titre'),

                            RichEditor::make('director_content')
                                ->label('Contenu')
                                ->required()
                                ->fileAttachmentsDisk('public')
                                ->fileAttachmentsDirectory('institutional/director')
                                ->columnSpanFull(),

                            FileUpload::make('director_image')
                                ->label('Image')
                                ->image()
                                ->disk('public')
                                ->directory('institutional/director'),
                        ]),

                    Tabs\Tab::make('Présentation du Ministre')
                        ->schema([
                            TextInput::make('minister_title')
                                ->label('Titre')
                                ->required(),

                            TextInput::make('minister_subtitle')
                                ->label('Sous-titre'),

                            RichEditor::make('minister_content')
                                ->label('Contenu')
                                ->required()
                                ->fileAttachmentsDisk('public')
                                ->fileAttachmentsDirectory('institutional/minister')
                                ->columnSpanFull(),

                            FileUpload::make('minister_image')
                                ->label('Image')
                                ->image()
                                ->disk('public')
                                ->directory('institutional/minister'),
                        ]),
                ])
                ->columnSpanFull(),
        ]);
    }

    public static function getPages(): array
    {
        return [
            'index'  => Pages\ListInstitutionalMessages::route('/'),
            'create' => Pages\CreateInstitutionalMessage::route('/create'),
            'edit'   => Pages\EditInstitutionalMessage::route('/{record}/edit'),
        ];
    }




}
