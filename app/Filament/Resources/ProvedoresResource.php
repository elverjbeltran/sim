<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProvedoresResource\Pages;
use App\Filament\Resources\ProvedoresResource\RelationManagers;
use App\Models\Provedores;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ProvedoresResource extends Resource
{
    protected static ?string $model = Provedores::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\TextInput::make('nombre')->required()->maxLength(255),
            Forms\Components\TextInput::make('nit')->required()->unique()->maxLength(50),
            Forms\Components\TextInput::make('mail')->email()->required()->maxLength(255),
            Forms\Components\TextInput::make('tel')->nullable()->maxLength(15),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nombre')->label('Nombre'),
                Tables\Columns\TextColumn::make('nit')->label('NIT'),
                Tables\Columns\TextColumn::make('mail')->label('Email'),
                Tables\Columns\TextColumn::make('tel')->label('Teléfono'),
            ])
            ->filters([
                // Puedes agregar filtros aquí
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
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
            'index' => Pages\ListProvedores::route('/'),
            'create' => Pages\CreateProvedores::route('/create'),
            'edit' => Pages\EditProvedores::route('/{record}/edit'),
        ];
    }
}
