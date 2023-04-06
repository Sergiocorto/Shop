
//Функция добавления товаров

/*
let formAdd = document.querySelector("#form_add");
if(formAdd != null){
    console.dir(formAdd);
    formAdd.onsubmit = function(){

        let name = formAdd.querySelector("input[name='name']");
        let description = formAdd.querySelector("input[name='description']");
        let content = formAdd.querySelector("textarea");
        let categoryId = formAdd.querySelector("input[name='category_id']");
    
        let dannie = "send=1" + "&title=" + name.value + "&description=" + description.value + "&content=" + content.value + "&category_id=" + categoryId.value;
        
        let ajax = new XMLHttpRequest();
        ajax.open("POST", formAdd.action, false);
        ajax.setRequestHeader( "Content-type", "application/x-www-form-urlencoded" );
        ajax.send(dannie);
    }
}


//Функция изменения товара
let formEdit = document.querySelector("#form_edit");
if(formEdit != null) {
    console.dir(formEdit);
    formEdit.onsubmit = function(event){
        let id = formEdit.querySelector("input[name='id']");
        let name = formEdit.querySelector("input[name='name']");
        let description = formEdit.querySelector("input[name='description']");
        let content = formEdit.querySelector("textarea");
        let categoryId = formEdit.querySelector("input[name='category_id']");

        let dannie = "send=1" + "&id=" + id.value + "&title=" + name.value + "&description=" + description.value + "&content=" + content.value + "&category_id=" + categoryId.value;
        console.dir(dannie);
        let ajax = new XMLHttpRequest();
        ajax.open("POST", formEdit.action, false);
        ajax.setRequestHeader( "Content-type", "application/x-www-form-urlencoded" );
        ajax.send(dannie);
    }
}
*/