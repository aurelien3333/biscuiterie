<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BiscuitResource\Pages;
use App\Filament\Resources\BiscuitResource\RelationManagers;
use App\Models\Biscuit;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;

class BiscuitResource extends Resource
{
    protected static ?string $model = Biscuit::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')
                    ->label('Nom du biscuit')
                    ->required(),

               Textarea::make('description')
                    ->label('Description')
                    ->required(),
                FileUpload::make('attachment')
                    ->disk('public')
                    ->directory('biscuits')
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
            ])
            ->filters([
                //
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListBiscuits::route('/'),
            'create' => Pages\CreateBiscuit::route('/create'),
            'edit' => Pages\EditBiscuit::route('/{record}/edit'),
        ];
    }
}
