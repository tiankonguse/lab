 <?php
	session_start ();
	require ("../inc/common.php");
	?>
<!DOCTYPE HTML>
<html lang="zh-cn">
<head>
 <?php
	$title = "acm模版 ~ 数据结构";
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
				<h2>数据结构</h2>

			</div>
			<div class="subsection">
				<h3>数的范围</h3>
				<pre class="prettyprint c">
int  2147483647; 10^9
int   -2147483648;
long long  9223372036854775807; 10^18
long long   -9223372036854775808;
sqrt(INT_MAX)=46340
</pre>

			</div>
			<div class="subsection">
				<h3>素数专题</h3>
				<pre class="prettyprint c">
素数定理：pi(x)/x*ln(x)=1,pi(x)表示小于x的素数的个数
孪生素数猜想:存在无穷个p,p+2的素数对
PS：陈景润证明的存在无穷个素数p，p+2至多有两个素数因子，及传说当中的"1+2"问题
哥德巴赫猜想:每个大于2的偶数是两个素数的和
n\^2{}+1猜想:存在无穷个n\^2{}+1这样形式的素数
埃拉托斯尼斯筛法：正整数n是素数，当且仅当它不能被任何小于n的平方根的素数整除。
有时候素数的范围很大，不能把所有的素数表打出来，就要只存部分素数。 
如果求区间的素数，就对区间进行筛法
</pre>


				<div class="subsubsection">
					<h4>素数表基本晒法</h4>
					<pre class="prettyprint c">
const int N=1000000;
const int M=300000;
bool is[N]; 
int prm[M];
int getprm(){
	int e = (int)(sqrt(0.0 + N) + 1),k=0,i;
	memset(is, 1, sizeof(is));
	prm[k++] = 2; is[0] = is[1] = 0;
	for (i = 4; i &lt; N; i += 2) is[i] = 0;
	for(i=3;i &lt; e;i+=2){
		if(is[i]){
			prm[k++]=i;
			for(int s=i+i,j=i*i;j &lt; N;j+=s)is[j]=0;
		}
	}
	for (; i &lt; N; i += 2)
		if (is[i])prm[k++] = i;
	return k; 
}
</pre>
				</div>

				<div class="subsubsection">
					<h4>压位筛素数</h4>
					<pre class="prettyprint c">
typedef long long LL;
LL NN = 2147483647LL;
const int N= (2147483647 &gt;&gt; 3)+1;
const int M=14630853;
char is[N];
LL prm[M];
void setIs(int pos){
    is[pos &gt;&gt; 3] &amp;= ~(1&lt;&lt;(pos%8));
}

bool getIs(int pos){
    return is[pos &gt;&gt; 3] &amp; (1&lt;&lt;(pos%8));
}

int getprm(){
	int e = (int)(sqrt(0.0 + NN) + 1),k=0,i;
	memset(is, 0XFF, sizeof(is));

	prm[k++] = 2;
	setIs(0);
	setIs(1);
	for (i = 4; i &lt; NN; i += 2){
        setIs(i);
	}

	for(i=3;i &lt; e;i+=2){
		if(getIs(i)){
			prm[k++]=i;
			for(int s=i+i,j=i*i;j &lt; NN;j+=s){
                setIs(j);
			}
		}
	}
	for (; i &lt; NN; i += 2)
		if (getIs(i))prm[k++] = i;
	return k;
}
</pre>
				</div>

				<div class="subsubsection">
					<h4>sieve</h4>
					<pre class="prettyprint">
//cnt[1e7] = 664579, cnt[1e6] = 78498
//mark[i] : the minimum factor of i (when i is a prime, mark[i] == i)
int const maxn = 1e7;
int pri[maxn], mark[maxn], cnt;
void sieve() {
	cnt = 0, mark[0] = mark[1] = 1;
	for (int i = 2; i &lt; maxn; i++) {
		if (!mark[i]) pri[cnt++] = mark[i] = i;
		for (int j = 0; pri[j] * i &lt; maxn; j++) {
			mark[ i * pri[j] ] = pri[j];
			if (i % pri[j] == 0) break;
		}
	}
}
</pre>
				</div>

				<div class="subsubsection">
					<h4>小舟学长的筛法</h4>
					<pre class="prettyprint c">
const int N=1000000;
const int M=300000;
int mark[N];//最小因子
int prm[M];
int cnt;

int getprm(){
	int j,i;
	memset(mark, 0, sizeof(mark));

    cnt = 0;
    mark[0] = mark[1] = 1;

    for(i = 2; i &lt; N; ++i){
        if(!mark[i]){
            prm[cnt++] = mark[i] = i;
        }
        for(j=0;prm[j]*i &lt; N;++j){
            mark[i*prm[j]] = prm[j];
            if(i%prm[j] == 0)break;
        }
    }
    return cnt;
}
</pre>
				</div>

				<div class="subsubsection">
					<h4>区间素数</h4>
					<pre class="prettyprint c">
bool _is[N];
int _prm[N], _num;
void rangePrime(LL L, LL U) {
    LL i,k,size=U-L,tmp;
    _num = 0;
    memset(_is,1,sizeof(_is));

    for(i=0; i &lt;= num &amp;&amp; prm[i]*prm[i]&lt;=U; ++i) {
        k = (L + prm[i] - 1)/prm[i];
        while(k &lt;= 1) {
            k++;
        }
        tmp = k*prm[i];
        while(tmp &lt;= U) {
            _is[tmp - L] = 0;
            tmp += prm[i];
        }
    }

    for(i = 0; i &lt;= size; ++i) {
        if(_is[i]) {
            _prm[_num++]=i+L;
        }
    }
}
</pre>
				</div>

				<div class="subsubsection">
					<h4>sieve 100000 primes &gt; 1e12</h4>
					<pre class="prettyprint">
//or java.BigInteger -&gt; nextProbablePrime();
typedef long long ll;
int const maxn = 4e6;
ll const start = 1e12, end = start + 3e6;

int pri[maxn], cnt; bool mark[maxn];
ll pl[maxn]; int pnt; bool markl[maxn];

void __sieve_large() {
    cnt = 0, mark[0] = mark[1] = true;
    for (int i = 2; i &lt; maxn; ++i) {
        if (!mark[i]) pri[cnt++] = i;
        for (int j = 0; i * pri[j] &lt; maxn; ++j) {
            mark[i * pri[j]] = true;
            if (!(i % pri[j])) break;
        }
    }
    ll pos;
    for (int i = 0; i &lt; cnt; ++i) {
        if (start % pri[i] == 0) pos = start;
        else pos = start - start % pri[i] + pri[i];
        for (; pos &lt;= end; pos += pri[i]) {
            markl[pos - start] = true;
        }
    }
    pnt = 0;
    for (int i = 0; i &lt;= end - start; ++i) {
        if (!markl[i]) pl[pnt++] = start + i;
    }
}
</pre>
				</div>

				<div class="subsubsection">
					<h4>反素数</h4>

					<pre class="prettyprint c">
对于任何正整数x,其约数的个数记做g(x).
例如g(1)=1,g(6)=4.
如果某个正整数x满足:对于任意i(0&lt;i&lt;x),都有g(i)&lt;g(x),则称x为反素数.

int rprim[35][2] = {498960,200,332640,192,277200,180, 
221760,168,166320,160,110880,144,83160,128,55440,120,
50400,108,45360,100,27720,96,25200,90,20160,84,15120,
80,10080,72,7560,64,5040,60,2520,48,1680,40,1260,36,
840,32,720,30,360,24,240,20,180,18,120,16,60,12,48,
10,36,9,24,8,12,6,6,4,4,3,2,2,1,1};

typedef __int64 INT;
INT bestNum;   //约数最多的数
INT bestSum;   //约数最多的数的约数个数
const int M=1000; //反素数的个数 
INT n=500000;//求n以内的所有的反素数
INT rprim[M][2];
//2*3*5*7*11*13*17&gt;n，所以只需考虑到17即可
INT sushu[14]={2,3,5,7,11,13,17,19,23,29};  

//当前走到num这个数，接着用第k个素数，num的约数个数为sum，
//第k个素数的个数上限为limit
void getNum(INT num,INT k,INT sum,INT limit)  {
 	if(num&gt;n)return;
	if(sum&gt;bestSum){
		bestSum = sum,bestNum = num;;
	}else if(sum == bestSum &amp;&amp; num &lt; bestNum){  
		//约数个数一样时，取小数
		bestNum = num;
	}

	//只需考虑到素数17,即sushu[6]
	if(k&gt;=7) return; 
	
	//素数k取i个
	for(INT i=1,p=1;i&lt;=limit;i++){   
		p*=sushu[k];
		getNum(num*p,k+1,sum*(i+1),i);
	}
}
//求大于等于log2（n）的最小整数
INT log2(INT n){  
	INT i = 0,p = 1;
	while(p&lt;n){p*=2,i++;}
	return i;
}
int getrprim(){
	int i = 0;
	while(n&gt;0){
		bestSum =bestNum = 1;
		getNum(1,0,1,log2(n));
		n = bestNum - 1;
		rprim[i][0]=bestNum;
		rprim[i][1]=bestSum;
		i++;
	}
	return i;	
}
</pre>
				</div>


			</div>
			<div class="subsection">
				<h3>大素数</h3>
				<pre class="prettyprint c">
pow_mod 见x^n mod c非递归版
muti_mod 见(a*b) mod c
cons int S=20; 越大正确率越大
factor是一个向量，储存N的素数因子
</pre>


				<div class="subsubsection">
					<h4>素数测试的GCD</h4>
					<pre class="prettyprint c">
LL gcd(LL a,LL b){
    if (a==0) return 1;
    if (a&lt;0) return gcd(-a,b);
    while (b){
        LL t=a%b; a=b; b=t;
    }
    return a;
}
</pre>
				</div>

				<div class="subsubsection">
					<h4>检验n是不是合数</h4>
					<pre class="prettyprint c">
//以a为基，n-1=x*2^t
bool check(LL a,LL n,LL x,LL t){   
    LL ret=pow_mod(a,x,n),last=ret;
    for (int i=1;i&lt;=t;i++){
        ret=muti_mod(ret,ret,n);
        if (ret==1 &amp;&amp; last!=1 &amp;&amp; last!=n-1) return 1;
        last=ret;
    }
    if (ret!=1) return 1;
    return 0;
}
</pre>
				</div>



				<div class="subsubsection">
					<h4>大素数测试</h4>
					<pre class="prettyprint c">
bool Miller_Rabin(LL n){
    LL x=n-1,t=0;
    while ((x&amp;1)==0) x&gt;&gt;=1,t++;
    bool flag=1;
    if (t&gt;=1 &amp;&amp; (x&amp;1)){
        for (int k=0;k&lt;S;k++){//s=20
            LL a=rand()%(n-1)+1;
            if (check(a,n,x,t)) {flag=1;break;}
            flag=0;
        }
    }
    if (!flag || n==2) return 0;
return 1;   
}
</pre>
				</div>

				<div class="subsubsection">
					<h4>pollard_rho分解</h4>
					<pre class="prettyprint c">
// 得到一个因数.返回N时为一个没有找到 
LL Pollard_rho(LL x,LL c){
    LL i=1,x0=rand()%x,y=x0,k=2;
    while (1){
        i++;
        x0=(muti_mod(x0,x0,x)+c)%x;
        LL d=gcd(y-x0,x);
        if (d!=1 &amp;&amp; d!=x)return d;
        if (y==x0) return x;
        if (i==k)y=x0,k+=k;
    }
}
</pre>
				</div>


				<div class="subsubsection">
					<h4>质因数分解N</h4>
					<pre class="prettyprint c">
void findfac(LL n){           
    if (!Miller_Rabin(n)){
        factor.push_back(n);//factor为一个向量
        return;
    }
    LL p=n;
    while (p&gt;=n) p=Pollard_rho(p,rand() % (n-1) +1);
    findfac(p);
    findfac(n/p);
}
</pre>
				</div>


			</div>
			<div class="subsection">
				<h3>梅森素数</h3>
				<pre class="prettyprint c">
m是一个素数，M=2^m-1也是一个素数，则M是梅森素数。
使用大素数测试得到森素数。
</pre>



			</div>
			<div class="subsection">
				<h3>费马小定理</h3>
				<pre class="prettyprint c">
如果p是素数，则a^{p − 1} ≡ 1(mod p)对所有整数a都成立
</pre>



			</div>
			<div class="subsection">
				<h3>欧拉函数</h3>
				<div class="subsubsection">
					<h4>欧拉原理</h4>
					<pre class="prettyprint c">
a^{phi(n)} ≡  1 (mod n) gcd(a, n) = 1
</pre>
				</div>

				<div class="subsubsection">
					<h4>一些结论</h4>
					<pre class="prettyprint c">
a为N的质因数
若 (N/a)\%a == 0 则有 E(N) = E(N/a)*a.
若 (N/a)\%a !=0则有 E(N) = E(N/a)*(a-1)
一个数的所有质因子之和 F（n）*n/2.
</pre>
				</div>


				<div class="subsubsection">
					<h4>第n个与m互质的数</h4>
					<pre class="prettyprint c">
如果求与m互质的第n个数，可以先把小于m的互质的数错在ans中（筛法求）
（从1开始存，最后一个存在0中），然后大于m的互质的数都是小于m的互质的数加上若干个m得到的。
int euler(int n,int m){
    memset(map,true,sizeof(map));
    int i=0,num=n;
    for(;num!=1; i++;){
        if(num%prim[i]==0){
            while(num%prim[i]==0)num/=str[i];
            for(int j=prim[i];j&lt;=n;j+=prim[i]){
                map[j]=false;
            }
        }
    }
    num=0;
    for(i=1;i&lt;n;i++){
        if(map[i]){
            ans[++num]=i;
        }
    }
    ans[0]=ans[num];
    return ans[m%num]+(m-1)/num * n;
}
</pre>
				</div>

			</div>
			<div class="subsection">
				<h3>sieve phi</h3>
				<pre class="prettyprint">
int const maxn = 1e6;
int pri[maxn], cnt;
int phi[maxn];
void __sieve_phi() {
    cnt = 0, phi[1] = 1;
    for (int i = 2; i &lt; maxn; ++i) {
        if (!phi[i]) {
            pri[cnt++] = i;
            phi[i] = i - 1;
        }
        for (int j = 0; pri[j] * i &lt; maxn; ++j) {
            if (!(i % pri[j])) {
                phi[i * pri[j]] = phi[i] * pri[j];
                break;
            }
            else {
                phi[i * pri[j]] = phi[i] * (pri[j] - 1);
            }
        }
    }
}
</pre>

				<div class="subsubsection">
					<h4>打表欧拉函数</h4>
					<pre class="prettyprint c">
