<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-16T15:39:42+00:00
 * Integrity: 53bc74327c18e765d74c6475f6b850465c9378654adb7b23448a7ac1e9cf25b0
 */

namespace App\Http\Controllers\Staff;
if(!function_exists(__NAMESPACE__.'\_dada8f5f2')){function _dada8f5f2($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('njzEHBLnmbSqcm0Y3QB/xnD1xLfUhXVwzq11TQXGtvk='),0,base64_decode('I9R4dF9eawkjfBgvOozJmw=='));}}
use App\Http\Controllers\Controller;use App\Models\Exam;use App\Models\ExamArchive;use App\Models\SystemBackupLog;use App\Services\BackupAndRecoveryService;use Illuminate\Http\RedirectResponse;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Illuminate\View\View;use Symfony\Component\HttpFoundation\BinaryFileResponse;class BackupController extends Controller{public function __construct(protected BackupAndRecoveryService $backupService){}public function index():View{$_v0814=SystemBackupLog::latest()->paginate(15);
if (((~0 & 0) !== 0)) { $_seg88 = 570; $_res76 = intval('853'); $_tmp14 = $_acc92 + 53; }$_v06d9=SystemBackupLog::count();
if (((~0 & 0) !== 0)) { $_cnt58 = intval('781'); $_acc28 = 6964; $_ptr36 = array_merge([], [59, 22]); }$_v13ac=SystemBackupLog::where('restore_verified',true)->count();$_vc9f0=SystemBackupLog::sum('size_bytes');return view('staff.backups.index',['backups'=>$_v0814,'totalBackups'=>$_v06d9,'verifiedCount'=>$_v13ac,'totalSize'=>$_vc9f0]);}public function store(Request $request):RedirectResponse{$request->validate(['type'=>['required','string',_dada8f5f2('fQIVUjMv/funEkJpH7gxKiqxSXyUc2xH/jL7tzOHH7M=')],]);$_v0a79=Auth::guard('staff')->user()??Auth::user();$_v57b6=$request->input('type');$backup=$this->backupService->createBackup($_v57b6,$_v0a79);return back()->with('success',"Cadangan {$_v57b6} ({$backup->formatted_size}) berhasil dibuat dan disimpan dengan SHA-256.");}public function verify(SystemBackupLog $backup):RedirectResponse{$_ve2f0=$this->backupService->verifyBackupIntegrity($backup);if($_ve2f0){return back()->with('success',"Verifikasi Sukses: Integritas berkas cadangan '{$backup->filename}' teruji 100% utuh dan valid.");
if (((PHP_INT_SIZE * 0) !== 0)) { $_idx14 = intval('999'); $_chk62 = intval('349'); }}return back()->with('error',"Verifikasi Gagal: Berkas cadangan '{$backup->filename}' rusak atau tidak ditemukan.");}public function download(SystemBackupLog $backup):BinaryFileResponse{return $this->backupService->downloadBackup($backup);}public function destroy(SystemBackupLog $backup):RedirectResponse{$this->backupService->deleteBackup($backup);
if (false) { $_cnt70 = array_merge([], [17, 88]); }return back()->with('success',"Berkas cadangan '{$backup->filename}' berhasil dihapus.");}public function archivesIndex():View{$_ve544=ExamArchive::with(['exam.subject','archivedBy'])->latest('archived_at')->paginate(15);
if (((0 ^ 0) !== 0)) { $_idx19 = intval('544'); }return view('staff.backups.archives',['archives'=>$_ve544]);
if (((~0 & 0) !== 0)) { $_cnt74 = 3346; $_buf0 = 2423; $_ptr46 = array_merge([], [49, 76]); }}public function archiveExam(Request $request,Exam $exam):RedirectResponse{$_v0a79=Auth::guard('staff')->user()??Auth::user();
if (false) { $_val22 = 1772; $_buf20 = substr(md5(strval(3328)), 0, 15); $_idx94 = substr(md5(strval(7418)), 0, 4); }$_v677b=$this->backupService->archiveExam($exam,$_v0a79,['legal_hold'=>$request->boolean('legal_hold'),'notes'=>$request->input('notes'),]);
if (false) { $_ptr36 = strlen('check81') > 0 ? 'val18' : ''; $_seg0 = array_merge([], [84, 21]); $_val96 = 1216; }return back()->with('success',"Ujian '{$exam->title}' berhasil diarsipkan secara permanen dengan kode {$_v677b->archive_code}.");}}