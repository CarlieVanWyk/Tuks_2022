public class Graph {
    private Vertex[] vertices;
    public Graph(int numVertex){
        vertices = new Vertex[numVertex];
    }

    public boolean addVertex(String nName, int numVertices){
        int openPos = -1;
        for(int i=0; i < vertices.length; i++)
        {
            if(vertices[i] == null){
                if(openPos == -1)
                    openPos = i;
            } else {
                if(vertices[i].getVName().equals(nName)){
                    return false;
                }
            }
        }
        if(openPos == -1)
            return false;

        vertices[openPos] = new Vertex(nName, numVertices);
        return true;
    }

    public Vertex getVertex(String nName){
        for(int i=0; i < vertices.length; i++){
            if(vertices[i] != null && vertices[i].getVName().equals(nName)){
                return vertices[i];
            }
        }
        return null;
    }

    public boolean addEdge(String pointA, String pointB, float value, String vName){
        Vertex pA = getVertex(pointA);
        Vertex pB = getVertex(pointB);
        if(pA == null || pB == null)                             //check if both vertices actually exist and if you can thus add a edge between them
            return false;

        Edge v = new Edge(value, vName);
        v.pointA = pA;
        v.pointB = pB;
        pA.addEdge(v);
        return true;
    }

    //Do not change the above functions
    //Implement the functions below

    public boolean isAccessable(Vertex vertexFrom, Vertex vertexTo){
        if (vertexFrom == vertexTo) {
            return true;
        }
        while (vertexFrom != vertexTo) {
            if(vertexFrom.getEdges().length == 0) {
                return false;
            }
            for(int i =0; i < vertexFrom.getEdges().length; i++) {
                isAccessable(vertexFrom.getEdges()[i].pointB, vertexTo);
            }
        }
        return false;
    }


//    public int sizeVerticesArr() {
//        int size;
//        if(vertices == null) {
//            System.out.println("vertices is null");
//            size = 0;
//        }
//        else {
//            size = vertices.length;
//        }
//        return size;
//    }




//    float[] currDistForShortDist = new float[10];
    double[] num4;
    Edge[] allEdgesOfGraph;
    int iSpecial4;
    public float shortestDistance(Vertex vertexFrom, Vertex vertexTo){
        float[] currDistForShortDist = new float[vertices.length];
        Vertex[] prevForShortDist = new Vertex[vertices.length];
        num4 = new double[vertices.length];

        allEdgesOfGraph = new Edge[countEdges()];

        if(!(isAccessable(vertexFrom, vertexTo))) {
            return Float.POSITIVE_INFINITY;
        }

        for(int i = 0; i < vertices.length; i++) {
            currDistForShortDist[i] = Float.POSITIVE_INFINITY;
            prevForShortDist[i] = null;
        }
        currDistForShortDist[specificIndexOfPassedVertex(vertexFrom)] = 0;

        //        create an array of edges using vertexFrom as starting point (edges will store the "ab, ad, ae" in pointA and pointB)
        for(int i = 0; i < vertices.length; i++) {
            num4[i] = 0;
        }
        for(int i = 0; i < countEdges(); i++) {
            allEdgesOfGraph[i] = null;
        }
        int j = 0;
        while(num4[j] == 0) {
            addEdgesToArr(vertexFrom);
            j++;
        }

        //while there is an edge(v,u) such that...
        int k = 0;
        while(allEdgesOfGraph[k] != null &&
                (currDistForShortDist[specificIndexOfPassedVertex(allEdgesOfGraph[k].pointB)] >
                        currDistForShortDist[specificIndexOfPassedVertex(allEdgesOfGraph[k].pointA)] + allEdgesOfGraph[k].getValue()))
        {
            currDistForShortDist[specificIndexOfPassedVertex(allEdgesOfGraph[k].pointB)] =
                    currDistForShortDist[specificIndexOfPassedVertex(allEdgesOfGraph[k].pointA)] + allEdgesOfGraph[k].getValue();
            prevForShortDist[specificIndexOfPassedVertex(allEdgesOfGraph[k].pointB)] = allEdgesOfGraph[k].pointA;
        }

        float result = currDistForShortDist[specificIndexOfPassedVertex(vertexTo)];

        return result;
    }

    int index4 = 0;
    public void addEdgesToArr(Vertex start) {
        num4[specificIndexOfPassedVertex(start)] = iSpecial4++;
        for(int i =0; i < start.getEdges().length; i++) {
            if(num4[specificIndexOfPassedVertex(start.getEdges()[i].pointB)] == 0) {
                String str = start.getEdges()[i].pointA.getVName() + start.getEdges()[i].pointB.getVName();
                allEdgesOfGraph[index4] = new Edge(start.getEdges()[i].getValue(), str);
                addEdgesToArr(start.getEdges()[i].pointB);
                index4++;
            }
        }
    }


    float[] currDistForShortPath;
    Vertex[] prevForShortPath;
    double[] num5;
    Edge[] allEdgesOfGraph2;
    int iSpecial5;
    public Vertex[] shortestPath(Vertex vertexFrom, Vertex vertexTo){
        currDistForShortPath = new float[vertices.length];
        prevForShortPath = new Vertex[vertices.length];
        num5 = new double[vertices.length];
        allEdgesOfGraph2 = new Edge[countEdges()];

        if(!(isAccessable(vertexFrom, vertexTo))) {
            return null;
        }

        for(int i = 0; i < vertices.length; i++) {
            currDistForShortPath[i] = Float.POSITIVE_INFINITY;
            prevForShortPath[i] = null;
        }
        currDistForShortPath[specificIndexOfPassedVertex(vertexFrom)] = 0;

        //        create an array of edges using vertexFrom as starting point (edges will store the "ab, ad, ae" in pointA and pointB)
        for(int i = 0; i < vertices.length; i++) {
            num5[i] = 0;
        }
        for(int i = 0; i < countEdges(); i++) {
            allEdgesOfGraph2[i] = null;
        }
        int j = 0;
        while(num5[j] == 0) {
            addEdgesToArr2(vertexFrom);
            j++;
        }

        //while there is an edge(v,u) such that...
        int k = 0;
        while(allEdgesOfGraph2[k] != null &&
                (currDistForShortPath[specificIndexOfPassedVertex(allEdgesOfGraph2[k].pointB)] >
                        currDistForShortPath[specificIndexOfPassedVertex(allEdgesOfGraph2[k].pointA)] + allEdgesOfGraph2[k].getValue()))
        {
            currDistForShortPath[specificIndexOfPassedVertex(allEdgesOfGraph2[k].pointB)] =
                    currDistForShortPath[specificIndexOfPassedVertex(allEdgesOfGraph2[k].pointA)] + allEdgesOfGraph2[k].getValue();
            prevForShortPath[specificIndexOfPassedVertex(allEdgesOfGraph2[k].pointB)] = allEdgesOfGraph2[k].pointA;
        }

        Vertex temp = vertexTo;
        int counter = 1;
        while(temp != vertexFrom) {
            temp = prevForShortPath[specificIndexOfPassedVertex(temp)];
            counter += 1;
        }

        Vertex[] result = new Vertex[counter];
        int reverseCount = counter-1;

        Vertex temp2 = vertexTo;
        while(temp2 != vertexFrom) {
            result[reverseCount] = temp2;
            temp2 = prevForShortPath[specificIndexOfPassedVertex(temp2)];
            reverseCount -= 1;
        }

        return result;

    }

    int index5 = 0;
    public void addEdgesToArr2(Vertex start) {
        num5[specificIndexOfPassedVertex(start)] = iSpecial5++;
        for(int i =0; i < start.getEdges().length; i++) {
            if(num5[specificIndexOfPassedVertex(start.getEdges()[i].pointB)] == 0) {
                String str = start.getEdges()[i].pointA.getVName() + start.getEdges()[i].pointB.getVName();
                allEdgesOfGraph2[index5] = new Edge(start.getEdges()[i].getValue(), str);
                addEdgesToArr2(start.getEdges()[i].pointB);
                index5++;
            }
        }
    }




    int iSpecial = 1;
    double[] num;
    Vertex[] pred;
    public boolean containsCycle(Vertex startingVertex){
        num = new double[vertices.length];
        pred = new Vertex[vertices.length];

        for(int i = 0; i < vertices.length; i++) {
            num[i] = 0;
            pred[i] = null;
        }
        int j = 0;
        boolean check = true;
        while(num[j] == 0) {
            check = checkForCycle(startingVertex);
            j++;
        }
        if(check == false) {
            return true;
        }
        return false;
    }



    int iSpecial2 = 1;
    double[] num2;
    Vertex[] pred2;
    public void listCycles(){
        num2= new double[vertices.length];
        pred2 = new Vertex[vertices.length];

        if(vertices != null) {
            for(int i = 0; i < vertices.length; i++) {
                num2[i] = 0;
                pred2[i] = null;
            }
            int j = 0;
            while(num2[j] == 0) {                                //while num[j] has a zero, anywhere... not jsut linearly...this won't work
                boolean var = checkForAndListCycles(vertices[0]);
                j++;
            }
        }
    }
    //check for cycle for listCycles()
    public boolean checkForAndListCycles(Vertex theVertex) {                                                          //algo from p.422
        if(specificIndexOfPassedVertex(theVertex) == -1) {
            System.out.println("specificIndexOfPassedVertex(theVertex) did not work properly");
        }
        else {
            num2[specificIndexOfPassedVertex(theVertex)] = iSpecial2++;
            if(theVertex.getEdges().length == 0) {
                return false;
            }
            for(int i =0; i < theVertex.getEdges().length; i++) {
                if(num2[specificIndexOfPassedVertex(theVertex.getEdges()[i].pointB)] == 0) {
                    pred2[specificIndexOfPassedVertex(theVertex.getEdges()[i].pointB)] = theVertex;
                    checkForCycle(theVertex.getEdges()[i].pointB);
                }
                else if(num2[specificIndexOfPassedVertex(theVertex.getEdges()[i].pointB)] != Double.POSITIVE_INFINITY){              //if num(u) != infinity
                    pred2[specificIndexOfPassedVertex(theVertex.getEdges()[i].pointB)] = theVertex;

                    //cycle detected!
                    String resultStr = "";
                    resultStr += theVertex.getEdges()[i].pointB.getVName();

                    Vertex startVer = theVertex.getEdges()[i].pointB;
                    Vertex temp = theVertex;
                    while(temp != startVer) {
                        resultStr += "-" + temp.getVName();
                        temp = pred2[specificIndexOfPassedVertex(temp)];
                    }
                    resultStr += "-" + theVertex.getEdges()[i].pointB.getVName() + "\n";

                    StringBuilder reverseStr = new StringBuilder(resultStr);
                    System.out.println(reverseStr.reverse());

                }
            }
            num2[specificIndexOfPassedVertex(theVertex)] = Double.POSITIVE_INFINITY;
        }

        return false;
    }


    public int countEdges(){
        return accumulateEdges();
    }

    int iSpecial3 = 1;
    double[] num3;
    public String DFT(Vertex startVertex){
        num3= new double[vertices.length];
        //initialize
        for(int i = 0; i < vertices.length; i++) {
            num3[i] = 0;
        }
        int j = 0;
        String result = startVertex.getVName();
        while(num3[j] == 0) {
            DFSforDFT(startVertex);
            result += stringDFS;
            j++;
        }
        return result;
    }


    //helper functions

    String stringDFS = "";
    public void DFSforDFT(Vertex startVertex) {
        num3[specificIndexOfPassedVertex(startVertex)] = iSpecial3++;
        for(int i =0; i < startVertex.getEdges().length; i++) {
            if(num3[specificIndexOfPassedVertex(startVertex.getEdges()[i].pointB)] == 0) {
                stringDFS += ";" + startVertex.getEdges()[i].pointB.getVName();
                DFSforDFT(startVertex.getEdges()[i].pointB);
            }
        }
    }

    //check for cycle for containsCycle()
    public boolean checkForCycle(Vertex theVertex) {                                                          //algo from p.422
        if(specificIndexOfPassedVertex(theVertex) == -1) {
            System.out.println("specificIndexOfPassedVertex(theVertex) did not work properly");
        }
        else {
            num[specificIndexOfPassedVertex(theVertex)] = iSpecial++;
            if(theVertex.getEdges().length == 0) {
                return false;
            }
            for(int i =0; i < theVertex.getEdges().length; i++) {
                if(num[specificIndexOfPassedVertex(theVertex.getEdges()[i].pointB)] == 0) {
                    pred[specificIndexOfPassedVertex(theVertex.getEdges()[i].pointB)] = theVertex;
                    checkForCycle(theVertex.getEdges()[i].pointB);
                }
                else if(num[specificIndexOfPassedVertex(theVertex.getEdges()[i].pointB)] != 1.0/0.0){              //if num(u) != infinity
                    pred[specificIndexOfPassedVertex(theVertex.getEdges()[i].pointB)] = theVertex;
                    //cycle detected!
                }
            }
            num[specificIndexOfPassedVertex(theVertex)] = 1.0/0.0;
        }

        return false;
    }



    public int specificIndexOfPassedVertex(Vertex theVertex) {
        for(int count =0; count < vertices.length; count++) {
            if(vertices[count] == theVertex) {
                return count;
            }
        }
        return -1;
    }


//    Edge[] allEdgesOfGraph = new Edge[vertices.length * (vertices.length - 1)];  // N * (N - 1).
    public int accumulateEdges() {
        int index = 0;
        for(int i = 0; i < vertices.length; i++) {           //for vertices
            for(int j = 0; j < vertices[i].getEdges().length; j++) {  //for number of edges of each vertice
//                allEdgesOfGraph[index] = vertices[i].getEdges()[j];
                index += 1;
            }
        }
        return index;
    }
}
