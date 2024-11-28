<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BuahResource\Pages;
use App\Filament\Resources\BuahResource\RelationManagers;
use App\Models\Buah;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;

class BuahResource extends Resource
{
    protected static ?string $model = Buah::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
        ->schema([
            TextInput::make('nama_buah')
                ->label("Nama Buah")
                ->placeholder("Masukkan nama buah")
                ->required(),
                TextInput::make('deskripsi')
                ->label("Deskripsi Buah")
                ->placeholder("Deskripsikan Buah Anda")
                ->required(),
            FileUpload::make('poto_buah')
                ->required()
                ->label("Poto Buah")
                ->image()
                ->columnSpan(2)
                ->directory('buah'),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
        ->columns([
            ImageColumn::make('poto_buah')->label("Poto Buah"),
            TextColumn::make('nama_buah')->searchable()->label("Nama Buah"),
            TextColumn::make('deskripsi')->sortable()->label("Deskripsi Buah")->searchable(),
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
            'index' => Pages\ListBuahs::route('/'),
            'create' => Pages\CreateBuah::route('/create'),
            'edit' => Pages\EditBuah::route('/{record}/edit'),
        ];
    }
}
