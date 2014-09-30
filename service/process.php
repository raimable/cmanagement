<?php

include '../special/formvalidator.php';
include '../../include_dao.php';
session_start();
$daoFactory = new DAOFactory();
$act = new Action();

if (isset($_GET['action'])) {
    $action = $_GET['action'];
    switch ($action) {
        case 1: {
                $show_form = true;
                $validator = new FormValidator();
                $validator->addValidation("action", "req", "The action Name is Required!");
                $validator->addValidation("created_on", "req", "The Creation date is Required!");
                $validator->addValidation("scheduled_on", "req", "The scheduled date is required!");

                if ($validator->ValidateForm()) {
                    $act->title = $_POST['action'];
                    $act->createdOn = $_POST['created_on'];
                    $act->scheduleOn = $_POST['scheduled_on'];
                    $act->description = $_POST['description'];

                    try {
                        //insert the action data
                        $daoFactory->getActionsDAO()->insert($act);
                        $_SESSION['op_message'] = '<div class="alert-message success"><strong>Your new Action is saved</strong></div>';
                        header('location:index.php');
                    } catch (Exception $ex) {
                        $_SESSION['error_message'] = '<div class="alert-message error"><strong>' . $ex->getTraceAsString() . '</strong></div>';
                        header('location:add.php');
                    }
                } else {
                    $_SESSION['error_message'] = '<div class="alert-message error"><strong>Errors: </strong>';
                    $error_hash = $validator->GetErrors();
                    foreach ($error_hash as $inpname => $inp_err) {
                        echo '<span style="color: #ff0000;"><li>' . $inp_err . '</li></span>';
                        $_SESSION['error_message'] .= ', ' . $inp_err;
                    }
                    $_SESSION['error_message'] .= '</div>';
                    header('location:add.php');
                }
            }
            break;
        case 2: {
                $show_form = true;
                $validator = new FormValidator();
                $validator->addValidation("action", "req", "The action Name is Required!");
                $validator->addValidation("created_on", "req", "The Creation date is Required!");
                $validator->addValidation("scheduled_on", "req", "The scheduled date is required!");

                if ($validator->ValidateForm()) {

                    $act->title = $_POST['action'];
                    $act->createdOn = $_POST['created_on'];
                    $act->scheduleOn = $_POST['scheduled_on'];
                    $act->description = $_POST['description'];
                    
                    $act->id = $_GET['act'];
                    try {
                            $daoFactory->getActionsDAO()->update($act);
                            $_SESSION['op_message'] = '<div class="alert-message success"><strong>The action is Changed.</strong></div>';
                            header('location:index.php');
                    } catch (Exception $ex) {
                        $_SESSION['error_message'] = '<div class="alert-message error"><strong>' . $ex->getMessage() . '</strong></div>';
                        header("Location:" . $_SERVER['HTTP_REFERER']);
                    }
                } else {
                    $_SESSION['error_message'] = '<div class="alert-message error"><strong>Errors: </strong>';
                    $error_hash = $validator->GetErrors();
                    foreach ($error_hash as $inpname => $inp_err) {
                        echo '<span style="color: #ff0000;"><li>' . $inp_err . '</li></span>';
                        $_SESSION['error_message'] .= ', ' . $inp_err;
                    }
                    $_SESSION['error_message'] .= '</div>';
                    header("Location:" . $_SERVER['HTTP_REFERER']);
                }
            }
            break;
        case 3: {
                if (isset($_POST["chkDel"])) {
                    //create an array to record to be deleted
                    $del_article = array();
                    echo '<ul>';
                    $i = 0;
                    $j = 0;
                    for ($i = 0; $i < count($_POST["chkDel"]); $i++) {
                        if ($_POST["chkDel"][$i] != "") {
                            try {
                                $daoFactory->getActionsDAO()->delete($_POST["chkDel"][$i]);
                                $j++;
                                $_SESSION['op_message'] = '<div class="alert-message success"><strong>' . $j . ' Action deleted!</strong></div>';
                                
                                header('location:index.php');
                            } catch (Exception $exc) {
                                echo $exc->getMessage();
                            }
                        }
                    }
                } else {
                    header('location:index.php');
                }
            }
            break;
            ;
    }
}
?>
