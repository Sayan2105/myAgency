<?php

namespace App\Filament\Resources\Agencies\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Actions\Action;
use Filament\Tables\Filters\Filter;
use Illuminate\Database\Eloquent\Builder;


class AgenciesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->searchable(),
                TextColumn::make('company_type')
                    ->searchable(),
                TextColumn::make('instagram_url')
                    ->searchable(),
                TextColumn::make('website_url')
                    ->searchable(),
                TextColumn::make('location')
                    ->searchable(),
                TextColumn::make('specialization')
                    ->searchable(),
                TextColumn::make('followers')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('website_quality')
                    ->searchable(),
                TextColumn::make('priority')
                    ->badge()
                    ->searchable(),
                TextColumn::make('status')
                    ->badge()
                    ->searchable(),
                TextColumn::make('last_contacted_at')
                    ->dateTime()
                    ->sortable(),
                TextColumn::make('follow_up_at')
                    ->dateTime()
                    ->sortable(),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
                Filter::make('follow_ups_due_today')
                    ->label('Follow-ups due today')
                    ->query(fn (Builder $query): Builder => $query
                        ->whereDate('follow_up_at', today())
                    ),

                Filter::make('high_priority')
                    ->label('High priority')
                    ->query(fn (Builder $query): Builder => $query
                        ->where('priority', 'high'))
            ])
            ->recordActions([
                EditAction::make(),

                Action::make('markContacted')
                ->label('Mark contacted')
                ->icon('heroicon-o-check-circle')
                ->color('success')
                ->requiresConfirmation()
                ->disabled(fn ($record): bool =>
                    in_array($record->status, [
                        \App\Enums\LeadStatus::Won,
                        \App\Enums\LeadStatus::Lost,
                    ], true)
                )
                ->action(fn ($record) => $record->markContacted()),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
