public class InsertSort extends Sorting {

    public InsertSort(){
        name = "InsertSort";
    }

    @Override
    public String[] sortAcs(Vertex[] array) {
        //put everything in string array
        String[] strArr = this.vertexToString(array);

        //sort string array
        for (int i = 1; i <= strArr.length -1; i++) {
            String temp = strArr[i];
            int j = i -1;
            
            while(j >= 0 && strArr[j].compareTo(temp) > 0) {
                strArr[j+1] = strArr[j];
                j--;
            }
            strArr[j+1] = temp;
            this.printArr(strArr);
        }

        return strArr;
    }

    @Override
    public String[] sortDsc(Vertex[] array) {
        //put everything in string array
        String[] strArr = this.vertexToString(array);

        //sort string array
        for (int i = 1; i <= strArr.length -1; i++) {
            String temp = strArr[i];
            int j = i -1;
            
            while(j >= 0 && strArr[j].compareTo(temp) < 0) {
                strArr[j+1] = strArr[j];
                j--;
            }
            strArr[j+1] = temp;
            this.printArr(strArr);
        }

        return strArr;
    }
}
