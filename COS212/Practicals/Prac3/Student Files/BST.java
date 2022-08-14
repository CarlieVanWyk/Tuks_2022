public class BST<T extends Comparable<T>> {
    protected BSTNode<T> root;
int countNodes=0;
    public BST(){};

    public boolean insert(T val){
        if(root == null){
            root = new BSTNode<>(val);
            return true;
        } else {
            return root.recInsert(val);
        }
    }

    //Place code below

    public int numNodes(){
        if(isEmpty())
            return 0;
        BSTNode<T> p = root;
        int count = 0;
            countNodes = 0;
        if (p == null) {
            return 0;
        }
        else {
            int result = inorderNumNodes(p);
            return result;
        }

    }

    public Object[] toArray(){
        if(isEmpty())
            return null;
        BSTNode<T> p = root;
        int index = 0;

        if(root == null) {
            return null;
        }
        else {
            Object[] arrOfNodes = new Object[numNodes()];
            Object[] result = inorderToArray(p, arrOfNodes, index);
            return result;
        }
    }

    public boolean contains(T val){
        if(isEmpty())
            return false;
        BSTNode<T> p = root;

        return inorderContains(p, val);
    }

    public boolean isEmpty(){
        if(root == null) {
            return true;
        }
        else
            return false;
    }

    public BSTNode<T> find(T val){
        if(isEmpty()) {
            return null;
        }
        BSTNode<T> p = root;

        if(contains(val)) {
            inorderFind(p, val);
        }
        else {
            return null;
        }

        return null;
    }

    public int height(){
        if(isEmpty())
            return -1;
        BSTNode<T> p = root;

        int result = findHeight(p);
        return result;
    }

    public Object[] nodesOnHeight(int h){
        if(isEmpty())
            return null;
        //array of size = 2^h
        //Object[] arrOfNodes = new Object[numNodes()];
        BSTNode<T> p = root;
        int curLevel = 0;
        int index = 0;

        if(h < 0 || root == null || h > this.height()) {
            return null;
        }
        else {
            int size = (int) Math.pow(2, h);
            Object[] arrOfNodes = new Object[size];
            return getNodesOnH(p, curLevel, h, arrOfNodes, index);
        }
    }
    String resultStr;
    public String DFT(){
        if(isEmpty())
            return null;
        BSTNode<T> p = root;
        String result = "";
        resultStr="";
        if(root == null) {
            return result;
        }
        else {
            String sendit = inorderDFT(p);
            return sendit.substring(0,sendit.length()-1);
        }
    }
    String Carlie;
    public String BFT(){
        if(isEmpty())
            return null;
        int stop = height();
        Carlie="";
        for (int i = 0; i <= stop; i++) {
            helpingbft(root,0, i);
        }
//        System.out.println(Carlie.length());
//        String sendit = Carlie.substring(0,Carlie.length()-1);
        return Carlie.substring(0,Carlie.length()-1);
    }

    protected void helpingbft(BSTNode<T> ptr, int curLev, int height) {
        if(ptr == null) {
            return;
        }

        if (curLev == height) {
            Carlie += ptr.toString() + ";";
        }

        helpingbft(ptr.left, curLev++, height);
        helpingbft(ptr.right, curLev++, height);

        return;
    }


    public T maxVal(){
        if(isEmpty())
            return null;
        BSTNode<T> p = root;
        while (p.right != null)
            p = p.right;

        return (p.getVal());
    }

    public T minVal(){
        if(isEmpty())
            return null;
        BSTNode<T> p = root;
        while (p.left != null)
            p = p.left;

        return (p.getVal());
    }

    //ADD HELPER FUNCTIONS HERE
    protected int inorderNumNodes(BSTNode ptr) {
        if(ptr != null) {
            inorderNumNodes(ptr.left);
            countNodes++;
            inorderNumNodes(ptr.right);
        }

        return countNodes;
    }

    protected  Object[] inorderToArray(BSTNode<T> ptr, Object[] arrOfNodesParameter, int i) {
        if(ptr != null) {
            inorderToArray(ptr.left, arrOfNodesParameter, i);
            //add to array, increment index
            arrOfNodesParameter[i] = (BSTNode<T>) ptr;
            i++;
            inorderToArray(ptr.right, arrOfNodesParameter, i);
        }

        return arrOfNodesParameter;
    }

    protected int findHeight(BSTNode<T> ptr)
    {
        if (ptr == null)
            return -1;
        else
        {
            int leftHeight = findHeight(ptr.left);
            int rightHeight = findHeight(ptr.right);

            /* use the larger one */
            if (leftHeight > rightHeight)
                return (leftHeight + 1);
            else
                return (rightHeight + 1);
        }
    }

    protected String inorderDFT(BSTNode<T> ptr) {
        if(ptr != null) {
            inorderDFT(ptr.left);
            resultStr += ptr.toString() + ";";
            inorderDFT(ptr.right);
            return resultStr;
        }

        return resultStr;
    }

    protected boolean inorderContains(BSTNode ptr, T value) {
        if(ptr != null) {
            inorderContains(ptr.left, value);
            if(ptr.getVal().equals(value)) {
                return true;
            }
            inorderContains(ptr.right, value);
        }

        return false;
    }

    protected BSTNode<T> inorderFind(BSTNode<T> ptr, T value) {
        if(ptr != null) {
            inorderFind(ptr.left, value);
            if(ptr.getVal().equals(value))
                return (BSTNode<T>) ptr;                                             //???????????????????????
            inorderFind(ptr.right, value);
        }

        return null;
    }

    protected Object[] getNodesOnH(BSTNode<T> ptr, int curLev, int height, Object[] arrOfNodesOnLevel, int i) {
        if(ptr == null) {
            return null;
        }

        if (curLev == height) {
            arrOfNodesOnLevel[i] = (BSTNode<T>) ptr;
            i++;
        }

        getNodesOnH(ptr.left, curLev++, height, arrOfNodesOnLevel, i);
        getNodesOnH(ptr.right, curLev++, height, arrOfNodesOnLevel, i);

        return arrOfNodesOnLevel;
    }
}
