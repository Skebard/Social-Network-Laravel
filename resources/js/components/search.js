
const DEBOUNCE_TIME_MS = 1000;
function manageSearch(input)
{
    var debounceTimeout;
    input.addEventListener('keydown',(e)=>{
        clearTimeout(debounceTimeout);
        debounceTimeout = setTimeout(()=>{searchUsers(input.value)},1000);
        if(e.key==='Enter'){
            clearTimeout(debounceTimeout);
            searchUsers(input.value);
        }
    });
}
function searchUsers(text)
{
    console.log(text);
}


exports.manageSearch = manageSearch;