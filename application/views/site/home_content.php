<h2>home_page 페이지</h2>
<h4><?php echo $message; ?></h4>
<p>======</p>

<?php

$colum = "u_id";
$num = 1;
$tbl = "users";
$data = array(
    "u_name" => "이름변경2",
    "u_email" => "이메일변경2@메일.com",
    "u_phone_num" => "123321",
);

$total = array(
    "colum" => "u_id",
    "num" => 1,
    "tbl" => "users",
    "data" => array(
        "u_name" => "이름변경2",
        "u_email" => "이메일변경2@메일.com",
        "u_phone_num" => "123321",
    ),
);
$en_total =  json_encode($total);
echo "<pre>";
print_r($total["data"]);
?>
<h4><?php echo ($en_total); ?> </h4>
<h4><?php echo $total; ?> </h4>

<p>======</p>