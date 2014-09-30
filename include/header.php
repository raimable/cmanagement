
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-gb" lang="en-gb" dir="ltr" >
    <head>
        
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <title>Umuhuza Online</title> 

        <!-- General CSS Libraries -->
        <link rel="stylesheet" href="../css/templates.css" type="text/css" />
        <link rel="stylesheet" href="../css/style.css" type="text/css" />
        <link rel="stylesheet" href="../css/system.css" type="text/css" />
        <link rel="stylesheet" href="../css/modal.css" type="text/css" />

        <!-- Related to date and datetime chooser -->
        <script type="text/javascript" src="../js/jquery-1.2.6.min.js"></script>
        <script type="text/javascript" src="../js/jquery.dynDateTime.js"></script>
        <script type="text/javascript" src="../js/calendar-en.js"></script>
        <link rel="stylesheet" type="text/css" media="all" href="../css/calendar-win2k-cold-1.css"  />

        <!-- General JS Libraries -->
        <script src="../js/core.js" type="text/javascript"></script>
        <script src="../js/mootools-core.js" type="text/javascript"></script>
        <script src="../js/mootools-more.js" type="text/javascript"></script>
        <script src="../js/modal.js" type="text/javascript"></script>

        <!-- The Java script for auto filling administrative entities --> 
        <script src="../js/autofill.js" type="text/javascript"></script>

        <!-- To allow Users to use the calendar we have use the Compatible JQuery -->
        <!-- <script src="../js/jquery.js" type="text/javascript"></script> -->
        <script type="text/javascript">
            window.addEvent('domready', function() {
                new Fx.Accordion($$('div#panel-sliders.pane-sliders > .panel > h3.pane-toggler'), $$('div#panel-sliders.pane-sliders > .panel > div.pane-slider'), {onActive: function(toggler, i) {
                        toggler.addClass('pane-toggler-down');
                        toggler.removeClass('pane-toggler');
                        i.addClass('pane-down');
                        i.removeClass('pane-hide');
                        Cookie.write('jpanesliders_panel-sliders', $$('div#panel-sliders.pane-sliders > .panel > h3').indexOf(toggler));
                    }, onBackground: function(toggler, i) {
                        toggler.addClass('pane-toggler');
                        toggler.removeClass('pane-toggler-down');
                        i.addClass('pane-hide');
                        i.removeClass('pane-down');
                        if ($$('div#panel-sliders.pane-sliders > .panel > h3').length == $$('div#panel-sliders.pane-sliders > .panel > h3.pane-toggler').length)
                            Cookie.write('jpanesliders_panel-sliders', -1);
                    }, duration: 300, opacity: false, alwaysHide: true});
            });
        </script>
        <script type="text/javascript">
            <!--
            function do_delete(f)
            {
                var t = 0;
                var c = f['chkDel[]'];
                for (var i = 0; i < c.length; i++) {
                    c[i].checked ? t++ : null;
                }
                if (t != 0) {
                    var where_to = confirm("Are you sure that you want to delete the selected records?\n" +
                            "Once deleted you will not be able to undo the changes");
                    if (where_to == true)
                    {
                        document.forms['records'].submit();
                    }
                    else {
                        window.location = "index.php";
                    }
                }
                else {
                    alert('Please select the records to delete')
                }
            }
        </script>
        <script type="text/javascript">
            <!--
            function check() {
                window.open("check.php", "myWindow",
                        "status = 1, height = 150, width = 400, resizable = 0")
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
                jQuery("#dateDefault2").dynDateTime(); //defaults
                jQuery("#dateDefault3").dynDateTime(); //defaults
                jQuery("#dateDefault4").dynDateTime(); //defaults
                jQuery("#dateDefault5").dynDateTime(); //defaults
                jQuery("#dateDefault6").dynDateTime(); //defaults
                jQuery("#dateDefault7").dynDateTime(); //defaults
                jQuery("#dateDefault8").dynDateTime(); //defaults
                jQuery("#dateDefault9").dynDateTime(); //defaults
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
	
           <img src="../pages/header.jpg" alt="Welcome to Umuhuza" width="100%" height="80" />
        
        <div id="border-top" class="h_blue">

        </div>
        <div id="header-box">
            <div id="module-menu">

                <ul id="menu" >
                    <li class="node"><a href="#">Manage Users</a><ul>
                            <li class="node"><a href="../user/index.php">View Users </a></li>
                            <li class="node"><a href="../user/add.php">Add New user</a></li>
                            </ul>
                    </li>
                </ul>
                <ul id="menu" >
                    <li class="node"><a href="#">Manage user roles</a><ul>
                            <li class="node"><a href="../role/index.php">View roles </a></li>
                            <li class="node"><a href="../role/add.php">Add new role</a></li>
                            </ul>
                    </li>
                </ul>
                
                <ul id="menu" >
                    <li class="node"><a href="#">Manage customers</a><ul>
                            <li class="node"><a href="../customer/index.php">View customers </a></li>
                            <li class="node"><a href="../customer/add.php">Add New customer </a></li>
                           </ul>
                    </li>
                </ul>
                <ul id="menu" >
                    <li class="node"><a href="#">Manage Partners</a><ul>
                            <li class="node"><a href="../partner/index.php">View partners </a></li>
                            <li class="node"><a href="../partner/add.php">Add New partner </a></li>
                            </ul>
                    </li>
                </ul>
                <ul id="menu" >
                    <li class="node"><a href="#">Manage Service</a><ul>
                            <li class="node"><a href="../service/index.php">View Services </a></li>
                            <li class="node"><a href="../service/add.php">Add new service</a></li>
                            </ul>
                    </li>
                </ul>
                
                <ul id="menu" >
                    <li class="node"><a href="../consumption/index.php">Manage Consumption</a>
                    </li>
                </ul>
                <ul id="menu" >
                    <li class="node"><a href="../customer/upgradeContract.php">Upgrade Customers' Contract</a>
                    </li>
                </ul>
            </div>
            <div id="module-status">
                <span class="viewsite"><a href="#">My Profile</a></span>
                <span class="loggedin-users">User : <?php echo ' <strong> '.$_COOKIE["username"]. '</strong> '; ?><a href="../pages/logout.php">Logout</a></span>
            </div>
            <div class="clr"></div>

        </div>
        <div id="content-box">
            <div id="element-box">

                <div id="system-message-container">
                </div>
                <div class="m">
                    <div class="adminform">
