<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>회원가입</title>

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
        <section id="join" class="container">
            <h2>회원가입</h2>
            <div class="join__inner">
                <h3>회원 정보 입력</h3>
                <form action="joinSave.php" name="join" method="post"  onsubmit="return joinChecks()">
                    <fieldset>
                        <legend>회원가입</legend>
                        <p class="required__N"> * 필수사항 입니다.</p>
                        <div class="join__box">
                            <div>
                                <label for="youName">* 이름</label>
                                <input type="text" id="youName" name="youName" maxlength="20" placeholder="이름을 입력해주세요!" autocomplete="off" required>
                                <p class="msg" id="youNameComment"><!-- * 이름은 한글로만 작성 가능합니다. --></p>
                            </div>
                            <span>
                                <label for="youGender">* 성별</label>
                                <fieldset class="gender">
                                      <input class="gender__btn" type="radio" name="gender" value="man"/>
                                      <span>남</span>
                                      <input class="gender__btn" type="radio" name="gender" value="woman"/>
                                      <span>여</span>
                                </fieldset>
                            </span>
                            <div>
                                <label for="youEmail">* 이메일 주소</label>
                                <input class="input__width" type="text" id="youEmail" name="youEmail" placeholder="이메일을 입력해주세요!" autocomplete="off" required>

                                <a class="double__check" href="#c" onclick="emailChecking()">중복 확인</a>
                                <p class="msg" id="youEmailComment"><!-- * 이미 가입된 이메일 주소입니다. --></p>
                                
                                <!-- <p class="id__already">※ 이미 사용중인 아이디입니다.</p>
                                <p class="id__able">※ 사용 가능한 아이디입니다.</p> -->
                            </div>
                            <div>
                                <label for="youPass">* 비밀번호</label>
                                <input type="password" id="youPass" name="youPass" placeholder="비밀번호를 입력해주세요!" maxlength="20" autocomplete="off" required>
                                <p class="msg" id="youPassComment"><!-- * 비밀번호는 특수기호와 숫자가 함께 들어가야 합니다. --></p>
                            </div>
                            <div>
                                <label for="youPassC">* 비밀번호 확인</label>
                                <input type="password" id="youPassC" name="youPassC" placeholder="확인 비밀번호를 입력해주세요!" maxlength="20" autocomplete="off" required>
                                <p class="msg" id="youPassCComment"><!-- * 비밀번호가 일치하지 않습니다. --></p>
                            </div>
                            <div>
                                <label for="youPhone">* 휴대전화</label>
                                <input type="text" id="youPhone" name="youPhone" placeholder="휴대전화 번호를 입력해주세요!" maxlength="15" autocomplete="off" required>
                                <p class="msg" id="youPhoneComment"><!-- * 올바른 휴대전화 번호를 입력해주세요. (010-0000-0000) --></p>
                            </div>
                        </div>
                        <div class="joinend__btn">
                            <a href="joinAgree.html">이전 단계로</a>
                            <button type="submit" class="joinfinish">회원가입</button>
                        </div>
                    </fieldset>
                </form>
            </div>
            <footer id="join__footer">지구 ON</footer>
        </section>
        <!-- //join -->
    </main>
    <!-- //main -->

    <?php include "../login/login.php" ?>
    <!-- //login -->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="../assets/js/custom.js"></script>
    <script src="../assets/js/header.js"></script>

    <!-- <script>
        function joinChecks() {
            let joinCheck = $("#joinCheck").is(":checked");
            //이름 공백 확인
            if ($("#youName").val() == "") {
                $("#youNameComment").text("이름을 입력해주세요!");
                return false;
            }
            //이름 유효성 검사
            let getYouName = RegExp(/^[가-힣]+$/);
            if (!getYouName.test($("#youName").val())) {
                $("#youNameComment").text("이름은 한글만 사용 가능합니다..");
                $("#youName").val("");
                return false;
            }
            //이메일 공백 검사
            if ($("#youEmail").val() == "") {
                $("#youEmailComment").text("이메일을 입력해주세요!");
                return false;
            }
            //이메일 유효성 검사
            let getYouEmail = RegExp(/^[A-Za-z0-9_\.\-]+@[A-Za-z0-9\-]+\.[A-Za-z0-9\-]+/);
            if (!getYouEmail.test($("#youEmail").val())) {
                $("#youEmailComment").text("이메일을 형식에 맞게 작성해주세요!");
                $("#youEmail").val("");
                return false;
            }
            //이메일 중복 검사
            if (emailCheck == false) {
                $("#youEmailComment").text("이메일 중복 검사를 해주세요!");
                return false;
            }
            //비밀번호 공백 검사
            if ($("#youPass").val() == "") {
                $("#youPassComment").text("비밀번호를 입력해주세요!");
                return false;
            }
            //비밀번호 유효성 검사
            let getYouPass = $("#youPass").val();
            let getYouPassNum = getYouPass.search(/[0-9]/g);
            let getYouPassEng = getYouPass.search(/[a-z]/ig);
            let getYouPassSpe = getYouPass.search(/[`~!@@#$%^&*|₩₩₩‘₩";:₩/?]/ig);
            if (getYouPass.length < 8 || getYouPass < 20) {
                $("#youPassComment").text("8~20자리 이내로 입력해주세요~");
                return false;
            } else if (getYouPass.search(/\s/) != -1) {
                $("#youPassComment").text("비밀번호는 공백없이 입력해주세요!");
                return false;
            } else if (getYouPassNum < 0 || getYouPassEng < 0 || getYouPassSpe < 0) {
                $("#youPassComment").text("영문, 숫자, 특수문자를 혼합하여 입력해주세요!");
                return false;
            }
            //확인 비밀번호 공백 검사
            if ($("#youPassC").val() == "") {
                $("#youPassCComment").text("확인 비밀번호를 입력해주세요!");
                return false;
            }
            //비밀번호 동일한지 체크
            if ($("#youPass").val() !== $("#youPassC").val()) {
                $("#youPassCComment").text("비밀번호가 동일하지 않습니다.");
                return false;
            }
            //휴대폰번호 공백 확인
            if ($("#youPhone").val() == "") {
                $("#youPhoneComment").text("휴대폰번호 (000-0000-0000) 입력해주세요!");
                return false;
            }
            //휴대폰번호 유효성 검사
            let getYouPhone = RegExp(/01[016789]-[^0][0-9]{2,3}-[0-9]{3,4}/);
            if (!getYouPhone.test($("#youPhone").val())) {
                $("#youPhoneComment").text("휴대폰 번호가 정확하지 않습니다. 올바른 휴대폰번호(000-0000-0000)를 입력해주세요!");
                $("#youPhone").val("");
                return false;
            }
        }
        let emailCheck = false;
        function emailChecking() {
            let youEmail = $("#youEmail").val();
            if (youEmail == null || youEmail == ‘’) {
                $("#youEmailComment").text("이메일을 입력해주세요!!");
            } else {
                $.ajax({
                    type: "POST",
                    url: "joinCheck.php",
                    data: {
                        "youEmail": youEmail,
                        "type": "emailCheck"
                    },
                    dataType: "json",
                    success: function(data) {
                        if (data.result == "good") {
                            $("#youEmailComment").text("사용 가능한 이메일입니다.");
                            emailCheck = true;
                        } else {
                            $("#youEmailComment").text("이미 존재하는 이메일입니다.");
                            emailCheck = false;
                        }
                    },
                    error: function(request, status, error) {
                        console.log("request" + request);
                        console.log("status" + status);
                        console.log("error" + error);
                    }
                })
            }
        }
    </script> -->

    <script>
        let emailCheck = false;

        function emailChecking() {
            let youEmail = $("#youEmail").val();

            if(youEmail == null || youEmail == ''){
                $("#youEmailComment").text("이메일을 입력해주세요!");
            } else {
                $.ajax({
                    type : "POST", 
                    url : "joinCheck.php",
                    data : {"youEmail": youEmail, "type": "emailCheck"},
                    dataType : "json",

                    success : function(data){
                        if(data.result == "good"){
                            $("#youEmailComment").text("사용 가능한 이메일입니다.");
                            emailCheck = true;
                        } else {
                            $("#youEmailComment").text("이미 존재하는 이메일입니다.");
                            emailCheck = false;
                        } 
                    },

                    error : function(request, status, error){
                        console.log("request" + request);
                        console.log("status" + status);
                        console.log("error" + error);
                    }
                })
            }
        }

        function joinChecks(){
            // 이름 공백 확인
            if($("#youName").val() == ""){
                $("#youNameComment").text("이름을 입력해주세요.");
                return false;
            }
            // 이름 유효성 검사
            let getYouName = RegExp(/^[가-힣]+$/);
            if(!getYouName.test($("#youName").val())){
                $("#youNameComment").text("이름은 한글만 사용 가능합니다.");
                $("youName").val("");
                return false;
            }

            // 이메일 공백 검사
            if($("#youEmail").val() == ""){
                $("#youEmailComment").text("이메일을 입력해주세요.");
                return false;
            }
            // 이메일 유효성 검사
            let getYouEmail = RegExp(/^[A-Za-z0-9_\.\-]+@[A-Za-z0-9\-]+\.[A-Za-z0-9\-]+/);
            if(!getYouEmail.test($("#youEmail").val())){
                $("#youEmailComment").text("이메일 형식에 맞게 작성해주세요.");
                $("#youEmail").val("");
                return false;
            }
            // 이메일 중복 검사
            if(emailCheck == false){
                $("#youEmailComment").text("이메일 중복 확인 검사를 해주세요.");
                return false;
            }

            // 비밀번호 공백 검사
            if($("#youPass").val() == ""){
                $("#youPassComment").text("비밀번호를 입력해주세요.");
                return false;
            }
            // 비밀번호 유효성 검사
            let getYouPass = $("#youPass").val();
            let getYouPassNum = getYouPass.search(/[0-9]/g);
            let getYouPassEng = getYouPass.search(/[a-z]/ig);
            let getYouPassSpe = getYouPass.search(/[`~!@@#$%^&*|₩₩₩‘₩";:₩/?]/gi);
            if(getYouPass.length < 8 || getYouPass.length > 20){
                $("#youPassComment").text("8자리 ~ 20자리 이내로 입력해주세요~");
                return false;
            } else if (getYouPass.search(/\s/) != -1){
                $("#youPassComment").text("비밀번호는 공백없이 입력해주세요!");
                return false;
            } else if (getYouPassNum < 0 || getYouPassEng < 0 || getYouPassSpe < 0 ){
                $("#youPassComment").text("영문, 숫자, 특수문자를 혼합하여 입력해주세요!");
                return false;
            }
            // 확인 비밀번호 공백 확인
            if($("#youPassC").val() == ""){
                $("#youPassCComment").text("확인 비밀번호를 입력해주세요!");
                return false;
            }
            // 비밀번호가 동일한지 체크
            if($("#youPassC").val() !== $("#youPassC").val()){
                $("#youPassCComment").text("비밀번호가 동일하지 않습니다.");
                return false;
            }

            // 휴대폰 번호 공백 확인
            if($("#youPhone").val() == ""){
                $("#youPhoneComment").text("올바른 휴대전화 번호(000-0000-0000)를 입력해주세요");
                return false;
            }
            // 휴대폰 번호 유효성 검사
            let getYouPhone = RegExp(/01[016789]-[^0][0-9]{2,3}-[0-9]{3,4}/);
            if(!getYouPhone.test($("#youPhone").val())){
                $("#youPhoneComment").text("휴대전화 번호가 정확하지 않습니다. 올바른 휴대전화 번호(000-0000-0000)를 입력해주세요!");
                $("#youPhone").val("");
                return false;
            }
        }
    </script>
</body>
</html>