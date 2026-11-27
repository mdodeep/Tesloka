<?php

use App\Http\Controllers\Auth\StaffAuthController;
use App\Http\Controllers\BroadcastAuthController;
use App\Http\Controllers\InAppNotificationController;
use App\Http\Controllers\MediaController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Staff\AcademicStructureController;
use App\Http\Controllers\Staff\AuditLogController;
use App\Http\Controllers\Staff\BackupController;
use App\Http\Controllers\Staff\DashboardController;
use App\Http\Controllers\Staff\DelegationApprovalController;
use App\Http\Controllers\Staff\ExamBlueprintController;
use App\Http\Controllers\Staff\ExamCameraController;
use App\Http\Controllers\Staff\ExamController;
use App\Http\Controllers\Staff\ExamGradingController;
use App\Http\Controllers\Staff\ExamPaymentController;
use App\Http\Controllers\Staff\ExamProctorMonitoringController;
use App\Http\Controllers\Staff\ExamPublishController;
use App\Http\Controllers\Staff\ExamReportController;
use App\Http\Controllers\Staff\ExamRoomController;
use App\Http\Controllers\Staff\ExamSebConfigController;
use App\Http\Controllers\Staff\ExamSessionController;
use App\Http\Controllers\Staff\GlobalSearchController;
use App\Http\Controllers\Staff\GraduationController;
use App\Http\Controllers\Staff\IntegrationController;
use App\Http\Controllers\Staff\LicenseController;
use App\Http\Controllers\Staff\MaintenanceController;
use App\Http\Controllers\Staff\NotificationLogController;
use App\Http\Controllers\Staff\NotificationTemplateController;
use App\Http\Controllers\Staff\QuestionBankController;
use App\Http\Controllers\Staff\QuestionController;
use App\Http\Controllers\Staff\QuestionStimulusController;
use App\Http\Controllers\Staff\SmtpSettingsController;
use App\Http\Controllers\Staff\StaffSecurityController;
use App\Http\Controllers\Staff\SystemHealthController;
use App\Http\Controllers\Staff\SystemSettingController;
use App\Http\Controllers\Staff\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::prefix('staff')->name('staff.')->group(function () {
    // Guest Routes
    Route::middleware('guest:staff')->group(function () {
        Route::get('login', [StaffAuthController::class, 'showLoginForm'])->name('login');
        Route::post('login', [StaffAuthController::class, 'login'])->name('login.post');
        Route::get('register', [StaffAuthController::class, 'showRegisterForm'])->name('register');
        Route::post('register', [StaffAuthController::class, 'register'])->middleware('throttle:10,1')->name('register.post');
        Route::get('2fa/challenge', [StaffAuthController::class, 'showTwoFactorChallenge'])->name('2fa.challenge');
        Route::post('2fa/challenge', [StaffAuthController::class, 'verifyTwoFactorChallenge'])->middleware('throttle:10,1')->name('2fa.challenge.verify');
    });

    // Authenticated Staff Routes
    Route::middleware(['portal:staff', 'active:staff'])->group(function () {
        Route::post('broadcasting/auth', [BroadcastAuthController::class, 'authenticateStaff'])->name('broadcasting.auth');
        Route::post('logout', [StaffAuthController::class, 'logout'])->name('logout');
        Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

        // Profile & Password
        Route::get('profile', [ProfileController::class, 'showStaff'])->name('profile');
        Route::put('profile', [ProfileController::class, 'updateStaff'])->name('profile.update');
        Route::post('profile/reset-photo', [ProfileController::class, 'resetStaffPhoto'])->name('profile.reset-photo');
        Route::put('password', function (Request $request) {
            return app(ProfileController::class)->changePassword($request, 'staff');
        })->name('password.update');

        // Academic Structure Management (Admin & Institution Admin)
        Route::prefix('academic')->middleware('role:admin,super_admin,institution_admin')->name('academic.')->group(function () {
            Route::get('/', [AcademicStructureController::class, 'index'])->name('index');

            // Tahun Ajaran
            Route::post('years', [AcademicStructureController::class, 'storeYear'])->name('years.store');
            Route::put('years/{year}', [AcademicStructureController::class, 'updateYear'])->name('years.update');
            Route::delete('years/{year}', [AcademicStructureController::class, 'destroyYear'])->name('years.destroy');

            // Semester / Term
            Route::post('terms', [AcademicStructureController::class, 'storeTerm'])->name('terms.store');
            Route::put('terms/{term}', [AcademicStructureController::class, 'updateTerm'])->name('terms.update');
            Route::delete('terms/{term}', [AcademicStructureController::class, 'destroyTerm'])->name('terms.destroy');

            // Jurusan / Departemen
            Route::post('departments', [AcademicStructureController::class, 'storeDepartment'])->name('departments.store');
            Route::put('departments/{department}', [AcademicStructureController::class, 'updateDepartment'])->name('departments.update');
            Route::delete('departments/{department}', [AcademicStructureController::class, 'destroyDepartment'])->name('departments.destroy');

            // Kelas / Rombel
            Route::post('classes', [AcademicStructureController::class, 'storeClass'])->name('classes.store');
            Route::put('classes/{class}', [AcademicStructureController::class, 'updateClass'])->name('classes.update');
            Route::delete('classes/{class}', [AcademicStructureController::class, 'destroyClass'])->name('classes.destroy');
            Route::patch('classes/{class}/toggle', [AcademicStructureController::class, 'toggleClassStatus'])->name('classes.toggle');
            Route::get('classes/{class}/students', [AcademicStructureController::class, 'getClassStudents'])->name('classes.students');
            Route::post('classes/{class}/students', [AcademicStructureController::class, 'enrollStudent'])->name('classes.students.enroll');
            Route::delete('classes/{class}/students/{student}', [AcademicStructureController::class, 'unenrollStudent'])->name('classes.students.unenroll');
            Route::get('classes/{class}/print-cards', [AcademicStructureController::class, 'printClassCards'])->name('classes.print-cards');
            Route::post('classes/{class}/generate-card-passwords', [AcademicStructureController::class, 'generateClassCardPasswords'])->name('classes.generate-card-passwords');
            Route::get('classes/{class}/pdf/cards', [AcademicStructureController::class, 'downloadClassCardsPdf'])->name('classes.pdf.cards');

            // Mata Pelajaran / Kuliah
            Route::post('subjects', [AcademicStructureController::class, 'storeSubject'])->name('subjects.store');
            Route::put('subjects/{subject}', [AcademicStructureController::class, 'updateSubject'])->name('subjects.update');
            Route::delete('subjects/{subject}', [AcademicStructureController::class, 'destroySubject'])->name('subjects.destroy');
            Route::patch('subjects/{subject}/toggle', [AcademicStructureController::class, 'toggleSubjectStatus'])->name('subjects.toggle');
        });

        // User Management & Bulk Operations (Admin & Institution Admin)
        Route::prefix('users')->middleware('role:admin,super_admin,institution_admin')->name('users.')->group(function () {
            Route::get('/', [UserController::class, 'index'])->name('index');
            Route::post('/', [UserController::class, 'store'])->name('store');
            Route::post('bulk-import', [UserController::class, 'bulkImport'])->name('bulk-import');
            Route::post('bulk-delete', [UserController::class, 'bulkDestroy'])->name('bulk-delete');
            Route::post('bulk-status', [UserController::class, 'bulkStatus'])->name('bulk-status');
            Route::get('export-csv', [UserController::class, 'exportCsv'])->name('export-csv');
            Route::get('{user}', [UserController::class, 'show'])->whereNumber('user')->name('show');
            Route::put('{user}', [UserController::class, 'update'])->whereNumber('user')->name('update');
            Route::delete('{user}', [UserController::class, 'destroy'])->whereNumber('user')->name('destroy');
            Route::patch('{user}/status', [UserController::class, 'updateStatus'])->whereNumber('user')->name('status');
            Route::post('{user}/approve', [UserController::class, 'approveRegistration'])->whereNumber('user')->name('approve');
            Route::post('{user}/reject', [UserController::class, 'rejectRegistration'])->whereNumber('user')->name('reject');
            Route::post('{user}/reset-password', [UserController::class, 'resetPassword'])->whereNumber('user')->name('reset-password');
            Route::post('{user}/reset-photo', [UserController::class, 'resetPhoto'])->whereNumber('user')->name('reset-photo');
        });

        // Question Banks & Content Management (FULL-FEATURE Sec 6, 7, 50)
        Route::middleware('role:admin,super_admin,institution_admin,teacher,exam_coordinator,academic_coordinator,approver')->group(function () {
            Route::prefix('question-banks')->name('question-banks.')->group(function () {
                Route::get('/', [QuestionBankController::class, 'index'])->name('index');
                Route::post('/', [QuestionBankController::class, 'store'])->name('store');
                Route::get('template-xlsx', [QuestionBankController::class, 'downloadTemplateXlsx'])->name('template-xlsx');
                Route::get('template-csv', [QuestionBankController::class, 'downloadTemplateCsv'])->name('template-csv');
                Route::get('template-json', [QuestionBankController::class, 'downloadTemplateJson'])->name('template-json');
                Route::get('template-zip', [QuestionBankController::class, 'downloadTemplateZip'])->name('template-zip');
                Route::get('template-aiken', [QuestionBankController::class, 'downloadTemplateAiken'])->name('template-aiken');
                Route::get('template-gift', [QuestionBankController::class, 'downloadTemplateGift'])->name('template-gift');
                Route::get('{questionBank}', [QuestionBankController::class, 'show'])->name('show');
                Route::put('{questionBank}', [QuestionBankController::class, 'update'])->name('update');
                Route::delete('{questionBank}', [QuestionBankController::class, 'destroy'])->name('destroy');
                Route::post('{questionBank}/duplicate', [QuestionBankController::class, 'duplicate'])->name('duplicate');
                Route::get('{questionBank}/export-csv', [QuestionBankController::class, 'exportCsv'])->name('export-csv');
                Route::get('{questionBank}/export-docx', [QuestionBankController::class, 'exportDocx'])->name('export-docx');
                Route::get('{questionBank}/export-zip', [QuestionBankController::class, 'exportZip'])->name('export-zip');
                Route::post('{questionBank}/import-preview', [QuestionBankController::class, 'previewImport'])->name('import-preview');
                Route::post('{questionBank}/import-csv', [QuestionBankController::class, 'importCsv'])->name('import-csv');
                Route::post('{questionBank}/stimuli', [QuestionStimulusController::class, 'store'])->name('stimuli.store');
                Route::get('{questionBank}/questions/create', [QuestionController::class, 'create'])->name('questions.create');
                Route::post('{questionBank}/questions', [QuestionController::class, 'store'])->name('questions.store');
            });

            Route::prefix('questions')->name('questions.')->group(function () {
                Route::get('{question}', [QuestionController::class, 'show'])->name('show');
                Route::get('{question}/edit', [QuestionController::class, 'edit'])->name('edit');
                Route::put('{question}', [QuestionController::class, 'update'])->name('update');
                Route::post('{question}/duplicate', [QuestionController::class, 'duplicate'])->name('duplicate');
                Route::post('{question}/restore/{versionNumber}', [QuestionController::class, 'restoreVersion'])->name('restore');
                Route::delete('{question}', [QuestionController::class, 'destroy'])->name('destroy');
            });

            Route::put('stimuli/{stimulus}', [QuestionStimulusController::class, 'update'])->name('stimuli.update');
            Route::delete('stimuli/{stimulus}', [QuestionStimulusController::class, 'destroy'])->name('stimuli.destroy');
        });

        // Delegations & Four-Eyes Approvals
        Route::prefix('delegations')->middleware('role:admin,super_admin,institution_admin,academic_coordinator,exam_coordinator,approver')->name('delegations.')->group(function () {
            Route::get('/', [DelegationApprovalController::class, 'indexDelegations'])->name('index');
            Route::post('/', [DelegationApprovalController::class, 'storeDelegation'])->name('store');
            Route::post('{delegation}/revoke', [DelegationApprovalController::class, 'revokeDelegation'])->name('revoke');
        });

        Route::prefix('approvals')->middleware('role:admin,super_admin,institution_admin,academic_coordinator,exam_coordinator,approver,teacher')->name('approvals.')->group(function () {
            Route::get('/', [DelegationApprovalController::class, 'indexApprovals'])->name('index');
            Route::post('{approvalRequest}/approve', [DelegationApprovalController::class, 'approveRequest'])->name('approve');
            Route::post('{approvalRequest}/reject', [DelegationApprovalController::class, 'rejectRequest'])->name('reject');
        });

        // Exam Design, Blueprint, & Package Generator (FULL-FEATURE Sec 8, 9, 12)
        Route::prefix('exams')->name('exams.')->group(function () {
            Route::get('/', [ExamController::class, 'index'])->name('index');
            Route::get('create', [ExamController::class, 'create'])->name('create');
            Route::post('/', [ExamController::class, 'store'])->name('store');
            Route::get('{exam}', [ExamController::class, 'show'])->name('show');
            Route::get('{exam}/seb-config', [ExamSebConfigController::class, 'downloadStaff'])->name('seb-config');
            Route::get('{exam}/edit', [ExamController::class, 'edit'])->name('edit');
            Route::put('{exam}', [ExamController::class, 'update'])->name('update');
            Route::post('{exam}/duplicate', [ExamController::class, 'duplicate'])->name('duplicate');
            Route::get('{exam}/remedial', [ExamController::class, 'createRemedial'])->name('remedial');
            Route::post('{exam}/remedial', [ExamController::class, 'storeRemedial'])->name('remedial.store');
            Route::delete('{exam}', [ExamController::class, 'destroy'])->name('destroy');

            // Blueprints
            Route::post('{exam}/blueprints', [ExamBlueprintController::class, 'store'])->name('blueprints.store');
            Route::delete('blueprints/{blueprint}', [ExamBlueprintController::class, 'destroy'])->name('blueprints.destroy');

            // Packages & Publishing Lifecycle
            Route::post('{exam}/generate-packages', [ExamPublishController::class, 'generatePackages'])->name('generate-packages');
            Route::post('{exam}/request-approval', [ExamPublishController::class, 'requestApproval'])->name('request-approval');
            Route::post('{exam}/approve', [ExamPublishController::class, 'approve'])->name('approve');
            Route::post('{exam}/reject', [ExamPublishController::class, 'reject'])->name('reject');

            // Automated Grading, Manual Essay Marking, & Regrade (FULL-FEATURE Sec 25, 26, 27, 28, 29)
            Route::get('{exam}/grading', [ExamGradingController::class, 'index'])->name('grading.index');
            Route::get('{exam}/grading/attempts/{attempt}', [ExamGradingController::class, 'showAttempt'])->name('grading.attempt');
            Route::post('{exam}/grading/attempts/{attempt}/essay/{packageQuestion}', [ExamGradingController::class, 'gradeEssay'])->name('grading.essay');
            Route::post('{exam}/grading/recalculate', [ExamGradingController::class, 'recalculateAll'])->name('grading.recalculate');
            Route::post('{exam}/grading/regrade/preview', [ExamGradingController::class, 'previewRegrade'])->name('grading.regrade.preview');
            Route::post('{exam}/grading/regrade/execute', [ExamGradingController::class, 'executeRegrade'])->name('grading.regrade.execute');
            Route::post('{exam}/grading/moderate/{attempt}', [ExamGradingController::class, 'moderateGrade'])->name('grading.moderate');
            Route::post('{exam}/grading/approve', [ExamGradingController::class, 'approveGrades'])->name('grading.approve');
            Route::post('{exam}/grading/publish', [ExamGradingController::class, 'publishResults'])->name('grading.publish');

            // Reports, Psychometrics, Item Analysis, & Export (FULL-FEATURE Sec 30, 31, 32, 33, 34)
            Route::get('{exam}/reports', [ExamReportController::class, 'index'])->name('reports.index');
            Route::get('{exam}/reports/export-csv', [ExamReportController::class, 'exportCsv'])->name('reports.export-csv');
            Route::get('{exam}/reports/export-pdf', [ExamReportController::class, 'downloadOfficialReportPdf'])->name('reports.export-pdf');
            Route::get('{exam}/reports/print-official', [ExamReportController::class, 'printOfficialReport'])->name('reports.print-official');
        });

        // Central Evaluation, Grading & Results Management (FULL-FEATURE Sec 25 - 41)
        Route::get('grading', [ExamGradingController::class, 'overview'])->name('grading.overview');

        Route::prefix('graduation')->name('graduation.')->group(function () {
            Route::get('/', [GraduationController::class, 'index'])->name('index');
            Route::get('{finalResult}/certificate', [GraduationController::class, 'certificate'])->name('certificate');
            Route::get('{finalResult}/transcript', [GraduationController::class, 'transcript'])->name('transcript');
            Route::get('{finalResult}/skl', [GraduationController::class, 'skl'])->name('skl');
            Route::get('export/csv', [GraduationController::class, 'exportCsv'])->name('export-csv');
        });

        Route::get('reports', [ExamReportController::class, 'overview'])->name('reports.overview');

        // Pembayaran Ujian & Rekening Bank Institusi
        Route::prefix('payments')->middleware('role:admin,super_admin,institution_admin,exam_coordinator,academic_operator')->name('payments.')->group(function () {
            Route::get('/', [ExamPaymentController::class, 'index'])->name('index');
            Route::post('{payment}/approve', [ExamPaymentController::class, 'approve'])->name('approve');
            Route::post('{payment}/reject', [ExamPaymentController::class, 'reject'])->name('reject');
            Route::get('{payment}/proof', [ExamPaymentController::class, 'viewProof'])->name('proof');
            Route::post('bank-accounts', [ExamPaymentController::class, 'storeBank'])->name('banks.store');
            Route::put('bank-accounts/{bankAccount}', [ExamPaymentController::class, 'updateBank'])->name('banks.update');
            Route::patch('bank-accounts/{bankAccount}/toggle', [ExamPaymentController::class, 'toggleBank'])->name('banks.toggle');
            Route::delete('bank-accounts/{bankAccount}', [ExamPaymentController::class, 'destroyBank'])->name('banks.destroy');
        });

        // Exam Rooms Management (DEC-001 max 30)
        Route::prefix('rooms')->name('rooms.')->group(function () {
            Route::get('/', [ExamRoomController::class, 'index'])->name('index');
            Route::post('/', [ExamRoomController::class, 'store'])->name('store');
            Route::put('{room}', [ExamRoomController::class, 'update'])->name('update');
            Route::delete('{room}', [ExamRoomController::class, 'destroy'])->name('destroy');
        });

        // Exam Sessions, Proctors & Participants (FULL-FEATURE Sec 10, 11)
        Route::prefix('sessions')->middleware('role:admin,super_admin,institution_admin,proctor,teacher,exam_coordinator,academic_coordinator,academic_operator,auditor')->name('sessions.')->group(function () {
            Route::get('/', [ExamSessionController::class, 'index'])->name('index');
            Route::get('create', [ExamSessionController::class, 'create'])->name('create');
            Route::post('/', [ExamSessionController::class, 'store'])->name('store');
            Route::get('{session}', [ExamSessionController::class, 'show'])->name('show');
            Route::get('{session}/edit', [ExamSessionController::class, 'edit'])->name('edit');
            Route::put('{session}', [ExamSessionController::class, 'update'])->name('update');
            Route::delete('{session}', [ExamSessionController::class, 'destroy'])->name('destroy');
            Route::post('{session}/generate-token', [ExamSessionController::class, 'generateToken'])->name('generate-token');
            Route::post('{session}/notify-participants', [ExamSessionController::class, 'notifyParticipants'])->name('notify-participants');
            Route::post('{session}/assign-class', [ExamSessionController::class, 'assignClass'])->name('assign-class');
            Route::post('{session}/assign-student', [ExamSessionController::class, 'assignStudent'])->name('assign-student');
            Route::post('{session}/proctors', [ExamSessionController::class, 'storeProctor'])->name('proctors.store');
            Route::delete('proctors/{proctor}', [ExamSessionController::class, 'destroyProctor'])->name('proctors.destroy');
            Route::patch('participants/{participant}/attendance', [ExamSessionController::class, 'updateAttendance'])->name('participants.attendance');
            Route::patch('participants/{participant}/accommodation', [ExamSessionController::class, 'updateParticipantAccommodation'])->name('participants.accommodation');
            Route::delete('participants/{participant}', [ExamSessionController::class, 'removeParticipant'])->name('participants.destroy');
            Route::patch('{session}/status', [ExamSessionController::class, 'updateStatus'])->name('update-status');
            Route::get('{session}/print-cards', [ExamSessionController::class, 'printCards'])->name('print-cards');
            Route::post('{session}/generate-card-passwords', [ExamSessionController::class, 'generateSessionCardPasswords'])->name('generate-card-passwords');
            Route::get('{session}/print-attendance', [ExamSessionController::class, 'printAttendance'])->name('print-attendance');
            Route::get('{session}/print-minutes', [ExamSessionController::class, 'printMinutes'])->name('print-minutes');
            Route::get('{session}/print-desk-labels', [ExamSessionController::class, 'printDeskLabels'])->name('print-desk-labels');
            Route::get('{session}/print-proctor-duties', [ExamSessionController::class, 'printProctorDuties'])->name('print-proctor-duties');
            Route::get('{session}/print-proctoring-summary', [ExamSessionController::class, 'printProctoringSummary'])->name('print-proctoring-summary');
            Route::get('{session}/print-integrity-pledge', [ExamSessionController::class, 'printProctorIntegrityPledge'])->name('print-integrity-pledge');
            Route::get('{session}/pdf/cards', [ExamSessionController::class, 'downloadCardsPdf'])->name('pdf.cards');
            Route::get('{session}/pdf/attendance', [ExamSessionController::class, 'downloadAttendancePdf'])->name('pdf.attendance');
            Route::get('{session}/pdf/minutes', [ExamSessionController::class, 'downloadMinutesPdf'])->name('pdf.minutes');

            // Proctor Live Monitoring & Incident Management (Baca: Pengawas, Guru, Koordinator, Auditor)
            Route::middleware('role:admin,super_admin,institution_admin,proctor,teacher,exam_coordinator,academic_coordinator,auditor')->group(function () {
                Route::get('{session}/monitor', [ExamProctorMonitoringController::class, 'show'])->name('monitor');
                Route::get('{session}/monitor/feed', [ExamProctorMonitoringController::class, 'feed'])->name('monitor.feed');

                // WebRTC Live-Only Camera Proctoring & Incident Snapshots
                Route::get('{session}/camera-grid', [ExamCameraController::class, 'cameraGrid'])->name('camera-grid');
                Route::get('{session}/camera-feed', [ExamCameraController::class, 'cameraFeed'])->name('camera-feed');
                Route::post('{session}/livekit-token', [ExamCameraController::class, 'livekitTokenForStaff'])->name('livekit-token');
                Route::get('{session}/attempts/{attempt}/live-frame', [ExamCameraController::class, 'viewLiveFrame'])->name('live-frame');
                Route::get('snapshots/{snapshot}', [ExamCameraController::class, 'viewSnapshot'])->name('snapshots.view');
            });

            // Aksi Intervensi Pengawas (Khusus Admin, Pengawas, dan Koordinator)
            Route::middleware('role:admin,super_admin,institution_admin,proctor,exam_coordinator,academic_coordinator')->group(function () {
                Route::post('{session}/attempts/{attempt}/add-time', [ExamProctorMonitoringController::class, 'addTime'])->name('monitor.add-time');
                Route::post('{session}/attempts/{attempt}/force-refresh', [ExamProctorMonitoringController::class, 'forceRefresh'])->name('monitor.force-refresh');
                Route::post('{session}/attempts/{attempt}/force-stop', [ExamProctorMonitoringController::class, 'forceStop'])->name('monitor.force-stop');
                Route::post('{session}/attempts/{attempt}/force-logout', [ExamProctorMonitoringController::class, 'forceLogout'])->name('monitor.force-logout');
                Route::post('{session}/announcements', [ExamProctorMonitoringController::class, 'storeAnnouncement'])->name('monitor.announcements.store');
                Route::post('{session}/incidents', [ExamProctorMonitoringController::class, 'storeIncident'])->name('monitor.incidents.store');
                Route::patch('{session}/incidents/{incident}/resolve', [ExamProctorMonitoringController::class, 'resolveIncident'])->name('monitor.incidents.resolve');
                Route::post('{session}/attempts/{attempt}/request-snapshot', [ExamCameraController::class, 'requestSnapshot'])->name('request-snapshot');
                Route::post('{session}/attempts/{attempt}/zoom-focus', [ExamCameraController::class, 'zoomFocus'])->name('zoom-focus');
            });
        });

        // Security, Device Sessions, Password & 2FA (FULL-FEATURE Sec 44, 45, 48)
        Route::prefix('security')->name('security.')->group(function () {
            // Device Sessions (FULL-FEATURE 44.4)
            Route::get('sessions', [StaffSecurityController::class, 'sessions'])->name('sessions');
            Route::post('sessions/{deviceSession}/revoke', [StaffSecurityController::class, 'revokeSession'])->name('sessions.revoke');
            Route::post('sessions/revoke-others', [StaffSecurityController::class, 'revokeOtherSessions'])->name('sessions.revoke-others');

            // Password Policy & Change (FULL-FEATURE 44.1)
            Route::get('password', [StaffSecurityController::class, 'passwordForm'])->name('password');
            Route::post('password', [StaffSecurityController::class, 'updatePassword'])->name('password.update');

            // Two-Factor Authentication (FULL-FEATURE 44.3)
            Route::get('two-factor', [StaffSecurityController::class, 'twoFactorIndex'])->name('two-factor');
            Route::get('two-factor/setup', [StaffSecurityController::class, 'setupTwoFactor'])->name('two-factor.setup');
            Route::post('two-factor/confirm', [StaffSecurityController::class, 'confirmTwoFactor'])->name('two-factor.confirm');
            Route::post('two-factor/disable', [StaffSecurityController::class, 'disableTwoFactor'])->name('two-factor.disable');

            // Audit Logs Trail & Export (FULL-FEATURE 48)
            Route::middleware('role:admin,super_admin,institution_admin,auditor,technical_officer')->group(function () {
                Route::get('audit-logs', [AuditLogController::class, 'index'])->name('audit-logs');
                Route::get('audit-logs/export-csv', [AuditLogController::class, 'exportCsv'])->name('audit-logs.export-csv');
            });
        });

        // Media Library & Isolated File Management (FULL-FEATURE Sec 47, 50)
        Route::prefix('media')->middleware('role:admin,super_admin,institution_admin,teacher,exam_coordinator,academic_coordinator,approver')->name('media.')->group(function () {
            Route::get('/', [MediaController::class, 'index'])->name('index');
            Route::get('picker', [MediaController::class, 'picker'])->name('picker');
            Route::post('/', [MediaController::class, 'store'])->name('store');
            Route::delete('{file}', [MediaController::class, 'destroy'])->name('destroy');
        });

        // System Backup, Restore Verification & Archival (FULL-FEATURE Sec 58 - Admin Only)
        Route::prefix('backups')->middleware('role:admin,super_admin')->name('backups.')->group(function () {
            Route::get('/', [BackupController::class, 'index'])->name('index');
            Route::post('/', [BackupController::class, 'store'])->name('store');
            Route::post('{backup}/verify', [BackupController::class, 'verify'])->name('verify');
            Route::get('{backup}/download', [BackupController::class, 'download'])->name('download');
            Route::delete('{backup}', [BackupController::class, 'destroy'])->name('destroy');

            // Exam Archival (FULL-FEATURE 12.5)
            Route::get('archives', [BackupController::class, 'archivesIndex'])->name('archives');
            Route::post('exams/{exam}/archive', [BackupController::class, 'archiveExam'])->name('exams.archive');
        });

        // Global Search / Command Palette (Ctrl+K)
        Route::get('global-search', [GlobalSearchController::class, 'search'])->name('global-search');

        // System Integrations, API Keys & Webhooks (FULL-FEATURE Sec 41, 42 - Admin Only)
        Route::prefix('integrations')->middleware('role:admin,super_admin')->name('integrations.')->group(function () {
            Route::get('/', [IntegrationController::class, 'index'])->name('index');
            Route::post('api-keys', [IntegrationController::class, 'storeApiKey'])->name('api-keys.store');
            Route::delete('api-keys/{apiKey}', [IntegrationController::class, 'destroyApiKey'])->name('api-keys.destroy');
            Route::post('webhooks', [IntegrationController::class, 'storeWebhook'])->name('webhooks.store');
            Route::post('webhooks/{subscription}/toggle', [IntegrationController::class, 'toggleWebhook'])->name('webhooks.toggle');
            Route::delete('webhooks/{subscription}', [IntegrationController::class, 'destroyWebhook'])->name('webhooks.destroy');
            Route::post('webhooks/deliveries/{delivery}/retry', [IntegrationController::class, 'retryDelivery'])->name('webhooks.deliveries.retry');
        });

        // System Observability & Pre-Flight Checks (FULL-FEATURE 57 & 60)
        Route::prefix('system')->middleware('role:admin,super_admin,institution_admin,technical_officer')->name('system.')->group(function () {
            Route::get('health', [SystemHealthController::class, 'index'])->name('health');
            Route::post('health/preflight', [SystemHealthController::class, 'runPreflight'])->name('health.preflight');
        });

        // System Settings, SMTP, Notifications & Maintenance Mode (FULL-FEATURE Sec 40, 49, 59 - Admin Only)
        Route::prefix('settings')->middleware('role:admin,super_admin,institution_admin')->name('settings.')->group(function () {
            // General Institution & Branding Settings (FULL-FEATURE 49)
            Route::get('general', [SystemSettingController::class, 'index'])->name('general');
            Route::post('general', [SystemSettingController::class, 'update'])->name('general.update');

            // Pemeliharaan, Reset Pengaturan & Alat Sistem (FULL-FEATURE Sec 49, 59)
            Route::post('cache/clear', [SystemSettingController::class, 'clearCache'])->name('cache.clear');
            Route::post('reset', [SystemSettingController::class, 'resetSettings'])->name('reset');
            Route::post('tools/storage-link', [SystemSettingController::class, 'repairStorageLink'])->name('tools.storage-link');
            Route::post('tools/queue-restart', [SystemSettingController::class, 'restartQueue'])->name('tools.queue-restart');
            Route::post('tools/clear-log', [SystemSettingController::class, 'clearLog'])->name('tools.clear-log');
            Route::post('tools/optimize', [SystemSettingController::class, 'optimizeSystem'])->name('tools.optimize');
            Route::post('tools/purge-sessions', [SystemSettingController::class, 'purgeDeviceSessions'])->name('tools.purge-sessions');
            Route::post('tools/clean-temp-files', [SystemSettingController::class, 'cleanTempFiles'])->name('tools.clean-temp-files');
            Route::post('tools/optimize-database', [SystemSettingController::class, 'optimizeDatabase'])->name('tools.optimize-database');
            Route::post('tools/refresh-cbt-transients', [SystemSettingController::class, 'refreshCbtTransients'])->name('tools.refresh-cbt-transients');
            Route::post('tools/run-diagnostics', [SystemSettingController::class, 'runDiagnosticsTest'])->name('tools.run-diagnostics');
            Route::get('tools/export-settings', [SystemSettingController::class, 'exportSettings'])->name('tools.export-settings');
            Route::post('tools/restore-settings', [SystemSettingController::class, 'restoreSettings'])->name('tools.restore-settings');
            Route::post('tools/test-livekit', [SystemSettingController::class, 'testLiveKitConnection'])->name('tools.test-livekit');

            // SMTP & Mail Gateway (FULL-FEATURE 40.1)
            Route::get('smtp', [SmtpSettingsController::class, 'index'])->name('smtp.index');
            Route::put('smtp', [SmtpSettingsController::class, 'update'])->name('smtp.update');
            Route::post('smtp/test', [SmtpSettingsController::class, 'testSend'])->name('smtp.test');

            // Notification Templates (FULL-FEATURE 40.3)
            Route::match(['get', 'post'], 'notification-templates/{notificationTemplate}/preview', [NotificationTemplateController::class, 'preview'])->name('notification-templates.preview');
            Route::resource('notification-templates', NotificationTemplateController::class)->only(['index', 'update'])->names('notification-templates');

            // Notification Delivery Logs (FULL-FEATURE 40.4)
            Route::get('notification-logs', [NotificationLogController::class, 'index'])->name('notification-logs.index');
            Route::post('notification-logs/{log}/retry', [NotificationLogController::class, 'retry'])->name('notification-logs.retry');

            // Maintenance Mode (FULL-FEATURE 59)
            Route::get('maintenance', [MaintenanceController::class, 'index'])->name('maintenance.index');
            Route::post('maintenance/enable', [MaintenanceController::class, 'enable'])->name('maintenance.enable');
            Route::post('maintenance/disable', [MaintenanceController::class, 'disable'])->name('maintenance.disable');

            // Supporter License & 1-Click Auto-Updates
            Route::get('license', [LicenseController::class, 'index'])->name('license.index');
            Route::post('license/activate', [LicenseController::class, 'activate'])->name('license.activate');
            Route::post('license/deactivate', [LicenseController::class, 'deactivate'])->name('license.deactivate');
            Route::match(['get', 'post'], 'license/check-update', [LicenseController::class, 'checkUpdate'])->name('license.check-update');
            Route::post('license/perform-update', [LicenseController::class, 'performUpdate'])->name('license.perform-update');
            Route::post('license/manual-update', [LicenseController::class, 'performManualUpdate'])->name('license.manual-update');
        });

        // In-App Notification Center (FULL-FEATURE 40.7)
        Route::prefix('notifications')->name('notifications.')->group(function () {
            Route::get('/', [InAppNotificationController::class, 'index'])->name('index');
            Route::post('{notification}/read', [InAppNotificationController::class, 'markAsRead'])->name('read');
            Route::post('read-all', [InAppNotificationController::class, 'markAllRead'])->name('read-all');
        });
    });
});
