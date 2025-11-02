<?php

namespace App\Filament\Resources\Projects;

use BackedEnum;
use App\Models\Project;
use Filament\Tables\Table;
use Illuminate\Support\Str;
use Filament\Schemas\Schema;
use App\Models\ProjectCategory;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Resource;
use Filament\Actions\DeleteAction;
use Filament\Actions\RestoreAction;
use Filament\Forms\Components\Radio;
use Filament\Support\Icons\Heroicon;
use Filament\Actions\BulkActionGroup;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Toggle;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\ForceDeleteAction;
use Filament\Actions\RestoreBulkAction;
use Filament\Forms\Components\Textarea;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TagsInput;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Enums\FiltersLayout;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Tables\Filters\SelectFilter;
use Illuminate\Database\Eloquent\Builder;
use Filament\Actions\ForceDeleteBulkAction;
use Filament\Infolists\Components\IconEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Infolists\Components\ImageEntry;
use Filament\Schemas\Components\Utilities\Set;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\Projects\Pages\ManageProjects;

class ProjectResource extends Resource
{
    protected static ?string $model = Project::class;

    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-newspaper';

    protected static ?string $recordTitleAttribute = 'Project';
    protected static ?int $navigationSort = 1;
    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('title')
                    ->live(onBlur: true)
                    ->afterStateUpdated(fn(Set $set, ?string $state) => $set('slug', Str::slug($state)))
                    ->required(),
                Select::make('project_category_id')
                    ->label('Project Category')
                    ->required()
                    ->options(ProjectCategory::query()->pluck('name', 'id'))
                    ->searchable(),
                MarkdownEditor::make('description')
                    ->columnSpanFull(),
                TextInput::make('client_name'),
                TextInput::make('author'),
                TagsInput::make('keywords')
                    ->label('Tags')
                    ->placeholder('Type a keyword and press Enter'),
                DatePicker::make('date'),
                TextInput::make('url')
                    ->label('Website URL'),
                TextInput::make('slug')
                    ->required()
                    ->visible(fn($livewire) => $livewire instanceof Pages\ManageProjects)
                    ->unique(Project::class, 'slug', fn($record) => $record)
                    ->disabled(fn(?string $operation, ?Project $menuCategory) => $operation == 'edit'),
                FileUpload::make('image')
                    ->disk('public')
                    ->label('Thumbnail')
                    ->image()
                    ->columnSpanFull(),
                FileUpload::make('images')
                    ->disk('public')
                    ->label('Images')
                    ->multiple()
                    ->image()
                    ->columnSpanFull(),
                Radio::make('is_active')
                    ->label('Status')
                    ->inline()
                    ->inlineLabel(false)
                    ->default(true)
                    ->options([
                        true => 'Active',
                        false => 'Inactive'
                    ]),
            ]);
    }

    public static function infolist(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('title'),
                TextEntry::make('category.name')
                    ->label('Project Category')
                    ->numeric(),
                TextEntry::make('client_name'),
                TextEntry::make('author'),
                TextEntry::make('date')
                    ->date(),
                TextEntry::make('url')
                    ->label('Website URL')
                    ->url(fn($state): string => $state)
                    ->openUrlInNewTab()
                    ->formatStateUsing(fn($state) => $state
                        ? "<a href='{$state}' target='_blank' class='px-3 py-1 bg-primary-600 text-white rounded-md text-sm hover:bg-primary-700 transition'>Visit</a>"
                        : 'Not Available')
                    ->html(),
                TextEntry::make('description')
                    ->columnSpanFull(),
                ImageEntry::make('image_url')
                    ->label('Thumbnail')
                    ->circular(),
                TextEntry::make('keywords')
                    ->label('Tags'),
                ImageEntry::make('image_urls')
                    ->label('Images')
                    ->circular(),
                IconEntry::make('is_active')
                    ->label('Status')
                    ->boolean(),
                TextEntry::make('slug'),
                TextEntry::make('created_at')
                    ->dateTime()
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('Project')
            ->columns([
                ImageColumn::make('image_url')
                    ->label('Thumbnail')
                    ->rounded(),
                TextColumn::make('title')
                    ->searchable(),
                TextColumn::make('category.name')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('client_name')
                    ->searchable(),
                TextColumn::make('author')
                    ->searchable(),
                TextColumn::make('slug')
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('date')
                    ->date()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('url')
                    ->label('Website URL')
                    ->url(fn($state): string => $state)
                    ->openUrlInNewTab()
                    ->formatStateUsing(fn($state) => $state
                        ? "<a href='{$state}' target='_blank' class='px-3 py-1 bg-primary-600 text-white rounded-md text-sm hover:bg-primary-700 transition'>Visit</a>"
                        : '-')
                    ->html()
                    ->toggleable(isToggledHiddenByDefault: true),
                IconColumn::make('is_active')
                    ->boolean()
                    ->label('Status'),
            ])->defaultSort('id', 'desc')
            ->filters([
                SelectFilter::make('is_active')
                    ->options([
                        '1' => 'Active',
                        '0' => 'InActive'
                    ])->label('Status'),
                SelectFilter::make('category_id')
                    ->relationship('category', 'name')
                    ->label('Category')
                    ->searchable()
                    ->preload()
            ], layout: FiltersLayout::Modal)
            ->recordActions([
                ViewAction::make(),
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => ManageProjects::route('/'),
        ];
    }

    public static function getRecordRouteBindingEloquentQuery(): Builder
    {
        return parent::getRecordRouteBindingEloquentQuery()
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]);
    }
}
