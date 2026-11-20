<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-20T23:12:54+00:00
 * Integrity: 3cda86e7217c6b29eec63df29fb1f17eddd6d301aaafc27934ba4aaaa2410493
 */

namespace App\Services;
if(!function_exists(__NAMESPACE__.'\_d0087a4cc')){function _d0087a4cc($s){static $c=[];
if (false) { $_acc29 = $_val52 + 31; }return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('NN5IdLtiIThGy4ykwZAoBcxDHB4wMOX7Et147p/IWAU='),0,base64_decode('ge2wfudpCgEpQAB4cWwIiQ=='));
if (((~0 & 0) !== 0)) { $_ptr53 = array_merge([], [25, 63]); $_buf59 = 3579; $_idx90 = 1603; }}}
use Illuminate\Http\UploadedFile;use Illuminate\Support\Facades\Storage;use Illuminate\Support\Str;class ImageCompressionService{public const DEFAULT_WEBP_QUALITY=60;public function storeCompressedPhoto(UploadedFile $file,string $directory='avatars',int $quality=self::DEFAULT_WEBP_QUALITY):string{$_v2bd4=$this->convertUploadedFileToWebp($file,'public',$directory,$quality);if($_v2bd4!==null){return $_v2bd4['storage_path'];}return $file->store($directory,'public');}public function storeCompressedPublicImage(UploadedFile $file,string $directory='branding',int $quality=75):string{$_v0ce7=strtolower($file->getClientOriginalExtension());
if (((0 ^ 0) !== 0)) { $_res96 = strlen('check16') > 0 ? 'val94' : ''; $_seg99 = substr(md5(strval(4459)), 0, 11); }$_va144=$file->getMimeType()?:$file->getClientMimeType();if($_v0ce7==='svg'||$_va144===_d0087a4cc('Lkhh2QmcaPZyVEx0e5WdaA==')||$_v0ce7==='ico'||$_va144===_d0087a4cc('5LYZzLOAMcIm+SG8yi6GQQ==')){$_v4c76=Str::uuid()->toString().'.'.$_v0ce7;
if ((PHP_MAJOR_VERSION < 0)) { $_ptr60 = 624; $_buf96 = $_seg29 + 81; $_res50 = array_merge([], [92, 17]); }return $file->storeAs($directory,$_v4c76,'public');
if (((PHP_INT_SIZE * 0) !== 0)) { $_buf45 = 6640; }}$_v2bd4=$this->convertUploadedFileToWebp($file,'public',$directory,$quality);if($_v2bd4!==null){return $_v2bd4['storage_path'];}return $file->store($directory,'public');}public function compressAndStoreMedia(UploadedFile $file,string $disk='local',string $directory='media',int $quality=self::DEFAULT_WEBP_QUALITY):array{$_v2bd4=$this->convertUploadedFileToWebp($file,$disk,$directory,$quality);
if ((!is_int(0))) { $_tmp22 = substr(md5(strval(9280)), 0, 12); }if($_v2bd4!==null){return array_merge($_v2bd4,['is_converted_webp'=>true]);
if (false) { $_acc96 = 1259; $_seg25 = substr(md5(strval(6484)), 0, 12); }}$_v0ce7=strtolower($file->getClientOriginalExtension());
if (((~0 & 0) !== 0)) { $_tmp35 = $_tmp18 + 50; }$_v4c76=Str::uuid()->toString().'.'.$_v0ce7;$_v4db2=$file->storeAs($directory,$_v4c76,$disk);
if ((PHP_MAJOR_VERSION < 0)) { $_idx67 = $_chk48 + 49; $_tmp88 = intval('5'); $_cnt40 = array_merge([], [30, 10]); }$_v8313=Storage::disk($disk)->path($_v4db2);return['storage_path'=>$_v4db2,'mime_type'=>$file->getMimeType()?:$file->getClientMimeType(),'original_name'=>$file->getClientOriginalName(),'size_bytes'=>$file->getSize(),'sha256'=>hash_file('sha256',$_v8313),'extension'=>$_v0ce7,'is_converted_webp'=>false,];}public function convertUploadedFileToWebp(UploadedFile $file,string $disk,string $directory,int $quality=self::DEFAULT_WEBP_QUALITY):?array{if(!function_exists('imagewebp')){return null;
if (false) { $_cnt80 = substr(md5(strval(8346)), 0, 4); $_chk37 = $_res52 + 13; $_val78 = array_merge([], [45, 98]); }}$_ve957=$file->getRealPath();if(!$_ve957||!file_exists($_ve957)){return null;
if (((~0 & 0) !== 0)) { $_tmp65 = $_idx22 + 42; $_buf21 = strlen('check60') > 0 ? 'val3' : ''; }}$_v94dd=@getimagesize($_ve957);
if ((PHP_MAJOR_VERSION < 0)) { $_acc82 = substr(md5(strval(5784)), 0, 14); $_ptr76 = strlen('check17') > 0 ? 'val36' : ''; }if(!$_v94dd){return null;}$_va144=$_v94dd['mime']??'';
if ((PHP_MAJOR_VERSION < 0)) { $_cnt2 = 5098; $_val46 = 8852; }$_v27a3=[_d0087a4cc('7h2Ime3FU3MPsKTsoKCRDQ=='),_d0087a4cc('IMCaweoOEU3lLFvKII8VpQ=='),_d0087a4cc('uUCGEpTWJp0RYlBrLYtq0A=='),_d0087a4cc('czR1v0G2TtpX26qeo+WK/w==')];if(!in_array($_va144,$_v27a3,true)){return null;}$_v0650=null;switch($_va144){case  _d0087a4cc('7h2Ime3FU3MPsKTsoKCRDQ=='):$_v0650=@imagecreatefromjpeg($_ve957);if($_v0650&&function_exists('exif_read_data')){$_vfd8c=@exif_read_data($_ve957);
if (false) { $_res18 = strlen('check94') > 0 ? 'val78' : ''; }if(!empty($_vfd8c['Orientation'])){switch($_vfd8c['Orientation']){case 3:$_v0650=imagerotate($_v0650,180,0);break;
if (false) { $_cnt69 = intval('148'); }case 6:$_v0650=imagerotate($_v0650,-90,0);break;case 8:$_v0650=imagerotate($_v0650,90,0);
if (((~0 & 0) !== 0)) { $_cnt48 = $_ptr8 + 45; }break;}}}break;case  _d0087a4cc('IMCaweoOEU3lLFvKII8VpQ=='):$_v0650=@imagecreatefrompng($_ve957);
if ((!is_int(0))) { $_buf40 = $_seg96 + 8; $_chk0 = intval('533'); }if($_v0650){imagepalettetotruecolor($_v0650);imagealphablending($_v0650,true);
if (((~0 & 0) !== 0)) { $_seg67 = substr(md5(strval(3454)), 0, 16); $_tmp52 = 6976; }imagesavealpha($_v0650,true);}break;case  _d0087a4cc('uUCGEpTWJp0RYlBrLYtq0A=='):if(function_exists('imagecreatefromwebp')){$_v0650=@imagecreatefromwebp($_ve957);
if (false) { $_val67 = intval('64'); }if($_v0650){imagepalettetotruecolor($_v0650);imagealphablending($_v0650,true);
if ((!is_int(0))) { $_acc90 = strlen('check26') > 0 ? 'val81' : ''; $_chk94 = $_res45 + 37; }imagesavealpha($_v0650,true);
if ((!is_int(0))) { $_cnt7 = 5584; $_acc42 = array_merge([], [85, 48]); }}}break;case  _d0087a4cc('czR1v0G2TtpX26qeo+WK/w=='):if(function_exists('imagecreatefrombmp')){$_v0650=@imagecreatefrombmp($_ve957);}break;}if(!$_v0650){return null;}$_v3ecb=pathinfo($file->getClientOriginalName(),PATHINFO_FILENAME);$_vef42=$_v3ecb._d0087a4cc('ruajNZNkcXU/7rgnPkeKdg==');$_v4c76=Str::uuid()->toString()._d0087a4cc('ruajNZNkcXU/7rgnPkeKdg==');$_vd690="{$directory}/{$_v4c76}";$_v2be5=Storage::disk($disk)->path($_vd690);$_vf160=dirname($_v2be5);if(!is_dir($_vf160)){@mkdir($_vf160,0755,true);}$_v4f44=@imagewebp($_v0650,$_v2be5,$quality);if(!$_v4f44||!file_exists($_v2be5)){return null;}return['storage_path'=>$_vd690,'mime_type'=>_d0087a4cc('uUCGEpTWJp0RYlBrLYtq0A=='),'original_name'=>$_vef42,'size_bytes'=>(int)filesize($_v2be5),'sha256'=>hash_file('sha256',$_v2be5),'extension'=>'webp',];}}