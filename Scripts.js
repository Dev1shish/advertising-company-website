function trigger_click(){
    document.querySelector('#profileimage').click();
}

function displayimage(e){
 if(e.files[0]){
     var reader = new FileReader();
     reader.onload = function(e){
         document.querySelector('#companylogo').setAttribute('src',e.target.result);

     }
     reader.readAsDataURL(e.files[0]);
 }

}

