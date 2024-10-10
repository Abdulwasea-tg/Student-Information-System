<?php 

class Gridview{
    public $colNumber = null;
    public $rowNumber = null;
    public $attribut =array();
    public $data_set = array();
    public $tb = "";

    public function __construct($attribut ,$data_set=array()){ 
        $this->attribut = $attribut; 
        $this->data_set = $data_set;
    }

    function creat_table($data_set =""){
        $this->tb = "";
        $this->tb = "<table>";
        $this->tb .= "<thead>";
        $data_set = ($data_set!="" )? $data_set : $this->data_set;
        foreach($this->attribut as $attr){
            $this->tb .= "<td>".$attr."</td>";

        }
        $this->tb .= "</thead>";
        
        if(!empty($data_set)){
            foreach($data_set as $row){
                $this->tb .= "<tr>";
                foreach($row as $cell_data){
                    if($cell_data =="Delete" ||$cell_data =="Edit" || $cell_data =="Add" ||$cell_data =="Search"|| $cell_data =="View" || $cell_data =="Apply")
                    {
                        $this->tb .= "<td><input type='submit' name='$cell_data' value='$cell_data'></td>";
                        continue;
                    }
                    else{
                        $this->tb .= "<td>".$cell_data."</td>";
                    }
                    
                }
                $this->tb .= "</tr>";

            }
        }
        /* $this->tb .= "</table>";  */

        echo $this->tb;

    }

    function fill($data_set){
        $this->data_set = $data_set;
        $this->creat_table($data_set);

    }

   function addAndCloseEnd($item = ""){
    echo $item;
    echo "</table>";

    } 

}




?>
<?php /*  $attr = array("ID", "roomNO", "roomType","Bed", "Booked", "Action");
    $grid = new Gridview($attr) ;
       $grid->creat_table($attr);? */?>
<!-- 
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style type="text/css">
		table caption{color:blue;}
		table{border:1px solid;color: red;
			width: 100%;/* 500px; */}

		table td,th{border:1px solid blue;color: black;
		text-align:center;}	


		thead td{ font-weight:bold;text-align: center;color:#fff; background:#333;padding: 5px;}
		tbody td{text-align: center; background:#DDD; padding: 5px;}
		tfoot td{font-weight:bold;text-align: center;color:#f00; background:#EEE;padding: 5px;}
	
		
		

	</style>


</head>
<body>


    
</body>
</html>

 -->

