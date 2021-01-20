
function defaultResult(data)
{
}
function defaultError(error)
{
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