<?php

use App\Http\Controllers\Api\V1\ExamGraduationApiController;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->middleware(['auth.apikey'])->group(function () {
    Route::get('/exams', [ExamGraduationApiController::class, 'indexExams']);
    Route::get('/exams/{exam}/grades', [ExamGraduationApiController::class, 'getExamGrades']);
    Route::get('/exams/{exam}/grades/{student}', [ExamGraduationApiController::class, 'getStudentExamGrade']);
    Route::get('/students/{studentNumber}/results', [ExamGraduationApiController::class, 'getStudentHistoricalResults']);
});

