<?php
require_once("../model/model.php");
require_once("../../role/model/model.php");
session_start();
    if($_SESSION['users']['role_id'] !== '1'){
        header('Location: /webbanhang/user/login');
    }
?>

<?php 
require_once("../../layout/header.php");
require_once("../../layout/sidebar.php"); 
require_once("../../layout/header_desktop.php");
?>

            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <!-- DATA TABLE -->
                                <div class="card">
                                  <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">
                                    <div class="card-header">
                                        <strong>Update User</strong>
                                    </div>
                                    <div class="card-body card-block">

                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="text-input" class=" form-control-label">User ID</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input name="userID" value="<?php
                                                    if(!empty($idUser)){
                                                        echo $idUser[0]['id'];
                                                    }?>" type="text" id="text-input"  placeholder="Text" class="form-control" readonly>
                                                </div>
                                            </div>

                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="text-input" class=" form-control-label">User Name</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input name="username" value="<?php
                                                    if(!empty($idUser)){
                                                        echo $idUser[0]['username'];
                                                    }?>" type="text" id="text-input"  placeholder="Text" class="form-control" readonly>
                                                </div>
                                            </div>
                                            
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="select" class=" form-control-label">Role</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <select name="role" id="select" class="form-control">
                                                    <?php
                                                        foreach ($listRole as $item){
                                                            echo "<option value=".$item['id'].">"
                                                                .$item["role_name"].
                                                            "</option>";
                                                        echo "<br>";
                                                        }
                                                    ?>
                                                    </select>
                                                </div>
                                            </div>
                                    </div>
                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary btn-sm" name="updateUser" value="update">
                                            Save
                                        </button>
                                    </div>
                                  </form>
                                </div>
                            
                                <!-- END DATA TABLE -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <?php require_once("../../layout/footer.php");?>