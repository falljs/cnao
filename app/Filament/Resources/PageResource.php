<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PageResource\Pages;
use App\Models\Page;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class PageResource extends Resource
{
    protected static ?string $model = Page::class;

    protected static ?string $navigationIcon = 'heroicon-o-document-text';
    protected static ?string $navigationLabel = 'Pages du site';
    protected static ?string $pluralLabel = 'Pages';

    public static function getNavigationUrl(): string
    {
        $page = Page::first();

        return $page
            ? static::getUrl('edit', ['record' => $page])
            : static::getUrl('create');
    }


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Tabs::make('Pages')
                    ->tabs([

                        Forms\Components\Tabs\Tab::make('À propos')
                            ->schema([
                                Forms\Components\RichEditor::make('about')
                                    ->label('Contenu – À propos')
                                    ->fileAttachmentsDisk('public')
                                    ->fileAttachmentsDirectory('pages/about')
                                    ->columnSpanFull(),
                            ]),

                        Forms\Components\Tabs\Tab::make('Organisation du CNAO')
                            ->schema([
                                Forms\Components\RichEditor::make('organisation')
                                    ->label('Contenu – Organisation du CNAO')
                                    ->fileAttachmentsDisk('public')
                                    ->fileAttachmentsDirectory('pages/organisation')
                                    ->columnSpanFull(),
                            ]),

                        Forms\Components\Tabs\Tab::make('READAPT’Actu')
                            ->schema([
                                Forms\Components\RichEditor::make('readapt_actu')
                                    ->label('Contenu – READAPT’Actu')
                                    ->fileAttachmentsDisk('public')
                                    ->fileAttachmentsDirectory('pages/readapt-actu')
                                    ->columnSpanFull(),
                            ]),
                    ])
                    ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id')->label('#'),
                Tables\Columns\TextColumn::make('updated_at')
                    ->label('Dernière mise à jour')
                    ->dateTime()
                    ->sortable(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPages::route('/'),
            'create' => Pages\CreatePage::route('/create'),
            'edit' => Pages\EditPage::route('/{record}/edit'),
        ];
    }
}
