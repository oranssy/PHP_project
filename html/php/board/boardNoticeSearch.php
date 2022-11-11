<?php
    include "../connect/connect.php";
    include "../connect/session.php";
?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>게시판 검색결과</title>
    <?php include "../include/link.php" ?>
</head>
<body>
    <div id="skip">
        <a href="#header">헤더 영역 바로가기</a>
        <a href="#main">컨텐츠 영역 바로가기</a>
        <a href="#footer">푸터 영역 바로가기</a>
    </div>
    <!-- //skip -->
    <?php include "../include/header.php" ?>
    <!-- //header -->
    <main id="main">
        <section id="banner">
            <div class="banner__wrap">
                <h2>커뮤니티</h2>
                <p>이곳은 소통하는 공간입니다. <br> 지구 ON은 당신이 서 있는 오늘과 걸어온 모든 하루를 응원합니다.</p>
                <img src="../assets/img/board_img01.png" alt="커뮤니티 이미지">
            </div>
        </section>
        <!-- //banner -->

        <section id="board" class="container">
            <h2>공지사항 검색결과</h2>
            <div class="board__inner">
                <div class="board__num">
<?php
    if(isset($_GET['page'])){
        $page = (int)$_GET['page'];
        } else {
            $page = 1;
        }

    function msg($alert){
        echo "<p>총 <em>".$alert."</em>건이 검색되었습니다.</p>";
    }

    $searchKeyword = $_GET['searchKeyword'];
    $searchOption = $_GET['searchOption'];

    $searchKeyword = $connect -> real_escape_string(trim($searchKeyword));
    $searchOption = $connect -> real_escape_string(trim($searchOption));

    $sql = "SELECT b.myNoticeBoardID, b.NoticeTitle, b.NoticeContents, m.youName, b.regTime, b.NoticeView FROM myNoticeBoard b JOIN myMember m ON(b.myAdminMemberID = m.myMemberID)";

    switch($searchOption){
        case "title":
            $sql .= "WHERE b.NoticeTitle LIKE '%{$searchKeyword}%' ORDER BY myNoticeBoardID DESC ";
            break;
        case "content":
            $sql .= "WHERE b.NoticeContents LIKE '%{$searchKeyword}%' ORDER BY myNoticeBoardID DESC ";
            break;
        case "name":
            $sql .= "WHERE m.youName LIKE '%{$searchKeyword}%' ORDER BY myNoticeBoardID DESC ";
            break;
        // 다 아닐 때 default 써줄 수 있는데 생략 가능
    }
    // 보내주기
    $result = $connect -> query($sql);

    // 전체 게시글 갯수
    $totalCount = $result -> num_rows;
    msg($totalCount);
?>
                </div>
                <div class="Notice__table">
                    <table>
                        <colgroup>
                            <col>
                            <col>
                            <col>
                        </colgroup>
                        <tbody>
<?php
    //viewNum  보여주는 갯수 //viewLimit 제한하는 것
    $viewNum = 10;
    $viewLimit = ($viewNum * $page) - $viewNum;

    $sql = $sql."LIMIT {$viewLimit}, {$viewNum}";
    $result = $connect -> query($sql);

    if($result){
        $count = $result -> num_rows;
        
        if($count > 0){
            for($i=1; $i <= $count; $i++){
                $info = $result -> fetch_array(MYSQLI_ASSOC);
                echo "<tr>";
                echo "<td>".date('d',$info['regTime'])."<p>".date('Y/m',$info['regTime'])."</p></td>";
                echo "<td><a href='boardNoticeView.php?myNoticeBoardID={$info['myNoticeBoardID']}'>".$info['NoticeTitle']."</a></td>";
                echo "<td><a href='boardNoticeView.php?myNoticeBoardID={$info['myNoticeBoardID']}'>+</a></td>";
                echo "</tr>";
            }
        }else {
            echo "<tr><td colspan='5';>게시글이 없습니다.</td></tr>";
        }
    }
?>
                        </tbody>
                    </table>
                </div>
                <div class="board__pages">
                    <ul>
<?php
    // echo $totalCount;
    // 총 페이지 갯수
    $NoticeCount = ceil($totalCount / $viewNum);
    // echo $NoticeCount;
    // 현재 페이지를 기준으로 보여주고 싶은 갯수
    $pageCurrent = 5;
    $startPage = $page - $pageCurrent;
    $endPage = $page + $pageCurrent;
    // 처음 페이지 초기화  (첫 페이지인 1을 기준으로 -4부터 나옴)
    if($startPage < 1) $startPage = 1;
    // 마지막 페이지 초기화
    if($endPage >= $NoticeCount) $endPage = $NoticeCount;
    // 이전 페이지, 처음 페이지로 이동
    if($page != 1){
        $prevPage = $page - 1;
        echo "<li><a href='boardNoticeSearch.php?page=1&searchKeyword={$searchKeyword}&searchOption={$searchOption}'>처음으로</a></li>";
        echo "<li><a href='boardNoticeSearch.php?page={$prevPage}&searchKeyword={$searchKeyword}&searchOption={$searchOption}'>이전</a></li>";
    }
    // 페이지 넘버 표시 (순서 중요! 가운데에 위치해야 함)
    for($i= $startPage; $i<=$endPage; $i++){
        $active = "";
        if($i == $page) $active = "active";
        echo "<li class='{$active}'><a href='boardNoticeSearch.php?page={$i}&searchKeyword={$searchKeyword}&searchOption={$searchOption}'>{$i}</a></li>";
    }
    // 다음 페이지, 마지막 페이지로 이동
    if($page != $endPage){
        $nextPage = $page + 1;
        echo "<li><a href='boardNoticeSearch.php?page={$nextPage}&searchKeyword={$searchKeyword}&searchOption={$searchOption}'>다음</a></li>";
        echo "<li><a href='boardNoticeSearch.php?page={$NoticeCount}&searchKeyword={$searchKeyword}&searchOption={$searchOption}'>마지막으로</a></li>";
    }
?>
                    </ul>
                </div>
            </div>
        </section>
    </main>
    <!-- //main -->
    <?php include "../include/footer.php" ?>
    <!-- //footer -->

    <?php include "../login/login.php" ?>
    <!-- //login -->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="../assets/js/header.js"></script>
    <script src="../assets/js/custom.js"></script>
</body>
</html>