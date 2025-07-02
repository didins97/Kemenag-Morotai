<?php

namespace App\Filament\Resources;

use App\Filament\Resources\OpiniResource\Pages;
use App\Filament\Resources\OpiniResource\RelationManagers;
use App\Models\Opini;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class OpiniResource extends Resource
{
    protected static ?string $model = Opini::class;

    protected static ?string $navigationIcon = 'heroicon-o-chat-bubble-left-right';
    protected static ?string $navigationGroup = 'Konten Berita & Opini';
    protected static ?string $navigationLabel = 'Opini';
    protected static ?int $navigationSort = 4;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Card::make()
                    ->schema([
                        Forms\Components\TextInput::make('judul')
                            ->label('Judul Opini')
                            ->required()
                            ->live(onBlur: true)
                            ->placeholder('Judul yang menarik dan deskriptif'),

                        Forms\Components\TextInput::make('narasumber')
                            ->label('Penulis/Narasumber')
                            ->maxLength(100)
                            ->placeholder('Nama penulis atau narasumber')
                            ->hintIcon('heroicon-o-user-circle'),

                        Forms\Components\RichEditor::make('isi')
                            ->label('Isi Opini')
                            ->required()
                            ->fileAttachmentsDirectory('opini/attachments')
                            ->toolbarButtons([
                                'blockquote',
                                'bold',
                                'bulletList',
                                'h2',
                                'h3',
                                'italic',
                                'link',
                                'orderedList',
                            ])
                            ->extraInputAttributes(['style' => 'min-height: 400px'])
                            ->columnSpanFull(),

                        Forms\Components\FileUpload::make('gambar')
                            ->label('Gambar Utama')
                            ->image()
                            ->directory('opini/images')
                            ->maxSize(2048)
                            ->imageEditor()
                            ->imageEditorAspectRatios([
                                '16:9',
                                '4:3',
                                '1:1',
                            ])
                            ->hint('Ukuran optimal: 800×450 piksel (16:9)')
                            ->hintIcon('heroicon-o-camera')
                            ->helperText('Format: JPG/PNG. Maksimal 2MB')
                            ->downloadable()
                            ->openable()
                            ->previewable()
                            ->columnSpanFull(),

                        Forms\Components\TextInput::make('caption_gambar')
                            ->label('Keterangan Gambar')
                            ->maxLength(255)
                            ->placeholder('Deskripsi singkat tentang gambar')
                            ->columnSpanFull(),

                        Forms\Components\TagsInput::make('sumber')
                            ->label('Sumber Referensi')
                            ->placeholder('Tambahkan sumber (tekan Enter)')
                            ->helperText('Contoh: kemenag.go.id, republika.co.id, kompas.com')
                            ->nestedRecursiveRules([
                                'max:100',
                                'regex:/^[a-zA-Z0-9\s\.\-]+$/',
                            ])
                            ->columnSpanFull()
                            ->hintIcon('heroicon-o-information-circle')
                            ->hint('Tekan Enter untuk menambahkan sumber satu per satu')

                    ])
                    ->columns(2)
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('gambar')
                    ->label('Gambar')
                    ->disk('public'),

                Tables\Columns\TextColumn::make('judul')
                    ->label('Judul')
                    ->searchable()
                    ->wrap(),

                Tables\Columns\TextColumn::make('sumber')
                    ->label('Sumber')
                    ->searchable(),

                Tables\Columns\TextColumn::make('created_at')
                    ->label('Dibuat')
                    ->dateTime('d M Y')
                    ->sortable(),
            ])
            ->filters([
                Tables\Filters\Filter::make('created_at')
                    ->form([
                        Forms\Components\DatePicker::make('created_from')
                            ->label('Dari Tanggal'),
                        Forms\Components\DatePicker::make('created_until')
                            ->label('Sampai Tanggal'),
                    ])
                    ->query(function ($query, array $data) {
                        return $query
                            ->when(
                                $data['created_from'],
                                fn($query) => $query->whereDate('created_at', '>=', $data['created_from'])
                            )
                            ->when(
                                $data['created_until'],
                                fn($query) => $query->whereDate('created_at', '<=', $data['created_until'])
                            );
                    }),
            ])
            ->actions([
                Tables\Actions\ActionGroup::make([
                    Tables\Actions\EditAction::make()
                        ->icon('heroicon-o-pencil')
                        ->color('primary'),
                    Tables\Actions\DeleteAction::make()
                        ->icon('heroicon-o-trash')
                        ->color('danger'),
                ]),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->defaultSort('created_at', 'desc');
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
            'index' => Pages\ListOpinis::route('/'),
            'create' => Pages\CreateOpini::route('/create'),
            'edit' => Pages\EditOpini::route('/{record}/edit'),
        ];
    }
}
