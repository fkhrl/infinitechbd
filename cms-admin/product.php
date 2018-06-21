<?php
include("class/auth.php");
include("plugin/plugin.php");
$plugin = new cmsPlugin();
$table = "product";
?>
<?php
if (isset($_POST['create'])) {
    extract($_POST);
    if (!empty($name) ) {
        if (!empty($_FILES['photo_thumble']['name'])) {
            include('class/uploadImage_Class.php');
            $imgclassget = new image_class();
            $photo_thumble = $imgclassget->upload_fiximage("upload", "photo_thumble", "photo_thumble_upload_" . $table_name . "_" . time());
            $photo_1 = $imgclassget->upload_fiximage("upload", "photo_1", "photo_1_upload_" . $table_name . "_" . time());
            $photo_2 = $imgclassget->upload_fiximage("upload", "photo_2", "photo_2_upload_" . $table_name . "_" . time());
            $photo_3 = $imgclassget->upload_fiximage("upload", "photo_3", "photo_3_upload_" . $table_name . "_" . time());
            $photo_4 = $imgclassget->upload_fiximage("upload", "photo_4", "photo_4_upload_" . $table_name . "_" . time());
        } else {
            $photo_thumble = ' ';
            $photo_1 = ' ';
            $photo_2 = ' ';
            $photo_3 = ' ';
            $photo_4 = ' ';
        }
        $insert = array('name' => $name, 'brand_id' => $brand_id, 'product_category_id' => $product_category_id, 'photo_thumble' => $photo_thumble, 'photo_1' => $photo_1, 'photo_2' => $photo_2, 'photo_3' => $photo_3, 'photo_4' => $photo_4, 'purchase_price' => $purchase_price, 'sell_price' => $sell_price, 'quantity' => $quantity, 'details' => $details, 'product_code' => $product_code, 'manufacturer' => $manufacturer, 'date' => date('Y-m-d'), 'status' => 1);
        if ($obj->insert($table, $insert) == 1) {
            $plugin->Success("Successfully Saved", $obj->filename());
        } else {
            $plugin->Error("Failed", $obj->filename());
        }
    } else {
        $plugin->Error("Fields is Empty", $obj->filename());
    }
} elseif (isset($_POST['update'])) {
    extract($_POST);
    if (!empty($name) && !empty($brand_id) && !empty($product_category_id) && !empty($purchase_price) && !empty($sell_price) && !empty($quantity) && !empty($details) && !empty($product_code) && !empty($manufacturer)) {
        $updatearray = array("id" => $id);
        if (!empty($_FILES['photo_thumble']['name'] && $_FILES['photo_1']['name'] && $_FILES['photo_2']['name'] && $_FILES['photo_3']['name'] && $_FILES['photo_4']['name'])) {
            include('class/uploadImage_Class.php');
            $imgclassget = new image_class();
            $photo_thumble_1 = $imgclassget->upload_fiximage("upload", "photo_thumble", "photo_thumble_upload_" . $table_name . "_" . time());
            $photo_1_1 = $imgclassget->upload_fiximage("upload", "photo_1", "photo_1_upload_" . $table_name . "_" . time());
            $photo_2_1 = $imgclassget->upload_fiximage("upload", "photo_2", "photo_2_upload_" . $table_name . "_" . time());
            $photo_3_1 = $imgclassget->upload_fiximage("upload", "photo_3", "photo_3_upload_" . $table_name . "_" . time());
            $photo_4_1 = $imgclassget->upload_fiximage("upload", "photo_4", "photo_4_upload_" . $table_name . "_" . time());
            $photo_thumble = $photo_thumble_1;
            $photo_1 = $photo_1_1;
            $photo_2 = $photo_2_1;
            $photo_3 = $photo_3_1;
            $photo_4 = $photo_4_1;
            @unlink("upload/" . $ex_photo_thumble);
            @unlink("upload/" . $ex_photo_1);
            @unlink("upload/" . $ex_photo_2);
            @unlink("upload/" . $ex_photo_3);
            @unlink("upload/" . $ex_photo_4);
        } else {
            $photo_thumble = $ex_photo_thumble;
            $photo_1 = $ex_photo_1;
            $photo_2 = $ex_photo_2;
            $photo_3 = $ex_photo_3;
            $photo_4 = $ex_photo_4;
        }$upd2 = array('name' => $name, 'brand_id' => $brand_id, 'product_category_id' => $product_category_id, 'photo_thumble' => $photo_thumble, 'photo_1' => $photo_1, 'photo_2' => $photo_2, 'photo_3' => $photo_3, 'photo_4' => $photo_4, 'purchase_price' => $purchase_price, 'sell_price' => $sell_price, 'quantity' => $quantity, 'details' => $details, 'product_code' => $product_code, 'manufacturer' => $manufacturer, 'date' => date('Y-m-d'), 'status' => 1);
        $update_merge_array = array_merge($updatearray, $upd2);
        if ($obj->update($table, $update_merge_array) == 1) {
            $plugin->Success("Successfully Updated", $obj->filename());
        } else {
            $plugin->Error("Failed", $obj->filename());
        }
    }
} elseif (isset($_GET['del']) == "delete") {
    $delarray = array("id" => $_GET['id']);
    $photolink = $obj->SelectAllByVal($table, 'id', $_GET['id'], 'photo_4');
    @unlink("upload/" . $photolink);
    if ($obj->delete($table, $delarray) == 1) {
        $plugin->Success("Successfully Delete", $obj->filename());
    } else {
        $plugin->Error("Failed", $obj->filename());
    }
}
?><!doctype html>
<!--[if lt IE 7]> <html class="ie lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>    <html class="ie lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>    <html class="ie lt-ie9"> <![endif]-->
<!--[if gt IE 8]> <html> <![endif]-->
<!--[if !IE]><!--><html><!-- <![endif]-->
    <head>
        <?php
        echo $plugin->softwareTitle();
        echo $plugin->TableCss();
        echo $plugin->KendoCss();
        echo $plugin->FileUploadCss();
        ?>
    </head>
    <body class="">
        <?php
        include('include/topnav.php');
        include('include/mainnav.php');
        ?>





        <div id="content">
            <h1 class="content-heading bg-white border-bottom">Product</h1>
            <div class="innerAll bg-white border-bottom">
                <ul class="menubar">
                    <li class="active"><a href="#">Create New Product</a></li>
                    <li><a href="product_data.php">Product List</a></li>
                </ul>
            </div>
            <div class="innerAll spacing-x2">
                <?php echo $plugin->ShowMsg(); ?>
                <!-- Widget -->

                <!-- Widget -->
                <div class="widget widget-inverse" >
                    <?php
                    if (isset($_GET['edit'])) {
                        ?>
                        <!-- Widget heading -->
                        <div class="widget-head">
                            <h4 class="heading">Update/Change - Product</h4>
                        </div>
                        <!-- // Widget heading END -->

                        <div class="widget-body"><form enctype='multipart/form-data' class="form-horizontal" method="post" action="" role="form">
                                <input type="hidden" name="id" value="<?php echo $_GET['edit']; ?>"><div class='form-group'>
                                    <label  for="inputEmail3" class="col-sm-2 control-label"> Name </label>

                                    <div class='col-sm-9'>
                                        <input type='text' id='form-field-1' name='name' value='<?php echo $obj->SelectAllByVal($table, "id", $_GET['edit'], "name"); ?>' placeholder='Name' class='form-control' />
                                    </div>
                                </div><div class='form-group'>
                                    <label  for="inputEmail3" class="col-sm-2 control-label"> Brand ID </label>

                                    <div class='col-sm-6'>
                                        <!--<input type='text' id='form-field-1' name='brand_id' placeholder='Brand ID'  value='<?php //echo $obj->SelectAllByVal($table, "id", $_GET['edit'], "brand_id");         ?>'  class='form-control' />-->
                                        <select name='brand_id' class='form-control'>
                                            <option>Select A Brand Name</option>
                                            <?php
                                            $brand_id = $obj->SelectAllByVal($table, "id", $_GET['edit'], "brand_id");
                                            $brand_name = $obj->FlyQuery("SELECT * FROM brand_name");
                                            if (!empty($brand_name)) {
                                                foreach ($brand_name as $brand) {
                                                    ?>
                                                    <option <?php if ($band_id == $brand->id) { ?>selected='selected'<?php } ?> value="<?php echo $brand->id; ?>"><?php echo $brand->name; ?></option>
                                                    <?php
                                                }
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div><div class='form-group'>
                                    <label  for="inputEmail3" class="col-sm-2 control-label"> Product Category ID </label>

                                    <div class='col-sm-6'>
                                        <!--<input type='text' id='form-field-1' name='product_category_id' placeholder='Product Category ID'  value='<?php //echo $obj->SelectAllByVal($table, "id", $_GET['edit'], "product_category_id");        ?>'  class='form-control' />-->
                                        <select name='product_category_id' class='form-control'>
                                            <option>Select A Product Category Name</option>
                                            <?php
                                            $product_category_id = $obj->SelectAllByVal($table, "id", $_GET['edit'], "product_category_id");
                                            $product_category_name = $obj->FlyQuery("SELECT * FROM product_category_name");
                                            if (!empty($product_category_name)) {
                                                foreach ($product_category_name as $product_category) {
                                                    ?>
                                                    <option <?php if ($product_category_id == $product_category->id) { ?>selected="selected"<?php } ?> value="<?php echo $product_category->id; ?>"><?php echo $product_category->name; ?></option>
                                                    <?php
                                                }
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div><div class='form-group'>
                                    <label  for="inputEmail3" class="col-sm-2 control-label"> Photo thumble </label>

                                    <div class='col-sm-3'>
                                        <!--<input type='file' id='id-input-file-1' name='photo_thumble' placeholder='Photo thumble' class='form-control' />-->
                                        <?php
                                        $photo_thumble = $obj->SelectAllByVal($table, "id", $_GET['edit'], "photo_thumble");
                                        echo $plugin->FileUploadBox("1", $photo_thumble, "photo_thumble")
                                        ?>
                                    </div>
                                </div><div class='form-group'>
                                    <label  for="inputEmail3" class="col-sm-2 control-label"> photo 1 </label>

                                    <div class='col-sm-3'>
                                        <!--<input type='file' id='id-input-file-1' name='photo_1' placeholder='photo 1' class='form-control' />-->
                                        <?php
                                        $photo_1 = $obj->SelectAllByVal($table, "id", $_GET['edit'], "photo_1");
                                        echo $plugin->FileUploadBox("1", $photo_1, "photo_1")
                                        ?>
                                    </div>
                                </div><div class='form-group'>
                                    <label  for="inputEmail3" class="col-sm-2 control-label"> photo 2 </label>

                                    <div class='col-sm-3'>
                                        <!--<input type='file' id='id-input-file-1' name='photo_2' placeholder='photo 2' class='form-control' />-->
                                        <?php
                                        $photo_2 = $obj->SelectAllByVal($table, "id", $_GET['edit'], "photo_2");
                                        echo $plugin->FileUploadBox("1", $photo_2, "photo_2")
                                        ?>
                                    </div>
                                </div><div class='form-group'>
                                    <label  for="inputEmail3" class="col-sm-2 control-label"> photo 3 </label>

                                    <div class='col-sm-3'>
                                        <!--<input type='file' id='id-input-file-1' name='photo_3' placeholder='photo 3' class='form-control' />-->
                                        <?php
                                        $photo_3 = $obj->SelectAllByVal($table, "id", $_GET['edit'], "photo_3");
                                        echo $plugin->FileUploadBox("1", $photo_3, "photo_3")
                                        ?>
                                    </div>
                                </div><div class='form-group'>
                                    <label  for="inputEmail3" class="col-sm-2 control-label"> photo 4 </label>

                                    <div class='col-sm-3'>
                                        <!--<input type='file' id='id-input-file-1' name='photo_4' placeholder='photo 4' class='form-control' />-->
                                        <?php
                                        $photo_4 = $obj->SelectAllByVal($table, "id", $_GET['edit'], "photo_4");
                                        echo $plugin->FileUploadBox("1", $photo_4, "photo_4")
                                        ?>
                                    </div>
                                </div><div class='form-group'>
                                    <label  for="inputEmail3" class="col-sm-2 control-label"> Purchase Price </label>

                                    <div class='col-sm-9'>
                                        <input type='text' id='form-field-1' name='purchase_price' value='<?php echo $obj->SelectAllByVal($table, "id", $_GET['edit'], "purchase_price"); ?>' placeholder='Purchase Price' class='form-control' />
                                    </div>
                                </div><div class='form-group'>
                                    <label  for="inputEmail3" class="col-sm-2 control-label"> Sell Price </label>

                                    <div class='col-sm-9'>
                                        <input type='text' id='form-field-1' name='sell_price' value='<?php echo $obj->SelectAllByVal($table, "id", $_GET['edit'], "sell_price"); ?>' placeholder='Sell Price' class='form-control' />
                                    </div>
                                </div><div class='form-group'>
                                    <label  for="inputEmail3" class="col-sm-2 control-label"> Quantity </label>

                                    <div class='col-sm-9'>
                                        <input type='text' id='form-field-1' name='quantity' value='<?php echo $obj->SelectAllByVal($table, "id", $_GET['edit'], "quantity"); ?>' placeholder='Quantity' class='form-control' />
                                    </div>
                                </div><div class='form-group'>
                                    <label  for="inputEmail3" class="col-sm-2 control-label"> Details </label>

                                    <div class='col-sm-9'>
                                        <textarea id='editor' name='details' placeholder='Details' class='form-control'><?php echo $obj->SelectAllByVal($table, "id", $_GET['edit'], "details"); ?></textarea>
                                        <script>
                                            $(document).ready(function () {
                                                // create Editor from textarea HTML element with default set of tools
                                                $("#editor").kendoEditor({resizable: {
                                                        content: true,
                                                        toolbar: true
                                                    }});
                                            });
                                        </script>
                                    </div>
                                </div><div class='form-group'>
                                    <label  for="inputEmail3" class="col-sm-2 control-label"> Product Code </label>

                                    <div class='col-sm-9'>
                                        <input type='text' id='form-field-1' name='product_code' value='<?php echo $obj->SelectAllByVal($table, "id", $_GET['edit'], "product_code"); ?>' placeholder='Product Code' class='form-control' />
                                    </div>
                                </div><div class='form-group'>
                                    <label  for="inputEmail3" class="col-sm-2 control-label"> Manufacturer </label>

                                    <div class='col-sm-9'>
                                        <input type='text' id='form-field-1' name='manufacturer' value='<?php echo $obj->SelectAllByVal($table, "id", $_GET['edit'], "manufacturer"); ?>' placeholder='Manufacturer' class='form-control' />
                                    </div>
                                </div><div class="form-group">
                                    <div class="col-sm-offset-2 col-sm-10">
                                        <button  onclick="javascript:return confirm('Do You Want change/update These Record?')"  type="submit" name="update" class="btn btn-primary">Save Change</button>
                                        <button type="reset" class="btn btn-danger">Reset</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    <?php } else { ?>
                        <!-- Widget heading -->
                        <div class="widget-head">
                            <h4 class="heading">Create New Product</h4>
                        </div>
                        <!-- // Widget heading END -->

                        <div class="widget-body"><form enctype='multipart/form-data' class="form-horizontal" method="post" action="" role="form"><div class='form-group'>
                                    <label  for="inputEmail3" class="col-sm-2 control-label"> Name </label>

                                    <div class='col-sm-9'>
                                        <input type='text' id='form-field-1' name='name' placeholder='Name' class='form-control' />
                                    </div>
                                </div><div class='form-group'>
                                    <label  for="inputEmail3" class="col-sm-2 control-label"> Brand ID </label>

                                    <div class='col-sm-6'>
                                        <!--<input type='text' id='form-field-1' name='brand_id' placeholder='Brand ID' class='form-control' />-->
                                        <select name='brand_id' class='form-control'>
                                            <option>Select A Brand Name</option>
                                            <?php
                                            $brand_name = $obj->FlyQuery("SELECT * FROM brand_name");
                                            if (!empty($brand_name)) {
                                                foreach ($brand_name as $brand) {
                                                    ?>
                                                    <option value="<?php echo $brand->id; ?>"><?php echo $brand->name; ?></option>
                                                    <?php
                                                }
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div><div class='form-group'>
                                    <label  for="inputEmail3" class="col-sm-2 control-label"> Product Category ID </label>

                                    <div class='col-sm-6'>
                                        <!--<input type='text' id='form-field-1' name='product_category_id' placeholder='Product Category ID' class='form-control' />-->
                                        <select name='product_category_id' class='form-control'>
                                            <option>Select A Product Category Name</option>
                                            <?php
                                            $product_category_name = $obj->FlyQuery("SELECT * FROM product_category_name");
                                            if (!empty($product_category_name)) {
                                                foreach ($product_category_name as $product_category) {
                                                    ?>
                                                    <option value="<?php echo $product_category->id; ?>"><?php echo $product_category->name; ?></option>
                                                    <?php
                                                }
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div><div class='form-group'>
                                    <label  for="inputEmail3" class="col-sm-2 control-label"> Product Code </label>

                                    <div class='col-sm-9'>
                                        <input type='text' id='form-field-1' name='product_code' placeholder='Product Code' class='form-control' />
                                    </div>
                                </div><div class='form-group'>
                                    <label  for="inputEmail3" class="col-sm-2 control-label"> Manufacturer </label>

                                    <div class='col-sm-9'>
                                        <input type='text' id='form-field-1' name='manufacturer' placeholder='Manufacturer' class='form-control' />
                                    </div>
                                </div><div class='form-group'>
                                    <label  for="inputEmail3" class="col-sm-2 control-label"> Photo thumble </label>

                                    <div class='col-sm-3'>
                                        <!--<input type='file' id='id-input-file-1' name='photo_thumble' placeholder='Photo thumble' class='form-control' />-->
                                        <?php
                                        echo $plugin->FileUploadBox("0", "", "photo_thumble")
                                        ?>
                                    </div>
                                </div><div class='form-group'>
                                    <label  for="inputEmail3" class="col-sm-2 control-label"> photo 1 </label>

                                    <div class='col-sm-3'>
                                        <!--<input type='file' id='id-input-file-1' name='photo_1' placeholder='photo 1' class='form-control' />-->
                                        <?php
                                        echo $plugin->FileUploadBox("0", "", "photo_1")
                                        ?>
                                    </div>
                                </div><div class='form-group'>
                                    <label  for="inputEmail3" class="col-sm-2 control-label"> photo 2 </label>

                                    <div class='col-sm-3'>
                                        <!--<input type='file' id='id-input-file-1' name='photo_2' placeholder='photo 2' class='form-control' />-->
                                        <?php
                                        echo $plugin->FileUploadBox("0", "", "photo_2")
                                        ?>
                                    </div>
                                </div><div class='form-group'>
                                    <label  for="inputEmail3" class="col-sm-2 control-label"> photo 3 </label>

                                    <div class='col-sm-3'>
                                        <!--<input type='file' id='id-input-file-1' name='photo_3' placeholder='photo 3' class='form-control' />-->
                                        <?php
                                        echo $plugin->FileUploadBox("0", "", "photo_3")
                                        ?>
                                    </div>
                                </div><div class='form-group'>
                                    <label  for="inputEmail3" class="col-sm-2 control-label"> photo 4 </label>

                                    <div class='col-sm-3'>
                                        <!--<input type='file' id='id-input-file-1' name='photo_4' placeholder='photo 4' class='form-control' />-->
                                        <?php
                                        echo $plugin->FileUploadBox("0", "", "photo_4")
                                        ?>
                                    </div>
                                </div><div class='form-group'>
                                    <label  for="inputEmail3" class="col-sm-2 control-label"> Purchase Price </label>

                                    <div class='col-sm-9'>
                                        <input type='text' id='form-field-1' name='purchase_price' placeholder='Purchase Price' class='form-control' />
                                    </div>
                                </div><div class='form-group'>
                                    <label  for="inputEmail3" class="col-sm-2 control-label"> Sell Price </label>

                                    <div class='col-sm-9'>
                                        <input type='text' id='form-field-1' name='sell_price' placeholder='Sell Price' class='form-control' />
                                    </div>
                                </div><div class='form-group'>
                                    <label  for="inputEmail3" class="col-sm-2 control-label"> Quantity </label>

                                    <div class='col-sm-9'>
                                        <input type='text' id='form-field-1' name='quantity' placeholder='Quantity' class='form-control' />
                                    </div>
                                </div><div class='form-group'>
                                    <label  for="inputEmail3" class="col-sm-2 control-label"> Details </label>

                                    <div class='col-sm-9'>
                                        <textarea id='editor' name='details' placeholder='Details' class='form-control'></textarea>
                                        <script>
                                            $(document).ready(function () {
                                                // create Editor from textarea HTML element with default set of tools
                                                $("#editor").kendoEditor({resizable: {
                                                        content: true,
                                                        toolbar: true
                                                    }});
                                            });
                                        </script>
                                    </div>
                                </div><div class="form-group">
                                    <div class="col-sm-offset-2 col-sm-10">
                                        <button type="submit"   onclick="javascript:return confirm('Do You Want Create/save These Record?')"  name="create" class="btn btn-info">Save</button>
                                        <button type="reset" class="btn btn-danger">Reset</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    <?php } ?>
                </div>
                <!-- // Widget END -->




                <!-- // Widget END -->
            </div>
        </div>
        <!-- // Content END -->

        <div class="clearfix"></div>
        <!-- // Sidebar menu & content wrapper END -->
        <?php include('include/footer.php'); ?>
        <!-- // Footer END -->
    </div>
    <!-- // Main Container Fluid END -->
    <!-- Global -->

    <?php
    echo $plugin->TableJs();
    echo $plugin->KendoJs();
    echo $plugin->FileUploadJs();
    ?>
</body>
</html>