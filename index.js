$.get("data.dim",(data)=>{
    let txt = data.substr(0,data.indexOf("{"));
    txt = "<"+txt+">";
    txt3 = txt;
    let strlet="";
    let num = data.substr(data.indexOf("\n")+1,data.indexOf("\n}")-data.indexOf("{"));
    sc = num.split("\n");
    $.each(sc,(k,v)=>{
        let tmp = txt.substr(0,txt.indexOf(">"));
        tmp2 = v.replace("    ","");
        if(tmp2.substr(0,1)!="."){
            tmp += " "+tmp2.substr(0,tmp2.indexOf(";"));
            txt=tmp+">";
        }
        else{
            strlet+=tmp2;
        }
        
    });
    strlet.replace('.',"");
    console.log(strlet);
    txt = txt + strlet+txt3.replace("<","</");
    console.log(txt);

});
//ini okmen