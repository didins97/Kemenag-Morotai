<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BeritaResource\Pages;
use App\Filament\Resources\BeritaResource\RelationManagers;
use App\Models\Berita;
use Carbon\Carbon;
use Filament\Actions\CreateAction;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\{TextInput, RichEditor, FileUpload, DatePicker, Select, Toggle, Section, Grid};
use Filament\Notifications\Collection;
use Filament\Tables\Columns\{TextColumn, ImageColumn, BooleanColumn, BadgeColumn, IconColumn, ToggleColumn};
use Filament\Tables\Actions\BulkAction;
use Filament\Tables\Actions\BulkActionGroup;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Tables\Filters\Filter;
// use Filament\Support\Enums\ActionColor;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Filters\TernaryFilter;

class BeritaResource extends Resource
{
    protected static ?string $model = Berita::class;

    protected static ?string $navigationIcon = 'heroicon-o-newspaper';
    protected static ?string $navigationGroup = 'Konten Berita & Opini';
    protected static ?string $navigationLabel = 'Berita';
    protected static ?int $navigationSort = 3;

    public static function form(Form $form): Form
    {
        return $form->schema([
            Grid::make()
                ->schema([
                    // News Information Section
                    Section::make('Informasi Berita')
                        ->icon('heroicon-o-newspaper')
                        ->description('Masukkan informasi dasar berita')
                        ->collapsible()
                        ->schema([
                            TextInput::make('judul')
                                ->label('Judul Berita')
                                ->placeholder('Contoh: Kemenag Gelar Upacara HAB ke-78')
                                ->maxLength(200)
                                ->required()
                                ->columnSpanFull()
                                ->autofocus()
                                ->hint('Judul yang menarik akan meningkatkan engagement')
                                ->hintIcon('heroicon-o-information-circle')
                                ->extraAttributes(['class' => 'text-lg']),

                            self::getCategorySelect(),
                            self::getTagsSelect(),
                            self::getDatePicker(),
                        ])
                        ->columns(2),

                    // Content Section
                    self::getContentSection(),

                    // Media & Settings Grid
                    Grid::make()
                        ->schema([
                            // Gabungkan upload gambar utama dan multi gambar dalam satu section
                            Section::make('Media Upload')
                                ->icon('heroicon-o-photo')
                                ->description('Upload gambar utama dan gambar pendukung')
                                ->collapsible()
                                ->schema([
                                    self::getImageUploadSection(),

                                    FileUpload::make('multi_gambar')
                                        ->label('Gambar Pendukung (Bisa banyak)')
                                        ->multiple()
                                        ->image()
                                        ->directory('berita/multi') // folder terpisah
                                        ->reorderable()
                                        ->appendFiles() // mempertahankan file yang sudah diupload
                                        ->downloadable()
                                        ->openable()
                                        ->columnSpanFull()
                                        ->helperText('Anda bisa upload banyak gambar sekaligus')
                                ])
                                ->columnSpan(['lg' => 2]),

                            self::getSettingsSection()->columnSpan(['lg' => 1]),
                        ])
                        ->columns(3),
                ])
                ->columns(1),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('judul')
                    ->label('JUDUL')
                    ->limit(35)
                    ->searchable()
                    ->sortable()
                    ->wrap()
                    ->weight('medium')
                    ->color('primary')
                    ->tooltip(fn($record) => $record->judul),

                BadgeColumn::make('kategori.kategori')
                    ->label('KATEGORI')
                    ->sortable()
                    ->extraAttributes(['class' => 'uppercase']),

                TextColumn::make('tanggal')
                    ->label('TANGGAL')
                    ->date('d M Y')
                    ->sortable()
                    ->description(fn($record) => Carbon::parse($record->tanggal)->diffForHumans())
                    ->alignCenter(),

                TextColumn::make('user.name')
                    ->label('PENULIS')
                    ->icon('heroicon-o-user-circle')
                    ->iconColor('primary')
                    ->searchable()
                    ->sortable(),

                ToggleColumn::make('is_featured')
                    ->label('Unggulan')
                    ->onColor('warning')
                    ->offColor('gray')
                    ->onIcon('heroicon-o-star')
                    ->offIcon('heroicon-o-star')
                    ->tooltip(fn($record): string => $record->is_featured ? 'Klik untuk nonaktifkan' : 'Klik untuk jadikan unggulan'),

                IconColumn::make('published')
                    ->label('STATUS')
                    ->boolean()
                    ->trueIcon('heroicon-o-eye')
                    ->falseIcon('heroicon-o-eye-slash')
                    ->trueColor('success')
                    ->falseColor('danger')
                    ->alignCenter()
                    ->extraAttributes(['class' => 'font-bold']),
            ])
            ->defaultSort('tanggal', 'desc')
            ->filters([
                SelectFilter::make('kategori')
                    ->label('FILTER KATEGORI')
                    ->options([
                        'pendidikan' => 'Pendidikan',
                        'pelayanan' => 'Pelayanan',
                        'haji' => 'Haji',
                    ])
                    ->indicator('Kategori')
                    ->multiple(),

                TernaryFilter::make('published')
                    ->label('STATUS PUBLIKASI')
                    ->placeholder('Semua')
                    ->trueLabel('Tampil Publik')
                    ->falseLabel('Tidak Publik')
                    ->queries(
                        true: fn($query) => $query->where('published', true),
                        false: fn($query) => $query->where('published', false),
                    ),

                Filter::make('tanggal')
                    ->form([
                        DatePicker::make('dari_tanggal'),
                        DatePicker::make('sampai_tanggal'),
                    ])
                    ->query(function ($query, array $data) {
                        return $query
                            ->when(
                                $data['dari_tanggal'],
                                fn($query) => $query->whereDate('tanggal', '>=', $data['dari_tanggal'])
                            )
                            ->when(
                                $data['sampai_tanggal'],
                                fn($query) => $query->whereDate('tanggal', '<=', $data['sampai_tanggal'])
                            );
                    })
            ])
            ->actions([
                Tables\Actions\ActionGroup::make([
                    Tables\Actions\Action::make('view')
                        ->label(fn($record) => $record->published ? 'Lihat di Web' : 'Pratinjau Draft')
                        ->icon(fn($record) => $record->published ? 'heroicon-o-globe-alt' : 'heroicon-o-eye')
                        ->color(fn($record) => $record->published ? 'success' : 'warning')
                        ->url(function ($record) {
                            if ($record->published) {
                                return route('berita.detail', $record->slug);
                            }
                            // return
                        })
                        ->openUrlInNewTab(),
                    Tables\Actions\EditAction::make()
                        ->icon('heroicon-o-pencil')
                        ->color('primary'),
                    Tables\Actions\DeleteAction::make()
                        ->icon('heroicon-o-trash')
                        ->color('danger'),
                ]),
            ])
            ->bulkActions([
                BulkActionGroup::make([
                    BulkAction::make('publish')
                        ->icon('heroicon-o-eye')
                        ->label('Publikasikan')
                        ->color('success')
                        ->action(fn(Collection $records) => $records->each->update(['published' => true]))
                        ->requiresConfirmation(),

                    BulkAction::make('unpublish')
                        ->icon('heroicon-o-eye-slash')
                        ->label('Sembunyikan')
                        ->color('warning')
                        ->action(fn(Collection $records) => $records->each->update(['published' => false]))
                        ->requiresConfirmation(),

                    DeleteBulkAction::make()
                        ->icon('heroicon-o-trash')
                        ->label('Hapus Data')
                        ->requiresConfirmation(),
                ]),
            ])
            // ->emptyStateActions([
            //     CreateAction::make()
            //         ->label('Tambah Data Baru')
            //         ->icon('heroicon-o-plus'),
            // ])
            ->emptyStateHeading('Belum ada data')
            ->emptyStateDescription('Klik tombol di bawah untuk membuat data baru')
            ->deferLoading()
            ->persistSortInSession()
            ->persistSearchInSession()
            ->persistFiltersInSession()
            ->striped();
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
            'index' => Pages\ListBeritas::route('/'),
            'create' => Pages\CreateBerita::route('/create'),
            'edit' => Pages\EditBerita::route('/{record}/edit'),
        ];
    }

    protected static function getCategorySelect(): Select
    {
        return Select::make('kategori_id')
            ->label('Kategori Berita')
            ->relationship(
                name: 'kategori',
                titleAttribute: 'kategori',
                modifyQueryUsing: fn(Builder $query) => $query->whereNotNull('kategori')
            )
            ->options(
                \App\Models\Kategori::query()
                    ->whereNotNull('kategori')
                    ->orderBy('kategori')
                    ->pluck('kategori', 'id')
            )
            ->searchable()
            ->preload()
            ->native(false)
            ->required()
            ->createOptionForm([
                TextInput::make('kategori')
                    ->required()
                    ->maxLength(100)
                    ->label('Nama Kategori'),
            ])
            ->hint('Pilih atau buat kategori baru')
            ->hintIcon('heroicon-o-tag');
    }

    protected static function getTagsSelect(): Select
    {
        return Select::make('nama')
            ->label('Tag Berita')
            ->relationship(
                name: 'tags',
                titleAttribute: 'nama',
                modifyQueryUsing: fn(Builder $query) => $query->whereNotNull('nama')
            )
            ->multiple()
            ->preload()
            ->searchable()
            ->createOptionForm([
                TextInput::make('nama')
                    ->required()
                    ->maxLength(100)
                    ->label('Nama Tag'),
            ])
            ->hint('Pilih atau buat tag baru')
            ->hintIcon('heroicon-o-tag')
            ->required();
    }

    protected static function getDatePicker(): DatePicker
    {
        return DatePicker::make('tanggal')
            ->label('Tanggal Publikasi')
            ->displayFormat('d F Y')
            ->default(now())
            ->required()
            ->weekStartsOnMonday()
            ->closeOnDateSelection()
            ->extraAttributes(['class' => 'cursor-pointer'])
            // full width
            ->columnSpanFull();
    }

    protected static function getContentSection(): Section
    {
        return Section::make('Konten Berita')
            ->icon('heroicon-o-document-text')
            ->description('Tulis isi lengkap berita dengan format yang baik')
            ->collapsible()
            ->collapsed(fn($operation) => $operation === 'edit')
            ->schema([
                RichEditor::make('isi')
                    ->label('')
                    ->placeholder('Tulis isi lengkap berita di sini...')
                    ->required()
                    ->disableToolbarButtons(['codeBlock'])
                    ->toolbarButtons([
                        'blockquote',
                        'bold',
                        'bulletList',
                        'h2',
                        'h3',
                        'italic',
                        'link',
                        'orderedList',
                        'redo',
                        'strike',
                        'underline',
                        'undo',
                    ])
                    ->fileAttachmentsDisk('public')
                    ->fileAttachmentsDirectory('berita/attachments')
                    ->fileAttachmentsVisibility('public')
                    ->columnSpanFull()
                    ->extraAttributes(['class' => 'min-h-[300px]']),

                TextInput::make('caption_berita')
                    ->label('Tentang Berita')
                    ->placeholder('Nama Penulis, Pewarta dan lainnya')
                    ->required()
                    ->maxLength(255)
                    ->columnSpanFull()
                    ->hint('muncul sebagai tulisan kecil di akhir berita')
                    ->hintIcon('heroicon-o-information-circle'),
            ]);
    }

    protected static function getImageUploadSection(): Section
    {
        return Section::make('Gambar Utama')
            ->schema([
                FileUpload::make('gambar')
                    ->image()
                    ->directory('berita/thumbnails')
                    ->disk('public')
                    ->maxSize(2048)
                    ->imageEditor()
                    ->hint('Gambar akan otomatis diresize ke 1200×630 piksel')
            ]);
    }

    protected static function getSettingsSection(): Section
    {
        return Section::make('Pengaturan')
            ->icon('heroicon-o-cog')
            ->description('Atur visibilitas berita')
            ->collapsible()
            ->schema([
                Toggle::make('published')
                    ->label('Publikasikan Berita')
                    ->onColor('success')
                    ->offColor('danger')
                    ->inline(false)
                    ->default(true)
                    ->hint('Berita akan tampil di halaman publik')
                    ->hintIcon('heroicon-o-eye')
                    ->helperText('Nonaktifkan untuk menyimpan sebagai draft'),

                Toggle::make('is_featured')
                    ->label('Berita Unggulan')
                    ->onColor('primary')
                    ->offColor('gray')
                    ->inline(false)
                    ->helperText('Tampilkan di bagian utama website'),
            ]);
    }
}
