<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ObatResource\Pages;
use App\Filament\Resources\ObatResource\RelationManagers;
use App\Models\Obat;
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

class ObatResource extends Resource
{
    protected static ?string $model = Obat::class;

    protected static ?string $navigationGroup = "Obat";
    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
        ->schema([
            TextInput::make('nama_obat')
                ->label("Nama Obat")
                ->placeholder("Masukkan nama obat")
                ->required(),
                TextInput::make('deskripsi')
                ->label("Deskripsi Obat")
                ->placeholder("Deskripsikan Buah Anda")
                ->required(),
                Select::make('id_jenis')
                            ->required()
                            ->label("Jenis Obat")
                            ->relationship('obatJenis', 'jenis'),
            FileUpload::make('photo_obat')
                ->required()
                ->label("Poto Obat")
                ->image()
                ->columnSpan(2)
                ->directory('obat'),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
        ->columns([
            ImageColumn::make('photo_obat')->label("Poto Obat"),
            TextColumn::make('nama_obat')->searchable()->label("Nama Obat"),
            TextColumn::make('obatJenis.jenis')->sortable()->label("Jenis Obat")->searchable(),
            TextColumn::make('deskripsi')->sortable()->label("Deskripsi Obat")->searchable(),
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
            'index' => Pages\ListObats::route('/'),
            'create' => Pages\CreateObat::route('/create'),
            'edit' => Pages\EditObat::route('/{record}/edit'),
        ];
    }
}