这个表存的是小于N的数的欧拉函数
const int N=10000; 
int phi[N+1]; 
void ruler(){ 
	int i,j; 
	for (i = 1; i &lt;= N; i++) phi[i] = i;
	for (i = 2; i &lt;= N; i += 2) phi[i] /= 2;
	for (i = 3; i &lt;= N; i += 2) 
		if(phi[i] == i) {
			for (j = i; j &lt;= N; j += i)
				phi[j] = phi[j] / i * (i - 1);
		}
} 
</pre>
				</div>


				<div class="subsubsection">
					<h4>单独求欧拉函数(公式)</h4>
					<pre class="prettyprint c">
int euler(int x){// 就是公式
	int i, res=x;
	int max= (int)sqrt(x * 1.0) + 1; 
	for (i = 2; i &lt;max; i++)
		if(x%i==0) {
		res = res / i * (i - 1);
		while (x % i == 0) x /= i; // 保证i一定是素数
		}
	if (x &gt; 1) res = res / x * (x - 1);
	return res;
}
</pre>
				</div>


				<div class="subsubsection">
					<h4>容斥求小于a的与n互质的个数</h4>
					<pre class="prettyprint c">
str[n].count为n的质数因子的个数
Str[n].prim[]中存的就是质数因子
这个不能用简单的容斥，因为这里的除法不是全部能整除，用简单的容斥是错的。
LL myrongchi(int index,int a,int n){
	LL r=0,t;
	for(int i=index;i&lt;str[n].count;i++){
		t=a/str[n].prim[i];
		r+=t-myrongchi(i+1,t,n);
	}
	return r;	
}
</pre>
				</div>

			</div>
			<div class="subsection">
				<h3>随机数</h3>
				<div class="subsubsection">
					<h4>设置随机种子</h4>
					<pre class="prettyprint c">
srand(time(NULL));
</pre>
				</div>

				<div class="subsubsection">
					<h4>产生随机数</h4>
					<pre class="prettyprint c">
rand();
</pre>
				</div>




			</div>
			<div class="subsection">
				<h3>二分</h3>
				<div class="subsubsection">
					<h4>最大值最小化问题</h4>
					<pre class="prettyprint c">
m个正整数的序列划分成m个子连续序列，每个子序列的个数字之和为S, 使所有S中的最大S最小。
</pre>
				</div>


				<div class="subsubsection">
					<h4>数轴上点到点的距离和</h4>
					<pre class="prettyprint c">
点的中位数就是答案
如果点有奇数个，答案唯一。
如果点有偶数个，答案是个区间
</pre>
				</div>

				<div class="subsubsection">
					<h4>数轴上点到点的距离平方和</h4>
					<pre class="prettyprint c">
列出方程后，可以证明是个凸函数。
于是这个可以使用三分做。
猜想可能还是中位数。
</pre>
				</div>

				<div class="subsubsection">
					<h4>坐标系上点到点的曼哈顿距离和</h4>
					<pre class="prettyprint c">
此时，x轴与y轴没有关系了，找到x轴的中位数与y轴的中位数即可。
</pre>
				</div>

				<div class="subsubsection">
					<h4>...到点的距离平方和</h4>
					<pre class="prettyprint c">
这个经过列出等式后，可以发现，每一维是相互独立的。
而转化成了在数轴上的距离平方和问题了。
</pre>
				</div>

				<div class="subsubsection">
					<h4>...到点的距离和</h4>
					<pre class="prettyprint c">
这个需要偏导数理论。
写出偏导数后发现当其他维数固定时，这个维数还是相互独立的。
但是不使用偏导数时，我们只需使用变步长寻找即可。
例如：
1. 取步长为step，起点为(x0,y0)
2. 我们找到上下左右的四个点的值，如果有比(x0,y0)更优的值，则更新(x0,y0)。
3. 循环执行步骤2，直到(x0,y0)就是最优值。
4. 此时，步长变为原来的0.5倍，继续执行步骤2.直到step达到一定的精度。
</pre>
				</div>

				<div class="subsubsection">
					<h4>...到直线的距离和</h4>
					<pre class="prettyprint c">
思考中
</pre>
				</div>


				<div class="subsubsection">
					<h4>...到直线的距离平方和</h4>
					<pre class="prettyprint c">
思考中
</pre>
				</div>



			</div>
			<div class="subsection">
				<h3>贪心</h3>
				<div class="subsubsection">
					<h4>区间选点问题</h4>
					<pre class="prettyprint c">
取尽量少的点，使每个区间内都至少有一个点。
</pre>
				</div>

				<div class="subsubsection">
					<h4>区间覆盖问题</h4>
					<pre class="prettyprint c">
数轴上有若干区间，选尽量少的区间，覆盖指定区间。
</pre>
				</div>



			</div>
			<div class="subsection">
				<h3>GCD</h3>
				<div class="subsubsection">
					<h4>普通求公约数</h4>
					<pre class="prettyprint c">
LL gcd(LL x,LL y){
	if(!x || !y)return x?x:y;
	for(LL t;t=x%y;x=y,y=t);
	return y;
}
</pre>
				</div>

				<div class="subsubsection">
					<h4>fgcd</h4>
					<pre class="prettyprint">
#define eps 1e-8
double fgcd(double a, double b) {
	if(b &gt; -eps &amp;&amp; b &lt; eps) {
		return a;
	} else {
		return fgcd( b, fmod(a, b) );
	}
}
</pre>
				</div>

				<div class="subsubsection">
					<h4>初级GCD</h4>
					<pre class="prettyprint c">
int gcd(int a, int b) {
	if(b == 0) return a;
	else return gcd(b, a % b);
}
</pre>
				</div>

				<div class="subsubsection">
					<h4>快速求公约数</h4>
					<pre class="prettyprint c">
int kgcd(int a,int b){
	if(!a || !b)return a?a:b;
	if(!(a&amp;1) &amp;&amp; !(b&amp;1))return kgcd(a&gt;&gt;1,b&gt;&gt;1)&lt;&lt;1;
	if(!(b&amp;1))return kgcd(a,b&gt;&gt;1);
	if(!(a&amp;1))return kgcd(a&gt;&gt;1,b);
	return kgcd(b,a%b);
}
</pre>
				</div>

				<div class="subsubsection">
					<h4>浮点型fgcd</h4>
					<pre class="prettyprint c">
double fgcd(double a,double b){
    if(b &gt;= -eps &amp;&amp; b &lt; eps)return a;
    return fgcd(b,fmod(a,b));
}
</pre>
				</div>

				<div class="subsubsection">
					<h4>GCD结论</h4>
					<pre class="prettyprint c">
有俩个数p,q,且gcd(q,p)=1,则最大无法表示成px+qy（x&gt;=0,y&gt;=0)的数是pq-q-p.
</pre>
				</div>




			</div>
			<div class="subsection">
				<h3>区间内与n的gcd不小于m的个数</h3>
				<pre class="prettyprint c">
输入m, n,求1~n之间中gcd(x, n) &gt;=m 的x个数。

找出N的所有大于等于M的因子(x1,x2,x3.....xi)，然后设k=N/xi；
下面只需找出小于k且与k互质的数。
因为：设y与k互质且小于k，那么gcd（y*xi，k*xi）=xi；（xi为N的因子，且xi大于等于M）。
</pre>

			</div>
			<div class="subsection">
				<h3>扩展GCD</h3>
				<pre class="prettyprint c">
 应用：
1. 求解不定方程
2. 求解模的逆元
3. 求解同余方程
int extgcd(int a,int b,int &amp;x,int &amp;y){
	if(b==0){x=1,y=0;return a;}
	int d=extgcd(b,a%b,x,y);
	int t=x;x=y;y=t-a/b*y;
	return d;
}
</pre>


				<div class="subsubsection">
					<h4>解不定方程ax + by =n</h4>
					<pre class="prettyprint c">
（1）计算gcd(a,b)
若d=gcd(a,b)不能整除n,则方程无整数解；
否则，在方程的两边同除以gcd(a,b)，得到新的不定方程a'x+b'y=n',此时gcd(a' ,b')=1。

（2） 求出不定方程a'x+b'y=1的一组整数解x0,y0，则n'x0,n'y0是方程a'x+b'y=n'的一组整数解。（用扩展欧几里得求x0,y0）

（3）可得方程a'x+b'y=n'的所有整数解为：x=n'x+b't;y=n'y0-a't(t为整数)
这就是方程ax+by=n的所有整数解
x,y是通解
x=n/d*x0+b/d*t
y=n/d*y0-a/d*t
(t是整数) 
</pre>
				</div>



				<div class="subsubsection">
					<h4>求(a/b)\% c(乘法逆元)</h4>
					<pre class="prettyprint c">
满足b*k=1 (mod p)的k值就是b关于p的乘法逆元
当我们要求(a/b)mod p的值，且a很大，无法直接求得a/b的值时，我们就要用到乘法逆元
前提a\%b=0,gcd(b,p)=1.
我们可以通过求b关于p的乘法逆元k，将a乘上k再模p，即(a*k) mod p。其结果与(a/b)mod p等价。
证明：根据b*k=1 (mod p) 有b*k=p*x+1
k=(p*x+1)/b。把k代入(a*k) \% p，得
(a*(p*x+1)/b) % p
=((a*p*x)/b + a/b) %p
=[(p*(a*x)/b)%p + a/b] %p
=(a/b)%p
//(p*(a*x)/b)%p=0;
int div_mod(int a,int b,int c){
	int x,y;
	exgcd(b,c,x,y);
	return ((a%c)*(x%c))%c; 
} 
</pre>
				</div>




				<div class="subsubsection">
					<h4>模线性方程 a*x=b(mod n)</h4>
					<pre class="prettyprint c">
对于 a*x=b(\%n)，则存在整数y,使a*x - n*y = b.
如果有解，则有d个解，设最小正数解为x0,则解为x0+d*i,i=0,1,2,…d-1. 返回最小正数解 无解时返回-1
__int64 modeq(__int64 a,__int64 b,__int64 n){
	__int64 d,x,y;
	d=extgcd(a,n,x,y);
	if(b%d)return -1;
	return (b/d*x%n + n)%(n/d);
}
</pre>
				</div>


			</div>
			<div class="subsection">
				<h3>因子</h3>
				<div class="subsubsection">
					<h4>所有数的因子的个数 O(n*log(n))</h4>
					<pre class="prettyprint c">
//O(n*log(n))的复杂度
int const maxn = 1e6;
int num[maxn];
void sieve_factor(){
    int i,j;
    for(i=1;i&lt;maxn;++i){
        for(j=i;j&lt;maxn;j+=i){
            ++num[j];
        }
    }
}
</pre>
				</div>


				<div class="subsubsection">
					<h4>所有数的因子的个数 O(n)</h4>
					<pre class="prettyprint c">
//O(n)的复杂度
int const maxn = 1e6;
int pri[maxn],e[maxn],divs[maxn],cnt;
void sieve_factor() {
    int i,j,k;
    cnt = 0;
    for(i=2; i&lt;maxn; ++i) {
        if(!divs[i]) {
            divs[i] = 2;
            e[i] = 1;
            pri[cnt++] = i;
        }
        for(j=0; (k=i*pri[j]) &lt; maxn; ++j) {
            if(i%pri[j] == 0) {
                e[k] = e[i] + 1;
                divs[k] = divs[i] / (e[i] +1)*(e[i] + 2);
                break;
            } else {
                e[k] = 1;
                divs[k] = divs[i]&lt;&lt;1;
            }
        }
    }
}
</pre>
				</div>


				<div class="subsubsection">
					<h4>一个数的因子的个数</h4>
					<pre class="prettyprint c">
int DFun(int n){
    int res=1;
    for(int i = 2,t; i * i &lt;= n; i += 2){
        if(!(n%i)){
            t = 1;
            for(t=1;!(n%i);++t,n/=i);
            res *= t;
        }
        if(i==2){
            i--;
        }
    }
    if(n&gt;1){
        res *= 2;
    }
    return res;
}
</pre>
				</div>

				<div class="subsubsection">
					<h4>一个数的所有因子之和</h4>
					<pre class="prettyprint c">
int DsFun(int n){
    int res=1;
    for(int i = 2,t; i * i &lt;= n; i += 2){
        if(!(n%i)){
            for(t=i*i,n/=i;!(n%i);t*=i,n/=i);
            res *= (t-1)/(i-1);
        }
        if(i==2){
            i--;
        }
    }
    if(n&gt;1){
        res *= (n+1);
    }
    return res;
}
</pre>
				</div>

			</div>
			<div class="subsection">
				<h3>MOD</h3>
				<pre class="prettyprint c">
对于mod，对加减乘都符合分开计算
(a*b)%c=((a%c)*(b%c))%c ;
(a+b)%c=((a%c)+(b%c))%c ;
(a-b)%c=((a%c)-(b%c))%c ;
除法不满足，但可以用除法逆元来计算(见乘法逆元)
</pre>

				<div class="subsubsection">
					<h4>(a*b)\%c muti_mod1</h4>
					<pre class="prettyprint c">
LL muti_mod(LL a,LL b,LL c) {
    LL ret=0;
    for(a%=c,b%=c; b; a =(a&lt;&lt;1)%c,b&gt;&gt;=1) {
        if (b&amp;1) {
            ret = (ret + a)%c;
        }
    }
    return ret;
}
</pre>
				</div>

				<div class="subsubsection">
					<h4>(a*b)\%c muti_mod2</h4>
					<pre class="prettyprint c">
LL muti_mod(LL a,LL b,LL c){        
	a%=c;b%=c;
    LL ret=0;
    while (b){
        if (b&amp;1){
            ret+=a;
            if (ret&gt;=c) ret-=c;
        }
        a&lt;&lt;=1;
        if (a&gt;=c) a-=c;
        b&gt;&gt;=1;
    }
    return ret;
}
</pre>
				</div>

				<div class="subsubsection">
					<h4>a^b\%c pow_mod1</h4>
					<pre class="prettyprint c">
LL pow_mod(LL a,LL b,LL c){
	LL ret = 1;
	for(a%=c;b;b&gt;&gt;=1,a=muti_mod(a,a,c)){
        if(b&amp;1)ret = muti_mod(ret,a,c);
	}
	return ret;
}
</pre>
				</div>

				<div class="subsubsection">
					<h4>powMod</h4>
					<pre class="prettyprint">
typedef long long ll;
ll powMod(ll a, ll b, ll c){
	 ll res = 1LL;
	while (b) {
		if(b &amp; 1) res = res * a % c;
		a = a * a % c;
		b &gt;&gt;= 1;
	}
	return res;
}
</pre>
				</div>

				<div class="subsubsection">
					<h4>powMod_plus</h4>
					<pre class="prettyprint">
