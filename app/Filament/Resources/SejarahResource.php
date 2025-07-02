<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SejarahResource\Pages;
use App\Filament\Resources\SejarahResource\RelationManagers;
use App\Models\Sejarah;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SejarahResource extends Resource
{
    protected static ?string $model = Sejarah::class;

    protected static ?string $navigationIcon = 'heroicon-o-book-open';
    protected static ?string $navigationLabel = 'Sejarah';
    protected static ?string $navigationGroup = 'Profile';
    protected static ?int $navigationSort = 1;

    public static function canCreate(): bool
    {
        return !Sejarah::exists(); // Hanya izin create jika belum ada data
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()->limit(1); // Batasi query hanya 1 data
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Latar Belakang')
                    ->schema([
                        Forms\Components\Textarea::make('latar_belakang')
                            ->label('Latar Belakang')
                            ->required()
                            ->columnSpanFull()
                            ->rows(8) // Tinggi textarea
                            ->maxLength(1000) // Batas karakter
                            ->placeholder('Tulis Latar Belakang disini...')
                            ->extraInputAttributes(['style' => 'min-height: 200px; white-space: pre-line;']),
                    ]),

                Forms\Components\Section::make('Linimasa Sejarah')
                    ->schema([
                        Forms\Components\Repeater::make('timeline')
                            ->schema([
                                Forms\Components\TextInput::make('year')
                                    ->label('Tahun')
                                    ->required()
                                    ->maxLength(4)
                                    ->placeholder('Contoh: 2013'),

                                Forms\Components\TextInput::make('title')
                                    ->label('Judul Peristiwa')
                                    ->required()
                                    ->maxLength(100)
                                    ->placeholder('Contoh: Pembentukan Kantor'),

                                Forms\Components\Textarea::make('description')
                                    ->label('Deskripsi')
                                    ->required()
                                    ->maxLength(500)
                                    ->columnSpanFull()
                                    ->placeholder('Deskripsi lengkap peristiwa'),

                                Forms\Components\Select::make('icon')
                                    ->label('Icon')
                                    ->options([
                                        'heroicon-o-building-office' => 'Gedung',
                                        'heroicon-o-user-group' => 'Personel',
                                        'heroicon-o-flag' => 'Peristiwa',
                                        'heroicon-o-trophy' => 'Penghargaan',
                                        'heroicon-o-bookmark' => 'Program',
                                    ])
                                    ->columnSpanFull()
                                    ->default('heroicon-o-bookmark'),
                            ])
                            ->columns(2)
                            ->grid(2)
                            ->itemLabel(fn(array $state): ?string => $state['year'] . ' - ' . $state['title'] ?? null)
                            ->collapsible()
                            ->collapsed()
                            ->addActionLabel('Tambah Peristiwa')
                            ->columnSpanFull(),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('latar_belakang')
                    ->label('Latar Belakang')
                    ->limit(50)
                    ->html()
                    ->toggleable(),

                Tables\Columns\TextColumn::make('timeline')
                    ->label('Jumlah Peristiwa')
                    ->formatStateUsing(fn($state) => is_array($state) ? count($state) : 0),

            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                // Tables\Actions\DeleteBulkAction::make(),
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
            'index' => Pages\ListSejarahs::route('/'),
            // 'create' => Pages\CreateSejarah::route('/create'),
            'edit' => Pages\EditSejarah::route('/{record}/edit'),
        ];
    }
}
