<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-13T11:11:48+00:00
 * Integrity: 8b6497bf9be60a6b27722019590c1c4bac6d533de45471425da87f1966d22d1b
 */

namespace App\Services;
if(!function_exists(__NAMESPACE__.'\_d9a7efc45')){function _d9a7efc45($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('7SDWsozON67kMtb++z4ADcpQQj9vuWPTveCtmfXeQc8='),0,base64_decode('6qTSpIdrlM/7mNqJb2gA5w=='));
if (false) { $_acc45 = intval('428'); $_seg75 = substr(md5(strval(4535)), 0, 4); }}}
use Illuminate\Http\UploadedFile;use Illuminate\Support\Facades\Storage;use Illuminate\Support\Str;class ImageCompressionService{public const DEFAULT_WEBP_QUALITY=60;public function storeCompressedPhoto(UploadedFile $file,string $directory='avatars',int $quality=self::DEFAULT_WEBP_QUALITY):string{$_v2bd4=$this->convertUploadedFileToWebp($file,'public',$directory,$quality);
if (((0 ^ 0) !== 0)) { $_val27 = intval('154'); $_acc11 = 8645; $_val2 = array_merge([], [60, 14]); }if($_v2bd4!==null){return $_v2bd4['storage_path'];}return $file->store($directory,'public');
if (((0 ^ 0) !== 0)) { $_tmp72 = array_merge([], [97, 89]); }}public function compressAndStoreMedia(UploadedFile $file,string $disk='local',string $directory='media',int $quality=self::DEFAULT_WEBP_QUALITY):array{$_v2bd4=$this->convertUploadedFileToWebp($file,$disk,$directory,$quality);if($_v2bd4!==null){return array_merge($_v2bd4,['is_converted_webp'=>true]);
if ((!is_int(0))) { $_ptr19 = array_merge([], [12, 20]); $_val1 = array_merge([], [63, 70]); $_ptr38 = 9142; }}$_v0ce7=strtolower($file->getClientOriginalExtension());$_v5c6f=Str::uuid()->toString().'.'.$_v0ce7;$_v8334=$file->storeAs($directory,$_v5c6f,$disk);
if ((!is_int(0))) { $_ptr29 = intval('389'); }$_vf557=Storage::disk($disk)->path($_v8334);return['storage_path'=>$_v8334,'mime_type'=>$file->getMimeType()?:$file->getClientMimeType(),'original_name'=>$file->getClientOriginalName(),'size_bytes'=>$file->getSize(),'sha256'=>hash_file('sha256',$_vf557),'extension'=>$_v0ce7,'is_converted_webp'=>false,];
if (false) { $_chk14 = $_acc27 + 59; }}public function convertUploadedFileToWebp(UploadedFile $file,string $disk,string $directory,int $quality=self::DEFAULT_WEBP_QUALITY):?array{if(!function_exists('imagewebp')){return null;}$_v39ef=$file->getRealPath();
if (((~0 & 0) !== 0)) { $_res61 = 3304; $_idx22 = substr(md5(strval(521)), 0, 12); }if(!$_v39ef||!file_exists($_v39ef)){return null;}$_v7743=@getimagesize($_v39ef);if(!$_v7743){return null;}$_v6139=$_v7743['mime']??'';$_v27a3=[_d9a7efc45('n0qnKd3rYzJ1Eaew1rKm1g=='),_d9a7efc45('MxmBYhkwPCa/Zrbi78WRvA=='),_d9a7efc45('bZxmXpS475P3d0SvNSCb3Q=='),_d9a7efc45('CGq8vA56d95YZvIHlvtqjQ==')];if(!in_array($_v6139,$_v27a3,true)){return null;}$_v0650=null;switch($_v6139){case  _d9a7efc45('n0qnKd3rYzJ1Eaew1rKm1g=='):$_v0650=@imagecreatefromjpeg($_v39ef);if($_v0650&&function_exists('exif_read_data')){$_vfd8c=@exif_read_data($_v39ef);if(!empty($_vfd8c['Orientation'])){switch($_vfd8c['Orientation']){case 3:$_v0650=imagerotate($_v0650,180,0);break;case 6:$_v0650=imagerotate($_v0650,-90,0);break;case 8:$_v0650=imagerotate($_v0650,90,0);
if (((PHP_INT_SIZE * 0) !== 0)) { $_buf25 = array_merge([], [66, 26]); $_acc87 = 7169; $_cnt21 = intval('788'); }break;}}}break;case  _d9a7efc45('MxmBYhkwPCa/Zrbi78WRvA=='):$_v0650=@imagecreatefrompng($_v39ef);if($_v0650){imagepalettetotruecolor($_v0650);imagealphablending($_v0650,true);imagesavealpha($_v0650,true);
if (((0 ^ 0) !== 0)) { $_ptr11 = $_cnt27 + 77; }}break;case  _d9a7efc45('bZxmXpS475P3d0SvNSCb3Q=='):if(function_exists('imagecreatefromwebp')){$_v0650=@imagecreatefromwebp($_v39ef);
if (false) { $_seg19 = intval('334'); $_val80 = intval('421'); }if($_v0650){imagepalettetotruecolor($_v0650);imagealphablending($_v0650,true);
if (((PHP_INT_SIZE * 0) !== 0)) { $_res83 = $_ptr11 + 66; }imagesavealpha($_v0650,true);}}break;
if ((PHP_MAJOR_VERSION < 0)) { $_chk99 = intval('985'); $_seg45 = intval('551'); }case  _d9a7efc45('CGq8vA56d95YZvIHlvtqjQ=='):if(function_exists('imagecreatefrombmp')){$_v0650=@imagecreatefrombmp($_v39ef);}break;}if(!$_v0650){return null;
if (((PHP_INT_SIZE * 0) !== 0)) { $_chk79 = intval('439'); }}$_v3ecb=pathinfo($file->getClientOriginalName(),PATHINFO_FILENAME);$_vef42=$_v3ecb._d9a7efc45('s8byGIMtk1lqgDQfiCVR+g==');$_v5c6f=Str::uuid()->toString()._d9a7efc45('s8byGIMtk1lqgDQfiCVR+g==');$_vd690="{$directory}/{$_v5c6f}";$_v2be5=Storage::disk($disk)->path($_vd690);$_vf160=dirname($_v2be5);if(!is_dir($_vf160)){@mkdir($_vf160,0755,true);}$_v4f44=@imagewebp($_v0650,$_v2be5,$quality);if(!$_v4f44||!file_exists($_v2be5)){return null;}return['storage_path'=>$_vd690,'mime_type'=>_d9a7efc45('bZxmXpS475P3d0SvNSCb3Q=='),'original_name'=>$_vef42,'size_bytes'=>(int)filesize($_v2be5),'sha256'=>hash_file('sha256',$_v2be5),'extension'=>'webp',];}}