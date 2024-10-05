<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ComprasResource\Pages;
use App\Filament\Resources\ComprasResource\RelationManagers;
use App\Models\Compras;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ComprasResource extends Resource
{
    protected static ?string $model = Compras::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\Select::make('producto_id')
                ->relationship('producto', 'nombre')
                ->required(),
            Forms\Components\Select::make('provedor_id')
                ->relationship('provedor', 'nombre')
                ->required(),
            Forms\Components\TextInput::make('cantidad')->required()->numeric(),
            Forms\Components\TextInput::make('valor_unidad')->required()->numeric(),
            Forms\Components\TextInput::make('precio_compra')->required()->numeric(),
            Forms\Components\DatePicker::make('fecha_compra')->required(),
            Forms\Components\FileUpload::make('soporte_compra')->required()->disk('public'),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('producto.nombre')->label('Producto'),
                Tables\Columns\TextColumn::make('provedor.nombre')->label('Proveedor'),
                Tables\Columns\TextColumn::make('cantidad')->label('Cantidad'),
                Tables\Columns\TextColumn::make('valor_unidad')->label('Valor por Unidad'),
                Tables\Columns\TextColumn::make('precio_compra')->label('Precio de Compra'),
                Tables\Columns\TextColumn::make('fecha_compra')->label('Fecha de Compra'),
                Tables\Columns\TextColumn::make('soporte_compra')->label('Soporte de Compra'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
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
            'index' => Pages\ListCompras::route('/'),
            'create' => Pages\CreateCompras::route('/create'),
            'edit' => Pages\EditCompras::route('/{record}/edit'),
        ];
    }
}
