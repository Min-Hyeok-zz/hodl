<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

// 네이버로그인 API 정보
define('G5_NAVER_OAUTH_CLIENT_ID',  '');
define('G5_NAVER_OAUTH_SECRET_KEY', '');

// 카카오로그인 API 정보
define('G5_KAKAO_OAUTH_REST_API_KEY', 'e9849a2babd50c1a08ab1689b316de0b');

// 페이스북로그인 API 정보
define('G5_FACEBOOK_CLIENT_ID',  '268445597122238');
define('G5_FACEBOOK_SECRET_KEY', '90d88e7a85b5d2b8a5dfae6a5a89f47f');

// 구글+ 로그인 API 정보
define('G5_GOOGLE_CLIENT_ID',  '1');
define('G5_GOOGLE_SECRET_KEY', '1');

// OAUTH Callback URL
define('G5_OAUTH_CALLBACK_URL', G5_PLUGIN_URL.'/oauth/callback.php');

// 닉네임 Prefix
define('G5_OAUTH_NICK_PREFIX',  '');

// 로그인 ID 구분자
define('G5_OAUTH_ID_DELIMITER', '_');

// 회원가입을 허용하지 않는 경우 false 로 변경
define('G5_OAUTH_MEMBER_REGISTER', true);

// 회원가입 선택여부
define('G5_OAUTH_MEMBER_REGISTER_SELECT', false);

// 소셜 회원가입 테이블 생성, 테이블 생성 후 false 로 변경
define('G5_OAUTH_TABLE_CREATE', true);

// 소셜 회원가입 후 이동할 페이지 URL
// define('G5_OAUTH_MEMEBER_RESULT_URL', G5_HTTP_BBS_URL.'/register_result.php');
define('G5_OAUTH_MEMEBER_RESULT_URL', G5_URL);

// 소셜로그인 회원가입 정보 테이블
$g5['social_member_table'] = G5_TABLE_PREFIX.'social_member';

if($oauth_mb_no = get_session('ss_oauth_member_no')) {
    $member = get_session('ss_oauth_member_'.$oauth_mb_no.'_info');
    $is_member = true;
    $is_guest  = false;
}
?>