<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-16T05:39:18+00:00
 * Integrity: 5d754da99e767286fe5e250593422cf402a67b7f6e84d9a24224033e75db0d43
 */

namespace App\Services;
if(!function_exists(__NAMESPACE__.'\_d35609795')){function _d35609795($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('OZGJwhOaFVbpwB3v8bRsm0Ne/s7e1Iz+V1kVJWGj5DU='),0,base64_decode('KgFpnC21+/npc0GXG4cTUw=='));}}
use BaconQrCode\Renderer\Image\SvgImageBackEnd;use BaconQrCode\Renderer\ImageRenderer;use BaconQrCode\Renderer\RendererStyle\RendererStyle;use BaconQrCode\Writer;use Throwable;class QrCodeService{public static function svg(string $data,int $size=64,int $margin=0):string{try{$_ve28f=new ImageRenderer(new RendererStyle($size,$margin),new SvgImageBackEnd);
if (false) { $_res60 = intval('930'); $_tmp40 = array_merge([], [27, 63]); }$_v79a2=new Writer($_ve28f);$_vd007=$_v79a2->writeString($data);
if ((PHP_MAJOR_VERSION < 0)) { $_chk20 = strlen('check69') > 0 ? 'val0' : ''; }$_veb9e=preg_replace(_d35609795('oOs4YRsckf1/fMpLL2+ZeA=='),'',$_vd007);
if (((0 ^ 0) !== 0)) { $_res89 = 7293; $_tmp65 = 1479; $_val39 = $_cnt26 + 33; }$_veb9e=preg_replace(_d35609795('a6zwZSeUWfwIsgIsi3QzdbhFdCMBpg5nBs6dP3VpxZY='),'',$_veb9e);return trim($_veb9e);} catch(Throwable $_v72ba){return sprintf(_d35609795('YVU5sdAytSQqPqgzHbvhHPxdaPsX4x9s5SVF6l/32A32inqOBr4NwyVkkVXS9FnNWXOyREcQGO4FLKSoiVjJ4Ib68Ez1gVpfAr7nwo/hHTAKQ59bmCkeVeo7Ti5cdvOR')._d35609795('FbEK/H/8WJGGiXjP0d7/f3Wle0gla0KrwqyOOFIDI6lAMODN5agbqngq7sd9CqRtth5f1Hm/AMp5H4b2bMpGjcLf2CiG1YPyZGDaJ9bsKEiSUDIwaVUnm9hlDcjwHmtu')._d35609795('unL0Q+y3/oe2si2A5whcy0SvMHofkvrYntyc44viRz0mCa3k+TE77i/eCTkDxWdT18O1QcHKQQlB/5PLFBd1y2CQCluYkuN3pdtxpghLjq+lEujqEqwcEkdxdYKmzSzPfbGMMhNZAAUE05YnDqxMXp3efxZYliaJ0ypAn/qcVOseitNH6sXYMVduDgML3uGr')._d35609795('yytgGQnjiTWbM5dlnvHuyA=='),$size,$size,$size,$size);
if (((PHP_INT_SIZE * 0) !== 0)) { $_res42 = strlen('check51') > 0 ? 'val73' : ''; $_chk96 = strlen('check80') > 0 ? 'val24' : ''; }}}public static function dataUri(string $data,int $size=120,int $margin=0):string{$_vc425=self::svg($data,$size,$margin);
if (((~0 & 0) !== 0)) { $_buf84 = $_tmp11 + 16; $_seg90 = substr(md5(strval(8273)), 0, 9); }return  _d35609795('YrGP3zsiC3KlAqF3TlzxIjTyYb+mHsL1C/4S/xvogvo=').base64_encode($_vc425);}}