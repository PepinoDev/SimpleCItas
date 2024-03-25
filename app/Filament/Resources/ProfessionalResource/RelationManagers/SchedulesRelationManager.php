<?php

namespace App\Filament\Resources\ProfessionalResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SchedulesRelationManager extends RelationManager
{
    protected static string $relationship = 'schedules';

    protected static ?string $navigationLabel = 'Turnos';
    
    protected static ?string $modelLabel = 'Turno';
    
    protected static ?string $pluralLabel = 'Turnos';

    protected static ?string $title = 'Turnos';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\DateTimePicker::make('date')
                    ->label('Turno')
                    ->native(false)
                    ->seconds(false)
                    ->timezone('America/Argentina/Cordoba')
                    ->displayFormat('d/m/Y H:i')
                    ->closeOnDateSelection()
                    ->minDate(now())
                    // ->minDate(now()->subHour(1))
                    // ->reactive()
                    ->required(),
               Forms\Components\Toggle::make('status')
                    ->label('Estado')
                    ->default(true)
                    ->required(),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('date')
            ->columns([
                Tables\Columns\TextColumn::make('date')
                    ->label('Turno')
                    ->dateTime('d/m/Y H:i'),
                Tables\Columns\IconColumn::make('status')
                    ->label('Estado')
                    ->boolean(),
            
            ])
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }
}
