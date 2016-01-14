<?php

//echo "https://api.vk.com/method/friends.get?user_id=582012&fields=nickname,sex,bdate&count=10&offset=0" . "<br>";

$qstr = array('user_id'=>'582012',
    'fields'=>'nickname,sex,bdate',
    'count'=>'10',
    'offset'=>'0');

http_build_query($qstr);
$req = "https://api.vk.com/method/friends.get?". http_build_query($qstr);
//echo $req;

$content = file_get_contents($req);
//echo $content;

$resp = json_decode($content, true);
$friends = $resp['response'];

//var_dump($friends);
?>

<?php foreach ($friends as $post): ?>
    <section>
        <h2><?= $post ['first_name'] . " " . $post['last_name'] ?></h2>
        <p class = "bdate"><?= "День рождения: " . $post['bdate']?></p>
        <p class= "nickname"> <?="Ник: " . $post['nickname']?></p>
    </section>
<?php endforeach; ?>

<!--[0]=> array(7) {
["uid"]=> int(79924)
["first_name"]=> string(10) "Елена"
["last_name"]=> string(16) "Лебедева"
["sex"]=> int(1)
["nickname"]=> string(0) ""
["bdate"]=> string(4) "12.1"
["user_id"]=> int(79924) }-->
