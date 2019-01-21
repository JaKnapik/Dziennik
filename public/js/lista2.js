function ajaxPostForm(id_to_reload)
{
    var CSRF_TOKEN = $('input[name=_token]').val();
    var val = document.getElementById('search').value;
    var formData = new FormData();
    formData.append('search', val);
    formData.append('_token', CSRF_TOKEN);
    var xmlHttp = new XMLHttpRequest();
    xmlHttp.onreadystatechange = function() {
        if(xmlHttp.readyState == 4 && xmlHttp.status == 200) {

            document.getElementById(id_to_reload).innerHTML = xmlHttp.responseText;
        }

    }

    xmlHttp.open("POST", 'searchToSend', true);
    xmlHttp.send(formData);
    // ajaxPagination();
}
// function ajaxPagination(url, id_to_reload)
// {
//     var val = document.getElementById('search').value;
//     var formData = new FormData();
//     formData.append('search', val);
//     var xmlHttp = new XMLHttpRequest();
//     xmlHttp.onreadystatechange = function() {
//         if(xmlHttp.readyState == 4 && xmlHttp.status == 200) {
//             document.getElementById(id_to_reload).innerHTML = xmlHttp.responseText;
//         }
//     }
//
//     xmlHttp.open("POST", url, true);
//     xmlHttp.send(formData);
//
// }
//
//
function submitToRight(id, id_to_reload)
{
    var CSRF_TOKEN = $('input[name=_token]').val();
    var val= document.getElementById(id).value;
    var formData = new FormData();
    formData.append('checked', val);
    formData.append('_token', CSRF_TOKEN);
    var xmlHttp = new XMLHttpRequest();
    xmlHttp.onreadystatechange = function() {
        if(xmlHttp.readyState == 4 && xmlHttp.status == 200) {
            document.getElementById(id_to_reload).innerHTML = xmlHttp.responseText;
            document.getElementById(id).checked = false;
        }

    }

    xmlHttp.open("POST", 'storeToMany', true);
    xmlHttp.send(formData);
}
function reset(id_to_reload)
{
    var CSRF_TOKEN = $('input[name=_token]').val();
    var formData = new FormData();
    formData.append('reset', 'tak');
    formData.append('_token', CSRF_TOKEN);
    var xmlHttp = new XMLHttpRequest();
    xmlHttp.onreadystatechange = function() {
        if(xmlHttp.readyState == 4 && xmlHttp.status == 200) {

            document.getElementById(id_to_reload).innerHTML = xmlHttp.responseText;
        }

    }

    xmlHttp.open("POST", 'storeToMany', true);
    xmlHttp.send(formData);
}
function submitToLeft(id)
{
    var CSRF_TOKEN = $('input[name=_token]').val();
    var val= document.getElementById(id).value;
    var formData = new FormData();
    formData.append('unchecked', val);
    formData.append('_token', CSRF_TOKEN);
    var xmlHttp = new XMLHttpRequest();
    xmlHttp.onreadystatechange = function() {
        if(xmlHttp.readyState == 4 && xmlHttp.status == 200) {

            document.getElementById('studentContainer2').innerHTML = xmlHttp.responseText;
        }

    }

    xmlHttp.open("POST", 'deleteFromList', true);
    xmlHttp.send(formData);
}