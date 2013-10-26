 <?php
	session_start ();
	require ("../inc/common.php");
	?>
<!DOCTYPE HTML>
<html lang="zh-cn">
<head>
 <?php
	$title = "acm模版 ~ STL";
	require BASE_INC . 'head.inc.php';
	?>
<link href="<?php echo MAIN_DOMAIN;?>css/main.css" rel="stylesheet">
<style type="text/css">
.section {
	border: 1px dotted greenyellow;
	margin: 5px;
	padding: 1px;
}

.subsection {
	margin-left: 20px;
	margin-right: 20px;
	border: 1px dotted rgb(102, 85, 85);
	margin-top: 5px;
}

.subsubsection {
	margin-left: 40px;
	margin-right: 40px;
	border: 1px dotted rgb(102, 85, 85);
	margin-top: 5px;
}
</style>
</head>
<script type="text/javascript">
var MAIN_DOMAIN = "<?php echo MAIN_DOMAIN; ?>";
</script>

<body>
	<header class="fixed-header">
		<div class="title">
			<a href="<?php echo MAIN_DOMAIN; ?>acm/">acm模版 </a>
		</div>
	</header>

	<section class="fixed-content">

		<div class="section">
			<div class="section-title">
				<h2>STL</h2>

			</div>
			<div></div>
			<div class="subsection">
				<h3>vector</h3>
				<pre class="prettyprint">
sront() 返回首元素。
back() 返回尾元素。
push_back(x) 向表尾插入元素 x。
size() 返回表长。
empty() 当表空时，返回真，否则返回假。
pop_back() 删除表尾元素。
begin() 返回指向首元素的随机存取迭代器。
end() 返回指向尾元素的下一个位置的随机存取迭代器。
insert(it, x) 向迭代器 it 指向的元素前插入新元素 val。
clear() 删除容器中的所有的元素。
</pre>

			</div>
			<div class="subsection">
				<h3>优先队列</h3>
				<pre class="prettyprint">
头文件：\#include&lt;queue&gt;
优先队列，也就是原来我们学过的堆，按照自己定义的优先级出队时。默认情况下底层是以 Vector 实现的heap。
既然是队列，也就只有入队、出队、判空、大小的操作，并不具备查找功能。

函数列表：
empty() 如果优先队列为空，则返回真 
pop() 删除第一个元素 
push() 加入一个元素 
size() 返回优先队列中拥有的元素的个数 
top() 返回优先队列中有最高优先级的元素

一：最基本的功能
优先队列最基本的功能就是出队时不是按照先进先出的规则，而是按照队列中优先级顺序出队。
知识点：
1、一般存放实型类型，可比较大小
2、默认情况下底层以 Vector 实现
3、默认情况下是大顶堆，也就是大者优先级高，后面可以自定义优先级比较规则

二：次基本的功能
可以将一个存放实型类型的数据结构转化为优先队列，这里跟优先队列的构造函数相关。
上面那个默认构造一个空的优先队列，什么都使用默认的。
而这里使用的是 Priority_{}queue(InputIterator first,InputIterator last)
我理解的就是给出了一个容器的开口和结尾，然后把这个容器内容拷贝到底层实现(默认 vector)中去构造出优先队列。
这里也使用了一个默认的比较函数，也是默认大顶堆
例如： 
int a[5]={3,4,5,2,1};
priority_queue&lt;int&gt; Q(a,a+5);

三 应该掌握的功能:
这个里面定义了一个制定存放元素(Node),底层实现以vector 实现（第二个参数）,优先级为小顶堆(第三个参数)。
前两个参数没什么说的，很好理解，其中第三个参数，
默认有三写法：
小顶堆：greater&lt;TYPE&gt;
大顶堆：less&lt;TYPE&gt;
如果想自定义优先级而 TYPE 不是基本类型，而是复杂类型，例如结构体、类对象，则必须重载其中的operator().

