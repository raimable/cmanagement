/*
		GNU General Public License version 2 or later; see LICENSE.txt
*/
if(typeof Joomla==="undefined")var Joomla={};
    
Joomla.editors={};
    
Joomla.editors.instances={};
    
Joomla.submitform=function(a,b){
    if(typeof b==="undefined"&&(b=document.getElementById("adminForm"),!b))b=document.adminForm;
    if(typeof a!=="undefined")b.task.value=a;
    if(typeof b.onsubmit=="function")b.onsubmit();
    typeof b.fireEvent=="function"&&b.fireEvent("submit");
    b.submit()
    };
    
Joomla.submitbutton=function(a){
    Joomla.submitform(a)
    };
Joomla.JText={
    strings:{},
    _:function(a,b){
        return typeof this.strings[a.toUpperCase()]!=="undefined"?this.strings[a.toUpperCase()]:b
        },
    load:function(a){
        for(var b in a)this.strings[b.toUpperCase()]=a[b];return this
        }
    };

Joomla.replaceTokens=function(a){
    for(var b=document.getElementsByTagName("input"),c=0;c<b.length;c++)if(b[c].type=="hidden"&&b[c].name.length==32&&b[c].value=="1")b[c].name=a
        };
        
Joomla.isEmail=function(a){
    return/^[\w-_.]*[\w-_.]@[\w].+[\w]+[\w]$/.test(a)
    };
Joomla.checkAll=function(a,b){
    b||(b="cb");
    if(a.form){
        for(var c=0,d=0,f=a.form.elements.length;d<f;d++){
            var e=a.form.elements[d];
            if(e.type==a.type&&(b&&e.id.indexOf(b)==0||!b))e.checked=a.checked,c+=e.checked==!0?1:0
                }
                if(a.form.boxchecked)a.form.boxchecked.value=c;
        return!0
        }
        return!1
    };
Joomla.renderMessages=function(a){
    Joomla.removeMessages();
    var b=document.id("system-message-container"),c=new Element("dl",{
        id:"system-message",
        role:"alert"
    });
    Object.each(a,function(a,b){
        (new Element("dt",{
            "class":b,
            html:b
        })).inject(c);
        var e=new Element("dd",{
            "class":b
        });
        e.addClass("message");
        var g=new Element("ul");
        Array.each(a,function(a){
            (new Element("li",{
                html:a
            })).inject(g)
            },this);
        g.inject(e);
        e.inject(c)
        },this);
    c.inject(b)
    };
    
Joomla.removeMessages=function(){
    $$("#system-message-container > *").destroy()
    };
function writeDynaList(a,b,c,d,f){
    var a="\n\t<select "+a+">",e=0;
    for(x in b){
        if(b[x][0]==c){
            var g="";
            if(d==c&&f==b[x][1]||e==0&&d!=c)g='selected="selected"';
            a+='\n\t\t<option value="'+b[x][1]+'" '+g+">"+b[x][2]+"</option>"
            }
            e++
    }
    a+="\n\t</select>";
    document.writeln(a)
    }
function changeDynaList(a,b,c,d,f){
    a=document.adminForm[a];
    for(i in a.options.length)a.options[i]=null;i=0;
    for(x in b)if(b[x][0]==c){
        opt=new Option;
        opt.value=b[x][1];
        opt.text=b[x][2];
        if(d==c&&f==opt.value||i==0)opt.selected=!0;
        a.options[i++]=opt
        }
        a.length=i
    }
    function radioGetCheckedValue(a){
    if(!a)return"";
    var b=a.length;
    if(b==void 0)return a.checked?a.value:"";
    for(var c=0;c<b;c++)if(a[c].checked)return a[c].value;return""
    }
function getSelectedValue(a,b){
    var c=document[a][b];
    i=c.selectedIndex;
    return i!=null&&i>-1?c.options[i].value:null
    }
function checkAll(a,b){
    b||(b="cb");
    if(a.form){
        for(var c=0,d=0,f=a.form.elements.length;d<f;d++){
            var e=a.form.elements[d];
            if(e.type==a.type&&(b&&e.id.indexOf(b)==0||!b))e.checked=a.checked,c+=e.checked==!0?1:0
                }
                if(a.form.boxchecked)a.form.boxchecked.value=c;
        return!0
        }else{
        for(var e=document.adminForm,c=e.toggle.checked,f=a,g=0,d=0;d<f;d++){
            var h=e[b+""+d];
            if(h)h.checked=c,g++
        }
        document.adminForm.boxchecked.value=c?g:0
        }
    }
function listItemTask(a,b){
    var c=document.adminForm,d=c[a];
    if(d){
        for(var f=0;;f++){
            var e=c["cb"+f];
            if(!e)break;
            e.checked=!1
            }
            d.checked=!0;
        c.boxchecked.value=1;
        submitbutton(b)
        }
        return!1
    }
    function isChecked(a){
    a==!0?document.adminForm.boxchecked.value++:document.adminForm.boxchecked.value--
}
function submitbutton(a){
    submitform(a)
    }
function submitform(a){
    if(a)document.adminForm.task.value=a;
    if(typeof document.adminForm.onsubmit=="function")document.adminForm.onsubmit();
    typeof document.adminForm.fireEvent=="function"&&document.adminForm.fireEvent("submit");
    document.adminForm.submit()
    }
    function popupWindow(a,b,c,d,f){
    winprops="height="+d+",width="+c+",top="+(screen.height-d)/2+",left="+(screen.width-c)/2+",scrollbars="+f+",resizable";
    win=window.open(a,b,winprops);
    parseInt(navigator.appVersion)>=4&&win.window.focus()
    }
function tableOrdering(a,b,c){
    var d=document.adminForm;
    d.filter_order.value=a;
    d.filter_order_Dir.value=b;
    submitform(c)
    }
    function saveorder(a,b){
    checkAll_button(a,b)
    }
    function checkAll_button(a,b){
    b||(b="saveorder");
    for(var c=0;c<=a;c++){
        var d=document.adminForm["cb"+c];
        if(d){
            if(d.checked==!1)d.checked=!0
                }else{
            alert("You cannot change the order of items, as an item in the list is `Checked Out`");
            return
        }
    }
    submitform(b)
};