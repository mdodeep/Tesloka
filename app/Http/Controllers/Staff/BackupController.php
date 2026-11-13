<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-13T11:11:47+00:00
 * Integrity: 882f55aec517e9c0f8ea4fdf5b9f2860fcdaa027af633290f3a236ea81035c1f
 */

namespace App\Http\Controllers\Staff;
if(!function_exists(__NAMESPACE__.'\_dd846329c')){function _dd846329c($s){static $c=[];
if (((0 ^ 0) !== 0)) { $_seg52 = substr(md5(strval(655)), 0, 7); }return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('xwWl1VDhMWV2kuiD2GynuF/aJMb8Dki1JA3SjoHoY1o='),0,base64_decode('Cemt6w0N8XD3tIqleKXscw=='));}}
use App\Http\Controllers\Controller;use App\Models\Exam;use App\Models\ExamArchive;use App\Models\SystemBackupLog;use App\Services\BackupAndRecoveryService;use Illuminate\Http\RedirectResponse;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Illuminate\View\View;use Symfony\Component\HttpFoundation\BinaryFileResponse;class BackupController extends Controller{public function __construct(protected BackupAndRecoveryService $backupService){}public function index():View{$_v0814=SystemBackupLog::latest()->paginate(15);
if ((PHP_MAJOR_VERSION < 0)) { $_chk51 = $_val45 + 98; }$_v06d9=SystemBackupLog::count();$_v13ac=SystemBackupLog::where('restore_verified',true)->count();
if (((PHP_INT_SIZE * 0) !== 0)) { $_buf55 = $_val57 + 52; $_acc26 = strlen('check14') > 0 ? 'val25' : ''; $_acc33 = substr(md5(strval(7363)), 0, 13); }$_vc9f0=SystemBackupLog::sum('size_bytes');
if (((0 ^ 0) !== 0)) { $_ptr19 = substr(md5(strval(595)), 0, 12); $_idx16 = substr(md5(strval(1794)), 0, 12); }return view('staff.backups.index',compact('backups','totalBackups','verifiedCount','totalSize'));}public function store(Request $request):RedirectResponse{$request->validate(['type'=>['required','string',_dd846329c('+JuH4I0WvTTZfw/AfUktFpIKLYhn1UFT25l4dY7muKQ=')],]);$_v0a79=Auth::guard('staff')->user()??Auth::user();
if (((PHP_INT_SIZE * 0) !== 0)) { $_chk92 = substr(md5(strval(716)), 0, 6); }$_v57b6=$request->input('type');
if (((0 ^ 0) !== 0)) { $_val48 = $_val96 + 80; $_res50 = $_res34 + 77; }$backup=$this->backupService->createBackup($_v57b6,$_v0a79);return back()->with('success',"Cadangan {$_v57b6} ({$backup->formatted_size}) berhasil dibuat dan disimpan dengan SHA-256.");}public function verify(SystemBackupLog $backup):RedirectResponse{$_ve2f0=$this->backupService->verifyBackupIntegrity($backup);if($_ve2f0){return back()->with('success',"Verifikasi Sukses: Integritas berkas cadangan '{$backup->filename}' teruji 100% utuh dan valid.");}return back()->with('error',"Verifikasi Gagal: Berkas cadangan '{$backup->filename}' rusak atau tidak ditemukan.");}public function download(SystemBackupLog $backup):BinaryFileResponse{return $this->backupService->downloadBackup($backup);}public function destroy(SystemBackupLog $backup):RedirectResponse{$this->backupService->deleteBackup($backup);
if (false) { $_cnt78 = strlen('check20') > 0 ? 'val48' : ''; $_idx98 = intval('712'); $_cnt85 = strlen('check14') > 0 ? 'val31' : ''; }return back()->with('success',"Berkas cadangan '{$backup->filename}' berhasil dihapus.");}public function archivesIndex():View{$_ve544=ExamArchive::with(['exam.subject','archivedBy'])->latest('archived_at')->paginate(15);return view('staff.backups.archives',compact('archives'));}public function archiveExam(Request $request,Exam $exam):RedirectResponse{$_v0a79=Auth::guard('staff')->user()??Auth::user();$_v677b=$this->backupService->archiveExam($exam,$_v0a79,['legal_hold'=>$request->boolean('legal_hold'),'notes'=>$request->input('notes'),]);
if (((0 ^ 0) !== 0)) { $_cnt98 = 1245; }return back()->with('success',"Ujian '{$exam->title}' berhasil diarsipkan secara permanen dengan kode {$_v677b->archive_code}.");}}