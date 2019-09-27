<?php
include "server_connect/connect.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Colorlib Templates">
    <meta name="author" content="Colorlib">
    <meta name="keywords" content="Colorlib Templates">

    <!-- Title Page-->
    <title>아우누리 학사종합시스템 회원가입</title>

    <!-- Icons font CSS-->
    <link href="DesignFolder/signupfolder/vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <link href="DesignFolder/signupfolder/vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Vendor CSS-->
    <link href="DesignFolder/signupfolder/vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="DesignFolder/signupfolder/vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="DesignFolder/signupfolder/css/main.css" rel="stylesheet" media="all">
</head>

<body>
    <div class="page-wrapper bg-gra-02 p-t-130 p-b-100 font-poppins">
        <div class="wrapper wrapper--w680">
            <div class="card card-4">
                <div class="card-body">
                    <h2 class="title">한국기술교육대 학사종합시스템 회원가입</h2>
                    <form method="POST" action="function/signup.php">
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">아이디</label>
                                    <input class="input--style-4" type="text" name="user_id">
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">패스워드</label>
                                    <input class="input--style-4" type="password" name="password">
                                </div>
                            </div>
                        </div>
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">이름</label>
                                    <input class="input--style-4" type="text" name="name">
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">학번</label>
                                    <input class="input--style-4" type="text" name="admission_year">
                                </div>
                            </div>
                        </div>
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">생년월일</label>
                                    <div class="input-group-icon">
                                        <input class="input--style-4 js-datepicker" type="text" name="birthday">
                                        <i class="zmdi zmdi-calendar-note input-icon js-btn-calendar"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">성별</label>
                                    <div class="p-t-10">
                                        <label class="radio-container m-r-45">남성
                                            <input type="radio" checked="checked" name="gender" value="male">
                                            <span class="checkmark"></span>
                                        </label>
                                        <label class="radio-container">여성
                                            <input type="radio" name="gender" value="female">
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">주소</label>
                                    <input class="input--style-4" type="text" name="address">
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">핸드폰 번호</label>
                                    <input class="input--style-4" type="text" name="phone">
                                </div>
                            </div>
                        </div>
                        <div class="input-group">
                            <label class="label">전공</label>
                            <div class="rs-select2 js-select-simple select--no-search">
                                <select name="major">
                                    <option disabled="disabled" selected="selected">전공을 선택하세요</option>
                                    <option>기계공학부</option>
                                    <option>메카트로닉스공학부</option>
                                    <option>전기전자통신공학부</option>
                                    <option>컴퓨터공학부</option>
                                    <option>디자인.건축공학부</option>
                                    <option>에너지신소재화학공학부</option>
                                    <option>산업경영학부</option>
                                </select>
                                <div class="select-dropdown"></div>
                            </div>
                        </div>

                        <div class="p-t-15">
                            <button class="btn btn--radius-2 btn--blue" type="submit">회원가입</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Jquery JS-->
    <script src="DesignFolder/signupfolder/vendor/jquery/jquery.min.js"></script>
    <!-- Vendor JS-->
    <script src="DesignFolder/signupfolder/vendor/select2/select2.min.js"></script>
    <script src="DesignFolder/signupfolder/vendor/datepicker/moment.min.js"></script>
    <script src="DesignFolder/signupfolder/vendor/datepicker/daterangepicker.js"></script>

    <!-- Main JS-->
    <script src="DesignFolder/signupfolder/js/global.js"></script>

</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>
<!-- end document-->