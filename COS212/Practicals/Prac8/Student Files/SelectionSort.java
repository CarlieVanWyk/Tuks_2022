public class SelectionSort extends Sorting {
    
    public SelectionSort(){
        name = "SelectionSort";
    }

    @Override
    public String[] sortAcs(Vertex[] array) {
        //put everything in string array
        String[] strArr = this.vertexToString(array);

        //sort string array
        int smallest, i, j;
        for(i = 0; i <= strArr.length - 1; i++) {
            //select smallest element
            for(j = i+1, smallest = i; j < strArr.length ; j++) {
                if(strArr[j].compareTo(strArr[smallest]) < 0) {
                    smallest = j;
                }
            }
            //swap smallest with arr[i] 
            if(i != smallest) {
                String temp = strArr[smallest];
                strArr[smallest] = strArr[i];
                strArr[i] = temp;
            }

            this.printArr(strArr);
        }

        return strArr;
    }

    @Override
    public String[] sortDsc(Vertex[] array) {
        //put everything in string array
        String[] strArr = this.vertexToString(array);

        //sort string array
        int largest, i, j;
        for(i = 0; i <= strArr.length - 1; i++) {
            //select smallest element
            for(j = i+1, largest = i; j < strArr.length ; j++) {
                if(strArr[j].compareTo(strArr[largest]) > 0) {
                    largest = j;
                }
            }
            //swap largest with arr[i] 
            if(i != largest) {
                String temp = strArr[largest];
                strArr[largest] = strArr[i];
                strArr[i] = temp;
            }

            this.printArr(strArr);
        }

        return strArr;
    }
}
