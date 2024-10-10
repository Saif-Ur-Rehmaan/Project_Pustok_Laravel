<?php

namespace App\Filament\Widgets;

use App\Models\User;
use Carbon\Carbon;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class userCount extends BaseWidget
{ 
    protected function getStats(): array
    {

        return [
            Stat::make('USERS', function () {
                return User::all()->where('role_id', 1)->count();
            })->description("Total Users")->chart($this->getChartData('USERS'))->chartColor('success'),

            Stat::make('ADMINS', function () {
                return User::all()->where('role_id', 2)->count();
            })->description('Total Admins')->chart($this->getChartData('ADMINS'))->chartColor('danger'),
            Stat::make('WRITERS', function () {
                return User::all()->where('role_id', 3)->count();
            })->description('Total Writers')->chart($this->getChartData('WRITERS'))->chartColor('warning'),
        ];
    }
    private function getChartData(string $role): array
    {
        switch ($role) {
            case 'USERS':
                return [0, User::all()->where('role_id', 2)->count()];
            case 'ADMINS':
                return [0, User::all()->where('role_id', 2)->count()];
            case 'WRITERS':
                return [0, User::all()->where('role_id', 3)->count()];
            default:
                return [0, 0];
        }
    }
}
