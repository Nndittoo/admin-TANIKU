<?php

namespace App\Filament\Resources;

use App\Filament\Resources\FungsiObatResource\Pages;
use App\Filament\Resources\FungsiObatResource\RelationManagers;
use App\Models\FungsiObat;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class FungsiObatResource extends Resource
{
    protected static ?string $model = FungsiObat::class;
    protected static ?string $navigationGroup = "Obat";

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
        ->schema([
            Select::make('id_obat')
                ->required()
                ->label("Nama Obat")
                ->relationship('fungsiObat', 'nama_obat'),
            TextInput::make('fungsi')
                ->label("Fungsi Obat")
                ->placeholder("Masukkan fungsi obat")
                ->required(),
            FileUpload::make('poto_fungsi')
                ->required()
                ->label("Poto Fungsi Obat")
                ->image()
                ->columnSpan(2)
                ->directory('fungsi'),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
        ->columns([
            ImageColumn::make('poto_fungsi')->label("Poto Fungsi Obat"),
            TextColumn::make('fungsi')->searchable()->label("Fungsi Obat"),
            TextColumn::make('fungsiObat.nama_obat')->sortable()->label("Nama Obat")->searchable(),
        ])
        ->filters([
            //
        ])
        ->actions([
            Tables\Actions\ActionGroup::make([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
                ])
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
            'index' => Pages\ListFungsiObats::route('/'),
            'create' => Pages\CreateFungsiObat::route('/create'),
            'edit' => Pages\EditFungsiObat::route('/{record}/edit'),
        ];
    }
}
