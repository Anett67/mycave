<form action="../request/form_post.php" method="post" class="add_new" id="choose_bottle" enctype="multipart/form-data">

                <h2>Add New Product</h2>
                
                <label for="select_bottle">Choose a bottle or add a new one</label>
                <select name="select_bottle" id="select_bottle">

                    <option value="0">Choose a bottle</option>
                    <?php require '../request/bottle_select.php'; ?>

                </select>
                
                <div class="bottle_buttons">
                    <button class="add_bottle">Add new bottle</button>
                </div>

                <label for="year_new">Year</label>
                <input type="number" name="year_new" id="year_new">                

                <label for="description">Description</label>
                <textarea name="description" id="description" cols="30" rows="10"></textarea>

                <label for="file-upload" class="custom-file-upload">
                    <p>Add photo</p>
                </label>
                <input id="file-upload" type="file" name="file_upload" />
                
                <button class="save_button" type="submit">Save</button>
                <button class="cancel">Cancel</button>
            </form>
