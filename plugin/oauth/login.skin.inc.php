<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

if((defined('G5_NAVER_OAUTH_CLIENT_ID') && G5_NAVER_OAUTH_CLIENT_ID) || (defined('G5_KAKAO_OAUTH_REST_API_KEY') && G5_KAKAO_OAUTH_REST_API_KEY) || (defined('G5_FACEBOOK_CLIENT_ID') && G5_FACEBOOK_CLIENT_ID) || (defined('G5_GOOGLE_CLIENT_ID') && G5_GOOGLE_CLIENT_ID)) {

add_stylesheet('<link rel="stylesheet" href="'.G5_PLUGIN_URL.'/oauth/style.css">', 10);
add_javascript('<script src="'.G5_PLUGIN_URL.'/oauth/jquery.oauth.login.js"></script>', 10);

$social_oauth_url = G5_PLUGIN_URL.'/oauth/login.php?service=';
    // login-sns sns-wrap-32 sns-wrap-over
// <?php echo (G5_IS_MOBILE ? 'm-' : '');
?>
    <div class="sns-box">
        <?php if(defined('G5_NAVER_OAUTH_CLIENT_ID') && G5_NAVER_OAUTH_CLIENT_ID) { ?>
        <a href="<?php echo $social_oauth_url.'naver'; ?>" target="_blank" class="sns-icon social_oauth sns-naver"><span class="ico"></span><span class="txt">네이버 로그인</span></a>
        <?php } ?>
        <?php if(defined('G5_KAKAO_OAUTH_REST_API_KEY') && G5_KAKAO_OAUTH_REST_API_KEY) { ?>
        <a href="<?php echo $social_oauth_url.'kakao'; ?>" target="_blank" class="sns-login-btn kakao-login"><i class="kakao-logo"></i>&nbsp;kakaotalk login</a>
        <?php } ?>
        <?php if(defined('G5_FACEBOOK_CLIENT_ID') && G5_FACEBOOK_CLIENT_ID) { ?>
        <a href="<?php echo $social_oauth_url.'facebook'; ?>" target="_blank" class="sns-login-btn facebook-login"><i class="fab fa-facebook-square"> </i> &nbsp; facebook login</a>
        <?php } ?>
        <?php if(defined('G5_GOOGLE_CLIENT_ID') && G5_GOOGLE_CLIENT_ID) { ?>
        <a href="<?php echo $social_oauth_url.'google'; ?>" target="_blank" class="sns-login-btn google-login"><i class="fab fa-google"></i>&nbsp; google login</a>
        <?php } ?>
    </div>
<?php
}
?>