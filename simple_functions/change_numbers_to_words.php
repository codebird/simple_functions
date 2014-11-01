<?php
function convert_to_letters($number){
	//Array to change numbers into words
	$dictionary  = array(1=>'one', 2=>'two', 3=>'three', 4=>'four', 5=>'five', 6=>'six', 7=>'seven', 8=>'eight', 9=>'nine', 10=>'ten', 11=>'eleven', 12=>'twelve', 13=>'thirteen', 14=>'fourteen', 15=>'fifteen', 16=>'sixteen', 17=>'seventeen', 18=>'eighteen', 19=>'nineteen', 20=>'twenty', 30=>'thirty', 40=>'fourty', 50=>'fifty', 60=>'sixty', 70=>'seventy', 80=>'eighty', 90=>'ninety');
	//Array to add after each section of the number
	$dictionary2=array(0=>'', 1=>'thousand', 2=>'million', 3=>'billion', 4=>'trillion', 5=>'quadrillion', 6=>'quintillion');

	//Converting the number to a string
	$string_number=(string)$number;

	//Calculating the number of loops needed to separate the number into chunks of 3
	$loops=ceil(strlen($string_number)/3);

	//Separating the number into chunks of 3 starting from the end.
	for($i=0; $i<$loops; $i++){
		$array[]=substr($string_number, -3, 3);
		//Deleting the 3 numbers we just got from our string.
		$string_number=substr($string_number, 0, -3);
	}

	//Looping through the array of chunks of 3 or less numbers to change each part into words.
	for($i=0; $i<count($array); $i++){
		$string_number=(string)$array[$i];
		$this_string='';
		//if this part is 0 we don't need to enter
		if((int)$array[$i]!=0){
			//Calculating
			if(strlen($string_number)==3){
				$this_string=$dictionary[$string_number[0]].' hundred ';
				$array[$i]=($array[$i]-(int)$string_number[0]*100);
			}
			if($array[$i]>19){
				$tens=((int)($array[$i]/10))*10;
				$ones=$array[$i]-$tens;
				$this_string.=$dictionary[$tens].' '.$dictionary[$ones];
			}
			else {
				$this_string.=$dictionary[$array[$i]];
			}
	
			//Adding the section word after our string.
			$this_string.=' '.$dictionary2[$i];
			if($string==''){
				$string='and '.$this_string;
			}
			else {
				$string=$this_string.', '.$string;
			}
		}
	}
	return ltrim($string, 'and');
}

//Testing
echo convert_to_letters(123); //one hundred twenty three
echo '<br />';
echo convert_to_letters(53458332);//fifty three million, four hundred fifty eight thousand, and three hundred thirty two