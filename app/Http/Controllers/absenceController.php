<?php

namespace App\Http\Controllers;

use App\Models\Absence;
use App\Models\User;
use Illuminate\Http\Request;
use Mockery\Expectation;

class absenceController extends Controller
{

    public function create_absence(Request $request)
    {
        try {
            foreach ($request->student_id as $student_id) {
                $absence = Absence::create([
                    'class_id' => $request->class_id,
                    'user_id' => $student_id
                ]);
                $user = User::where('id', $student_id)->update(['last_absence' => now()]);
            }
            if ($absence) {

                return response()->json('200');
            }
        } catch (\Exception $e) {
            return response()->json([
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
