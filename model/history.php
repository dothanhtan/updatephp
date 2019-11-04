<?php 
class History {
    #region properties
    var $fromYear;
    var $toYear;
    var $class;
    var $place;
    #endregion

    #region construct_function
    function __construct($fromYear, $toYear, $class, $place) {
        $this->fromYear = $fromYear;
        $this->toYear = $toYear;
        $this->class = $class;
        $this->place = $place;
    }
    #endregion


    #region mock_data
    /**
     * Get all history learning in database
     */
    static function getList() {
        $listHistories = array();
        array_push($listHistories, new History(2004, 2009,"1/2 - 5/2", "Tieu hoc Thanh Toan"));
        array_push($listHistories, new History(2009, 2010,"6/2", "THCS Thuy Thanh"));
        array_push($listHistories, new History(2010, 2013,"7/1 - 9/1", "THCS Thuy Van"));
        array_push($listHistories, new History(2013, 2016,"10B3 - 12B3", "THPT Phan Dang Luu"));
        array_push($listHistories, new History(2016, 2020,"CNTTK40D", "Dai hoc Khoa hoc - Dai hoc Hue"));

        return $listHistories;
    }
    #endregion
}

?>