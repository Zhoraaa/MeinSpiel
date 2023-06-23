<?php
$id = $_GET['id'];
$query = "SELECT 
reviews.id,
reviews.text,
users.name AS author, 
reviews.created_at,
reviews.product

FROM `reviews`

INNER JOIN users ON reviews.author = users.id

WHERE reviews.product = $id ORDER BY reviews.created_at DESC";
$res = $con->query($query);
$reviews = $res->fetch_all(MYSQLI_ASSOC);

foreach ($reviews as $review) {
?>
    <div class="review radius inner-shadow pad20">
        <div class="left-part">
            <div id="avatar" class="mauto"> <img src="../img/account.svg" alt="<?= $review['author'] ?>"> </div>
            <p class="ctrl-e">@<?= $review['author'] ?></p>
            <p class="ctrl-e"><?= $review['created_at'] ?></p>
        </div>
        <div class="mid-part">
            <?= $review['text'] ?>
        </div>
    </div>
<?php
}
return $reviews;
?>