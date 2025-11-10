<?php

namespace App\Filament\Resources\TicketResource\RelationManagers;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables\Columns\ToggleColumn;

class CategoriesRelationManager extends RelationManager
{
    protected static string $relationship = 'categories';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('name')
            ->columns([
                // menambahkan kolom untuk menampilkan name, slug dan status aktif kategori
                Tables\Columns\TextColumn::make('name'),
                Tables\Columns\TextColumn::make('slug'),
                ToggleColumn::make('is_active'),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                // menambahkan attach action untuk menghubungkan kategori yang sudah ada
                // preloadRecordSelect digunakan untuk mengoptimalkan performa dengan memuat data sebelumnya
                Tables\Actions\AttachAction::make()->preloadRecordSelect(),
            ])
            ->actions([
                // Tables\Actions\EditAction::make(),
                // menambahkan detach action untuk menghapus relasi tanpa menghapus data kategori
                Tables\Actions\DetachAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    // menambahkan detach bulk action untuk menghapus relasi tanpa menghapus data kategori
                    Tables\Actions\DetachBulkAction::make(),
                ]),
            ]);
    }
}
