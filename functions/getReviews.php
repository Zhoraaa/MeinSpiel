<?php
$id = $_GET['id'];
$query = "SELECT * FROM `reviews` WHERE `id` = $id ORDER BY `created_at` ASC";
$res = $con->query($query);
$reviews = $res->fetch_all(MYSQLI_ASSOC);

foreach ($reviews as $review) {
?>
    <div class="review radius inner-shadow pad20">
        <div class="review">
            <div class="left-part">
                <div id="avatar" class="mauto"> <img src="../img/account.svg" alt="<?= $review['author'] ?>"> </div>
                <p class="ctrl-e">@<?= $user['name'] ?></p>
                <p class="ctrl-e"><?= $review['created_at'] ?></p>
            </div>
            <div class="mid-part">
                <?= $review['text'] ?>
            </div>
        </div>
    </div>
<?php
}
return $reviews;
?>