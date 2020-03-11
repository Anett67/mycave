<?php require '../request/connect.php'; 

$req = $bdd->query('   
    SELECT DISTINCT year
    FROM bottle_collection
    ORDER BY year
    ASC
');

?>

<div id="search_field">
    <label for="search">Search in product name or description</label>
    <input type="text" name="search" id="search" placeholder="Search ...">
    <label for="year_select">Select year</label>
    <select name="year_select" id="year_select">
        <option value="0">Select year</option>
    
        <?php while($data = $req->fetch()): ?>

            <option value="<?php echo $data['year'] ?> "><?php echo $data['year']; ?></option>

        <?php endwhile; ?>

    </select>
    <button id="view_all"><a href="collection.php">View all</a></button>
</div>

<?php if(isset($_SESSION['id'])):?>
    <div class="buttons">
        <button id="add_new_button">ADD NEW WINE</button>
        <button class="add_bottle">ADD NEW BOTTLE</button>
    </div>
<?php endif; ?>