<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>Web Share</title>
    <script type="text/JavaScript" src="https://developers.kakao.com/sdk/js/kakao.min.js"></script>
    <script type="text/javascript" src="/ci3/asserts/share.js"></script>
</head>

<body>

    <input type="button" onClick="webShare(url_,title_,text_);" value="btnShare" />
    <input type="button" onClick="shareKakaoCustom();" value="Custom" />
    <input type="button" onClick="shareKakaoDefault(url_,title_,account_,img_);" value="Default" />
    <input type="button" onClick="shareFacebook(url_,text_,title_);" value="facebook" />

</body>

<script>
    var url_ = "http://localhost/ci3/";
    var title_ = "제목제목";
    var account_ = "설명설명";
    var text_ = "문자문자";
    var img_ = "https://cdn.pixabay.com/photo/2021/10/25/14/45/apples-6741164_960_720.jpg";
</script>


</html>