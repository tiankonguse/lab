<?php
session_start ();
require ("../../inc/common.php");
?>
<!DOCTYPE HTML>
<html lang="zh-cn">
<head>
<?php
$title = "acm算法讲解";
require BASE_INC . 'head.inc.php';
?>
<link href="<?php echo MAIN_DOMAIN;?>css/main.css" rel="stylesheet">
<link href="<?php echo MAIN_DOMAIN;?>acm/css/main.css" rel="stylesheet">

</head>
<script type="text/javascript">
var MAIN_DOMAIN = "<?php echo MAIN_DOMAIN;?>";
</script>

<body>

	<header>
		<div class="title">
			<a href="<?php echo MAIN_DOMAIN; ?>acm/info">acm算法讲解 </a>
			<div class="sub-title">
				<strong>作者:</strong> tiankonguse <strong>电子邮件:</strong> <a
					href="mailto:i@tiankonguse.com">i@tiankonguse.com</a> <strong>主页:</strong>
				<a href="http://tiankonguse.com/">http://tiankonguse.com/</a>
			</div>
		</div>

	</header>

	<section>
		<div class="container">
			<header style="text-align: center;">阶乘总结 </header>

			<div class="section">
				<div>目录</div>
				<ol>
					<li>高精度计算阶乘</li>
					<li>阶乘位数</li>
					<li>阶乘末尾0个数</li>
					<li>阶乘末尾第一个非0数字</li>
					<li>返回阶乘左边的第二个数字</li>
					<li>判断数值 m 是否可以整除 n!</li>
					<li>数字N能否表示成若干个不相同的阶乘的和</li>
					<li>阶乘各算法的 C++ 类实现</li>
				</ol>
			</div>

			<div class="section">
				<div>高精度计算阶乘</div>
				<pre class="prettyprint">
//计算n的阶乘, int a[]保存结果, 返回阶乘位数digits
#include &lt;memory.h&gt;
int a[10000];   //确保保存最终运算结果的数组足够大
int bignumber_factorial(int n, int *a) {
    memset(a, 0, sizeof(a));
    a[0] = 1;
    int nCarry, nDigits = 1; //进位, 位数
    int temp;
    for(int i = 2; i &lt;= n; ++i) {
        //将临时结果的每位与阶乘元素相乘
        for(int j = 1, nCarry = 0; j &lt;= nDigits; ++j) {
            temp = a[j-1] * i + nCarry;
            a[j-1] = temp % 10;
            nCarry = temp / 10;
        }
        //进位
        while(nCarry) {
            a[++nDigits-1] = nCarry % 10;
            nCarry /= 10;
        }
    }
    return nDigits;
}
				</pre>
			</div>
			<div class="section">
				<div>阶乘位数</div>
				<pre class="prettyprint">
//阶乘位数-stirling公式
//返回n!的十进制位数
int factorial_digits(int n) {
    static const double e = 2.7182818284590452354, pi = 3.141592653589793239;
    double Digits = 0.0;
    int ret;

    if (n &lt; 100000) {
        for (int i = 1; i &lt;= n; ++i)
            Digits += log10(i*1.0) ;
    } else {
        //1.整数位数求法(int)long10(n)+1
        //2.stirling公式---因为是一个近似公式,所以
        //  当输入m较小的时候,不能够使用公式直接计算
        // 把公式中的sqrt漏掉了,害我改了好久!!!!!!!
        Digits = log10(sqrt(2*pi*n)) + n*log10(n/e);
    }
    ret = int(Digits);
    if(ret &lt;= Digits) ++ret;
    return ret;
}
				</pre>
			</div>
			<div class="section">
				<div>阶乘末尾0个数</div>
				<pre class="prettyprint">
// 阶乘末尾有多少个0，实际上只与5的因子数量有关，
// 即求 n/5+n/25+n/125+......

int Factorial_CountZeros(int n) {
    int cnt = 0;
    while (n) {
        n /= 5;
        cnt += n;
    }
    return cnt;
}
				</pre>
			</div>
			<div class="section">
				<div>阶乘末尾第一个非0数字</div>
				<pre class="prettyprint">
//求阶乘最后非零位,复杂度O(nlogn)
//返回该位,n以字符串方式传入
#include &lt;string.h&gt;
#define MAXN 10000

