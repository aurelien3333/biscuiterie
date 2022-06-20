<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BiscuitResource\Pages;
use App\Filament\Resources\BiscuitResource\RelationManagers;
use App\Filament\Resources\BiscuitResource\RelationManagers\IngredientsRelationManager;
use App\Models\Biscuit;
use App\Models\Fournisseur;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Components\Select;
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
                    ->label('Description'),

                FileUpload::make('Image')
                    ->disk('public')
                    ->directory('biscuits'),

                TextInput::make('qte')
                    ->label('Nb par venue')
                    ->rules('required|integer|min:1')
                    ->required(),
                TextInput::make('price_emballage')
                    ->label('Prix emballage')
                    ->rules('required|numeric')
                    ->required(),
                TextInput::make('pourcentage_energie')
                    ->label('Cout électricité en %')
                    ->rules('required|numeric|max:100')
                    ->required(),
                TextInput::make('price_vente')
                    ->label('Prix de vente unitaire')
                    ->rules('required|numeric')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name'),
            ])
            ->filters([
                //
            ]);
    }

    public static function getRelations(): array
    {
        return [
            IngredientsRelationManager::class
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
