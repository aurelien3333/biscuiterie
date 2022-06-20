<?php

namespace App\Filament\Resources;

use App\Filament\Resources\IngredientResource\Pages;
use App\Filament\Resources\IngredientResource\RelationManagers;
use App\Models\Fournisseur;
use App\Models\Ingredient;
use Filament\Forms;
use Filament\Forms\Components\BelongsToManyMultiSelect;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;

class IngredientResource extends Resource
{
    protected static ?string $model = Ingredient::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')
                    ->label('Nom de l\'ingrédient')
                    ->required(),
                TextInput::make('unite')
                    ->label('Unité')
                    ->required(),
                TextInput::make('cdt')
                    ->label('Conditionnement')
                    ->rules('numeric')
                    ->required(),
                TextInput::make('price_ht')
                    ->label('Prix HT')
                    ->rules('numeric')
                    ->required(),
                TextInput::make('tva')
                    ->label('TVA')
                    ->rules('numeric')
                    ->required(),
                TextInput::make('url')
                    ->label('Url'),
                Textarea::make('description')
                    ->label('Description'),
                Select::make('fournisseur_id')
                    ->label('Fournisseur')
                    ->required()
                    ->options(Fournisseur::all()->pluck('name', 'id'))
                    ->searchable()

            ]);

    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->searchable()
                    ->label("Nom de l'ingredient")
                    ->sortable(),
                TextColumn::make('Conditionnement')
                    ->label("CDT"),
                TextColumn::make('price_unite_ttc')
                    ->label("Prix unitaire TTC"),
                TextColumn::make('fournisseur.name')
                    ->searchable()
                    ->label("Fournisseur"),
                TextColumn::make('price_ht')
                    ->label("Prix HT"),
                TextColumn::make('tva')
                    ->label("TVA"),
                TextColumn::make('price_ttc')
                    ->label("Prix TTC"),

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
            'index' => Pages\ListIngredients::route('/'),
            'create' => Pages\CreateIngredient::route('/create'),
            'edit' => Pages\EditIngredient::route('/{record}/edit'),
        ];
    }
}
