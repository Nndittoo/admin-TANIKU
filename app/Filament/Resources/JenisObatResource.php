<?php

namespace App\Filament\Resources;

use App\Filament\Resources\JenisObatResource\Pages;
use App\Filament\Resources\JenisObatResource\RelationManagers;
use App\Models\JenisObat;
use Filament\Forms;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class JenisObatResource extends Resource
{
    protected static ?string $model = JenisObat::class;
    protected static ?string $navigationGroup = "Obat";

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
        ->schema([
            TextInput::make('jenis')
                ->required()
                ->label('Jenis Obat')
                ->unique(ignoreRecord: true),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
        ->columns([
            TextColumn::make('jenis')->sortable()->searchable(),
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
            'index' => Pages\ListJenisObats::route('/'),
            'create' => Pages\CreateJenisObat::route('/create'),
            'edit' => Pages\EditJenisObat::route('/{record}/edit'),
        ];
    }
}
