function AjaxFunctionSector(category_id)
{
    var httpxml;
    try
    {
        // Firefox, Opera 8.0+, Safari
        httpxml=new XMLHttpRequest();
    }
    catch (e)
    {
        // Internet Explorer
        try
        {
            httpxml=new ActiveXObject("Msxml2.XMLHTTP");
        }
        catch (e)
        {
            try
            {
                httpxml=new ActiveXObject("Microsoft.XMLHTTP");
            }
            catch (e)
            {
                alert("Your browser does not support AJAX!");
                return false;
            }
        }
    }
    function stateck() 
    {
        if(httpxml.readyState==4)
        {

            var myarray=eval(httpxml.responseText);
            // Before adding new we must remove previously loaded elements
            for(j=document.adminForm.subcat.options.length-1;j>=0;j--)
            {
                document.adminForm.subcat.remove(j);
            }


            for (i=0;i<myarray.length;i=i+2)
            {
                var optn = document.createElement("OPTION");
                optn.text = myarray[i + 1];
                optn.value = myarray[i];
                document.adminForm.subcat.options.add(optn);

            } 
        }
    }
    var url="state.php";
    url=url+"?category_id="+category_id;
    httpxml.onreadystatechange=stateck;
    httpxml.open("GET",url,true);
    httpxml.send(null);
}
            
