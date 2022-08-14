// Name: carlie van wyk
// Student number: u21672823
import java.util.Arrays;
public class Sort
{
	
	////// Implement the functions below this line //////
	
	/********** MERGE **********/
	public static <T extends Comparable<? super T>> void mergesort(T[] data, int first, int last, boolean debug)
	{

		// Your code here
		int mid;
		if(first < last) {
			mid = (first+last) / 2;
			mergesort(data, first, mid, debug);
			mergesort(data, mid+1, last, debug);
			merge(data, first, last, debug);
		}

	}
     
	private static <T extends Comparable<? super T>> void merge(T[] data, int first, int last, boolean debug)
	{

		// Your code here
		int mid = (first + last) / 2;
		int i1 = first;
		int i2 = first;
		int i3 = mid + 1;

		//sizes of arrays
		int arr1size = (mid+1);
//		int arr1size = mid;
//		int arr2size = last - mid;

		//temp arrays
		T[] temp;
		temp = data.clone();

		while((i2 < arr1size) && (i3 <= last) ) {
			if(data[i2].compareTo(data[i3]) < 0) {
				temp[i1++] = data[i2++];
			}
			else { 
				temp[i1++] = data[i3++];
			}
		}

		//load remaining arr1[] elements into temp[];
		while(i2 < arr1size) {
			temp[i1] = data[i2];
			i1++;
			i2++;
		}
		//load remaining arr2[] elements into temp[];
		while(i3 <= last) {
			temp[i1] = data[i3];
			i1++;
			i3++;
		}

		//replace array[] with temp[];
		for(int i = first; i <= last; i++) {
			data[i] = temp[i];
		}
        
		//DO NOT MOVE OR REMOVE!
		if (debug)
			System.out.println(Arrays.toString(data));
	}
     
	/********** COUNTING **********/
	public static void countingsort(int[] data, boolean debug)
	{

		// Your code here
		int i;
		int largest = data[0];
		int n = data.length;
		int[] tmp = new int[n];

		for(i = 1; i < n; i++) {
			if(largest < data[i]) {
				largest = data[i];
			}
		}

		int[] count = new int[largest+1];

		for(i =0; i <= largest; i++) {
			count[i] = 0;
		}

		for(i = 0; i < n; i++) {
			count[data[i]]++;
		}

		for(i = 1; i <= largest; i++) {
			count[i] = count[i-1] + count[i];
		}

		for(i = n-1; i >= 0; i--) {
			tmp[count[data[i]] - 1] = data[i];
			count[data[i]]--;
		}

		for(i = 0; i < n; i++) {
			data[i] = tmp[i];
		}


		//DO NOT MOVE OR REMOVE!
		if (debug)
			System.out.println(Arrays.toString(data));
	}

}