int lastdigit(char* buf) {
    const int mod[20]= {1,1,2,6,4,2,2,4,2,8,4,4,8,4,6,8,8,6,8,2};
    int len=strlen(buf),a[MAXN],i,c,ret=1;
    if (len==1)
        return mod[buf[0]-'0'];
    for (i=0; i&lt;len; i++)
        a[i]=buf[len-1-i]-'0';
    for (; len; len-=!a[len-1]) {
        ret=ret*mod[a[1]%2*10+a[0]]%5;
        for (c=0,i=len-1; i&gt;=0; i--)
            c=c*10+a[i],a[i]=c/5,c%=5;
    }
    return ret+ret%2*5;
}
				</pre>
			</div>
			<div class="section">
				<div>阶乘各算法的 C++ 类实现</div>
				<pre class="prettyprint">
//阶乘各算法的 C++ 类实现

#include &lt;iostream&gt;
#include &lt;cstring&gt;
#include &lt;iomanip&gt;
#include &lt;cmath&gt;
using namespace std;

static const int MAXN = 5001;        // 最大阶乘数，实际用不到这么大

class Factorial {
    int *data[MAXN];                 // 存放各个数的阶乘
    int *nonzero;                    // 从低位数起第一个非0数字
    int maxn;                        // 存放最大已经计算好的n的阶乘
    int SmallFact(int n);            // n &lt;= 12的递归程序
    void TransToStr(int n, int *s);  // 将数n倒序存入数组中
    void Multply (int* A, int* B, int* C, int totallen); // 执行两个高精度数的乘法
public:
    Factorial();
    ~Factorial();
    void Calculate(int n);            // 调用计算阶乘
    int FirstNonZero(int n);          // 返回阶乘末尾第一个非0数字
    int CountZeros(int n);            // 返回阶乘末尾有多少个0
    int SecondNum(int n);             // 返回阶乘左边的第二个数字
    bool CanDivide(int m, int n);     // 判断数值 m 是否可以整除 n!
    void Output(int n) const;
};

int Factorial::SmallFact(int n) {
    if (n == 1 || n == 0) return 1;
    return SmallFact(n-1)*n;
}

void Factorial::TransToStr(int n, int *tmp) {
    int i = 1;
    while (n) {
        tmp[i++] = n%10;
        n /= 10;
    }
    tmp[0] = i-1;
}

void Factorial::Multply (int* A, int* B, int* C, int totallen) {
    int i, j, len;
    memset(C, 0, totallen*sizeof(int));
    for (i = 1; i &lt;= A[0]; i++)
        for (j = 1; j &lt;= B[0]; j++) {
            C[i+j-1] += A[i]*B[j];    // 当前i+j-1位对应项 + A[i] * B[j]
            C[i+j] += C[i+j-1]/10;    // 它的后一位 + 它的商（进位）
            C[i+j-1] %= 10;           // 它再取余即可
        }
    len = A[0] + B[0];
    while (len &gt; 1 &amp;&amp; C[len] == 0 ) len--; // 获得它的实际长度
    C[0] = len;
}


Factorial::Factorial() {// 构造函数，先把&lt;=12的阶乘计算好
    maxn = 12;
    data[0] = new int [2];
    data[0][0] = 1;
    data[0][1] = 1;
    int i, j = 1;
    for (i = 1; i &lt;= 12; i++) {
        data[i] = new int [12];
        j = j*i;
        TransToStr(j, data[i]);
    }
    nonzero = new int [10*MAXN];
    nonzero[0] = 1;
    nonzero[1] = 1; // nonzero[0]存储已经计算到的n!末尾非0数
}

Factorial::~Factorial() {
    for (int i = 0; i &lt;= maxn; i++)
        delete [] data[i];
    delete [] nonzero;
}

void Factorial::Calculate(int n) {
    if (n &gt; MAXN)  return;
    if (n &lt;= maxn) return;    // &lt;= maxn的，已经在计算好的数组中了
    int i, len;
    int tmp[12];
    for (i = maxn+1; i &lt;= n; i++) {
        TransToStr(i, tmp);
        len = data[i-1][0] + tmp[0] + 1;
        data[i] = new int [len+1];
        Multply(data[i-1], tmp, data[i], len+1);
    }
    maxn = n;
}

