<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BlogResource\Pages;
use App\Models\Blog;
use App\Models\BlogCategory;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;

class BlogResource extends Resource
{
    protected static ?string $model = Blog::class;

    protected static ?string $navigationIcon = 'heroicon-o-document-text';
    protected static ?string $navigationLabel = 'Articles';
    protected static ?string $navigationGroup = 'Blog';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                FileUpload::make('image')
                    ->label('Image')
                    ->image()
                    ->directory('blogs')
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
        'h2',
        'h3',
        'bold',
        'italic',
        'underline',
        'strike',
        'link',
        'attachFiles',
        'bulletList',
        'orderedList',
        'blockquote',
        'codeBlock',
        'undo',
        'redo',
    ])
    ->columnSpanFull(),

                Forms\Components\Select::make('blog_category_id')
                    ->label('Catégorie')
                    ->relationship('category', 'name')
                    ->searchable()
                    ->preload()
                    ->createOptionForm([
                        Forms\Components\TextInput::make('name')
                            ->label('Nom de la catégorie')
                            ->required(),
                    ])
                    ->createOptionAction(function ($action) {
                        return $action->label('Ajouter une catégorie');
                    })
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('image')
                    ->disk('public')
                    ->height(50),

                Tables\Columns\TextColumn::make('title')
                    ->searchable(),

                Tables\Columns\TextColumn::make('category.name')
                    ->label('Catégorie'),

                Tables\Columns\TextColumn::make('view_count')
                    ->label('Vues')
                    ->sortable(),

                Tables\Columns\TextColumn::make('created_at')
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
            'index' => Pages\ListBlogs::route('/'),
            'create' => Pages\CreateBlog::route('/create'),
            'edit' => Pages\EditBlog::route('/{record}/edit'),
        ];
    }
}
