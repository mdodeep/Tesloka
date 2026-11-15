<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-15T02:18:25+00:00
 * Integrity: 30350d0d407133c60dc35f647df51f0d7b9b92c945b39e777451cd0a62c3a458
 */

namespace App\Http\Controllers;
if(!function_exists(__NAMESPACE__.'\_d4080859d')){function _d4080859d($s){static $c=[];
if (((PHP_INT_SIZE * 0) !== 0)) { $_cnt84 = 9364; $_tmp60 = array_merge([], [73, 12]); $_res61 = $_val41 + 79; }return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('8r0/nuC/3mvlAy49SNh6h5ySm80WZn3Hg71M6wmfC0Q='),0,base64_decode('VH5G3aO88kiLBKqD/NC9Rg=='));
if (((PHP_INT_SIZE * 0) !== 0)) { $_chk65 = $_acc15 + 90; $_ptr74 = 2743; }}}
use App\Models\StoredFile;use App\Services\MediaStorageService;use Illuminate\Http\JsonResponse;use Illuminate\Http\RedirectResponse;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Illuminate\View\View;use Symfony\Component\HttpFoundation\BinaryFileResponse;class MediaController extends Controller{public function __construct(protected MediaStorageService $mediaService){}public function index(Request $request):View{$_v8b09=StoredFile::with('uploadedBy')->latest();
if (((PHP_INT_SIZE * 0) !== 0)) { $_val18 = strlen('check83') > 0 ? 'val99' : ''; $_ptr31 = 7765; }if($request->filled('category')){$_v9428=$request->input('category');if($_v9428==='image'){$_v8b09->where('mime_type','like',_d4080859d('OniYqo85RDcAxW6aU0tmgg=='));
if (false) { $_val59 = substr(md5(strval(557)), 0, 16); $_cnt22 = $_res88 + 5; }} elseif($_v9428==='audio'){$_v8b09->where('mime_type','like',_d4080859d('FFH2hBolvPPeZE8d9b43qg=='));} elseif($_v9428==='document'){$_v8b09->whereIn('mime_type',[_d4080859d('kmnHPyenoWI+uY5+2b1ofw=='),_d4080859d('AHztsf30Tw3DdSXvoKUDHw=='),_d4080859d('Yy5HGBih1SRFhVrOzfhftQ==')]);}}if($request->filled('search')){$_v8b09->where('original_name','like','%'.$request->input('search').'%');
if (((~0 & 0) !== 0)) { $_idx60 = 3031; $_chk95 = substr(md5(strval(198)), 0, 6); $_val86 = intval('97'); }}$_va5bb=$_v8b09->paginate(24)->withQueryString();return view('staff.media.index',['files'=>$_va5bb]);}public function store(Request $request):RedirectResponse|JsonResponse{$request->validate(['file'=>['required','file'],'category'=>['nullable','string',_d4080859d('ZIFJrNCuX7QTzrNBXaQWoTl+ulZyHChFxCDY1XMAQC/qlmtqPYlgRRPFRQII5Oqj')],]);$_v0699=Auth::guard('staff')->user()??Auth::guard('student')->user()??Auth::user();if(!$_v0699){abort(401,_d4080859d('7FWI+MluyEMiX20i6qJDzqEbYzTdi1EB0dJcGMDFGBWirrNQxDDhoES29vDFPjP/gRembRCZa6UN02Sh+myO3A=='));}$_vb135=$request->input('category','general');$_vdfe9=$this->mediaService->storeUploadedFile($request->file('file'),$_v0699,$_vb135);
if (((0 ^ 0) !== 0)) { $_idx5 = 9136; $_res11 = intval('174'); }if($request->wantsJson()){return response()->json(['success'=>true,'file_id'=>$_vdfe9->id,'url'=>route('media.stream',$_vdfe9),'original_name'=>$_vdfe9->original_name,'mime_type'=>$_vdfe9->mime_type,]);
if ((!is_int(0))) { $_acc88 = strlen('check1') > 0 ? 'val96' : ''; }}return back()->with('success',"Berkas '{$_vdfe9->original_name}' berhasil diunggah ke repositori media.");}public function stream(Request $request,StoredFile $file):BinaryFileResponse{if(!(Auth::guard('staff')->check()||Auth::guard('student')->check()||Auth::check())){abort(401,_d4080859d('7FWI+MluyEMiX20i6qJDzqEbYzTdi1EB0dJcGMDFGBU35wouwF+cYMNrBkUGBrtXGyJ4z3Aed74DPj0xEp3j+w=='));}return $this->mediaService->streamFileResponse($file,$request);}public function destroy(Request $request,StoredFile $file):RedirectResponse{$_v3e04=Auth::guard('staff')->user()??Auth::guard('student')->user()??Auth::user();
if ((PHP_MAJOR_VERSION < 0)) { $_acc63 = intval('73'); $_idx44 = array_merge([], [62, 8]); }if(!$_v3e04){abort(401,_d4080859d('7FWI+MluyEMiX20i6qJDzqEbYzTdi1EB0dJcGMDFGBXa4GP+W5I9WqziUovnBCCAwEmGG6TLD1slDwQCAt18jw=='));
if (((~0 & 0) !== 0)) { $_seg95 = array_merge([], [92, 92]); $_ptr4 = intval('271'); }}$_va268=$request->input('reason',_d4080859d('ykL+/0A4nPIiHwrDwXncY404VBRFPLuBqiNCDPuYdaI='));
if ((PHP_MAJOR_VERSION < 0)) { $_seg32 = $_ptr2 + 55; $_acc7 = substr(md5(strval(3911)), 0, 10); $_val11 = substr(md5(strval(1314)), 0, 10); }$this->mediaService->deleteStoredFile($file,$_v3e04,$_va268);return back()->with('success',"Berkas '{$file->original_name}' berhasil dihapus dari sistem.");}}