<?php $table = "product"; ?><?php
include('class/auth.php');
include('plugin/plugin.php');
$plugin = new cmsPlugin();
?>
<!doctype html>
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
        ?>
    </head>
    <body class="">
        <?php
        include('include/topnav.php');
        include('include/mainnav.php');
        ?>
        <div id="content">
            <h1 class="content-heading bg-white border-bottom">Product Data</h1>
            <div class="innerAll bg-white border-bottom">
                <ul class="menubar">
                    <li><a href="product.php">Create New Product</a></li>
                    <li class="active"><a href="#">Product Data List</a></li>
                </ul>
            </div>
            <div class="innerAll spacing-x2">
                <div class="col-sm-12" id="product_30"></div>
            </div>
        </div>
        <!-- // Product END -->

        <div class="clearfix"></div>
        <!-- // Sidebar menu & Product wrapper END -->

        <?php include('include/footer.php'); ?>
        <!-- // Footer END -->
    </div>
    <!-- // Main Container Fluid END -->
    <!-- Global -->
    <script id="edit_product" type="text/x-kendo-template">
        <a class="k-button k-button-icontext k-grid-edit" href="product.php?edit=#= id#"><span class="k-icon k-edit"></span>Edit</a>
    </script>
    <script id="delete_product" type="text/x-kendo-template">
        <a class="k-button k-button-icontext k-grid-delete" onclick="javascript:deleteClick(#= id #);" ><span class="k-icon k-delete"></span>Delete</a>
    </script>        
    <script type="text/javascript">
        function deleteClick(product_id) {
            var c = confirm("Do you want to delete?");
            if (c === true) {
                $.ajax({
                    type: "POST",
                    dataType: "json",
                    url: "./json_data/banner_list.php",
                    data: {id: product_id, table: "product", acst: 3},
                    success: function (result) {
                        if (result == 1)
                        {
                            location.reload();
                        }
                        else
                        {
                            $(".k-i-refresh").click();
                        }
                    }
                });
            }
        }

    </script>
    <script type="text/javascript">
        jQuery(document).ready(function () {
            var postarray = {"id": 1};
            var dataSource = new kendo.data.DataSource({
                pageSize: 5,
                transport: {
                    read: {
                        url: "./json_data/banner_list.php",
                        type: "POST",
                        data:
                                {
                                    "acst": 1, //action status sending to json file
                                    "table": "product_view",
                                    "cond": 0,
                                    "multi": postarray

                                }
                    }
                },
                autoSync: false,
                schema: {
                    data: "data",
                    total: "data.length",
                    model: {
                        id: "id",
                        fields: {
                            id: {nullable: true}, name: {type: "string"}, brand_id: {type: "string"}, product_category_id: {type: "string"}, photo_thumble: {type: "string"}, photo_1: {type: "string"}, photo_2: {type: "string"}, photo_3: {type: "string"}, photo_4: {type: "string"}, purchase_price: {type: "string"}, sell_price: {type: "string"}, quantity: {type: "string"}, product_code: {type: "string"}, manufacturer: {type: "string"},
                            date: {type: "string"}
                        }
                    }
                }
            });
            jQuery("#product_30").kendoGrid({
                dataSource: dataSource,
                filterable: true,
                pageable: {
                    refresh: true,
                    input: true,
                    numeric: false,
                    pageSizes: true,
                    pageSizes: [5, 10, 20, 50],
                },
                sortable: true,
                groupable: true,
                columns: [{field: "name", title: "Name",width: "200px"},
                    {field: "brand_id", title: "Brand ID"},
                    {field: "product_category_id", title: "Product Category ID"},
                    {field: "photo_thumble", title: "Photo thumble"},
                    {field: "photo_1", title: "photo 1"},
                    {field: "photo_2", title: "photo 2"},
                    {field: "photo_3", title: "photo 3"},
                    {field: "photo_4", title: "photo 4"},
                    {field: "purchase_price", title: "Purchase Price"},
                    {field: "sell_price", title: "Sell Price"},
                    {field: "quantity", title: "Quantity"},
                    {field: "product_code", title: "Product Code"},
                    {field: "manufacturer", title: "Manufacturer"},
//                    {field: "date", title: "Record Added", width: "100px"},
                    {
                        title: "Edit",width: "80px",
                        template: kendo.template($("#edit_product").html())
                    },
                    {
                        title: "Delete",width: "90px",
                        template: kendo.template($("#delete_product").html())
                    }
                ]
            });
        });

    </script>    
    <?php
    echo $plugin->TableJs();
    echo $plugin->KendoJS();
    ?>

</body>
</html>