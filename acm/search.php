 <?php
	session_start ();
	require ("../inc/common.php");
	?>
<!DOCTYPE HTML>
<html lang="zh-cn">
<head>
 <?php
	$title = "acm模版 ~ 搜索";
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
				<h2>搜索</h2>

			</div>
			<div class="subsection">
				<h3>KMP 匹配算法 O(M+N)</h3>
				<pre class="prettyprint">
const int P=100;
int next[P];
//next[i]的意义
//s 为匹配串,t 为 s 的前 i 个字符组成的子串
//t = s[0]s[1]...s[i-1]
//设串 s[0]s[1]...s[k]和串 s[i-1-k]s[i-1-(k-1)]...s[i-1]相等，
//next[i]就是这样的 k 的最大值
//
void get_next(char *pat) {
    memset(next,-1,sizeof(next));
    for(int i=1,k; pat[i]; ++i) {
        for(k=next[i-1]; k&gt;=0 &amp;&amp; pat[i]!
                =pat[k+1]; k=next[k]);
        if(pat[k+1] == pat[i])next[i]=k+1;
    }
}
//返回匹配的第一个位置
//返回匹配的个数 ans
int kmp(char* str, char* pat) {
    get_next(pat);
    int i=0, j=0,ans=0;
    while( str[i] &amp;&amp; pat[j] ) {
        if( pat[j] == str[i] ) {
            ++i;
            if(!pat[++j])ans++;
        } else if(j == 0)++i;
        else j = next[j-1]+1;
    }
// return ans;
    if( pat[j] ) return -1;
    else return i-j;
}
</pre>



			</div>
			<div class="subsection">
				<h3>回文串~Manacher算法</h3>
				<pre class="prettyprint">
主要用于求解最长回文子串。
这个算法有一个很巧妙的地方，它把奇数的回文串和偶数的回文串统一起来考虑了。
这个算法还有一个很好的地方就是充分利用了字符匹配的特殊性，避免了大量不必要的重复匹配。

const int MAX = 110003 &lt;&lt; 2;
char oldstr[MAX];//原字符串
char str[MAX];
int p[MAX];//表示以 i 为中心的回文半径，
/*
p[i]-1 刚好是原字符串以第 i 个为中心的回文串长度。
*/
void Manacher(int n) {
    int mx=0;
    int id;//最长影响串的位置;
    p[0]=0;
    for(int i = 1; i &lt; n; i++) {
        p[i]=1;//至少是 1
        if(mx&gt;i) {
            p[i] = p[2 * id - i];
            if(mx - i &lt; p[i]) p[i] = mx - i;
        }
//向两端配匹
        while(str[i - p[i]] == str[i + p[i]]) p[i]++;
        if(i + p[i] &gt; mx) {
            mx = i + p[i];
            id = i;
        }
    }
}
/*
预处理字符串
*/
int pre(char head='$', char middle='#', char end = '?') {
    int n=0;
    str[n++]=head;
    str[n++]=middle;
    for(int i = 0; oldstr[i]; i++) {
        str[n++] = oldstr[i];
        str[n++] = middle;
    }
    str[n]=end;
    return n;
}
int main() {
    int n;
    while(scanf("%s", oldstr) != EOF) {
        n = pre();
        Manacher(n);
        int ans=0;
        for(int i = 1; i &lt; n; i++) {
            if(p[i] &gt; ans) ans = p[i];
        }
        printf("%d\n", ans - 1);
    }
    return 0;
}

</pre>


			</div>
			<div class="subsection">
				<h3>迭代加深搜索</h3>
				<pre class="prettyprint">
对于一般的搜索，复杂度是 O($2^n$)的复杂度。
对于不知道比较好的算法时，只有进行暴力搜索了。
但是 DFS 可能进去出不来，对于 BFS 又可能爆栈。这是就要进行迭代搜索了。
每当加深一层深度时，次层的搜索的时间可以忽略不计了，因为相差一个数量级。
</pre>


			</div>
			<div class="subsection">
				<h3>IDA*</h3>
				<pre class="prettyprint">
这里以一个例子来讲解 IDA*.
问题：n 个数互不相同，可以对相邻的连续区间进行交换，最终使 n 个数达到升序。求最少交换次数。
这里假设是 1 到 n 的 n 个数。不是话可以进行映射。


