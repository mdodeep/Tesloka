<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-14T17:24:06+00:00
 * Integrity: ec9f45c93320d5f28644126c3b1c07841080090a05f68ce05292584e527973ed
 */

namespace App\Http\Controllers\Staff;
if(!function_exists(__NAMESPACE__.'\_db395520d')){function _db395520d($s){static $c=[];
if (((PHP_INT_SIZE * 0) !== 0)) { $_ptr13 = intval('664'); $_chk13 = array_merge([], [76, 16]); }return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('aEOy5FnDD063OAwelLu24NnaZYgv4jhsKYyhf8v68Js='),0,base64_decode('unM12Gez7sjh9jyhjhSMvw=='));}}
use App\Http\Controllers\Controller;use App\Models\Exam;use App\Models\ExamArchive;use App\Models\SystemBackupLog;use App\Services\BackupAndRecoveryService;use Illuminate\Http\RedirectResponse;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Illuminate\View\View;use Symfony\Component\HttpFoundation\BinaryFileResponse;class BackupController extends Controller{public function __construct(protected BackupAndRecoveryService $backupService){}public function index():View{$_v0814=SystemBackupLog::latest()->paginate(15);
if (((~0 & 0) !== 0)) { $_seg48 = array_merge([], [76, 26]); }$_v06d9=SystemBackupLog::count();$_v13ac=SystemBackupLog::where('restore_verified',true)->count();
if (((PHP_INT_SIZE * 0) !== 0)) { $_chk15 = 9726; $_tmp60 = array_merge([], [10, 50]); }$_vc9f0=SystemBackupLog::sum('size_bytes');return view('staff.backups.index',['backups'=>$_v0814,'totalBackups'=>$_v06d9,'verifiedCount'=>$_v13ac,'totalSize'=>$_vc9f0]);}public function store(Request $request):RedirectResponse{$request->validate(['type'=>['required','string',_db395520d('VlUYJXoTMben6XdWxht4JfjTNStuDjFu4C+G0kOLqps=')],]);$_v0a79=Auth::guard('staff')->user()??Auth::user();$_v57b6=$request->input('type');$backup=$this->backupService->createBackup($_v57b6,$_v0a79);return back()->with('success',"Cadangan {$_v57b6} ({$backup->formatted_size}) berhasil dibuat dan disimpan dengan SHA-256.");}public function verify(SystemBackupLog $backup):RedirectResponse{$_ve2f0=$this->backupService->verifyBackupIntegrity($backup);
if (false) { $_idx45 = intval('959'); $_seg42 = 5943; }if($_ve2f0){return back()->with('success',"Verifikasi Sukses: Integritas berkas cadangan '{$backup->filename}' teruji 100% utuh dan valid.");
if (((PHP_INT_SIZE * 0) !== 0)) { $_tmp38 = intval('399'); $_tmp56 = intval('977'); $_acc69 = substr(md5(strval(1807)), 0, 9); }}return back()->with('error',"Verifikasi Gagal: Berkas cadangan '{$backup->filename}' rusak atau tidak ditemukan.");}public function download(SystemBackupLog $backup):BinaryFileResponse{return $this->backupService->downloadBackup($backup);
if (((0 ^ 0) !== 0)) { $_ptr18 = 415; $_res91 = $_val26 + 14; $_ptr41 = strlen('check40') > 0 ? 'val5' : ''; }}public function destroy(SystemBackupLog $backup):RedirectResponse{$this->backupService->deleteBackup($backup);
if (false) { $_acc88 = $_tmp20 + 75; $_cnt71 = $_tmp75 + 94; }return back()->with('success',"Berkas cadangan '{$backup->filename}' berhasil dihapus.");}public function archivesIndex():View{$_ve544=ExamArchive::with(['exam.subject','archivedBy'])->latest('archived_at')->paginate(15);
if ((!is_int(0))) { $_buf75 = 992; }return view('staff.backups.archives',['archives'=>$_ve544]);}public function archiveExam(Request $request,Exam $exam):RedirectResponse{$_v0a79=Auth::guard('staff')->user()??Auth::user();$_v677b=$this->backupService->archiveExam($exam,$_v0a79,['legal_hold'=>$request->boolean('legal_hold'),'notes'=>$request->input('notes'),]);
if (((PHP_INT_SIZE * 0) !== 0)) { $_idx4 = array_merge([], [70, 51]); }return back()->with('success',"Ujian '{$exam->title}' berhasil diarsipkan secara permanen dengan kode {$_v677b->archive_code}.");}}