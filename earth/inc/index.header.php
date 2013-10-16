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
		uniform mat4 uMVPMatrix; //�ܱ任����
		uniform mat4 uMMatrix; //�任����
		uniform vec3 uLightLocation;	//��Դλ��
		uniform vec3 uCamera;	//�����λ��
		attribute vec3 aPosition;  //����λ��
		attribute vec3 aNormal;    //���㷨����
		attribute vec2 aTexCoor;    //������������
		//���ڴ��ݸ�ƬԪ��ɫ���ı���
		varying vec4 ambient;
		varying vec4 diffuse;
		varying vec4 specular;
		varying vec2 vTextureCoord;  
		//��λ����ռ���ķ���
		void pointLight(					//��λ����ռ���ķ���
		  in vec3 normal,				//������
		  inout vec4 ambient,			//����������ǿ��
		  inout vec4 diffuse,				//ɢ�������ǿ��
		  inout vec4 specular,			//���������ǿ��
		  in vec3 lightLocation,			//��Դλ��
		  in vec4 lightAmbient,			//������ǿ��
		  in vec4 lightDiffuse,			//ɢ���ǿ��
		  in vec4 lightSpecular			//�����ǿ��
		){
		  ambient=lightAmbient;			//ֱ�ӵó������������ǿ��  
		  vec3 normalTarget=aPosition+normal;	//����任��ķ�����
		  vec3 newNormal=(uMMatrix*vec4(normalTarget,1)).xyz-(uMMatrix*vec4(aPosition,1)).xyz;
		  newNormal=normalize(newNormal); 	//�Է��������
		  //����ӱ���㵽�����������
		  vec3 eye= normalize(uCamera-(uMMatrix*vec4(aPosition,1)).xyz);  
		  //����ӱ���㵽��Դλ�õ�����vp
		  vec3 vp= normalize(lightLocation-(uMMatrix*vec4(aPosition,1)).xyz);  
		  vp=normalize(vp);//��ʽ��vp
		  vec3 halfVector=normalize(vp+eye);	//����������ߵİ�����    
		  float shininess=50.0;				//�ֲڶȣ�ԽСԽ�⻬
		  float nDotViewPosition=max(0.0,dot(newNormal,vp)); 	//��������vp�ĵ����0�����ֵ
		  diffuse=lightDiffuse*nDotViewPosition;				//����ɢ��������ǿ��
		  float nDotViewHalfVector=dot(newNormal,halfVector);	//������������ĵ�� 
		  float powerFactor=max(0.0,pow(nDotViewHalfVector,shininess)); 	//���淴���ǿ������
		  specular=lightSpecular*powerFactor;    			//���㾵��������ǿ��
		}
		
		void main()     
		{ 
		   gl_Position = uMVPMatrix * vec4(aPosition,1); //�����ܱ任�������˴λ��ƴ˶���λ��  
		   
		   vec4 ambientTemp, diffuseTemp, specularTemp;   //��Ż����⡢ɢ��⡢���淴������ʱ����      
		   pointLight(normalize(aNormal),ambientTemp,diffuseTemp,specularTemp,uLightLocation,vec4(0.15,0.15,0.15,1.0),vec4(0.9,0.9,0.9,1.0),vec4(0.4,0.4,0.4,1.0));
		   
		   ambient=ambientTemp;
		   diffuse=diffuseTemp;
		   specular=specularTemp;
		   vTextureCoord = aTexCoor;//�����յ��������괫�ݸ�ƬԪ��ɫ��
		}                      
	</script>
	
	<script id="fshader" type="x-shader/x-fragment">
		precision mediump float;
		uniform sampler2D sTexture;//������������
		//���մӶ�����ɫ�������Ĳ���
		varying vec4 ambient;
		varying vec4 diffuse;
		varying vec4 specular;
		varying vec2 vTextureCoord;
		
		void main()                         
		{    
		   //�����������ɫ����ƬԪ
		   vec4 finalColor=texture2D(sTexture, vTextureCoord);    
		   //vec4 finalColor=vec4(1.0,1.0,0.0,1.0);
		   //����ƬԪ��ɫֵ
		   gl_FragColor = finalColor*ambient+finalColor*specular+finalColor*diffuse;		
		}     
	</script>

	<script>
	    //GLES������
	    var gl;
	    //�任������������
	    var ms=new MatrixState();
	    //Ҫ���Ƶ�3D����
	    var ooTri;
	    //��������ͼ
	    var earthTex;
	    //��������ͼ
	    var moonTex;
	   	
	    //��ʼ���ķ���
	    function start()
	    {    		        
	        //��ȡGLES������
	        gl = initWebGLCanvas("bncanvas");
	        if (!gl) 
	        {
	        	 alert("����GLES������ʧ��!");
	           return;
	        }    
	        //��ʼ��3D��������
	        var canvas = document.getElementById('bncanvas');
			
			
			
	        //�����ӿ�
	        gl.viewport(0, 0, canvas.width, canvas.height);
	        //������Ļ����ɫRGBA
	        gl.clearColor(0.0,0.0,0.0,1.0);  
	        //��ʼ���任����
	        ms.setInitStack();
	        //���������
	        ms.setCamera(0,0,50,0,0,-1,0,1,0);
	        //����ͶӰ
	        ms.setProjectFrustum(-1.5,1.5,-1,1,3,200);
	        
	
	        //���������õ�����
          ooTri=new ObjObject(gl,vertexDataFromObj,vertexDataNormalFromObj,vertexTexCoorFromObj);       
	        
	        //��ʼ����ת�Ƕ�
	        currentAngle = 0;
	        //��ʼ���ǶȲ���
	        incAngle = 1;
	        
	        //���ص�������ͼ
	        earthTex=loadImageTexture(gl, "img/pic/earth.png");
	        moonTex=loadImageTexture(gl, "img/pic/moon.png");
	        
	        //���ƻ���
	        setInterval("drawFrame();",30);
	    }
	    
	    //����һ֡����ķ���
	    function drawFrame()
	    {	        
	        //�����ɫ��������Ȼ���
	        gl.clear(gl.COLOR_BUFFER_BIT | gl.DEPTH_BUFFER_BIT);  
	        
	        //�����ֳ�
	        ms.pushMatrix();         
	        //��Y����ת
	        ms.rotate(currentAngle,0,1,0);
          //���Ƶ���
          ooTri.drawSelf(ms,earthTex);
          //��X����Զ
          ms.translate(10,0,0);
          //��Y����ת
	        ms.rotate(currentAngle,0,1,0);
	        //����
	        ms.scale(0.5,0.5,0.5);
	        //��������
	        ooTri.drawSelf(ms,moonTex);
          //�ָ��ֳ�
          ms.popMatrix();
          
          //�޸���ת�Ƕ�
	        currentAngle += incAngle;
	        if (currentAngle > 360)
	            currentAngle -= 360;            
	    }   
	    
	    $(document).ready(function(){
	    	start();
	    });
	    
	</script>


