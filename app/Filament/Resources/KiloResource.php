<?php

namespace App\Filament\Resources;

use App\Filament\Resources\KiloResource\Pages;
use App\Filament\Resources\KiloResource\RelationManagers;
use App\Models\Kilo;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\TimePicker;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class KiloResource extends Resource
{
    protected static ?string $model = Kilo::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
        ->schema([
            Select::make('id_buah')
                ->required()
                ->label("Barang Yang Dijual")
                ->relationship('kiloBuah', 'nama_buah'),
            Select::make('id_pajak')
                ->required()
                ->label("Nama Pajak")
                ->relationship('kiloPajak', 'pajak'),
            TextInput::make('nama_kilo')
                ->label("Nama Kilo")
                ->placeholder( "Masukkan Nama Kilo")
                ->required(),
            TextInput::make('nama_pemilik')
                ->label("Nama Pemilik")
                ->placeholder( "Masukkan Nama Pemilik Kilo")
                ->required(),
            TextInput::make('hp')
                ->label("Nomor Handphone")
                ->numeric()
                ->placeholder("Masukkan Handphone Pemilik Kilo")
                ->required(),
            TimePicker::make('jam_buka')
            ->label('Jam Buka')
            ->required(),
            FileUpload::make('poto_kilo')
                ->required()
                ->label("Poto Kilo")
                ->image()
                ->columnSpan(2)
                ->directory('kilo'),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('poto_kilo')->label("Poto Kilo"),
                TextColumn::make('nama_kilo')->searchable()->label("Judul Tutorial"),
                TextColumn::make('nama_pemilik')->searchable()->label("Creator")->searchable(),
                TextColumn::make('hp')->sortable()->label("No Hp")->searchable(),
                TextColumn::make('jam_buka')->sortable()->label("Jam Buka")->searchable(),
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
            'index' => Pages\ListKilos::route('/'),
            'create' => Pages\CreateKilo::route('/create'),
            'edit' => Pages\EditKilo::route('/{record}/edit'),
        ];
    }
}
