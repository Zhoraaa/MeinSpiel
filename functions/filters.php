<?php
function getFilters()
{
    require "connect.php";
    $wheres = [
        "activate_in" => "Магазин активации",
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
    <form id="filters" class="btns gap10 pad10">
        <?php
        foreach ($wheres as $concat => $placeholder) {
            $query = "SELECT * FROM `$concat`";
            $options = getTable($query, null, null, null);
        ?>
            <select name="<?= $concat ?>" class="block">
                <option value disabled selected><?= $placeholder ?></option>
                <?php
                foreach ($options as $option) {
                    $selected = ($_GET[$concat] == $option['id']) ? "selected" : null;
                ?>
                    <option value="<?= $option['id'] ?>" <?= $selected ?>><?= $option['name'] ?></option>
                <?php
                }
                ?>
            </select>
        <?php
        }
        ?>
        <select name="order_by" id="order_by">
            <option value disabled selected>Сортировка</option>
            <?php
            foreach ($sortByMany as $concat => $placeholder) {
                $selected = ($_GET['order_by'] == $concat) ? "selected" : null;
            ?>
                <option value="<?= $concat ?>" <?= $selected ?>><?= $placeholder ?></option>
            <?php
            }
            ?>
        </select>
        <button class="radius white-border">Применить</button>
        <button><a href="" class="radius white-border">Сброс</a></button>
    </form>
<?php
}

function applyFilters()
{
    $where = (isset($_GET['activate_in']) ||
        isset($_GET['developers']) ||
        isset($_GET['publishers'])
    ) ? " WHERE . AND . AND " : null;
    if ($where) {
        $whereSQL = explode(".", $where);
        $whereVars = [
            "shop" => ($_GET['activate_in']) ?? null,
            "developer" => ($_GET['developers']) ?? null,
            "publisher" => ($_GET['publishers']) ?? null
        ];
        $where = "";
        $key = 0;
        foreach ($whereVars as $table => $search) {
            if ($search) {
                $where .= $whereSQL[$key] . "`products`.`" . $table . "` = " . $search;
                $key++;
            }
        }
        $return['where'] = $where;
    }
    $return['sortBy'] = (isset($_GET['order_by'])) ? "ORDER BY " . $_GET['order_by'] : null;
    return $return;
}
