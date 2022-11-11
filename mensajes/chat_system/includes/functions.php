<?php
function getCount($arr,$modId) {
    $count = 0;
    $len=count($arr);
    for ($i = 0; $i < $len; $i++) {
        if ($arr[$i]['allDetails']['module_id'] == $modId) {
            $count++;
        }
    }
    return $count;
}


function getSubSubmodule($Arr,$subModId)
{
    $subSubModId="";
    $len=count($Arr);
	$subSubMod=array();
	foreach($Arr as $element) {
	  if($subModId==$element['allDetails']['sub_module_id']){
		  if(!empty($element['allDetails']['sub_sub_module_id']))
			$subSubMod[]=array('sub_sub_module_id' => $element['allDetails']['sub_sub_module_id'],'sub_sub_module_name' => $element['allDetails']['sub_sub_module_name'], 'sub_sub_controller' => $element['allDetails']['sub_sub_controller']);
      }
    }
    return $subSubMod; 
}

function AutoGenOrderID($the_number)
{
	if($the_number>99999)
	{
		return $the_number;
	}
	else
	{
		if($the_number>9999)
		{
			return "0".$the_number;
		}
		else
		{
			if($the_number>999)
			{
				return "00".$the_number;
			}
			else
			{
				if($the_number>99)
				{
					return "000".$the_number;
				}
				else
				{
					if($the_number>9)
					{
						return "0000".$the_number;
					}
					else
					{
						return "00000".$the_number;
					}
				}
			}
		}
	}
}

function getSaleProductCount($Arr,$modId)
{
    $subModId="";
    $len=count($Arr);
	$subMod=array();
	foreach($Arr as $element) {
	  if($modId==$element['allSaleDetails']['sale_entry_id']){
		//if(stripos($subModId,",".$element['allSaleDetails']['sale_entry_id'].",")==false)
		//{
			$subModId.=" ,".$element['allSaleDetails']['sale_entry_id'].", ";
            if(!empty($element['allSaleDetails']['sale_entry_id']))
			     $subMod[]=array('challan_no' => $element['allSaleDetails']['challan_no'],'prod_cat_id' => $element['allSaleDetails']['prod_cat_id'], 'category_name' => $element['allSaleDetails']['category_name'],'product_id' => $element['allSaleDetails']['product_id'],'product_name' => $element['allSaleDetails']['product_name'],'paking_type' => $element['allSaleDetails']['paking_type'],'paking_type' => $element['allSaleDetails']['paking_type'],'amount' => $element['allSaleDetails']['amount'],'id' => $element['allSaleDetails']['id'],'qty_in_mt' => $element['allSaleDetails']['qty_in_mt']);
		//}
	  }
    }
    return $subMod; 
}


?>