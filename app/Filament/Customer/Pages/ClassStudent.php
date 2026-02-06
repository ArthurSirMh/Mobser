<?php

namespace App\Filament\Customer\Pages;

use Filament\Pages\Page;

class ClassStudent extends Page
{
    protected string $view = 'filament.customer.pages.class-student';

    protected static ?string $title = 'لیست کلاس‌ها';
    public static function shouldRegisterNavigation(): bool
    {
        return auth()->user()->hasRole(['director', 'teacher', 'deputy']);
    }
    public $classes;
    public $total_classes;
    public function mount()
    {
        if (auth()->user()->hasRole(['director', 'teacher', 'deputy'])) {
            $classes = \App\Models\classes::all();
            $total_classes = $classes->count();
            $this->classes = $classes;
            $this->total_classes = $total_classes;
        } else {
            return redirect()->route('filament.customer.pages.dashboard');
        }

    }
    
}
