<!DOCTYPE html>
<html lang="en">

<head>
    <?php $this->load->view("include/header_other")  ?>
</head>

<body>
    <!-- 기존의 방식 -->
    <!-- <form action="" method="post" class="" id="" enctype="multipart/form-data">
        <input type="text" placeholder="name" />
        <input type="email" placeholder="email" />
        <input type="password" placeholder="password" />

        <button type="submit">제출</button>
    </form> -->

    <!-- 코드이그나이터에서 지원하는 폼 양식 -->
    <!-- echo form_open("helpers/form-submit",[]) -->

    <?php echo form_open(site_url("helpers/form-submit"), [
        "method" => "post", "enctype" => "multipart/form-data", "class" => "form-class", "id" => "form-class"
    ]); ?>
    <input type="text" placeholder="name" name="txt_name" />
    <input type="email" placeholder="email" name="txt_email" />
    <input type="password" placeholder="password" name="txt_password" />

    <button type="submit">제출</button>
    <?php echo form_close(); ?>


</body>
<?php $this->load->view("include/footer_other") ?>

</html>