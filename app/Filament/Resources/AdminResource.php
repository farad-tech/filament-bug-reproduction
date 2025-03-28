<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AdminResource\Pages;
use App\Filament\Resources\AdminResource\RelationManagers;
use App\Filament\Resources\AdminResource\RelationManagers\AgentRelationManager;
use App\Models\Admin;
use Filament\Forms;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Split;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class AdminResource extends Resource
{
    protected static ?string $model = Admin::class;

    protected static ?string $pluralModelLabel = 'مدیران و نمایندگان';

    protected static ?string $modelLabel  = 'مدیر و نماینده';

    protected static ?string $navigationIcon = 'heroicon-o-users';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([

                Section::make()
                    ->schema([

                        Split::make([
                            Section::make([
                                TextInput::make('name')
                                ->label('نام')
                                ->required(),
            
                                TextInput::make('email')
                                    ->label('ایمیل')
                                    ->required(),
                
                                TextInput::make('password')
                                    ->label('کلمه عبور')
                                    ->password()
                                    ->required(function (string $operation) {
                                        return $operation == 'create';
                                    })
                                    ->disabled(function (string $operation, Get $get) {
                                        return $operation == 'edit' && $get('change_password') == false;
                                    }),

                                Select::make('roles')
                                    ->multiple()
                                    ->hint("Super Admin یا Agent")
                                    ->relationship('roles', 'name')


                            ]),
                            Section::make([
                                Toggle::make('change_password')
                                    ->live()
                                    ->label('تغییر کلمه عبور'),
                            ])
                            ->hidden(function (string $operation) {
                                return $operation === 'create';
                            })
                            ->grow(false),
    
                        ])->columns()

                    ])

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                
                TextColumn::make('name')->label('نام'),
                TextColumn::make('email')->label('ایمیل'),

            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            AgentRelationManager::class
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListAdmins::route('/'),
            'create' => Pages\CreateAdmin::route('/create'),
            'edit' => Pages\EditAdmin::route('/{record}/edit'),
        ];
    }
}