typedef long long ll;
inline ll mulMod(ll a, ll b, ll c){
	ll res = 0LL;
	for (; b; b &gt;&gt;= 1, a = (a &lt;&lt; 1) % c ) {
		if (b &amp; 1) res = (res + a) % c;
	}
	return res;
}
ll powMod(ll a, ll b, ll c){
	ll res = 1LL;
	for (; b; b &gt;&gt;= 1, a = mulMod(a, a, c) ) {
		if (b &amp; 1) res = mulMod(res, a, c);
	}
	return res;
}
</pre>
				</div>

				<div class="subsubsection">
					<h4>x^n 非递归版</h4>
					<pre class="prettyprint c">
LL pow_mod(LL x,LL n,LL mod){     
if (n==1) return x%mod;
    int bit[64],k=0;
    while (n){
        bit[k++]=n&amp;1;n&gt;&gt;=1;
    }
    LL ret=1;
    for (k=k-1;k&gt;=0;k--){
        ret=muti_mod(ret,ret,mod);
        if (bit[k]==1) ret=muti_mod(ret,x,mod);
    }
    return ret;
}
</pre>
				</div>

				<div class="subsubsection">
					<h4>求a^b 二进制思想</h4>
					<pre class="prettyprint c">
int pow_mod(int a,int b,int c){
	if(b==0)return 1%c;
	a%=c;
	if(c&lt;=2 || a&lt;2)return a;
	int ans=1;
	while(b){
		if(b&amp;1)ans=(ans*a)%c;
		a=(a*a)%c;
		b&gt;&gt;=1; 
	} 
	return ans; 
} 
</pre>
				</div>

				<div class="subsubsection">
					<h4>Lucas定理 求C(n+m,n)%p</h4>
					<pre class="prettyprint c">
P保证是素数，com代表组合数模P
也可以用乘法逆元做，C(n,m)=n!/(m!*(n-m)!)
LL Lucas(LL n, LL m,LL p){
    if(m ==0)  return 1;
    return  (Com(n%p, m%p,p)*Lucas(n/p, m/p))%p;
}
</pre>
				</div>

				<div class="subsubsection">
					<h4>C(n,m)%mod (div)</h4>
					<pre class="prettyprint">
typedef long long ll;
int const maxn = 1000100;
int const maxm = 100100; //cnt ~ maxn / 10
ll const mod = 1000000007;
int pri[maxm], cnt; bool mark[maxn];
int p1[maxm], p2[maxm], p3[maxm];

void sieve() {
	cnt = 0, mark[0] = mark[1] = true;
	for (int i = 2; i &lt; maxn; ++i) {
		if (!mark[i]) pri[cnt++] = i;
		for (int j = 0; i * pri[j] &lt; maxn; ++j) {
			mark[i * pri[j]] = true;
			if (!(i % pri[j])) break;
		}
	}
}

int div(int *p, int n) {
	for (int i = 0, t; ; ++i) {
		if (pri[i] &gt; n) return i;
		for (p[i] = 0, t = n; t; t /= pri[i]) {
			p[i] += t / pri[i];
		}
	}
}

ll C(int a, int b) { // a &gt;= b, sieve() first!
	int l1 = div(p1, a);
	int l2 = div(p2, a - b);
	int l3 = div(p3, b);
	ll ret = 1LL;
	for (int i = 0; i &lt; l1; ++i) {
		if (i &lt; l2) p1[i] -= p2[i];
		if (i &lt; l3) p1[i] -= p3[i];
		if (p1[i]) {
			ll r = 1LL, t = pri[i];
			while (p1[i]) {
				if (p1[i] &amp; 1) r = r * t % mod;
				t = t * t % mod;
				p1[i] &gt;&gt;= 1;
			}
			ret = ret * r % mod;
		}
	}
	return ret;
}
</pre>
				</div>

				<div class="subsubsection">
					<h4>C(n,m)%mod (inv)</h4>
					<pre class="prettyprint">
\\mod must be a prime
typedef long long ll;
ll const mod = 1000000007;
int const maxn = 100100;
ll fac[maxn], inv[maxn];
ll C(int n, int m) {
    return fac[n] * inv[m] % mod * inv[n - m] % mod;
}
ll powMod(ll a, ll b) {
    ll ret = 1LL;
    while (b) {
        if (b &amp; 1) ret = ret * a % mod;
        a = a * a % mod;
        b &gt;&gt;= 1;
    }
    return ret;
}
void Cinit() {
    fac[0] = inv[0] = 1LL;
    for (int i = 1; i &lt; maxn; ++i) {
        fac[i] = fac[i - 1] * i % mod;
        inv[i] = powMod(fac[i], mod - 2);
    }
}
</pre>
				</div>

				<div class="subsubsection">
					<h4>迭代幂</h4>
					<pre class="prettyprint c">
//迭代幂是指求：a^b^c^ .. mod p。
//通用公式：
	a^b ≡ a^(b mod ϕ(p)+ϕ(p)) (mod p)(b≥ϕ(p))。
//若p是素数，则
	a^b≡a^(b mod ϕ(p)) (mod p)。
//需要模板：
	LL gcd(LL a, LL b);
	LL euler(LL x);
	LL pow_mod(LL a,LL  b,LL c);
//证明：略
typedef long long LL;
LL str[30];
int n;

LL getPowTop(int pos, LL mod) {
	LL a, b = 1;
	for(int i = n-1; i &gt;= pos; i--) {
		a = str[i];
		LL ret = 1;
		for(; b; a *= a, b &gt;&gt;= 1) {
			if(b &amp; 1)
				ret *= a;
			if(ret &gt;= mod || a &gt;= mod){
				return -1;
			}
		}
		b = ret;
	}
	return b;
}

LL powMod(int pos,LL mod) {
    if(pos == n)return 1;
    //LL tmp = mod/gcd(str[pos],mod);
    LL phi_mod = euler(mod);
    LL b = getPowTop(pos+1,phi_mod);
    if(b == -1){
        b = powMod(pos+1, phi_mod) % phi_mod + phi_mod;
    }
    return powMod(str[pos], b , mod);
}


int main() {
    LL p;
    cin&gt;&gt;n&gt;&gt;p;
    bool ok = false;
    for(int i=0; i&lt;n; i++) {
        cin&gt;&gt;str[i];
		if(str[i] == 1)ok = true;
		f(ok)i--,n--;
    }
    cout&lt;&lt;powMod(0,p)&lt;&lt;endl;

    return 0;
}
</pre>
				</div>

				<div class="subsubsection">
					<h4>A^x % C = = B (by ac)</h4>
					<pre class="prettyprint">
typedef long long LL;
const int maxn = 65535;
struct hash
{
    int a,b,next;
} Hash[maxn &lt;&lt; 1];
int flg[maxn + 66];
int top,idx;
void ins(int a,int b)
{
    int k = b &amp; maxn;
    if(flg[k] != idx)
    {
        flg[k] = idx;
        Hash[k].next = -1;
        Hash[k].a = a;
        Hash[k].b = b;
        return ;
    }
    while(Hash[k].next != -1)
    {
        if(Hash[k].b == b) return ;
        k = Hash[k].next;
    }
    Hash[k].next = ++ top;
    Hash[top].next = -1;
    Hash[top].a = a;
    Hash[top].b = b;
}
int find(int b)
{
    int k = b &amp; maxn;
    if(flg[k] != idx) return -1;
    while(k != -1)
    {
        if(Hash[k].b == b) return Hash[k].a;
        k = Hash[k].next;
    }
    return -1;
}
int gcd(int a,int b)
{
    return b?gcd(b,a%b):a;
}
int ext_gcd(int a,int b,int&amp; x,int&amp; y)
{
    int t,ret;
    if (!b)
    {
        x=1,y=0;
        return a;
    }
    ret=ext_gcd(b,a%b,x,y);
    t=x,x=y,y=t-a/b*y;
    return ret;
}
int Inval(int a,int b,int n)
{
    int x,y,e;
    ext_gcd(a,n,x,y);
    e=(LL)x*b%n;
    return e&lt;0?e+n:e;
}
int pow_mod(LL a,int b,int c)
{
    LL ret=1%c;
    a%=c;
    while(b)
    {
        if(b&amp;1)ret=ret*a%c;
        a=a*a%c;
        b&gt;&gt;=1;
    }
    return ret;
}
int BabyStep(int A,int B,int C)
{
    top = maxn;
    ++ idx;
    LL buf=1%C,D=buf,K;
    int i,d=0,tmp;
    for(i=0; i&lt;=100; buf=buf*A%C,++i)if(buf==B)return i;
    while((tmp=gcd(A,C))!=1)
    {
        if(B%tmp)return -1;
        ++d;
        C/=tmp;
        B/=tmp;
        D=D*A/tmp%C;
    }
    int M=(int)ceil(sqrt((double)C));
    for(buf=1%C,i=0; i&lt;=M; buf=buf*A%C,++i)ins(i,buf);
    for(i=0,K=pow_mod((LL)A,M,C); i&lt;=M; D=D*K%C,++i)
    {
        tmp=Inval((int)D,B,C);
        int w ;
        if(tmp&gt;=0&amp;&amp;(w = find(tmp)) != -1)return i*M+w+d;
    }
    return -1;
}
int main()
{
    int A,B,C;
    while(scanf("%d%d%d",&amp;A,&amp;C,&amp;B)!=EOF,A || B || C)
    {
        B %= C;
        int tmp=BabyStep(A,B,C);
        if(tmp&lt;0)puts("No Solution");
        else printf("%d\n",tmp);
    }
    return 0;
}

</pre>
				</div>

			</div>
			<div class="subsection">
				<h3>汉若塔问题</h3>
				<pre class="prettyprint c">
给你初始状态start[]和最终状态finish[]，求最少移动步数。
start[]和finish[]表示第i个盘子在那个位置.
下标从1开始
LL f(int *p, int i, int final){
    if(i == 0){
        return 0;
    }else if(p[i] == final){
        return f(p,i-1,final);
    }else{
        return f(p,i-1,6-p[i]-final) + (1LL&lt;&lt;(i-1));
    }
}

LL getAns(int *start, int *finish,int n){
    LL ans = 0;
    int k = n;
    while(k&gt;=1 &amp;&amp; start[k] == finish[k])k--;
    if(k&gt;=1){
        int tmp = 6 - start[k] - finish[k];
        ans = f(start, k-1,tmp) + f(finish,k-1,tmp) + 1;
    }
    return ans;
}

</pre>


			</div>
			<div class="subsection">
				<h3>字母大小写转换 位操作</h3>
				<pre class="prettyprint c">
'A'^'a' = 32; 
</pre>


			</div>
			<div class="subsection">
				<h3>二项式展开</h3>
				<pre class="prettyprint">
$$(a+b)^n = \sum_{k=0}^n C_n^ka^{n-k}b^k$$
</pre>


			</div>
			<div class="subsection">
				<h3>阶乘</h3>
				<div class="subsubsection">
					<h4>阶乘的位数（仅有位数）</h4>
					<pre class="prettyprint">
//pku 1423 HDU 1018
double e=2.7182818284590452354;
double pi=atan2(0.0,-1.0);

int count_number_bit(int n){
	double sum=0;
	if(n&lt;100000){
	for(int i=1;i&lt;=n;i++)
		sum+=log10(i*1.0);
	}else{
	sum=log10(sqrt(2*pi*n))+n*log10(n/e);
	}
	int ans=(int)sum;
	if(ans&lt;=sum)ans++;
	return ans;
} 
</pre>
				</div>


				<div class="subsubsection">
					<h4>阶乘0的个数</h4>
					<pre class="prettyprint">
//其实0的个数至于5的个数有关，因此需要分解n!中5的个数
__int64 count_zero(__int64 m){
	__int64 sum=0;
	while(m)
		sum+=(m/=5);
	return sum;
}
</pre>
				</div>


				<div class="subsubsection">
					<h4>阶乘最后非0位</h4>
					<pre class="prettyprint">
const int mod[20]= {1,1,2,6,4,2,2,4,2,8,4,4,8,4,6,8,8,6,8,2}; 
int lastdigit(char* buf){ 
    int len=strlen(buf),a[MAXN],i,c,ret=1; 
    if (len==1) return mod[buf[0]-'0']; 
    
    for (i=0;i&lt;len;i++) 
        a[i]=buf[len-1-i]-'0'; 
    for (;len;len-=!a[len-1]){ 
        ret=ret*mod[a[1]%2*10+a[0]]%5; 
        for (c=0,i=len-1;i&gt;=0;i--) 
            c=c*10+a[i],a[i]=c/5,c%=5; 
    } 
    return ret+ret%2*5; 
}
</pre>
				</div>


				<div class="subsubsection">
					<h4>阶乘分解</h4>
					<pre class="prettyprint">
__int64 search_bit(__int64 n,__int64 m){
	__int64 sum=0;
	while(n)sum+=(n/=m);
	return sum;
}
</pre>
				</div>


				<div class="subsubsection">
					<h4>阶乘的位数（求各位数字）</h4>
					<pre class="prettyprint">
//高精度乘法
</pre>
				</div>


				<div class="subsubsection">
					<h4>阶乘素数分解</h4>
					<pre class="prettyprint">
//N!的素数银子因子分解中的素数p的幂为[n/p]+[n/p^2]+[n/p^3]+…
</pre>
				</div>

			</div>
			<div class="subsection">
				<h3>乘方a^k</h3>
				<div class="subsubsection">
					<h4>快速乘方(a^k)</h4>
					<pre class="prettyprint">
int qkpower(int a,int k){
	int ans=1,temp=a;
	while(k){
		if(k&amp;1)ans*=temp;
		temp*=temp;
		k&gt;&gt;=1; 
	} 
	return ans; 
} 
</pre>
				</div>


				<div class="subsubsection">
					<h4>A^B次方的首位数字</h4>
					<pre class="prettyprint">
//A^B=10^(A*log(B) ),即可以转化求10*（A*log(B)）的首位数字。
//对于10^X，X为一个实数，可以分解成一个整数加一个小数的和，X=Z+P。即 
//10^X=10^(Z+P)=10^Z+10^P,其中（0&lt;=P&lt;1）
//显然这里的10^Z是不会影响到10*X的首位数字。
int GetHighest(double a,double b){
    double intpart;
    double fractpart = modf(b*log10(a),&amp;intpart);
    double temp=pow((double)10,fractpart);
    modf(temp,&amp;intpart);
    return (int)intpart;  
}
</pre>
				</div>



			</div>
			<div class="subsection">
				<h3>二进制中一的个数</h3>
				<div class="subsubsection">
					<h4>自底向上分治法O(5)</h4>
					<pre class="prettyprint">
unsigned countbits(unsigned x){
unsigned mask[]={0x55555555,0x33333333, 0x0F0F0F0F,  0x00FF00FF, 0x0000FFFF};
	for(unsigned i=0,j=1;i&lt;5;i++,j&lt;&lt;=1)
x=(x &amp; mask[i]) + ((x&gt;&gt;j) &amp; mask[i]);
	return x;
} 
</pre>
				</div>


				<div class="subsubsection">
					<h4>复杂度为1的个数</h4>
					<pre class="prettyprint">
