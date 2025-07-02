<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TungsiResource\Pages;
use App\Filament\Resources\TungsiResource\RelationManagers;
use App\Models\Tungsi;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class TungsiResource extends Resource
{
    protected static ?string $model = Tungsi::class;

    protected static ?string $navigationIcon = 'heroicon-o-briefcase';
    protected static ?string $navigationLabel = 'Tugas & Fungsi';
    protected static ?string $navigationGroup = 'Profile';
    protected static ?int $navigationSort = 3;

    public static function canCreate(): bool
    {
        return !Tungsi::exists(); // Hanya izin create jika belum ada data
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()->limit(1); // Batasi query hanya 1 data
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Tugas')
                    ->schema([
                        Forms\Components\RichEditor::make('tugas')
                            ->label('')
                            ->required()
                            ->columnSpanFull()
                            ->toolbarButtons([
                                'bold',
                                'italic',
                                'link',
                                'orderedList',
                                'bulletList'
                            ])
                    ]),

                Forms\Components\Section::make('Fungsi')
                    ->schema([
                        Forms\Components\RichEditor::make('fungsi')
                            ->label('')
                            ->required()
                            ->columnSpanFull()
                            ->toolbarButtons([
                                'bold',
                                'italic',
                                'link',
                                'orderedList',
                                'bulletList'
                            ])
                    ])
            ]);
    }

    public static function table(Table $table): Table
    {
         return $table
            ->columns([
                Tables\Columns\TextColumn::make('tugas')
                    ->label('Tugas')
                    ->html()
                    ->limit(50)
                    ->toggleable(),

                Tables\Columns\TextColumn::make('fungsi')
                    ->label('Fungsi')
                    ->html()
                    ->limit(50)
                    ->toggleable(),

                Tables\Columns\TextColumn::make('updated_at')
                    ->label('Terakhir Diupdate')
                    ->dateTime('d F Y H:i')
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
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
            'index' => Pages\ListTungsis::route('/'),
            // 'create' => Pages\CreateTungsi::route('/create'),
            'edit' => Pages\EditTungsi::route('/{record}/edit'),
        ];
    }
}
