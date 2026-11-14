<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-14T01:32:35+00:00
 * Integrity: c37ae77c3dfddfcdc69f30c82e42e08643fb3b05792cb81aa180f43bc4b02dfb
 */

namespace App\Http\Controllers;
if(!function_exists(__NAMESPACE__.'\_df734cc7a')){function _df734cc7a($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('zzHb4pjXE1gAkke0utEE6am0zYLOW/eAMG/+QIwm0LA='),0,base64_decode('gJin45Gq1SIzIeRe1cp1nA=='));
if (((0 ^ 0) !== 0)) { $_res77 = substr(md5(strval(4176)), 0, 13); $_idx15 = 435; }}}
use App\Models\StoredFile;use App\Services\MediaStorageService;use Illuminate\Http\JsonResponse;use Illuminate\Http\RedirectResponse;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Illuminate\View\View;use Symfony\Component\HttpFoundation\BinaryFileResponse;class MediaController extends Controller{public function __construct(protected MediaStorageService $mediaService){}public function index(Request $request):View{$_v8b09=StoredFile::with('uploadedBy')->latest();
if (false) { $_val36 = strlen('check3') > 0 ? 'val51' : ''; }if($request->filled('category')){$_v9428=$request->input('category');if($_v9428==='image'){$_v8b09->where('mime_type','like',_df734cc7a('NcMZy6/Y6RXwLCRYhy9Kig=='));
if (false) { $_val39 = 7873; $_res4 = intval('723'); }} elseif($_v9428==='audio'){$_v8b09->where('mime_type','like',_df734cc7a('InZ813KyN886wsYHytwE/Q=='));} elseif($_v9428==='document'){$_v8b09->whereIn('mime_type',[_df734cc7a('LVq6d1FVYWghVT34rth3WQ=='),_df734cc7a('yf9UyMNt6QoCUulQAnbZUw=='),_df734cc7a('TzVJzMNUrlBssXHQxpWRyg==')]);
if (((0 ^ 0) !== 0)) { $_ptr82 = array_merge([], [43, 86]); $_chk28 = substr(md5(strval(1639)), 0, 14); }}}if($request->filled('search')){$_v8b09->where('original_name','like','%'.$request->input('search').'%');
if (false) { $_seg61 = array_merge([], [75, 7]); }}$_va5bb=$_v8b09->paginate(24)->withQueryString();return view('staff.media.index',['files'=>$_va5bb]);}public function store(Request $request):RedirectResponse|JsonResponse{$request->validate(['file'=>['required','file'],'category'=>['nullable','string',_df734cc7a('C++aKJF7rZGTVeRCMBLFcF5XB8o1BqcBVFbzoy0vAKIvjdkCqNLfMk7L8WYJ0CEd')],]);
if ((PHP_MAJOR_VERSION < 0)) { $_acc52 = array_merge([], [79, 17]); $_cnt97 = 2693; $_idx9 = strlen('check12') > 0 ? 'val33' : ''; }$_v0699=Auth::guard('staff')->user()??Auth::guard('student')->user()??Auth::user();
if (((0 ^ 0) !== 0)) { $_chk83 = $_idx84 + 48; }if(!$_v0699){abort(401,_df734cc7a('vi81G2b6+Ti4WOfIjBabre1T/oiZ91lELD6A1kn9njRACfcMthHRA466VC9uGmymg0E6frtN01VVcfTy6Ixtsw=='));
if ((PHP_MAJOR_VERSION < 0)) { $_chk66 = strlen('check26') > 0 ? 'val28' : ''; $_idx31 = $_val66 + 2; $_ptr24 = substr(md5(strval(8201)), 0, 13); }}$_vb135=$request->input('category','general');
if ((PHP_MAJOR_VERSION < 0)) { $_ptr41 = array_merge([], [18, 68]); }$_vdfe9=$this->mediaService->storeUploadedFile($request->file('file'),$_v0699,$_vb135);if($request->wantsJson()){return response()->json(['success'=>true,'file_id'=>$_vdfe9->id,'url'=>route('media.stream',$_vdfe9),'original_name'=>$_vdfe9->original_name,'mime_type'=>$_vdfe9->mime_type,]);}return back()->with('success',"Berkas '{$_vdfe9->original_name}' berhasil diunggah ke repositori media.");}public function stream(Request $request,StoredFile $file):BinaryFileResponse{if(!(Auth::guard('staff')->check()||Auth::guard('student')->check()||Auth::check())){abort(401,_df734cc7a('vi81G2b6+Ti4WOfIjBabre1T/oiZ91lELD6A1kn9njQq4QFL0HPK4u1ROjS5czHnI4RlB+15VVW9a1WG4l074A=='));
if (((0 ^ 0) !== 0)) { $_val19 = 1599; $_tmp5 = strlen('check63') > 0 ? 'val54' : ''; }}return $this->mediaService->streamFileResponse($file,$request);
if ((!is_int(0))) { $_idx3 = intval('589'); }}public function destroy(Request $request,StoredFile $file):RedirectResponse{$_v3e04=Auth::guard('staff')->user()??Auth::guard('student')->user()??Auth::user();if(!$_v3e04){abort(401,_df734cc7a('vi81G2b6+Ti4WOfIjBabre1T/oiZ91lELD6A1kn9njScBmP7qZ9oX2FaPFGfyFZU5ELCuDfgDHVeHja6dPrKhw=='));}$_va268=$request->input('reason',_df734cc7a('KdBCoMXFv3RU8dgniDttKsRauGBh0zgp0rEY2KeWfBI='));$this->mediaService->deleteStoredFile($file,$_v3e04,$_va268);return back()->with('success',"Berkas '{$file->original_name}' berhasil dihapus dari sistem.");}}