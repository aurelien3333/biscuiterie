<?php

namespace App\Filament\Resources\BiscuitResource\RelationManagers;

use App\Models\Fournisseur;
use Filament\Forms;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Form;
use Filament\Resources\RelationManagers\BelongsToManyRelationManager;
use Filament\Resources\Table;
use Filament\Tables;

class IngredientsRelationManager extends BelongsToManyRelationManager
{
    protected static string $relationship = 'ingredients';

    protected static ?string $recordTitleAttribute = 'name';
    protected static bool $shouldPreloadAttachFormRecordSelectOptions = true;


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
                Tables\Columns\TextColumn::make('name'),
                Tables\Columns\TextColumn::make('fournisseur.name'),
            ])
            ->filters([
                //
            ]);
    }
}
