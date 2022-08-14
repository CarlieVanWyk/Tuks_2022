public class CombSort extends Sorting {
    public CombSort(){
        name ="CombSort";
    }

    @Override
    public String[] sortAcs(Vertex[] array) {
        //put everything in string array
        String[] strArr = this.vertexToString(array);

        //sort string array
        int gap = strArr.length;
        boolean swapped = false;
        while(gap > 1 || swapped) {
            swapped = false;
            if(gap > 1){
                gap = (int)(gap/1.3);
            }

            int i = 0;
            while(i + gap < strArr.length) {
                if(strArr[i].compareTo(strArr[i+gap]) > 0) {
                    String temp = strArr[i];
                    strArr[i] = strArr[i+gap];
                    strArr[i+gap] = temp;

                    swapped = true;
                }

                i+= 1;
            }
            this.printArr(strArr);
            System.out.println("Gap: " + gap);
        }

        return strArr;
    }

    @Override
    public String[] sortDsc(Vertex[] array) {
        //put everything in string array
        String[] strArr = this.vertexToString(array);

        //sort string array
        int gap = strArr.length;
        boolean swapped = false;
        while(gap > 1 || swapped) {
            swapped = false;
            if(gap > 1){
                gap = (int)(gap/1.3);
            }
            
            int i = 0;
            while(i + gap < strArr.length) {
                if(strArr[i].compareTo(strArr[i+gap]) < 0) {
                    String temp = strArr[i];
                    strArr[i] = strArr[i+gap];
                    strArr[i+gap] = temp;
                    
                    swapped = true;
                }
                
                i+= 1;
            }
            this.printArr(strArr);
            System.out.println("Gap: " + gap);
        }

        return strArr;
    }
}
