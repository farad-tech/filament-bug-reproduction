<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages;
use App\Filament\Resources\UserResource\RelationManagers;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $modelLabel = 'کاربر';

    protected static ?string $pluralModelLabel  = 'کاربرها';

    protected static ?string $navigationIcon = 'heroicon-o-user-group';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('username')->label('نام کاربری')->alphaNum()->required(),
                TextInput::make('phone_number')->label('موبایل')->numeric()->length(11)->required(),
                TextInput::make('phone_number_verify_code')->label('کد تایید')->default(null)->numeric(),
                DatePicker::make('phone_number_verified_at')->label('موبایل تایید شده در'),
                TextInput::make('email')->label('آدرس ایمیل')->required(),
                TextInput::make('password')->password()->label('کلمه عبور')->required(true)->hint('کلمه عبور خود حساب کاربر میباشد، با وارد کردن مقدار آنرا تغییر میدهید!')->hintColor('danger'),
                Toggle::make('suspension')->onColor('danger')->label('تعلیق کاربر'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')->sortable()->label('کد'),
                TextColumn::make('username')->sortable()->label('نام کاربری'),
                TextColumn::make('phone_number')->sortable()->label('موبایل'),
                TextColumn::make('phone_number_verified_at')->sortable()->label('موبایل تایید شده در'),
                TextColumn::make('email')->sortable()->label('ایمیل'),
                ToggleColumn::make('suspension')->onColor('danger')->sortable()->label('تعلیق شده'),
                TextColumn::make('created_at')->sortable()->label('ثبت نام در'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\ViewAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])->defaultSort('created_at');
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
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }
}
