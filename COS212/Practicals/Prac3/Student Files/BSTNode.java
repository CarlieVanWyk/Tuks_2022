public class BSTNode<T extends Comparable<T>> {
    private T value;
    public BSTNode<T> right;
    public BSTNode<T> left;

    public boolean recInsert(T val){
        if(val.compareTo(value) == 0)
            return false;

        if(val.compareTo(value) < 0)
        {
            if(left == null)
            {
                left = new BSTNode<>(val);
                return true;
            } else {
                return left.recInsert(val);
            }
        } else {
            if(right == null)
            {
                right = new BSTNode<>(val);
                return true;
            } else {
                return right.recInsert(val);
            }
        }
    }

    //Implement the following

    public BSTNode(T val){
        this.value = val;
        left = null;
        right = null;
    }

    public T getVal(){
        return value;
    }

    public String toString(){
        String result;

        if (this.left == null && this.right != null) {
            result = "L[]V[" + this.value + "]R[" + right.getVal() + "]";
        }
        else if (this.left != null && this.right == null) {
            result = "L[" + left.getVal() + "]V[" + this.value + "]R[]";
        }
        else if (this.left == null && this.right == null) {
            result = "L[]V[" + this.value + "]R[]";
        }
        else {
            result = "L[" + left.getVal() + "]V[" + this.value + "]R[" + right.getVal() + "]";
        }

        return result;
    }

    //ADD HELPER FUNCTIONS HERE
}
