<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PostingResource\Pages;
use App\Filament\Resources\PostingResource\RelationManagers;
use App\Models\Posting;
use Filament\Forms;
use Filament\Forms\Components\DateTimePicker;
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

class PostingResource extends Resource
{
    protected static ?string $model = Posting::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
        ->schema([
            Select::make('id_user')
            ->label("Creator")
            ->relationship('postingUser', 'name'),
            FileUpload::make('gambar_postingan')
           ->required()
           ->label("Posting")
           ->image()
           ->directory('posting'),
            TextInput::make('deskripsi')
            ->label("Deskripsi Postingan")
            ->placeholder("Deskripsi Postingan")
            ->required(),
            DateTimePicker::make('dibuat')
            ->label("Jam Posting")
            ->default(now())
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
        ->columns([
            ImageColumn::make('gambar_postingan')->label("Posts"),
            TextColumn::make('postingUser.name')->searchable()->label("Creator")->sortable(),
            TextColumn::make('deskripsi')->sortable()->label("Deskripsi Post")->searchable(),
            TextColumn::make('dibuat')->sortable()->label("Waktu Post")->searchable(),
            TextColumn::make('like')->sortable()->label("Total Likes")->searchable(),
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
            'index' => Pages\ListPostings::route('/'),
            'create' => Pages\CreatePosting::route('/create'),
            'edit' => Pages\EditPosting::route('/{record}/edit'),
        ];
    }
}
