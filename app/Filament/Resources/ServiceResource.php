<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ServiceResource\Pages;
use App\Models\Service;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;

class ServiceResource extends Resource
{
    protected static ?string $model = Service::class;

    protected static ?string $navigationIcon = 'heroicon-o-briefcase';
    protected static ?string $navigationLabel = 'Services';
    protected static ?string $navigationGroup = 'Contenu du site';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Service')
                    ->schema([
                        FileUpload::make('image')
                            ->label('Image')
                            ->image()
                            ->directory('services')
                            ->visibility('public')
                            ->imageEditor()
                            ->imagePreviewHeight('200'),

                        Forms\Components\TextInput::make('title')
                            ->label('Titre')
                            ->required()
                            ->maxLength(255),

                        RichEditor::make('description')
                        ->label('Description')
                        ->required()
                        ->fileAttachmentsDisk('public')
                        ->fileAttachmentsDirectory('blogs')
                        ->toolbarButtons([
                            'bold',
                            'italic',
                            'underline',
                            'strike',
                            'link',
                            'bulletList',
                            'orderedList',
                            'blockquote',
                            'codeBlock',
                            'h2',
                            'h3',
                            'redo',
                            'undo',
                        ])
                        ->columnSpanFull(),

                        Forms\Components\TagsInput::make('departments')
                            ->label('Départements')
                            ->placeholder('Ex: Rééducation, Kinésithérapie, Orthopédie')
                            ->suggestions([
                                'Médecine Physique',
                                'Rééducation Fonctionnelle',
                                'Kinésithérapie',
                                'Appareillage Orthopédique',
                                'Orthopédie',
                                'Réadaptation',
                            ]),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('image')
                    ->label('Image')
                    ->disk('public')
                    ->height(60),

                Tables\Columns\TextColumn::make('title')
                    ->label('Titre')
                    ->searchable(),

                Tables\Columns\TagsColumn::make('departments')
                    ->label('Départements'),

                Tables\Columns\TextColumn::make('created_at')
                    ->label('Créé le')
                    ->date('d/m/Y'),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->defaultSort('created_at', 'desc');
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListServices::route('/'),
            'create' => Pages\CreateService::route('/create'),
            'edit' => Pages\EditService::route('/{record}/edit'),
        ];
    }
}
