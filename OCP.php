<?php
class httpUnit{
    protected $AnalysisData = null;

    public function setAnalysisData($AnalysisData){
        $this->AnalysisData = new $AnalysisData;
    }

    public function analysis($type){
        $AnalysisData = $this->AnalysisData;
        $AnalysisData->analysis($type);
    }

    public function action($act){
        $this->AnalysisData->$act();
    }
}
/*解析数据接口，扩展的时候只要添加，XXXAnalysisDate类就可以了*/
interface AnalysisData{
    public function analysis($type);
}
class JsonAnalysisDate implements AnalysisData{
    public function analysis($type) {
        echo $type;
    }

    public function action(){
        echo "\n\r action";
    }
}
class XmlAnalysisDate implements AnalysisData{
    public function analysis($type) {
        echo $type;
    }
}

$http = new httpUnit();
$http->setAnalysisData('JsonAnalysisDate');
$http->analysis('json');
$http->action('action');