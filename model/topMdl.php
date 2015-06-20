<?php
class topMdl extends fireSignMdl
{
    function getUsers(){
       $ret = $this->db->selectQuery("users");
       return $ret;
    }
}
