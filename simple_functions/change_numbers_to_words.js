function convert_to_letters(number){
	//Make sure number is a string.
	number=number.toString()
	//Array to change numbers into words
	dictionary  = {0:'', 1:'One', 2:'Two', 3:'Three', 4:'Four', 5:'Five', 6:'Six', 7:'Seven', 8:'Eight', 9:'Nine', 10:'Ten', 11:'Eleven', 12:'Twelve', 13:'Thirteen', 14:'Fourteen', 15:'Fifteen', 16:'Sixteen', 17:'Seventeen', 18:'Eighteen', 19:'Nineteen', 20:'Twenty', 30:'Thirty', 40:'Forty', 50:'Fifty', 60:'Sixty', 70:'Seventy', 80:'Eighty', 90:'Ninety'};
	//Array to add after each section of the number
	dictionary2= {0:'', 1:'Thousand', 2:'Million', 3:'Billion', 4:'Trillion', 5:'Quadrillion', 6:'Quintillion'};
	loops=Math.ceil(number.length/3);
	array=new Array()
	string=''
	//Separating the number into chunks of 3 starting from the end.
	for(i=0; i<loops; i++){
		part=number.substring( (number.length)-3, (number.length));
		//Deleting the 3 numbers we just got from our string.
		number=number.substring(0, (number.length)-3);
		this_string='';
		
		if(parseInt(part)!=0){
			//Calculating
			if(part.length==3 && part[0]!=0){
				this_string=dictionary[part[0]]+' Hundred ';
				part=(part-parseInt(part[0]*100));
			}
			if(part>19){
				tens=(parseInt(part/10))*10;
				ones=parseInt(part)-tens;
				this_string+=dictionary[tens]+' '+dictionary[ones];
			}
			else {
				this_string+=dictionary[parseInt(part)];
			}
	
			//Adding the section word after our string.
			this_string+=' '+dictionary2[i];
			if(string==''){
				string=this_string;
			}
			else {
				string=this_string+', '+string;
			}
		}
	}
	return string;
}
