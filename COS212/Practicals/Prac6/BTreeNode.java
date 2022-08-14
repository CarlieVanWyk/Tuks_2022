@SuppressWarnings("unchecked")
class BTreeNode<T extends Comparable<T>> {
	boolean leaf;
	int keyTally;
	Comparable<T> keys[];
	BTreeNode<T> references[];
	int m;
	static int level = 0;
	// Constructor for BTreeNode class
	public BTreeNode(int order, boolean leaf1)
	{
    		// Copy the given order and leaf property
		m = order;
    		leaf = leaf1;
 
    		// Allocate memory for maximum number of possible keys
    		// and child pointers
    		keys =  new Comparable[2*m-1];
    		references = new BTreeNode[2*m];
 
    		// Initialize the number of keys as 0
    		keyTally = 0;
	}

	// Function to print all nodes in a subtree rooted with this node
	public void print()
	{
		level++;
		if (this != null) {
			System.out.print("Level " + level + " ");
			this.printKeys();
			System.out.println();

			// If this node is not a leaf, then 
        		// print all the subtrees rooted with this node.
        		if (!this.leaf)
			{	
				for (int j = 0; j < 2*m; j++)
    				{
        				if (this.references[j] != null)
						this.references[j].print();
    				}
			}
		}
		level--;
	}

	// A utility function to print all the keys in this node
	private void printKeys()
	{
		System.out.print("[");
    		for (int i = 0; i < this.keyTally; i++)
    		{
        		System.out.print(" " + this.keys[i]);
    		}
 		System.out.print("]");
	}

	// A utility function to give a string representation of this node
	public String toString() {
		String out = "[";
		for (int i = 1; i <= (this.keyTally-1); i++)
			out += keys[i-1] + ",";
		out += keys[keyTally-1] + "] ";
		return out;
	}

	////// You may not change any code above this line //////

	////// Implement the functions below this line //////

	// Function to insert the given key in tree rooted with this node
	public BTreeNode<T> insert(T key)
	{
		BTreeNode<T> fakeRoot = this;
		BTreeNode<T> newNode = null;

		// Your code goes here
		if(checkFakeRootTally(fakeRoot)) {
			newNode = new BTreeNode<T>(m, false);

			newNode.references[0] = fakeRoot;
			BTreeNode<T> temp;
			temp= null;

			temp = fakeRoot;
			goAndprint(fakeRoot,fakeRoot);

			newNode.splN(0, fakeRoot);

			int index;
			int postIndex = -1;
			index = 0;
			if (checkNewNodeKeyComparison(newNode, key)) {
				postIndex = index;
				index++;
//				System.out.println(postIndex);
			}
			newNode.references[index].fullN(key);
//			newNode.references[postIndex].fullN(key);

			fakeRoot = newNode;

		}
		else {
			fakeRoot.fullN(key);
		}
		return fakeRoot;
	}

	// Function to search a key in a subtree rooted with this node
	public BTreeNode<T> search(T key)
	{
		BTreeNode<T> sm ;
		sm= this;
		return searchHelp(sm,key);
	}

	private BTreeNode<T> searchHelp(BTreeNode<T> n, T k){
		if(n !=null) {
			int i = 1;
			for (; i <= n.keyTally && n.keys[i - 1].compareTo(k) < 0; i++);
			if (i > n.keyTally || n.keys[i - 1].compareTo(k) > 0) {
				return searchHelp(n.references[i - 1], k);
			} else
				return n;
		}
		return null;
	}

	// Function to traverse all nodes in a subtree rooted with this node
	public void traverse()
	{
    		// Your code goes here
		int index = 0;
		while(index < keyTally) {
			if(checkLeaf(this) == false) {
				references[index].traverse();
			}
			printKeys(index);
			index += 1;
		}

		//print keys of last leaf node whose parent is this node
		if(leaf == false) {
			goToLastLeafNode(index);
		}

	}


	//helper functions for traverse
	public boolean checkLeaf(BTreeNode<T> node) {
		return node.leaf;
	}

	public void printKeys(int index) {
		System.out.print( " " + keys[index]);
	}

	public void goToLastLeafNode(int index) {
		references[index].traverse();
	}



	//helper functions for insert
	public boolean checkFakeRootTally(BTreeNode<T> fakeRoot){

		if(fakeRoot.keyTally == 2*m-1){
			return true;
		}
		else
			return false;
	}

	public boolean checkNewNodeKeyComparison(BTreeNode<T> newNode, T key){

		if(newNode.keys[0].compareTo(key) < 0){
			return true;
		}
		else
			return false;
	}


