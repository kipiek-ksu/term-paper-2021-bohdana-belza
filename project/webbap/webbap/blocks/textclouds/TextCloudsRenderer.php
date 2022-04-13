<?php
 
class TextCloudsRenderer {
    private $course_id;
    private $html;
    private $min_size;
    private $num_tags;
    private $usecolors;

    public function __construct($course_id,$min_size,$num_tags,$usecolors){
        $this->course_id = $course_id;
        $this->min_size = $min_size;
        $this->num_tags = $num_tags;
        $this->usecolors = $usecolors;
    }

    private function generate(){
        GLOBAL $CFG;
        $prfx = $CFG->prefix;
        
        $this->html = "";
        $tc_rs = get_recordset_sql("SELECT * FROM ".$prfx."tc_tag WHERE course_id=".$this->course_id." order by referstoquantity desc limit 0,".$this->num_tags);
        $max = 0;
        $min = 1000000000;
        $cmax=-1;
        $cmin=100000000;
        $data_array = null;

        foreach($tc_rs as $res){
            $quantity = $res["referstoquantity"];
            if($quantity>$max) $max = $quantity;
            if($quantity<$min) $min = $quantity;
            $data_array[$res["text"]]=$quantity;

            $cltimes = $res["clickedtimes"];
            if($cltimes>$cmax) $cmax = $cltimes;
            if($cltimes<$cmin) $cmin = $cltimes;
            $color_array[$res["text"]]=$cltimes;
        }
        $html="<script src='".$CFG->wwwroot."/blocks/textclouds/js/block_textclouds.js'></script>";

        $max = $max - $min;

        if($data_array!=null) ksort($data_array);

        $cmax = $cmax-$cmin;
		if($cmax==0) $cmax=1;
        if($data_array!=null)
        foreach($data_array as $word=>$weight){
            $cw = $weight-$min;
            if($max==0)$max=1;
            $size = $this->min_size + ((20*$cw)/$max);

            $colw = $color_array[$word]-$cmin;
            $color = (255*$colw)/$cmax;

            $hcolor = dechex($color);
            
            if(strlen($hcolor)==1) $hcolor = "0".$hcolor;

            $href="\"javascript:popup('".$CFG->wwwroot."/blocks/textclouds/showresource.php?course_id=".$this->course_id."&tag=".$word."')\"";
            if($this->usecolors) $html = $html." <a href=".$href." style='font-size:".$size."px; color:#".$hcolor."0000'>".$word."</a>";
            else $html = $html." <a href=".$href." style='font-size:".$size."px; color: #000000'>".$word."</a>";
        }
        if($html=="<script src='".$CFG->wwwroot."/blocks/textclouds/js/block_textclouds.js'></script>") $this->html = get_string("tagcloudempty","block_textclouds");
        else $this->html= $html;
    }

    public function getHTML(){
        $this->generate();
        return $this->html;
    }
    

}
