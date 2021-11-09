document.addEventListener('DOMContentLoaded',(event)=>{
    let lookupbtn=document.getElementById('lookup');
    let country=document.getElementById('country');
    let result=document.getElementById('result');
    

    //when search button is clicked
    lookupbtn.addEventListener('click',e=>{
        e.preventDefault();

        result.innerHTML=''; //clear result container after each search
        
        let input=country.value; //get input value from search bar

        //AJAX GET Request
        httpRequest=new XMLHttpRequest();
        var url='http://localhost/info2180-lab5/world.php'
        httpRequest.onreadystatechange=loadResults;
        url+="?country="+input;
        httpRequest.open('GET',url);
        httpRequest.send();
    });

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