	public void splN(int i, BTreeNode<T> bleh) {
		BTreeNode<T> aNode = new BTreeNode<T>(bleh.m, bleh.leaf);
		aNode.keyTally = m-1;

		int theorder;
		theorder = 2*m;
//		System.out.println(theorder);
		theorder = theorder+1;
//		System.out.println(theorder);

		BTreeNode<T> print1,print2;
		int theCounter =0;
		for(; theCounter < m-1; theCounter++) {
			print1 = aNode;
			aNode.keys[theCounter] =bleh.keys[theCounter+m];
			print2 = bleh;
//			System.out.println(print1);
//			System.out.println(print2);
		}

		BTreeNode<T> temp;
		temp = aNode;


		BTreeNode<T> temp2;
		temp2 = aNode;
		goAndprint(temp,temp2);

		theCounter =0;
		if(checkBlehLeaf(bleh)){
			for(; theCounter < m; theCounter++){
				aNode.references[theCounter] = bleh.references[theCounter+m];
			}
		}

		bleh.keyTally = m-1;

		theCounter =keyTally;
		for(; theCounter >= i+1; theCounter--){
			references[theCounter+1] = references[theCounter];
		}

		references[i+1] = aNode;

		theCounter =keyTally - 1;
		for(; theCounter >= i; theCounter--){
			keys[theCounter+1] = keys[theCounter];
		}

		unlinkTheNode(aNode,bleh,i);

		Comparable<T> copyover[];
		copyover = null;
		copyover = bleh.keys;
		int orderm;
		orderm = m;

		keys[i] = bleh.keys[orderm-1];
//		BTreeNode<T> temp;
		temp = aNode;


//		BTreeNode<T> temp2;
		temp2 = aNode;
		goAndprint(temp,temp2);
		keyTally = keyTally +1;
	}

	private void goAndprint(BTreeNode<T> temp, BTreeNode<T> temp2) {
//		System.out.println(temp);
//		System.out.println(temp2);
	}

	public void fullN(T key){
		int i = keyTally-1;


		if(checkLeaf2()) {
			Comparable<T> copyover[];
			for( ; i >= 0 && keys[i].compareTo(key) > 0; i--){
				keys[i+1] = keys[i];
			}
			copyover = null;
			copyover = keys;

			keys[i+1] = key;
			keyTally = keyTally+1;
//			System.out.println(copyover);
		}
		else {
			for(; i >= 0 && keys[i].compareTo(key) > 0; i--);

			Comparable<T> copyover2[];

			copyover2 = null;

			if(references[i+1].keyTally == 2*m-1){
				splN(i+1, references[i+1]);

				copyover2 = keys;

				if(keys[i+1].compareTo(key) < 0) {
					i++;
				}
				//			System.out.println(copyover2);
			}

			references[i+1].fullN(key);
		}


	}

	private void unlinkTheNode(BTreeNode Holder, BTreeNode oldRoot,int i) {
		setRefrences(Holder,i);
		if(Holder.references[0] != null && oldRoot.references[0] != null) {
			NowGoAhead(Holder,oldRoot,i);
		}else{
//            System.out.println("not hello");
		}
	}

	private void setRefrences(BTreeNode<T> Holder, int i) {
		references[i+1] = getNode(Holder);
	}

	private BTreeNode<T> getNode(BTreeNode<T> n){
		return n;
	}

	private void NowGoAhead(BTreeNode Holder, BTreeNode oldRoot,int i) {
//        System.out.println("hello");
		int thelenght;
		int theOtherLenght;
		thelenght = oldRoot.references.length;
		BTreeNode<T> tempH;
		theOtherLenght = Holder.references.length - 1;
		BTreeNode<T> tempO;
		for (int ab = 0; ab < thelenght ; ab++) {
			tempH = Holder;
//            System.out.println(tempH);
			tempO = oldRoot;
//            System.out.println(oldRoot);
			tempH = null;
			tempO =null;
			for (int ba = 0; ba < theOtherLenght; ba++) {
				tempH = Holder;
//            System.out.println(tempH);
				tempO = oldRoot;
//            System.out.println(oldRoot);
				tempH = null;
				tempO =null;
				if (oldRoot.references[ab] != null && oldRoot.references[ab].equals(Holder.references[ba])) {
					tempH = Holder;
//            System.out.println(tempH);
					tempO = oldRoot;
//            System.out.println(oldRoot);
					tempH = null;
					tempO =null;
					goMakeOldRootNull(oldRoot,ab);
				}
			}
		}
	}

	private void goMakeOldRootNull(BTreeNode<T> oldRoot, int ab) {
		oldRoot.references[ab] = null;
	}

	public boolean checkLeaf2(){
		if(leaf == true){
			return true;
		}
		else
			return false;
	}

	public boolean checkBlehLeaf(BTreeNode<T> bleh){
		if(bleh.leaf == false){
			return true;
		}
		else
			return false;
	}

}
