<?php
function convert_to_letters($number){

	//Array to change numbers into words
	$dictionary  = array(1=>'One', 2=>'two', 3=>'three', 4=>'four', 5=>'five', 6=>'six', 7=>'seven', 8=>'eight', 9=>'nine', 10=>'ten', 11=>'eleven', 12=>'twelve', 13=>'thirteen', 14=>'fourteen', 15=>'fifteen', 16=>'sixteen', 17=>'seventeen', 18=>'eighteen', 19=>'nineteen', 20=>'twenty', 30=>'thirty', 40=>'forty', 50=>'fifty', 60=>'sixty', 70=>'seventy', 80=>'eighty', 90=>'ninety');
	//Array to add after each section of the number
	$dictionary2=array(0=>'', 1=>'thousand', 2=>'million', 3=>'billion', 4=>'trillion', 5=>'quadrillion', 6=>'quintillion');
	
	$number=(int)$number;

	//Converting the number to a string
	$string_number=(string)$number;

	//Calculating the number of loops needed to separate the number into chunks of 3
	$loops=ceil(strlen($string_number)/3);

	//Separating the number into chunks of 3 starting from the end.
	for($i=0; $i<$loops; $i++){
		$part=substr($string_number, -3, 3);
		//Deleting the 3 numbers we just got from our string.
		$string_number=substr($string_number, 0, -3);
		$this_string='';

		if((int)$part!=0){
			//Calculating
			if(strlen($part)==3 && $part[0]!=0){
				$this_string=ucfirst($dictionary[$part[0]]).' Hundred ';
				$part=($part-(int)$part[0]*100);
			}
			if($part>19){
				$tens=((int)($part/10))*10;
				$ones=$part-$tens;
				$this_string.=ucfirst($dictionary[$tens]).' '.ucfirst($dictionary[$ones]);
			}
			else {
				$this_string.=ucfirst($dictionary[(int)$part]);
			}

			//Adding the section word after our string.
			$this_string.=' '.ucfirst($dictionary2[$i]);
			if($string==''){
				$string=$this_string;
			}
			else {
				$string=$this_string.', '.$string;
			}
		}
	}
	return $string;
}

//Testing
echo convert_to_letters(123); //one hundred twenty three
echo '<br />';
echo convert_to_letters(53458332);//fifty three million, four hundred fifty eight thousand, and three hundred thirty two
