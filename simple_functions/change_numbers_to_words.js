function convert_to_letters(number){
	//Make sure number is a string.
	number=number.toString()
	//Array to change numbers into words
	dictionary  = {0:'', 1:'One', 2:'two', 3:'three', 4:'four', 5:'five', 6:'six', 7:'seven', 8:'eight', 9:'nine', 10:'ten', 11:'eleven', 12:'twelve', 13:'thirteen', 14:'fourteen', 15:'fifteen', 16:'sixteen', 17:'seventeen', 18:'eighteen', 19:'nineteen', 20:'twenty', 30:'thirty', 40:'fourty', 50:'fifty', 60:'sixty', 70:'seventy', 80:'eighty', 90:'ninety'};
	//Array to add after each section of the number
	dictionary2= {0:'', 1:'thousand', 2:'million', 3:'billion', 4:'trillion', 5:'quadrillion', 6:'quintillion'};
	loops=Math.ceil(number.length/3);
	array=new Array()
	string=''
	//Separating the number into chunks of 3 starting from the end.
	for(i=0; i<loops; i++){
		array[i]=number.substring( (number.length)-3, (number.length));
		//Deleting the 3 numbers we just got from our string.
		number=number.substring(0, (number.length)-3);
	}

	//Looping through the array of chunks of 3 or less numbers to change each part into words.
	for(i=0; i<array.length; i++){
		string_number=array[i];
		this_string='';
		
		if(parseInt(array[i])!=0){
			//Calculating
			if(string_number.length==3 && string_number[0]!=0){
				this_string=dictionary[string_number[0]].capitalizeFirstLetter()+' Hundred ';
				array[i]=(array[i]-parseInt(string_number[0]*100));
			}
			if(array[i]>19){
				tens=(parseInt(array[i]/10))*10;
				ones=parseInt(array[i])-tens;
				this_string+=dictionary[tens].capitalizeFirstLetter()+' '+dictionary[ones].capitalizeFirstLetter();
			}
			else {
				this_string+=dictionary[parseInt(array[i])].capitalizeFirstLetter();
			}
	
			//Adding the section word after our string.
			this_string+=' '+dictionary2[i].capitalizeFirstLetter();
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