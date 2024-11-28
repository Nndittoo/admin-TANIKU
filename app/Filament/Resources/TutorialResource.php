<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TutorialResource\Pages;
use App\Filament\Resources\TutorialResource\RelationManagers;
use App\Models\Tutorial;
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

class TutorialResource extends Resource
{
    protected static ?string $model = Tutorial::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('id_obat')
                ->label("Nama Obat")
                ->relationship('tutorialObat', 'nama_obat'),
                Select::make('id_buah')
                ->label("Nama Buah")
                ->relationship('tutorialBuah', 'nama_buah'),
                FileUpload::make('photo_creator')
               ->required()
               ->label("Poto Creator")
               ->image()
               ->directory('creator'),
                TextInput::make('creator')
                ->label("Creator Tutorial")
                ->placeholder("Masukkan nama creator")
                ->required(),
                TextInput::make('judul')
                ->label("Judul Tutorial")
                ->placeholder("Masukkan Judul Tutorial")
                ->required(),
                TextInput::make('deskripsi')
                ->label("Deskripsi Tutorial")
                ->placeholder("Masukkan Deskripsi Tutorial")
                ->required(),
                FileUpload::make('video')
               ->required()
               ->label("Video Tutorial")
               ->columnSpan(2)
               ->directory('tutorial'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
        ->columns([
            ImageColumn::make('video')->label("Video"),
            TextColumn::make('judul')->searchable()->label("Judul Tutorial"),
            TextColumn::make('creator')->searchable()->label("Creator")->searchable(),
            TextColumn::make('tutorialObat.nama_obat')->sortable()->label("Nama Obat")->searchable(),
            TextColumn::make('tutorialBuah.nama_buah')->sortable()->label("Nama Buah")->searchable(),
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
            'index' => Pages\ListTutorials::route('/'),
            'create' => Pages\CreateTutorial::route('/create'),
            'edit' => Pages\EditTutorial::route('/{record}/edit'),
        ];
    }
}
