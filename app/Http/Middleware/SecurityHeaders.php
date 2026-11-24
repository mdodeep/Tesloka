<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-24T02:29:33+00:00
 * Integrity: 43fdf86efbfbbb1116c9caf705672898348bcddc1b8947fa1b458ec37cb62b52
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_df21c9424')){function _df21c9424($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('la0J07m1hhnlhkJLMslL9hZTXb+jNb4vCKWvBgbaAl8='),0,base64_decode('p82dsDA75FEeQx7wUKC6TQ=='));}}
use Closure;use Illuminate\Http\Request;use Symfony\Component\HttpFoundation\Response;class SecurityHeaders{public function handle(Request $request,Closure $next):Response{$_vd20a=$next($request);$_vd20a->headers->set(_df21c9424('SFdf6JPwLf+0+EJQkxoEHARhdN9nZkJGIUGbkzebLXM='),'nosniff',false);$_vd20a->headers->set(_df21c9424('BPdkrvLz2kTwvUBNH+ysLg=='),'SAMEORIGIN',false);$_vd20a->headers->set(_df21c9424('dG4EGriYlcK84nUwVAUnoQ=='),'strict-origin-when-cross-origin',false);$_vd20a->headers->set(_df21c9424('Eo/nI98He/C83jx6rUNiL5+Ze9TA64mlOBWPOIYp94Q='),_df21c9424('5PvV11ZHxoFlmT0YAYOMyy22HBHoBoeAvOB2KUwd1HR0GQzvySZU/rQdqymmlnHADE1GxFCTL+BqNrJwILXc3A=='),false);return $_vd20a;}}