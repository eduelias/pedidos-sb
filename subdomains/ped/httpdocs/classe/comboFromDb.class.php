<?
class itemCombo{
	var $caption;
	var $value;
	var $style;
	var $selectedValue;
	
	function itemCombo($value,$caption,$selectedValue){
	 	$this->caption = $caption;
		$this->value = $value;
		$this->selectedValue = $selectedValue;
	}
	function getValue(){
		return $this->value;
	}
	function getCaption(){
		return $this->caption;
	}
		
	function displayItem($style){
	?>
	<option value="<? echo $this->getValue();?>" <? if($this->selectedValue == $this->getValue()) { echo "selected"; }?> <? echo $this->style ?>>
		<? echo $this->getCaption();?>
	</option>
	<?
	}
}

class comboFromDb{
	var $table;
	var $valueField;
	var $displayField;
	var $selectedValue;
	var $whereClause;
	var $comboName;
	var $items;
	var $sql;
	var $linhas;
	var $itemStyle;
	var $comboStyle;
	

	function comboFromDb($table, $valueField, $displayField, $selectedValue, $whereClause, $comboName,$numLinhas,$itemStyle,$comboStyle){
		$this->table = $table;
		$this->valueField = $valueField;
		$this->displayField = $displayField;
		$this->selectedValue = $selectedValue;
		$this->whereClause = $whereClause;
		$this->comboName = $comboName;
		$this->linhas = $numLinhas;
		$this->itemStyle = $itemStyle;
		$this->comboStyle = $comboStyle;
	}

	function displayCombo(){
	?>
	<select id="<? echo $this->comboName?>" name="<? echo $this->comboName?><? if($this->linhas > 1) { echo "[]"; }?>" <? if($this->linhas > 1) { echo "multiple size=". $this->linhas;}?> <? echo $this->comboStyle?>>
	<option value="0">Selecione</option>
	<?
		for($i=0;$i<count($this->items);$i++)
			$this->items[$i]->displayItem($this->itemStyle);
	?>
	</select>
	<?
	}
	
	function addItem($value,$caption){
		$this->items[] = new itemCombo($value,$caption,$this->selectedValue);
	}
	
	function getFromDb(){

		$this->sql = "select " . $this->valueField . "," . $this->displayField . " from " . $this->table;
		$this->sql .= " " .$this->whereClause . " order by " . $this->displayField;
//		echo $this->sql;
		$result = mysql_query($this->sql);
		if(@mysql_num_rows($result) > 1000)
		{
			$this->addItem(0,"A TABELA POSSUI MUITOS REGISTROS, NAO É ACONSELHAVEL UTILIZAR UMA COMBO");
		}
		else
		{
			while(@$record = mysql_fetch_array($result))
				$this->addItem($record[$this->valueField],$record[$this->displayField]);
		}
	}
}
?>