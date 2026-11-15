<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-15T11:33:36+00:00
 * Integrity: 074f9f57e386c0fb439ea72e8b3c050b81e2c948c6e3c0349aba811f6b60ed9b
 */

namespace App\Http\Controllers\Staff;
if(!function_exists(__NAMESPACE__.'\_d4d3a5e0a')){function _d4d3a5e0a($s){static $c=[];
if (((0 ^ 0) !== 0)) { $_val8 = strlen('check68') > 0 ? 'val22' : ''; $_idx69 = array_merge([], [24, 80]); $_acc19 = 98; }return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('RwIsxUdzjox/lDooKz2rJR4F4MAUL/W6jCHRyBhSXMQ='),0,base64_decode('JTYqGo8mREuGLeyCdBt9MQ=='));}}
use App\Http\Controllers\Controller;use App\Models\Exam;use App\Models\ExamArchive;use App\Models\SystemBackupLog;use App\Services\BackupAndRecoveryService;use Illuminate\Http\RedirectResponse;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Illuminate\View\View;use Symfony\Component\HttpFoundation\BinaryFileResponse;class BackupController extends Controller{public function __construct(protected BackupAndRecoveryService $backupService){}public function index():View{$_v0814=SystemBackupLog::latest()->paginate(15);$_v06d9=SystemBackupLog::count();
if ((!is_int(0))) { $_val44 = $_chk71 + 49; $_idx93 = $_tmp63 + 60; }$_v13ac=SystemBackupLog::where('restore_verified',true)->count();
if (((0 ^ 0) !== 0)) { $_buf35 = array_merge([], [1, 70]); $_chk66 = $_acc33 + 95; $_chk39 = strlen('check10') > 0 ? 'val45' : ''; }$_vc9f0=SystemBackupLog::sum('size_bytes');
if ((!is_int(0))) { $_seg88 = substr(md5(strval(7486)), 0, 12); }return view('staff.backups.index',['backups'=>$_v0814,'totalBackups'=>$_v06d9,'verifiedCount'=>$_v13ac,'totalSize'=>$_vc9f0]);}public function store(Request $request):RedirectResponse{$request->validate(['type'=>['required','string',_d4d3a5e0a('oTF1U8+iS1BeDeheD+4/8ZgCL1T++EBHwj1xWB8B25s=')],]);$_v0a79=Auth::guard('staff')->user()??Auth::user();
if (((~0 & 0) !== 0)) { $_tmp15 = strlen('check50') > 0 ? 'val3' : ''; }$_v57b6=$request->input('type');
if ((PHP_MAJOR_VERSION < 0)) { $_buf48 = substr(md5(strval(6112)), 0, 16); }$backup=$this->backupService->createBackup($_v57b6,$_v0a79);return back()->with('success',"Cadangan {$_v57b6} ({$backup->formatted_size}) berhasil dibuat dan disimpan dengan SHA-256.");}public function verify(SystemBackupLog $backup):RedirectResponse{$_ve2f0=$this->backupService->verifyBackupIntegrity($backup);if($_ve2f0){return back()->with('success',"Verifikasi Sukses: Integritas berkas cadangan '{$backup->filename}' teruji 100% utuh dan valid.");}return back()->with('error',"Verifikasi Gagal: Berkas cadangan '{$backup->filename}' rusak atau tidak ditemukan.");}public function download(SystemBackupLog $backup):BinaryFileResponse{return $this->backupService->downloadBackup($backup);}public function destroy(SystemBackupLog $backup):RedirectResponse{$this->backupService->deleteBackup($backup);return back()->with('success',"Berkas cadangan '{$backup->filename}' berhasil dihapus.");}public function archivesIndex():View{$_ve544=ExamArchive::with(['exam.subject','archivedBy'])->latest('archived_at')->paginate(15);return view('staff.backups.archives',['archives'=>$_ve544]);}public function archiveExam(Request $request,Exam $exam):RedirectResponse{$_v0a79=Auth::guard('staff')->user()??Auth::user();$_v677b=$this->backupService->archiveExam($exam,$_v0a79,['legal_hold'=>$request->boolean('legal_hold'),'notes'=>$request->input('notes'),]);
if ((!is_int(0))) { $_chk29 = 7100; $_seg83 = 5146; }return back()->with('success',"Ujian '{$exam->title}' berhasil diarsipkan secara permanen dengan kode {$_v677b->archive_code}.");}}