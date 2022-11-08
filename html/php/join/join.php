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
                <form action="joinSave.php" name="join" method="post">
                    <fieldset>
                        <legend>회원가입</legend>
                        <p class="required__N">*필수사항 입니다.</p>
                        <div class="join__box">
                            <div>
                                <label for="youName">*이름</label>
                                <input type="text" id="youName" name="youName" placeholder="이름을 입력해주세요!" required>
                            </div>
                            <span>
                                <label for="youGender">*성별</label>
                                <fieldset class="gender">
                                      <input class="gender__btn" type="radio" name="gender" value="man"/>
                                      <span>남</span>
                                      <input class="gender__btn" type="radio" name="gender" value="woman"/>
                                      <span>여</span>
                                </fieldset>
                            </span>
                            <div>
                                <label for="youEmail">*아이디 (이메일 주소)</label>
                                <input class="input__width" type="text" id="youEmail" name="youEmail" placeholder="이메일을 입력해주세요!" required>
                                <div class="email_C">
                                    <span><a class="double__check" href="#">중복 확인</a></span>
                                    <p class="id__already">※ 이미 사용중인 아이디입니다.</p>
                                    <p class="id__able">※ 사용 가능한 아이디입니다.</p>
                                </div>
                            </div>
                            <div>
                                <label for="youPass">*비밀번호</label>
                                <input type="password" id="youPass" name="youPass" placeholder="비밀번호를 입력해주세요!" required>
                            </div>
                            <div>
                                <label for="youPassC">*비밀번호 확인</label>
                                <input type="password" id="youPassC" name="youPassC" placeholder="확인 비밀번호를 입력해주세요!" required>
                            </div>
                            <div>
                                <label for="youPhone">*전화번호</label>
                                <input type="text" id="youPhone" name="youPhone" placeholder="휴대폰번호를 입력해주세요!" required>
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

    <!-- script -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="../assets/js/custom.js"></script>
    <script src="../assets/js/header.js"></script>
</body>
</html>