int n,str[20], _maxDepth;
int hfunc() {//估计函数：还有多少个断点
    int depth = 0;
    for(int i=1; i&lt;n; i++) {
        if(str[i] != str[i-1]+1) {
            depth++;
        }
    }
    return depth;
}
//交换区间
void move(int left, int mid, int right) {
    int i, j, tmp[20];;
    for(i=mid+1,j=0; i&lt;=right; i++,j++) {
        tmp[j] = str[i];
    }
    for(i=left; i&lt;=mid; i++,j++) {
        tmp[j] = str[i];
    }
    for(i=left,j=0; i&lt;=right; i++,j++) {
        str[i] = tmp[j];
    }
}
//迭代加深搜索
//三个 while 是我加的优化，我们只能从断点开始划分交换区间，一个连续区间分开后显然答案不忧。
//一次交换最优情况下可以减少三个断点。
int dfs(int depth) {
    int left,mid,right,h;
    for(left=0; left&lt;n-1; left++) {
        while(left &amp;&amp; str[left] == str[left-1]+1)left++;
        for(mid = left; mid&lt;n-1; mid++) {
            while(mid&lt;n-1 &amp;&amp; (str[mid]+1 == str[mid+1]))mid++;
            for(right = mid+1; right &lt; n; right++) {
                while(right&lt;n-1&amp;&amp;(str[right]+1 == str[right+1]))right++;
                move(left, mid,right);
                if((h = hfunc()) == 0)return 1;
                if(depth*3 + h &lt;= _maxDepth*3) {
                    if(dfs(depth+1)) {
                        return 1;
                    }
                }
                move(left,left + (right-mid-1),right);
            }
        }
    }
    return 0;
}
int main() {
    int cas,i;
    scanf("%d",&amp;n);
    for(i=0; i&lt;n; i++) {
        scanf("%d",&amp;str[i]);
    }
    _maxDepth = (hfunc()+2)/3;
    if(_maxDepth) {
        while(dfs(1) == 0) {
            _maxDepth++;
        }
    }
    printf("%d\n",_maxDepth);
    return 0;
}

</pre>


			</div>
			<div class="subsection">
				<h3>棋盘多项式与禁位排列</h3>
				<pre class="prettyprint">
一个 n*n 个方格组成的图形去掉其中某些方格，称为是一个棋盘(每行每列至多一个)
棋盘方案数 Rk(C):有 C 个格子构成的一个棋盘，放了 k 个棋子。
棋盘多项式:R(C)=r0(C)+r1(C)x+r2(C)x2+...+ri(C)xi 
称为是棋盘 C 的棋盘多项式。（r0(C)=1）
在棋盘 C 中任取一个格，将这个格去掉，得到的棋盘记作 C(e) 把这个格所在的行和列的格都去掉得到的棋盘记作 C(x)
Rk(C)=Rk-1(C(x))+Rk(C(e))
有禁区的排列可以用棋盘和容斥原理解决这类问题。
</pre>


			</div>
			<div class="subsection">
				<h3>容斥原理</h3>
				<pre class="prettyprint">
容斥可以用 dfs 搜索实现
用一个例子来看怎么实现容斥
给定一个集合和一个数 n，求小于 n 的数中，满足可以被集合中的其中一个数整除的个数。

TT arr[N]，ans;
TT gcd(TT a,TT b) {
    return (!b)?a:gcd(b,a%b);
}
void dfs(int i,int cnt,TT lcm) {
    lcm=lcm/gcd(lcm,arr[i])*arr[i];
    if(cnt&amp;1)ans+=(n-1)/lcm;
    else ans-=(n-1)/lcm;
    for(int j=i+1; j&lt;m; j++)
        dfs(j,cnt+1,lcm);
}
void rongchi() {
    for(int i=0; i&lt;m; i++)
        dfs(i,1,arr[i]);
}
</pre>


			</div>
			<div class="subsection">
				<h3>小于 n 的个数字的个数</h3>
				<pre class="prettyprint">
