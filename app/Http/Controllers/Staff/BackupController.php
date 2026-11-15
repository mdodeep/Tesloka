<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-15T07:23:31+00:00
 * Integrity: 0fc568f4ba4da30bba9c07ba10466fcbbd923ab1e1fb4a8258d0fef9ced27354
 */

namespace App\Http\Controllers\Staff;
if(!function_exists(__NAMESPACE__.'\_d3ea7448a')){function _d3ea7448a($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('QfVSoI7KGP9Of/LFf7gYHBoptCFzO+TjLeqHofON+1E='),0,base64_decode('8lQKyYdngWgzVGwzAVNgDg=='));}}
use App\Http\Controllers\Controller;use App\Models\Exam;use App\Models\ExamArchive;use App\Models\SystemBackupLog;use App\Services\BackupAndRecoveryService;use Illuminate\Http\RedirectResponse;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Illuminate\View\View;use Symfony\Component\HttpFoundation\BinaryFileResponse;class BackupController extends Controller{public function __construct(protected BackupAndRecoveryService $backupService){}public function index():View{$_v0814=SystemBackupLog::latest()->paginate(15);
if (((~0 & 0) !== 0)) { $_val12 = substr(md5(strval(98)), 0, 13); $_buf5 = intval('683'); }$_v06d9=SystemBackupLog::count();$_v13ac=SystemBackupLog::where('restore_verified',true)->count();$_vc9f0=SystemBackupLog::sum('size_bytes');
if (false) { $_res83 = array_merge([], [84, 75]); $_buf45 = array_merge([], [44, 85]); }return view('staff.backups.index',['backups'=>$_v0814,'totalBackups'=>$_v06d9,'verifiedCount'=>$_v13ac,'totalSize'=>$_vc9f0]);
if ((!is_int(0))) { $_ptr28 = $_ptr46 + 92; $_val17 = array_merge([], [1, 86]); $_idx4 = 645; }}public function store(Request $request):RedirectResponse{$request->validate(['type'=>['required','string',_d3ea7448a('SrwfCXgW7zmmtQYMgiX5fZ7odD1MMQeEvFuDHYlfiPU=')],]);
if ((!is_int(0))) { $_buf7 = array_merge([], [93, 13]); }$_v0a79=Auth::guard('staff')->user()??Auth::user();$_v57b6=$request->input('type');
if (false) { $_tmp84 = array_merge([], [37, 16]); $_acc68 = strlen('check14') > 0 ? 'val49' : ''; $_val94 = array_merge([], [23, 17]); }$backup=$this->backupService->createBackup($_v57b6,$_v0a79);
if (((PHP_INT_SIZE * 0) !== 0)) { $_tmp1 = substr(md5(strval(4892)), 0, 5); $_idx95 = array_merge([], [53, 19]); $_chk54 = 1617; }return back()->with('success',"Cadangan {$_v57b6} ({$backup->formatted_size}) berhasil dibuat dan disimpan dengan SHA-256.");}public function verify(SystemBackupLog $backup):RedirectResponse{$_ve2f0=$this->backupService->verifyBackupIntegrity($backup);
if (((PHP_INT_SIZE * 0) !== 0)) { $_cnt12 = $_buf39 + 23; }if($_ve2f0){return back()->with('success',"Verifikasi Sukses: Integritas berkas cadangan '{$backup->filename}' teruji 100% utuh dan valid.");}return back()->with('error',"Verifikasi Gagal: Berkas cadangan '{$backup->filename}' rusak atau tidak ditemukan.");}public function download(SystemBackupLog $backup):BinaryFileResponse{return $this->backupService->downloadBackup($backup);}public function destroy(SystemBackupLog $backup):RedirectResponse{$this->backupService->deleteBackup($backup);return back()->with('success',"Berkas cadangan '{$backup->filename}' berhasil dihapus.");}public function archivesIndex():View{$_ve544=ExamArchive::with(['exam.subject','archivedBy'])->latest('archived_at')->paginate(15);return view('staff.backups.archives',['archives'=>$_ve544]);}public function archiveExam(Request $request,Exam $exam):RedirectResponse{$_v0a79=Auth::guard('staff')->user()??Auth::user();$_v677b=$this->backupService->archiveExam($exam,$_v0a79,['legal_hold'=>$request->boolean('legal_hold'),'notes'=>$request->input('notes'),]);return back()->with('success',"Ujian '{$exam->title}' berhasil diarsipkan secara permanen dengan kode {$_v677b->archive_code}.");}}