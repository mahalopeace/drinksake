<?php

class Init_class {
	var $db_object;
    var $decode_key = "abcdefg";
    var $db_user  = "usr";
    var $db_pass  = "passwd";
    var $db_host  = "localhost";
    var $db_name  = "kisop";
    var $bbs_name = "�L�\�s�[�f����";

    function Init_class($dbpath)
	{
 		$this->db_object = 0; //new DB_class($dbpath);
 	}
    
	function max_length_check($p_string, $p_length, $p_name)
	{
        if(strlen($p_string) > $p_length)
		{
            $this->disp_err_message($p_name."���������܂�(�Œᔼ�p".$p_length."����)");
		}
    }
    
	function min_length_check($p_string, $p_length, $p_name)
	{
        if(strlen($p_string) < $p_length)
		{
            $this->disp_err_message($p_name."���Z�����܂�(�Œᔼ�p".$p_length."����)");
        }
    }
    
	function indi_check($p_string,$p_name)
	{
        if(strlen($p_string) == 0)
		{
            $this->disp_err_message($p_name."�͕K�����͂��Ă�������");
        }
    }
    
	function mail_check($p_string)
	{
        if(strlen($p_string) != 0 && !ereg("^[a-zA-Z0-9_\.\-]+@(([a-zA-Z0-9_\-]+\.)+[a-zA-Z0-9]+$)", $p_string))
		{
            $this->disp_err_message("���[���A�h���X�𐳂������͂��Ă��������B");
        }
    }
    
	function uri_check($p_string)
	{
        if(strlen($p_string) != 0 && !ereg("^http://+($|[a-zA-Z0-9_~\.\-\/])+$",$p_string))
		{
            $this->disp_err_message("URL�𐳂������͂��Ă�������� ");
        }
    }
    
	function disp_err_message($p_message)
	{
        disp_html_header("�G���[");
        $html_string ="<div class = \"title\">".$p_message."</div><hr /><br /><a href=\"#\" onClick=\"history.back(); return false;\">�O�֖߂�</a>";
        print($html_string);
        $this->db_object->disconnect();
        disp_html_footer();
        exit;
    }
    
	function get_decode_key()
	{
        return $this->decode_key;
    }
}
?>
