<?php

namespace App\Filament\Resources;

use App\Filament\Resources\VentasResource\Pages;
use App\Filament\Resources\VentasResource\RelationManagers;
use App\Models\Ventas;
use Filament\Forms;
use App\Models\Producto;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class VentasResource extends Resource
{
    protected static ?string $model = Ventas::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        
        return $form->schema([
            Forms\Components\Select::make('producto_id')
                ->required()
                ->relationship('producto', 'nombre'),
            Forms\Components\Select::make('cliente_id')
                ->required()
                ->relationship('cliente', 'nombre'),
            Forms\Components\TextInput::make('cantidad')
                ->required()
                ->numeric(),
            Forms\Components\TextInput::make('precio_venta')
                ->required()
                ->numeric(),
            Forms\Components\DatePicker::make('fecha_venta')
                ->required(),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('producto.nombre')->label('Producto'),
                Tables\Columns\TextColumn::make('cliente.nombre')->label('Cliente'),
                Tables\Columns\TextColumn::make('cantidad')->label('Cantidad'),
                Tables\Columns\TextColumn::make('precio_venta')->label('Precio de Venta'),
                Tables\Columns\TextColumn::make('fecha_venta')->label('Fecha de Venta'),
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
            'index' => Pages\ListVentas::route('/'),
            'create' => Pages\CreateVentas::route('/create'),
            'edit' => Pages\EditVentas::route('/{record}/edit'),
        ];
    }
    
}
