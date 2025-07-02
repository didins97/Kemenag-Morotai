<?php

namespace App\Filament\Resources;

use App\Filament\Resources\KontakResource\Pages;
use App\Filament\Resources\KontakResource\RelationManagers;
use App\Models\Kontak;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class KontakResource extends Resource
{
    protected static ?string $model = Kontak::class;

    protected static ?string $navigationIcon = 'heroicon-o-tag';
    protected static ?string $navigationGroup = 'Settings';
    protected static ?string $navigationLabel = 'Kontak';
    protected static ?int $navigationSort = 1;

    public static function canCreate(): bool
    {
        return !Kontak::exists(); // Hanya izin create jika belum ada data
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()->limit(1); // Batasi query hanya 1 data
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Informasi Kontak')
                    ->columns(2)
                    ->schema([
                        Forms\Components\TextInput::make('no_telepon')
                            ->label('Nomor Telepon/WhatsApp')
                            ->required()
                            ->maxLength(20)
                            ->prefix('+62')
                            ->tel()
                            ->columnSpan(1)
                            ->placeholder('812-3456-7890'),

                        Forms\Components\TextInput::make('email')
                            ->label('Alamat Email')
                            ->email()
                            ->required()
                            ->maxLength(100)
                            ->columnSpan(1)
                            ->placeholder('contoh@perusahaan.com')
                            ->suffixIcon('heroicon-o-envelope'),
                    ]),

                Forms\Components\Section::make('Alamat dan Jam Operasional')
                    ->schema([
                        Forms\Components\Textarea::make('alamat')
                            ->label('Alamat Lengkap')
                            ->required()
                            ->rows(3)
                            ->columnSpanFull()
                            ->placeholder('Jl. Contoh No. 123, Kota/Kabupaten, Provinsi')
                            ->maxLength(255),

                        Forms\Components\TextInput::make('jam_kerja')
                            ->label('Jam Kerja/Buka')
                            ->required()
                            ->maxLength(50)
                            ->columnSpanFull()
                            ->placeholder('Senin-Jumat: 08:00 - 17:00 WIB')
                            ->suffixIcon('heroicon-o-clock'),
                    ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                // Tables\Actions\BulkActionGroup::make([
                //     Tables\Actions\DeleteBulkAction::make(),
                // ]),
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
            'index' => Pages\ListKontaks::route('/'),
            'create' => Pages\CreateKontak::route('/create'),
            'edit' => Pages\EditKontak::route('/{record}/edit'),
        ];
    }
}
