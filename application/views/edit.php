<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= base_url() ?>static/edit.css">
    <title>PHP | Products</title>
</head>
<body>
    <section>
        <h2><?= $get_data->name ?></h2>
        <a class="back" href="<?= base_url() ?>">Go back to Product Listing</a>
        <form action="<?= base_url() ?>update/<?= $get_data->id ?>" method="POST">
            <input type="hidden" name="<?=$this->security->get_csrf_token_name();?>" value="<?=$this->security->get_csrf_hash();?>" />
            <label>Manufacturer/Brand 
                <select name="manufacturer">
<?php           $manufacturer_name = "";
                $manufacturers->get();
                foreach($manufacturers AS $manufacturer){
                        if($manufacturer->id == $get_data->manufacturer)
                            $manufacturer_name = $manufacturer->name;
                } ?>
                    <option value="<?= $get_data->manufacturer ?>"><?= $manufacturer_name ?></option>
<?php           $manufacturers->get();
                foreach($manufacturers AS $manufacturer){ ?>
                    <option value=<?= $manufacturer->id ?>><?= $manufacturer->name ?></option>
<?php           } ?>
                </select>
<?php if($this->session->userdata("error_manufacturer") != NULL){ echo "".$this->session->userdata("error_manufacturer").""; $this->session->unset_userdata("error_manufacturer");}?>
            </label>
            <label>Name: <input type="text" name="name" id="name" value="<?= $get_data->name ?>"></label>
<?php if($this->session->userdata("error_name") != NULL){ echo "".$this->session->userdata("error_name").""; $this->session->unset_userdata("error_name");}?>
            <label>Price: <input type="text" name="price" id="price" value="<?= $get_data->price ?>"></label>
<?php if($this->session->userdata("error_price") != NULL){ echo "".$this->session->userdata("error_price").""; $this->session->unset_userdata("error_price");}?>
            <label>Description: <textarea name="description" id="description"><?= $get_data->description ?></textarea></label>
<?php if($this->session->userdata("error_description") != NULL){ echo "".$this->session->userdata("error_description").""; $this->session->unset_userdata("error_description");}?>
            <input type="submit" class="update" value="Update">
            <a class="delete" href="<?= base_url() . "products/remove/" . $get_data->id ?>">Delete</a>
<?php if($this->session->userdata("message") != NULL){ echo "<p class='message'>".$this->session->userdata("message")."</p>"; $this->session->unset_userdata("message");}?>
        </form>
    </section>
</body>
</html>