//从最低位扫描'1',每次扫描一个
unsigned _countbits(unsigned x){
	unsigned n=0;
	while(++n , x&amp;=x-1);
	return n;
} 
</pre>
				</div>


				<div class="subsubsection">
					<h4>朴素的算法O(32)</h4>
					<pre class="prettyprint">
unsigned __countbits(unsigned x){
	unsigned n=0;
	while(n+=(x&amp;1) , x&gt;&gt;=1);
	return n;
}
</pre>
				</div>

			</div>
			<div class="subsection">
				<h3>树根</h3>
				<pre class="prettyprint">
root(a+b)=root(root(a) + root(b)) 
root(a*b)=root(root(a) * root(b)) 
root(a)=root(root(a/10) + a%10)
</pre>

				<div class="subsubsection">
					<h4>n的树根 模拟</h4>
					<pre class="prettyprint">
int root(int n){
	while(n&gt;9)n=n%10+n/10;
	return n;
}
</pre>
				</div>

				<div class="subsubsection">
					<h4>n的树根 找规律</h4>
					<pre class="prettyprint">
int _root(int n){
	return n?(n+8)%9+1:0;
}
</pre>
				</div>

				<div class="subsubsection">
					<h4>n的树根 高精度</h4>
					<pre class="prettyprint">
int __root(char *p){
	int n=0;
	for(int i=0;p[i];i++)n+=p[i]-'0';
	return n?(n+8)%9+1:0;
} 
</pre>
				</div>

				<div class="subsubsection">
					<h4>n^n的树根 找规律</h4>
					<pre class="prettyprint">
int treeroot(int n){
	int tree[19]={9,1,4,9,4,2,9,7,1,9,1,5,9,4,7,9,7,8};
	return tree[n%18];
} 
</pre>
				</div>

				<div class="subsubsection">
					<h4>n^n的树根 模拟</h4>
					<pre class="prettyprint">
//见a^b的树根
</pre>
				</div>

				<div class="subsubsection">
					<h4>a^b的树根 模拟</h4>
					<pre class="prettyprint">
int _treeroot(int a,int b){
	a=root(a);
	int ans=1;
	while(b--)ans=root(ans*a);
	return ans;
}
</pre>
				</div>

				<div class="subsubsection">
					<h4>a^b的树根 二进制法</h4>
					<pre class="prettyprint">
int mytreeroot(int a,int b){
	a=root(a);
	int t=a,ans=1;
	while(b){
		if(b&amp;1)ans=root(ans*t);
		b&gt;&gt;=1;
		t=root(t*t);
	}
	return ans;
}
</pre>
				</div>

			</div>
			<div class="subsection">
				<h3>公式</h3>
				<div class="subsubsection">
					<h4>三角公式</h4>
					<pre class="prettyprint">
Atan2(x,y):结果是以弧度表示(-PI，PI)
Atan2(0,-1)=PI
</pre>
				</div>

				<div class="subsubsection">
					<h4>数学公式</h4>
					<pre class="prettyprint">
sum(k)=(n+1)*n/2
sum(k^2)=n (n+1)(2n+1)/6
sum(k^3)=(n (n+1)/2)^2
sum(k^4)=n (n+1) (2n+1) （3n^2+3n-1）/30
sum(k^5)= n^2 (n+1)^2 (2n^2+2n-1)/12
sum(k(k+1))=n(n+1)(n+2)/3
sum(k(k+1)(k+2))=n(n+1)(n+2)(n+3)/4
sum(k(k+1)(k+2)(k+3))=n(n+1)(n+2)(n+3)(n+4)/5
</pre>
				</div>

				<div class="subsubsection">
					<h4>精度公式</h4>
					<pre class="prettyprint">
double eps=e-6;
int dblcmp(double x){
	return (x&lt;=eps) &amp;&amp; (x&gt;=-eps);
}
</pre>
				</div>

				<div class="subsubsection">
					<h4>对数公式</h4>
					<pre class="prettyprint">
$log_a^n + log_a^m = log_a^{nm}$ 
$k*log_a^n = log_a^{n^k}$ 

换底公式： $log_a^n/log_b^n=log_b^a$ 
</pre>
				</div>


				<div class="subsubsection">
					<h4>复杂度公式</h4>
					<pre class="prettyprint">
递归式T(n) = aT(n/b) + f(n)
递归树结果
$T(n) = f(n)+af(n/b)+a^2f(n/b^2)+…+a^Lf(n/b^L)$其中$L=log_bn $
</pre>
				</div>

			</div>
			<div class="subsection">
				<h3>微积分</h3>
				<div class="subsubsection">
					<h4>曲线长度</h4>
					<pre class="prettyprint">
在y=f(x)的任意点(x,y)附近去一段小曲线，看成线段，其长度：
Ds = sqrt(dx^2 + dy^2) 
= dx sqrt(1 + (dy/dx)^2 )
= sqrt(1 + f’(x)^2 ) dx
所以：s = sqrt(1 + f’(x)^2) [x2,x1]
</pre>
				</div>

				<div class="subsubsection">
					<h4>二次函数</h4>
					<pre class="prettyprint">
对于抛物线一般式：y=ax^2 + bx + c, y’ = 2ax + b
ds = sqrt(1 + f’(x)^2)
 = sqrt(1 + (2ax + b)^2)dx 
 = 1/2a * sqrt(1 + (2ax+b)^2) d(2ax+b)
 = 1/2a * sqrt(1 + t^2) dt
 = 1/4a * (t * sqrt(1 + t^2) + ln(t + sqrt(1 + t^2))) [x2,x1]
</pre>
				</div>

			</div>
			<div class="subsection">
				<h3>约瑟夫环的数学方法</h3>
				<pre class="prettyprint">
问题描述：n个人（编号0~(n-1))，从0开始报数，报到(m-1)的退出，剩下的人继续从0开始报数。求胜利者的编号。

我们知道第一个人(编号一定是(m-1)%n) 出列之后，剩下的n-1个人组成了一个新的约瑟夫环（以编号为k=m%n的人开始）:\\
  k k+1 k+2 ... n-2, n-1, 0, 1, 2, ... k-2\\
  并且从k开始报0。\\
  现在我们把他们的编号做一下转换：\\
  序列1： 1, 2, 3, 4, …, n-2, n-1, n\\
  序列2： 1, 2, 3, 4, … k-1, k+1, …, n-2, n-1, n\\
  序列3： k+1, k+2, k+3, …, n-2, n-1, n, 1, 2, 3,…, k-2, k-1\\
  序列4：1, 2, 3, 4, …, 5, 6, 7, 8, …, n-2, n-1\\
  变换后就完完全全成为了(n-1)个人报数的子问题，假如我们知道这个子问题的解：例如x是最终的胜利者，那么根据上面这个表把这个x变回去不刚好就是n个人情况的解吗？！！变回去的公式很简单，相信大家都可以推出来(其实就是利用子问题的解等价转换人数等于n的解,因为n在转化成n-1时已经出队一个人了,剩下n-1的最后出队人仍然和n的解相同,只是需要映射将下标到人数为n的情况)：\\
  ∵ k=m\%n;\\
  ∴ x' = x+k = x+ m\%n ; 而 x+ m\%n 可能大于n\\
  ∴x'= (x+ m\%n)%n = (x+m)\%n\\
  得到 x‘=(x+m)\%n\\
  如何知道(n-1)个人报数的问题的解？对，只要知道(n-2)个人的解就行了。(n-2)个人的解呢？当然是先求(n-3)的情况 ---- 这显然就是一个倒推问题！好了，思路出来了，下面写递推公式：\\
  令f表示i个人玩游戏报m退出最后胜利者的编号，最后的结果自然是f[n].\\
  递推公式:\\
  f[1]=0;\\
  f[i]=(f[i-1]+m)\%i; (i&gt;1)\\
  有了这个公式，我们要做的就是从1-n顺序算出f的数值，最后结果是f[n]。因为实际生活中编号总是从1开始，我们输出f[n]+1由于是逐级递推，不需要保存每个f，程序也是异常简单：\\

int getAns(int n,int m){
    int ans = 0;
    for (int i=2; i&lt;=n; i++){
        ans=(ans+m)%i;
    }
    return ans+1;
}
</pre>

				<div class="subsubsection">
					<h4>pick定理</h4>
					<pre class="prettyprint">
如果顶点都为整数坐标点，面积=边点/2+内点-1
</pre>
				</div>

			</div>
			<div class="subsection">
				<h3>catalan数</h3>
				<pre class="prettyprint">
卡特兰数前几项
1, 1, 2, 5, 14, 42, 132, 429, 1430, 4862, 16796, 58786, 208012, 742900, 2674440, 9694845, 35357670, 129644790, 477638700, 1767263190, 6564120420, 24466267020, 91482563640, 343059613650, 1289904147324 
</pre>

				<div class="subsubsection">
					<h4>等价公式</h4>
					<pre class="prettyprint">
h(n)= h(0)*h(n-1)+h(1)*h(n-2) + ... + h(n-1)h(0) (n&gt;=2)
h(n)=h(n-1)*(4*n-2)/(n+1)
h(n)=C(2n,n)/(n+1) (n=1,2,3,...)
h(n)=c(2n,n)-c(2n,n+1)(n=1,2,3,...)
H(n+1) = 2(2n+1)/(n+2) * H(n)
H(n+1)=sum(H(i)*H(n-i)) (0&lt;=i&lt;=n)
H(n) = sum( C(n,i) * C(n,i) ) /(n+1) (0&lt;=i&lt;=n)
H(n) = 4^n/(n^1.5 * sqrt(pi))
</pre>
				</div>

				<div class="subsubsection">
					<h4>应用</h4>
					<pre class="prettyprint">
1.n个数的不同出栈序列
2.N个+1和n个-1构成2n项a1a2...an，其部分和满足a1+a2+a3+...+an&gt;=0，0&lt;=k&lt;=2n。满足这个序列的个数等于第n个catakan数。
3.括号匹配的合法个数
4.连乘的选择个数
5.n个节点的二叉树的树的形态的个数。
6.n个非叶子节点的满二叉树的形态数。
7.n*n的矩阵中，从右下角到左上角的走法。
8.凸n+2边形进行三角分割数。
9.n层的阶梯切割为n个矩阵的切割法数。
10.在一个2*n的格子中填入1到2n这些数字，使每个格子内的数值都比其右边和上边的所有数值都小的情况数。
</pre>
				</div>

			</div>
			<div class="subsection">
				<h3>随机函数</h3>
				<pre class="prettyprint">
int rands() {
    static int x=1364684679;
    x+=(x&lt;&lt;2)+1;
    return x;
}
</pre>

				<div class="subsubsection">
					<h4>积性函数</h4>
					<pre class="prettyprint">
对于正整数n的一个函数f(n),当中f(1)=1且当a,b互质时，f(a,b)=f(a) * f(b);
若某函数f(n)富符合f(1)=1,且就算a,b不互质,f(a,b)=f(a) * f(b),则称它为完全积性函数。

积性函数有：
欧拉函数：计算与n互质的小于n的正整数的个数
莫比乌斯函数:关于非平方数的质数因子的数目
gcd(n,k)：最大公因子,k固定
d(n):n的正因子数目，n的所有正因子之和
</pre>
				</div>

				<div class="subsubsection">
					<h4>三分算法</h4>
					<pre class="prettyprint">
typedef double Type;
double const eps = 1e-6;
double const scale = (sqrt(5.0) - 1) / 2;
double Calc(Type a) {
    /* 根据题目的意思计算 */
}
void Solve(double left, double right) {
    double mid_left, mid_right;
    double mid_left_value, mid_right_value;
    double Golden_Section ,len, tmp;

    bool left_scale = true;

    len = right - left;
    Golden_Section = scale * len;

    mid_left = right - Golden_Section;
    mid_left_value = Calc(mid_left);

    while (left + eps &lt; right) {
        if(left_scale) {
            mid_right = left + Golden_Section;
            mid_right_value = Calc(mid_right);
        } else {
            mid_left = right - Golden_Section;
            mid_left_value = Calc(mid_left);
        }

        tmp = len;
        len = Golden_Section;
        Golden_Section = tmp - Golden_Section;

        if (mid_left_value &gt;= mid_right_value) {
            left = mid_left;
            left_scale = true;

            mid_left = mid_right;
            mid_left_value = mid_right_value;
        } else {
            right = mid_right;
            left_scale = false;

            mid_right = mid_left;
            mid_right_value = mid_left_value;
        }
    }
}
</pre>
				</div>

			</div>
			<div class="subsection">
				<h3>位操作</h3>
				<div class="subsubsection">
					<h4>与操作 \&amp;</h4>
					<pre class="prettyprint">
i. 用以取出一个数的某些二进制位
ii. 取出一个数二进制中的最后一个 1：x&amp;-x
</pre>
				</div>

				<div class="subsubsection">
					<h4>或操作 $|$</h4>
					<pre class="prettyprint">
用以将一个数的某些位设为1
</pre>
				</div>

				<div class="subsubsection">
					<h4>非操作 $\sim$</h4>
					<pre class="prettyprint">
用以间接构造一些数：$\sim$0u=4294967295=$23^2$-1
INI_MAX = ($\sim$0u)&gt;&gt;1
</pre>
				</div>


				<div class="subsubsection">
					<h4>异或操作 \^{</h4>
					}
					<pre class="prettyprint">
i. 不使用中间变量交换两个数：a=a^b;b=a^b;a=a^b;
ii. 将一个数的某些位取反
</pre>
				</div>



			</div>
			<div class="subsection">
				<h3>矩阵</h3>
				<pre class="prettyprint">
#define TT __int64
const int N=12;
const int MOD=2008512;
const int sz=10;
struct Matrix{
		TT a[N][N];	
		Matrix(){memset(a,0,sizeof(a));}
		void _union(){int l=sz;while(l--)a[l][l]=1; }
		Matrix operator*(Matrix&amp; B);
		Matrix pow(TT k); 
}; 
</pre>


				<div class="subsubsection">
					<h4>矩阵相乘</h4>
					<pre class="prettyprint">
Matrix Matrix::operator*(Matrix&amp; B){
	Matrix ret;
	for(int i=0;i&lt;sz;i++)
	for(int j=0;j&lt;sz;j++)
	for(int k=0;k&lt;sz;k++)
	ret.a[i][j]=(ret.a[i][j]+a[i][k]*B.a[k][j]) %MOD;
	return ret;  } 
</pre>
				</div>

				<div class="subsubsection">
					<h4>矩阵幂乘</h4>
					<pre class="prettyprint">
Matrix Matrix::pow(TT k){
	Matrix ret;
	Matrix A=*this;
	ret._union();
	while(k){
		if(k&amp;1)ret=ret*A;
		A=A*A;
		k&gt;&gt;=1; 
	}
	return ret; 
}
</pre>
				</div>

				<div class="subsubsection">
					<h4>判断A*B==C 随机算法</h4>
					<pre class="prettyprint">
