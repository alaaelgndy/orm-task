- List what is good and bad about the code inside ```Models``` folder.

1 - good 
	1 - comments on code

2 - bad
	1 - interface has getter and setter
	2 - interface has functions (getFields , getTableName) and basemodel has this functions as abstract methods
	3 - basemodel has many responcplity like (connection)
	4 - cacheing in insert and update methods
	5 - getConnection and tableName and getFields in every method

***====================================================================================================================***

- Can you call this code as clean code or not? Clarify your answer.

** we have good nameing Convention but this code has not enough principles to call it clean code like 'DRY' principle and namespace principle

***====================================================================================================================***

- If you are going to refactor this code, What is the list of considerations you will care about?

1 - reading and understand this code 
2 - seperate this code principles as objects 
	1 - connection
	2 - Model
	3 - cacheing
	4 - relations
3 - start with my contracts
	1 - interfaces and abstract classes
4 - create my helper traits
	1 - cacheable
	2 - HandleArrays
	3 - HandleConnections
	4 - HasRelation


***====================================================================================================================***


