public class BubbleSort extends Sorting {
    public BubbleSort(){
        name = "BubbleSort";
    }

    @Override
    public String[] sortAcs(Vertex[] array) {

        //put everything in string array
        String[] strArr = this.vertexToString(array);

        //sort string array
        for(int i = 0; i <= strArr.length - 2; i++) {
            for(int j = strArr.length-1; j >= i+1; j--) {
                if(strArr[j].compareTo(strArr[j-1]) < 0) {
                    String temp = strArr[j];
                    strArr[j] = strArr[j-1];
                    strArr[j-1] = temp;
                }
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
        for(int i = 0; i <= strArr.length - 2; i++) {
            for(int j = strArr.length-1; j >= i+1; j--) {
                if(strArr[j].compareTo(strArr[j-1]) > 0) {
                    String temp = strArr[j];
                    strArr[j] = strArr[j-1];
                    strArr[j-1] = temp;
                }
            }
            this.printArr(strArr);
        }

        return strArr;
    }
}