bool eq(int i,int j,int sz){
    int tmp=0,k;
    for(k=0;k&lt;sz;k++){
        tmp += A[i][k]*B[k][j];
    }
    return tmp == C[i][j];
}

const int L = 10000;
bool randTest(int sz){
    int i,j,k;
    for(k=0;k&lt;L;k++){
        i = rand()%sz;
        j = rand()%sz;
        if(!eq(i,j,sz))return false;
    }

    return true;
}
</pre>
				</div>

				<div class="subsubsection">
					<h4>判断A*B==C 伪随机算法</h4>
					<pre class="prettyprint">
A*B的复杂度是O($n^3$)，A是一维的话，复杂度就是O($n^2$)了。
所以A*B == C 可以近似的转化为1 * A * B == 1 * C
1是一维的向量。
</pre>
				</div>

				<div class="subsubsection">
					<h4>矩阵幂相加</h4>
					<pre class="prettyprint">
给定矩阵A，求$A + A^2 + A^3 + ... + A^k$的结果（两个矩阵相加就是对应位置分别相加）。输出的数据mod m。$k&lt;=10^9$。
    这道题两次二分，相当经典。首先我们知道，$A^i$可以二分求出。然后我们需要对整个题目的数据规模k进行二分。比如，当k=6时，有：
    $A + A^2 + A^3 + A^4 + A^5 + A^6 =(A + A^2 + A^3) + A^3*(A + A^2 + A^3)$
    应用这个式子后，规模k减小了一半。我们二分求出$A^3$后再递归地计算$A + A^2 + A^3$，即可得到原问题的答案。
</pre>
				</div>

			</div>
			<div class="subsection">
				<h3>构造矩阵</h3>
				<div class="subsubsection">
					<h4>求第 n 个 Fibonacci 数 mod p</h4>
					<pre class="prettyprint">
给定 n 和 p，求第 n 个 Fibonacci 数 mod p 的值，n 不超过 2^31
现在我们需要构造一个 2 x 2 的矩阵，使得它乘以(a,b)得到的结果是(b,a+b)。
每多乘一次这个矩阵，这两个数就会多迭代一次。
那么，我们把这个 2 x 2 的矩阵自乘 n 次，再乘以(0,1)就可以得到第 n 个 Fibonacci 数了。
不用多想，这个 2 x 2 的矩阵很容易构造出来：

$
\begin{pmatrix}
	0 &amp; 1  \\
    1 &amp; 1
\end{pmatrix}
\cdot
\begin{pmatrix}
	a  \\
    b 
\end{pmatrix}
=
\begin{pmatrix}
	b  \\
    a+b 
\end{pmatrix}

$

</pre>
				</div>

				<div class="subsubsection">
					<h4>A 走 k 步到 B 的方案数</h4>
					<pre class="prettyprint">
给定一个有向图，问从 A 点恰好走 k 步（允许重复经过边）到达 B 点的方案数 mod p 的值\\


把给定的图转为邻接矩阵，即 A(i,j)=1 当且仅当存在一条边 i-&gt;j。\\
令 C=A*A，那么C(i,j)=ΣA(i,k)*A(k,j)，实际上就等于从点 i 到点 j 恰好经过 2 条边的路径数（枚举 k 为中转点）。\\
类似地，C*A 的第 i 行第 j 列就表示从 i 到 j 经过 3 条边的路径数。\\
同理，如果要求经过 k 步的路径数，我们只需要二分求出 A^k 即可。
</pre>
				</div>

				<div class="subsubsection">
					<h4>用1x2填充MxN的矩阵</h4>
					<pre class="prettyprint">
用 1 x 2 的多米诺骨牌填满 M x N 的矩形有多少种方案，M&lt;=5，N&lt;2^31，输出答案 mod p 的结果
</pre>
				</div>

			</div>
			<div class="subsection">
				<h3>高斯消元法</h3>
				<pre class="prettyprint">
class Gauss {
    int var,equ;//有 equ 个方程，var 个变元。
    int matrix[N][N],free_x[N],ans[N];// matrix 为增
    广矩阵，ans 为解集,free_x 判断是否是不确定的变元.
public:
    void init(int n,int m);
    int getanswer();
//高斯消元法解方程组(Gauss-Jordan elimination).
//(-2 表示有浮点数解，但无整数解，-1 表示无解，0
    表示唯一解，大于 0 表示无穷解，并返回自由变元的
    个数)
};
void Gauss::init(int n,int m) {
    this-&gt;equ=m;
    this-&gt;var=n;
    memset(matrix,0,sizeof(matrix));
}
int Gauss::getanswer() {
    int tmp;
    int max_r,ta,tb,k,col=0;
// 转换为阶梯阵.
    for(k=0; k&lt;equ &amp;&amp; col&lt;var ; k++,col++) {
        max_r=k;
//找到该 col 列元素绝对值最大的那行与第 k 行交换
        for(int i=k+1; i&lt;equ; i++)
            if(abs(matrix[i][col])&gt; abs(matrix[max_r][col]))max_r=i;
        if(max_r != k) { // 与第 k 行交换
            for(intj=k; j&lt;var+1; j++)
                swap(matrix[k][j],matrix[max_r][j]);
        }
// 说明 col 列第 k 行以下全是 0 了，则处理下一列
        if(matrix[k][col] == 0) {
            k--;
            continue;
        }
        ta=matrix[k][col];
//之后列的要化为 0
        for(int i=k+1; i&lt;equ ; i++) {
            if(matrix[i][col] != 0) {
                tb=matrix[i][col];
                for(int j=col; j&lt;=var; j++)
                    matrix[i][j]=matrix[i][j]*ta-matrix[k][j]*tb;
            }
        }
    }
// 1. 无解的情况: 化简的增广阵中存在(0, 0, ..., a)这样
    的行(a != 0).
    for(int i=k; i&lt;equ; i++) {
        if(matrix[i][var]!=0)return -1;//无解
    }
// 无穷解的情况:
    if(k!=col || col&lt;var) {
        int free_x_num=0,free_index;
        for(int i=k-1; i&gt;=0; i--,free_x_num=0) {
            for(int j=0; j&lt;var; j++) {
                if(matrix[i][j]&amp;&amp;free_x[j])
                    free_x_num++,free_index=j;
            }
            if(free_x_num&gt;1)continue;
            tmp=matrix[i][var];
            for(int j=0; j&lt;var; j++) {
                if(matrix[i][j]&amp;&amp; j!=free_index)
                    tmp-=matrix[i][j]*ans[j];
            }
            ans[free_index]=tmp/matrix[i][free_index];
            free_x[free_index]=0;
        }
        return var - k;// 自由变元有 var - k 个.
    }
// 3. 唯一解: 在增广阵中形成严格的上三角阵.
    for(int i=var-1; i&gt;=0; i--) {
        tmp=matrix[i][var];
        for(int j=i+1; j&lt;var; j++) {
            tmp-=matrix[i][j]*ans[j];
        }
        if(tmp % matrix[i][i])return -1;// 说明有浮点数解
        ans[i]=tmp/matrix[i][i];
    }
    return 0;
}
</pre>

			</div>
			<div class="subsection">
				<h3>母函数</h3>
				<div class="subsubsection">
					<h4>母函数（整数拆分）</h4>
					<pre class="prettyprint">
while(~scanf("%d",&amp;n)) {
    memset(second,0,sizeof(second));
    first[0]=1;
    _max=0;
    for(i=1; i&lt;=n; i++) {
        _maxtmp=_max;
        for(j=0; j&lt;=_max; j++) {
            for(k=0; k+j&lt;=n; k+=i) {
                second[k+j]+=first[j];
                if(k+j&gt;_maxtmp &amp;&amp; k+j&lt;=n)_maxtmp=k+j;
            }
        }
        _max=_maxtmp;
        for(j=0; j&lt;=_max; j++) {
            first[j]=second[j];
            second[j]=0;
        }
    }
    printf("%d\n",first[n]);
}
</pre>
				</div>

				<div class="subsubsection">
					<h4>指数型母函数</h4>
					<pre class="prettyprint">
G(x) =
 (1+x^1/1!+x^2/2!+…+x^n1/(n1)!)* 
(1+x^1/1! +x^2/2!+ …+x^n2/(n2)!)*
…
*(1+x^1/1!+x^2/2!+…+x^nk/(nk!))。 
</pre>
				</div>

			</div>
			<div class="subsection">
				<h3>约瑟夫问题</h3>
				<pre class="prettyprint">
N 个人，从 1 开始报数，报到 m 的人退出
模拟方法就不说了，这里主要说数学方法
 令 f 表示 i 个人玩游戏报 m 退出最后胜利者的编号，
最后的结果自然是 f[n].
 递推公式:
 f[1]=0;
 f[i]=(f[i-1]+m)\%i; (i&gt;1)
 
int fun(int n,int m) {
    int ans=0;
    for(int i=2; i&lt;=n; i++)ans=(ans+m)%i;
    return ans+1;
}
</pre>

			</div>
			<div class="subsection">
				<h3>汉诺塔升级版</h3>
				<pre class="prettyprint">
用 n 个盘子，最后全放在第二个,调用 hanio(2,n-1)

int pos[66];
__int64 hanio(int b,int m) {
    if(m==0) return pos[m]!=b;
    if(pos[m] == b)return hanio(b,m-1);
    return hanio(6-b-pos[m],m-1)+((__int64)1&lt;&lt;m);
}
</pre>

			</div>
			<div class="subsection">
				<h3>快速排序</h3>
				<pre class="prettyprint">
//调用 ksort(0,n,s)
void ksort(int l, int h, int a[]) {
    if (h &lt; l + 2) return;
    int e = h, p = l;
    while (l &lt; h) {
        while (++l &lt; e &amp;&amp; a[l] &lt;= a[p]);
        while (--h &gt; p &amp;&amp; a[h] &gt;= a[p]);
        if (l &lt; h) swap(a[l], a[h]);
    }
    swap(a[h], a[p]);
    ksort(p, h, a);
    ksort(l, e, a);
}
</pre>

			</div>
			<div class="subsection">
				<h3>堆</h3>
				<pre class="prettyprint">

const int maxn = 10000;

struct Heap {
    int size;
    int array[maxn];
    void bulid();
    void insert(int val);
    int top();
    void pop();
    bool empty();
    void push_down(int pre);
    void push_up(int son);
    bool compare(int pre,int son);
};
void Heap::bulid() {
    size = 0;
}
void Heap::insert(int val) {
    array[++size] = val;
    push_up(size);
}
int Heap::top() {
    return array[1];
}
void Heap::pop() {
    array[1] = array[size--];
    push_down(1);
}
bool Heap::empty() {
    return size == 0;
}
void Heap::push_down_loop(int pre) {
    while(true) {
        if((pre&lt;&lt;1|1)&lt;= size &amp;&amp; compare(pre&lt;&lt;1|1,pre)
                &amp;&amp; compare(pre&lt;&lt;1|1,pre&lt;&lt;1)) {
//判断右儿子是否是父亲
            swap(array[pre],array[pre&lt;&lt;1|1]);
            pre = pre&lt;&lt;1|1;
        } else if((pre&lt;&lt;1) &lt;= size &amp;&amp; compare(pre&lt;&lt;1,pre)) {
//判断左儿子是否是父亲
            swap(array[pre],array[pre&lt;&lt;1]);
            pre = pre&lt;&lt;1;
        } else {
            break;
        }
    }
}
void Heap::push_up(int son) {
    if(son == 1)return ;
    int pre = son&gt;&gt;1;
    if(!compare(pre,son)) {
        swap(array[pre],array[son]);
        push_up(pre);
    }
}
//堆的性质返回 true
//也就是儿子不大于父亲返回 true
bool Heap::compare(int pre,int son) {
    return array[pre] &gt;= array[son];//最大堆
// return array[pre] &lt;= array[son];//最小堆
}
</pre>

			</div>
			<div class="subsection">
				<h3>最大堆</h3>
				<pre class="prettyprint">
const int MAXSIZE=10000;
class MaxHeap {
public:
    MaxHeap() {
        size=0;
    }
    void push(int val) {
        a[++size]=val;
        pushup(size);
    }
    void pop() {
        a[1]=a[size--];
        pushdown(1);
    }
    int top() {
        return a[1];
    }
    bool empty() {
        return !size;
    }
private:
    int a[MAXSIZE];
    int size;
    void pushdown(int now) {
        int l=now&lt;&lt;1;
        int r=l+1;
        if(l==size) {
            if(com(a[now],a[l]))
                swap(a[now],a[l]);
        } else if(r&lt;=size) {
            int tmp=a[l]&gt;a[r]?l:r;
            if(com(a[now],a[tmp])) {
                swap(a[now],a[tmp]);
                pushdown(tmp);
            }
        }
    }
    void pushup(int now) {
        int pre=now&gt;&gt;1;
        if(pre &amp;&amp; com(a[pre],a[now])) {
            swap(a[pre],a[now]);
            pushup(pre);
        }
    }
    bool com(int aa,int bb) {
        return aa&lt;bb;
    }
};
</pre>

			</div>
			<div class="subsection">
				<h3>堆排序</h3>
				<pre class="prettyprint">
const int MAXSIZE=10000;
int a[MAXSIZE],size;
void PushDown(int now) {
    int l=now&lt;&lt;1;
    int r=l+1;
    if(l==size) {
        if(a[now]&lt;a[l])
            swap(a[now],a[l]);
    } else if(r&lt;=size) {
        int tmp=a[l]&gt;a[r]?l:r;
        if(a[now]&lt;a[tmp]) {
            swap(a[now],a[tmp]);
            PushDown(tmp);
        }
    }
}
void BuildMaxHeap() {
    for(int i=size&gt;&gt;1; i; i--)PushDown(i);
}
void HeapSort(int n) {
    size=n;
    BuildMaxHeap();
    for(int i=size; i; i--) {
        swap(a[i],a[1]);
        size--;
        PushDown(1);
    }
}
</pre>

			</div>
			<div class="subsection">
				<h3>归并排序求逆序数</h3>
				<pre class="prettyprint">
int cnt=0;
int str[N],tmp[N];
//调用 MergeSort（0，n）
void Merger(int l,int mid,int r) {
    int i, j, tmpnum=l;
    for( i=l, j=mid; i &lt; mid &amp;&amp; j &lt; r; ) {
        if( str[i] &gt; str[j] ) {
            tmp[tmpnum++] = str[j++];
            cnt += mid-i;
        } else tmp[tmpnum++] = str[i++];
    }
    if( j &lt; r ) for( ; j &lt; r; ++j ) tmp[tmpnum++] =
                str[j];
    else for( ; i &lt; mid; ++i ) tmp[tmpnum++] = str[i];
    for ( i=l; i &lt; r; ++i ) str[i] = tmp[i];
}
void MergeSort(int l, int r) {
    int mid;
    if( r &gt; l+1 ) {
        int mid = (l+r)/2;
        MergeSort(l, mid);
        MergeSort(mid, r);
        Merger(l,mid,r);
    }
}
</pre>

			</div>
			<div class="subsection">
				<h3>取第 k 个元素</h3>
				<pre class="prettyprint">
