<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-24T15:37:40+00:00
 * Integrity: 6cab5f32f79b494a98da1bcfce2bcdb278ce6ee5bc6f7ac0c8dc7ba17c6d7508
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_dfec2917e')){function _dfec2917e($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('DgrNjkD2m1fqMS/pwzJKMO+rxPoFbrut98j/8CYSQtk='),0,base64_decode('V3dUlhcp2evJa1tiwPMe4A=='));}}
use Closure;use Illuminate\Http\Request;use Symfony\Component\HttpFoundation\Response;class SecurityHeaders{public function handle(Request $request,Closure $next):Response{$_vd20a=$next($request);$_vd20a->headers->set(_dfec2917e('2pPBGTRszigLQkQNPpTiegxQO864H0VEgZIPNxgOChc='),'nosniff',false);$_vd20a->headers->set(_dfec2917e('cxTQCK5Qxwk/DBJKrIXiMg=='),'SAMEORIGIN',false);$_vd20a->headers->set(_dfec2917e('veeBkDY+LXUUxDK/K5Bf5g=='),'strict-origin-when-cross-origin',false);$_vd20a->headers->set(_dfec2917e('VecXF6xjIZ7PGnzppl2i+OnNb/qGvju3prGJbMgFqIM='),_dfec2917e('O75E683uwolxZqsJ2lK/QNEl3l/ymRsfkBSfNQqJMkRbFLN8wR0tzEaQScmgQMw2yBk+Pla6rzH+Jd2nsnYybw=='),false);return $_vd20a;}}