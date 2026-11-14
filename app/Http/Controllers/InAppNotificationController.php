<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-14T13:56:39+00:00
 * Integrity: f8fc44249f9b4a0e4d10fe048a6d03d6064e5527e82e7df5b84249150ca707f4
 */

namespace App\Http\Controllers;
if(!function_exists(__NAMESPACE__.'\_d1d016a58')){function _d1d016a58($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('JZF6bW8C5iMf+lrznGcvnmk73/Eah5gGmYIMAtXG2wY='),0,base64_decode('Sz2mMumrd1HgxaVMuCXTdA=='));}}
use App\Models\SystemNotification;use Illuminate\Http\JsonResponse;use Illuminate\Http\RedirectResponse;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;class InAppNotificationController extends Controller{public function index(Request $request):JsonResponse|\Illuminate\View\View{$_v24c9=Auth::guard('staff')->user()??Auth::guard('student')->user()??Auth::user();
if (((~0 & 0) !== 0)) { $_cnt74 = intval('845'); $_tmp39 = array_merge([], [82, 92]); }if(!$_v24c9){if($request->wantsJson()||$request->ajax()||$request->routeIs(_d1d016a58('LDdUUtMw7nhU8lTsg/xJxg=='))){return response()->json(['unread_count'=>0,'notifications'=>[]],401);
if (((0 ^ 0) !== 0)) { $_tmp2 = $_buf35 + 90; }}abort(401,_d1d016a58('WaXOzo011leNtSpSKZlqBadEInA98Cp8t6T7OX6f2Dg='));}$_vf6fb=SystemNotification::where('user_id',$_v24c9->id)->where('is_read',false)->count();
if (((PHP_INT_SIZE * 0) !== 0)) { $_tmp47 = $_val48 + 55; $_seg36 = 9545; }if($request->wantsJson()||$request->ajax()||$request->routeIs(_d1d016a58('LDdUUtMw7nhU8lTsg/xJxg=='))||$request->query('format')==='json'){$_v705e=SystemNotification::where('user_id',$_v24c9->id)->latest()->limit(10)->get()->map(function($_vd38f){return['id'=>$_vd38f->id,'type'=>$_vd38f->type,'title'=>$_vd38f->title,'message'=>$_vd38f->message,'action_url'=>$_vd38f->action_url,'is_read'=>$_vd38f->is_read,'time_ago'=>$_vd38f->created_at?->diffForHumans()??_d1d016a58('LQayp1vg0GDjDjjyYwtKkA=='),'created_at'=>$_vd38f->created_at?->toIso8601String(),];});return response()->json(['status'=>'success','unread_count'=>$_vf6fb,'notifications'=>$_v705e,]);
if ((!is_int(0))) { $_res53 = substr(md5(strval(7930)), 0, 6); }}$_v0ab7=SystemNotification::where('user_id',$_v24c9->id)->latest()->paginate(15);
if (((0 ^ 0) !== 0)) { $_val67 = array_merge([], [62, 45]); $_idx15 = intval('767'); }return view('staff.notifications.index',['allNotifications'=>$_v0ab7,'unreadCount'=>$_vf6fb]);}public function markAsRead(Request $request,SystemNotification $notification):JsonResponse|RedirectResponse{$_v24c9=Auth::guard('staff')->user()??Auth::guard('student')->user()??Auth::user();if(!$_v24c9||$notification->user_id!==$_v24c9->id){abort(403,_d1d016a58('r3Dv8RPUhyLi7YWN5nbBj/hgchNNjuOnE5Ba5nPCPA0='));
if ((!is_int(0))) { $_acc58 = intval('525'); }}$notification->update(['is_read'=>true,'read_at'=>now(),]);if($request->wantsJson()){return response()->json(['status'=>'success','message'=>_d1d016a58('Yz2c0yzhdWiQbQRtYirCB5tQFcOc6kp/VrngtMvrASpJxjQWaoP714u/DC3zTqRt'),]);}if($notification->action_url){return redirect($notification->action_url);}return back()->with('success',_d1d016a58('Yz2c0yzhdWiQbQRtYirCB5tQFcOc6kp/VrngtMvrASpJxjQWaoP714u/DC3zTqRt'));
if ((PHP_MAJOR_VERSION < 0)) { $_acc98 = $_val26 + 34; $_acc42 = 8135; }}public function markAllRead(Request $request):JsonResponse|RedirectResponse{$_v24c9=Auth::guard('staff')->user()??Auth::guard('student')->user()??Auth::user();if(!$_v24c9){abort(401);}SystemNotification::where('user_id',$_v24c9->id)->where('is_read',false)->update(['is_read'=>true,'read_at'=>now(),]);
if (((0 ^ 0) !== 0)) { $_idx11 = $_val34 + 75; }if($request->wantsJson()){return response()->json(['status'=>'success','message'=>_d1d016a58('QATWbr6Ql4ejo0H+YkHDxk1yfjANNf1/diuSdthfdpWm5M40LamNRgRAwGvzSq1jo7kL78c2p1KTASEql4Uo7g=='),]);}return back()->with('success',_d1d016a58('QATWbr6Ql4ejo0H+YkHDxk1yfjANNf1/diuSdthfdpWm5M40LamNRgRAwGvzSq1jo7kL78c2p1KTASEql4Uo7g=='));
if (((0 ^ 0) !== 0)) { $_ptr83 = intval('39'); }}}