int Factorial::FirstNonZero(int n) {
    if (n &gt;= 10*MAXN) {
        cout &lt;&lt; "Super Pig, your input is so large, cannot Calculate. Sorry! ";
        return -1;
    }
    if (n &lt;= nonzero[0]) return nonzero[n];    //已经计算好了，直接返回

    int res[5][4] = {{0,0,0,0}, {2,6,8,4}, {4,2,6,8}, {6,8,4,2}, {8,4,2,6}};
    int i, five, t;
    for (i = nonzero[0]+1; i &lt;= n; i++) {
        t = i;
        while (t%10 == 0) t /= 10;             // 先去掉 i 末尾的 0，这是不影响的
        if (t%2 == 0) {                        // t是偶数直接乘再取模10即可
            nonzero[i] = (nonzero[i-1]*t)%10;
        } else {                               // 否则转换成 res 数组来求
            five = 0;
            while (t%5 == 0) {
                if (five == 3) five = 0;
                else five++;
                t /= 5;
            }
            nonzero[i] = res[((nonzero[i-1]*t)%10)/2][five];
            // (nonzero[i-1]*t)%10/2 正好序号为：1, 2, 3, 4 中的一个
        }
    }
    nonzero[0] = n;
    return nonzero[n];
}

/* 阶乘末尾有多少个0，实际上只与5的因子数量有关，即求 n/5+n/25+n/625+...... */
int Factorial::CountZeros(int n) {
    if (n &gt;= 2000000000) {
        cout &lt;&lt; "your input is so large, cannot Calculate. Sorry!";
        return -1;
    }
    int cnt = 0;
    while (n) {
        n /= 5;
        cnt += n;
    }
    return cnt;
}

/*  输出N!左边第二位的数字：用实数乘，超过100就除以10，最后取个位即可  */
int Factorial::SecondNum(int n) {
    if (n &lt;= 3) return 0;
    int i;
    double x = 6;
    for (i = 4; i &lt;= n; i++) {
        x *= i;
        while (x &gt;= 100) x /= 10;
    }
    return (int(x))%10;
}

bool Factorial::CanDivide(int m, int n) {
    if (m == 0) return false;
    if (n &gt;= m) return true;
    int nn, i, j, nums1, nums2;
    bool ok = true;
    j = (int)sqrt(1.0*m);
    for (i = 2; i &lt;= j; i++) {
        if (m%i == 0) {
            nums1 = 0;                // 除数m的素因子i的数量
            while (m%i == 0) {
                nums1++;
                m /= i;
            }
            nums2 = 0;
            nn = n;
            while (nn) {              // 求 n 含有 i 因子的数量
                nn /= i;
                nums2 += nn;
            }
            if (nums2 &lt; nums1) {      // 少于m中所含i的数量，则m肯定无法整除n!
                ok = false;
                break;
            }
            j = (int)sqrt(1.0*m);     // 调整新的素因子前进范围
        }
    }
    if (!ok || m &gt; n || m == 0) return false;
    else return true;
}

void Factorial::Output(int n) const {
    if (n &gt; MAXN) {
        cout &lt;&lt; "your input is so large, cannot Calculate. Sorry! ";
        return;
    }
    int i, len = 8;
    cout&lt;&lt;n&lt;&lt;"! =\n";              // 格式控制输出
    for (i = data[n][0]; i &gt;= 1; i--) {
        cout &lt;&lt; data[n][i];
        if (++len == 80) {         // 实际每输出50个字符就换行
            len = 8;
            // cout&lt;&lt;endl;
        }
    }
    if (len != 8) cout &lt;&lt; endl;
}

int main() {
    int n, m;
    Factorial f;
    while (cin &gt;&gt; n) {
        f.Calculate(n);//计算结成结果
        f.Output(n);
        cout &lt;&lt; "该阶乘末尾第一个非0数字是: " &lt;&lt; f.FirstNonZero(n) &lt;&lt; endl;
        cout &lt;&lt; "该阶乘总共拥有数字0的个数：" &lt;&lt; f.CountZeros(n) &lt;&lt; endl;
        cout &lt;&lt; "该阶乘的左边的第2位数字是：" &lt;&lt; f.SecondNum(n) &lt;&lt; endl;
        cin &gt;&gt; m;
        if (f.CanDivide(m, n)) cout &lt;&lt; m &lt;&lt; " 可以整除 " &lt;&lt; n &lt;&lt; "! ";
        else cout &lt;&lt; m &lt;&lt; " 不能整除 " &lt;&lt; n &lt;&lt; "! ";
    }
    return 0;
}
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

