<?php

namespace App\Filament\Resources;

use App\Filament\Resources\VisiMisiResource\Pages;
use App\Filament\Resources\VisiMisiResource\RelationManagers;
use App\Models\VisiMisi;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class VisiMisiResource extends Resource
{
    protected static ?string $model = VisiMisi::class;

    protected static ?string $navigationIcon = 'heroicon-o-document-text';
    protected static ?string $navigationLabel = 'Visi & Misi';
    protected static ?string $navigationGroup = 'Profile';
    protected static ?int $navigationSort = 2;

    public static function canCreate(): bool
    {
        return !VisiMisi::exists(); // Hanya izin create jika belum ada data
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()->limit(1); // Batasi query hanya 1 data
    }

    public static function form(Form $form): Form
    {
         return $form
            ->schema([
                Forms\Components\Section::make('Visi')
                    ->schema([
                        Forms\Components\Textarea::make('visi')
                            ->label('Visi')
                            ->required()
                            ->columnSpanFull()
                    ]),

                Forms\Components\Section::make('Misi')
                    ->schema([
                        Forms\Components\RichEditor::make('misi')
                            ->label('Misi')
                            ->required()
                            ->columnSpanFull()
                            ->toolbarButtons([
                                'bold', 'italic', 'link',
                                'orderedList', 'bulletList'
                            ])
                    ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('visi')
                    ->label('Visi')
                    ->html()
                    ->limit(50)
                    ->toggleable(),

                Tables\Columns\TextColumn::make('misi')
                    ->label('Misi')
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
            'index' => Pages\ListVisiMisis::route('/'),
            // 'create' => Pages\CreateVisiMisi::route('/create'),
            'edit' => Pages\EditVisiMisi::route('/{record}/edit'),
        ];
    }
}