sum=SUM( $|$ai - k$|$ ),使 sum 最小
int kth_element(int n,int* str,int k) {
    int t,key;
    int l=0,r=n-1,i,j;
    while (l&lt;r) {
        for (key=str[((i=l-1)+(j=r+1))&gt;&gt;1]; i&lt;j;) {
            for (j--; key&lt;str[j]; j--);
            for (i++; str[i]&lt;key; i++);
            if (i&lt;j) t=str[i],str[i]=str[j],str[j]=t;
        }
        if (k&gt;j) l=j+1;
        else r=j;
    }
    return str[k];
}
</pre>

			</div>
			<div class="subsection">
				<h3>Pell 方程</h3>
				<pre class="prettyprint">
X^2-d*Y^2=1
若 d 不是完全平方数,则该方程有无穷多组（X,Y）解
</pre>

			</div>
			<div class="subsection">
				<h3>区间合并</h3>
				<pre class="prettyprint">
可以先对区间排序；然后简单合并即可
</pre>

			</div>
			<div class="subsection">
				<h3>星期几</h3>
				<pre class="prettyprint">
//返回 1~7
int getday(int y,int m,int d) {
// 1 月 2 月当作前一年的 13,14 月
    if (m == 1 || m == 2) {
        m += 12;
        y--;
    }
    int ansa= d + 2*m + 3*(m+1)/5 + y + y/4;
    int ansb= (ansa - y/100 + y/400)%7 +1;
    ansa= (ansa+5)%7 +1;
    if(y&lt;1752)return ansa;
    if(y == 1752 &amp;&amp; m &lt; 9)return ansa;
    if(y == 1752 &amp;&amp; m == 9 &amp;&amp; d &lt; 3)return ansa;
    return ansb;
}
</pre>

			</div>
			<div class="subsection">
				<h3>线段树</h3>
				<div class="subsubsection">
					<h4>单点更新</h4>
					<pre class="prettyprint">
//最最基础的线段树,只更新叶子节点,然后把信息用
//PushUP(int r)这个函数更新上来
//1.bulid();
//2.query(a,b)
//3.update(a,b)
#define lson l , m , rt &lt;&lt; 1
#define rson m + 1 , r , rt &lt;&lt; 1 | 1
const int maxn = 55555;
int sum[maxn&lt;&lt;2];
int n;
//根据题意做相关修改，询问时的操作
int operate(int a,int b) {
    return a+b;
}
void PushUp(int rt) {
    sum[rt]=operate(sum[rt&lt;&lt;1],sum[rt&lt;&lt;1|1]);
}
void bulid(int l=1,int r=n,int rt=1) {
    if(l==r) { // 据题意做相关修改
        scanf("%d",&amp;sum[rt]);
        return ;
    }
    int m=(l+r)&gt;&gt;1;
    bulid(lson);
    bulid(rson);
    PushUp(rt);
}
void update(int p,int add,int l=1,int r=n,int rt=1) {
    if(l==r) { // 据题意做相关修改
        sum[rt]+=add;
        return ;
    }
    int m=(l+r)&gt;&gt;1;
    if(p&lt;=m)update(p,add,lson);
    else update(p,add,rson);
    PushUp(rt);
}
int query(int L,int R,int l=1,int r=n,int rt=1) {
    if(L&lt;=l &amp;&amp; r&lt;=R) {
        return sum[rt];
    }
    int m=(l+r)&gt;&gt;1;
    int ret=0;
    if(L&lt;=m)ret=operate(ret,query(L,R,lson));
    if(R&gt; m)ret=operate(ret,query(L,R,rson));
    return ret;
}
</pre>
				</div>

				<div class="subsubsection">
					<h4>成段更新</h4>
					<pre class="prettyprint">
//1.bulid();2.query(a,b)；3.update(a,b)
#define lson l , m , rt &lt;&lt; 1
#define rson m + 1 , r , rt &lt;&lt; 1 | 1
typedef long long LL;
const int maxn = 100055;
LL sign[maxn&lt;&lt;2];//标记
LL sum[maxn&lt;&lt;2];
int n;
LL operate(LL a,LL b) {
    return a+b;//根据题意做相关修改，询问时的操作
}
void PushUp(int rt) {
    sum[rt]=operate(sum[rt&lt;&lt;1],sum[rt&lt;&lt;1|1]);
}
void PushDown(int rt,int m) {
    if (sign[rt]) {
        sign[rt&lt;&lt;1] += sign[rt];
        sign[rt&lt;&lt;1|1] += sign[rt];
        sum[rt&lt;&lt;1] += (m - (m &gt;&gt; 1)) * sign[rt];
        sum[rt&lt;&lt;1|1] += (m &gt;&gt; 1) * sign[rt];
        sign[rt] = 0;
    }
}
void bulid(int l=1,int r=n,int rt=1) {
    sign[rt] = 0;
    if(l==r) { // 据题意做相关修改
        scanf("%lld",&amp;sum[rt]);
        return ;
    }
    int m=(l+r)&gt;&gt;1;
    bulid(lson);
    bulid(rson);
    PushUp(rt);
}
void update(int L,int R,int add,int l=1,int r=n,int rt=1) {
    if(L&lt;=l &amp;&amp; r&lt;=R) { //据题意做相关修改
        sign[rt]+=add;
        sum[rt]+=(LL)add*(r-l+1);
        return ;
    }
    PushDown(rt,r-l+1);
    int m = (l + r) &gt;&gt; 1;
    if (L &lt;= m) update(L , R , add , lson);
    if (R &gt; m) update(L , R , add , rson);
    PushUp(rt);
}
LL query(int L,int R,int l=1,int r=n,int rt=1) {
    if (L &lt;= l &amp;&amp; r &lt;= R) {
        return sum[rt];
    }
    PushDown(rt , r - l + 1);
    int m = (l + r) &gt;&gt; 1;
    LL ret = 0;
    if (L &lt;= m) ret += query(L , R , lson);
    if (m &lt; R) ret += query(L , R , rson);
    return ret;
}
</pre>
				</div>


				<div class="subsubsection">
					<h4>应用</h4>
					<pre class="prettyprint">
可以用来求区间合并，区间求和，区间最值等。
实际应用：矩阵并的周长和面积。
利用线段树求体积
POJ 1823 2352 1177 1151 1803 
</pre>
				</div>




			</div>
			<div class="subsection">
				<h3>树套树</h3>
				<div class="subsubsection">
					<h4>线段树套平衡树</h4>
					<pre class="prettyprint">
动态查询区间第 k 小，包括两个操作 Q x y k 和 C i j，查询区间 x y 的第 k 小和把第 i 个数安替换成 j。
const int N=50010;
const int INF = 0x3f3f3f3f;
int tree[N&lt;&lt;1];
struct treap {
    int key,wht,count,sz,ch[2];
} tp[N*20];
int nodecount;
int id(int l,int r) {
    return l+r | l!=r;
}
void init() {
    tp[0].sz=0;
    tp[0].wht=-INF;
    tp[0].key=-1;
    nodecount=0;
}
//update this tree's size
void update(int x) {
 
    tp[x].sz=tp[tp[x].ch[0]].sz+tp[x].count+tp[tp[x].ch[1]].sz;
}
void rotate(int &amp;x,int t) {
    int y=tp[x].ch[t];
    tp[x].ch[t]=tp[y].ch[!t];
    tp[y].ch[!t]=x;
    update(x);
    update(y);
    x=y;
}
void insert(int &amp;x,int t) {
    if(!x) {
        x=++nodecount;
        tp[x].key=t;
        tp[x].wht=rand();
        tp[x].count=1;
        tp[x].ch[0]=tp[x].ch[1]=0;
    } else if(tp[x].key==t) {
        tp[x].count++;
    } else {
        int k=tp[x].key&lt;t;
        insert(tp[x].ch[k],t);
        if(tp[x].wht&lt;tp[tp[x].ch[k]].wht) {
            rotate(x,k);
        }
    }
    update(x);
}
void erase(int &amp;x,int t) {
    if(tp[x].key==t) {
        if(tp[x].count==1) {
            if(! tp[x].ch[0] &amp;&amp; ! tp[x].ch[1]) {
                x=0;
                return;
            }
            rotate(x,tp[tp[x].ch[0]].wht&lt;tp[tp[x].ch[1]].wht);
            erase(x,t);
        } else tp[x].count--;
    } else erase(tp[x].ch[tp[x].key&lt;t],t);
    update(x);
}
int select(int x,int k) {
    if(! x) return 0;
    if(k&lt;tp[x].key) return select(tp[x].ch[0],k);
    int q=0,p=tp[tp[x].ch[0]].sz+tp[x].count;
    if(k&gt;tp[x].key) q=select(tp[x].ch[1],k);
    return p+q;
}
int a[N],n,m,ans;
void treeinsert(int l,int r,int i,int x) {
    insert(tree[id(l,r)],x);
    if(l==r) return;
    int m=(l+r)&gt;&gt;1;
    if(i&lt;=m) treeinsert(l,m,i,x);
    if(i&gt;m) treeinsert(m+1,r,i,x);
}
void del(int l,int r,int i,int x) {
    erase(tree[id(l,r)],x);
    if(l==r) return;
    int m=(l+r)&gt;&gt;1;
    if(i&lt;=m) del(l,m,i,x);
    if(i&gt;m) del(m+1,r,i,x);
}
void query(int l,int r,int L,int R,int x) {
    if(L&lt;=l &amp;&amp; R&gt;=r) {
        ans+=select(tree[id(l,r)],x);
        return;
    }
    int m=(l+r)&gt;&gt;1;
    if(L&lt;=m) query(l,m,L,R,x);
    if(R&gt;m) query(m+1,r,L,R,x);
}
int main() {
    int tt;
    scanf("%d",&amp;tt);
    while (tt--) {
        scanf("%d%d",&amp;n,&amp;m);
        init();
        memset(tree,0,sizeof(tree));
        for(int i=1; i&lt;=n; i++) {
            scanf("%d",&amp;a[i]);
            treeinsert(1,n,i,a[i]);
        }
        while (m--) {
            char s[5];
            int x,y,c;
            scanf("%s",s);
            if(s[0]=='C') {
                scanf("%d %d",&amp;x,&amp;y);
                del(1,n,x,a[x]);
                a[x]=y;
                treeinsert(1,n,x,a[x]);
            } else {
                scanf("%d %d %d",&amp;x,&amp;y,&amp;c);
                int l=0,r=INF,mid;
                while (l&lt;r) {
                    ans=0;
                    mid=(l+r)&gt;&gt;1;
                    query(1,n,x,y,mid);
                    if(ans&lt;c) l=mid+1;
                    else r=mid;
                }
                printf("%d\n",l);
            }
        }
    }
    return 0;
}
</pre>
				</div>

				<div class="subsubsection">
					<h4>划分树</h4>
					<pre class="prettyprint">
主要模拟归并排序。
求区间第 K 数时，判断这个的数进入左半部多少个，记为 p.
如果大于 k，则第 k 数就在左半部，否则就在右半部，且为右半部的第 k-p 数。
这样递归下去就可以了。
//input 输入的数据，下标从 1 开始，数据可以重复
//sortedPos input 的第几个位置的值应该在当前位置
//val input 的当前值应该在那个位置


int n;
int arr[N];//原数据,下标从 1 开始
int sortedPos[N];//排序后
int lfnum[20][N];//元素所在区间的当前位置进入左孩子的元素的个数
int val[20][N];//记录第 k 层当前位置的元素的值
bool cmp(const int &amp;x,const int &amp;y) {
    return arr[x]&lt;arr[y];
}
void build(int l,int r,int d) {
    if(l==r) return;
    int mid=(l+r)&gt;&gt;1,p=0;
    for(int i=l; i&lt;=r; i++) {
        if(val[d][i]&lt;=mid) {
            val[d+1][l+p]=val[d][i];
            lfnum[d][i]=++p;
        } else {
            lfnum[d][i]=p;
            val[d+1][mid+i+1-l-p]=val[d][i];
        }
    }
    build(l,mid,d+1);
    build(mid+1,r,d+1);
}
//求区间[s,e]第 k 大的元素
int query(int s,int e,int k,int l=1,int r=n,int d=0) {
    if(l==r) return l;
    int mid=(l+r)&gt;&gt;1,ss,ee;
    ss=(s==l?0:lfnum[d][s-1]);
    ee=lfnum[d][e];
    if(ee-ss&gt;=k) return query(l+ss,l+ee-1,k,l,mid,d+1);
    return query(mid+1+(s-l-ss),mid+1+(e-l-ee),k-(ee-ss),mid+1,r,d+1);
}
int main() {
    int cas=0,m,l,r,k;
    while(scanf("%d%d",&amp;n,&amp;m)!=EOF) {
        for(int i=1; i&lt;=n; i++) {
            scanf("%d",arr+i),sortedPos[i]=i;
        }
        sort(sortedPos+1,sortedPos+n+1,cmp);
        for(int i=1; i&lt;=n; i++) {
            val[0][sortedPos[i]]=i;
        }
        build(1,n,0);
        while(m--) {
            scanf("%d%d%d",&amp;l,&amp;r,&amp;k);
            printf("%d\n",arr[sortedPos[query(l,r,k)]]);
        }
    }
}
</pre>
				</div>

			</div>
			<div class="subsection">
				<h3>左偏树</h3>
				<pre class="prettyprint">
//左偏树(Leftist Tree)是一种可并堆的实现。
const int MAXN = 100010;
struct Node {
    int key, dist, lc, rc;
    void init(int _dist = 0, int _key = 0) {
        key = _key;
        dist = _dist;
        lc = rc = 0;
    }
} nodes[MAXN];
int memeryNode[MAXN];
int allocNode,allocMemery;
void initNode() {
    nodes[0].init(-1);//0 作为 NULL 节点
    allocNode = 1;
    allocMemery = 0;
}
int newNode(int x) {
    int tmp;
    if(allocMemery) {
        tmp = memeryNode[--allocMemery];
    } else {
        tmp = allocNode++;
    }
    nodes[tmp].init(0, x);
    return tmp;
}
void deleteNode(int A) {
    memeryNode[allocMemery++] = A;
}
int merge(int A, int B) {
    if (A != 0 &amp;&amp; B != 0) {
        if (nodes[A].key &lt; nodes[B].key) {
            swap(A, B);
        }
        nodes[A].rc = merge(nodes[A].rc, B);
        int &amp;lc = nodes[A].lc;
        int &amp;rc = nodes[A].rc;
        if (nodes[lc].dist &lt; nodes[rc].dist) {
            swap(lc, rc);
        }
        nodes[A].dist = nodes[rc].dist + 1;
    } else {
        A = A == 0 ? B : A;
    }
    return A;
}
int pop(int A) {
    int t = merge(nodes[A].lc, nodes[A].rc);
    deleteNode(A);
    return t;
}
void insert(int v) {
    merge(0, newNode(v));
}
</pre>

			</div>
			<div class="subsection">
				<h3>DLX</h3>
				<pre class="prettyprint">
