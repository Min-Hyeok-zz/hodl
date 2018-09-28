<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

if (G5_IS_MOBILE) {
    include_once(G5_THEME_MOBILE_PATH.'/head.php');
    return;
}

include_once(G5_THEME_PATH.'/head.sub.php');
include_once(G5_LIB_PATH.'/latest.lib.php');
include_once(G5_LIB_PATH.'/outlogin.lib.php');
include_once(G5_LIB_PATH.'/poll.lib.php');
include_once(G5_LIB_PATH.'/visit.lib.php');
include_once(G5_LIB_PATH.'/connect.lib.php');
include_once(G5_LIB_PATH.'/popular.lib.php');
if (isset($_SESSION['ss_mb_id'])) {
    $mypoint = sql_fetch("SELECT mb_point from g5_member where mb_id='{$_SESSION['ss_mb_id']}'")['mb_point'];
}
?>

<!-- 상단 시작 { -->

<!-- 헤더 -->
<div id="header">
    <nav id="gnb">
        <div class="logo"><a href="<?php echo G5_URL ?>" class="logo-text"><img src="<?php echo G5_IMG_URL ?>/logo.png" alt="logo" class="logo-img"> HODL.RIP</a></div>
        <ul>
            <li><a href="#!">Fixel</a></li>
            <li><a href="#!">CoinMarketCap</a></li>
        </ul>
    </nav>
    <div class="subMenu">
        <i class="fas fa-language"></i>
        <select name="lang" class="lang">
            <option value="korean" style="background: transparent;">KOREAN</option>
            <option value="english" style="background: transparent;">ENGLISH</option>
        </select>
        <?php if (isset($_SESSION['ss_mb_id'])): ?>
            <a href="<?php echo G5_BBS_URL ?>/logout.php" class="login-btn">LOGOUT</a>
        <?php else: ?>
            <a href="<?php echo G5_BBS_URL ?>/login.php" class="login-btn">LOGIN</a>
        <?php endif ?>
    </div>
</div>

<!-- 커뮤니티 리스트 -->

<div class="head-sub-box">
    <ul class="head-sub-list">
        <li><a href="<?php echo G5_URL ?>">홈</a></li>
        <li><a href="<?php echo G5_BBS_URL ?>/monitor.php">모니터링 프로</a></li>
        <li><a href="#!">코인일정</a></li>
        <li><a href="<?php echo G5_BBS_URL ?>/new.php">커뮤니티</a></li>
    </ul>
</div>

<!-- 비주얼 섹션 -->
<?php if (!strpos($_SERVER['PHP_SELF'], "bbs")): ?>
    <div class="visual-section">
        <div class="visual-content">
            <?php if (isset($_SESSION['ss_mb_id'])): ?>
            <p class="point color">나의 활동점수 <?php echo $mypoint; ?> 점</p>
            <?php endif ?>
            <p class="content-title">HODL.RIP</p>
            <p class="content-subtitle color">Cryptocurrencies By Market Capitalization</p>
            <form action="<?php echo G5_BBS_URL ?>/search.php?" method="get" class="index-search">
                <input type="hidden" name="srows" value="10">
                <input type="hidden" name="gr_id">
                <input type="hidden" name="sfl" value="wr_subject||wr_content">
                <input type="hidden" name="sop" value="and">
                <input type="text" name="stx" class="form-input" placeholder="게시물 검색..." required autofocus>
                <button type="submit" class="form-btn">.RIP</button>
            </form>
        </div>
    </div>
<?php else: ?>
    <div class="visual-sec">
        <div class="sec-info">
            <p class="sec-title"><span>HODL.RIP</span> Talk</p>
            <?php if (isset($mypoint)): ?>
            <p class="sec-mypoint">나의 활동점수: <?php echo $mypoint; ?>점</p>
            <?php endif ?>
        </div>
        <div class="sec-search">
            <form action="<?php echo G5_URL ?>/bbs/search.php?" method="get" class="index-search">
                <input type="hidden" name="srows" value="10">
                <input type="hidden" name="gr_id">
                <input type="hidden" name="sfl" value="wr_subject||wr_content">
                <input type="hidden" name="sop" value="and">
                <input type="text" name="stx" class="form-input" placeholder="게시물 검색..." required autofocus>
                <button type="submit" class="form-btn">.RIP</button>
            </form>
        </div>
    </div>
<?php endif ?>


<!-- } 상단 끝 -->


<!-- 콘텐츠 시작 { -->
<div id="wrapper">
        <?php
            $style = "";
            if (!strpos($_SERVER['PHP_SELF'], "bbs")) {
                $style = "margin: 0 auto;";
            }
        ?>
        
    <div id="container_wr" class="container_wr">
   
    <div class="container" style="<?php echo $style ?>">
        <?php if (!defined("_INDEX_")) { ?><?php } ?>

