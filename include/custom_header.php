<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-gb" lang="en-gb" dir="ltr" >
    <head>
        <?php
        include '../../../include_dao.php';
        $daoFactory = new DAOFactory();
        session_start();
        if (isset($_SESSION['user']) && $daoFactory->getUserDAO()->load($_SESSION['user'])->role == 'finance_manager') {
        } else {
            header('location:../../../../index.php');
        }
        $root_url = 'http://localhost/churchMIS/finance_module/finance';
        $login_url = 'http://localhost/churchMIS/index.php';
        ?>
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <title>Easy Church - Finance</title>
        <link href="/j/administrator/templates/bluestork/favicon.ico" rel="shortcut icon" type="image/vnd.microsoft.icon" />

        <!-- General CSS Libraries -->
        <link rel="stylesheet" href="<?php echo $root_url; ?>/css/templates.css" type="text/css" />
        <link rel="stylesheet" href="<?php echo $root_url; ?>/css/style.css" type="text/css" />
        <link rel="stylesheet" href="<?php echo $root_url; ?>/css/system.css" type="text/css" />
        <link rel="stylesheet" href="<?php echo $root_url; ?>/css/modal.css" type="text/css" />

        <!-- Related to date and datetime chooser -->
        <script type="text/javascript" src="<?php echo $root_url; ?>/js/jquery-1.2.6.min.js"></script>
        <script type="text/javascript" src="<?php echo $root_url; ?>/js/jquery.dynDateTime.js"></script>
        <script type="text/javascript" src="<?php echo $root_url; ?>/js/calendar-en.js"></script>
        <link rel="stylesheet" type="text/css" media="all" href="<?php echo $root_url; ?>/css/calendar-win2k-cold-1.css"  />

        <!-- General JS Libraries -->
        <script src="<?php echo $root_url; ?>/js/core.js" type="text/javascript"></script>
        <script src="<?php echo $root_url; ?>/js/mootools-core.js" type="text/javascript"></script>
        <script src="<?php echo $root_url; ?>/js/mootools-more.js" type="text/javascript"></script>
        <script src="<?php echo $root_url; ?>/js/modal.js" type="text/javascript"></script>
        <script src="<?php echo $root_url; ?>/js/autofill.js" type="text/javascript"></script>

        <!-- To allow Users to use the calendar we have use the Compatible JQuery -->
        <!-- <script src="../js/jquery.js" type="text/javascript"></script> -->
        <script type="text/javascript">
            window.addEvent('domready', function(){ new Fx.Accordion($$('div#panel-sliders.pane-sliders > .panel > h3.pane-toggler'), $$('div#panel-sliders.pane-sliders > .panel > div.pane-slider'), {onActive: function(toggler, i) {toggler.addClass('pane-toggler-down');toggler.removeClass('pane-toggler');i.addClass('pane-down');i.removeClass('pane-hide');Cookie.write('jpanesliders_panel-sliders',$$('div#panel-sliders.pane-sliders > .panel > h3').indexOf(toggler));},onBackground: function(toggler, i) {toggler.addClass('pane-toggler');toggler.removeClass('pane-toggler-down');i.addClass('pane-hide');i.removeClass('pane-down');if($$('div#panel-sliders.pane-sliders > .panel > h3').length==$$('div#panel-sliders.pane-sliders > .panel > h3.pane-toggler').length) Cookie.write('jpanesliders_panel-sliders',-1);},duration: 300,opacity: false,alwaysHide: true}); });
        </script>
        <script type="text/javascript">
            <!--
            function do_delete(f)
            {
                var t=0;
                var c=f['chkDel[]'];
                for(var i=0;i<c.length;i++){
                    c[i].checked?t++:null;
                }
                if(t!=0){
                    var where_to= confirm("Are you sure that you want to delete the selected records?\n"+
                        "Once deleted you will not be able to undo the changes");
                    if (where_to== true)
                    {
                        document.forms['records'].submit();
                    }
                    else{
                        window.location="index.php";
                    }
                }
                else{
                    alert('Please select the records to delete')
                }
            }
        </script>
        <script type="text/javascript">
            <!--
            function check() {
                window.open( "check.php", "myWindow", 
                "status = 1, height = 150, width = 400, resizable = 0" )
            }
        </script>
        <script type="text/javascript">
            //for the date fieldds
            jQuery(document).ready(function() {
	
                jQuery("#multi input").dynDateTime({				
                    button: ".next()" //next sibling
                }); 
						
            });
            
            //for datetime function fields
            jQuery(document).ready(function() {
                jQuery("#dateTimeCustom").dynDateTime({
                    showsTime: true,
                    ifFormat: "%Y-%m-%d %H:%M",
                    daFormat: "%l;%M %p, %e %m,  %Y",
                    align: "TL",
                    electric: false,
                    singleClick: true,
                    displayArea: ".siblings('.dtcDisplayArea')",
                    button: ".next()" //next sibling
                });
            });
            
            //Case for no date option
            jQuery(document).ready(function() {
                jQuery("#dateDefault").dynDateTime(); //defaults
                jQuery("#dateDefault1").dynDateTime(); //defaults
            });
        </script>
        <!--[if IE 7]>
        <link href="templates/bluestork/css/ie7.css" rel="stylesheet" type="text/css" />
        <![endif]-->

        <!--[if gte IE 8]>
        <link href="templates/bluestork/css/ie8.css" rel="stylesheet" type="text/css" />
        <![endif]-->
    </head>
    <body id="minwidth-body">
        <div id="border-top" class="h_blue">
            <span class="logo"><a href="pop.html"><img src="templates/bluestork/images/logo.png" alt="EasyChurch 0.1" /></a></span>
            <h2><span class="title">Easy Church 0.1</span></h2>

        </div>
        <div id="header-box">
            <div id="module-menu">
                <ul id="menu" >
                    <li class="node"><a href="<?php echo $root_url; ?>/main/index.php">Main</a><ul>
                            <li><a class="icon-16-cpanel" href="<?php echo $root_url; ?>/main/index.php">Main Page</a></li>
                            <li class="separator"><span></span></li>
                            <li><a class="icon-16-profile" href="<?php echo $root_url; ?>/profile/index.php">My Profile</a></li
                            <li class="separator"><span></span></li>
                            <li><a class="icon-16-logout" href="<?php echo $login_url; ?>">Logout</a></li>

                        </ul>
                    </li>
                    <li><a href="<?php echo $root_url; ?>/income/index.php">Income</a><ul>
                            <li><a href="<?php echo $root_url; ?>/income/index.php">Income Manager</a></li>
                            <li><a href="<?php echo $root_url; ?>/income/add.php">Register Income</a></li>
                            <li><a href="<?php echo $root_url; ?>/income_category/">Income Categories</a></li>
                            <li><a href="<?php echo $root_url; ?>/caution/">Caution on wedding</a></li>
                            <li class="node"><a href="">Fundraising </a>
                                <ul class="menu-component" id="menu-com-banners">
                                    <li><a href="../action/">Actions</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li class="node"><a href="#">Outflow</a><ul>

                            <li><a href="<?php echo $root_url; ?>/out/index.php">Outflow Manager</a></li>
                            <li><a href="<?php echo $root_url; ?>/out/add.php">Register Outflow</a></li>
                            <li><a href="<?php echo $root_url; ?>/outflow_category/">Outflow categories</a></li>
                        </ul>
                    </li>
                    <li class="node"><a href="#">Loans</a><ul>
                            <li><a class="icon-16-help" href="<?php echo $root_url; ?>/loan/index.php">All Loans</a></li>
                            <li><a class="icon-16-help-forum" href="<?php echo $root_url; ?>/loan/add.php">Give Loan</a></li>
                            <li><a class="icon-16-help-docs" href="<?php echo $root_url; ?>/loan_refund/index.php">Loan Refund</a></li>
                        </ul>
                    </li>
                    <li class="node"><a href="#">Report</a><ul>
                            <li class="node"><a href="#">Daily activities</a><ul>
                                    <li><a class="icon-16-help" href="<?php echo $root_url; ?>/report/daily/income/index.php">Income</a></li>
                                    <li class="separator"><span></span></li>
                                    <li><a class="icon-16-help-forum" href="<?php echo $root_url; ?>/report/daily/outflow/index.php">Outflow</a></li>
                                    <li><a class="icon-16-help-docs" href="<?php echo $root_url; ?>/report/daily/loan/index.php" >Loan</a></li>
                                    <li><a class="icon-16-help-docs" href="#" >Loan Refund</a></li>
                                </ul></li>
                            <li class="separator"><span></span></li>
                            <li class="node"><a href="#" >Weekly Report</a><ul>
                                    <li><a class="icon-16-help" href="<?php echo $root_url; ?>/report/weekly/income/index.php">Income</a></li>
                                    <li class="separator"><span></span></li>
                                    <li><a class="icon-16-help-forum" href="<?php echo $root_url; ?>/report/weekly/outflow/index.php">Outflow</a></li>
                                    <li><a class="icon-16-help-docs" href="<?php echo $root_url; ?>/report/weekly/loan/index.php">Loan</a></li>
                                    <li><a class="icon-16-help-docs" href="#">Loan Refund</a></li>
                                </ul>
                            </li>
                            <li class="node"><a href="#" >Monthly Report</a>
                                <ul>
                                    <li><a class="icon-16-help" href="<?php echo $root_url; ?>/report/monthly/income/index.php">Income</a></li>
                                    <li class="separator"><span></span></li>
                                    <li><a class="icon-16-help-forum" href="<?php echo $root_url; ?>/report/monthly/outflow/index.php" >Outflow</a></li>
                                    <li><a class="icon-16-help-docs" href="<?php echo $root_url; ?>/report/monthly/loan/index.php">Loan</a></li>
                                    <li><a class="icon-16-help-docs" href="#">Loan Refund</a></li>
                                </ul>
                            </li>
                            <li class="node"><a class="icon-16-help-docs" href="#" >Annual Report</a>
                                <ul>
                                    <li><a class="icon-16-help" href="<?php echo $root_url; ?>/report/annual/income/index.php">Income</a></li>
                                    <li class="separator"><span></span></li>
                                    <li><a class="icon-16-help-forum" href="<?php echo $root_url; ?>/report/annual/outflow/index.php" >Outflow</a></li>
                                    <li><a class="icon-16-help-docs" href="<?php echo $root_url; ?>/report/annual/loan/index.php">Loan</a></li>
                                    <li><a class="icon-16-help-docs" href="#">Loan Refund</a></li>
                                </ul>
                            </li>
                            <li><a class="icon-16-help-docs" href="<?php echo $root_url; ?>/report/custom/criteria.php" >Custom Report</a></li>
                        </ul>
                    </li>
                    <li class="node"><a href="#">Help</a><ul>
                            <li><a class="icon-16-help" href="#">About</a></li>
                            <li class="separator"><span></span></li>
                            <li><a class="icon-16-help-forum" href="#" >Content</a></li>
                            <li><a class="icon-16-help-docs" href="#" >Online Help</a></li>
                            <li class="separator"><span></span></li>
                        </ul>
                    </li>
                </ul>

            </div>
            <div id="module-status">
                <span class="backloggedin-users">User: <?php echo $daoFactory->getUserDAO()->load($_SESSION['user'])->username; ?></span>
                <span class="viewsite"><a href="<?php echo $root_url; ?>/profile/index.php">My Profile</a></span><span class="logout"><a href="<?php echo $login_url; ?>">Logout</a></span>		</div>
            <div class="clr"></div>

        </div>
        <div id="content-box">
            <div id="element-box">

                <div id="system-message-container">
                </div>
                <div class="m">
                    <div class="adminform">
                        <div class="main-left">
                            <ol class="tree">
                                <li>
                                    <label for="folder2">Income</label><input type="checkbox" id="folder2">
                                        <ol>
                                            <li class="file"><a href="<?php echo $root_url; ?>/income/index.php">Income Manager</a></li>
                                            <li class="file"><a href="<?php echo $root_url; ?>/income/add.php">Register Income</a></li>
                                            <li class="file"><a href="<?php echo $root_url; ?>/income_category/">Income Categories</a></li>
                                            <li class="file"><a href="<?php echo $root_url; ?>/caution/">Caution on wedding</a></li>
                                        </ol>
                                </li>
                                <li>
                                    <label for="folder3">Outflow</label> <input type="checkbox" id="folder3">
                                        <ol>
                                            <li class="file"><a href="<?php echo $root_url; ?>/out/index.php">Outflow Manager</a></li>
                                            <li class="file"><a href="<?php echo $root_url; ?>/out/add.php">Register Outflow</a></li>
                                            <li class="file"><a href="<?php echo $root_url; ?>/outflow_category/index.php">Outflow Categories</a></li>
                                        </ol>
                                </li>
                                <li>
                                    <label for="folder3">Loans</label> <input type="checkbox" id="folder3">
                                        <ol>
                                            <li class="file"><a href="<?php echo $root_url; ?>/loan/index.php">Loan Manager</a></li>
                                            <li class="file"><a href="<?php echo $root_url; ?>/loan/add.php">Give Loan</a></li>
                                            <li class="file"><a href="<?php echo $root_url; ?>/loan_refund/index.php">Loan Refund</a></li>
                                        </ol>
                                </li>
                                <li>
                                    <label for="folder3">Report</label> <input type="checkbox" id="folder3">
                                        <ol>
                                            <li class="file"><a href="<?php echo $root_url; ?>/report/custom/criteria.php">Report Parameters</a></li>
                                        </ol>
                                </li>
                            </ol>
                        </div>