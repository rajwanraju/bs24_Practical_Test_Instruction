<?php
    class Database
    {
        function __construct($pdo)
        {
            $this->pdo = $pdo;
        }

        function getCategory()
        {
            $query = $this->pdo->prepare("SELECT category.name as Category, (SELECT count(item_category_relations.categoryId) FROM item_category_relations WHERE category.Id=item_category_relations.categoryId) as Total FROM category, item_category_relations, item ORDER BY Total DESC");
            $query->execute();
            return $query->fetchAll();
        }

        function getCategoryTree($parent_id, $sub_mark = '')
        {
            $query = $this->pdo->prepare("SELECT * FROM catetory_relations,category WHERE catetory_relations.ParentcategoryId = $parent_id");
            $query->execute();
            // $query->fetchAll();

            if ($query->num_rows > 0) {
                while ($row = $query->fetchAll()) {
                    echo "<li>".$sub_mark.$row['name']."</li>";
                    $this->getCategoryTree($row['id'], $sub_mark.'---');
                }
            }
        }
    }
?>