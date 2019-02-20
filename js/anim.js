
    let canvas = document.getElementById("animCanvas");
	let canvasWidth = document.querySelector("#anim").offsetWidth;
	let canvasHeight = document.querySelector("#anim").offsetHeight;
	let ctx = canvas.getContext("2d");
	ctx.canvas.width  = canvasWidth;
    ctx.canvas.height = canvasHeight;
    let canvasData = ctx.getImageData(0, 0, canvasWidth, canvasHeight);
    
	let npoints = 600;
	let points = new Array(npoints);
	let mousePos;
	generatePoints();
	
	document.getElementById("anim").addEventListener('mousemove', function(evt) {
    mousePos = getMousePos(canvas, evt);
    //console.log('Mouse position: ' + mousePos.x + ',' + mousePos.y);
  }, false);
	
	let intervalID = window.setInterval(updateCanvas, 50);
	
	function updateCanvas() 
	{		
	  movePoints();	  
		ctx.clearRect(0, 0, canvasWidth, canvasHeight);
		canvasData = ctx.getImageData(0, 0, canvasWidth, canvasHeight);

		
		for(i = 0; i < npoints; i++)
		{
			drawPixel(points[i][0], points[i][1], 120, 120, 120, 200);
		}
		
		ctx.putImageData(canvasData, 0, 0);	
		
		var xd, yd;
		if(mousePos == null)
		{
			return false;
		}
		
		for(i = 0; i < npoints; i++)
		{
			xd = Math.abs(points[i][0] - mousePos.x);
			yd = Math.abs(points[i][1] - mousePos.y);

			if(xd < 100 && yd < 100)
			{
				var alpha = 0.87 - (xd+yd) / 120;
				if(alpha < 0)
					alpha = 0.1;
				if(alpha > 0.6)
					alpha = 0.6;
				ctx.beginPath();
				ctx.moveTo(points[i][0], points[i][1]);
				ctx.lineTo(mousePos.x, mousePos.y);
				ctx.lineWidth = 1;
	      ctx.strokeStyle = 'rgba(153,125,228,'+alpha+')';
				ctx.fillStyle = 'rgba(153,125,228,'+alpha+')';
				ctx.stroke();
				ctx.closePath();
			}
		}	
		
	}


	function drawPixel (x, y, r, g, b, a) {
			var index = (x + y * canvasWidth) * 4;
	
			canvasData.data[index + 0] = r;
			canvasData.data[index + 1] = g;
			canvasData.data[index + 2] = b;
			canvasData.data[index + 3] = a;
	}
	
	function generatePoints()
	{
		for (var i = 0; i < npoints; i++)
		{
			points[i] = new Array(4);
			points[i][2] = 0;
			points[i][3] = 0;
			
			while(points[i][2] == 0 && points[i][3] == 0) {
			points[i][0] = (Math.floor(Math.random() * canvasWidth)) - 1;
			points[i][1] = (Math.floor(Math.random() * canvasHeight)) - 1;
			points[i][2] = (Math.floor(Math.random() * 5) - 2);	
			points[i][3] = (Math.floor(Math.random() * 5) - 2);
			}
			
		}
	}
	
	function movePoints()
	{
		for (var i = 0; i < npoints; i++)
		{			
			points[i][0] = points[i][0] + points[i][2];
			points[i][1] = points[i][1] + points[i][3];
			
			if(points[i][0] < 0)
			{
				points[i][0] = canvasWidth;
			}
			else if(points[i][0] >= canvasWidth)
			{
				points[i][0] = 0;
			}
						
			if(points[i][1] < 0)
			{
				points[i][1] = canvasHeight;
			}
			else if(points[i][1] >= canvasHeight)
			{
				points[i][1] = 0;
			}
		}
	}
	
	function getMousePos(canvas, evt) {
        var rect = canvas.getBoundingClientRect();
        return {
            x: evt.clientX - rect.left,
            y: evt.clientY - rect.top
    };
  }
	