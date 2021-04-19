<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= base_url() ?>static/style.css">
    <title>PHP | Products</title>
</head>
<body>
    <header>
        <h2>Trader's Store</h2>
    </header>
    <section>
        <h3>Product Listing</h3>
            <table>
            <thead>
                <tr>
                    <th>Manufacturer</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Date Added</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
<?php       if($products->get()->stored->id != NULL){
                $manufacturers->get();
                $products->get();
                foreach($products AS $product){ 
                    foreach($manufacturers AS $manufacturer){
                        if($manufacturer->id == $product->manufacturer)
                            $product->manufacturer = $manufacturer->name;
                    } ?>
                    <tr>
                        <td><?= $product->manufacturer ?></td>
                        <td class="name"><a href="products/edit/<?= $product->id ?>"><?= $product->name ?></a></td>
                        <td class="price">Php <?= $product->price ?></td>
                        <td class="date"><?= DATE("F j Y", STRTOTIME($product->created_at)) ?></td>
                        <td class="action">
                            <a href="products/edit/<?= $product->id ?>" class="edit">Edit</a>
                            <a href="products/remove/<?= $product->id ?>" class="remove">Remove</a>
                        </td>
                    </tr>
<?php           }
            }
            else{ ?>
                <tr>
                    <td colspan="5">No Data Found</td>
                </tr>
<?php       } ?>
            </tbody>
        </table>
        <form action="create" method="POST">
            <input type="hidden" name="<?=$this->security->get_csrf_token_name();?>" value="<?=$this->security->get_csrf_hash();?>" />
            <h3>Add a new product</h3>
            <label>Manufacturer/Brand 
                <select name="manufacturer">
                    <option value=""></option>
<?php           $manufacturers->get();
                foreach($manufacturers AS $manufacturer){ ?>
                    <option value=<?= $manufacturer->id ?>><?= $manufacturer->name ?></option>
<?php           } ?>
                </select>
            </label>
<?php if($this->session->userdata("error_manufacturer") != NULL){ echo "".$this->session->userdata("error_manufacturer").""; $this->session->unset_userdata("error_manufacturer");}?>
            <label>Name: <input type="text" name="name" id="name" value="<?= $this->session->userdata('name')?>"></label>
<?php if($this->session->userdata("error_name") != NULL){ echo "".$this->session->userdata("error_name").""; $this->session->unset_userdata("error_name");}?>
            <label>Price: <input type="text" name="price" id="price" value="<?= $this->session->userdata('price')?>"></label>
<?php if($this->session->userdata("error_price") != NULL){ echo "".$this->session->userdata("error_price").""; $this->session->unset_userdata("error_price");}?>
            <label>Description: <textarea name="description" id="description"><?= $this->session->userdata('description')?></textarea></label>
<?php if($this->session->userdata("error_description") != NULL){ echo "".$this->session->userdata("error_description").""; $this->session->unset_userdata("error_description");}?>
            <input type="submit" class="create" value="Create">
        </form>
<?php
    $this->session->unset_userdata('name');
    $this->session->unset_userdata('description');
    $this->session->unset_userdata('price');
?>
    </section>
</body>
</html>