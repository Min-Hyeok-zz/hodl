<?php
define('_INDEX_', true);
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

if (G5_IS_MOBILE) {
    include_once(G5_THEME_MOBILE_PATH.'/index.php');
    return;
}

include_once(G5_THEME_PATH.'/head.php');
$banner = "";
if ($config['cf_1'] != "" && file_exists(G5_BANNER_FILE."/{$config['cf_1']}")) {
    $banner = "background: url(".G5_BANNER_URL."/{$config['cf_1']}) center / cover;";
}
?>

    <!-- 메인 페이지 컨텐츠 -->

    <div class="main-content">
    
        <div class="banner" style="<?php echo $banner ?>">
            
        </div>

        <div class="content-box">
            
            <div class="graph">
                <div class="main-content-title">암호화폐 시총 점유율</div>
            </div>

            <div class="coin-calander">
                <div class="main-content-title">오늘의 코인 일정 2018.09.10</div>
            </div>

        </div> 
    
    </div>

</div>

<?php
include_once(G5_THEME_PATH.'/tail.php');
?>