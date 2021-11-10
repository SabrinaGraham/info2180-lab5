document.addEventListener('DOMContentLoaded',(event)=>{
    let countrybtn=document.getElementById('lookup');
    let citiesbtn=document.getElementById('cities');
    let country=document.getElementById('country');
    let result=document.getElementById('result');
    let input;
    let q;
    
    ////AJAX GET Request
    function ajaxRequest(query)
    {
        httpRequest=new XMLHttpRequest();
        var url='http://localhost/info2180-lab5/world.php'
        httpRequest.onreadystatechange=loadResults;
        url+=query;
        httpRequest.open('GET',url);
        httpRequest.send();
    }

    //when lookup buttons are clicked
    countrybtn.addEventListener('click',e=>{
        e.preventDefault();
        input=country.value; //get input value from search bar
        result.innerHTML=''; //clear result container after each search
        q="?country="+input+"&context=";
        ajaxRequest(q);
    });
    citiesbtn.addEventListener('click',e=>{
        e.preventDefault();
        input=country.value; //get input value from search bar
        result.innerHTML='';
        q="?country="+input+"&context=cities";
        ajaxRequest(q);
    })

    //Function to retrieve info from php file
    function loadResults()
    {
        //console.log('http status is '+httpRequest.readyState)
        if (httpRequest.readyState===XMLHttpRequest.DONE)
        {
            if (httpRequest.status===200)
            {
                var response=httpRequest.responseText;

                //result.classList.add('resultt');
                //r.innerHTML='RESULT';
                result.innerHTML=response; 
            }
        
        
            else
            {
                alert('There is a problem with the request.');
            }
        }
    }
    

    
});