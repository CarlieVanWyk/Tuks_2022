public class Vertex {
    private String vName;
    private Edge[] edges;
    public Vertex(String vName, int numedges){
        this.vName = vName;
        edges = new Edge[numedges];
    }

    public String getVName(){
        return vName;
    }

    public Edge[] getEdges(){
        return edges;
    }

    public boolean addEdge(Edge e){
        if(e == null)
            return false;

        for(int i=0; i < edges.length; i++)
        {
            if(edges[i] == null)
            {
                edges[i] = e;
                return true;
            }
        }
        return false;
    }

    //Do not change the above functions
    //Implement the functions below

    public boolean isAccessable(Vertex e){
        //scared you'll go too far? if there is no more vertices left to put into DFS(.., end) tehn you'll know you've reached the end
        return dfs(this, e);
    }


    //helper functions

    public boolean dfs(Vertex start, Vertex end) {
//        if(checkForCycle() == true) {
//            return false;
//        }
        //check for cycle
        //vertices array may contain null
        //edges array may have null values

        if (start == end) {
            return true;
        }
        while (start != end && (start != null && end != null)) {
            if(start.edges.length == 0) {
                return false;
            }
            for(int i =0; i < start.edges.length; i++) {
                dfs(start.edges[i].pointB, end);
            }
        }
        return false;
    }


    //check for cycle ??? if you hav found that there is a path to the end vertex then the funciton stops so it won't go into loop(cycle)

}
