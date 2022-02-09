(function(global) {
    var canvas = new fabric.Canvas('front',{
        width: 450,
        height: 400,
    });
    var yourNameObjs = [];
    var boundingObject =[];
   
    var   front, back, canvas1;
    //===========================canvas1==============================
    var canvas1 = new fabric.Canvas('back',{
        width: 450,
        height: 400,
    });
    var art = [];
    var  boundingArt;
    //===========================ICon==============================
    var deleteIcon =
    "data:image/svg+xml,%3C%3Fxml version='1.0' encoding='utf-8'%3F%3E%3C!DOCTYPE svg PUBLIC '-//W3C//DTD SVG 1.1//EN' 'http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd'%3E%3Csvg version='1.1' id='Ebene_1' xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink' x='0px' y='0px' width='595.275px' height='595.275px' viewBox='200 215 230 470' xml:space='preserve'%3E%3Ccircle style='fill:%23F44336;' cx='299.76' cy='439.067' r='218.516'/%3E%3Cg%3E%3Crect x='267.162' y='307.978' transform='matrix(0.7071 -0.7071 0.7071 0.7071 -222.6202 340.6915)' style='fill:white;' width='65.545' height='262.18'/%3E%3Crect x='266.988' y='308.153' transform='matrix(0.7071 0.7071 -0.7071 0.7071 398.3889 -83.3116)' style='fill:white;' width='65.544' height='262.179'/%3E%3C/g%3E%3C/svg%3E";
    var cloneIcon =
        "data:image/svg+xml,%3C%3Fxml version='1.0' encoding='iso-8859-1'%3F%3E%3Csvg version='1.1' xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink' viewBox='0 0 55.699 55.699' width='100px' height='100px' xml:space='preserve'%3E%3Cpath style='fill:%23010002;' d='M51.51,18.001c-0.006-0.085-0.022-0.167-0.05-0.248c-0.012-0.034-0.02-0.067-0.035-0.1 c-0.049-0.106-0.109-0.206-0.194-0.291v-0.001l0,0c0,0-0.001-0.001-0.001-0.002L34.161,0.293c-0.086-0.087-0.188-0.148-0.295-0.197 c-0.027-0.013-0.057-0.02-0.086-0.03c-0.086-0.029-0.174-0.048-0.265-0.053C33.494,0.011,33.475,0,33.453,0H22.177 c-3.678,0-6.669,2.992-6.669,6.67v1.674h-4.663c-3.678,0-6.67,2.992-6.67,6.67V49.03c0,3.678,2.992,6.669,6.67,6.669h22.677 c3.677,0,6.669-2.991,6.669-6.669v-1.675h4.664c3.678,0,6.669-2.991,6.669-6.669V18.069C51.524,18.045,51.512,18.025,51.51,18.001z M34.454,3.414l13.655,13.655h-8.985c-2.575,0-4.67-2.095-4.67-4.67V3.414z M38.191,49.029c0,2.574-2.095,4.669-4.669,4.669H10.845 c-2.575,0-4.67-2.095-4.67-4.669V15.014c0-2.575,2.095-4.67,4.67-4.67h5.663h4.614v10.399c0,3.678,2.991,6.669,6.668,6.669h10.4 v18.942L38.191,49.029L38.191,49.029z M36.777,25.412h-8.986c-2.574,0-4.668-2.094-4.668-4.669v-8.985L36.777,25.412z M44.855,45.355h-4.664V26.412c0-0.023-0.012-0.044-0.014-0.067c-0.006-0.085-0.021-0.167-0.049-0.249 c-0.012-0.033-0.021-0.066-0.036-0.1c-0.048-0.105-0.109-0.205-0.194-0.29l0,0l0,0c0-0.001-0.001-0.002-0.001-0.002L22.829,8.637 c-0.087-0.086-0.188-0.147-0.295-0.196c-0.029-0.013-0.058-0.021-0.088-0.031c-0.086-0.03-0.172-0.048-0.263-0.053 c-0.021-0.002-0.04-0.013-0.062-0.013h-4.614V6.67c0-2.575,2.095-4.67,4.669-4.67h10.277v10.4c0,3.678,2.992,6.67,6.67,6.67h10.399 v21.616C49.524,43.26,47.429,45.355,44.855,45.355z'/%3E%3C/svg%3E%0A"
    var deleteImg = document.createElement('img');
    deleteImg.src = deleteIcon;

    var cloneImg = document.createElement('img');
    cloneImg.src = cloneIcon;

    $("#pills-back-tab").click(function(e){
        document.getElementById("insert_img").style.display = "none";
        document.getElementById("insert_img1").style.display = "block";
        document.getElementById("edit_img").style.display = "none";
        document.getElementById("edit_img_back").style.display = "block";

    });

    $("#pills-front-tab").click(function(e){
        document.getElementById("insert_img").style.display = "block";
        document.getElementById("insert_img1").style.display = "none";
        document.getElementById("edit_img").style.display = "block";
        document.getElementById("edit_img_back").style.display = "none";

    });
    //=========================================================
    fabric.Object.prototype.transparentCorners = false;
    fabric.Object.prototype.cornerColor = 'green';
    fabric.Object.prototype.cornerStyle = 'circle';
    fabric.Object.prototype.rotatingPointOffset = 5;

    var boundingObject = new fabric.Rect({
        top: 140,
        left: 185,
        width: 180,
        height: 250,
        selectable:false,
        fill: '',
        strokeDashArray: [5, 5],
        stroke: 'black',
        selectable: false,
        strokeWidth: 0,
      });
    
    
    
    var boundingArt = new fabric.Rect({
        top: 140,
        left: 185,
        width: 180,
        height: 250,
        selectable:false,
        fill: '',
        strokeDashArray: [5, 5],
        stroke: 'black',
        selectable: false,
        strokeWidth: 0,
      });
    canvas1.add(boundingArt);

    var front = document.getElementById("Ftshirt").getAttribute("src");
    var back = document.getElementById("Btshirt").getAttribute("src");
    //====================================================
    fabric.Image.fromURL(front, function(img1) {
        var imgBg = img1.set({
            angle: 0,
        });
        imgBg.scaleToHeight(400);
        imgBg.scaleToWidth(400);
        imgBg.selectable = false;
        canvas.backgroundImage = imgBg;
        canvas.centerObject(imgBg);
        canvas.add(imgBg);
    });

    fabric.Image.fromURL(back, function(img2) {
        var imgBgBack = img2.set({
            angle: 0,
        });
        imgBgBack.scaleToHeight(400);
        imgBgBack.scaleToWidth(400);
        imgBgBack.selectable = false;
        canvas1.backgroundImage = imgBgBack;
        canvas1.centerObject(imgBgBack);
        canvas1.add(imgBgBack);
    });
    //====================================================
        function addImgFront() {
            $('#file').change(function(e){
                var file = e.target.files[0];
                var reader = new FileReader();
                reader.onload = function (f) {
                  var data = f.target.result;
                  fabric.Image.fromURL(data, function (img) {
                   // var oImg = img.set({left: 0, top: 0, angle: 00,width:100, height:100}).scale(0.9);
                    yourNameObjs = img.set({
                        left: 225, 
                        top: 200, 
                        originX:  'middle',
                        originY: 'middle',
                    });
                    yourNameObjs.scaleToHeight(100);
                    yourNameObjs.scaleToWidth(100);
                    canvas.add(yourNameObjs);
                    canvas.renderAll();
                    canvas.on("object:moving", function(e){
                        var obj = yourNameObjs;
                        var bounds = boundingObject;
                        var objw = parseInt(parseInt(obj.width) * obj.scaleX);
                        var objh = parseInt(parseInt(obj.height) * obj.scaleY);
                        //left
                        if(obj.left < bounds.left){
                           obj.left = Math.max(bounds.left);
                        }
                        //top
                        if(obj.top < bounds.top){
                           obj.top = Math.max(bounds.top);
                        }
                        //right
                        if((parseInt(obj.left) + objw) > (parseInt(bounds.left)+parseInt(bounds.width))){
                           obj.left = Math.max(((parseInt(bounds.left)+parseInt(bounds.width)) - objw));
                        }
                        //bottom
                        if((parseInt(obj.top) + objh) > (parseInt(bounds.top)+parseInt(bounds.height))){
                           obj.top = Math.min(((parseInt(bounds.top)+parseInt(bounds.height)) - objh));
                        }
                    });
                    canvas.on("object:scaling", function(e){
                        var obj = yourNameObjs;
                        var bounds = boundingObject;
                        var objw = parseInt(parseInt(obj.width) * obj.scaleX);
                        var objh = parseInt(parseInt(obj.height) * obj.scaleY);
                        //left
                        if(obj.left < bounds.left || (parseInt(obj.left) + objw) > (parseInt(bounds.left)+parseInt(bounds.width))){
                            obj.left = Math.max(bounds.left);
                           obj.scaleX =  ((bounds.width/obj.width));
                        }
                        //top
                        if(obj.top < bounds.top || (parseInt(obj.top) + objh) > (parseInt(bounds.top)+parseInt(bounds.height))){
                            obj.top = Math.max(bounds.top);;
                           obj.scaleY = ((bounds.height/obj.height));
                        }
                    });


                    //===========================================================================
                    var rotate = document.getElementById('rotate');
                    console.log(rotate);
                    rotate.oninput = function () {
                        yourNameObjs.rotate(0);
                        yourNameObjs.set('angle', parseInt(this.value)).setCoords();
                        canvas.requestRenderAll();
                    };

                    var topControl = document.getElementById('ptop');
                        topControl.oninput = function() {
                            yourNameObjs.set('top', parseInt( this.value  ) + 140).setCoords();
                            canvas.requestRenderAll();
                    };

                    var leftControl = document.getElementById('pleft');
                        leftControl.oninput = function() {
                            yourNameObjs.set('left', parseInt(this.value) + 180).setCoords();
                            canvas.requestRenderAll();
                    };

                    var scaleControl = document.getElementById('scale');
                        scaleControl.oninput = function() {
                            yourNameObjs.scale(parseFloat(this.value/100)).setCoords();
                            canvas.requestRenderAll();
                    };

                    canvas.on('object:modified', objectMovedListener);
                  });
                }
                reader.readAsDataURL(file);
                if (file) {
                    document.getElementById("insert_img").style.display = "none";
                    document.getElementById("edit_img").style.display = "block";
                }
              });
        }   
        addImgFront();
    //===================================================
        function addImgBack() {
            $('#fileback').change(function(e){
                var fileback = e.target.files[0];
                var reader = new FileReader();
                reader.onload = function (f) {
                var data = f.target.result;
                fabric.Image.fromURL(data, function (img) {
                // var oImg = img.set({left: 0, top: 0, angle: 00,width:100, height:100}).scale(0.9);
                    art = img.set({
                        left: 225, 
                        top: 200, 
                        originX:  'middle',
                        originY: 'middle',
                    });
                    art.scaleToHeight(100);
                    art.scaleToWidth(100);
                    canvas1.add(art);
                    canvas1.renderAll();
                    canvas1.on("object:moving", function(e){
                        var obj = art;
                        var bounds = boundingArt;
                        var objw = parseInt(parseInt(obj.width) * obj.scaleX);
                        var objh = parseInt(parseInt(obj.height) * obj.scaleY);
                        //left
                        if(obj.left < bounds.left){
                        obj.left = Math.max(bounds.left);
                        }
                        //top
                        if(obj.top < bounds.top){
                        obj.top = Math.max(bounds.top);
                        }
                        //right
                        if((parseInt(obj.left) + objw) > (parseInt(bounds.left)+parseInt(bounds.width))){
                        obj.left = Math.max(((parseInt(bounds.left)+parseInt(bounds.width)) - objw));
                        }
                        //bottom
                        if((parseInt(obj.top) + objh) > (parseInt(bounds.top)+parseInt(bounds.height))){
                        obj.top = Math.min(((parseInt(bounds.top)+parseInt(bounds.height)) - objh));
                        }
                    });
                    canvas.on("object:scaling", function(e){
                        var obj = art;
                        var bounds = boundingArt;
                        var objw = parseInt(parseInt(obj.width) * obj.scaleX);
                        var objh = parseInt(parseInt(obj.height) * obj.scaleY);
                        //left
                        if(obj.left < bounds.left || (parseInt(obj.left) + objw) > (parseInt(bounds.left)+parseInt(bounds.width))){
                            obj.left = Math.max(bounds.left);
                        obj.scaleX =  ((bounds.width/obj.width));
                        }
                        //top
                        if(obj.top < bounds.top || (parseInt(obj.top) + objh) > (parseInt(bounds.top)+parseInt(bounds.height))){
                            obj.top = Math.max(bounds.top);;
                        obj.scaleY = ((bounds.height/obj.height));
                        }
                    });


                    //===========================================================================
                    var rotate = document.getElementById('rotate-back');
                    console.log(rotate);
                    rotate.oninput = function () {
                        art.rotate(0);
                        art.set('angle', parseInt(this.value)).setCoords();
                        canvas1.requestRenderAll();
                    };

                    var topControl = document.getElementById('ptop-back');
                        topControl.oninput = function() {
                            art.set('top', parseInt( this.value  ) + 140).setCoords();
                            canvas1.requestRenderAll();
                    };

                    var leftControl = document.getElementById('pleft-back');
                        leftControl.oninput = function() {
                            art.set('left', parseInt(this.value) + 180).setCoords();
                            canvas1.requestRenderAll();
                    };

                    var scaleControl = document.getElementById('scale-back');
                        scaleControl.oninput = function() {
                            art.scale(parseFloat(this.value/100)).setCoords();
                            canvas1.requestRenderAll();
                    };

                    canvas1.on('object:modified', objectMovedListenerBackImg);
                });
                }
                reader.readAsDataURL(fileback);
                if (fileback) {
                    document.getElementById("insert_img").style.display = "none";
                    document.getElementById("insert_img1").style.display = "none";
                    document.getElementById("edit_img_back").style.display = "block";
                    document.getElementById("edit_img").style.display = "none";
                }
            });
        }   
        addImgBack();

        //===========================================================================
        function objectMovedListener(ev) {
            var target = yourNameObjs;
            var bounds = boundingObject;
            if (!target) {
                return;
            }
            var width = target.width;
            var height = target.height;
            console.log('left', target.left - bounds.left , 'top', target.top - bounds.top, 'width', target.width * target.scaleX *5 *0.027 ,'cm', 'height', target.height * target.scaleY *5 *0.027);
            saveImage() ; 
            document.getElementById("rotate").value = target.angle.toFixed(2);
            document.getElementById("pleft").value = target.left - bounds.left;
            document.getElementById("ptop").value = target.top - bounds.top;
            document.getElementById("s-width").value = (target.width * target.scaleX *5 *0.027 ).toFixed(2);
            document.getElementById("s-height").value = (target.height * target.scaleY *5 *0.027).toFixed(2);
            document.getElementById("scale").value = ((target.scaleX*bounds.scaleX )*100).toFixed(2); 
        }
    //==============================================================
        function objectMovedListenerBackImg(ev) {
            var target = art;
            var bounds = boundingArt;
            if (!target) {
                return;
            }
            var width = target.width;
            var height = target.height;
            console.log('left', target.left - bounds.left , 'top', target.top - bounds.top, 'width', target.width * target.scaleX *5 *0.027 ,'cm', 'height', target.height * target.scaleY *5 *0.027);
            saveImage() ; 
            document.getElementById("rotate-back").value = target.angle.toFixed(2);
            document.getElementById("pleft-back").value = target.left - bounds.left;
            document.getElementById("ptop-back").value = target.top - bounds.top;
            document.getElementById("s-width-back").value = (target.width * target.scaleX *5 *0.027 ).toFixed(2);
            document.getElementById("s-height-back").value = (target.height * target.scaleY *5 *0.027).toFixed(2);
            document.getElementById("scale-back").value = ((target.scaleX*bounds.scaleX )*100).toFixed(2); 
        }

    //==============================================================

        function renderIcon(icon) {
            return function renderIcon(ctx, left, top, styleOverride, fabricObject) {
                var size = this.cornerSize;
                ctx.save();
                ctx.translate(left, top);
                ctx.rotate(fabric.util.degreesToRadians(fabricObject.angle));
                ctx.drawImage(icon, -size / 2, -size / 2, size, size);
                ctx.restore();
            }
        }

    fabric.Object.prototype.controls.deleteControl = new fabric.Control({
        x: 0.5,
        y: -0.5,
        offsetY: -16,
        offsetX: 16,
        cursorStyle: 'pointer',
        mouseUpHandler: deleteObject,
        render: renderIcon(deleteImg),
        cornerSize: 24
    });

    fabric.Object.prototype.controls.clone = new fabric.Control({
        x: -0.5,
        y: -0.5,
        offsetY: -16,
        offsetX: -16,
        cursorStyle: 'pointer',
        mouseUpHandler: cloneObject,
        render: renderIcon(cloneImg),
        cornerSize: 24
    });

    function deleteObject(eventData, transform) {
        var target = transform.target;
        var canvas = target.canvas;
        canvas.remove(target);
        canvas.requestRenderAll();
        document.getElementById('file').value = null;
        document.getElementById("insert_img").style.display = "block";
        document.getElementById("insert_img1").style.display = "none";
        document.getElementById("edit_img").style.display = "none";
    }

    function deleteObject(eventData, transform) {
        var target = transform.target;
        var canvas1 = target.canvas;
        canvas1.remove(target);
        canvas1.requestRenderAll();
        document.getElementById('fileback').value = null;
        document.getElementById("insert_img").style.display = "none";
        document.getElementById("insert_img1").style.display = "block";
        document.getElementById("edit_img_back").style.display = "none";
    }

    function cloneObject(eventData, transform) {
        var target = transform.target;
        var canvas = target.canvas;
        target.clone(function(cloned) {
            cloned.left += 10;
            cloned.top += 10;
            canvas.add(cloned);
        });
    }
    //==============================================================

        // var imageSaver = document.getElementById('save');
        // imageSaver.addEventListener('click', saveImage, false);

        function saveImage(e) {
            var name = new Date;
            var data = canvas.toDataURL({
                format: 'png',
                quality: 0.8
            });
            var databack = canvas1.toDataURL({
                format: 'png',
                quality: 0.8
            });
            //  this.href = data,
            document.getElementById('done-product').src = data;
            document.getElementById('done-product1').src = databack;
            this.image = name.getTime() + '-product.png';
            document.getElementById('imgEdited').value = data;
            document.getElementById('imgEditeds').value = databack;
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
        }
    //===============================================================

    

})();     