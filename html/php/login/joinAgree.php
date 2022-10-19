<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP 사이트 만들기</title>

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

    <section id="joinAgree" class="container">
        <h2>회원가입</h2>
        <div class="agree__inner">
            <h3>약관동의</h3>
            <div>
                <form name="regiform" method="post" onsubmit="return check_form()">
                <div class="joinAgree_check1">
                    <input type="checkbox" name="agreeCheck1" id="agreeCheck1" onclick="selectAll(this)">
                    <label for="agreeCheck1"></label>
                    <div>회원가입 약관에 모두 동의합니다.</div>
                </div>
                <div class="joinAgree_check2">
                    <input type="checkbox" name="agreeCheck2" id="agreeCheck2" onclick="checkSelectAll()">
                    <label for="agreeCheck2"></label>
                    <div>이용약관 동의 <em>[필수]</em></div>
                </div>
                <div class="desc">
                    <ul>
                        <li>회원가입은 1인당 1개의 이메일 계정을 이용할 수 있습니다.</li>
                        <li>개인정보를 수집 및 이용하며, 회원의 개인정보를 안전하게 취급하고, 교육을 목적으로 사용됩니다.</li>
                        <li>회원가입은 1인당 1개의 이메일 계정을 이용할 수 있습니다.</li>
                        <li>개인정보를 수집 및 이용하며, 회원의 개인정보를 안전하게 취급하고, 교육을 목적으로 사용됩니다.</li>
                        <li>회원가입은 1인당 1개의 이메일 계정을 이용할 수 있습니다.</li>
                        <li>개인정보를 수집 및 이용하며, 회원의 개인정보를 안전하게 취급하고, 교육을 목적으로 사용됩니다.</li>
                        <li>회원가입은 1인당 1개의 이메일 계정을 이용할 수 있습니다.</li>
                        <li>개인정보를 수집 및 이용하며, 회원의 개인정보를 안전하게 취급하고, 교육을 목적으로 사용됩니다.</li>
                        <li>회원가입은 1인당 1개의 이메일 계정을 이용할 수 있습니다.</li>
                        <li>개인정보를 수집 및 이용하며, 회원의 개인정보를 안전하게 취급하고, 교육을 목적으로 사용됩니다.</li>
                    </ul>
                </div>
            </div>
            <div class="joinAgree_check3">
                <input type="checkbox" name="agreeCheck2" id="agreeCheck3" onclick="checkSelectAll()">
                <label for="agreeCheck3"></label>
                <div class="agree">개인정보 수집 및 이용 동의 <em>[필수]</em></div>
            </div>
            <div>
                <div class="desc">
                    <ul>
                        <li>목적 : 가입자 개인 식별, 가입 의사 확인, 가입자와의 원활한 의사소통, 가입자와의 교육 커뮤니테이션</li>
                        <li>항목 : 아이디(이메일주소), 비밀번호, 이름, 생년월일, 휴대폰번호</li>
                        <li>보유기간 : 회원 탈퇴 시까지 보유(탈퇴일로부터 즉시 파기합니다.)</li>
                        <li>개인정보 수집에 대한 동의를 거부할 권리가 있으며, 회원 가입시 개인정보 수집을 동의함으로 간주합니다.</li>
                        <li>목적 : 가입자 개인 식별, 가입 의사 확인, 가입자와의 원활한 의사소통, 가입자와의 교육 커뮤니테이션</li>
                        <li>항목 : 아이디(이메일주소), 비밀번호, 이름, 생년월일, 휴대폰번호</li>
                        <li>보유기간 : 회원 탈퇴 시까지 보유(탈퇴일로부터 즉시 파기합니다.)</li>
                        <li>개인정보 수집에 대한 동의를 거부할 권리가 있으며, 회원 가입시 개인정보 수집을 동의함으로 간주합니다.</li>
                    </ul>
                </div>
            </div>
            <div class="join__btn">
                <a href="#">홈으로 돌아가기</a>
                <a href="#" class="btn2" onclick="check_form()">다음 단계로</a>
            </div>
        </form>
        </div>
        <footer id="join__footer">지구 ON</footer>
    </section>
    <!-- //section -->

    <?php include "../login/login.php" ?>
    <!-- //login -->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="../assets/js/header.js"></script>  
    <script src="../assets/js/custom.js"></script>  
    <script>

        // 전체선택 후 하나만 해제했을 때, 전체선택도 해체 해주기
        function checkSelectAll()  {
            // 전체 체크박스
            const checkboxes = document.querySelectorAll('input[name="agreeCheck2"]');
            // 선택된 체크박스
            const checked = document.querySelectorAll('input[name="agreeCheck2"]:checked');
            // select all 체크박스
            const selectAll = document.querySelector('input[name="agreeCheck1"]');

            if(checkboxes.length === checked.length)  {
              selectAll.checked = true;
            }else {
              selectAll.checked = false;
            }     

        }       
        // 전체선택, 헤재
        function selectAll(selectAll)  {
            const checkboxes = document.getElementsByName('agreeCheck2');
            
            checkboxes.forEach((checkbox) => {
                checkbox.checked = selectAll.checked;
            })
        }

        //약관 동의 눌러야 페이지 넘어감
        function check_form(){
            if (document.regiform.agreeCheck1.checked)
                location.href="join.php"
            else
                window.alert("이용약관에 동의해주세요")
                document.getElementsByClassName("btn2").disabled = !document.getElementsByName('agreeCheck1').checked;
        }
    </script>
</body>
</html>