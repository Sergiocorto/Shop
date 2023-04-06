let siteUrl = "http://shop.local/";
let productInBasket = document.querySelector("#products_in_basket");

//массив с кнопками навигации по списку товаров
let pagination = document.querySelectorAll(".pag-form");

//форма кнопки "показать еще"
let form = document.querySelector("#form");

//форма заказа
let order = document.querySelector("#order");

//функция при клике на кнопку "Показать еще"
if (form != null) {

    form.onsubmit = function (e) {
        e.preventDefault();
//создаем переменные элементов формы
        let btnShowMore = form.querySelector("#show-more");
        let url = form.querySelector("input[id='url']");
        let currentPageInput = form.querySelector("input[id='current-page']");
        let dannie = "send=1" + "&url=" + url.value + "&currentPage=" + currentPageInput.value;

        //создаем ajax-запрос на страницу обработки
        let ajax = new XMLHttpRequest();
        ajax.open("POST", form.action, false);
        ajax.setRequestHeader( "Content-type", "application/x-www-form-urlencoded" );
        ajax.send(dannie);

        //увеличиваем счетчик страницы
        currentPageInput.value = +currentPageInput.value + 1;

        if (ajax.response == ""){
            btnShowMore.style.display = "none";
        }

        //меняем контент страницы
        let productsBlock = document.querySelector("#products");
        productsBlock.innerHTML = productsBlock.innerHTML + ajax.response;
    }
}

//присваиваем функцию клика кнопкам навигации по списку товаров
pagination.forEach( function(item) {
    item.onclick = function (e) {
        e.preventDefault();

        //переменные формы кнопки навигации
        let url = item.querySelector("input[name='url']");
        let currentPageInput = item.querySelector("input[name='current-page']");
        console.dir(currentPageInput.value);
        let dannie = "send=1" + "&url=" + url.value + "&currentPage=" + currentPageInput.value;

        //создаем ajax-запрос на страницу обработки
        let ajax = new XMLHttpRequest();
        ajax.open("POST", item.action, false);
        ajax.setRequestHeader( "Content-type", "application/x-www-form-urlencoded" );
        ajax.send(dannie);

        //меняем контент страницы
        let productsBlock = document.querySelector("#products");
        productsBlock.innerHTML = ajax.response;
    }
});

//Функция пи клике по кнопке "Купить"
function addToBasket(btn) {

    let ajax = new XMLHttpRequest();
    ajax.open("POST", siteUrl+"modules/basket/add_basket.php", false);
    ajax.setRequestHeader( "Content-type", "application/x-www-form-urlencoded" );
    ajax.send("id="+btn.dataset.id);

    //console.dir(ajax);

    let response = JSON.parse(ajax.response);
    console.dir(response);
    productInBasket.innerText = response.count;
}

//Функция оформления заказа
if (form != null){
    order.onsubmit = function (e) {
        e.preventDefault();
    
        //создаем переменные элементов формы
        let name = order.querySelector("input[name='name']");
        let address = order.querySelector("input[name='address']");
        let phone = order.querySelector("input[name='phone']");
        let dannie = "send=1" + "&name=" + name.value + "&address=" + address.value + "&phone=" + phone.value;
    
        //создаем ajax-запрос на страницу обработки
        let ajax = new XMLHttpRequest();
        ajax.open("POST", order.action, false);
        ajax.setRequestHeader( "Content-type", "application/x-www-form-urlencoded" );
        ajax.send(dannie);
    
        //выводим сообщение о отправке заказа
        let orderInfo = order.querySelector("#order_info");
        orderInfo.innerText = "Заказ отправлен";
    
    }
}

//удаление товара из корзины
function deleteProductBasket(obj, id){
    let ajax = new XMLHttpRequest();
    ajax.open("POST", siteUrl + "/modules/basket/delete_product_basket.php", false);
    ajax.setRequestHeader( "Content-type", "application/x-www-form-urlencoded" );
    ajax.send("id=" + id);

    alert("Product deleted");

    obj.parentNode.parentNode.remove();
}

//Изменение кол-ва товара в корзине
function inputCount(obj, id){
    let count = obj.value;
    let dannie = "send+1" + "&count=" + count + "&id=" + id;
//создаем ajax-запро для обновления кол-ва товара и стоимости
    let ajax = new XMLHttpRequest();
    ajax.open("POST", siteUrl + "/modules/basket/change_count_product.php", false);
    ajax.setRequestHeader( "Content-type", "application/x-www-form-urlencoded" );
    ajax.send(dannie);

    //обновляем стоимость товара на странице
    let costText = obj.parentNode.parentNode.querySelector("td[name='cost']")
    costText.innerHTML = ajax.response;

}

//выбор статуса заказа
function changeStatus(obj){
    console.dir(obj.value);
    let orderId = obj.parentNode.parentNode.querySelector("td[name='order_id']");
    console.dir(orderId.textContent);
    let dannie = "send+1" + "&id=" + orderId.textContent + "&status=" + obj.value; 
    
    //создаем ajax-запро для обновления кол-ва товара и стоимости
    let ajax = new XMLHttpRequest();
    ajax.open("POST", siteUrl + "/admin/options/orders/change_status.php", false);
    ajax.setRequestHeader( "Content-type", "application/x-www-form-urlencoded" );
    ajax.send(dannie);

    let message = obj.parentNode.innerText("Статус изменен");

}