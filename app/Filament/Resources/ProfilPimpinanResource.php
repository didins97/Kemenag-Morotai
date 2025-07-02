<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProfilPimpinanResource\Pages;
use App\Filament\Resources\ProfilPimpinanResource\RelationManagers;
use App\Models\ProfilPimpinan;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ProfilPimpinanResource extends Resource
{
    protected static ?string $model = ProfilPimpinan::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-circle';
    protected static ?string $navigationLabel = 'Profil Pimpinan';
    protected static ?string $navigationGroup = 'Profile';
    protected static ?int $navigationSort = 6;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Informasi Pimpinan')
                    ->schema([
                        Forms\Components\TextInput::make('nama')
                            ->label('Nama Lengkap')
                            ->required()
                            ->maxLength(255)
                            ->placeholder('Nama lengkap beserta gelar'),

                        Forms\Components\FileUpload::make('foto')
                            ->label('Foto Profil')
                            ->image()
                            ->directory('profil-pimpinan')
                            ->imageEditor()
                            ->imageCropAspectRatio('3:4')
                            ->imageResizeMode('cover')
                            ->imagePreviewHeight('400')
                            ->required()
                            ->columnSpanFull(),

                        Forms\Components\Textarea::make('sambutan')
                            ->label('Sambutan')
                            ->required()
                            ->columnSpanFull()
                            ->rows(8) // Tinggi textarea
                            ->maxLength(1000) // Batas karakter
                            ->placeholder('Tulis sambutan disini...')
                            ->extraInputAttributes(['style' => 'min-height: 200px; white-space: pre-line;']),
                    ])
                    ->columns(1),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('foto')
                    ->label('Foto')
                    ->circular(),

                Tables\Columns\TextColumn::make('nama')
                    ->label('Nama')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('created_at')
                    ->label('Dibuat')
                    ->dateTime('d/m/Y')
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->emptyStateActions([
                Tables\Actions\CreateAction::make(),
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
            'index' => Pages\ListProfilPimpinans::route('/'),
            'create' => Pages\CreateProfilPimpinan::route('/create'),
            'edit' => Pages\EditProfilPimpinan::route('/{record}/edit'),
        ];
    }
}