见下面的例子。
typedef struct {int a,b;}Node; //自定义优先级类型
struct cmp{
	bool operator()(const Node &amp;t1,const Node &amp;t2){
		return t1.b&lt;t2.b;//相当于 less,大顶堆 
	}
};
priority_queue&lt;Node,vector&lt;Node&gt;,cmp&gt; Q;

或者直接重载小于号

struct Node{
    int a;
    Node(int a=0):a(a){}
    bool operator&lt;(const Node &amp;t2)const {
        return this-&gt;a &lt; t2.a;// &lt; : 大堆 ； &lt; : 小堆
    }
}; //自定义优先级类型
priority_queue&lt;Node&gt; Q;
</pre>

			</div>
			<div class="subsection">
				<h3>排序</h3>
				<pre class="prettyprint">
sort 对给定区间所有元素进行排序
stable_sort 对给定区间所有元素进行稳定排序
partial_sort 对给定区间所有元素部分排序
partial_sort_copy 对给定区间复制并排序
nth_element 找出给定区间的某个位置对应的元素
is_sorted 判断一个区间是否已经排好序
partition 使得符合某个条件的元素放在前面
stable_partition 相对稳定的使得符合某个条件的元素放在前面

sort
sort 函数需包含\#include &lt;algorithm&gt;
sort(begin,end)，表示一个范围，默认升序，基本类型
可以这样写
sort(begin,end,compare) 可实现自定义的排序，主要用于自定义类型

bool compare(T a,T b){
	return a-b;
} 
bool operator &lt; (const T &amp;m)const {
 return num &gt; m.num;
}
对于基本类型，可以不编写 compare
升序：sort(begin,end,less&lt;data-type&gt;());
降序：sort(begin,end,greater&lt;data-type&gt;()).
</pre>

			</div>
			<div class="subsection">
				<h3>qsort()</h3>
				<pre class="prettyprint">
原型:
_CRTIMP void __cdecl qsort (void*, size_t, size_t,int (*)(const void*, const void*));
解释: qsort ( 起始地址,元素个数,元素大小，比较函数) 
比较函数是一个自己写的函数 
遵循 int com(const void *a,const void *b) 的格式。
当 a b 关系为 &gt; &lt; = 时，分别返回正值 负值 零 （或者相反）。
使用 a b 时要强制转换类型，从 void * 转换回应有的类型后，进行操作。 
数组下标从零开始,个数为 N, 下标 0-(n-1)。
int compare(const void *a,const void *b){
	return *(int*)b-*(int*)a; 
}
</pre>

			</div>
			<div class="subsection">
				<h3>双向队列 deque</h3>
				<pre class="prettyprint">
size Return size 
empty Test whether container is empty 
push_back Add element at the end 
push_front Insert element at beginning 
pop_back Delete last element 
pop_front Delete first element 
front Access first element 
back Access last elemen
</pre>

			</div>
			<div class="subsection">
				<h3>队列 queue</h3>
				<pre class="prettyprint">
empty Test whether container is empty
size Return size
front Access next element
back Access last element
push Insert element
pop Delete next element
</pre>

			</div>
			<div class="subsection">
				<h3>栈 stack</h3>
				<pre class="prettyprint">
empty() Test whether container is empty 
size() return size 
top() access next element
push() add element
pop() remove element
</pre>

			</div>
			<div class="subsection">
				<h3>bitset</h3>
				<pre class="prettyprint">
to_ulong Convert to unsigned long integer
to_string Convert to string
count Count bits set
size Return size
test Return bit value
any Test if any bit is set
none Test if no bit is set
set (int pos） Set bits
reset（int pos） Reset bits
flip Flip bits
</pre>

			</div>
		</div>
	</section>

	<script src="<?php echo DOMAIN_JS;?>jquery.js"></script>
	<footer>
     <?php  require BASE_INC . 'footer.inc.php'; ?>
     </footer>
	<script src="<?php echo DOMAIN_JS;?>main.js"></script>
</body>
</html>

