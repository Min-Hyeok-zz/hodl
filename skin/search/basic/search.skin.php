<?php
if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가

// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="'.$search_skin_url.'/style.css">', 0);
?>

<!-- 전체검색 시작 { -->
<div class="board-serach-frm" style="position: relative;margin-top: 0;">

   <div class="search-top-wrap aside-top-pos">
       <div class="board-title"><?php echo $g5['title']; ?></div>
        <fieldset id="bo_sch">
            <legend>게시물 검색</legend>

            <form name="fsearch" method="get" action="<?php echo G5_BBS_URL ?>/search.php?">
            <input type="hidden" name="bo_table" value="<?php echo $bo_table ?>">
            <input type="hidden" name="sca" value="<?php echo $sca ?>">
            <input type="hidden" name="sop" value="and">
            <label for="sfl" class="sound_only">검색대상</label>
            <select name="sfl" id="sfl">
                <option value="wr_subject||wr_content"<?php echo get_selected($_GET['sfl'], "wr_subject||wr_content") ?>>제목+내용</option>
                <option value="wr_subject"<?php echo get_selected($_GET['sfl'], "wr_subject") ?>>제목</option>
                <option value="wr_content"<?php echo get_selected($_GET['sfl'], "wr_content") ?>>내용</option>
                <option value="mb_id"<?php echo get_selected($_GET['sfl'], "mb_id") ?>>회원아이디</option>
                <option value="wr_name"<?php echo get_selected($_GET['sfl'], "wr_name") ?>>이름</option>
            </select>
            <label for="stx" class="sound_only">검색어<strong class="sound_only"> 필수</strong></label>
            <input type="text" name="stx" value="<?php echo stripslashes($stx) ?>" required id="stx" class="sch_input" size="25" maxlength="20" placeholder="검색어를 입력해주세요">
            <button type="submit" value="검색" class="sch_btn"><i class="fa fa-search" aria-hidden="true"></i><span class="sound_only">검색</span></button>
            </form>
        </fieldset>
   </div>
    
    <div class="search-bottom-wrap">
        
    <?php
    if ($stx) {
        if ($board_count) {
    ?>

    <section id="sch_res_ov">
        <dl>
            <dd>페이지: <strong class="sch_word"><?php echo number_format($page) ?>/<?php echo number_format($total_page) ?> </strong></dd>
            <dt>게시물</dt>
            <dd><strong class="sch_word"><?php echo number_format($total_count) ?>개</strong></dd>
        </dl>
        <p></p>
    </section>
    <?php
        }
    }
    ?>

    </div>

</div>

<!-- 전체 검색 끝 -->

<div id="sch_result">


    <?php if ($stx && $board_count) { ?>
        <div class="board-list-wrap">
    <?php }  ?>
    <?php
    $k=0;
    for ($idx=$table_index, $k=0; $idx<count($search_table) && $k<$rows; $idx++) {
     ?>
        <!-- <h2><a href="./board.php?bo_table=<?php echo $search_table[$idx] ?>&amp;<?php echo $search_query ?>"><?php echo $bo_subject[$idx] ?> 게시판 내 결과</a></h2> -->
        <?php
        for ($i=0; $i<count($list[$idx]) && $k<$rows; $i++, $k++) {
            if ($list[$idx][$i]['wr_is_comment'])
            {
                $comment_def = '<span class="cmt_def"><i class="fa fa-commenting-o" aria-hidden="true"></i><span class="sound_only">댓글</span></span> ';
                $comment_href = '#c_'.$list[$idx][$i]['wr_id'];
            }
            else
            {
                $comment_def = '';
                $comment_href = '';
            }
         ?>
        <div class="list-wrap">
            <div class="list-info">
                <div class="list-idx">
                    <?php if (!$list[$idx][$i]['is_notice']): ?>
                    <img src="<?php echo G5_IMG_URL ?>/icon-vote-up.png" alt="icon-vote-up">
                    <?php echo $list[$idx][$i]['wr_good']; ?>
                        
                    <?php endif ?>
                </div>
                <div class="list-subinfo">
                    <a class="list-title" href="<?php echo $list[$idx][$i]['href'] ?>">
                        <?php if ($list[$idx][$i]['is_notice']): ?>
                            <i class="fa fa-bullhorn" aria-hidden="true"></i>
                        <?php endif ?>
                        <?php echo $list[$idx][$i]['wr_subject']; ?>
                        <?php if (isset($list[$idx][$i]['icon_new'])) echo rtrim($list[$idx][$i]['icon_new']); ?>
                        <?php if ($list[$idx][$i]['wr_comment'] > 0): ?>
                            <span class="cnt_comment">[<?php echo $list[$idx][$i]['wr_comment']; ?>]</span>    
                        <?php endif ?>
                        
                    </a>
                    <p class="list-sub">
                        <?php
                            echo passingTime($list[$idx][$i]['wr_datetime'])." | ";
                            echo $list[$idx][$i]['wr_name'];
                        ?></p>
                </div>
            </div>
            <div class="list-img-warp">
                <?php if ($img_src != ""): ?>
                    
                    <a href="<?php echo $list[$idx][$i]['href'] ?>">
                    <img src="<?php echo G5_URL ?>/data/file/<?php echo $list[$idx][$i]['bo_table'] ?>/<?php echo $img_src ?>" alt="<?php echo $img_src ?>" class="list-img">
                    </a>
                <?php endif ?>
            </div>
        </div>
        <?php }  ?>
<!--         <div class="sch_more"><a href="./board.php?bo_table=<?php echo $search_table[$idx] ?>&amp;<?php echo $search_query ?>"><strong><i class="fa fa-plus-circle" aria-hidden="true"></i> <?php echo $bo_subject[$idx] ?></strong> 결과 더보기</a></div> -->
    <?php }  ?>
    <?php if ($stx && $board_count) {  ?></div><?php }  ?>

    <?php echo $write_pages ?>

</div>
<!-- } 전체검색 끝 -->

<script>
    function fsearch_submit(f)
    {
        if (f.stx.value.length < 2) {
            alert("검색어는 두글자 이상 입력하십시오.");
            f.stx.select();
            f.stx.focus();
            return false;
        }

        // 검색에 많은 부하가 걸리는 경우 이 주석을 제거하세요.
        var cnt = 0;
        for (var i=0; i<f.stx.value.length; i++) {
            if (f.stx.value.charAt(i) == ' ')
                cnt++;
        }

        if (cnt > 1) {
            alert("빠른 검색을 위하여 검색어에 공백은 한개만 입력할 수 있습니다.");
            f.stx.select();
            f.stx.focus();
            return false;
        }

        f.action = "";
        return true;
    }
</script>