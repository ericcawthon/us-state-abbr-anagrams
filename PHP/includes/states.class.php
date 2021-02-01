<?php
class states 
{
    function __construct($DB)
	{
        $this->DBase = $DB;
        $this->getAllStates();
    }

    function getAllStates()
    {
        $sql = "SELECT state_abbr FROM states";
        $this->state_abbrs = $this->DBase->get_result_flat($sql, 'state_abbr');
    }

    function getStateConnections($st)
    {
        $sql = "SELECT destination FROM connections WHERE origin = '" . $st ."'";
        return $this->DBase->get_result_flat($sql, 'destination');
    }

    function saveStringsList($strings_list)
    {
        $sql = "INSERT INTO combinations8 (string) VALUES";
        foreach($strings_list as $str)
        {
            $sql .= "('" . $str . "'),";
        }
        $sql = substr($sql, 0, -1) . ";";
        $this->DBase->run_insert($sql);
    }

    function getMatchedWords()
    {
        $sql = "SELECT word, GROUP_CONCAT(st_string) as strings, COUNT(*) as st_string_count 
                FROM matched_words 
                GROUP BY word";
        $matched_words = $this->DBase->get_rows($sql);
        $return_array = array();
        foreach ($matched_words as $mw)
        {
            $word_array['st_string_count'] = $mw['st_string_count'];
            $word_array['word'] = $mw['word'];
            $states = explode(",", $mw['strings']);
            $i = 0;
            foreach ($states as $st_string)
            {
                $word_array['state_strings'][$i]['st_string'] = $st_string;
                $word_array['state_strings'][$i]['states'] = str_split(strtoupper($st_string), 2);
                $i++;
            }

            $return_array[] = $word_array;
        }    
        return $return_array;   
    }
}

?>