<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SettingResource\Pages;
use App\Models\Setting;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms\Components\FileUpload;

class SettingResource extends Resource
{
    protected static ?string $model = Setting::class;

    protected static ?string $navigationIcon = 'heroicon-o-cog-6-tooth';
    protected static ?string $navigationLabel = 'Paramètres';
    protected static ?string $navigationGroup = 'Configuration';
    protected static ?string $modelLabel = 'Paramètres du site';
    protected static ?string $pluralModelLabel = 'Paramètres du site';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Identité visuelle')
                    ->schema([
                        FileUpload::make('logo')
                            ->label('Logo')
                            ->image()
                            ->directory('settings')
                            ->visibility('public')
                            ->imagePreviewHeight('120')
                            ->imageEditor(),
                    ]),

                Forms\Components\Section::make('Description')
                    ->schema([
                        Forms\Components\Textarea::make('description')
                            ->label('Petite description')
                            ->rows(4),
                    ]),

                Forms\Components\Section::make('Contacts')
                    ->schema([
                        Forms\Components\TextInput::make('phone_one')
                            ->label('Téléphone 1'),

                        Forms\Components\TextInput::make('phone_two')
                            ->label('Téléphone 2'),

                        Forms\Components\TextInput::make('email_one')
                            ->label('Email 1')
                            ->email(),

                        Forms\Components\TextInput::make('email_two')
                            ->label('Email 2')
                            ->email(),

                        Forms\Components\Textarea::make('address')
                            ->label('Adresse')
                            ->rows(2),
                    ])
                    ->columns(2),

                Forms\Components\Section::make('Réseaux sociaux')
                    ->schema([
                        Forms\Components\TextInput::make('facebook')
                            ->label('Facebook')
                            ->url(),

                        Forms\Components\TextInput::make('twitter')
                            ->label('X (Twitter)')
                            ->url(),

                        Forms\Components\TextInput::make('instagram')
                            ->label('Instagram')
                            ->url(),

                        Forms\Components\TextInput::make('linkedin')
                            ->label('LinkedIn')
                            ->url(),

                        Forms\Components\TextInput::make('tiktok')
                            ->label('TikTok')
                            ->url(),
                    ])
                    ->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('logo')
                    ->square()
                    ->label('Logo')
                    ->disk('public')
                    ->height(50),

                Tables\Columns\TextColumn::make('phone_one')
                    ->label('Téléphone'),

                Tables\Columns\TextColumn::make('email_one')
                    ->label('Email'),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->paginated(false);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListSettings::route('/'),
            'edit' => Pages\EditSetting::route('/{record}/edit'),
        ];
    }
}
