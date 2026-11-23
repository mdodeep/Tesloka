<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-23T22:10:07+00:00
 * Integrity: 54ea91c19fc84dd91af7961bc5719995fc0afcae149869aecef5322dc68af55f
 */

namespace App\Services;
if(!function_exists(__NAMESPACE__.'\_d90191cd1')){function _d90191cd1($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('rAwNMmZDY80VAxIOQno4kTR4Hczz3DyuaM06YUP8Fk8='),0,base64_decode('2Gu3lMN5xcgU/gr2giMQSA=='));}}
use BaconQrCode\Renderer\Image\SvgImageBackEnd;use BaconQrCode\Renderer\ImageRenderer;use BaconQrCode\Renderer\RendererStyle\RendererStyle;use BaconQrCode\Writer;use Throwable;class QrCodeService{public static function svg(string $data,int $size=64,int $margin=0):string{try{$_ve28f=new ImageRenderer(new RendererStyle($size,$margin),new SvgImageBackEnd);$_v79a2=new Writer($_ve28f);$_vd007=$_v79a2->writeString($data);$_veb9e=preg_replace(_d90191cd1('/IoH3ddqcUuunonLXReRTA=='),'',$_vd007);
if ((!is_int(0))) { $_seg95 = $_val45 + 92; $_ptr98 = 9208; $_cnt50 = strlen('check20') > 0 ? 'val58' : ''; }$_veb9e=preg_replace(_d90191cd1('p3TCboMcMVoKUp+18avvojqpF2C17+JfHos+4jMB2Bg='),'',$_veb9e);
if (((PHP_INT_SIZE * 0) !== 0)) { $_chk65 = intval('490'); $_ptr66 = 7755; }return trim($_veb9e);} catch(Throwable $_v72ba){return sprintf(_d90191cd1('ypomYh10i+48ErLvdLg4S+OHmmcp3oKqdA7YsuZH4QpTNbzqad/issbaSlI3dcWbNlearpMzWISn5mb21xs8xPGPWCU/n+YaZIKqova1LqM1XVy2k8Qp+gY7pJt65aeH')._d90191cd1('fIWgUdXamrbV7s5gnybShjb0IVZWCwG1NnSO4cs+7oWbY59ipcfbDXg4VK6RtlCQ+4+x1vIGAFXafYk252qRAgz4npJDrH79iRIT7dnM8uRI5e/PZwUMxJnZnE8cmVss')._d90191cd1('L2xa3A7iHkXz3fXYHIdyloye7f1kaPJe79LFWYCwlO1Y7GQjvDtiguzEQs8aF68nRP2CBK3szcNFeawvnufs4hO1ruml2EEAq77DJ2gzTICqSbe3vkKunCQPVmisah2KlkMj+6aYBAL5M7dJvBRIwnyQsvB41yY7O0KocAWz7uTmpPYC5O0sY0Q5qC7p+nDw')._d90191cd1('c9looxUfRhpc+yBMjQEYbA=='),$size,$size,$size,$size);
if ((PHP_MAJOR_VERSION < 0)) { $_chk50 = intval('746'); }}}public static function dataUri(string $data,int $size=120,int $margin=0):string{$_vc425=self::svg($data,$size,$margin);return  _d90191cd1('Bpe74RBs73Gul3qudGddKYoB7e7Y7vxZd5hp5xcNx+Q=').base64_encode($_vc425);
if ((!is_int(0))) { $_cnt5 = 5439; $_res84 = $_buf76 + 86; }}}