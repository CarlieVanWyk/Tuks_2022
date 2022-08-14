public class TopologicalSort extends Sorting {
    public TopologicalSort(){
        name = "TopologicalSort";
    }

    int i;
    int j;

    @Override
    public String[] sortAcs(Vertex[] array) throws CycleException {

        //prepare vertices for TS(), only set num and TSnum for all vertices
        i = 1;
        j = array.length;

        for(int l = 0; l < array.length; l++) {
            array[l].num = 0;
            array[l].TSnum = 0;
        }
        for(int k = 0; k < array.length; k++){
            if(array[k].num == 0) {
                TS(array[k]);
            }
        }

        //actually do the sorting
        Vertex[] temp = new Vertex[array.length];
        int count =1;
//        for(int a = 0; a < array.length; a++) {
//            if(array[a].TSnum == count) {
//                temp[count-1]  = array[a];
//                count += 1;
//            }
//        }
//        for(int t = 0; t < temp.length; t++) {                          //for every index of the temp array
//            for(int a = 0; a < array.length; a++) {                    //go through whole array arr
//                if(array[a].TSnum == count) {
//                    temp[t]  = array[a];
//                    count += 1;
//                }
//            }
//        }
        int b;
        for(int a = 0; a < array.length; a++) {                    //go through whole array arr
            b = array[a].TSnum;
            if(b != -1) {
                b = b -1;
                temp[b]  = array[a];
            }
        }
//        for(int i = 0; i < arr.length; i++){
//            temp[arr[i].tsnum - 1] = arr[i];
//        }


//        System.out.println("hello1");
//        System.out.println("temp[0]: "+ temp[0].num + " " + " temp[array.length]: "+ temp[array.length-1].num);
//        System.out.println("hello2");

        String[] strArr = vertexToString(temp);

        return strArr;
    }

//    private void insert(Object object,)

    private void TS(Vertex v) throws CycleException {
        v.num = i++;

        for (int t = 0; t < v.getEdges().length; t++) {
            if(v.getEdges()[t].pointB.num == 0) {
                TS(v.getEdges()[t].pointB);
            }
            else if(v.getEdges()[t].pointB.TSnum == 0) {
                throw new CycleException();
            }
        }
        v.TSnum = j--;
    }


    @Override
    public String[] sortDsc(Vertex[] array) throws CycleException{
        //prepare vertices for TS, only set num and TSnum for all vertices
//        i = 1;
//        j = array.length;
//
//        for(int l = 0; l < array.length; l++) {
//            array[l].num = 0;
//            array[l].TSnum = 0;
//        }
//        for(int k = 0; k < array.length; k++){
//            if(array[k].num == 0) {
//                TS(array[k]);
//            }
//        }
//
//        //actually do the sorting
//        Vertex[] temp = new Vertex[array.length];
//        int count = array.length ;
//        int index = 0;
//        for(int a = 0; a < array.length; a++) {
//            if(array[a].TSnum == count) {
//                temp[index]  = array[a];
//                count -= 1;
//                index += 1;
//            }
//        }
//        String[] strArr = vertexToString(temp);
//
//        return strArr;


        String[] temp = sortAcs(array);
        String[] res = new String[array.length];

        int j = array.length-1;
        for(int i = 0; i < array.length; i++) {
            res[i] = temp[j];
            j--;
        }

        return res;

    }

}

class CycleException extends Exception{
    public String message = "Cycle has been detected";
}
