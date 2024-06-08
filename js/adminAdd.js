
//-----------------------添加商品---------------------------
function checkGoodsName(){
    const goodsName=document.getElementById("goodsName").value;
    var span=document.getElementById('addGoodsms');
    var reg=/^[a-zA-Z0-9\u4e00-\u9fa5\u3040-\u30ff\s]+$/; //    /^[u4e00-u9fa5·0-9A-z]+$/
    if(goodsName=='' || goodsName==null){
        return false;
    }else if(goodsName.length>250){
        span.innerHTML ='商品名太长';
        span.style.color='white';
        return false;
    }else if(reg.test(goodsName)){
        span.innerHTML='&nbsp';
        return true;
    }else{
        span.innerHTML ='商品名限半角大小写字母，数字，空格，中文，日语';
        span.style.color='white';
        return false;
    }
}

function checknum(){
    const num=document.getElementById("num").value;
    const span=document.getElementById("numms");
    if(num=='' || num==null){
        return false;
    }else if(num.length>20){
        span.innerHTML='价格超过20位';
        span.style.color='white';
        return false;
    }else{
        span.innerHTML='&nbsp';
        return true;
    }
}

function checkFile(){
    const inputFile=document.getElementById("fileInput");
    const file=inputFile.files[0];
    const span=document.getElementById('addFilems');
    if(file=='' || file==null){
        span.innerHTML='&nbsp';
        return false;
    }else if(!file.type.startsWith('image/')){
        span.innerHTML='图片格式错误';
        span.style.color='white';
        return false;
    }else{
        span.innerHTML='&nbsp';
        return true;
    }
}

function checkAll(){
    const btn=document.getElementById("addBtn");
    if(checkGoodsName()&&checknum()&&checkFile()){
        btn.disabled=false;
    }else{
        btn.disabled=true;
    }

}