双向十字链表用 LRUD 来记录，LR 来记录左右方向的双向链表，UD 来记录上下方向的双向链表。\\
head 指向总的头指针，head 通过 LR 来贯穿的列指针头。\\
LRUD 的前 m 个一般作为其列指针头的地址。\\
rowHead[x]是指向其列指针头的地址。\\
colNum[x]录列链表中结点的总数。\\
selectRow[x]用来记录搜索结果。\\
col[x]代表 x 的列数\\
row[x]代表 x 的行数

//一般需要使用 A*或 IDA*优化。
//以 exact cover problem 的代码为例子
const int N = 1005;
const int M = 1005;
const int maxn = N*M;
int R[maxn], L[maxn], U[maxn], D[maxn];
int col[maxn], row[maxn];
int rowHead[M], selectRow[N],colNum[N];
int size,n,m;
bool flag;
//初始化
void init() {
    memset(rowHead,-1,sizeof(rowHead));
    for(int i=0; i&lt;=m; i++) {
        colNum[i]=0;
        D[i]=U[i]=i;
        L[i+1]=i;
        R[i]=i+1;
        row[i] = 0;
        col[i] = i;
    }
    R[m]=0;
    size=m+1;
}
//插入一个点
void insert(int r,int c) {
    colNum[c]++;
    U[size]=U[c];
    D[size]=c;
    D[U[size]]=size;
    U[D[size]]=size;
    if(rowHead[r]==-1) {
        rowHead[r]=L[size]=R[size]=size;
    } else {
        L[size]=L[rowHead[r]];
        R[size]=rowHead[r];
        R[L[size]]=size;
        L[R[size]]=size;
    }
    row[size] = r;
    col[size] = c;
    size++;
}
//删除一列
void remove(int const&amp; c) { //删除列
    int i,j;
    L[R[c]]=L[c];
    R[L[c]]=R[c];
    for(i=D[c]; i!=c; i=D[i]) {
        for(j=R[i]; j!=i; j=R[j]) {
            U[D[j]]=U[j],D[U[j]]=D[j];
            colNum[col[j]]--;
        }
    }
}
//恢复一列
void resume(int c) {
    int i,j;
    for(i=U[c]; i!=c; i=U[i]) {
        for(j=L[i]; j!=i; j=L[j]) {
            U[D[j]]=j;
            D[U[j]]=j;
            colNum[col[j]]++;
        }
    }
    L[R[c]]=c;
    R[L[c]]=c;
}
//搜索
void dfs(int k) {
    int i,j,Min,c;
    if(R[0] == 0) {
        flag = true;//标记有解
        printf("%d",k);//输出有 k 行
        for(i=0; i&lt;k; i++) {
            printf(" %d",selectRow[i]);
        }
        printf("\n");
        return;
    }
//select a col that has min 1
    for(Min=N,i=R[0]; i; i=R[i]) {
        if(colNum[i]&lt;Min) {
            Min=colNum[i],c=i;
        }
    }
    remove(c);//删除该列
//select a row in the delete col
    for(i=D[c]; i!=c; i=D[i]) {
        selectRow[k] = row[i];
        for(j=R[i]; j!=i; j=R[j]) {
            remove(col[j]);
        }
        dfs(k+1);
        if(flag) return;//只要一组解
        for(j=L[i]; j!=i; j=L[j]) {
            resume(col[j]);
        }
    }
    resume(c);
}
int main() {
    int i,j,num;
    while(scanf("%d%d",&amp;n,&amp;m)!=EOF) {
        init();
        for(i=1; i&lt;=n; i++) {
            scanf("%d",&amp;num);
            while(num--) {
                scanf("%d",&amp;j);
                insert(i,j);//向第 i 行第 j 列插入 1
            }
        }
        flag = false;
        dfs(0);
        if(!flag) {
            printf("NO\n");
        }
    }
    return 0;
}
 
</pre>

			</div>
			<div class="subsection">
				<h3>AC 自动机</h3>
				<pre class="prettyprint">
常用与解决多模式匹配问题。\\
例如：给出 n 个单词，再给出一段包含 m 个字符的文章，让你找出有多少个单词在文章里出现过。\\
一般由字典树和 KMP 结合而成。
</pre>

				<div class="subsubsection">
					<h4>传统字典树</h4>
					<pre class="prettyprint">
const int kind = 26;
struct Tire {
    int fail; //失败指针
    int next[kind];
//Tire 每个节点的个子节点（最多个字母）
    int count; //是否为该单词的最后一个节点
    void init() { //构造函数初始化
        fail = 0;
        count = 0;
        memset(next,-1,sizeof(next));
    }
} tire[5000001]; //队列，方便用于 bfs 构造失败指针
int size = 0;
queue&lt;int&gt;que;
void init() {
    tire[0].init();
    size = 1;
    while(!que.empty())que.pop();
}
void insert(char *str) {
    int p = 0, i=0,index;
    while(str[i]) {
        index=str[i]-'a';
        if(tire[p].next[index] == -1) {
            tire[size].init();
            tire[p].next[index]= size++;
        }
        p = tire[p].next[index];
        i++;
    }
    tire[p].count++; //在单词的最后一个节点count+1，代表一个单词
}
void build_ac_automation() {
    int i,pre,pre_fail,child;
    tire[0].fail = -1;
    que.push(0);
    while(!que.empty()) {
        pre = que.front();
        que.pop();
        for(i=0; i&lt;kind; i++) {
            if(tire[pre].next[i] != -1) {
                child = tire[pre].next[i] ;
                pre_fail = tire[pre].fail;
                while(pre_fail != -1) {
                    if(tire[pre_fail].next[i] != -1) {
                        tire[ child ].fail = tire[pre_fail].next[i];
                        break;
                    }
                    pre_fail = tire[pre_fail].fail;
                }
                if(pre_fail == -1) {
                    tire[ child ].fail = 0;
                }
                que.push(child);
            }
        }
    }
}
int query(char* str) {
    int i=0,cnt=0,index,tmp;
    int p = 0;
    while(str[i]) {
        index=str[i]-'a';
        while(tire[p].next[index] == -1 &amp;&amp; p != 0) p=tire[p].fail;
        p = tire[p].next[index];
        tmp = p = (p==-1 ? 0:p);
        while(tmp != 0 &amp;&amp; tire[tmp].count != -1) {
            cnt += tire[tmp].count;
            tire[tmp].count = -1;
            tmp = tire[tmp].fail;
        }
        i++;
    }
    return cnt;
}
int main() {
    char keyword[51]; //输入的单词
    char str[1000005]; //模式串
    int n;
    scanf("%d",&amp;n);
    init();
    while(n--) {
        scanf("%s",keyword);
        insert(keyword);
    }
    build_ac_automation();
    scanf("%s",str);
    printf("%d\n",query(str));
    return 0;
}
</pre>
				</div>

				<div class="subsubsection">
					<h4>数组式字典树</h4>
					<pre class="prettyprint">
const int kind = 26,N=1000001;
int tire[N][kind],fail[N],word[N];
int size = 0;
queue&lt;int&gt;que;
void init() {
    memset(word,0,sizeof(word));
    memset(tire[0],0,sizeof(tire[0]));
    while(!que.empty())que.pop();
    fail[0] = 0;
    size=1;
}
void insert(char *str, int val) {
    int p = 0, i;
    for(; *str; str++) {
        i = *str - 'a';
        if(!tire[p][i]) {
            memset(tire[size],0,sizeof(tire[size]));
            word[size]=0;
            tire[p][i]= size++;
        }
        p = tire[p][i];
    }
    word[p] += val;
}
void build_ac_automation() {
    int i,pre;
    for(i=0; i&lt; kind; i++) {
        if(tire[0][i]) {
            fail[tire[0][i]]=0;
            que.push(tire[0][i]);
        }
    }
    while(!que.empty()) {
        pre = que.front();
        que.pop();
        for(i=0; i&lt;kind; i++) {
            if(tire[pre][i]) {
                que.push(tire[pre][i]);
                fail[tire[pre][i]] = tire[fail[pre]][i];
            } else {
                tire[pre][i] = tire[fail[pre]][i];
            }
        }
    }
}
int query(char* str) {
    int cnt=0,i,tmp;
    int p = 0;
    for(; *str; str++) {
        i= *str-'a';
        while(tire[p][i] == 0 &amp;&amp; p) p=fail[p];
        p = tire[p][i];
        tmp = p;
        while(tmp) {
            cnt += word[tmp];
            word[tmp] = 0;
            tmp = fail[tmp];
        }
    }
    return cnt;
}
int main() {
    char keyword[51]; //输入的单词
    char str[1000005]; //模式串
    int n;
    scanf("%d",&amp;n);
    init();
    while(n--) {
        scanf("%s",keyword);
        insert(keyword,1);
    }
    build_ac_automation();
    scanf("%s",str);
    printf("%d\n",query(str));
    return 0;
}
</pre>
				</div>


			</div>
			<div class="subsection">
				<h3>最少交换次数</h3>
				<div class="subsubsection">
					<h4>只能交换相邻的数</h4>
					<pre class="prettyprint">
给出一组数，通过不断交换两个相邻的数，可以使这组数按非递减顺序排列。问，最小的交换次数是多少？\\
思路：归并排序，其实答案就是逆序数的个数。
</pre>
				</div>

			</div>
			<div class="subsection">
				<h3>只能交换相邻的区间</h3>
				<pre class="prettyprint">
使用 IDA*搜索。
</pre>


			</div>
			<div class="subsection">
				<h3>离散化</h3>
				<pre class="prettyprint">
一般的做法是这样：
把竖线作为区间建立线段树，从左向右扫描的时候，
遇到左竖边，插入线段树，右竖边从线段树中删除。
但是，我有新的方法，可以避免一些边界问题。
/*
边界为 1\\
内部为 2\\
当边界无效时为 3\\
矩阵的周长就是偶数行奇数列的 1 的宽度 和 奇数列\\
偶数行的高度\\
矩阵的面积就是里面 2 的面积计算方法:(r-l)*(d-u)
/*
 0 0 0 0 0 0
 0 0 0 0 0 0
 0 0 1 1 1 0
 0 0 1 2 1 0
 0 0 1 1 1 0
 0 0 0 0 0 0
*/
struct B {
    double x1, y1, x2, y2;
    void init() {
        scanf("%lf%lf%lf%lf", &amp;x1, &amp;y1, &amp;x2, &amp;y2);
        if(x1 &gt; x2) swap(x1, x2);
        if(y1 &gt; y2) swap(y1, y2);
    };
};
int const inf = 0x3f3f3f3f, maxn = 20100;
int x1, y1, x2, y2, n, mx, my;
int m[maxn][maxn];
set&lt;double&gt; x, y;
set&lt;double&gt;::iterator si;
map&lt;double, int&gt; hx, hy;
map&lt;int, double&gt; hhx, hhy;
B b[maxn];
double getS() {
    double ans = 0;
    for(int i=3; i&lt;mx; i+=2)
        for(int j=3; j&lt;my; j+=2)
            if(m[i][j]==2)
                ans += (hhx[i+1]-hhx[i-
                                     1])*(hhy[j+1]-hhy[j-1]);
    return ans;
}
double getL() {
    double ans=0;
    for(int i=2; i&lt;mx; i+=2)
        for(int j=3; j&lt;my; j+=2)
            if(m[i][j]==1)
                ans += hhy[j+1]-hhy[j-1];
    for(int i=3; i&lt;mx; i+=2)
        for(int j=2; j&lt;my; j+=2)
            if(m[i][j]==1)
                ans += hhx[i+1]-hhx[i-1];
    return ans;
}
int main() {
    const bool debug = false;
    int i, j, k,cs=1;
    while(~scanf("%d", &amp;n),n) {
        x.clear();
        y.clear();
        for(i = 0; i &lt; n; i++) {
            b[i].init();
            x.insert(b[i].x1);
            x.insert(b[i].x2);
            y.insert(b[i].y1);
            y.insert(b[i].y2);
        }
        hx.clear();
        hy.clear();
//把地图扩大二倍后，矩阵内部就可以被填充，矩阵边界就可以走了
//对 x 离散化
        for(si=x.begin(),mx=2; si!
                =x.end(); hx[*si]=mx,hhx[mx] = *si, si++,mx+=2) ;
//对 y 离散化
        for(si=y.begin(),my=2; si!=y.end(); hy[*si]=my,
                hhy[my] = *si, si++,my+=2);
//初始化矩阵
        for(i = 0; i &lt; mx; ++i) {
            fill(m[i], m[i] + my, 0);
        }
//填充矩阵，填充为 1
        for(i = 0; i &lt; n; i++) {
            int xuper = hx[b[i].x2];
            int yuper = hy[b[i].y2];
//填充上下边界
            for(j = hx[b[i].x1]; j &lt;= xuper; j++) {
                if(m[j][hy[b[i].y1]]==0)m[j][hy[b[i].y1]]=1;
                if(m[j][hy[b[i].y2]]==0)m[j][hy[b[i].y2]]=1;
            }
//填充左右边界
            for(k = hy[b[i].y1]; k &lt;= yuper; k++) {
                if(m[hx[b[i].x1]][k]==0)m[hx[b[i].x1]][k]=1;
                if(m[hx[b[i].x2]][k]==0)m[hx[b[i].x2]][k]=1;
            }
//填充矩阵内部
            for(j = hx[b[i].x1] + 1; j &lt; xuper; j++) {
                for(k = hy[b[i].y1] + 1; k &lt; yuper; k++) {
                    m[j][k]=2;
                }
            }
        }
//此处已不属于周长，标记为 3
        for(i=1; i&lt;mx-1; i++) {
            for(j=1; j&lt;my-1; j++) {
                if(m[i][j] == 1 &amp;&amp; m[i-1][j]&amp;&amp;m[i]
                        [j-1]&amp;&amp;m[i+1][j]&amp;&amp;m[i][j+1])
                    m[i][j]=3;
            }
        }
        double S=getS();
        printf("Test case #%d\nTotal area: %.2f\n\n",cs++,S);
//int L = (int)getL();
//printf("%d\n",L);
    }
    return 0;
}

</pre>

			</div>
			<div class="subsection">
				<h3>Splay（伸展树）</h3>
				<pre class="prettyprint">
