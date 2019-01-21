function ajaxPostForm(url, id_to_reload)
{
    var val = document.getElementById('search').value;
    var formData = new FormData();
    formData.append('search', val);
    formData.append('currentSite', "");
    var xmlHttp = new XMLHttpRequest();
    xmlHttp.onreadystatechange = function() {
        if(xmlHttp.readyState == 4 && xmlHttp.status == 200) {

            document.getElementById(id_to_reload).innerHTML = xmlHttp.responseText;
        }

    }

    xmlHttp.open("POST", url, true);
    xmlHttp.send(formData);
    ajaxPagination();
}
function ajaxPagination(url, id_to_reload)
{
    var val = document.getElementById('search').value;
    var formData = new FormData();
    formData.append('search', val);
    var xmlHttp = new XMLHttpRequest();
    xmlHttp.onreadystatechange = function() {
        if(xmlHttp.readyState == 4 && xmlHttp.status == 200) {
            document.getElementById(id_to_reload).innerHTML = xmlHttp.responseText;
        }
    }

    xmlHttp.open("POST", url, true);
    xmlHttp.send(formData);

}


