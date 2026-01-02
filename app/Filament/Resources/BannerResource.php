<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BannerResource\Pages;
use Filament\Forms\Components\FileUpload;
use App\Models\Banner;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;


class BannerResource extends Resource
{
    protected static ?string $model = Banner::class;

    protected static ?string $navigationIcon = 'heroicon-o-photo';
    protected static ?string $navigationLabel = 'Bannières';
    protected static ?string $pluralModelLabel = 'Bannières';
    protected static ?string $modelLabel = 'Bannière';
    protected static ?string $navigationGroup = 'Contenu du site';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Contenu de la bannière')
                    ->schema([
                        FileUpload::make('image')
                            ->label('Image de la bannière')
                            ->image()
                            ->imageEditor()
                            ->directory('banners')
                            ->visibility('public')
                            ->imagePreviewHeight('200')
                            ->required(),
                    ]),

                Forms\Components\Section::make('Contenu de la bannière')
                    ->schema([
                        Forms\Components\TextInput::make('title')
                            ->label('Titre')
                            ->required()
                            ->maxLength(255),

                        Forms\Components\Textarea::make('subtitle')
                            ->label('Sous-titre')
                            ->rows(3),
                    ]),

                Forms\Components\Section::make('Bouton 1')
                    ->schema([
                        Forms\Components\TextInput::make('button_one_text')
                            ->label('Texte du bouton'),

                        Forms\Components\TextInput::make('button_one_link')
                            ->label('Lien de redirection')
                            ->url(),
                    ])
                    ->columns(2),

                Forms\Components\Section::make('Bouton 2')
                    ->schema([
                        Forms\Components\TextInput::make('button_two_text')
                            ->label('Texte du bouton'),

                        Forms\Components\TextInput::make('button_two_link')
                            ->label('Lien de redirection')
                            ->url(),
                    ])
                    ->columns(2),

                Forms\Components\Toggle::make('is_active')
                    ->label('Bannière active')
                    ->default(true),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('image')
                    ->label('Image')
                    ->disk('public')
                    ->height(60)
                    ->circular(),
                Tables\Columns\TextColumn::make('title')
                    ->label('Titre')
                    ->searchable(),

                Tables\Columns\IconColumn::make('is_active')
                    ->label('Active')
                    ->boolean(),

                Tables\Columns\TextColumn::make('created_at')
                    ->label('Créée le')
                    ->dateTime('d/m/Y'),
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
            'index' => Pages\ListBanners::route('/'),
            'create' => Pages\CreateBanner::route('/create'),
            'edit' => Pages\EditBanner::route('/{record}/edit'),
        ];
    }
}
