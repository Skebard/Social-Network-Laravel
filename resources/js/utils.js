
function defaultResult(data)
{
    console.log('Result')
    console.log(data);
}
function defaultError(error)
{
    console.log('Error')
    console.log(error);
}

function defaultFinal(data)
{

}

function handleRequest(url,result=defaultResult,error=defaultError,final=defaultFinal)
{
    fetch(url)
    .then(resp=>{
        if (!resp.ok) {
            throw Error(resp.statusText);
        }
        return resp.json();
    })
    .then(result)
    .catch(error)
    .finally(final);
}
exports.handleRequest = handleRequest;