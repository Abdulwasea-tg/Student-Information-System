<?php 

class Gridview{
    public $tableName = null;
    public $colNumber = null;
    public $rowNumber = null;
    public $attribut =array();
    public $data_set = array();
    public $actions=array();
    public $tb = "";

    public function __construct($tableName="", $attribut ,$actions=array(),$data_set=array()){ 
        $this->tableName = $tableName;
        $this->attribut = $attribut; 
        $this->data_set = $data_set;
        $this->actions = $actions;
    }

    function creat_table($data_set =""){
        $tablename=$this->tableName;
        $this->tb = "";
        $this->tb = "<table class='tb2'>";
        $this->tb .= "<thead>";
        $data_set = ($data_set!="" )? $data_set : $this->data_set;
        foreach($this->attribut as $attr){
            $this->tb .= "<td>".$attr."</td>";

        }
        $this->tb .= "</thead>";
        
        if(!empty($data_set)){
            foreach($data_set as $row){
                $row = array_merge($row, $this->actions);
                $this->tb .= "<tr>";
                foreach($row as $cell_data){
                    if($cell_data =="Delete" ||$cell_data =="Edit" || $cell_data =="Add" ||$cell_data =="Search"|| $cell_data =="View" || $cell_data =="Apply" || $cell_data =="Detail")
                    {   
                        $this->tb .= "<td>";
                       $this->tb .= "<form action='".htmlspecialchars($_SERVER['PHP_SELF'])."' method='post'>";
                        $this->tb .= "<input type='hidden' name='recordId' value='{$row[0]}'>";
                        /*$this->tb .= "<a href="<?php htmlspecialchars($_SERVER["PHP_SELF"])."recordId={$row[0]}"; ?>" ></a>";*/
                        /* $this->tb .= "<input type='submit' name='$cell_data$tablename' value='$cell_data'>"; */
                        $this->tb .= "<button class=\"btn_action\" type='submit' name='$cell_data$tablename' value='$cell_data'><img src=\"..//assets//img//actions//$cell_data.png\" alt=\"$cell_data\"></button>";
                        $this->tb .= "</form>";
                        $this->tb .= "</td>";
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