用伸展树解决数列维护问题，可以支持两个线段树无法支持的操作：在某个位置插入一些数和删除一些连续的数
</pre>

			</div>
			<div class="subsection">
				<h3>分段哈希</h3>
				<pre class="prettyprint">
const int cs=337,cs2=1007;
struct HS {
//n 为当前段有几种颜色
//s[]存这种颜色的个数,b[]存颜色的值
    int a[1000],next[cs2],n,s[cs2],f[cs2],b[cs2];
    int bj;
    void clear() {
        bj=-1;
        memset(f,-1,sizeof(f));
        n=0;
    }
    void init() {
        bj=-1;
        for(int i=0; i&lt;n; i++)
            f[b[i]%cs2]=-1;
        n=0;
    }
    int fd(int k) {
        if(bj!=-1) {
            if(bj==k)return cs;
            else return 0;
        }
        int fk=f[k%cs2];
        while(fk!=-1) {
            if(b[fk]==k)return s[fk];
            fk=next[fk];
        }
        return 0;
    }
    int fd(int l,int r,int k) {
        int da=0;
        if(bj!=-1) {
            push();
            crt();
        }
        for(int i=l; i&lt;=r; i++) {
            da+=(a[i%cs]==k);
        }
        return da;
    }
    void ins(int k) {
        int fk=f[k%cs2];
        while(fk!=-1) {
            if(b[fk]==k) {
                s[fk]++;
                return ;
            }
            fk=next[fk];
        }
        s[n]=1;
        b[n]=k;
        next[n]=f[k%cs2];
        f[k%cs2]=n++;
    }
    void update(int l,int r,int k) {
        push();
        for(int i=l; i&lt;=r; i++)
            a[i%cs]=k;
        crt();
    }
    void push() {
        if(bj!=-1) {
            for(int i=0; i&lt;cs; i++)
                a[i]=bj;
            bj=-1;
        }
    }
    void crt() {
        init();
        for(int i=0; i&lt;cs; i++)
            ins(a[i]);
    }
} hs[400];
int main() {
    for(int i=0; i&lt;400; i++)
        hs[i].clear();
    int n,m;
    while(cin&gt;&gt;n&gt;&gt;m) {
        for(int i=0; i&lt;n; i++)
            scanf("%d",&amp;hs[i/cs].a[i%cs]);
        for(int i=0; i*cs&lt;n; i++)
            hs[i].crt();
        while(m--) {
            int a,l,z,r;
            scanf("%d%d%d%d",&amp;a,&amp;l,&amp;r,&amp;z);
            if(a==1) { //更新
                if(l/cs==r/cs) {
                    hs[l/cs].update(l,r,z);
                } else {
                    hs[l/cs].update(l%cs,cs-1,z);
                    hs[r/cs].update(0,r%cs,z);
                    for(int i=l/cs+1; i&lt;r/cs; i++)
                        hs[i].bj=z;
                }
            } else { //查询
                int da=0;
                if(l/cs==r/cs) {
                    printf("%d\n",hs[l/cs].fd(l,r,z));
                } else {
                    da+=hs[l/cs].fd(l%cs,cs-1,z);
                    da+=hs[r/cs].fd(0,r%cs,z);
                    for(int i=l/cs+1; i&lt;r/cs; i++)
                        da+=hs[i].fd(z);
                    printf("%d\n",da);
                }
            }
        }
    }
}
</pre>

			</div>
			<div class="subsection">
				<h3>树状数组</h3>
				<pre class="prettyprint">
//得到最低位的值
int Lowbit(int t){ return t &amp; -t;}
</pre>

				<div class="subsubsection">
					<h4>一维情况</h4>
					<pre class="prettyprint">
//求区间和
int musum(int end) { // 复杂度 O(logn)
    int sum = 0;
    while (end &gt; 0) {
        sum += m[end];
        end -= Lowbit(end);
    }
    return sum;
}
 
//修改一个位置的值
void myplus(int pos) { // 复杂度 O(logn)
    while(pos &lt;= mx) {
        m[pos] ++;
        pos += Lowbit(pos);
    }
}
 
//得到某一个位置的值
int readSingle(int idx) {
    int sum = tree[idx];
    int z = idx - (idx &amp; -idx);
    idx--;
    while (idx != z) {
        sum -= tree[idx];
        idx -= (idx &amp; -idx);
    }
 
    return sum;
}
</pre>
				</div>



				<div class="subsubsection">
					<h4>二维情况</h4>
					<pre class="prettyprint">
//求区间和
int Sum(int i, int j) {
    int tempj, sum = 0;
    while( i &gt; 0 ) {
        tempj = j;
        while( tempj &gt; 0 ) {
            sum += c[i][tempj];
            tempj -= Lowbit(tempj);
        }
        i -= Lowbit(i);
    }
    return sum;
}
//更新一个点
void Update(int i, int j, int num) {
    int tempj;
    while( i &lt;= Row ) {
        tempj = j;
        while( tempj &lt;= Col ) {
            c[i][tempj] += num;
            tempj += Lowbit(tempj);
        }
        i += Lowbit(i);
    }
}
</pre>
				</div>

			</div>
			<div class="subsection">
				<h3>Treap 树</h3>
				<pre class="prettyprint">
Treap，就是有另一个随机数满足堆的性质的二叉搜索树，其结构相当于以随机顺序插入的二叉搜索树。
其基本操作的期望复杂度为 O(log n)。
其特点是实现简单，效率高于伸展树并且支持大部分基本功能，性价比很高。

const int maxn = 100010;
const int LEFT = 1;
const int RIGHT = 0;
int cnt = 1, rt = 0;
struct Treap {
    int key, val, pri, ch[2];
    void set(int&amp; _key, int&amp; _val, int _pri) {
        key = _key, val = _val, pri = _pri, ch[0] = ch[1] = 0;
    }
} treap[maxn];
void rotate(int&amp; node, int f) {
    int pre_node =treap[node].ch[!f];
    treap[node].ch[!f] = treap[pre_node].ch[f];
    treap[node].ch[f] = node;
    node = pre_node;
}
void insert(int&amp; x, int&amp; key, int&amp; val) {
    if(x == 0) {
        treap[x = cnt++].set(key,val,rand());
    } else {
        int f = key &lt; treap[x].key;
        insert(treap[x].ch[!f], key, val);
        if(treap[x].pri &lt; treap[ treap[x].ch[!f] ].pri) {
            rotate(x,f);
        }
    }
}
int get(int x, int f) {
    while(treap[x].ch[f]) {
        x = treap[x].ch[f];
    }
    return f;
}
void del(int &amp;x, int key) {
    if(treap[x].key == key) {
        if(!treap[x].ch[0] || !treap[x].ch[1]) {
            if(!treap[x].ch[0]) {
                x = treap[x].ch[1];
            } else {
                x = treap[x].ch[0];
            }
        } else {
            int f = treap[ treap[x].ch[0] ].pri &gt;
                    treap[ treap[x].ch[1] ].pri;
            rotate(x, f);
            del(treap[x].ch[f], key);
        }
    } else {
        int f = treap[x].key &gt; key;
        del(treap[x].ch[!f], key);
    }
}
int main() {
    int key,val;
    insert(rt, key, val);//插入元素
    get(rt, 1);//最大值
    get(rt, 0);//最小值
    del(rt,treap[x].key);
    return 0;
}
</pre>

			</div>
			<div class="subsection">
				<h3>HarmonicNumber (by rejudge)</h3>
				<pre class="prettyprint">
// Concrete Mathematics
// http://mathworld.wolfram.com/HarmonicNumber.html
//$$H_n = \sum_{k=1}^n 1/k$$
double H(int n)
{
    // Euler-Mascheroni Constant
    static const double gamma=0.577215664901532860606512090082402431042;
    // Hn = gamma + phi0(n + 1) // Digamma Function

    // Euler-Maclaurin Integration Formulas
    return gamma + log(n)
        + 1 / (2.0 * n)
        - 1 / (12.0 * n * n)
        + 1 / (120.0 * n * n * n * n)
        - 1 / (252.0 * n * n * n * n * n * n);
    // http://www.research.att.com/~njas/sequences/A006953
    // delta = epsilon / (240 * n ^ 8)
}
</pre>

			</div>
			<div class="subsection">
				<h3>Gauss int (Enumrate the arguments)</h3>
				<pre class="prettyprint">
#define maxn 22
using namespace std;
int mat[maxn][maxn];
int n, m;

bool fre[maxn]; int fs[maxn], fnt;
int x[maxn];
int cal(int r) {
    for (int i = r - 1, j = m - 1; i &gt;= 0 &amp;&amp; j &gt;= 0; --i) {
        while (j &gt;= 0 &amp;&amp; fre[j]) --j;
        if (j &gt;= 0) {
            x[j] = mat[i][m];
            for (int k = j + 1; k &lt; m; ++k) {
                x[j] ^= (mat[i][k] &amp;&amp; x[k]);
            }
            --j;
        }
    }
    int ret = 0;
    for (int i = 0; i &lt; m; ++i) ret += x[i];
    return ret;
}
int solve(int r) {
    int mx = 1 &lt;&lt; fnt;
    int ret = inf;
    for (int i = 0; i &lt; mx; ++i) {
        if (__builtin_popcount(i) &gt;= ret) continue;
        for (int j = 0; j &lt; fnt; ++j) {
            if (i &amp; (1 &lt;&lt; j)) x[fs[j]] = 1;
            else x[fs[j]] = 0;
        }
        ret = min(ret, cal(r));
    }
    return ret;
}
int gauss() {
    memset(fre, false, sizeof fre); fnt = 0;
    int r, c, mr, mx;
    for (r = c = 0; r &lt; n &amp;&amp; c &lt; m; ++r, ++c) {
        mx = 0, mr = -1;
        for (int i = r; i &lt; n; ++i) {
            if (abs(mat[i][c]) &gt; mx) {
                mx = abs(mat[i][c]);
                mr = i;
            }
        }
        if (!~mr) {
            fre[c] = true;
            fs[fnt++] = c;
            --r;
            continue;
        }
        else if (mr != r) {
            for (int j = c; j &lt;= m; ++j) {
                swap(mat[r][j], mat[mr][j]);
            }
        }
        for (int i = r + 1; i &lt; n; ++i) {
            if (!mat[i][c]) continue;
            for (int j = c; j &lt;= m; ++j) {
                mat[i][j] ^= mat[r][j];
            }
        }
    }
    return solve(r);
}
</pre>

			</div>
			<div class="subsection">
				<h3>Gauss (mod)</h3>
				<pre class="prettyprint">
ll x[maxn];
void gauss() {
    int r, c, mr;
    ll mx;
    ll g, ta, tb;
    for (r = c = 0; r &lt; n &amp;&amp; c &lt; m; ++r, ++c) {
        mr = -1, mx = 0;
        for (int i = r; i &lt; n; ++i) {
            if ( _abs(mat[i][c]) &gt; mx ) {
                mx = _abs(mat[i][c]);
                mr = i;
            }
        }
        if (!~mr) {
            --r;
            continue;
        }
        else if (mr != r) {
            for (int i = c; i &lt;= m; ++i) {
                swap(mat[mr][i], mat[r][i]);
            }
        }
        for (int i = r + 1; i &lt; n; ++i) {
            if (!mat[i][c]) continue;
            g = gcd(mat[r][c], mat[i][c]);
            ta = mat[r][c] / g;
            tb = mat[i][c] / g;
            for (int j = c; j &lt;= m; ++j) {
                mat[i][j] = mat[r][j] * tb - mat[i][j] * ta;
                mat[i][j] %= mod;
            }
        }
    }
    //must have a solution
    ll t;
    for (int i = m - 1; i &gt;= 0; --i) {
        t = mat[i][m];
        for (int j = i + 1; j &lt; m; ++j) {
            t -= mat[i][j] * x[j];
            t %= mod;
        }
        x[i] = MLES(mat[i][i], t, mod);
      /*  for (ll j = 0; j &lt; mod; ++j) {
            if ((mat[i][i] * j - t) % mod == 0) {
                x[i] = j;
                break;
            }
        }*/
    }
}
</pre>

			</div>
			<div class="subsection">
				<h3>Gauss (double)</h3>
				<pre class="prettyprint">
#define maxn 110
using namespace std;
double const eps = 1e-8;
int n, m;
double mat[maxn][maxn];
inline int sgn(double x) { return x &lt; -eps ? -1 : x &lt; eps ? 0 : 1; }
double x[maxn];

void gauss() {
    int r, c, mr;
    double mx, t;
    for (r = c = 0; r &lt; n &amp;&amp; c &lt; m; ++r, ++c) {
        mr = -1, mx = eps;
        for (int i = r; i &lt; n; ++i) {
            if (fabs(mat[i][c]) &gt; mx) {
                mx = fabs(mat[i][c]);
                mr = i;
            }
        }
        if (!~mr) {
            --r;
            continue;
        }
        else {
            for (int i = c; i &lt;= m; ++i) {
                swap(mat[r][i], mat[mr][i]);
            }
        }
        for (int i = r + 1; i &lt; n; ++i) {
            if (sgn(mat[i][c]) == 0) continue;
            t = mat[i][c] / mat[r][c];
            for (int j = c; j &lt;= m; ++j) {
                mat[i][j] -= mat[r][j] * t;
            }
        }
    }

    for (int i = r - 1; i &gt;= 0; --i) {
        t = mat[i][m];
        for (int j = i + 1; j &lt; m; ++j) {
            t -= x[j] * mat[i][j];
        }
        x[i] = t / mat[i][i];
    }
}
</pre>

			</div>
			<div class="subsection">
				<h3>Gauss (Linear Base)</h3>
				<pre class="prettyprint">
int gauss() {
     int i,j,k;
     j=0;
     for (i=m-1;i&gt;=0;i--)
     {
           for (k=j;k&lt;n;k++)
                    if ( (a[k]&gt;&gt;i)&amp;1 )
                             break;
           if (k&lt;n)
           {
                    swap(a[k],a[j]);
                    for (k=0;k&lt;n;k++)
                             if (k!=j &amp;&amp; ( (a[k]&gt;&gt;i)&amp;1 ))
                                       a[k]^=a[j];
                    j++;
           }
     }
     return j;
}
//the Kth Xor
inline int fun(int k) {
    int res=0;
    for (int i=0;i&lt;r;i++) {
             if ((k&gt;&gt;i)&amp;1) {
                  res ^= a[r-i-1];
             }
    }
    return res;
}

//exist x?
bool find(int x) {
    if (x == 0) return true;
    int now = 0;
    for (int i = 0; i &lt; r; ++i) {
        now ^= a[i];
        if (now == x) return true;
        else if (now &gt; x) {
            now ^= a[i];
        }
    }
    return false;
}
</pre>


				<pre class="prettyprint">
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

