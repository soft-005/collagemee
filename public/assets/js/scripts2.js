
    to = 1;
    function tog(){
        
        if(to == 1){document.getElementById('tog1').style.transform = 'rotate(30deg)';
document.getElementById('tog1').style.margin = '0px 0px 0 -15px';
document.getElementById('tog1').style.width = '30px';
document.getElementById('tog2').style.transform = 'rotate(-30deg)';
document.getElementById('tog2').style.margin = '0px 0px 0 -15px';to += 1;
                  }else{document.getElementById('tog1').style.transform = 'rotate(0deg)';
document.getElementById('tog1').style.margin = '-5px 0px 0 -15px';
document.getElementById('tog1').style.width = '11px';
document.getElementById('tog2').style.transform = 'rotate(0deg)';
document.getElementById('tog2').style.margin = '5px 0px 0 -15px';to -= 1;}}

 function mid(imgPath,square=8,start=0){
    

//fixed values
    pic = square * square;
    u = start;//2
    spacin = 0;
    bgPosition = 0.0;
    bgx=(99.9999999/(square-1));//yeah i know y not jxt 100 ;)
    bgc=0.0;
       while(pic >= 1){u += 1;spacin += 1;
                  m = document.getElementById("p" + u).classList;
                  z = document.getElementById("p" + u);
                       m.add('imagestyle');
                       z.innerHTML = " ";  
                       z.style = "background:url('"+imgPath+"');background-size:"+square+"00% "+square+"00%;background-position: "+bgPosition+"% "+bgc+"%;";//('img-4-' + row);
                         
               pic -= 1;
              if(bgPosition < 99.99){ bgPosition+=bgx;}else{bgPosition=0.0;bgc+=bgx;}
              if(spacin == (square)){spacin=8;u += (8-(start+square));}//8 T.no of squares
              if(spacin == 8){spacin=0;u += start;}
                             
        }
   }
    
    // function mid(){
    // pic = 4 * 4;
    //    u = 2;
    // row = 1;
    // spacin = 1;
    //    while(row <= pic){u += 1;spacin += 1;
    //               m = document.getElementById("p" + u).classList;
    //                    m.add('image2');  m.add('img-4-' + row);
    //            row += 1;
    //                      if(spacin == 5){u += 4;spacin -= 4;}
    // }}
  
    function tex(p,n){
                  document.getElementById("p"+n).innerHTML = p;        
     }
  
     function clos(){
          pic = 8*8;
         u = 0;
        while(row <= pic){u += 1;
                           document.getElementById("p" + u).innerHTML = '';
                  document.getElementById("p" + u).classList = '';}
    }
                      
          setTimeout(function(){mid('./assets/images/cover/m%20(1).jpg',3,0);mid('./assets/images/cover/m%20(2).jpg',4,20);}, 1000);
          setTimeout(function(){tex('Coll',7);tex('&nbsp;age',8);tex('Me!',17);tex('<i class="fas fa-star btn-xs"></i>',53)}, 2000);   

            
    
    setInterval(function(){gt = 8*8;
        usbm = 0;
    
       while(usbm <= gt){usbm += 1;
                          g = document.getElementById("p" + usbm);
                         
                        
                       if(g.innerHTML != '' || g.classList != ''){  g.style.boxShadow = '4px 4px 5px black';}else{g.style.boxShadow = '0px 0px 0px black';}}}, 1000)
    
    
    
    
gtk = 8*8;usbmk = 0;
while(usbmk <= gtk){usbmk += 1;
    gfk = document.getElementById("p" + usbmk);
    gfk.draggable = 'true';
    gfk.style.cursor = 'pointer';
    gfk.addEventListener('dragstart', drag);
    gfk.addEventListener('drop', drop);
    gfk.addEventListener('dragover', allowDrop);
}
    
    
    
  function allowDrop(ev) {
    ev.preventDefault();
}

function drag(ev) {
    ev.dataTransfer.setData("text", ev.target.id);
}

function drop(ev) {
    ev.preventDefault();
    var data = ev.dataTransfer.getData("text");
   
  //ev.target.appendChild(document.getElementById(data));
    //      drag          drop
    //alert(data+ ', ' + ev.target.id);
    const ct = ev.target.id;
    iam = document.getElementById(ct);
    tytt = document.getElementById(data);
    const dt = tytt.innerHTML;
     const hu = iam.innerHTML;
    
    const hu2 =  iam.classList;
    const dt2 = tytt.classList;
    
       // alert(dt + ' , ' + hu + ', ' + dt2 + ' , ' + hu2 + ', ' + ct + ', ' + data + ' , ' + dt.length + ' , ' + dt2.length);        
//text to text,  text to img, img to text, img to img 
   

        //text to notin
 if(dt != ''  && (hu == '' && hu2 == '')){
        tytt.innerHTML = hu;
     iam.innerHTML = dt;                             
            }
    //text to text
 if((dt && hu != '')){
      tytt.classList = '';
     iam.classList = '';
     tytt.innerHTML = hu;
     iam.innerHTML = dt;}
    
    //text to img
if((dt.length >= 1) && (dt && hu2 != '')){
    iam.innerHTML = dt;
    tytt.innerHTML = hu2;
    tytt.classList = dt;
    tytt.innerHTML = '';
    //iam.classList = '';
    }
    
 //img to text
     if((dt2.length == 3 && hu.length >= 1) && (dt.length <= 0)){ 
  tytt.innerHTML = hu;
         iam.innerHTML = dt2;
          tytt.classList = hu2;
         iam.classList = iam.innerHTML;
    // iam.innerHTML = '';
         iam.innerHTML = '';
         //tytt.classList = '';

      }
    
    
       //img to text2
   //  if((dt != '') && (hu2 && dt2 == '')){ 
   //      iam.innerHTML = dt;
  //  tytt.innerHTML = hu2;
  //  tytt.classList = dt;
  //  tytt.innerHTML = '';}
    
    
    //img to img
     if((hu2 && dt2 != '')){
    tytt.innerHTML = dt2;
    tytt.classList = hu2;
    iam.classList = tytt.innerHTML;
      tytt.innerHTML = '';}
    
    
    
    
    
    /*tytt.innerHTML = dt2;
    tytt.classList = hu2;
    iam.classList = tytt.innerHTML;
      tytt.innerHTML = '';*/
    
}
    
