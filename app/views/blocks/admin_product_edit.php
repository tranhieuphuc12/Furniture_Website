<div class="container mt-3">
    <h2 class="text-center fw-bold title_h6 mt-5">Edit Product</h2>
    <h4 class="title_h6 text-center text-secondary">#<?php echo $product['id']?></h4>

    <form action="product_update.php?page=<?php echo $page?>" method="post" enctype='multipart/form-data'>
        <input type="hidden" class="form-control" name="id" placeholder="id" value="<?php echo $product['id']?>"/>
        <div class="mb-3">
            <label class="form-label">Name</label> <input type="text" class="form-control" name="name" placeholder="Product Name" value="<?php echo $product['name'] ?>" required />
        </div>
        <div class="mb-3">
            <label class="form-label">Price</label> <input type="number" min="0" step="0.01" class="form-control" name="price" placeholder="Price" value="<?php echo $product['price'] ?>" required />
        </div>
        <div class="mb-3">
            <label class="form-label">Quantity</label> <input type="number" min="0" class="form-control"  name="quantity" placeholder="Quantity" value="<?php echo $product['quantity'] ?>" required />
        </div>
        <div class="mb-3">
            <label for="floatingTextarea">Description</label>
            <textarea id="editor" class="form-control" placeholder="Description"  name="description" required><?php echo $product['description'] ?></textarea>
        </div>
        <div class="mb-3">
            <label for="floatingTextarea">Origin</label> <input class="form-control" placeholder="origin"  name="origin" value="<?php echo $product['origin'] ?>" required>
        </div>
        <div class="mb-3">
            <label for="formFile" class="form-label">Image</label> <input class="form-control" type="file"  name="image">
            <input class="form-control" type="hidden"  name="imageOld" value="<?php echo $product['image'] ?>">
        </div>
        <div class="mb-3">
            <label for="category_choose">Category</label>
            <select name="categoryId" class="form-select" aria-label="Default select example" required>
                <?php foreach ($categories as $category){?>
                    <option class="option-categories" value="<?php echo $category['id'] ?>" <?php echo ($category['id'] == $product['category_id'])?'selected':''?>><?php echo $category['name']?></option>
                <?php } ?>
            </select>

        </div>
        <div class="modal-footer d-flex justify-content-center">
            <button style="padding: 9px 20px; width: 100px;" type="submit" class="btn btn-warning float-end">Update</button>
        </div>
    </form>


</div>

<script src="../ckeditor5/build/ckeditor.js"></script>
    <script>
        ClassicEditor
            .create(document.querySelector('#editor'), {
                //Editor config
                toolbar: {
                    items: [
                        'heading',
                        '|',
                        'bold',
                        'italic',
                        'underline',
                        'fontColor',
                        '|',
                        'bulletedList',
                        'numberedList',
                        'indent',
                        'outdent',
                        '|',
                        'blockQuote',
                        '|',
                        'undo',
                        'redo'
                    ]
                }
            })
            .then(editor => {
                window.editor = editor;
            })
            .catch(handleSampleError);
    </script>