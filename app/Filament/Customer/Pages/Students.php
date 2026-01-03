<?php

namespace App\Filament\Customer\Pages;

use App\Models\User;
use Filament\Pages\Page;
use Illuminate\Http\Request;

class Students extends Page
{
    protected string $view = 'filament.customer.pages.students';
    protected static bool $shouldRegisterNavigation = false;
    public $students;
    public $total_student;
    public function mount(Request $request) {
        
        if(empty($request->all())){
            return redirect()->route('filament.customer.pages.class-student');
        }
        $student = User::where('class_id', $request->class_id)->get();
        $this->total_student = $student->count();
        $class = \App\Models\classes::find($request->class_id);
        $this->students = $student;
    }
}
