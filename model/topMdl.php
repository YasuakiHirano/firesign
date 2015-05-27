<?php
class topMdl extends fireSignMdl
{
    function getContents($min,$max)
    {
       $sql = "select * from tablename order by create_time desc limit ".$min.",".$max;
       $ret = $this->db->_selectQuery($sql);
       return $ret;
    }

    function getTagContents($tag_text,$min,$max)
    {
       $sql = "select * from tablename where tag_text like '%".$tag_text."%' order by create_time desc limit ".$min.",".$max;
       $ret = $this->db->_selectQuery($sql);
       return $ret;
    }

    function getContnentOne($id)
    {
       $sql = "select * from tablename where id = ".$id;
       $ret = $this->db->_selectQuery($sql);
       return $ret;
    }
}
