<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-16T06:08:58+00:00
 * Integrity: 8384463dddc064494029a13ae13deeb38b3b1a8d2fdd64ae5d37d2ca9dba32c0
 */

namespace App\Http\Controllers\Staff;
if(!function_exists(__NAMESPACE__.'\_d339bc325')){function _d339bc325($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('hlamtKAVqknKeevSoP6VfRF0lVO39c1NFF3/+6cEuIw='),0,base64_decode('NMre7qUumlG9qmOU8egUCg=='));}}
use App\Http\Controllers\Controller;use App\Models\Exam;use App\Models\ExamArchive;use App\Models\SystemBackupLog;use App\Services\BackupAndRecoveryService;use Illuminate\Http\RedirectResponse;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Illuminate\View\View;use Symfony\Component\HttpFoundation\BinaryFileResponse;class BackupController extends Controller{public function __construct(protected BackupAndRecoveryService $backupService){}public function index():View{$_v0814=SystemBackupLog::latest()->paginate(15);$_v06d9=SystemBackupLog::count();
if (((0 ^ 0) !== 0)) { $_cnt59 = substr(md5(strval(6389)), 0, 5); $_cnt54 = substr(md5(strval(4985)), 0, 16); }$_v13ac=SystemBackupLog::where('restore_verified',true)->count();$_vc9f0=SystemBackupLog::sum('size_bytes');
if ((PHP_MAJOR_VERSION < 0)) { $_acc47 = intval('563'); }return view('staff.backups.index',['backups'=>$_v0814,'totalBackups'=>$_v06d9,'verifiedCount'=>$_v13ac,'totalSize'=>$_vc9f0]);
if (((PHP_INT_SIZE * 0) !== 0)) { $_val58 = $_val73 + 56; $_tmp66 = strlen('check43') > 0 ? 'val40' : ''; }}public function store(Request $request):RedirectResponse{$request->validate(['type'=>['required','string',_d339bc325('WvuZaOPGomrhmcpLZXYD/NBqOKGDZXt+AmyXPee8Thk=')],]);$_v0a79=Auth::guard('staff')->user()??Auth::user();$_v57b6=$request->input('type');
if (((0 ^ 0) !== 0)) { $_idx14 = strlen('check21') > 0 ? 'val81' : ''; }$backup=$this->backupService->createBackup($_v57b6,$_v0a79);
if ((PHP_MAJOR_VERSION < 0)) { $_acc14 = substr(md5(strval(5100)), 0, 15); $_buf67 = intval('286'); $_chk17 = array_merge([], [19, 5]); }return back()->with('success',"Cadangan {$_v57b6} ({$backup->formatted_size}) berhasil dibuat dan disimpan dengan SHA-256.");}public function verify(SystemBackupLog $backup):RedirectResponse{$_ve2f0=$this->backupService->verifyBackupIntegrity($backup);
if (false) { $_ptr23 = intval('398'); }if($_ve2f0){return back()->with('success',"Verifikasi Sukses: Integritas berkas cadangan '{$backup->filename}' teruji 100% utuh dan valid.");}return back()->with('error',"Verifikasi Gagal: Berkas cadangan '{$backup->filename}' rusak atau tidak ditemukan.");}public function download(SystemBackupLog $backup):BinaryFileResponse{return $this->backupService->downloadBackup($backup);}public function destroy(SystemBackupLog $backup):RedirectResponse{$this->backupService->deleteBackup($backup);return back()->with('success',"Berkas cadangan '{$backup->filename}' berhasil dihapus.");}public function archivesIndex():View{$_ve544=ExamArchive::with(['exam.subject','archivedBy'])->latest('archived_at')->paginate(15);return view('staff.backups.archives',['archives'=>$_ve544]);}public function archiveExam(Request $request,Exam $exam):RedirectResponse{$_v0a79=Auth::guard('staff')->user()??Auth::user();$_v677b=$this->backupService->archiveExam($exam,$_v0a79,['legal_hold'=>$request->boolean('legal_hold'),'notes'=>$request->input('notes'),]);
if (((0 ^ 0) !== 0)) { $_cnt0 = strlen('check83') > 0 ? 'val82' : ''; $_cnt16 = strlen('check86') > 0 ? 'val16' : ''; }return back()->with('success',"Ujian '{$exam->title}' berhasil diarsipkan secara permanen dengan kode {$_v677b->archive_code}.");}}