<?php

@session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $_func = $_POST["func"];
} else {
    $_func = $_GET["func"];
}

//$controller = new pressController();
//switch ($_func) {
//    case "delete":
//        echo $controller->delete($_GET["seq"]);
//        break;
//    case "preview":
//        echo $controller->preview($_GET["filename"]);
//        break;
//}

class newsController {

    public function __construct() {
        
    }

    public function dataTable() {
        $service = new newsService();
        $_dataTable = $service->dataTable();
        if ($_dataTable != NULL) {
            foreach ($_dataTable as $key => $value) {
                $_dataTable[$key]['d_date'] = $this->ConvertDate($_dataTable[$key]['d_date']);
            }

            return $_dataTable;
        } else {
            return NULL;
        }
    }

    public function dataTable_sel($seq_i) {
        $service = new newsService();
        $_dataTable = $service->query_dataTable($seq_i);
        if ($_dataTable != NULL) {
            foreach ($_dataTable as $key => $value) {
                $_dataTable[$key]['d_date'] = $this->ConvertDate($_dataTable[$key]['d_date']);
            }
            return $_dataTable;
        } else {
            return NULL;
        }
    }

    public function data_pic($seq) {
        $service = new newsService();
        $_datapic = $service->dataTable_pic($seq);
        if ($_datapic != NULL) {

            return $_datapic;
        } else {
            return NULL;
        }
    }

    public function dataTable_type($type_i) {
        $service = new newsService();
        $_dataTable = $service->dataTable_type($type_i);
        if ($_dataTable != NULL) {
            foreach ($_dataTable as $key => $value) {
                $_dataTable[$key]['d_date'] = $this->ConvertDate($_dataTable[$key]['d_date']);
            }
            return $_dataTable;
        } else {
            return NULL;
        }
    }

    private function ConvertDate($date) {




        $month_th = array(1 => 'มกราคม', 'กุมภาพันธ์', 'มีนาคม', 'เมษายน', 'พฤษภาคม', 'มิถุนายน', 'กรกฎาคม', 'สิงหาคม', 'กันยายน', 'ตุลาคม', 'พฤศจิกายน', 'ธันวาคม');
        $month_en = array(1 => 'January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December');
        $yyyy = substr($date, 0, 4); //yyyy
        $mm = substr($date, 5, 2);
        $dd = substr($date, 8, 2);
        $day = date('D', strtotime($yyyy . '-' . $mm . '-' . $dd));

        if (strtoupper($_SESSION["main_lan"]) == "EN") {
            return $day." ".$dd . " " . $month_en[(int) $mm] . " " . $yyyy;
        } else {
            return $dd . " " . $month_th[(int) $mm] . " " . $yyyy;
        } 
    }

}
