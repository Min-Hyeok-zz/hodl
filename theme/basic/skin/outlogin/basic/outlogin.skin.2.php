<?php
if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가

// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="'.$outlogin_skin_url.'/style.css">', 0);
$community = sql_query("SELECT bo_table,bo_subject FROM g5_board where gr_id='community' order by bo_subject desc");
//정보 그룹 리스트
$info = sql_query("SELECT bo_table,bo_subject FROM g5_board where gr_id='info' order by bo_subject desc");
?>


<!-- 로그인 후 아웃로그인 시작 { -->
<?php if (isset($_GET['bo_table']) || strpos($_SERVER['PHP_SELF'], "new") || strpos($_SERVER['PHP_SELF'], "search")): ?>
<div class="aside-wrap">
    <section class="aside-box">
        <a href="<?php echo G5_BBS_URL ?>/logout.php" class="aside-login">로그아웃</a>
        <div class="aside-menu aside-home">
            <p class="aside-subtitle">홈</p>
            <ul class="aside-list">
                <li><a href="<?php echo G5_BBS_URL ?>/new.php" class="new">전체</a></li>
            </ul>
        </div>
        <div class="aside-menu aside-info">
            <p class="aside-subtitle">정보</p>
            <ul class="aside-list">
                <?php
                    while ($row = sql_fetch_array($info)) { ?>
                    <li class="<?php echo $row['bo_table'] ?>"><a href="<?php echo G5_BBS_URL."/board.php?bo_table={$row['bo_table']}" ?>"><?php echo $row['bo_subject'] ?></a></li>
                <?php } ?>
            </ul>
        </div>
        <div class="aside-menu aside-community">
            <p class="aside-subtitle">커뮤니티</p>
            <ul class="aside-list">
                <?php
                    while ($row = sql_fetch_array($community)) { ?>
                    <li class="<?php echo $row['bo_table'] ?>"><a href="<?php echo G5_BBS_URL."/board.php?bo_table={$row['bo_table']}" ?>"><?php echo $row['bo_subject'] ?></a></li>
                <?php } ?>
            </ul>
        </div>
    </section>
</div>
<!-- <section id="ol_after" class="ol">
    <header id="ol_after_hd">
        <h2>나의 회원정보</h2>
        <span class="profile_img">
            <?php echo get_member_profile_img($member['mb_id']); ?>
            <a href="<?php echo G5_BBS_URL ?>/member_confirm.php?url=register_form.php" id="ol_after_info" title="정보수정"><i class="fa fa-cog" aria-hidden="true"></i><span class="sound_only">정보수정</span></a>
        </span>
        <strong><?php echo $nick ?>님</strong>
        <a href="<?php echo G5_BBS_URL ?>/logout.php" id="ol_after_logout" class="btn_b04">로그아웃</a>
        <?php if ($is_admin == 'super' || $is_auth) {  ?><a href="<?php echo G5_ADMIN_URL ?>" class="btn_admin btn_04">관리자</a><?php }  ?>
    </header>
    <ul id="ol_after_private">
        <li>
            <a href="<?php echo G5_BBS_URL ?>/memo.php" target="_blank" id="ol_after_memo" class="win_memo">
                 <span class="sound_only">안 읽은 </span>쪽지<br>
                <strong><i class="fa fa-envelope-o" aria-hidden="true"></i> <?php echo $memo_not_read ?></strong>
            </a>
        </li>
        <li>
            <a href="<?php echo G5_BBS_URL ?>/point.php" target="_blank" id="ol_after_pt" class="win_point">
                 포인트<br>
                <strong><i class="fa fa-database" aria-hidden="true"></i> <?php echo $point ?></strong>
            </a>
        </li>
        <li>
            <a href="<?php echo G5_BBS_URL ?>/scrap.php" target="_blank" id="ol_after_scrap" class="win_scrap">스크랩<br>
            <strong class="scrap"><i class="fa fa-thumb-tack" aria-hidden="true"></i></strong>
            </a>
            
        </li>
    </ul>
</section> -->

<?php endif ?>
<script>
$(function(){
    const asideName = `.<?php echo $_GET['bo_table'] ? $_GET['bo_table'] : 'new' ?>`
    $(asideName).addClass('color')
})
// 탈퇴의 경우 아래 코드를 연동하시면 됩니다.
function member_leave()
{
    if (confirm("정말 회원에서 탈퇴 하시겠습니까?"))
        location.href = "<?php echo G5_BBS_URL ?>/member_confirm.php?url=member_leave.php";
}
</script>
<!-- } 로그인 후 아웃로그인 끝 -->
