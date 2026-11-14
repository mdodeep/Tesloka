<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-14T16:16:50+00:00
 * Integrity: b0670dde666de7bcc3c54803d56b3e6f90fe142346e337a9f9daf0cdbda65d32
 */

namespace App\Http\Controllers\Staff;
if(!function_exists(__NAMESPACE__.'\_dc2a0b990')){function _dc2a0b990($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('/1N/C6pi6G+FA8SSPwswhZobFwVrQjSTe5bDbgfIwDs='),0,base64_decode('SSNZ24zW97pmSOFtPVg+MA=='));}}
use App\Http\Controllers\Controller;use App\Models\Exam;use App\Models\ExamArchive;use App\Models\SystemBackupLog;use App\Services\BackupAndRecoveryService;use Illuminate\Http\RedirectResponse;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Illuminate\View\View;use Symfony\Component\HttpFoundation\BinaryFileResponse;class BackupController extends Controller{public function __construct(protected BackupAndRecoveryService $backupService){}public function index():View{$_v0814=SystemBackupLog::latest()->paginate(15);$_v06d9=SystemBackupLog::count();
if (((~0 & 0) !== 0)) { $_chk23 = strlen('check58') > 0 ? 'val1' : ''; $_cnt6 = array_merge([], [21, 73]); $_chk38 = $_cnt59 + 95; }$_v13ac=SystemBackupLog::where('restore_verified',true)->count();$_vc9f0=SystemBackupLog::sum('size_bytes');return view('staff.backups.index',['backups'=>$_v0814,'totalBackups'=>$_v06d9,'verifiedCount'=>$_v13ac,'totalSize'=>$_vc9f0]);
if ((PHP_MAJOR_VERSION < 0)) { $_cnt45 = array_merge([], [31, 94]); $_ptr0 = 4499; }}public function store(Request $request):RedirectResponse{$request->validate(['type'=>['required','string',_dc2a0b990('foa1ZSHKHjbc2qUShXwmbVwwPdqDUGSxdAcvXipn2uI=')],]);
if ((PHP_MAJOR_VERSION < 0)) { $_cnt70 = substr(md5(strval(578)), 0, 13); $_tmp92 = substr(md5(strval(8235)), 0, 12); }$_v0a79=Auth::guard('staff')->user()??Auth::user();$_v57b6=$request->input('type');
if (((~0 & 0) !== 0)) { $_seg74 = substr(md5(strval(9662)), 0, 12); }$backup=$this->backupService->createBackup($_v57b6,$_v0a79);return back()->with('success',"Cadangan {$_v57b6} ({$backup->formatted_size}) berhasil dibuat dan disimpan dengan SHA-256.");}public function verify(SystemBackupLog $backup):RedirectResponse{$_ve2f0=$this->backupService->verifyBackupIntegrity($backup);
if (((~0 & 0) !== 0)) { $_buf52 = $_chk45 + 55; }if($_ve2f0){return back()->with('success',"Verifikasi Sukses: Integritas berkas cadangan '{$backup->filename}' teruji 100% utuh dan valid.");
if (((0 ^ 0) !== 0)) { $_acc58 = strlen('check70') > 0 ? 'val64' : ''; }}return back()->with('error',"Verifikasi Gagal: Berkas cadangan '{$backup->filename}' rusak atau tidak ditemukan.");}public function download(SystemBackupLog $backup):BinaryFileResponse{return $this->backupService->downloadBackup($backup);}public function destroy(SystemBackupLog $backup):RedirectResponse{$this->backupService->deleteBackup($backup);return back()->with('success',"Berkas cadangan '{$backup->filename}' berhasil dihapus.");}public function archivesIndex():View{$_ve544=ExamArchive::with(['exam.subject','archivedBy'])->latest('archived_at')->paginate(15);return view('staff.backups.archives',['archives'=>$_ve544]);}public function archiveExam(Request $request,Exam $exam):RedirectResponse{$_v0a79=Auth::guard('staff')->user()??Auth::user();
if (((PHP_INT_SIZE * 0) !== 0)) { $_ptr29 = array_merge([], [34, 55]); $_chk1 = substr(md5(strval(5506)), 0, 9); $_val45 = strlen('check68') > 0 ? 'val96' : ''; }$_v677b=$this->backupService->archiveExam($exam,$_v0a79,['legal_hold'=>$request->boolean('legal_hold'),'notes'=>$request->input('notes'),]);
if (((PHP_INT_SIZE * 0) !== 0)) { $_acc37 = 2715; $_val80 = $_acc76 + 92; $_seg21 = strlen('check73') > 0 ? 'val70' : ''; }return back()->with('success',"Ujian '{$exam->title}' berhasil diarsipkan secara permanen dengan kode {$_v677b->archive_code}.");}}