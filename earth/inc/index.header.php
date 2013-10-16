<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="shortcut icon" href="img/tiankonguse.ico" /> 
<title><?php echo $title; ?></title>
<link href="css/main.css" rel="stylesheet">
<script src="js/jquery.js"></script>
<script src="js/Matrix.js"></script>
<script src="js/MatrixState.js"></script>	
<script src="js/GLUtil.js"></script>
<script src="js/ObjObject.js"></script>
<script src="js/earth.js"></script>

	<script id="vshader" type="x-shader/x-vertex">
		uniform mat4 uMVPMatrix; //总变换矩阵
		uniform mat4 uMMatrix; //变换矩阵
		uniform vec3 uLightLocation;	//光源位置
		uniform vec3 uCamera;	//摄像机位置
		attribute vec3 aPosition;  //顶点位置
		attribute vec3 aNormal;    //顶点法向量
		attribute vec2 aTexCoor;    //顶点纹理坐标
		//用于传递给片元着色器的变量
		varying vec4 ambient;
		varying vec4 diffuse;
		varying vec4 specular;
		varying vec2 vTextureCoord;  
		//定位光光照计算的方法
		void pointLight(					//定位光光照计算的方法
		  in vec3 normal,				//法向量
		  inout vec4 ambient,			//环境光最终强度
		  inout vec4 diffuse,				//散射光最终强度
		  inout vec4 specular,			//镜面光最终强度
		  in vec3 lightLocation,			//光源位置
		  in vec4 lightAmbient,			//环境光强度
		  in vec4 lightDiffuse,			//散射光强度
		  in vec4 lightSpecular			//镜面光强度
		){
		  ambient=lightAmbient;			//直接得出环境光的最终强度  
		  vec3 normalTarget=aPosition+normal;	//计算变换后的法向量
		  vec3 newNormal=(uMMatrix*vec4(normalTarget,1)).xyz-(uMMatrix*vec4(aPosition,1)).xyz;
		  newNormal=normalize(newNormal); 	//对法向量规格化
		  //计算从表面点到摄像机的向量
		  vec3 eye= normalize(uCamera-(uMMatrix*vec4(aPosition,1)).xyz);  
		  //计算从表面点到光源位置的向量vp
		  vec3 vp= normalize(lightLocation-(uMMatrix*vec4(aPosition,1)).xyz);  
		  vp=normalize(vp);//格式化vp
		  vec3 halfVector=normalize(vp+eye);	//求视线与光线的半向量    
		  float shininess=50.0;				//粗糙度，越小越光滑
		  float nDotViewPosition=max(0.0,dot(newNormal,vp)); 	//求法向量与vp的点积与0的最大值
		  diffuse=lightDiffuse*nDotViewPosition;				//计算散射光的最终强度
		  float nDotViewHalfVector=dot(newNormal,halfVector);	//法线与半向量的点积 
		  float powerFactor=max(0.0,pow(nDotViewHalfVector,shininess)); 	//镜面反射光强度因子
		  specular=lightSpecular*powerFactor;    			//计算镜面光的最终强度
		}
		
		void main()     
		{ 
		   gl_Position = uMVPMatrix * vec4(aPosition,1); //根据总变换矩阵计算此次绘制此顶点位置  
		   
		   vec4 ambientTemp, diffuseTemp, specularTemp;   //存放环境光、散射光、镜面反射光的临时变量      
		   pointLight(normalize(aNormal),ambientTemp,diffuseTemp,specularTemp,uLightLocation,vec4(0.15,0.15,0.15,1.0),vec4(0.9,0.9,0.9,1.0),vec4(0.4,0.4,0.4,1.0));
		   
		   ambient=ambientTemp;
		   diffuse=diffuseTemp;
		   specular=specularTemp;
		   vTextureCoord = aTexCoor;//将接收的纹理坐标传递给片元着色器
		}                      
	</script>
	
	<script id="fshader" type="x-shader/x-fragment">
		precision mediump float;
		uniform sampler2D sTexture;//纹理内容数据
		//接收从顶点着色器过来的参数
		varying vec4 ambient;
		varying vec4 diffuse;
		varying vec4 specular;
		varying vec2 vTextureCoord;
		
		void main()                         
		{    
		   //将计算出的颜色给此片元
		   vec4 finalColor=texture2D(sTexture, vTextureCoord);    
		   //vec4 finalColor=vec4(1.0,1.0,0.0,1.0);
		   //给此片元颜色值
		   gl_FragColor = finalColor*ambient+finalColor*specular+finalColor*diffuse;		
		}     
	</script>

	<script>
	    //GLES上下文
	    var gl;
	    //变换矩阵管理类对象
	    var ms=new MatrixState();
	    //要绘制的3D物体
	    var ooTri;
	    //地球纹理图
	    var earthTex;
	    //月球纹理图
	    var moonTex;
	   	
	    //初始化的方法
	    function start()
	    {    		        
	        //获取GLES上下文
	        gl = initWebGLCanvas("bncanvas");
	        if (!gl) 
	        {
	        	 alert("创建GLES上下文失败!");
	           return;
	        }    
	        //初始化3D画布参数
	        var canvas = document.getElementById('bncanvas');
			
			
			
	        //设置视口
	        gl.viewport(0, 0, canvas.width, canvas.height);
	        //设置屏幕背景色RGBA
	        gl.clearColor(0.0,0.0,0.0,1.0);  
	        //初始化变换矩阵
	        ms.setInitStack();
	        //设置摄像机
	        ms.setCamera(0,0,50,0,0,-1,0,1,0);
	        //设置投影
	        ms.setProjectFrustum(-1.5,1.5,-1,1,3,200);
	        
	
	        //创建绘制用的物体
          ooTri=new ObjObject(gl,vertexDataFromObj,vertexDataNormalFromObj,vertexTexCoorFromObj);       
	        
	        //初始化旋转角度
	        currentAngle = 0;
	        //初始化角度步进
	        incAngle = 1;
	        
	        //加载地球纹理图
	        earthTex=loadImageTexture(gl, "img/pic/earth.png");
	        moonTex=loadImageTexture(gl, "img/pic/moon.png");
	        
	        //绘制画面
	        setInterval("drawFrame();",30);
	    }
	    
	    //绘制一帧画面的方法
	    function drawFrame()
	    {	        
	        //清除着色缓冲与深度缓冲
	        gl.clear(gl.COLOR_BUFFER_BIT | gl.DEPTH_BUFFER_BIT);  
	        
	        //保护现场
	        ms.pushMatrix();         
	        //绕Y轴旋转
	        ms.rotate(currentAngle,0,1,0);
          //绘制地球
          ooTri.drawSelf(ms,earthTex);
          //沿X轴推远
          ms.translate(10,0,0);
          //绕Y轴旋转
	        ms.rotate(currentAngle,0,1,0);
	        //缩放
	        ms.scale(0.5,0.5,0.5);
	        //绘制月球
	        ooTri.drawSelf(ms,moonTex);
          //恢复现场
          ms.popMatrix();
          
          //修改旋转角度
	        currentAngle += incAngle;
	        if (currentAngle > 360)
	            currentAngle -= 360;            
	    }   
	    
	    $(document).ready(function(){
	    	start();
	    });
	    
	</script>


