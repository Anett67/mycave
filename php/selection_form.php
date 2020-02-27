            <form id="selection_form" action="../request/select_post.php" method="post">

                <label for="country">Select country</label>
                <select name="country_choose" id="country_choose">
                    <option value="0">Choose a country</option>
                </select>
                
                <label for="year_choose">Select year</label>
                <select name="year_choose" id="year_choose">
                    <option value="0">Choose the year</option>
                </select>

                <label for="grapes">Select grapes</label>
                <select name="grapes_choose" id="grapes_choose">
                    <option value="0">Select grapes</option>
                </select>

                <button type="submit">APPLY FILTERS</button>

            </form>
            <?php 
                if(isset($_SESSION['id'])):
             ?>
            <div class="buttons">
                <button id="add_new_button">ADD NEW WINE</button>
            </div>
            <?php endif; ?>