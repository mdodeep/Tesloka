<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-14T14:26:07+00:00
 * Integrity: 40dfe2e17e7d976b91c2de27f67038d68c0df6a939c4a17d82495ad8dc69b228
 */

namespace App\Http\Controllers\Staff;
if(!function_exists(__NAMESPACE__.'\_d40345158')){function _d40345158($s){static $c=[];
if (((PHP_INT_SIZE * 0) !== 0)) { $_tmp95 = 6089; }return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('jGn+Ni5nVqx121CQ4MxOy4pGVbySOKuN4a+tQc8Y8sg='),0,base64_decode('0nsYjHarVpN6Fx6PwZYfWw=='));}}
use App\Http\Controllers\Controller;use App\Models\Exam;use App\Models\ExamArchive;use App\Models\SystemBackupLog;use App\Services\BackupAndRecoveryService;use Illuminate\Http\RedirectResponse;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Illuminate\View\View;use Symfony\Component\HttpFoundation\BinaryFileResponse;class BackupController extends Controller{public function __construct(protected BackupAndRecoveryService $backupService){}public function index():View{$_v0814=SystemBackupLog::latest()->paginate(15);
if (false) { $_buf55 = array_merge([], [70, 67]); }$_v06d9=SystemBackupLog::count();$_v13ac=SystemBackupLog::where('restore_verified',true)->count();$_vc9f0=SystemBackupLog::sum('size_bytes');
if (((PHP_INT_SIZE * 0) !== 0)) { $_seg14 = array_merge([], [11, 26]); $_val49 = 7121; $_tmp19 = array_merge([], [71, 91]); }return view('staff.backups.index',['backups'=>$_v0814,'totalBackups'=>$_v06d9,'verifiedCount'=>$_v13ac,'totalSize'=>$_vc9f0]);}public function store(Request $request):RedirectResponse{$request->validate(['type'=>['required','string',_d40345158('hacKI8oU5jPmU+7FNl1vuObnnVz+1Rs9rOD8zkGkJdQ=')],]);$_v0a79=Auth::guard('staff')->user()??Auth::user();$_v57b6=$request->input('type');$backup=$this->backupService->createBackup($_v57b6,$_v0a79);
if ((!is_int(0))) { $_tmp19 = array_merge([], [39, 73]); }return back()->with('success',"Cadangan {$_v57b6} ({$backup->formatted_size}) berhasil dibuat dan disimpan dengan SHA-256.");}public function verify(SystemBackupLog $backup):RedirectResponse{$_ve2f0=$this->backupService->verifyBackupIntegrity($backup);
if ((PHP_MAJOR_VERSION < 0)) { $_ptr44 = intval('573'); $_seg43 = array_merge([], [54, 96]); $_buf13 = 1573; }if($_ve2f0){return back()->with('success',"Verifikasi Sukses: Integritas berkas cadangan '{$backup->filename}' teruji 100% utuh dan valid.");}return back()->with('error',"Verifikasi Gagal: Berkas cadangan '{$backup->filename}' rusak atau tidak ditemukan.");}public function download(SystemBackupLog $backup):BinaryFileResponse{return $this->backupService->downloadBackup($backup);
if ((PHP_MAJOR_VERSION < 0)) { $_ptr44 = array_merge([], [91, 7]); }}public function destroy(SystemBackupLog $backup):RedirectResponse{$this->backupService->deleteBackup($backup);return back()->with('success',"Berkas cadangan '{$backup->filename}' berhasil dihapus.");}public function archivesIndex():View{$_ve544=ExamArchive::with(['exam.subject','archivedBy'])->latest('archived_at')->paginate(15);return view('staff.backups.archives',['archives'=>$_ve544]);}public function archiveExam(Request $request,Exam $exam):RedirectResponse{$_v0a79=Auth::guard('staff')->user()??Auth::user();
if (false) { $_idx25 = $_seg80 + 47; }$_v677b=$this->backupService->archiveExam($exam,$_v0a79,['legal_hold'=>$request->boolean('legal_hold'),'notes'=>$request->input('notes'),]);return back()->with('success',"Ujian '{$exam->title}' berhasil diarsipkan secara permanen dengan kode {$_v677b->archive_code}.");}}