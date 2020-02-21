<?php require 'header.php'; ?>

<div class="products">
    <h1>Collection</h2>
    <div class="selection">
        <form id="selection_form" action="../request/form-post.php" method="post">
            
            <label for="country">Select country:</label>
            <select name="country" id="Country">
             <option value="0">Select the country</option>
            </select>
            
            <label for="year">Select year</label>
            <select name="year" id="year">
            <option value="0">Select the year</option>
            </select>

            <label for="grapes">Select grapes:</label>
            <select name="grapes" id="grapes">
              <option value="0">Select grapes</option>  
            </select>

            <button type="submit">APPLY FILTERS</button>

        </form>
        
        <div class="buttons">
            <form action="../">
                <button>ADD NEW WINE</button>
            </form>
            <form action="">
                <button type="submit">EDIT</button>
            </form>
            
            <form action="">
                 <button type="submit">DELETE</button>
            </form>
           
        </div>

    </div>
    <div class="product_list">
        
    </div>   


</div>






<?php require 'footer.php'; ?>