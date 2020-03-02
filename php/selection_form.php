



              <form id="selection_form" action="../request/select_post.php" method="post">

                <label for="country">Select country</label>
                <select name="country_choose" id="country_choose">
                    <option value="0">All the countries</option>
                    <?php

                        $req = $bdd->query('   
                            SELECT DISTINCT country 
                            FROM bottles
                            ORDER BY country
                        ');

                        while($data = $req->fetch()){ ?>
                            <option value="<?php echo $data['country']; ?>"><?php echo $data['country']; ?></option>
                        <?php } ?>
                </select>
                
                <label for="year_choose">Select year</label>
                <select name="year_choose" id="year_choose">
                    <option value="0">Choose the year</option>
                    
                    <?php

                        $req = $bdd->query('   
                            SELECT DISTINCT year 
                            FROM bottle_collection
                            ORDER BY year
                        ');

                        while($data = $req->fetch()){ ?>
                            <option value="<?php echo $data['year']; ?>"><?php echo $data['year']; ?></option>
                        <?php } ?>

                </select>

                <label for="grapes">Select grapes</label>
                <select name="grapes_choose" id="grapes_choose">
                    <option value="0">All grapes</option>
                    
                    <?php

                        $req = $bdd->query('   
                            SELECT DISTINCT grapes 
                            FROM bottles
                            ORDER BY grapes
                        ');

                        while($data = $req->fetch()){ ?>
                            <option value="<?php echo $data['grapes']; ?>"><?php echo $data['grapes']; ?></option>
                        <?php } ?>
                
                </select>

                <button type="submit">APPLY FILTERS</button>

            </form>
            <?php 
                if(isset($_SESSION['id'])):
             ?>
            <div class="buttons">
                <button id="add_new_button">ADD NEW WINE</button>
                <button class="add_bottle">ADD NEW BOTTLE</button>
            </div>
            <?php endif; ?>