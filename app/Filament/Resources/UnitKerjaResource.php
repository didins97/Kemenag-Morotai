<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UnitKerjaResource\Pages;
use App\Filament\Resources\UnitKerjaResource\RelationManagers;
use App\Models\UnitKerja;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms\Components\Tabs;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class UnitKerjaResource extends Resource
{
    protected static ?string $model = UnitKerja::class;

    protected static ?string $navigationIcon = 'heroicon-o-building-office';
    protected static ?string $navigationLabel = 'Unit Kerja';
    protected static ?string $navigationGroup = 'Profile';
    protected static ?int $navigationSort = 5;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Tabs::make('UnitKerjaTabs')
                    ->tabs([
                        Tabs\Tab::make('Identitas Unit')
                            ->icon('heroicon-o-identification')
                            ->schema([
                                self::getIdentitySection(),
                            ]),

                        Tabs\Tab::make('Profil & Tugas')
                            ->icon('heroicon-o-document-text')
                            ->schema([
                                self::getProfileSection(),
                            ]),

                        Tabs\Tab::make('Struktur Kepemimpinan')
                            ->icon('heroicon-o-user-circle')
                            ->schema([
                                self::getLeadershipSection(),
                            ]),

                        Tabs\Tab::make('Anggota Tim')
                            ->icon('heroicon-o-user-group')
                            ->schema([
                                self::getTeamSection(),
                            ]),
                    ])
                    ->columnSpanFull()
                    ->persistTabInQueryString()
            ]);
    }

    protected static function getIdentitySection(): Forms\Components\Section
    {
        return Forms\Components\Section::make('Informasi Dasar')
            ->description('Isi data identitas unit kerja')
            ->schema([
                Forms\Components\Grid::make()
                    ->schema([
                        Forms\Components\TextInput::make('nama_unit')
                            ->label('Nama Unit Kerja')
                            ->placeholder('Contoh: Bagian Tata Usaha')
                            ->required()
                            ->maxLength(100)
                            ->live(onBlur: true)
                            ->columnSpan(['md' => 2])
                            ->hint('Maksimal 100 karakter')
                            ->hintIcon('heroicon-o-information-circle')
                            ->prefixIcon('heroicon-o-building-office')
                            ->extraAttributes(['class' => 'font-medium'])
                            ->afterStateUpdated(function ($set, $state) {
                                $set('slug', \Str::slug($state));
                            }),

                        Forms\Components\TextInput::make('urutan')
                            ->label('Prioritas Tampil')
                            ->numeric()
                            ->default(0)
                            ->minValue(0)
                            ->maxValue(100)
                            ->step(1)
                            ->columnSpan(['md' => 1])
                            ->suffixIcon('heroicon-o-queue-list')
                            ->helperText('0 = paling atas')
                            ->extraAttributes(['class' => 'text-center']),

                        Forms\Components\Toggle::make('is_active')
                            ->label('Status Unit')
                            ->onColor('success')
                            ->offColor('danger')
                            ->onIcon('heroicon-o-check-circle')
                            ->offIcon('heroicon-o-x-circle')
                            ->inline(false)
                            ->default(true)
                            ->columnSpan(['md' => 1])
                            ->helperText('Aktif/nonaktifkan unit')
                            ->extraAttributes(['class' => 'justify-center']),
                    ])
                    ->columns(4)
            ])
            ->columns(1);
    }

    protected static function getProfileSection(): Forms\Components\Section
    {
        return Forms\Components\Section::make('Profil Unit')
            ->schema([
                Forms\Components\RichEditor::make('profil')
                    ->label('Profil Singkat')
                    ->toolbarButtons([
                        'bold',
                        'italic',
                        'link',
                        'orderedList',
                        'bulletList'
                    ])
                    ->columnSpanFull(),

                Forms\Components\RichEditor::make('tugas_pokok')
                    ->label('Tugas Pokok')
                    ->toolbarButtons([
                        'bold',
                        'italic',
                        'link',
                        'orderedList',
                        'bulletList'
                    ])
                    ->columnSpanFull(),

                Forms\Components\RichEditor::make('fungsi')
                    ->label('Fungsi')
                    ->toolbarButtons([
                        'bold',
                        'italic',
                        'link',
                        'orderedList',
                        'bulletList'
                    ])
                    ->columnSpanFull(),
            ])
            ->columns(1);
    }

    protected static function getLeadershipSection(): Forms\Components\Section
    {
        return Forms\Components\Section::make('Struktur Kepemimpinan')
            ->description('Daftar pejabat struktural')
            ->schema([
                Forms\Components\Repeater::make('strukturUnit')
                    ->relationship()
                    ->label('')
                    ->addActionLabel('Tambah Pejabat')
                    ->reorderableWithButtons()
                    ->collapsible()
                    ->cloneable()
                    ->itemLabel(fn(array $state): ?string => $state['jabatan'] ?? null)
                    ->schema([
                        // 👤 Data Pejabat
                        Forms\Components\TextInput::make('nama')
                            ->label('Nama Lengkap Pejabat')
                            ->required()
                            ->placeholder('Masukkan nama pejabat')
                            ->maxLength(100)
                            ->columnSpan(['md' => 2]),

                        // 🏢 Jabatan & Pangkat
                        Forms\Components\TextInput::make('jabatan')
                            ->label('Jabatan')
                            ->required()
                            ->placeholder('Contoh: Kepala Dinas')
                            ->maxLength(100),

                        Forms\Components\TextInput::make('pangkat_golongan')
                            ->label('Pangkat/Golongan')
                            ->placeholder('Contoh: Pembina TK.I / IVb')
                            ->maxLength(50),

                        // 🔢 Nomor Induk & Urutan
                        Forms\Components\TextInput::make('nip')
                            ->label('Nomor Induk Pegawai (NIP)')
                            ->placeholder('Contoh: 197003221992031005')
                            ->maxLength(50),

                        Forms\Components\TextInput::make('urutan')
                            ->label('Prioritas Tampil')
                            ->numeric()
                            ->default(0)
                            ->minValue(0)
                            ->helperText('0 = paling atas')
                            ->columnSpan(['md' => 1])
                            ->suffixIcon('heroicon-o-queue-list'),
                    ])
                    ->columns(2)
            ])
            ->columns(1);
    }

    protected static function getTeamSection(): Forms\Components\Section
    {
        return Forms\Components\Section::make('Anggota Unit')
            ->description('Daftar anggota tim')
            ->schema([
                Forms\Components\Repeater::make('anggotaUnit')
                    ->relationship()
                    ->label('')
                    ->addActionLabel('Tambah Anggota')
                    ->reorderableWithButtons()
                    ->collapsible()
                    ->cloneable()
                    ->itemLabel(fn(array $state): ?string => $state['nama'] ?? null)
                    ->grid(2)
                    ->schema([
                        // 📸 Foto Profil
                        Forms\Components\FileUpload::make('foto')
                            ->label('Foto Profil')
                            ->directory('unit-kerja/anggota')
                            ->image()
                            ->avatar()
                            ->imageEditor()
                            ->imageCropAspectRatio('1:1')
                            ->imageResizeMode('cover')
                            ->circleCropper()
                            ->downloadable()
                            ->openable()
                            ->columnSpanFull()
                            ->alignCenter()
                            ->helperText('Rasio 1:1, format JPG/PNG'),

                        // 🔢 Urutan Tampil
                        Forms\Components\TextInput::make('urutan')
                            ->label('Urutan Tampil')
                            ->numeric()
                            ->default(0)
                            ->minValue(0)
                            ->required()
                            ->helperText('0 = paling atas')
                            ->suffixIcon('heroicon-o-queue-list'),

                        // 👤 Data Pribadi
                        Forms\Components\TextInput::make('nama')
                            ->label('Nama Lengkap')
                            ->required()
                            ->maxLength(100)
                            ->placeholder('Nama anggota unit kerja'),

                        Forms\Components\TextInput::make('jabatan')
                            ->label('Jabatan')
                            ->required()
                            ->maxLength(100)
                            ->placeholder('Jabatan dalam unit kerja'),

                        // 🔖 Nomor Induk
                        Forms\Components\TextInput::make('nip')
                            ->label('NIP')
                            ->required()
                            ->columnSpanFull()
                            ->placeholder('Nomor Induk Pegawai'),
                    ])
            ])
            ->columns(1);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nama_unit')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('strukturUnit.nama')
                    ->label('Kepala Unit')
                    ->formatStateUsing(fn($state) => $state ?? '-'),

                Tables\Columns\IconColumn::make('is_active')
                    ->label('Status')
                    ->boolean(),

                Tables\Columns\TextColumn::make('updated_at')
                    ->label('Diupdate')
                    ->dateTime('d/m/Y')
            ])
            ->filters([
                Tables\Filters\TernaryFilter::make('is_active')
                    ->label('Status Aktif')
            ])
            ->actions([
                Tables\Actions\ActionGroup::make([
                    Tables\Actions\ViewAction::make()
                        ->icon('heroicon-o-eye')
                        ->color('success'),
                    Tables\Actions\EditAction::make()
                        ->icon('heroicon-o-pencil')
                        ->color('primary'),
                    Tables\Actions\DeleteAction::make()
                        ->icon('heroicon-o-trash')
                        ->color('danger'),
                ]),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ])
            ->defaultSort('urutan', 'asc');
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
            'index' => Pages\ListUnitKerjas::route('/'),
            'create' => Pages\CreateUnitKerja::route('/create'),
            'edit' => Pages\EditUnitKerja::route('/{record}/edit'),
        ];
    }
}
