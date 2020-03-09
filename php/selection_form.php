
<label for="search">Search in product name or description</label>
<input type="text" name="search" id="search" placeholder="Search ...">


<?php if(isset($_SESSION['id'])):?>
    <div class="buttons">
        <button id="add_new_button">ADD NEW WINE</button>
        <button class="add_bottle">ADD NEW BOTTLE</button>
    </div>
<?php endif; ?>