<?php
function filters($con)
{
    $wheres = [
        "activate-in" => "Магазин активации",
        "developers" => "Разработчик",
        "publishers" => "Издатель"
    ];
    $sortByMany = [
        "products.name ASC" => "По имени (А-Я)",
        "products.name DESC" => "По имени (Я-А)",
        "products.release_date ASC" => "Сначала новые",
        "products.release_date DESC" => "Сначала старые"
    ];
?>
    <div id="filters">
        <?php
        foreach ($wheres as $concat => $placeholder) {
            
        }
        ?>

    </div>
<?php
}
