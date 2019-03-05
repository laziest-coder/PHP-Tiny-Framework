<?php
    
try {

    // Find out how many items are in the table
    $total = $data->query('
                SELECT
                    COUNT(*)
                FROM
                    tasks
            ')->fetch_row();

    // How many items to list per page
    $limit = 3;

    // How many pages will there be
    $pages = ceil($total[0] / $limit);

    // What page are we currently on?
    $page = min($pages, filter_input(INPUT_POST, 'page', FILTER_VALIDATE_INT, array(
        'options' => array(
            'default' => 1,
            'min_range' => 1,
        ),
    )));

    // Calculate the offset for the query
    $offset = ($page - 1) * $limit;

    // Some information to display to the user
    $start = $offset + 1;
    $end = min(($offset + $limit), $total);

    // The "back" link
    $prevlink = ($page > 1) ? '<form action="" method="post"><input type="hidden" name="page" value=' . ($page - 1) . '><input type="submit" value="&lsaquo;"></form>' : '<span class="disabled">&laquo;</span> <span class="disabled">&lsaquo;</span>';

    // The "forward" link
    $nextlink = ($page < $pages) ? '<form action="" method="post"><input type="hidden" name="page" value=' . ($page + 1) . '><input type="submit" value="&rsaquo;"></form><form action="" method="post"><input type="hidden" name="page" value=' . ($pages) . '><input type="submit" value="&rsaquo;&rsaquo;"></form>' : '<span class="disabled">&rsaquo;</span> <span class="disabled">&raquo;</span>';

    // Display the paging information
    echo '<div id="paging" style="display: inline-flex; width: 200px;"><p>', $prevlink, ' Page ', $page, ' of ', $pages, $nextlink, ' </p></div>';

    // Prepare the paged query
    $stmt = $data->query("
                SELECT
                    *
                FROM
                    tasks
                LIMIT
                    $limit
                OFFSET
                    $offset
            ");
    

    // Do we have any results?
    if ($stmt->num_rows > 0) {
        // Define how we want to fetch the results
        $stmt->fetch_all();
        $iterator = new IteratorIterator($stmt);
    } else {
        echo '<p>No results could be displayed.</p>';
    }

} catch (Exception $e) {
    echo '<p>', $e->getMessage(), '</p>';
}
?>
<?php foreach ($iterator as $k => $row) {?>
    <center>
    <div class="media">
    <div class="fav-box"><i class="fa fa-heart-o" aria-hidden="true"></i></div>
    <img class="d-flex align-self-start" src="uploads/<?php echo $row['image'] ?>" alt="Generic placeholder image">
    <div class="media-body pl-3">
        <div class="price">Email: <small><?php echo $row['e-mail']; ?></small></div>
            <div class="address"><?php echo $row['text']; ?>
            </div>
        </div>
        
        <?php if ($_SESSION['is_admin']) {?>
        <form action="/task/edit" method="post">
            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
            <input type="submit" value="Edit">
        </form>
        <form action="/task/delete" method="post">
            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
            <input type="submit" value="Delete">
        </form>
        <?php }?>
    </div>
    </center>
<?php }?>
