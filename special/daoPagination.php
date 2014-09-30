<?php

class DAOPagination {

    var $php_self;
    var $result_query = "";
    var $num_of_record = 0;
    var $record_per_page = 0;
    var $num_of_pages = 0;

    function DAOPagination($result_query, $record_per_page) {
        $this->result_query = $result_query;
        $this->num_of_record = count($result_query);
        $this->record_per_page = $record_per_page;
        $this->num_of_pages = ceil($this->num_of_record / $record_per_page);
        $this->php_self = htmlspecialchars($_SERVER['PHP_SELF']);
    }

    //to display the pages with no appended category
    function displayLinks() {

        echo '<div class="button2-right off"><div class="start"><span> <a href="?page=1">First
            </a></span></div></div><div class="button2-left"><div class="page">';
        if ($this->num_of_pages < 5) {
            if (isset($_GET['page']) && $_GET['page'] > 1) {
                echo '<a href="?page=' . (($_GET['page']) - 1) . '">Prev</a>';
            }
            for ($i = 1; $i <= $this->num_of_pages; $i++) {
                if (isset($_GET['page'])) {
                    if ($i != $_GET['page']) {
                        echo ' <a href="' . $this->php_self . '?page=' . $i . '">' . $i . '</a> ';
                    } else {
                        echo ' <span>' . $i . '</span> ';
                    }
                } else {
                    if ($i != 1) {
                        echo ' <a href="' . $this->php_self . '?page=' . $i . '">' . $i . '</a> ';
                    } else {
                        echo ' <span>' . $i . '</span> ';
                    }
                }
            }
            if (isset($_GET['page']) && $_GET['page'] > 1) {
                echo '<a href="?page=' . (($_GET['page']) + 1) . '">Prev</a>';
            }
            echo '</div></div> <div class="button2-left"><div class="end"><a href="?page=' . $i . '">Last</a></div></div>';
        } else {
            if (isset($_GET['page']) && $_GET['page'] > 1) {
                echo '<a href="?page=' . (($_GET['page']) - 1) . '">Prev</a>';
            }
            if (isset($_GET['page'])) {
                if ($_GET['page'] < 5) {
                    for ($i = 1; $i <= 5; $i++) {
                        if ($i != 1) {
                            echo ' <a href="' . $this->php_self . '?page=' . $i . '">' . $i . '</a> ';
                        } else {
                            echo ' <span>' . $i . '</span> ';
                        }
                    }
                } else {
                    $display_from = $_GET['page'] - 3;
                    $display_to = $_GET['page'] + 2;
                    for ($i = 1; $i <= $this->num_of_pages && $i <= $display_to; $i++) {
                        if ($i > $display_from) {
                            if ($i != 1) {
                                echo ' <a href="' . $this->php_self . '?page=' . $i . '">' . $i . '</a> ';
                            } else {
                                echo ' <span>' . $i . '</span> ';
                            }
                        }
                    }
                }
            } else {
                for ($i = 1; $i <= 5; $i++) {
                    if ($i != 1) {
                        echo ' <a href="' . $this->php_self . '?page=' . $i . '">' . $i . '</a> ';
                    } else {
                        echo ' <span>' . $i . '</span> ';
                    }
                }
            }
            if (isset($_GET['page']) && $_GET['page'] > 1 && $_GET['page'] < $this->num_of_pages ) {
                echo '<a href="?page=' . (($_GET['page']) + 1) . '">Next</a>';
            }
            echo '</div></div> <div class="button2-left"><div class="end"><a href="?page=' . $this->num_of_pages . '">Last</a></div></div>';
        }
    }

    function displayPages() {
        if (isset($_GET['page'])) {
            echo ' <div class="limit">page ' . $_GET['page'] . ' of ' . $this->num_of_pages . '</div>';
        } else {
            echo ' <div class="limit"> page 1 of ' . $this->num_of_pages . '</div>';
        }
    }

}

?>
