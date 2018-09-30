<?php
if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가

// 선택삭제으로 인해 셀합치기가 가변적으로 변함
$colspan = 5;

if ($is_admin) $colspan++;

// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="'.$new_skin_url.'/style.css">', 0);
// echo get_text($g5['title']); 게시판 제목 출력
?>
<!-- 전체게시물 검색 시작 { -->

<!-- 게시판 목록 시작 { -->
<div id="bo_list" style="width:<?php echo $width; ?>">

    <!-- 게시판 카테고리 시작 { -->
    <?php if ($is_category) { ?>
    <nav id="bo_cate">
        <h2><?php echo $board['bo_subject'] ?> 카테고리</h2>
        <ul id="bo_cate_ul">
            <?php echo $category_option ?>
        </ul>
    </nav>
    <?php } ?>
    <!-- } 게시판 카테고리 끝 -->

       <!-- 게시판 검색 시작 { -->
   <div class="board-serach-frm">

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
                    <option value="wr_subject"<?php echo get_selected($sfl, 'wr_subject', true); ?>>제목</option>
                    <option value="wr_content"<?php echo get_selected($sfl, 'wr_content'); ?>>내용</option>
                    <option value="wr_subject||wr_content"<?php echo get_selected($sfl, 'wr_subject||wr_content'); ?>>제목+내용</option>
                    <option value="mb_id,1"<?php echo get_selected($sfl, 'mb_id,1'); ?>>회원아이디</option>
                    <option value="wr_name,1"<?php echo get_selected($sfl, 'wr_name,1'); ?>>글쓴이</option>
                </select>
                <label for="stx" class="sound_only">검색어<strong class="sound_only"> 필수</strong></label>
                <input type="text" name="stx" value="<?php echo stripslashes($stx) ?>" required id="stx" class="sch_input" size="25" maxlength="20" placeholder="검색어를 입력해주세요">
                <button type="submit" value="검색" class="sch_btn"><i class="fa fa-search" aria-hidden="true"></i><span class="sound_only">검색</span></button>
                </form>
            </fieldset>
       </div>


   </div>
    <!-- } 게시판 검색 끝 -->

    <form name="fboardlist" id="fboardlist" action="./board_list_update.php" onsubmit="return fboardlist_submit(this);" method="post">
    <input type="hidden" name="bo_table" value="<?php echo $bo_table ?>">
    <input type="hidden" name="sfl" value="<?php echo $sfl ?>">
    <input type="hidden" name="stx" value="<?php echo $stx ?>">
    <input type="hidden" name="spt" value="<?php echo $spt ?>">
    <input type="hidden" name="sca" value="<?php echo $sca ?>">
    <input type="hidden" name="sst" value="<?php echo $sst ?>">
    <input type="hidden" name="sod" value="<?php echo $sod ?>">
    <input type="hidden" name="page" value="<?php echo $page ?>">
    <input type="hidden" name="sw" value="">
    <div class="board-list-wrap">
        <?php
        for ($i=0; $i<count($list); $i++) {
            $notice = "";
            $img_src = "";
            if ($list[$i]['is_notice']) {
                $notice = "notice";
            }
            if ($list[$i]['wr_file'] > 0) {
                $type = explode('.',sql_fetch("SELECT bf_file from g5_board_file where wr_id='{$list[$i]['wr_id']}'")['bf_file']);
                $arr = ['jpg','jpeg','gif','png','bmp'];
                if (in_array($type[1], $arr)) {
                    $img_src = "{$type[0]}.{$type[1]}";
                }
            }
         ?>
            <div class="list-wrap <?php echo $notice ?>">
                
                <div class="list-info">
                        <?php if ($is_checkbox) { ?>
                            <input type="checkbox" name="chk_wr_id[]" value="<?php echo $list[$i]['wr_id'] ?>" id="chk_wr_id_<?php echo $i ?>">
                        <?php } ?>
                    <div class="list-idx">
                        <?php if (!$list[$i]['is_notice']): ?>
                        <img src="<?php echo G5_IMG_URL ?>/icon-vote-up.png" alt="icon-vote-up">
                        <?php echo $list[$i]['wr_good']; ?>
                            
                        <?php endif ?>
                    </div>
                    <div class="list-subinfo">
                        <a class="list-title" href="<?php echo $list[$i]['href'] ?>">
                            <?php if ($list[$i]['is_notice']): ?>
                                <i class="fa fa-bullhorn" aria-hidden="true"></i>
                            <?php endif ?>
                            <?php echo $list[$i]['wr_subject']; ?>
                            <?php if (isset($list[$i]['icon_new'])) echo rtrim($list[$i]['icon_new']); ?>
                            <?php if ($list[$i]['wr_comment'] > 0): ?>
                                <span class="cnt_comment">[<?php echo $list[$i]['wr_comment']; ?>]</span>    
                            <?php endif ?>
                            
                        </a>
                        <p class="list-sub">
                            <?php
                                echo passingTime($list[$i]['wr_datetime'])." | ";
                                echo $list[$i]['wr_name'];
                            ?></p>
                    </div>
                </div>
                <div class="list-img-warp">
                    <?php if ($img_src != ""): ?>
                        
                        <a href="<?php echo $list[$i]['href'] ?>">
                        <img src="<?php echo G5_URL ?>/data/file/<?php echo $list[$i]['bo_table'] ?>/<?php echo $img_src ?>" alt="<?php echo $img_src ?>" class="list-img">
                        </a>
                    <?php endif ?>
                </div>

            </div>
         <?php
            }
         ?>

    </div>
    <!-- } 게시판 페이지 정보 및 버튼 끝 -->

    <?php if (count($list) == 0): ?>
        <div class="no-content">
            <div>
                현재 게시물이 없습니다.
            </div>
        </div>
    <?php endif ?>

    <?php if ($list_href || $is_checkbox || $write_href) { ?>
    <div class="bo_fx">
        <?php if ($list_href || $write_href) { ?>
        <ul class="btn_bo_user">
            <?php if ($is_checkbox) { ?>
            <li><button type="submit" name="btn_submit" value="선택삭제" onclick="document.pressed=this.value" class="btn btn_admin"><i class="fa fa-trash-o" aria-hidden="true"></i> 선택삭제</button></li>
            <?php } ?>
            <?php if ($admin_href) { ?><li><a href="<?php echo $admin_href ?>" class="btn_admin btn"><i class="fa fa-user-circle" aria-hidden="true"></i> 관리자</a></li><?php } ?>
            <?php if ($list_href) { ?><li><a href="<?php echo $list_href ?>" class="btn_b01 btn"><i class="fa fa-list" aria-hidden="true"></i> 목록</a></li><?php } ?>
        </ul>
        <?php } ?>
    </div>
    <?php } ?>
    

    </form>
     
   
</div>

<?php if ($is_admin) { ?>
<script>
$(function(){
    $('#all_chk').click(function(){
        $('[name="chk_bn_id[]"]').attr('checked', this.checked);
    });
});

function fnew_submit(f)
{
    f.pressed.value = document.pressed;

    var cnt = 0;
    for (var i=0; i<f.length; i++) {
        if (f.elements[i].name == "chk_bn_id[]" && f.elements[i].checked)
            cnt++;
    }

    if (!cnt) {
        alert(document.pressed+"할 게시물을 하나 이상 선택하세요.");
        return false;
    }

    if (!confirm("선택한 게시물을 정말 "+document.pressed+" 하시겠습니까?\n\n한번 삭제한 자료는 복구할 수 없습니다")) {
        return false;
    }

    f.action = "./new_delete.php";

    return true;
}
</script>
<?php } ?>

<?php echo $write_pages ?>
<!-- } 전체게시물 목록 끝 -->