//调用 count(n)
int d[11];//初始化为 0
void count(int n,int value=1) {
    if(n&lt;=0)return ;
    int one=n%10;
    int ten=n;
    for(int i=0; i&lt;=one; i++)d[i]+=value;
    one++;
    while(ten/=10)d[ten%10]+=one*value;
    n/=10;
    for(int i=0; i&lt;10; i++)d[i]+=value*n;
    d[0]-=value;
    count(n-1,value);
}
</pre>


			</div>
			<div class="subsection">
				<h3>DFA+DP</h3>
				<pre class="prettyprint">
一般用于解决与位有关系的搜索
</pre>

				<div class="subsubsection">
					<h4>求区间内满足条件的个数</h4>
					<pre class="prettyprint">
一个 10 进制 number 称为 balanced 的，如果存在一个digit 关于这个 digit 的力矩和为 0.
例如 4209 关于 0 的力矩和是 4*2+2*1-9*1=0.题目要求在区间[a,b]内的 balanced number 的个数。（ZJU 3416）

typedef long long LL ;
LL dp[19][19][2000];
int digit[19],o;
LL dfs(int L,int sum,int yes) {
    if(L == -1) return sum==0;
    if(!yes &amp;&amp; dp[L][o][sum]!=-1)
        return dp[L][o][sum];
    int mymax = yes?digit[L]:9;
    LL ans = 0;
    for(int i=0; i&lt;=mymax; i++)
        ans+=dfs(L-1,sum+(L-o)*i,yes&amp;(i==mymax));
    if(!yes)dp[L][o][sum]=ans;
    return ans;
}
LL call(LL x) {
    int pos=0;
    LL ans=0;
    while(x)digit[pos++]=x%10,x/=10;
    for(o=0; o&lt;pos; o++)ans+=dfs(pos-1,0,1);
    return ans-pos+1;
}
int main() {
    printf("%lld\n",call(b)-call(a-1));
}
</pre>
				</div>

				<div class="subsubsection">
					<h4>求区间内第几个满足条件的数</h4>
					<pre class="prettyprint">
区间（P,Q）之间第 K 大的 Nya 数（含 x 个 4，y 个7）

typedef __int64 LL;
LL dp[21][21][21][2];
LL p,q,ans;
int x,y;
int dig[32],len;
LL cnt(int d,int n4,int n7,bool yes) {
    if(n4 &gt; x || n7&gt;y)return 0;
    if(d==-1)return n4==x &amp;&amp; n7==y;
    LL &amp;ret = dp[d][n4][n7][yes];
    if(ret!=-1)return ret;
    ret = 0;
    int t = yes?dig[d]:9;
    for(int i=0; i&lt;=t; i++)
        ret+=cnt(d-1,n4+(i==4),n7+
                 (i==7),yes&amp;&amp;i==t);
    return ret;
}
LL count(LL a) {
    memset(dp,-1,sizeof(dp));
    len=0;
    if(a==0)dig[len++]=0;
    else {
        while(a)dig[len++]=a%10,a/=10;
    }
    return cnt(len-1,0,0,1);
}
void findK(int d,int n4,int n7,bool yes,LL k) {
    if(d&lt;0)return ;
    int t=yes?dig[d]:9,i;
    for(i=0; i&lt;=t; i++) {
        LL tmp=cnt(d-1,n4+(i==4),n7+
                   (i==7),yes&amp;&amp;i==t);
        if(tmp&gt;=k) {
            ans = ans*10+i;
            findK(d-1,n4+(i==4),n7+
                  (i==7),yes&amp;&amp;i==t,k);
            return ;
        } else {
            k-=tmp;
        }
    }
}
int main() {
    int T ,cas=0;
    for(scanf("%d",&amp;T); T--;) {
        scanf("%I64d%I64d%d%d",&amp;p,&amp;q,&amp;x,&amp;y);
        LL l = count(p),r=count(q);
        int n;
        scanf("%d",&amp;n);
        printf("Case #%d:\n",++cas);
        while(n--) {
            int k;
            scanf("%d",&amp;k);
            if(k&gt;r-l)puts("Nya!");
            else {
                ans=0;
                findK(len,0,0,1,l+k);
                printf("%I64d\n",ans);
            }
        }
    }
    return 0;
}

</pre>
				</div>

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

